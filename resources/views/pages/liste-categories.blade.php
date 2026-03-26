@extends('entete.entete')
@section('content')

    <!-- Main Content Area -->
    <main class="">
        <div class="max-w-7xl mx-auto">
            <!-- Header Section -->
            <div class="bg-gradient-to-r from-gray-50 to-white rounded-xl shadow-lg border border-gray-200 p-6 mb-8 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-orange-500 to-orange-600 opacity-10 rounded-full -mr-16 -mt-16"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-800 mb-2">Gestion des Catégories</h1>
                            <p class="text-gray-600">Gérez les catégories de documents et archives</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <button onclick="showAddCategoryModal()" class="flex items-center px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700 transition-colors transform hover:scale-105">
                                <i class="fas fa-plus mr-2"></i>
                                Ajouter une catégorie
                            </button>
                            <button class="flex items-center px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                                <i class="fas fa-download mr-2"></i>
                                Exporter
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search and Filter Section -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6 mb-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 space-y-4 md:space-y-0 md:space-x-4">
                    <div class="flex-1">
                        <div class="relative">
                            <input type="text" 
                                   id="searchInput" 
                                   placeholder="Rechercher une catégorie..." 
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent"
                                   onkeyup="filterCategories()">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                        <select id="statusFilter" class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent" onchange="filterCategories()">
                            <option value="">Tous les statuts</option>
                            <option value="active">Actif</option>
                            <option value="inactive">Inactif</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Categories Table -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6 mb-8">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <input type="checkbox" id="selectAllCategories" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500" onchange="toggleAllCategories()">
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catégorie</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Documents</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Archives</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50 transition-colors category-item">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <input type="checkbox" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500 category-checkbox">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="p-2 bg-orange-100 rounded-lg mr-3">
                                            <i class="fas fa-folder text-orange-600 text-lg"></i>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">Administratif</div>
                                            <div class="text-xs text-gray-500">ID: #001</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">Documents administratifs et légaux</div>
                                    <div class="text-xs text-gray-500">Contrats, factures, rapports</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">245 documents</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">89 archives</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full">Actif</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center space-x-2">
                                        <button onclick="viewCategory('Administratif')" class="text-indigo-600 hover:text-indigo-900" title="Voir">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button onclick="editCategory('Administratif')" class="text-blue-600 hover:text-blue-900" title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button onclick="deleteCategory('Administratif')" class="text-red-600 hover:text-red-900" title="Supprimer">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors category-item">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <input type="checkbox" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500 category-checkbox">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="p-2 bg-blue-100 rounded-lg mr-3">
                                            <i class="fas fa-file-medical text-blue-600 text-lg"></i>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">Médical</div>
                                            <div class="text-xs text-gray-500">ID: #002</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">Dossiers médicaux et de santé</div>
                                    <div class="text-xs text-gray-500">Patients, traitements, analyses</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">189 documents</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">156 archives</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full">Actif</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center space-x-2">
                                        <button onclick="viewCategory('Médical')" class="text-indigo-600 hover:text-indigo-900" title="Voir">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button onclick="editCategory('Médical')" class="text-blue-600 hover:text-blue-900" title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button onclick="deleteCategory('Médical')" class="text-red-600 hover:text-red-900" title="Supprimer">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors category-item">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <input type="checkbox" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500 category-checkbox">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="p-2 bg-green-100 rounded-lg mr-3">
                                            <i class="fas fa-chart-line text-green-600 text-lg"></i>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">Finance</div>
                                            <div class="text-xs text-gray-500">ID: #003</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">Rapports financiers et budgétaires</div>
                                    <div class="text-xs text-gray-500">Budgets, comptes, bilans</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">312 documents</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">234 archives</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full">Actif</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center space-x-2">
                                        <button onclick="viewCategory('Finance')" class="text-indigo-600 hover:text-indigo-900" title="Voir">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button onclick="editCategory('Finance')" class="text-blue-600 hover:text-blue-900" title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button onclick="deleteCategory('Finance')" class="text-red-600 hover:text-red-900" title="Supprimer">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors category-item">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <input type="checkbox" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500 category-checkbox">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="p-2 bg-purple-100 rounded-lg mr-3">
                                            <i class="fas fa-graduation-cap text-purple-600 text-lg"></i>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">Éducation</div>
                                            <div class="text-xs text-gray-500">ID: #004</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">Documents pédagogiques et éducatifs</div>
                                    <div class="text-xs text-gray-500">Cours, programmes, évaluations</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">156 documents</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">98 archives</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full">Actif</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center space-x-2">
                                        <button onclick="viewCategory('Éducation')" class="text-indigo-600 hover:text-indigo-900" title="Voir">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button onclick="editCategory('Éducation')" class="text-blue-600 hover:text-blue-900" title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button onclick="deleteCategory('Éducation')" class="text-red-600 hover:text-red-900" title="Supprimer">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors category-item">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <input type="checkbox" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500 category-checkbox">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="p-2 bg-red-100 rounded-lg mr-3">
                                            <i class="fas fa-users text-red-600 text-lg"></i>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">Ressources Humaines</div>
                                            <div class="text-xs text-gray-500">ID: #005</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">Gestion du personnel et RH</div>
                                    <div class="text-xs text-gray-500">Contrats, évaluations, formations</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">98 documents</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">67 archives</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs bg-gray-100 text-gray-800 rounded-full">Inactif</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center space-x-2">
                                        <button onclick="viewCategory('Ressources Humaines')" class="text-indigo-600 hover:text-indigo-900" title="Voir">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button onclick="editCategory('Ressources Humaines')" class="text-blue-600 hover:text-blue-900" title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button onclick="deleteCategory('Ressources Humaines')" class="text-red-600 hover:text-red-900" title="Supprimer">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 px-6 py-4">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-700">
                        Affichage de 1 à 4 sur 8 catégories
                    </div>
                    <div class="flex items-center space-x-2">
                        <button class="px-3 py-1 text-sm text-gray-500 hover:text-gray-700 transition-colors">
                            <i class="fas fa-chevron-left"></i>
                            Précédent
                        </button>
                        <button class="px-3 py-1 text-sm text-gray-500 hover:text-gray-700 transition-colors">1</button>
                        <button class="px-3 py-1 text-sm text-gray-500 hover:text-gray-700 transition-colors">2</button>
                        <button class="px-3 py-1 text-sm text-gray-500 hover:text-gray-700 transition-colors">Suivant</button>
                        <button class="px-3 py-1 text-sm text-gray-500 hover:text-gray-700 transition-colors">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Add Category Modal -->
    <div id="addCategoryModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50 flex items-center justify-center">
        <div class="bg-white rounded-xl shadow-2xl p-6 m-4 max-w-md w-full">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold text-gray-800">Ajouter une catégorie</h3>
                <button onclick="hideAddCategoryModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form method="POST" action="" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nom de la catégorie</label>
                    <input type="text" name="name" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea name="description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Icône</label>
                    <select name="icon" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                        <option value="fa-folder">Dossier</option>
                        <option value="fa-dollar-sign">Finance</option>
                        <option value="fa-bullhorn">Marketing</option>
                        <option value="fa-users">RH</option>
                        <option value="fa-cog">Technique</option>
                        <option value="fa-graduation-cap">Formation</option>
                        <option value="fa-shield-alt">Sécurité</option>
                        <option value="fa-chart-bar">Statistiques</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Couleur</label>
                    <select name="color" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                        <option value="blue">Bleu</option>
                        <option value="green">Vert</option>
                        <option value="purple">Violet</option>
                        <option value="red">Rouge</option>
                        <option value="orange">Orange</option>
                        <option value="yellow">Jaune</option>
                        <option value="pink">Rose</option>
                        <option value="gray">Gris</option>
                    </select>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="is_active" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500" checked>
                    <label class="ml-2 text-sm text-gray-700">Catégorie active</label>
                </div>
                <div class="flex items-center justify-end space-x-4 pt-4">
                    <button type="button" onclick="hideAddCategoryModal()" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 transition-colors">
                        Annuler
                    </button>
                    <button type="submit" class="px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700 transition-colors">
                        <i class="fas fa-save mr-2"></i>
                        Ajouter la catégorie
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Show/Hide Add Category Modal
        function showAddCategoryModal() {
            document.getElementById('addCategoryModal').classList.remove('hidden');
        }

        function hideAddCategoryModal() {
            document.getElementById('addCategoryModal').classList.add('hidden');
        }

        // Filter categories
        function filterCategories() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const statusFilter = document.getElementById('statusFilter').value;
            const cards = document.querySelectorAll('#categoriesGrid > div');
            
            cards.forEach(card => {
                const name = card.querySelector('h3').textContent.toLowerCase();
                const description = card.querySelector('p').textContent.toLowerCase();
                const status = card.querySelector('.rounded-full').textContent.trim();
                
                let showCard = true;
                
                if (searchTerm && !name.includes(searchTerm) && !description.includes(searchTerm)) {
                    showCard = false;
                }
                
                if (statusFilter && status !== statusFilter) {
                    showCard = false;
                }
                
                card.style.display = showCard ? '' : 'none';
            });
        }
    </script>
@endsection