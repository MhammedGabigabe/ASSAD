<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réserver une Visite - ASSAD Zoo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-stone-50 font-sans min-h-screen">

    <nav class="bg-emerald-900 text-white shadow-xl sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="index.php" class="text-2xl font-bold tracking-tighter flex items-center gap-2">
                <i class="fas fa-paw text-amber-500"></i> ASSAD ZOO
            </a>
            <div class="flex items-center gap-8 text-sm font-semibold">
                <a href="index.php" class="hover:text-amber-400">Accueil</a>
                <a href="visitor_tours.php" class="text-amber-400">Réserver</a>
                <a href="visitor_history.php" class="hover:text-amber-400">Mes Avis</a>
                <div class="flex items-center gap-2 bg-emerald-800 px-4 py-2 rounded-full border border-emerald-700">
                    <i class="fas fa-user-circle"></i>
                    <span>Yassine</span>
                </div>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-6 py-12">
        <header class="mb-12">
            <h1 class="text-4xl font-black text-emerald-900 uppercase tracking-tighter">Visites Guidées Disponibles</h1>
            <p class="text-stone-500 mt-2 italic">Vivez l'immersion avec nos guides experts de la faune africaine.</p>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <div class="bg-white rounded-3xl overflow-hidden shadow-lg border border-stone-200 group hover:shadow-2xl transition-all duration-300">
                <div class="relative h-48 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1516466723877-e4ec1d736c8a?auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute top-4 left-4 bg-amber-500 text-emerald-950 text-[10px] font-black px-3 py-1 rounded-full uppercase">
                        Français 🇫🇷
                    </div>
                </div>
                
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-xl font-bold text-emerald-900 leading-tight">Expédition Lions de l'Atlas</h3>
                        <span class="text-2xl font-black text-emerald-800">15€</span>
                    </div>

                    <p class="text-stone-500 text-sm mb-6 line-clamp-2">Partez à la rencontre d'Asaad et découvrez les secrets des montagnes de l'Atlas avec un guide certifié.</p>

                    <div class="space-y-3 mb-8 bg-stone-50 p-4 rounded-2xl">
                        <div class="flex items-center gap-3 text-xs font-bold text-stone-600">
                            <i class="fas fa-calendar-alt text-amber-600 w-4"></i>
                            20 Décembre 2025 à 14:00
                        </div>
                        <div class="flex items-center gap-3 text-xs font-bold text-stone-600">
                            <i class="fas fa-clock text-amber-600 w-4"></i>
                            Durée : 1h30
                        </div>
                        <div class="flex items-center gap-3 text-xs font-bold text-stone-600">
                            <i class="fas fa-users text-amber-600 w-4"></i>
                            Capacité restante : <span class="text-emerald-600 ml-1">12 places</span>
                        </div>
                    </div>

                    <div class="mb-8">
                        <h4 class="text-[10px] font-black text-stone-400 uppercase tracking-widest mb-3">Parcours prévu :</h4>
                        <div class="flex items-center gap-2 overflow-x-auto pb-2 scrollbar-hide">
                            <span class="whitespace-nowrap bg-emerald-50 text-emerald-700 text-[9px] font-bold px-2 py-1 rounded border border-emerald-100">Zone Lions</span>
                            <i class="fas fa-chevron-right text-[8px] text-stone-300"></i>
                            <span class="whitespace-nowrap bg-emerald-50 text-emerald-700 text-[9px] font-bold px-2 py-1 rounded border border-emerald-100">Oiseaux</span>
                        </div>
                    </div>

                    <button onclick="document.getElementById('modal-booking').classList.remove('hidden')" class="w-full bg-emerald-900 text-white font-bold py-4 rounded-2xl hover:bg-amber-500 hover:text-emerald-950 transition-colors shadow-md">
                        Réserver ma place
                    </button>
                </div>
            </div>

        </div>
    </main>

    <div id="modal-booking" class="hidden fixed inset-0 bg-emerald-950/80 backdrop-blur-sm z-[100] flex items-center justify-center p-4">
        <div class="bg-white max-w-sm w-full rounded-3xl p-8 shadow-2xl relative">
            <button onclick="document.getElementById('modal-booking').classList.add('hidden')" class="absolute top-4 right-4 text-stone-400 hover:text-stone-600">
                <i class="fas fa-times"></i>
            </button>
            <h3 class="text-2xl font-black text-emerald-900 mb-2">Finaliser la réservation</h3>
            <p class="text-stone-500 text-sm mb-6">Combien de personnes vous accompagnent ?</p>
            
            <form class="space-y-6">
                <div>
                    <label class="block text-[10px] font-black text-stone-400 uppercase mb-2">Nombre de personnes</label>
                    <div class="flex items-center gap-4 bg-stone-100 p-2 rounded-2xl">
                        <button type="button" class="w-10 h-10 bg-white rounded-xl shadow-sm text-emerald-900 font-bold">-</button>
                        <input type="number" value="1" class="flex-1 bg-transparent text-center font-black text-xl outline-none">
                        <button type="button" class="w-10 h-10 bg-white rounded-xl shadow-sm text-emerald-900 font-bold">+</button>
                    </div>
                </div>
                <div class="bg-emerald-50 p-4 rounded-2xl flex justify-between items-center">
                    <span class="text-sm font-bold text-emerald-800">Total à payer</span>
                    <span class="text-xl font-black text-emerald-900">15.00 €</span>
                </div>
                <button type="submit" class="w-full bg-amber-500 text-emerald-950 font-black py-4 rounded-2xl shadow-lg hover:bg-amber-400 transition">
                    Confirmer et Payer
                </button>
            </form>
        </div>
    </div>

</body>
</html>