@extends('entete.entete')
@section('content')

    <!-- Main Content Area -->
    <main class="">
        <div class="max-w-7xl mx-auto">
            <!-- Header Section -->
            <div class="bg-gradient-to-r from-gray-50 to-white rounded-xl shadow-lg border border-gray-200 p-6 mb-8 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-amber-500 to-amber-600 opacity-10 rounded-full -mr-16 -mt-16"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-800 mb-2">Historique des Activités</h1>
                            <p class="text-gray-600">Consultez l'historique complet des actions du système</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <button class="flex items-center px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                                <i class="fas fa-download mr-2"></i>
                                Exporter
                            </button>
                            <button class="flex items-center px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700 transition-colors">
                                <i class="fas fa-filter mr-2"></i>
                                Filtrer
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
                                   placeholder="Rechercher dans l'historique..." 
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent"
                                   onkeyup="filterHistory()">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                        <select id="actionFilter" class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent" onchange="filterHistory()">
                            <option value="">Toutes les actions</option>
                            <option value="create">Création</option>
                            <option value="update">Modification</option>
                            <option value="delete">Suppression</option>
                            <option value="view">Consultation</option>
                            <option value="download">Téléchargement</option>
                        </select>
                        <input type="date" id="dateFilter" class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent" onchange="filterHistory()">
                    </div>
                </div>
            </div>

            <!-- Timeline View -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6 mb-8">
                <h2 class="text-xl font-bold text-gray-800 mb-6">Timeline des activités</h2>
                <div class="relative">
                    <!-- Timeline Line -->
                    <div class="absolute left-8 top-0 bottom-0 w-0.5 bg-gray-300"></div>
                    
                    <!-- Timeline Items -->
                    <div class="space-y-8" id="historyTimeline">
                        <!-- Today -->
                        <div class="relative">
                            <div class="absolute left-6 w-4 h-4 bg-amber-500 rounded-full border-4 border-white shadow"></div>
                            <div class="ml-16">
                                <h3 class="text-lg font-semibold text-gray-800 mb-4">Aujourd'hui - 25 Mars 2024</h3>
                                
                                <div class="space-y-4">
                                    <div class="bg-gray-50 rounded-lg p-4 border-l-4 border-green-500 history-item" data-action="create" data-date="2024-03-25">
                                        <div class="flex items-start justify-between">
                                            <div class="flex-1">
                                                <div class="flex items-center mb-2">
                                                    <i class="fas fa-plus-circle text-green-500 mr-2"></i>
                                                    <span class="font-medium text-gray-800">Nouveau document créé</span>
                                                    <span class="ml-2 text-xs text-gray-500">il y a 2 heures</span>
                                                </div>
                                                <p class="text-sm text-gray-600 mb-2">Jean Dupont a créé le document "Contrat_2024.pdf"</p>
                                                <div class="flex items-center text-xs text-gray-500 space-x-4">
                                                    <span><i class="fas fa-user mr-1"></i> Jean Dupont</span>
                                                    <span><i class="fas fa-folder mr-1"></i> Administratif</span>
                                                    <span><i class="fas fa-file-pdf mr-1"></i> PDF</span>
                                                </div>
                                            </div>
                                            <button class="text-gray-400 hover:text-gray-600">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="bg-gray-50 rounded-lg p-4 border-l-4 border-blue-500 history-item" data-action="update" data-date="2024-03-25">
                                        <div class="flex items-start justify-between">
                                            <div class="flex-1">
                                                <div class="flex items-center mb-2">
                                                    <i class="fas fa-edit text-blue-500 mr-2"></i>
                                                    <span class="font-medium text-gray-800">Document modifié</span>
                                                    <span class="ml-2 text-xs text-gray-500">il y a 4 heures</span>
                                                </div>
                                                <p class="text-sm text-gray-600 mb-2">Marie Curie a modifié le document "Rapport_Mensuel.docx"</p>
                                                <div class="flex items-center text-xs text-gray-500 space-x-4">
                                                    <span><i class="fas fa-user mr-1"></i> Marie Curie</span>
                                                    <span><i class="fas fa-folder mr-1"></i> Finance</span>
                                                    <span><i class="fas fa-file-word mr-1"></i> Word</span>
                                                </div>
                                            </div>
                                            <button class="text-gray-400 hover:text-gray-600">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="bg-gray-50 rounded-lg p-4 border-l-4 border-purple-500 history-item" data-action="view" data-date="2024-03-25">
                                        <div class="flex items-start justify-between">
                                            <div class="flex-1">
                                                <div class="flex items-center mb-2">
                                                    <i class="fas fa-eye text-purple-500 mr-2"></i>
                                                    <span class="font-medium text-gray-800">Document consulté</span>
                                                    <span class="ml-2 text-xs text-gray-500">il y a 6 heures</span>
                                                </div>
                                                <p class="text-sm text-gray-600 mb-2">Pierre Martin a consulté le document "Budget_2024.xlsx"</p>
                                                <div class="flex items-center text-xs text-gray-500 space-x-4">
                                                    <span><i class="fas fa-user mr-1"></i> Pierre Martin</span>
                                                    <span><i class="fas fa-folder mr-1"></i> Finance</span>
                                                    <span><i class="fas fa-file-excel mr-1"></i> Excel</span>
                                                </div>
                                            </div>
                                            <button class="text-gray-400 hover:text-gray-600">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Yesterday -->
                        <div class="relative">
                            <div class="absolute left-6 w-4 h-4 bg-gray-400 rounded-full border-4 border-white shadow"></div>
                            <div class="ml-16">
                                <h3 class="text-lg font-semibold text-gray-800 mb-4">Hier - 24 Mars 2024</h3>
                                
                                <div class="space-y-4">
                                    <div class="bg-gray-50 rounded-lg p-4 border-l-4 border-red-500 history-item" data-action="delete" data-date="2024-03-24">
                                        <div class="flex items-start justify-between">
                                            <div class="flex-1">
                                                <div class="flex items-center mb-2">
                                                    <i class="fas fa-trash text-red-500 mr-2"></i>
                                                    <span class="font-medium text-gray-800">Document supprimé</span>
                                                    <span class="ml-2 text-xs text-gray-500">hier à 14:30</span>
                                                </div>
                                                <p class="text-sm text-gray-600 mb-2">Sophie Durand a supprimé le document "Ancien_Rapport.pdf"</p>
                                                <div class="flex items-center text-xs text-gray-500 space-x-4">
                                                    <span><i class="fas fa-user mr-1"></i> Sophie Durand</span>
                                                    <span><i class="fas fa-folder mr-1"></i> Archives</span>
                                                    <span><i class="fas fa-file-pdf mr-1"></i> PDF</span>
                                                </div>
                                            </div>
                                            <button class="text-gray-400 hover:text-gray-600">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="bg-gray-50 rounded-lg p-4 border-l-4 border-orange-500 history-item" data-action="download" data-date="2024-03-24">
                                        <div class="flex items-start justify-between">
                                            <div class="flex-1">
                                                <div class="flex items-center mb-2">
                                                    <i class="fas fa-download text-orange-500 mr-2"></i>
                                                    <span class="font-medium text-gray-800">Document téléchargé</span>
                                                    <span class="ml-2 text-xs text-gray-500">hier à 10:15</span>
                                                </div>
                                                <p class="text-sm text-gray-600 mb-2">Jean Dupont a téléchargé le document "Facture_123.pdf"</p>
                                                <div class="flex items-center text-xs text-gray-500 space-x-4">
                                                    <span><i class="fas fa-user mr-1"></i> Jean Dupont</span>
                                                    <span><i class="fas fa-folder mr-1"></i> Finance</span>
                                                    <span><i class="fas fa-file-pdf mr-1"></i> PDF</span>
                                                </div>
                                            </div>
                                            <button class="text-gray-400 hover:text-gray-600">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistics Summary -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6">
                    <div class="flex items-center">
                        <div class="p-3 bg-green-100 rounded-lg">
                            <i class="fas fa-plus text-green-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-600">Créations</p>
                            <p class="text-2xl font-bold text-gray-800">156</p>
                            <p class="text-xs text-green-600">+12% cette semaine</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6">
                    <div class="flex items-center">
                        <div class="p-3 bg-blue-100 rounded-lg">
                            <i class="fas fa-edit text-blue-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-600">Modifications</p>
                            <p class="text-2xl font-bold text-gray-800">89</p>
                            <p class="text-xs text-blue-600">+8% cette semaine</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6">
                    <div class="flex items-center">
                        <div class="p-3 bg-purple-100 rounded-lg">
                            <i class="fas fa-eye text-purple-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-600">Consultations</p>
                            <p class="text-2xl font-bold text-gray-800">342</p>
                            <p class="text-xs text-purple-600">+25% cette semaine</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6">
                    <div class="flex items-center">
                        <div class="p-3 bg-orange-100 rounded-lg">
                            <i class="fas fa-download text-orange-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-600">Téléchargements</p>
                            <p class="text-2xl font-bold text-gray-800">67</p>
                            <p class="text-xs text-orange-600">+5% cette semaine</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 px-6 py-4">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-700">
                        Affichage de 1 à 10 sur 542 activités
                    </div>
                    <div class="flex items-center space-x-2">
                        <button class="px-3 py-1 text-sm text-gray-500 hover:text-gray-700 transition-colors">
                            <i class="fas fa-chevron-left"></i>
                            Précédent
                        </button>
                        <button class="px-3 py-1 text-sm text-gray-500 hover:text-gray-700 transition-colors">1</button>
                        <button class="px-3 py-1 text-sm text-gray-500 hover:text-gray-700 transition-colors">2</button>
                        <button class="px-3 py-1 text-sm text-gray-500 hover:text-gray-700 transition-colors">3</button>
                        <button class="px-3 py-1 text-sm text-gray-500 hover:text-gray-700 transition-colors">4</button>
                        <button class="px-3 py-1 text-sm text-gray-500 hover:text-gray-700 transition-colors">5</button>
                        <button class="px-3 py-1 text-sm text-gray-500 hover:text-gray-700 transition-colors">Suivant</button>
                        <button class="px-3 py-1 text-sm text-gray-500 hover:text-gray-700 transition-colors">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Filter history
        function filterHistory() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const actionFilter = document.getElementById('actionFilter').value;
            const dateFilter = document.getElementById('dateFilter').value;
            const items = document.querySelectorAll('.history-item');
            
            items.forEach(item => {
                const content = item.textContent.toLowerCase();
                const action = item.dataset.action;
                const date = item.dataset.date;
                
                let showItem = true;
                
                if (searchTerm && !content.includes(searchTerm)) {
                    showItem = false;
                }
                
                if (actionFilter && action !== actionFilter) {
                    showItem = false;
                }
                
                if (dateFilter && date !== dateFilter) {
                    showItem = false;
                }
                
                item.style.display = showItem ? '' : 'none';
            });
        }
    </script>
@endsection