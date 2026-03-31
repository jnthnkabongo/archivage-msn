<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - MNS Archive</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="min-h-screen bg-gray-50">
    <div class="min-h-screen flex flex-col lg:flex-row">
        <!-- Left side - Image -->
        <div class="lg:w-1/2 relative overflow-hidden bg-white flex flex-col items-center justify-center p-8">
            <img 
                src="{{ asset('images/mns-logo.jpeg') }}" 
                alt="Mécanisme National de Suivi" 
                class="w-auto h-auto object-contain" style="max-width: 900px; max-height: 600px;"
            >
            <h1 class="text-3xl font-bold text-gray-800 mb-2 mt-4 text-center">MECANISME NATIONAL DE SUIVI DE L'ACCORD-CADRE D'ADDIS-ABEBA</h1>
            {{-- <p class="text-gray-600 text-sm text-center">Mécanisme National de Suivi</p> --}}
        </div>

        <!-- Right side - Login Form -->
        <div class="lg:w-1/2 flex items-center justify-center p-8 bg-gray-50">
            <div class="w-full max-w-md">
        
                <!-- Login Form Container -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
                    <div class="mb-1">
                        <h2 class="text-2xl font-bold text-gray-800 mb-2 text-center">Connexion</h2>
                        <p class="text-gray-600 text-center">Accédez à votre système d'archivage</p>
                    </div>
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg text-red-700 text-sm">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif

                @if (session('status'))
                    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg text-green-700 text-sm">
                        <i class="fas fa-check-circle mr-2"></i>
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('soimission_login')}}" class="space-y-4">
                    @csrf
                    
                    <!-- Email field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-envelope text-gray-400 mr-2"></i>
                            Adresse email
                        </label>
                        <input 
                            id="email" 
                            type="email" 
                            name="email" 
                            value="{{ old('email') }}"
                            required
                            autocomplete="email"
                            autofocus
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent outline-none"
                            placeholder="exemple@email.com"
                        >
                    </div>

                    <!-- Password field -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-lock text-gray-400 mr-2"></i>
                            Mot de passe
                        </label>
                        <div class="relative">
                            <input 
                                id="password" 
                                type="password" 
                                name="password" 
                                required
                                autocomplete="current-password"
                                class="w-full px-3 py-2 pr-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent outline-none"
                                placeholder="••••••••"
                            >
                            <button 
                                type="button" 
                                onclick="togglePassword()"
                                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors"
                            >
                                <i id="passwordToggle" class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Remember me checkbox -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center">
                            <input 
                                type="checkbox" 
                                name="remember" 
                                class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500"
                                {{ old('remember') ? 'checked' : '' }}
                            >
                            <span class="ml-2 text-sm text-gray-600">Se souvenir de moi</span>
                        </label>
                        
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm text-gray-600 hover:text-gray-800 font-medium transition-colors">
                                Mot de passe oublié?
                            </a>
                        @endif
                    </div>

                    <!-- Submit button -->
                    <button 
                        type="submit" 
                        class="w-full bg-gray-800 text-white font-medium py-2 px-4 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors"
                    >
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Se connecter
                    </button>
                </form>

                <!-- Divider -->
                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-4 bg-white text-gray-500">ou</span>
                    </div>
                </div>

            <!-- Register link -->
            @if (Route::has('register'))
                <div class="text-center">
                    <p class="text-sm text-gray-600">
                        Pas encore de compte? 
                        <a href="{{ route('register') }}" class="font-medium text-gray-700 hover:text-gray-900 transition-colors">
                            Créer un compte
                        </a>
                    </p>
                </div>
            @endif
        </div>

        <!-- Footer -->
        <div class="text-center mt-8 text-xs text-gray-500">
            <p>&copy; {{ date('Y') }} Mécanisme National de Suivi. Tous droits réservés.</p>
            <div class="mt-2 space-x-4">
                <a href="#" class="hover:text-gray-700 transition-colors">Mentions légales</a>
                <a href="#" class="hover:text-gray-700 transition-colors">Confidentialité</a>
                <a href="#" class="hover:text-gray-700 transition-colors">Support</a>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const passwordToggle = document.getElementById('passwordToggle');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordToggle.classList.remove('fa-eye');
                passwordToggle.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                passwordToggle.classList.remove('fa-eye-slash');
                passwordToggle.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>