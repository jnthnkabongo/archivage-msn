@extends('entete.entete')
@section('content')

    <!-- Main Content Area -->
    <main class="flex-1 p-8 ml-64">
        <div class="max-w-7xl mx-auto">
            <!-- Header Section -->
            <div class="bg-gradient-to-r from-gray-50 to-white rounded-xl shadow-lg border border-gray-200 p-6 mb-8 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-slate-500 to-slate-600 opacity-10 rounded-full -mr-16 -mt-16"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-800 mb-2">Paramètres du Système</h1>
                            <p class="text-gray-600">Configurez et personnalisez votre système d'archivage</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <button class="flex items-center px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                                <i class="fas fa-undo mr-2"></i>
                                Réinitialiser
                            </button>
                            <button class="flex items-center px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700 transition-colors">
                                <i class="fas fa-save mr-2"></i>
                                Sauvegarder
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Settings Navigation -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6 mb-8">
                <div class="flex flex-wrap gap-4">
                    <button onclick="showSettingsTab('general')" id="tab-general" class="px-4 py-2 bg-gray-800 text-white rounded-lg transition-colors">
                        <i class="fas fa-cog mr-2"></i>
                        Général
                    </button>
                    <button onclick="showSettingsTab('security')" id="tab-security" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                        <i class="fas fa-shield-alt mr-2"></i>
                        Sécurité
                    </button>
                    <button onclick="showSettingsTab('storage')" id="tab-storage" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                        <i class="fas fa-database mr-2"></i>
                        Stockage
                    </button>
                    <button onclick="showSettingsTab('notifications')" id="tab-notifications" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                        <i class="fas fa-bell mr-2"></i>
                        Notifications
                    </button>
                    <button onclick="showSettingsTab('backup')" id="tab-backup" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                        <i class="fas fa-cloud-upload-alt mr-2"></i>
                        Sauvegarde
                    </button>
                </div>
            </div>

            <!-- General Settings -->
            <div id="content-general" class="settings-content">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-6">Informations de l'Organisation</h2>
                        <form class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nom de l'organisation</label>
                                <input type="text" value="Ministère de la Santé Publique" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Adresse</label>
                                <textarea rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">Avenue de la Santé, Kinshasa, RD Congo</textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Téléphone</label>
                                <input type="tel" value="+243 123 456 789" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input type="email" value="info@mns.cd" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                            </div>
                        </form>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-6">Configuration du Système</h2>
                        <form class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Fuseau horaire</label>
                                <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                                    <option value="UTC+1">Kinshasa (UTC+1)</option>
                                    <option value="UTC+0">Londres (UTC+0)</option>
                                    <option value="UTC+2">Paris (UTC+2)</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Langue par défaut</label>
                                <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                                    <option value="fr">Français</option>
                                    <option value="en">English</option>
                                    <option value="es">Español</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Format de date</label>
                                <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                                    <option value="dd/mm/yyyy">DD/MM/YYYY</option>
                                    <option value="mm/dd/yyyy">MM/DD/YYYY</option>
                                    <option value="yyyy-mm-dd">YYYY-MM-DD</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Devise</label>
                                <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                                    <option value="CDF">Franc Congolais (CDF)</option>
                                    <option value="USD">Dollar Américain (USD)</option>
                                    <option value="EUR">Euro (EUR)</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Security Settings -->
            <div id="content-security" class="settings-content hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-6">Politique de Mot de Passe</h2>
                        <form class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Longueur minimale</label>
                                <input type="number" value="8" min="6" max="20" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Exigences</label>
                                <div class="space-y-2">
                                    <label class="flex items-center">
                                        <input type="checkbox" checked class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                                        <span class="ml-2 text-sm text-gray-700">Majuscules requises</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" checked class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                                        <span class="ml-2 text-sm text-gray-700">Minuscules requises</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" checked class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                                        <span class="ml-2 text-sm text-gray-700">Chiffres requis</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                                        <span class="ml-2 text-sm text-gray-700">Caractères spéciaux requis</span>
                                    </label>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Expiration du mot de passe (jours)</label>
                                <input type="number" value="90" min="30" max="365" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                            </div>
                        </form>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-6">Sessions et Connexions</h2>
                        <form class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Durée de session (minutes)</label>
                                <input type="number" value="30" min="15" max="480" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Tentatives de connexion maximales</label>
                                <input type="number" value="5" min="3" max="10" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Délai de blocage (minutes)</label>
                                <input type="number" value="15" min="5" max="60" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                            </div>
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="checkbox" checked class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                                    <span class="ml-2 text-sm text-gray-700">Authentification à deux facteurs</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" checked class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                                    <span class="ml-2 text-sm text-gray-700">Notification de connexion</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                                    <span class="ml-2 text-sm text-gray-700">Connexion automatique</span>
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Storage Settings -->
            <div id="content-storage" class="settings-content hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-6">Configuration du Stockage</h2>
                        <form class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Type de stockage</label>
                                <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                                    <option value="local">Stockage local</option>
                                    <option value="cloud">Stockage cloud</option>
                                    <option value="hybrid">Stockage hybride</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Espace de stockage (GB)</label>
                                <input type="number" value="100" min="10" max="1000" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Taille maximale des fichiers (MB)</label>
                                <input type="number" value="50" min="1" max="500" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Types de fichiers autorisés</label>
                                <div class="space-y-2">
                                    <label class="flex items-center">
                                        <input type="checkbox" checked class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                                        <span class="ml-2 text-sm text-gray-700">PDF (.pdf)</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" checked class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                                        <span class="ml-2 text-sm text-gray-700">Word (.doc, .docx)</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" checked class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                                        <span class="ml-2 text-sm text-gray-700">Excel (.xls, .xlsx)</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" checked class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                                        <span class="ml-2 text-sm text-gray-700">Images (.jpg, .png, .gif)</span>
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-6">Compression et Optimisation</h2>
                        <form class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Compression des images</label>
                                <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                                    <option value="none">Aucune</option>
                                    <option value="low">Faible</option>
                                    <option value="medium" selected>Moyenne</option>
                                    <option value="high">Élevée</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Qualité des images (%)</label>
                                <input type="range" min="10" max="100" value="80" class="w-full">
                                <div class="flex justify-between text-xs text-gray-500">
                                    <span>10%</span>
                                    <span>80%</span>
                                    <span>100%</span>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="checkbox" checked class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                                    <span class="ml-2 text-sm text-gray-700">Optimisation automatique</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" checked class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                                    <span class="ml-2 text-sm text-gray-700">Suppression des doublons</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                                    <span class="ml-2 text-sm text-gray-700">Conversion automatique</span>
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Notifications Settings -->
            <div id="content-notifications" class="settings-content hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-6">Notifications par Email</h2>
                        <form class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Serveur SMTP</label>
                                <input type="text" value="smtp.gmail.com" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Port SMTP</label>
                                <input type="number" value="587" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email d'envoi</label>
                                <input type="email" value="noreply@mns.cd" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                            </div>
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="checkbox" checked class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                                    <span class="ml-2 text-sm text-gray-700">Nouveaux utilisateurs</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" checked class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                                    <span class="ml-2 text-sm text-gray-700">Nouveaux documents</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                                    <span class="ml-2 text-sm text-gray-700">Rapports hebdomadaires</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" checked class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                                    <span class="ml-2 text-sm text-gray-700">Alertes système</span>
                                </label>
                            </div>
                        </form>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-6">Notifications Système</h2>
                        <form class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Fréquence des notifications</label>
                                <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                                    <option value="immediate">Immédiate</option>
                                    <option value="hourly">Toutes les heures</option>
                                    <option value="daily" selected>Quotidienne</option>
                                    <option value="weekly">Hebdomadaire</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Niveau d'alerte</label>
                                <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                                    <option value="all">Toutes</option>
                                    <option value="warning">Avertissements et erreurs</option>
                                    <option value="error" selected>Erreurs uniquement</option>
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="checkbox" checked class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                                    <span class="ml-2 text-sm text-gray-700">Notifications desktop</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" checked class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                                    <span class="ml-2 text-sm text-gray-700">Son de notification</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                                    <span class="ml-2 text-sm text-gray-700">Notifications mobiles</span>
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Backup Settings -->
            <div id="content-backup" class="settings-content hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-6">Configuration de Sauvegarde</h2>
                        <form class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Fréquence de sauvegarde</label>
                                <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                                    <option value="hourly">Toutes les heures</option>
                                    <option value="daily" selected>Quotidienne</option>
                                    <option value="weekly">Hebdomadaire</option>
                                    <option value="monthly">Mensuelle</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Heure de sauvegarde</label>
                                <input type="time" value="02:00" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Type de sauvegarde</label>
                                <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                                    <option value="full">Complète</option>
                                    <option value="incremental" selected>Incrémentielle</option>
                                    <option value="differential">Différentielle</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Rétention (jours)</label>
                                <input type="number" value="30" min="7" max="365" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                            </div>
                        </form>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-6">Destination de Sauvegarde</h2>
                        <form class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Type de destination</label>
                                <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                                    <option value="local">Stockage local</option>
                                    <option value="cloud" selected>Stockage cloud</option>
                                    <option value="ftp">Serveur FTP</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Chemin de destination</label>
                                <input type="text" value="/backups/archivage" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Compression</label>
                                <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                                    <option value="none">Aucune</option>
                                    <option value="zip" selected>ZIP</option>
                                    <option value="tar">TAR.GZ</option>
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="checkbox" checked class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                                    <span class="ml-2 text-sm text-gray-700">Chiffrement des sauvegardes</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" checked class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                                    <span class="ml-2 text-sm text-gray-700">Vérification automatique</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" checked class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                                    <span class="ml-2 text-sm text-gray-700">Notification de succès</span>
                                </label>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Backup Status -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6 mt-8">
                    <h2 class="text-xl font-bold text-gray-800 mb-6">Statut des Sauvegardes</h2>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-green-50 rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                <div>
                                    <div class="font-medium text-gray-800">Dernière sauvegarde réussie</div>
                                    <div class="text-sm text-gray-600">24 Mars 2024 à 02:00</div>
                                </div>
                            </div>
                            <div class="text-sm text-gray-500">
                                <div>Taille: 2.3 GB</div>
                                <div>Durée: 15 min</div>
                            </div>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-clock text-gray-600 mr-3"></i>
                                <div>
                                    <div class="font-medium text-gray-800">Prochaine sauvegarde</div>
                                    <div class="text-sm text-gray-600">25 Mars 2024 à 02:00</div>
                                </div>
                            </div>
                            <div class="text-sm text-gray-500">
                                <div>Dans 18 heures</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Show settings tab
        function showSettingsTab(tabName) {
            // Hide all content
            document.querySelectorAll('.settings-content').forEach(content => {
                content.classList.add('hidden');
            });
            
            // Reset all tab buttons
            document.querySelectorAll('[id^="tab-"]').forEach(button => {
                button.classList.remove('bg-gray-800', 'text-white');
                button.classList.add('bg-gray-200', 'text-gray-700');
            });
            
            // Show selected content
            document.getElementById('content-' + tabName).classList.remove('hidden');
            
            // Highlight selected tab
            const selectedTab = document.getElementById('tab-' + tabName);
            selectedTab.classList.remove('bg-gray-200', 'text-gray-700');
            selectedTab.classList.add('bg-gray-800', 'text-white');
        }
    </script>
@endsection