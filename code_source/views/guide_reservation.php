<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservations - ASSAD Zoo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-stone-50 font-sans min-h-screen flex">

    <aside class="w-72 bg-emerald-950 text-white flex flex-col shadow-2xl sticky top-0 h-screen">
        <div class="p-8">
            <a href="index.php" class="text-2xl font-bold tracking-widest flex items-center gap-3 text-amber-400">
                <i class="fas fa-compass"></i> GUIDE ASSAD
            </a>
        </div>
        <nav class="flex-grow px-4 space-y-2">
            <a href="guide_dashboard.php" class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-emerald-900 transition text-emerald-100">
                <i class="fas fa-calendar-check w-6"></i> Mes Visites
            </a>
            <a href="guide_create_tour.php" class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-emerald-900 transition text-emerald-100">
                <i class="fas fa-plus-circle w-6"></i> Créer une Visite
            </a>
            <a href="guide_reservations.php" class="flex items-center gap-4 px-4 py-3 rounded-xl bg-amber-500 text-emerald-950 font-bold shadow-lg">
                <i class="fas fa-clipboard-list w-6"></i> Réservations
            </a>
        </nav>
        <div class="p-6 border-t border-emerald-900">
             <a href="logout.php" class="flex items-center gap-4 px-4 py-2 text-red-400 hover:text-red-300 transition text-sm">
                <i class="fas fa-sign-out-alt"></i> Déconnexion
            </a>
        </div>
    </aside>

    <main class="flex-1 p-10">
        
        <header class="mb-10 flex justify-between items-end">
            <div>
                <h1 class="text-4xl font-black text-emerald-900 tracking-tight">Liste des Réservations</h1>
                <p class="text-stone-500 mt-2">Suivez les inscriptions des supporters pour vos prochaines visites.</p>
            </div>
            <div class="flex gap-4">
                <button class="bg-white border border-stone-200 text-emerald-900 px-5 py-2 rounded-xl font-bold text-sm shadow-sm hover:bg-stone-50 transition flex items-center gap-2">
                    <i class="fas fa-file-export"></i> Exporter la liste
                </button>
            </div>
        </header>

        <div class="mb-8 bg-white p-4 rounded-2xl shadow-sm border border-stone-200 flex items-center gap-4">
            <span class="text-xs font-black text-stone-400 uppercase tracking-widest ml-2">Filtrer par visite :</span>
            <select class="bg-stone-100 border-none rounded-lg px-4 py-2 text-sm font-bold text-emerald-900 outline-none focus:ring-2 focus:ring-amber-500">
                <option>Toutes mes visites</option>
                <option>Expédition Lions de l'Atlas (20/12)</option>
                <option>Secrets de la Savane (22/12)</option>
            </select>
        </div>

        <div class="bg-white rounded-3xl shadow-xl border border-stone-200 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-stone-50 text-stone-400 text-[10px] uppercase tracking-[0.2em] font-black border-b border-stone-100">
                        <th class="p-6">Visiteur</th>
                        <th class="p-6">Visite Guidée</th>
                        <th class="p-6 text-center">Places</th>
                        <th class="p-6">Date de réservation</th>
                        <th class="p-6 text-right">Statut Paiement</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-50">
                    
                    <tr class="hover:bg-emerald-50/30 transition group">
                        <td class="p-6">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 bg-amber-100 text-amber-700 rounded-full flex items-center justify-center font-bold">
                                    YE
                                </div>
                                <div>
                                    <p class="font-bold text-stone-800">Yassine El Fassi</p>
                                    <p class="text-xs text-stone-400 italic">yassine.fassi@gmail.com</p>
                                </div>
                            </div>
                        </td>
                        <td class="p-6">
                            <span class="text-sm font-bold text-emerald-800">Expédition Lions de l'Atlas</span>
                            <p class="text-[10px] text-stone-400 uppercase">Prévue le 20/12/2025</p>
                        </td>
                        <td class="p-6 text-center">
                            <span class="bg-emerald-100 text-emerald-700 font-black px-3 py-1 rounded-lg text-sm">
                                04
                            </span>
                        </td>
                        <td class="p-6 text-sm text-stone-500">
                            15 Déc. 2025 <br>
                            <span class="text-[10px]">à 14:32</span>
                        </td>
                        <td class="p-6 text-right">
                            <span class="bg-emerald-500 text-white text-[10px] font-black px-3 py-1 rounded-full shadow-sm">
                                <i class="fas fa-check-circle mr-1"></i> CONFIRMÉ
                            </span>
                        </td>
                    </tr>

                    <tr class="hover:bg-emerald-50/30 transition group">
                        <td class="p-6">
                            <div class="flex items-center gap-4">
                                <img src="https://ui-avatars.com/api/?name=Aicha+Traore&background=065f46&color=fff" class="w-10 h-10 rounded-full shadow-sm" alt="avatar">
                                <div>
                                    <p class="font-bold text-stone-800">Aicha Traoré</p>
                                    <p class="text-xs text-stone-400 italic">aicha.t@yahoo.sn</p>
                                </div>
                            </div>
                        </td>
                        <td class="p-6">
                            <span class="text-sm font-bold text-emerald-800">Secrets de la Savane</span>
                            <p class="text-[10px] text-stone-400 uppercase">Prévue le 22/12/2025</p>
                        </td>
                        <td class="p-6 text-center">
                            <span class="bg-emerald-100 text-emerald-700 font-black px-3 py-1 rounded-lg text-sm">
                                02
                            </span>
                        </td>
                        <td class="p-6 text-sm text-stone-500">
                            16 Déc. 2025 <br>
                            <span class="text-[10px]">à 09:15</span>
                        </td>
                        <td class="p-6 text-right">
                            <span class="bg-amber-100 text-amber-700 text-[10px] font-black px-3 py-1 rounded-full border border-amber-200">
                                <i class="fas fa-clock mr-1"></i> EN ATTENTE
                            </span>
                        </td>
                    </tr>

                </tbody>
            </table>

            <div class="p-6 bg-stone-50 border-t border-stone-100 flex justify-between items-center">
                <div class="flex gap-6">
                    <div class="text-center">
                        <p class="text-[10px] font-black text-stone-400 uppercase">Total Visiteurs</p>
                        <p class="text-xl font-bold text-emerald-900">42</p>
                    </div>
                    <div class="text-center">
                        <p class="text-[10px] font-black text-stone-400 uppercase">Places restantes</p>
                        <p class="text-xl font-bold text-amber-600">08</p>
                    </div>
                </div>
                <div class="flex gap-2">
                    <button class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-stone-200 text-stone-400 hover:text-emerald-900 transition">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-stone-200 text-stone-400 hover:text-emerald-900 transition">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </main>

</body>
</html>