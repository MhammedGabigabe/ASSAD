<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Avis - ASSAD Zoo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-stone-50 font-sans min-h-screen">

    <nav class="bg-emerald-900 text-white shadow-xl sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="index.php" class="text-2xl font-bold tracking-tighter flex items-center gap-2 group">
                <i class="fas fa-paw text-amber-500 group-hover:rotate-12 transition-transform"></i> 
                <span>ASSAD ZOO</span>
            </a>
            <div class="flex items-center gap-8 text-sm font-semibold">
                <a href="index.php" class="hover:text-amber-400 transition">Accueil</a>
                <a href="visitor_tours.php" class="hover:text-amber-400 transition">Réserver</a>
                <a href="visitor_history.php" class="text-amber-400">Mes Avis</a>
                <div class="flex items-center gap-2 bg-emerald-800 px-4 py-2 rounded-full border border-emerald-700">
                    <i class="fas fa-user-circle text-emerald-400"></i>
                    <span>Yassine</span>
                </div>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-6 py-12">
        
        <div class="mb-10 flex justify-between items-center">
            <a href="index.php" class="flex items-center gap-2 text-emerald-900 font-bold hover:text-amber-600 transition group">
                <div class="w-10 h-10 bg-white shadow-sm border border-stone-200 rounded-xl flex items-center justify-center group-hover:bg-amber-50 group-hover:border-amber-200">
                    <i class="fas fa-arrow-left text-sm"></i>
                </div>
                <span>Retour à l'accueil</span>
            </a>
            
            <div class="text-right">
                <h1 class="text-4xl font-black text-emerald-900 uppercase tracking-tighter">Mon Historique</h1>
                <p class="text-stone-500 mt-1 italic">Partagez votre expérience sur les visites terminées.</p>
            </div>
        </div>

        <div class="max-w-4xl mx-auto space-y-6">
            
            <div class="bg-white rounded-3xl p-8 shadow-sm border border-stone-200">
                <div class="flex flex-col md:flex-row justify-between gap-6 mb-8 border-b border-stone-100 pb-6">
                    <div>
                        <span class="text-[10px] font-black bg-stone-100 text-stone-500 px-3 py-1 rounded-full uppercase mb-2 inline-block">Visite effectuée le 15/12</span>
                        <h3 class="text-2xl font-black text-emerald-900">Le Royaume des Oiseaux</h3>
                        <p class="text-sm text-stone-400 italic">Guide : Dr. Karim Alami</p>
                    </div>
                    <div class="text-emerald-700 font-bold text-sm bg-emerald-50 self-start px-4 py-2 rounded-xl border border-emerald-100">
                        <i class="fas fa-check-circle mr-2 text-emerald-500"></i> Expérience Terminée
                    </div>
                </div>

                <form class="space-y-6">
                    <div>
                        <label class="block text-xs font-black text-stone-400 uppercase tracking-[0.2em] mb-3">Votre note (Étoiles)</label>
                        <div class="flex gap-2 text-2xl text-amber-400">
                            <i class="fas fa-star cursor-pointer hover:scale-110 transition-transform"></i>
                            <i class="fas fa-star cursor-pointer hover:scale-110 transition-transform"></i>
                            <i class="fas fa-star cursor-pointer hover:scale-110 transition-transform"></i>
                            <i class="fas fa-star cursor-pointer hover:scale-110 transition-transform"></i>
                            <i class="far fa-star cursor-pointer text-stone-300 hover:scale-110 transition-transform"></i>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-black text-stone-400 uppercase tracking-[0.2em] mb-3">Votre commentaire</label>
                        <textarea rows="4" placeholder="Comment s'est déroulée votre expérience ? Qu'avez-vous appris ?" 
                                  class="w-full bg-stone-50 border border-stone-200 rounded-2xl p-4 focus:ring-2 focus:ring-emerald-500 outline-none text-sm transition-all"></textarea>
                    </div>

                    <div class="flex justify-end gap-4">
                        <button type="button" onclick="window.location.href='index.php'" class="px-6 py-3 rounded-xl font-bold text-stone-400 hover:text-stone-600 transition">
                            Plus tard
                        </button>
                        <button class="bg-emerald-800 text-white font-black px-8 py-3 rounded-xl hover:bg-emerald-700 shadow-lg transition-all transform hover:-translate-y-1">
                            Publier mon avis
                        </button>
                    </div>
                </form>
            </div>

            <div class="bg-stone-100/40 rounded-3xl p-6 border border-dashed border-stone-300">
                <p class="text-xs text-stone-400 italic text-center">Vous avez déjà évalué vos 2 autres visites guidées cette semaine.</p>
            </div>

        </div>
    </main>

    <footer class="py-8 text-center border-t border-stone-200 mt-12">
        <p class="text-[10px] text-stone-400 font-bold uppercase tracking-widest">© 2025 Zoo ASSAD - Plateforme Visiteur</p>
    </footer>

</body>
</html>