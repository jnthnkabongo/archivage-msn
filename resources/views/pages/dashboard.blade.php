@extends('entete.entete')
@Section('content')
     <!-- Add padding to account for fixed header -->
    <div class="pt-16">

    <!-- Main Content Area -->
    <main class="flex-1 p-8 ml-64">
        <div class="max-w-7xl mx-auto">
            <!-- Welcome Section -->
            <div class="bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl shadow-sm border border-gray-200 p-6 mb-8 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-gray-100 to-gray-200 opacity-10 rounded-full -mr-16 -mt-16"></div>
                <div class="relative z-10">
                    <h1 class="text-3xl font-bold text-gray-800 mb-2">Bonjour, {{ auth()->user()->name ?? 'Utilisateur' }}</h1>
                    <p class="text-gray-600 mb-4">Bienvenue dans votre système d'archivage MNS</p>
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="fas fa-clock mr-2"></i>
                            Dernière connexion: {{ now()->format('H:i') }}
                        </div>
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="fas fa-calendar mr-2"></i>
                            {{ now()->format('d/m/Y') }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl shadow-lg border border-gray-200 p-6 hover:shadow-xl transition-all duration-300 transform hover:scale-105 relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 opacity-10 rounded-full -mr-10 -mt-10 group-hover:opacity-20 transition-opacity"></div>
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <div class="p-4 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl shadow-inner">
                                <i class="fas fa-folder text-blue-600 text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm text-gray-600 font-medium">Total Archives</p>
                                <p class="text-3xl font-bold text-gray-800">1,234</p>
                            </div>
                        </div>
                        <div class="text-3xl text-gray-400 group-hover:text-gray-600 transition-colors">
                            <i class="fas fa-arrow-trend-up"></i>
                        </div>
                    </div>
                    <div class="mt-4 text-center">
                        <div class="inline-flex items-center text-xs text-gray-500">
                            <i class="fas fa-info-circle mr-1"></i>
                            <span>+12% ce mois</span>
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl shadow-lg border border-gray-200 p-6 hover:shadow-xl transition-all duration-300 transform hover:scale-105 relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 opacity-10 rounded-full -mr-10 -mt-10 group-hover:opacity-20 transition-opacity"></div>
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <div class="p-4 bg-gradient-to-br from-green-100 to-green-200 rounded-xl shadow-inner">
                                <i class="fas fa-file-alt text-green-600 text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm text-gray-600 font-medium">Documents</p>
                                <p class="text-3xl font-bold text-gray-800">5,678</p>
                            </div>
                        </div>
                        <div class="text-3xl text-gray-400 group-hover:text-gray-600 transition-colors">
                            <i class="fas fa-arrow-trend-up"></i>
                        </div>
                    </div>
                    <div class="mt-4 text-center">
                        <div class="inline-flex items-center text-xs text-gray-500">
                            <i class="fas fa-info-circle mr-1"></i>
                            <span>+8% ce mois</span>
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl shadow-lg border border-gray-200 p-6 hover:shadow-xl transition-all duration-300 transform hover:scale-105 relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-600 opacity-10 rounded-full -mr-10 -mt-10 group-hover:opacity-20 transition-opacity"></div>
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <div class="p-4 bg-gradient-to-br from-purple-100 to-purple-200 rounded-xl shadow-inner">
                                <i class="fas fa-users text-purple-600 text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm text-gray-600 font-medium">Utilisateurs</p>
                                <p class="text-3xl font-bold text-gray-800">42</p>
                            </div>
                        </div>
                        <div class="text-3xl text-gray-400 group-hover:text-gray-600 transition-colors">
                            <i class="fas fa-arrow-trend-up"></i>
                        </div>
                    </div>
                    <div class="mt-4 text-center">
                        <div class="inline-flex items-center text-xs text-gray-500">
                            <i class="fas fa-info-circle mr-1"></i>
                            <span>+3 nouveaux</span>
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl shadow-lg border border-gray-200 p-6 hover:shadow-xl transition-all duration-300 transform hover:scale-105 relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-red-500 to-red-600 opacity-10 rounded-full -mr-10 -mt-10 group-hover:opacity-20 transition-opacity"></div>
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <div class="p-4 bg-gradient-to-br from-red-100 to-red-200 rounded-xl shadow-inner">
                                <i class="fas fa-shield-alt text-red-600 text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm text-gray-600 font-medium">Sécurisé</p>
                                <p class="text-3xl font-bold text-gray-800">100%</p>
                            </div>
                        </div>
                        <div class="text-3xl text-gray-400 group-hover:text-gray-600 transition-colors">
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>
                    <div class="mt-4 text-center">
                        <div class="inline-flex items-center text-xs text-gray-500">
                            <i class="fas fa-lock mr-1"></i>
                            <span>Protection active</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-8">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Activité Récente</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Document</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Utilisateur</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Contrat_2024.pdf</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Jean Dupont</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Ajouté</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">25/03/2024</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rapport_Mensuel.pdf</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Marie Curie</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Modifié</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">24/03/2024</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Facture_123.pdf</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Pierre Martin</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Consulté</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">23/03/2024</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Actions Rapides</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <button class="flex items-center justify-center px-4 py-3 bg-gray-800 text-white rounded-lg hover:bg-gray-700 transition-colors">
                        <i class="fas fa-plus mr-2"></i>
                        Nouveau Document
                    </button>
                    <button class="flex items-center justify-center px-4 py-3 bg-gray-800 text-white rounded-lg hover:bg-gray-700 transition-colors">
                        <i class="fas fa-upload mr-2"></i>
                        Importer
                    </button>
                    <button class="flex items-center justify-center px-4 py-3 bg-gray-800 text-white rounded-lg hover:bg-gray-700 transition-colors">
                        <i class="fas fa-search mr-2"></i>
                        Rechercher
                    </button>
                </div>
            </div>
        </div>
    </main>
@endsection
   
