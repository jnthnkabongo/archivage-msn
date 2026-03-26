@extends('entete.entete')
@section('content')

    <!-- Main Content Area -->
    <main class="flex-1 p-8 ml-64">
        <div class="max-w-7xl mx-auto">
            <!-- Header Section -->
            <div class="bg-gradient-to-r from-gray-50 to-white rounded-xl shadow-lg border border-gray-200 p-6 mb-8 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-indigo-500 to-indigo-600 opacity-10 rounded-full -mr-16 -mt-16"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-800 mb-2">Gestion des Rôles</h1>
                            <p class="text-gray-600">Gérez les rôles et permissions du système</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <button onclick="showAddRoleModal()" class="flex items-center px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700 transition-colors transform hover:scale-105">
                                <i class="fas fa-plus mr-2"></i>
                                Ajouter un rôle
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
                                   placeholder="Rechercher un rôle..." 
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent"
                                   onkeyup="filterRoles()">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                        <select id="statusFilter" class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent" onchange="filterRoles()">
                            <option value="">Tous les statuts</option>
                            <option value="active">Actif</option>
                            <option value="inactive">Inactif</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Roles Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8" id="rolesGrid">
                <!-- Exemple de cartes de rôles -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6 hover:shadow-xl transition-all duration-300 transform hover:scale-105 relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-600 opacity-10 rounded-full -mr-10 -mt-10 group-hover:opacity-20 transition-opacity"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-gradient-to-br from-purple-100 to-purple-200 rounded-xl shadow-inner">
                                <i class="fas fa-user-shield text-purple-600 text-xl"></i>
                            </div>
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Actif</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Administrateur</h3>
                        <p class="text-sm text-gray-600 mb-4">Accès complet à toutes les fonctionnalités du système</p>
                        <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                            <span><i class="fas fa-users mr-1"></i> 3 utilisateurs</span>
                            <span><i class="fas fa-key mr-1"></i> 15 permissions</span>
                        </div>
                        <div class="space-y-2">
                            <div class="flex flex-wrap gap-1">
                                <span class="px-2 py-1 text-xs bg-gray-100 text-gray-600 rounded-full">CRUD Users</span>
                                <span class="px-2 py-1 text-xs bg-gray-100 text-gray-600 rounded-full">CRUD Docs</span>
                                <span class="px-2 py-1 text-xs bg-gray-100 text-gray-600 rounded-full">Settings</span>
                                <span class="px-2 py-1 text-xs bg-gray-100 text-gray-600 rounded-full">+12</span>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center space-x-2">
                            <button class="flex-1 text-blue-600 hover:text-blue-800 transition-colors text-sm">
                                <i class="fas fa-edit mr-1"></i>
                                Modifier
                            </button>
                            <button class="text-red-600 hover:text-red-800 transition-colors text-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6 hover:shadow-xl transition-all duration-300 transform hover:scale-105 relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 opacity-10 rounded-full -mr-10 -mt-10 group-hover:opacity-20 transition-opacity"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl shadow-inner">
                                <i class="fas fa-folder text-blue-600 text-xl"></i>
                            </div>
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Actif</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Archiviste</h3>
                        <p class="text-sm text-gray-600 mb-4">Gestion des archives et documents</p>
                        <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                            <span><i class="fas fa-users mr-1"></i> 8 utilisateurs</span>
                            <span><i class="fas fa-key mr-1"></i> 8 permissions</span>
                        </div>
                        <div class="space-y-2">
                            <div class="flex flex-wrap gap-1">
                                <span class="px-2 py-1 text-xs bg-gray-100 text-gray-600 rounded-full">CRUD Docs</span>
                                <span class="px-2 py-1 text-xs bg-gray-100 text-gray-600 rounded-full">CRUD Archives</span>
                                <span class="px-2 py-1 text-xs bg-gray-100 text-gray-600 rounded-full">Export</span>
                                <span class="px-2 py-1 text-xs bg-gray-100 text-gray-600 rounded-full">+5</span>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center space-x-2">
                            <button class="flex-1 text-blue-600 hover:text-blue-800 transition-colors text-sm">
                                <i class="fas fa-edit mr-1"></i>
                                Modifier
                            </button>
                            <button class="text-red-600 hover:text-red-800 transition-colors text-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6 hover:shadow-xl transition-all duration-300 transform hover:scale-105 relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 opacity-10 rounded-full -mr-10 -mt-10 group-hover:opacity-20 transition-opacity"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-gradient-to-br from-green-100 to-green-200 rounded-xl shadow-inner">
                                <i class="fas fa-user text-green-600 text-xl"></i>
                            </div>
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Actif</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Utilisateur</h3>
                        <p class="text-sm text-gray-600 mb-4">Accès limité aux documents et archives</p>
                        <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                            <span><i class="fas fa-users mr-1"></i> 25 utilisateurs</span>
                            <span><i class="fas fa-key mr-1"></i> 4 permissions</span>
                        </div>
                        <div class="space-y-2">
                            <div class="flex flex-wrap gap-1">
                                <span class="px-2 py-1 text-xs bg-gray-100 text-gray-600 rounded-full">Read Docs</span>
                                <span class="px-2 py-1 text-xs bg-gray-100 text-gray-600 rounded-full">Read Archives</span>
                                <span class="px-2 py-1 text-xs bg-gray-100 text-gray-600 rounded-full">Download</span>
                                <span class="px-2 py-1 text-xs bg-gray-100 text-gray-600 rounded-full">+1</span>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center space-x-2">
                            <button class="flex-1 text-blue-600 hover:text-blue-800 transition-colors text-sm">
                                <i class="fas fa-edit mr-1"></i>
                                Modifier
                            </button>
                            <button class="text-red-600 hover:text-red-800 transition-colors text-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6 hover:shadow-xl transition-all duration-300 transform hover:scale-105 relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-red-500 to-red-600 opacity-10 rounded-full -mr-10 -mt-10 group-hover:opacity-20 transition-opacity"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-gradient-to-br from-red-100 to-red-200 rounded-xl shadow-inner">
                                <i class="fas fa-eye text-red-600 text-xl"></i>
                            </div>
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Inactif</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Consultant</h3>
                        <p class="text-sm text-gray-600 mb-4">Accès en lecture seule aux documents</p>
                        <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                            <span><i class="fas fa-users mr-1"></i> 6 utilisateurs</span>
                            <span><i class="fas fa-key mr-1"></i> 2 permissions</span>
                        </div>
                        <div class="space-y-2">
                            <div class="flex flex-wrap gap-1">
                                <span class="px-2 py-1 text-xs bg-gray-100 text-gray-600 rounded-full">Read Docs</span>
                                <span class="px-2 py-1 text-xs bg-gray-100 text-gray-600 rounded-full">Read Archives</span>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center space-x-2">
                            <button class="flex-1 text-blue-600 hover:text-blue-800 transition-colors text-sm">
                                <i class="fas fa-edit mr-1"></i>
                                Modifier
                            </button>
                            <button class="text-red-600 hover:text-red-800 transition-colors text-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 px-6 py-4">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-700">
                        Affichage de 1 à 4 sur 4 rôles
                    </div>
                    <div class="flex items-center space-x-2">
                        <button class="px-3 py-1 text-sm text-gray-500 hover:text-gray-700 transition-colors">
                            <i class="fas fa-chevron-left"></i>
                            Précédent
                        </button>
                        <button class="px-3 py-1 text-sm text-gray-500 hover:text-gray-700 transition-colors">1</button>
                        <button class="px-3 py-1 text-sm text-gray-500 hover:text-gray-700 transition-colors">Suivant</button>
                        <button class="px-3 py-1 text-sm text-gray-500 hover:text-gray-700 transition-colors">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Add Role Modal -->
    <div id="addRoleModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50 flex items-center justify-center">
        <div class="bg-white rounded-xl shadow-2xl p-6 m-4 max-w-md w-full">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold text-gray-800">Ajouter un rôle</h3>
                <button onclick="hideAddRoleModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form method="POST" action="" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nom du rôle</label>
                    <input type="text" name="name" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea name="description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Permissions</label>
                    <div class="space-y-2 max-h-40 overflow-y-auto border border-gray-300 rounded-lg p-3">
                        <div class="flex items-center">
                            <input type="checkbox" name="permissions[]" value="users.create" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                            <label class="ml-2 text-sm text-gray-700">Créer des utilisateurs</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="permissions[]" value="users.read" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                            <label class="ml-2 text-sm text-gray-700">Voir les utilisateurs</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="permissions[]" value="users.update" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                            <label class="ml-2 text-sm text-gray-700">Modifier les utilisateurs</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="permissions[]" value="users.delete" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                            <label class="ml-2 text-sm text-gray-700">Supprimer les utilisateurs</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="permissions[]" value="documents.create" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                            <label class="ml-2 text-sm text-gray-700">Créer des documents</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="permissions[]" value="documents.read" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                            <label class="ml-2 text-sm text-gray-700">Voir les documents</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="permissions[]" value="documents.update" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                            <label class="ml-2 text-sm text-gray-700">Modifier les documents</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="permissions[]" value="documents.delete" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                            <label class="ml-2 text-sm text-gray-700">Supprimer les documents</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="permissions[]" value="archives.create" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                            <label class="ml-2 text-sm text-gray-700">Créer des archives</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="permissions[]" value="archives.read" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                            <label class="ml-2 text-sm text-gray-700">Voir les archives</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="permissions[]" value="archives.update" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                            <label class="ml-2 text-sm text-gray-700">Modifier les archives</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="permissions[]" value="archives.delete" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                            <label class="ml-2 text-sm text-gray-700">Supprimer les archives</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="permissions[]" value="settings.access" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                            <label class="ml-2 text-sm text-gray-700">Accès aux paramètres</label>
                        </div>
                    </div>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="is_active" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500" checked>
                    <label class="ml-2 text-sm text-gray-700">Rôle actif</label>
                </div>
                <div class="flex items-center justify-end space-x-4 pt-4">
                    <button type="button" onclick="hideAddRoleModal()" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 transition-colors">
                        Annuler
                    </button>
                    <button type="submit" class="px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700 transition-colors">
                        <i class="fas fa-save mr-2"></i>
                        Ajouter le rôle
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Show/Hide Add Role Modal
        function showAddRoleModal() {
            document.getElementById('addRoleModal').classList.remove('hidden');
        }

        function hideAddRoleModal() {
            document.getElementById('addRoleModal').classList.add('hidden');
        }

        // Filter roles
        function filterRoles() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const statusFilter = document.getElementById('statusFilter').value;
            const cards = document.querySelectorAll('#rolesGrid > div');
            
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