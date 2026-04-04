@extends('entete.entete')
@section('content')

    <!-- Main Content Area -->
    <main class="">
        <div class="max-w-7xl mx-auto">
            <!-- Header Section -->
            <div class="bg-gradient-to-r from-gray-50 to-white rounded-xl shadow-lg border border-gray-200 p-6 mb-8 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-cyan-500 to-cyan-600 opacity-10 rounded-full -mr-16 -mt-16"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-800 mb-2">Tableau de Bord Statistique</h1>
                            <p class="text-gray-600">Analysez les performances et tendances du système</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                                <option value="week">Cette semaine</option>
                                <option value="month">Ce mois</option>
                                <option value="year">Cette année</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Key Metrics -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl shadow-lg border border-gray-200 p-6 hover:shadow-xl transition-all duration-300 transform hover:scale-105 relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 opacity-10 rounded-full -mr-10 -mt-10 group-hover:opacity-20 transition-opacity"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl shadow-inner">
                                <i class="fas fa-users text-blue-600 text-xl"></i>
                            </div>
                            <div class="text-3xl text-gray-400 group-hover:text-gray-600 transition-colors">
                                <i class="fas fa-arrow-trend-up"></i>
                            </div>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800">42</h3>
                        <p class="text-sm text-gray-600">Utilisateurs Actifs</p>
                        <div class="mt-2 text-xs text-green-600">+3 nouveaux ce mois</div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl shadow-lg border border-gray-200 p-6 hover:shadow-xl transition-all duration-300 transform hover:scale-105 relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 opacity-10 rounded-full -mr-10 -mt-10 group-hover:opacity-20 transition-opacity"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-gradient-to-br from-green-100 to-green-200 rounded-xl shadow-inner">
                                <i class="fas fa-file-alt text-green-600 text-xl"></i>
                            </div>
                            <div class="text-3xl text-gray-400 group-hover:text-gray-600 transition-colors">
                                <i class="fas fa-arrow-trend-up"></i>
                            </div>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800">5,678</h3>
                        <p class="text-sm text-gray-600">Documents Total</p>
                        <div class="mt-2 text-xs text-green-600">+8% cette semaine</div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl shadow-lg border border-gray-200 p-6 hover:shadow-xl transition-all duration-300 transform hover:scale-105 relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-600 opacity-10 rounded-full -mr-10 -mt-10 group-hover:opacity-20 transition-opacity"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-gradient-to-br from-purple-100 to-purple-200 rounded-xl shadow-inner">
                                <i class="fas fa-folder text-purple-600 text-xl"></i>
                            </div>
                            <div class="text-3xl text-gray-400 group-hover:text-gray-600 transition-colors">
                                <i class="fas fa-arrow-trend-up"></i>
                            </div>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800">1,234</h3>
                        <p class="text-sm text-gray-600">Archives Créées</p>
                        <div class="mt-2 text-xs text-green-600">+12% ce mois</div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl shadow-lg border border-gray-200 p-6 hover:shadow-xl transition-all duration-300 transform hover:scale-105 relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-red-500 to-red-600 opacity-10 rounded-full -mr-10 -mt-10 group-hover:opacity-20 transition-opacity"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-gradient-to-br from-red-100 to-red-200 rounded-xl shadow-inner">
                                <i class="fas fa-download text-red-600 text-xl"></i>
                            </div>
                            <div class="text-3xl text-gray-400 group-hover:text-gray-600 transition-colors">
                                <i class="fas fa-arrow-trend-down"></i>
                            </div>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800">892</h3>
                        <p class="text-sm text-gray-600">Téléchargements</p>
                        <div class="mt-2 text-xs text-red-600">-5% cette semaine</div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <!-- Activity Chart -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Activité des 7 derniers jours</h2>
                    <div class="h-64 flex items-center justify-center bg-gray-50 rounded-lg">
                        <div class="text-center">
                            <i class="fas fa-chart-line text-4xl text-gray-400 mb-4"></i>
                            <p class="text-gray-500">Graphique d'activité</p>
                            <p class="text-sm text-gray-400 mt-2">Visualisation des tendances d'utilisation</p>
                        </div>
                    </div>
                    <div class="mt-4 grid grid-cols-7 gap-2 text-center">
                        <div class="text-xs text-gray-500">
                            <div class="font-semibold">Lun</div>
                            <div class="text-lg">124</div>
                        </div>
                        <div class="text-xs text-gray-500">
                            <div class="font-semibold">Mar</div>
                            <div class="text-lg">156</div>
                        </div>
                        <div class="text-xs text-gray-500">
                            <div class="font-semibold">Mer</div>
                            <div class="text-lg">189</div>
                        </div>
                        <div class="text-xs text-gray-500">
                            <div class="font-semibold">Jeu</div>
                            <div class="text-lg">145</div>
                        </div>
                        <div class="text-xs text-gray-500">
                            <div class="font-semibold">Ven</div>
                            <div class="text-lg">234</div>
                        </div>
                        <div class="text-xs text-gray-500">
                            <div class="font-semibold">Sam</div>
                            <div class="text-lg">89</div>
                        </div>
                        <div class="text-xs text-gray-500">
                            <div class="font-semibold">Dim</div>
                            <div class="text-lg">67</div>
                        </div>
                    </div>
                </div>

                <!-- Document Types Distribution -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Répartition des Types de Documents</h2>
                    <div class="h-64 flex items-center justify-center bg-gray-50 rounded-lg">
                        <div class="text-center">
                            <i class="fas fa-chart-pie text-4xl text-gray-400 mb-4"></i>
                            <p class="text-gray-500">Graphique circulaire</p>
                            <p class="text-sm text-gray-400 mt-2">Répartition par type de fichier</p>
                        </div>
                    </div>
                    <div class="mt-4 space-y-2">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-red-500 rounded-full mr-2"></div>
                                <span class="text-sm text-gray-600">PDF</span>
                            </div>
                            <span class="text-sm font-semibold text-gray-800">45%</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-blue-500 rounded-full mr-2"></div>
                                <span class="text-sm text-gray-600">Word</span>
                            </div>
                            <span class="text-sm font-semibold text-gray-800">25%</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                                <span class="text-sm text-gray-600">Excel</span>
                            </div>
                            <span class="text-sm font-semibold text-gray-800">20%</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-purple-500 rounded-full mr-2"></div>
                                <span class="text-sm text-gray-600">Autres</span>
                            </div>
                            <span class="text-sm font-semibold text-gray-800">10%</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Top Users Activity -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6 mb-8">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Top 10 Utilisateurs les Plus Actifs</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Utilisateur</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Documents</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Score</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <img src="https://picsum.photos/seed/user1/40/40/40" alt="Avatar" class="h-8 w-8 rounded-full object-cover">
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900">Jean Dupont</div>
                                            <div class="text-xs text-gray-500">Administrateur</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">156</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">342</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-24 bg-gray-200 rounded-full h-2 mr-2">
                                            <div class="bg-green-500 h-2 rounded-full" style="width: 95%"></div>
                                        </div>
                                        <span class="text-sm font-semibold text-gray-800">95%</span>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <img src="https://picsum.photos/seed/user2/40/40/40" alt="Avatar" class="h-8 w-8 rounded-full object-cover">
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900">Marie Curie</div>
                                            <div class="text-xs text-gray-500">Archiviste</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">134</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">289</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-24 bg-gray-200 rounded-full h-2 mr-2">
                                            <div class="bg-blue-500 h-2 rounded-full" style="width: 88%"></div>
                                        </div>
                                        <span class="text-sm font-semibold text-gray-800">88%</span>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <img src="https://picsum.photos/seed/user3/40/40/40" alt="Avatar" class="h-8 w-8 rounded-full object-cover">
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900">Pierre Martin</div>
                                            <div class="text-xs text-gray-500">Utilisateur</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">98</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">234</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-24 bg-gray-200 rounded-full h-2 mr-2">
                                            <div class="bg-purple-500 h-2 rounded-full" style="width: 76%"></div>
                                        </div>
                                        <span class="text-sm font-semibold text-gray-800">76%</span>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <img src="https://picsum.photos/seed/user4/40/40/40" alt="Avatar" class="h-8 w-8 rounded-full object-cover">
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900">Sophie Durand</div>
                                            <div class="text-xs text-gray-500">Utilisateur</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">87</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">198</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-24 bg-gray-200 rounded-full h-2 mr-2">
                                            <div class="bg-orange-500 h-2 rounded-full" style="width: 68%"></div>
                                        </div>
                                        <span class="text-sm font-semibold text-gray-800">68%</span>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <img src="https://picsum.photos/seed/user5/40/40/40" alt="Avatar" class="h-8 w-8 rounded-full object-cover">
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900">Robert Lavoisier</div>
                                            <div class="text-xs text-gray-500">Utilisateur</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">76</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">167</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-24 bg-gray-200 rounded-full h-2 mr-2">
                                            <div class="bg-red-500 h-2 rounded-full" style="width: 62%"></div>
                                        </div>
                                        <span class="text-sm font-semibold text-gray-800">62%</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Storage Statistics -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Storage Usage -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Utilisation du Stockage</h2>
                    <div class="space-y-4">
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm text-gray-600">Espace utilisé</span>
                                <span class="text-sm font-semibold text-gray-800">45.2 GB / 100 GB</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-3 rounded-full" style="width: 45.2%"></div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div class="bg-gray-50 rounded-lg p-3">
                                <div class="text-gray-600">Documents</div>
                                <div class="font-semibold text-gray-800">23.4 GB</div>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-3">
                                <div class="text-gray-600">Archives</div>
                                <div class="font-semibold text-gray-800">18.7 GB</div>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-3">
                                <div class="text-gray-600">Images</div>
                                <div class="font-semibold text-gray-800">2.8 GB</div>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-3">
                                <div class="text-gray-600">Autres</div>
                                <div class="font-semibold text-gray-800">0.3 GB</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- System Performance -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Performance du Système</h2>
                    <div class="space-y-4">
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm text-gray-600">CPU</span>
                                <span class="text-sm font-semibold text-gray-800">23%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-green-500 h-2 rounded-full" style="width: 23%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm text-gray-600">Mémoire</span>
                                <span class="text-sm font-semibold text-gray-800">67%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-yellow-500 h-2 rounded-full" style="width: 67%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm text-gray-600">Disque</span>
                                <span class="text-sm font-semibold text-gray-800">45%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-blue-500 h-2 rounded-full" style="width: 45%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm text-gray-600">Réseau</span>
                                <span class="text-sm font-semibold text-gray-800">12%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-green-500 h-2 rounded-full" style="width: 12%"></div>
                            </div>
                        </div>
                        <div class="mt-4 p-3 bg-green-50 rounded-lg">
                            <div class="flex items-center text-green-800">
                                <i class="fas fa-check-circle mr-2"></i>
                                <span class="text-sm font-medium">Système fonctionnel</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection