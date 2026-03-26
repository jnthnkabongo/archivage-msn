<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - MNS Archive</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .rotate-180 {
            transform: rotate(180deg);
        }
        .transition-transform {
            transition: transform 0.2s ease;
        }
    </style>
</head>
<body class="min-h-screen bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm border-b border-gray-200 fixed top-0 left-0 right-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <img src="{{ asset('images/mns-logo.jpeg') }}" alt="MNS" class="h-8 w-auto object-contain">
                    <span class="ml-3 text-xl font-semibold text-gray-800">MNS Archive</span>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="text-gray-500 hover:text-gray-700 transition-colors relative group">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="absolute -top-1 -right-1 h-2 w-2 bg-red-500 rounded-full animate-pulse"></span>
                    </button>
                    <div class="relative">
                        <button onclick="toggleUserDropdown()" class="flex items-center text-sm text-gray-700 hover:text-gray-900 transition-colors">
                            <i class="fas fa-user-circle text-xl mr-2"></i>
                            {{ auth()->user()->name ?? 'Utilisateur' }}
                            <i class="fas fa-chevron-down ml-2 text-xs transition-transform" id="userDropdownIcon"></i>
                        </button>
                        <div id="userDropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 hidden z-50">
                            <div class="py-1">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                                    <i class="fas fa-user mr-2"></i>
                                    Mon Profil
                                </a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                                    <i class="fas fa-cog mr-2"></i>
                                    Paramètres
                                </a>
                                <hr class="my-1 border-gray-200">
                                <form method="POST" action="" class="block">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-700 transition-colors">
                                        <i class="fas fa-sign-out-alt mr-2"></i>
                                        Déconnexion
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

        <!-- Add padding to account for fixed header -->
    <div class="pt-16">

    <!-- Main Content -->
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg min-h-screen fixed left-0 top-16 z-40 border-r border-gray-200">
            <div class="p-6">
                <div class="mb-6">
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-4">Menu Principal</h3>
                </div>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('dashboard')}}" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-all duration-200 transform hover:scale-105 group">
                            <i class="fas fa-home text-gray-500 mr-3 group-hover:text-gray-700 transition-colors"></i>
                            <span class="font-medium">Tableau de bord</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('liste-archives') }}" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-all duration-200 transform hover:scale-105 group">
                            <i class="fas fa-folder text-gray-500 mr-3 group-hover:text-gray-700 transition-colors"></i>
                            <span class="font-medium">Archives</span>
                            <span class="ml-auto bg-gray-200 text-gray-600 text-xs px-2 py-1 rounded-full">12</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('liste-documents')}}" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-all duration-200 transform hover:scale-105 group">
                            <i class="fas fa-file-alt text-gray-500 mr-3 group-hover:text-gray-700 transition-colors"></i>
                            <span class="font-medium">Documents</span>
                            <span class="ml-auto bg-gray-200 text-gray-600 text-xs px-2 py-1 rounded-full">156</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('liste-utilisateurs')}}" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-all duration-200 transform hover:scale-105 group">
                            <i class="fas fa-users text-gray-500 mr-3 group-hover:text-gray-700 transition-colors"></i>
                            <span class="font-medium">Utilisateurs</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('liste-services') }}" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-all duration-200 transform hover:scale-105 group">
                            <i class="fas fa-tools text-gray-500 mr-3 group-hover:text-gray-700 transition-colors"></i>
                            <span class="font-medium">Services</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('liste-roles') }}" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-all duration-200 transform hover:scale-105 group">
                            <i class="fas fa-user-shield text-gray-500 mr-3 group-hover:text-gray-700 transition-colors"></i>
                            <span class="font-medium">Rôles</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('liste-categories') }}" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-all duration-200 transform hover:scale-105 group">
                            <i class="fas fa-tags text-gray-500 mr-3 group-hover:text-gray-700 transition-colors"></i>
                            <span class="font-medium">Catégories</span>
                        </a>
                    </li>
                </ul>
                
                <div class="mb-6 mt-8">
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-4">Système</h3>
                </div>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('parametres') }}" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-all duration-200 transform hover:scale-105 group">
                            <i class="fas fa-cog text-gray-500 mr-3 group-hover:text-gray-700 transition-colors"></i>
                            <span class="font-medium">Paramètres</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('statistiques') }}" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-all duration-200 transform hover:scale-105 group">
                            <i class="fas fa-chart-bar text-gray-500 mr-3 group-hover:text-gray-700 transition-colors"></i>
                            <span class="font-medium">Statistiques</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('historique') }}" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-all duration-200 transform hover:scale-105 group">
                            <i class="fas fa-history text-gray-500 mr-3 group-hover:text-gray-700 transition-colors"></i>
                            <span class="font-medium">Historique</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <div class="flex-1 p-8 ml-64">
            @yield('content')
        </div>

    </div>

    <script>
        // Toggle user dropdown
        function toggleUserDropdown() {
            const dropdown = document.getElementById('userDropdown');
            const icon = document.getElementById('userDropdownIcon');
            
            if (dropdown.classList.contains('hidden')) {
                dropdown.classList.remove('hidden');
                icon.classList.add('rotate-180');
            } else {
                dropdown.classList.add('hidden');
                icon.classList.remove('rotate-180');
            }
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('userDropdown');
            const button = event.target.closest('button[onclick="toggleUserDropdown()"]');
            
            if (!button && !dropdown.contains(event.target)) {
                dropdown.classList.add('hidden');
                document.getElementById('userDropdownIcon').classList.remove('rotate-180');
            }
        });

        // Add hover effects to cards
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.bg-white.rounded-xl');
            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        card.style.transition = 'all 0.5s ease';
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, index * 100);
                }, 100);
            });
        });
    </script>
</body>
</html>