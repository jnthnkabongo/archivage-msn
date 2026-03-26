<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Service;
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
        return view('login');
    }

    public function dashboard(){
        return view('pages.dashboard');
    }

    public function liste_utilisateurs(){
        return view('pages.liste-utilisateurs');
    }
    
    public function liste_archives(){
        return view('pages.liste-archives');
    }

    public function liste_documents(){
        $nextReference = 'DOC-MNS-' . date('Y') . '-' . strtoupper(Str::random(6));
        $categories = Category::orderBy('nom', 'asc')->get();
        $services = Service::orderBy('nom', 'asc')->get();
        $documentsliste = Document::with('category', 'service','user','versions','archive','partages.user')->orderBy('created_at', 'desc')->paginate('2');
        return view('pages.liste-documents', compact('nextReference', 'categories', 'services', 'documentsliste'));
    }

    public function liste_services(){
        return view('pages.liste-services');
    }

    public function liste_roles(){
        return view('pages.liste-roles');
    }

    public function liste_categories(){
        return view('pages.liste-categories');
    }

    public function parametres(){
        return view('pages.parametres');
    }

    public function statistiques(){
        return view('pages.statistiques');
    }

    public function historique(){
        return view('pages.historiques');
    }

    public function enregistrer_fichier(Request $request){
    
        // 1. VALIDATION
        $request->validate([
            'titre' => 'required|string|max:255',
            'reference' => 'required|string|max:100|unique:documents,reference',
            'fichier' => 'required|file|mimes:pdf,doc,docx,xlsx,png,jpg,jpeg|max:5120',
            'description' => 'nullable|string|max:1000',
            'type' => 'required|in:entrant,sortant,interne',
            'statut' => 'required|in:draft,validated,archived',
            'date_document' => 'nullable|date',
            'categorie_id' => 'nullable|exists:categories,id',
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
