<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Utilisateurs - ASSAD Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-stone-50 font-sans min-h-screen flex">

    <aside class="w-72 bg-emerald-950 text-white flex flex-col shadow-2xl sticky top-0 h-screen">
        <div class="p-8">
            <a href="index.php" class="text-2xl font-bold tracking-widest flex items-center gap-3 text-amber-400">
                <i class="fas fa-shield-alt"></i> ASSAD ADMIN
            </a>
            <p class="text-emerald-500 text-xs mt-1 uppercase tracking-tighter">Gestion CAN 2025</p>
        </div>
        
        <nav class="flex-grow px-4 space-y-2">
            <a href="admin_dashboard.php" class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-emerald-900 transition text-emerald-100">
                <i class="fas fa-th-large w-6"></i> Dashboard
            </a>
            <a href="admin_users.php" class="flex items-center gap-4 px-4 py-3 rounded-xl bg-amber-500 text-emerald-950 font-bold shadow-lg">
                <i class="fas fa-users w-6"></i> Utilisateurs
            </a>
            <a href="admin_animals.php" class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-emerald-900 transition text-emerald-100">
                <i class="fas fa-paw w-6"></i> Animaux (CRUD)
            </a>
            <a href="admin_habitats.php" class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-emerald-900 transition text-emerald-100">
                <i class="fas fa-leaf w-6"></i> Habitats
            </a>
        </nav>

        <div class="p-6 border-t border-emerald-900">
            <a href="logout.php" class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-red-900/50 text-red-400 transition">
                <i class="fas fa-sign-out-alt w-6"></i> Déconnexion
            </a>
        </div>
    </aside>

    <main class="flex-1 p-10 overflow-y-auto">
        
        <header class="flex justify-between items-end mb-10">
            <div>
                <h1 class="text-4xl font-black text-emerald-900">Gestion des Comptes</h1>
                <p class="text-stone-500">Approuvez les guides et gérez les accès visiteurs.</p>
            </div>
            <div class="flex gap-3">
                <span class="bg-white px-4 py-2 rounded-lg shadow-sm border border-stone-200 text-sm font-medium">
                    <i class="fas fa-circle text-emerald-500 text-[10px] mr-2"></i> Session Admin Active
                </span>
            </div>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-200 flex items-center gap-5">
                <div class="w-12 h-12 bg-amber-100 text-amber-600 rounded-full flex items-center justify-center text-xl">
                    <i class="fas fa-user-clock"></i>
                </div>
                <div>
                    <p class="text-xs text-stone-400 uppercase font-bold">En attente (Guides)</p>
                    <p class="text-2xl font-black text-stone-800">04</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-200 flex items-center gap-5">
                <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center text-xl">
                    <i class="fas fa-check-double"></i>
                </div>
                <div>
                    <p class="text-xs text-stone-400 uppercase font-bold">Comptes Actifs</p>
                    <p class="text-2xl font-black text-stone-800">1,128</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-200 flex items-center gap-5">
                <div class="w-12 h-12 bg-red-100 text-red-600 rounded-full flex items-center justify-center text-xl">
                    <i class="fas fa-user-slash"></i>
                </div>
                <div>
                    <p class="text-xs text-stone-400 uppercase font-bold">Désactivés</p>
                    <p class="text-2xl font-black text-stone-800">12</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-xl border border-stone-200 overflow-hidden">
            <div class="p-6 border-b border-stone-100 bg-stone-50/50 flex justify-between items-center">
                <h3 class="font-bold text-emerald-900 flex items-center gap-2">
                    <i class="fas fa-list text-amber-500"></i> Liste des utilisateurs inscrits
                </h3>
                <div class="relative w-64">
                    <i class="fas fa-search absolute left-3 top-3 text-stone-400 text-sm"></i>
                    <input type="text" placeholder="Rechercher un nom..." class="w-full pl-10 pr-4 py-2 bg-white border border-stone-200 rounded-xl text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-stone-400 text-xs uppercase tracking-widest border-b border-stone-100">
                            <th class="p-6 font-black">Utilisateur</th>
                            <th class="p-6 font-black">Rôle</th>
                            <th class="p-6 font-black">Date Inscription</th>
                            <th class="p-6 font-black text-center">Statut</th>
                            <th class="p-6 font-black text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-50">
                        
                        <tr class="hover:bg-amber-50/30 transition">
                            <td class="p-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-emerald-800 text-white rounded-full flex items-center justify-center font-bold">MA</div>
                                    <div>
                                        <p class="font-bold text-stone-800">Mehdi Amrani</p>
                                        <p class="text-xs text-stone-400 italic">m.amrani@atlasguide.ma</p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-6">
                                <span class="bg-blue-50 text-blue-600 text-[10px] font-black px-2 py-1 rounded-md border border-blue-100 uppercase italic tracking-tighter">
                                    <i class="fas fa-map-signs mr-1"></i> Guide
                                </span>
                            </td>
                            <td class="p-6 text-sm text-stone-500">14/12/2025</td>
                            <td class="p-6 text-center">
                                <span class="bg-amber-100 text-amber-700 text-[10px] font-bold px-3 py-1 rounded-full animate-pulse">
                                    EN ATTENTE
                                </span>
                            </td>
                            <td class="p-6 text-right space-x-2">
                                <button class="bg-emerald-600 text-white px-4 py-1.5 rounded-lg text-xs font-bold hover:bg-emerald-700 shadow-md">Approuver</button>
                                <button class="text-red-500 hover:bg-red-50 p-2 rounded-lg transition"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>

                        <tr class="hover:bg-stone-50 transition">
                            <td class="p-6">
                                <div class="flex items-center gap-3">
                                    <img src="https://ui-avatars.com/api/?name=Sarah+Diallo&background=10b981&color=fff" class="w-10 h-10 rounded-full" alt="avatar">
                                    <div>
                                        <p class="font-bold text-stone-800">Sarah Diallo</p>
                                        <p class="text-xs text-stone-400 italic">sarah.d@gmail.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-6">
                                <span class="bg-stone-100 text-stone-600 text-[10px] font-black px-2 py-1 rounded-md border border-stone-200 uppercase tracking-tighter">
                                    <i class="fas fa-user mr-1"></i> Visiteur
                                </span>
                            </td>
                            <td class="p-6 text-sm text-stone-500">10/12/2025</td>
                            <td class="p-6 text-center">
                                <span class="bg-emerald-50 text-emerald-600 text-[10px] font-bold px-3 py-1 rounded-full border border-emerald-100">
                                    ACTIF
                                </span>
                            </td>
                            <td class="p-6 text-right space-x-2">
                                <button class="border border-stone-200 text-stone-600 px-4 py-1.5 rounded-lg text-xs font-bold hover:bg-red-500 hover:text-white hover:border-red-500 transition shadow-sm">Désactiver</button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            
            <div class="p-6 bg-stone-50/50 border-t border-stone-100 flex justify-between items-center text-xs text-stone-500">
                <p>Affichage de 1 à 10 sur 1,144 utilisateurs</p>
                <div class="flex gap-2">
                    <button class="w-8 h-8 rounded bg-white border border-stone-200 flex items-center justify-center hover:bg-emerald-50"><i class="fas fa-chevron-left"></i></button>
                    <button class="w-8 h-8 rounded bg-emerald-800 text-white flex items-center justify-center">1</button>
                    <button class="w-8 h-8 rounded bg-white border border-stone-200 flex items-center justify-center hover:bg-emerald-50">2</button>
                    <button class="w-8 h-8 rounded bg-white border border-stone-200 flex items-center justify-center hover:bg-emerald-50"><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </main>

</body>
</html>