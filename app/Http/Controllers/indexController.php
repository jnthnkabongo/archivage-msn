<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Role;
use App\Models\Service;
use App\Models\SousCategorie;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    public function dashboard(){
        $user = Auth::user();
        if(!$user){
            return redirect()->route('login');
        }
        $compteurDocuments = Document::count();
        $compteurServices = Service::count();
        $compteurCategories = Category::count();
        $compteurUtilisateurs = User::count();
        $listeDocuments = Document::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.administration.dashboard', compact('user', 'compteurDocuments', 'compteurServices', 'compteurCategories', 'compteurUtilisateurs', 'listeDocuments'));
    }

    public function liste_utilisateurs(){
        $roles = Role::orderBy('nom', 'asc')->get();
        $services = Service::orderBy('nom', 'asc')->get();
        $listeUtilisateurs = User::orderBy('name', 'asc')->paginate('10');
        return view('pages.administration.liste-utilisateurs', compact('listeUtilisateurs', 'roles', 'services'));
    }

    public function enregistrer_utilisateur(CreateUserRequest $request){
       // dd($request->validated());
        $validated = $request->validated();
        try {
            $User = new User();
            $User->name = $validated['name'];
            $User->email = $validated['email'];
            $User->password = bcrypt($validated['password']);
            $User->role_id = $validated['role_id'];
            $User->service_id = $validated['service_id'];
            //$User->is_active = 1;
            $User->save();
            return redirect()->route('liste-utilisateurs')->with('success', 'Utilisateur enregistré avec succès');
        } catch (\Throwable $th) {
            return redirect()->route('liste-utilisateurs')->with('error', 'Erreur lors de l\'enregistrement de l\'utilisateur: ' . $th->getMessage());
        }
        
    }
    
    public function liste_archives(){
        return view('pages.administration.liste-archives');
    }

    public function liste_documents(){
        $nextReference = 'DOC-MNS-' . date('Y') . '-' . strtoupper(Str::random(6));
        $categories = Category::orderBy('nom', 'asc')->get();
        $services = Service::orderBy('nom', 'asc')->get();
        $documentsliste = Document::with('category', 'service','user','versions','archive','partages.user')->orderBy('created_at', 'desc')->paginate('10');
        return view('pages.administration.liste-documents', compact('nextReference', 'categories', 'services', 'documentsliste'));
    }

    public function rechercher_documents(Request $request){
        $searchTerm = $request->input('search', '');
        $typeFilter = $request->input('type', '');
        $statusFilter = $request->input('status', '');
        
        $query = Document::with('category', 'service', 'user', 'versions', 'archive', 'partages.user');
        
        // Recherche dans tous les champs
        if (!empty($searchTerm)) {
            $query->where(function($q) use ($searchTerm) {
                $q->where('titre', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('reference', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('description', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('type', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('type_fichier', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('niveau_confidentialite', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('statut', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('taille_fichier', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('date_document', 'LIKE', '%' . $searchTerm . '%')
                  // Recherche dans les relations
                  ->orWhereHas('category', function($subQ) use ($searchTerm) {
                      $subQ->where('nom', 'LIKE', '%' . $searchTerm . '%');
                  })
                  ->orWhereHas('service', function($subQ) use ($searchTerm) {
                      $subQ->where('nom', 'LIKE', '%' . $searchTerm . '%');
                  })
                  ->orWhereHas('user', function($subQ) use ($searchTerm) {
                      $subQ->where('name', 'LIKE', '%' . $searchTerm . '%')
                           ->orWhere('email', 'LIKE', '%' . $searchTerm . '%');
                  });
            });
        }
        
        // Filtres supplémentaires
        if (!empty($typeFilter)) {
            $query->where('type_fichier', $typeFilter);
        }
        
        if (!empty($statusFilter)) {
            $query->where('statut', $statusFilter);
        }
        
        $documentsliste = $query->orderBy('created_at', 'desc')->paginate(10);
        
        // Conserver les filtres pour la pagination
        $documentsliste->appends($request->query());
        
        $nextReference = 'DOC-MNS-' . date('Y') . '-' . strtoupper(Str::random(6));
        $categories = Category::orderBy('nom', 'asc')->get();
        $services = Service::orderBy('nom', 'asc')->get();
        
        return view('pages.administration.liste-documents', compact('nextReference', 'categories', 'services', 'documentsliste'));
    }

    public function liste_services(){
        
        $listeServices = Service::with('users')->orderBy('nom', 'asc')->paginate(10);
        return view('pages.administration.liste-services', compact('listeServices'));
    }

    public function liste_roles(){
        $listeRoles = Role::orderBy('nom', 'asc')->paginate(10);
        return view('pages.administration.liste-roles', compact('listeRoles'));
    }

        public function get_sous_categories($categorie_id){
            $sousCategories = SousCategorie::where('categorie_id', $categorie_id)->get();
        return response()->json($sousCategories);
    }

    public function view_document(Document $document){
        return view('pages.administration.view-document', compact('document'));
    }

    public function create_category(Request $request){
        //1. Validation
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        
        //2. Création de la catégorie
        $category = Category::create([
            'nom' => $request->nom,
            'description' => $request->description,
        ]);
        
        return redirect()->route('liste-categories')->with('success', 'Catégorie créée avec succès');
    }
    
    public function create_sous_category(Request $request){
        //1. Validation
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'categorie_id' => 'required|exists:categories,id',
        ]);
        
        //2. Création de la sous-catégorie
        $sousCategory = SousCategorie::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'categorie_id' => $request->categorie_id,
        ]);
        
        return redirect()->route('liste-categories')->with('success', 'Sous-catégorie créée avec succès');
    }

    public function liste_categories(){

        $sousCategories = SousCategorie::all();
        $categories = Category::orderBy('nom', 'asc')->get();
        $listeCategories = SousCategorie::with('categorie')->paginate(10);
        return view('pages.administration.liste-categories', compact('sousCategories', 'categories', 'listeCategories'));
    }

    public function parametres(){
        return view('pages.administration.parametres');
    }

    public function statistiques(){
        return view('pages.administration.statistiques');
    }

    public function historique(){
        return view('pages.administration.historiques');
    }

    public function enregistrer_fichier(Request $request){
        //dd($request->all());
        // 1. VALIDATION
        $request->validate([
            'titre' => 'required|string|max:255',
            'reference' => 'required|string|max:100|unique:documents,reference',
            'fichier' => 'required|file|mimes:pdf,doc,docx,xlsx,png,jpg,jpeg|max:5120',
            'description' => 'nullable|string|max:1000',
            'type' => 'required|in:entrant,sortant,interne',
            //'statut' => 'required|in:draft,validated,archived',
            'date_document' => 'nullable|date',
            'categorie_id' => 'nullable|exists:categories,id',
            'sous_categorie_id' => 'nullable|exists:sous_categories,id',
            'service_id' => 'nullable|exists:services,id',
            'niveau_confidentialite' => 'nullable|in:public,interne,confidentiel,secret',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id'
        ]);

        // 2. FICHIER
        $file = $request->file('fichier');

        // 3. INFOS FICHIER
        $extension = strtolower($file->getClientOriginalExtension());
        $mime = $file->getMimeType();
        $taille = $file->getSize();

        // 4. STOCKAGE
        $path = $file->store('documents', 'public');

        // 5. REFERENCE UNIQUE
        $reference = 'DOC-MNS-' . date('Y') . '-' . strtoupper(Str::random(6));

        // 6. ENREGISTREMENT DOCUMENT
        $document = Document::create([
            'titre' => $request->titre,
            'reference' => $reference,
            'description' => $request->description,
            'fichier' => $path,
            'type' => $request->type,
            'type_fichier' => $extension,
            'mime_type' => $mime,
            'date_document' => $request->date_document ?? now()->format('Y-m-d'),
            'categorie_id' => $request->categorie_id,
            'sous_categorie_id' => $request->sous_categorie_id,
            'service_id' => $request->service_id,
            'user_id' => Auth::id(),
            'statut' => 'actif',
            'niveau_confidentialite' => $request->niveau_confidentialite ?? 'interne',
            'taille_fichier' => $taille,
        ]);

        // 7. TAGS (relation many-to-many)
        if ($request->has('tags')) {
            $document->tags()->sync($request->tags);
        }

        // 8. HISTORIQUE (audit 🔥)
        DB::table('historiques')->insert([
            'user_id' => Auth::id(),
            'action' => 'CREATE',
            'module' => 'document',
            'cible_id' => $document->id,
            'cible_type' => 'Document',
            'description' => 'Création du document : ' . $document->titre,
            'nouvelle_valeur' => json_encode($document),
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'created_at' => now()
        ]);

        return redirect()->back()->with('success', 'Document enregistré avec succès');

    }

    /*************************** PARTIE UTILISATEUR */
    
    public function dashboard_user(){
        $user = Auth::user();
        if(!$user){
            return redirect()->route('login');
        }
        $compteurDocuments = Document::count();
        $compteurServices = Service::count();
        $compteurCategories = Category::count();
        $compteurUtilisateurs = User::count();
        $listeDocuments = Document::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.utilisateur.dashboard_page', compact('compteurDocuments', 'compteurServices', 'compteurCategories', 'compteurUtilisateurs', 'listeDocuments'));
    }

    public function liste_archives_user(){
        return view('pages.utilisateur.archives_page');
    }

    public function liste_documents_user(){
        $nextReference = 'DOC-MNS-' . date('Y') . '-' . strtoupper(Str::random(6));
        $categories = Category::orderBy('nom', 'asc')->get();
        $services = Service::orderBy('nom', 'asc')->get();
        $documentsliste = Document::with('category', 'service','user','versions','archive','partages.user')->orderBy('created_at', 'desc')->paginate('10');
        return view('pages.utilisateur.documents_page', compact('nextReference', 'categories', 'services', 'documentsliste'));
    }

    public function rechercher_documents_user(Request $request){
        $searchTerm = $request->input('search', '');
        $typeFilter = $request->input('type', '');
        $statusFilter = $request->input('status', '');
        
        $query = Document::with('category', 'service', 'user', 'versions', 'archive', 'partages.user');
        
        // Recherche dans tous les champs
        if (!empty($searchTerm)) {
            $query->where(function($q) use ($searchTerm) {
                $q->where('titre', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('reference', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('description', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('type', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('type_fichier', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('niveau_confidentialite', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('statut', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('taille_fichier', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('date_document', 'LIKE', '%' . $searchTerm . '%')
                  // Recherche dans les relations
                  ->orWhereHas('category', function($subQ) use ($searchTerm) {
                      $subQ->where('nom', 'LIKE', '%' . $searchTerm . '%');
                  })
                  ->orWhereHas('service', function($subQ) use ($searchTerm) {
                      $subQ->where('nom', 'LIKE', '%' . $searchTerm . '%');
                  })
                  ->orWhereHas('user', function($subQ) use ($searchTerm) {
                      $subQ->where('name', 'LIKE', '%' . $searchTerm . '%')
                           ->orWhere('email', 'LIKE', '%' . $searchTerm . '%');
                  });
            });
        }
        
        // Filtres supplémentaires
        if (!empty($typeFilter)) {
            $query->where('type_fichier', $typeFilter);
        }
        
        if (!empty($statusFilter)) {
            $query->where('statut', $statusFilter);
        }
        
        $documentsliste = $query->orderBy('created_at', 'desc')->paginate(10);
        
        // Conserver les filtres pour la pagination
        $documentsliste->appends($request->query());
        
        $nextReference = 'DOC-MNS-' . date('Y') . '-' . strtoupper(Str::random(6));
        $categories = Category::orderBy('nom', 'asc')->get();
        $services = Service::orderBy('nom', 'asc')->get();
        
        return view('pages.utilisateur.documents_page', compact('nextReference', 'categories', 'services', 'documentsliste'));
    }

    public function liste_services_user(){
        $listeServices = Service::with('users')->orderBy('nom', 'asc')->paginate(10);
        return view('pages.utilisateur.services_page', compact('listeServices'));
    }
    
    public function liste_categories_user(){
        $sousCategories = SousCategorie::all();
        $categories = Category::orderBy('nom', 'asc')->get();
        $listeCategories = SousCategorie::with('categorie')->paginate(10);
        return view('pages.utilisateur.categorie_page', compact('sousCategories', 'categories', 'listeCategories'));
    }
    
    public function parametre_user(){
        return view('pages.utilisateur.parametres_page');
    }

    public function enregistrer_fichier_user(Request $request){
        //dd($request->all());
        // 1. VALIDATION
        $request->validate([
            'titre' => 'required|string|max:255',
            'reference' => 'required|string|max:100|unique:documents,reference',
            'fichier' => 'required|file|mimes:pdf,doc,docx,xlsx,png,jpg,jpeg|max:5120',
            'description' => 'nullable|string|max:1000',
            'type' => 'required|in:entrant,sortant,interne',
            //'statut' => 'required|in:draft,validated,archived',
            'date_document' => 'nullable|date',
            'categorie_id' => 'nullable|exists:categories,id',
            'sous_categorie_id' => 'nullable|exists:sous_categories,id',
            'service_id' => 'nullable|exists:services,id',
            'niveau_confidentialite' => 'nullable|in:public,interne,confidentiel,secret',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id'
        ]);

        // 2. FICHIER
        $file = $request->file('fichier');

        // 3. INFOS FICHIER
        $extension = strtolower($file->getClientOriginalExtension());
        $mime = $file->getMimeType();
        $taille = $file->getSize();

        // 4. STOCKAGE
        $path = $file->store('documents', 'public');

        // 5. REFERENCE UNIQUE
        $reference = 'DOC-MNS-' . date('Y') . '-' . strtoupper(Str::random(6));

        // 6. ENREGISTREMENT DOCUMENT
        $document = Document::create([
            'titre' => $request->titre,
            'reference' => $reference,
            'description' => $request->description,
            'fichier' => $path,
            'type' => $request->type,
            'type_fichier' => $extension,
            'mime_type' => $mime,
            'date_document' => $request->date_document ?? now()->format('Y-m-d'),
            'categorie_id' => $request->categorie_id,
            'sous_categorie_id' => $request->sous_categorie_id,
            'service_id' => $request->service_id,
            'user_id' => Auth::id(),
            'statut' => 'actif',
            'niveau_confidentialite' => $request->niveau_confidentialite ?? 'interne',
            'taille_fichier' => $taille,
        ]);

        // 7. TAGS (relation many-to-many)
        if ($request->has('tags')) {
            $document->tags()->sync($request->tags);
        }

        // 8. HISTORIQUE (audit 🔥)
        DB::table('historiques')->insert([
            'user_id' => Auth::id(),
            'action' => 'CREATE',
            'module' => 'document',
            'cible_id' => $document->id,
            'cible_type' => 'Document',
            'description' => 'Création du document : ' . $document->titre,
            'nouvelle_valeur' => json_encode($document),
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'created_at' => now()
        ]);

        return redirect()->back()->with('success', 'Document enregistré avec succès');

    }

      public function create_category_user(Request $request){
        //1. Validation
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        
        //2. Création de la catégorie
        $category = Category::create([
            'nom' => $request->nom,
            'description' => $request->description,
        ]);
        
        return redirect()->back()->with('success', 'Catégorie créée avec succès');
    }
    
    public function create_sous_category_user(Request $request){
        //1. Validation
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'categorie_id' => 'required|exists:categories,id',
        ]);
        
        //2. Création de la sous-catégorie
        $sousCategory = SousCategorie::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'categorie_id' => $request->categorie_id,
        ]);
        
        return redirect()->back()->with('success', 'Sous-catégorie créée avec succès');
    }

    public function modifier_categorie($id){
        try {
            $categorie = SousCategorie::findOrFail($id);
            $categories = Category::orderBy('nom', 'asc')->get();
            
            return response()->json([
                'success' => true,
                'categorie' => $categorie,
                'categories' => $categories
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Catégorie non trouvée'
            ], 404);
        }
    }

    public function update_categorie(Request $request, $id){
        try {
            $categorie = SousCategorie::findOrFail($id);
            
            // Validation
            $request->validate([
                'nom' => 'required|string|max:255',
                'description' => 'nullable|string',
                'categorie_id' => 'required|exists:categories,id',
            ]);
            
            // Mise à jour
            $categorie->update([
                'nom' => $request->nom,
                'description' => $request->description,
                'categorie_id' => $request->categorie_id,
            ]);
            
            // Historique
            DB::table('historiques')->insert([
                'user_id' => Auth::id(),
                'action' => 'UPDATE',
                'module' => 'categorie',
                'cible_id' => $categorie->id,
                'cible_type' => 'SousCategorie',
                'description' => 'Modification de la sous-catégorie : ' . $categorie->nom,
                'ancienne_valeur' => json_encode($categorie->getOriginal()),
                'nouvelle_valeur' => json_encode($categorie->toArray()),
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'created_at' => now()
            ]);
            
            return response()->json([
                'success' => true,
                'message' => 'Catégorie mise à jour avec succès',
                'categorie' => $categorie
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la mise à jour: ' . $e->getMessage()
            ], 500);
        }
    }

    public function telecharger_document($id){
        try {
            $document = Document::findOrFail($id);
            
            // Vérifier si l'utilisateur a le droit d'accéder à ce document
            $user = Auth::user();
            if (!$user || ($document->user_id !== $user->id && $document->niveau_confidentialite === 'secret')) {
                return redirect()->back()->with('error', 'Vous n\'avez pas l\'autorisation de télécharger ce document');
            }
            
            $filePath = storage_path('app/public/' . $document->fichier);
            
            if (!file_exists($filePath)) {
                return redirect()->back()->with('error', 'Fichier introuvable');
            }
            
            // Enregistrer l'action dans l'historique
            DB::table('historiques')->insert([
                'user_id' => Auth::id(),
                'action' => 'DOWNLOAD',
                'module' => 'document',
                'cible_id' => $document->id,
                'cible_type' => 'Document',
                'description' => 'Téléchargement du document : ' . $document->titre,
                'nouvelle_valeur' => json_encode(['file_path' => $document->fichier]),
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'created_at' => now()
            ]);
            
            return response()->download($filePath, $document->titre . '.' . $document->type_fichier);
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors du téléchargement: ' . $e->getMessage());
        }
    }

    public function voir_document($id){
        try {
            $document = Document::findOrFail($id);
            
            // Vérifier si l'utilisateur a le droit d'accéder à ce document
            $user = Auth::user();
            if (!$user || ($document->user_id !== $user->id && $document->niveau_confidentialite === 'secret')) {
                return redirect()->back()->with('error', 'Vous n\'avez pas l\'autorisation de consulter ce document');
            }
            
            $filePath = storage_path('app/public/' . $document->fichier);
            
            if (!file_exists($filePath)) {
                return redirect()->back()->with('error', 'Fichier introuvable');
            }
            
            // Enregistrer l'action dans l'historique
            DB::table('historiques')->insert([
                'user_id' => Auth::id(),
                'action' => 'VIEW',
                'module' => 'document',
                'cible_id' => $document->id,
                'cible_type' => 'Document',
                'description' => 'Consultation du document : ' . $document->titre,
                'nouvelle_valeur' => json_encode(['file_path' => $document->fichier]),
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'created_at' => now()
            ]);
            
            // Pour les PDF, on peut les afficher directement dans le navigateur
            if ($document->type_fichier === 'pdf') {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'inline; filename="' . $document->titre . '.pdf"'
                ]);
            }
            
            // Pour les images, on peut les afficher directement
            if (in_array($document->type_fichier, ['jpg', 'jpeg', 'png', 'gif'])) {
                return response()->file($filePath);
            }
            
            // Pour les autres types de fichiers, on force le téléchargement
            return response()->download($filePath, $document->titre . '.' . $document->type_fichier);
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la consultation: ' . $e->getMessage());
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
