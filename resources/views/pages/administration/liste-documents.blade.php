@extends('entete.entete')
@section('content')

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Main Content Area -->
    <main class="">
        <div class="max-w-7xl mx-auto">
            <!-- Header Section -->
            <div class="bg-gradient-to-r from-gray-50 to-white rounded-xl shadow-lg border border-gray-200 p-6 mb-8 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-green-500 to-green-600 opacity-10 rounded-full -mr-16 -mt-16"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-800 mb-2">Gestion des Documents</h1>
                            <p class="text-gray-600">Gérez les documents du système d'archivage</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <button onclick="showAddDocumentModal()" class="flex items-center px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700 transition-colors transform hover:scale-105">
                                <i class="fas fa-plus mr-2"></i>
                                Ajouter un document
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Messages Flash -->
            @if(session('success'))
                <div class="fixed top-4 right-4 z-50 animate-pulse">
                    <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-lg shadow-lg" role="alert">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle mr-3"></i>
                            <span>{{ session('success') }}</span>
                        </div>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="fixed top-4 right-4 z-50 animate-pulse">
                    <div class="bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded-lg shadow-lg" role="alert">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-circle mr-3"></i>
                            <span>{{ session('error') }}</span>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Search and Filter Section -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6 mb-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 space-y-4 md:space-y-0 md:space-x-4">
                    <div class="relative flex-1">
                        <input 
                            type="text" 
                            id="searchInput" 
                            placeholder="Rechercher un document..." 
                            class="w-full pl-10 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent"
                            onkeyup="handleSearchKeyup(event)"
                        >
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <button 
                            onclick="performSearch()" 
                            class="absolute right-2 top-1/2 transform -translate-y-1/2 px-3 py-1.5 bg-gray-600 hover:bg-gray-700 text-white text-sm rounded-md transition-colors duration-200"
                            title="Lancer la recherche"
                        >
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                        <select id="typeFilter" class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent" onchange="filterDocuments()">
                            <option value="">Tous les types</option>
                            <option value="pdf">PDF</option>
                            <option value="doc">Word</option>
                            <option value="docx">Word</option>
                            <option value="xls">Excel</option>
                            <option value="xlsx">Excel</option>
                            <option value="png">PNG</option>
                            <option value="jpg">JPG</option>
                            <option value="jpeg">JPEG</option>
                        </select>
                        <select id="statusFilter" class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent" onchange="filterDocuments()">
                            <option value="">Tous les statuts</option>
                            <option value="draft">Brouillon</option>
                            <option value="validated">Validé</option>
                            <option value="archived">Archivé</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Documents Table -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6 mb-8">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    #
                                </th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Document</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Référence</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catégorie</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Créé par</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th> 
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="documentsTableBody" class="bg-white divide-y divide-gray-200">
                            <!-- Exemple de lignes de documents -->
                            @forelse($documentsliste as $key => $document)
                                <tr class="hover:bg-gray-50 transition-colors">
                                   <td class="px-4 py-2 whitespace-nowrap text-center text-xs font-medium text-gray-600">
                                        {{ ($documentsliste->currentPage() - 1) * $documentsliste->perPage() + $key + 1 }}
                                   </td>
                                    <td class="px-4 py-2 whitespace-nowrap">   
                                        <div class="ml-3">
                                            <div class="text-xs font-medium text-gray-900">{{ \Illuminate\Support\Str::limit(ucfirst($document->titre), 40) }}</div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">{{ $document->reference }}</span>
                                    </td>
                                    <td class="px-4 py-2 whitespace-nowrap text-xs">
                                        {{ \Illuminate\Support\Str::limit(ucfirst($document->service->nom), 10) }}
                                    </td>
                                    <td class="px-4 py-2 whitespace-nowrap text-xs">
                                        {{ \Illuminate\Support\Str::limit(ucfirst($document->category->nom), 10) }}
                                    </td>
                                    <td class="px-4 py-2 whitespace-nowrap text-xs">
                                        {{ \Illuminate\Support\Str::limit(ucfirst($document->type), 5) }} -
                                         @switch($document->type_fichier)
                                            @case('pdf')
                                                <i class="fas fa-file-pdf text-red-500 text-lg"></i>
                                                @break
                                            @case('doc')
                                            @case('docx')
                                                <i class="fas fa-file-word text-blue-500 text-lg"></i>
                                                @break
                                            @case('xls')
                                            @case('xlsx')
                                                <i class="fas fa-file-excel text-green-500 text-lg"></i>
                                                @break
                                            @case('png')
                                            @case('jpg')
                                            @case('jpeg')
                                                <i class="fas fa-file-image text-purple-500 text-lg"></i>
                                                @break
                                            @default
                                                <i class="fas fa-file text-gray-500 text-lg"></i>
                                        @endswitch
                                    </td>
                                     <td class="px-4 py-2 whitespace-nowrap text-xs text-gray-600">
                                        {{ \Illuminate\Support\Str::limit(ucfirst($document->user?->name ?? 'Inconnu'), 10) }}
                                    </td>
                                   <td class="px-4 py-2 whitespace-nowrap text-xs text-gray-600">
                                    {{ \Illuminate\Support\Str::limit(ucfirst($document->description), 10) }}
                                   </td>
                                    <td class="px-4 py-2 whitespace-nowrap text-xs">
                                        <div class="flex items-center space-x-1">
                                            <a href="{{ route('telecharger-document', $document->id) }}" class="p-1.5 text-blue-600 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 rounded-lg transition-all duration-200 group" title="Télécharger">
                                                <i class="fas fa-download text-sm group-hover:scale-110 transition-transform"></i>
                                            </a>
                                            <a href="{{ route('voir-document', $document->id) }}" class="p-1.5 text-gray-600 bg-gray-50 hover:bg-gray-100 hover:text-gray-700 rounded-lg transition-all duration-200 group" title="Voir">
                                                <i class="fas fa-eye text-sm group-hover:scale-110 transition-transform"></i>
                                            </a>
                                            <a href="#" onclick="supprimerDocument({{ $document->id }}, '{{ $document->titre }}')" class="p-1.5 text-red-600 bg-red-50 hover:bg-red-100 hover:text-red-700 rounded-lg transition-all duration-200 group" title="Supprimer">
                                                <i class="fas fa-trash text-sm group-hover:scale-110 transition-transform"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="px-4 py-2 text-center text-xs text-gray-500">
                                        Aucun document trouvé
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 px-6 py-4">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-700"></div>
                    <div class="flex items-center space-x-2">
                        
                        @if($documentsliste->hasPages())

                            {{ $documentsliste->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Add Document Modal -->
    <div id="addDocumentModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50 flex items-center justify-center">
        <div class="bg-white rounded-xl shadow-2xl p-6 m-4 max-w-4xl w-full max-h-[90vh] overflow-y-auto">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold text-gray-800">Ajouter un document</h3>
                <button onclick="hideAddDocumentModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form method="POST" action="{{ route('enregistrer.document') }}" enctype="multipart/form-data">
                @csrf
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                        <div class="text-red-800 font-medium mb-2">Veuillez corriger les erreurs suivantes :</div>
                        <ul class="text-sm text-red-700 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Ligne 1 -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Titre du document *</label>
                        <input type="text" name="titre" required class="w-full px-3 py-2 border @error('titre') border-red-500 @enderror border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent" placeholder="Entrez le titre du document">
                        @error('titre')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Référence</label>
                        <input type="text" name="reference" value="{{ $nextReference ?? 'DOC-' . date('Y') . '-000001' }}" readonly class="w-full px-3 py-2 border bg-gray-100 border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent cursor-not-allowed" placeholder="Référence générée automatiquement">
                        <p class="text-xs text-gray-500 mt-1">Référence générée automatiquement</p>
                    </div>
                    
                    <!-- Ligne 2 -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Fichier *</label>
                        <input type="file" name="fichier" required class="w-full px-3 py-2 border @error('fichier') border-red-500 @enderror border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent" accept=".pdf,.doc,.docx,.xls,.xlsx,.png,.jpg,.jpeg">
                        @error('fichier')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="text-xs text-gray-500 mt-1">Formats acceptés: PDF, DOC, DOCX, XLS, XLSX, PNG, JPG, JPEG</p>
                    </div>
                    
                    <!-- Ligne 3 -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Type de document *</label>
                        <select name="type" required class="w-full px-3 py-2 border @error('type') border-red-500 @enderror border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                            <option value="">Sélectionner un type</option>
                            <option value="entrant">Entrant</option>
                            <option value="sortant">Sortant</option>
                            <option value="interne">Interne</option>
                        </select>
                        @error('type')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                     <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Service</label>
                        <select name="service_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                            <option value="">Sélectionner un service</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}">{{ ucfirst($service->nom) }}</option>
                                @endforeach
                          
                        </select>
                    </div>

                    <!-- Ligne 4 -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Catégorie</label>
                        <select name="categorie_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent" onchange="loadSousCategories(this.value)">
                            <option value="">Sélectionner une catégorie</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ ucfirst($category->nom) }}</option>
                                @endforeach
                            
                        </select>
                    </div>
                    
                
                   
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Sous-catégorie</label>
                        <select id="sousCategorieSelect" name="sous_categorie_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                            <option value="">Sélectionner une sous-catégorie</option>
                            
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Niveau de confidentialité</label>
                        <select name="niveau_confidentialite" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                            <option value="public">Public</option>
                            <option value="interne">Interne</option>
                            <option value="confidentiel">Confidentiel</option>
                            <option value="secret">Secret</option>
                        </select>
                    </div>
                    
                    <!-- Ligne 6 -->
                    <div class="">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea name="description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent" placeholder="Description du document (optionnel)"></textarea>
                    </div>
                </div>
                
                <div class="flex items-center justify-end space-x-4 pt-6 mt-6 border-t border-gray-200">
                    <button type="button" onclick="hideAddDocumentModal()" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 transition-colors">
                        Annuler
                    </button>
                    <button type="submit" class="px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700 transition-colors">
                        <i class="fas fa-save mr-2"></i>
                        Ajouter le document
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Show/Hide Add Document Modal
        function showAddDocumentModal() {
            document.getElementById('addDocumentModal').classList.remove('hidden');
        }

        function hideAddDocumentModal() {
            document.getElementById('addDocumentModal').classList.add('hidden');
        }

        // Handle search keyup event
        function handleSearchKeyup(event) {
            if (event.key === 'Enter') {
                performSearch();
            }
        }

        // Perform manual search
        function performSearch() {
            const searchInput = document.getElementById('searchInput').value;
            const typeFilter = document.getElementById('typeFilter').value;
            const statusFilter = document.getElementById('statusFilter').value;
            
            // Construire l'URL avec les paramètres de recherche
            const params = new URLSearchParams();
            if (searchInput) params.append('search', searchInput);
            if (typeFilter) params.append('type', typeFilter);
            if (statusFilter) params.append('status', statusFilter);
            
            // Rediriger vers la page de recherche
            const url = params.toString() ? `{{ route('rechercher-documents') }}?${params.toString()}` : '{{ route('liste-documents') }}';
            window.location.href = url;
        }

        // Filter documents (maintien pour compatibilité)
        function filterDocuments() {
            performSearch();
        }

        // Load sous-categories dynamically
        function loadSousCategories(categorieId) {
            if (!categorieId) {
                document.getElementById('sousCategorieSelect').innerHTML = '<option value="">Sélectionner une sous-catégorie</option>';
                return;
            }

            fetch(`/sous-categories/${categorieId}`)
                .then(response => response.json())
                .then(data => {
                    let options = '<option value="">Sélectionner une sous-catégorie</option>';
                    data.forEach(sousCat => {
                        options += `<option value="${sousCat.id}">${sousCat.nom.charAt(0).toUpperCase() + sousCat.nom.slice(1)}</option>`;
                    });
                    document.getElementById('sousCategorieSelect').innerHTML = options;
                })
                .catch(error => console.error('Error loading sous-categories:', error));
        }

        // Toggle select all
        function toggleSelectAll() {
            const selectAll = document.getElementById('selectAll');
            const checkboxes = document.querySelectorAll('#documentsTableBody input[type="checkbox"]:not(#selectAll)');
            
            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAll.checked;
            });
        }

        // Préserver les filtres lors du chargement de la page
        document.addEventListener('DOMContentLoaded', function() {
            // Récupérer les paramètres de l'URL
            const urlParams = new URLSearchParams(window.location.search);
            const search = urlParams.get('search');
            const type = urlParams.get('type');
            const status = urlParams.get('status');
            
            // Préserver les valeurs dans les champs de recherche
            if (search) document.getElementById('searchInput').value = search;
            if (type) document.getElementById('typeFilter').value = type;
            if (status) document.getElementById('statusFilter').value = status;

            // Cacher automatiquement les messages flash après 5 secondes
            setTimeout(() => {
                const alerts = document.querySelectorAll('[role="alert"]');
                alerts.forEach(alert => {
                    alert.style.opacity = '0';
                    alert.style.transition = 'opacity 0.5s';
                    setTimeout(() => {
                        alert.remove();
                    }, 500);
                });
            }, 5000);
        });

        // Fonction pour supprimer un document avec SweetAlert
        function supprimerDocument(documentId, documentTitre) {
            Swal.fire({
                title: 'Êtes-vous sûr ?',
                html: `<p>Voulez-vous vraiment supprimer le document suivant ?</p><p><strong>${documentTitre}</strong></p><p>Cette action est <strong>irréversible</strong> !</p>`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Oui, supprimer',
                cancelButtonText: 'Annuler',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Afficher le chargement
                    Swal.fire({
                        title: 'Suppression en cours...',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Créer un formulaire caché pour la suppression
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `/documents/${documentId}`;
                    
                    // Ajouter le champ _method pour simuler DELETE
                    const methodInput = document.createElement('input');
                    methodInput.type = 'hidden';
                    methodInput.name = '_method';
                    methodInput.value = 'DELETE';
                    form.appendChild(methodInput);
                    
                    // Ajouter le token CSRF
                    const csrfInput = document.createElement('input');
                    csrfInput.type = 'hidden';
                    csrfInput.name = '_token';
                    csrfInput.value = '{{ csrf_token() }}';
                    form.appendChild(csrfInput);
                    
                    // Soumettre le formulaire
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        }
    </script>
@endsection