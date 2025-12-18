<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace Guide - ASSAD Zoo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-stone-50 font-sans min-h-screen flex">

    <aside class="w-72 bg-emerald-900 text-white flex flex-col shadow-2xl sticky top-0 h-screen">
        <div class="p-8">
            <a href="index.php" class="text-2xl font-bold tracking-widest flex items-center gap-3 text-amber-400">
                <i class="fas fa-compass"></i> GUIDE ASSAD
            </a>
        </div>
        <nav class="flex-grow px-4 space-y-2">
            <a href="guide_dashboard.php" class="flex items-center gap-4 px-4 py-3 rounded-xl bg-amber-500 text-emerald-950 font-bold shadow-lg">
                <i class="fas fa-calendar-check w-6"></i> Mes Visites
            </a>
            <a href="guide_create_tour.php" class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-emerald-800 transition text-emerald-100">
                <i class="fas fa-plus-circle w-6"></i> Créer une Visite
            </a>
            <a href="guide_reservations.php" class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-emerald-800 transition text-emerald-100">
                <i class="fas fa-clipboard-list w-6"></i> Réservations
            </a>
        </nav>
    </aside>

    <main class="flex-1 p-10 overflow-y-auto">
        <header class="flex justify-between items-center mb-10">
            <div>
                <h1 class="text-4xl font-black text-emerald-900">Mes Visites Guidées</h1>
                <p class="text-stone-500 italic text-sm">Organisez vos parcours pour les supporters de la CAN 2025.</p>
            </div>
            <a href="guide_create_tour.php" class="bg-emerald-800 text-white px-6 py-3 rounded-xl font-bold hover:bg-emerald-700 transition flex items-center gap-2">
                <i class="fas fa-plus"></i> Nouvelle Visite
            </a>
        </header>

        <div class="grid grid-cols-1 gap-6">
            <div class="bg-white rounded-2xl shadow-sm border border-stone-200 p-6 flex items-center justify-between">
                <div class="flex items-center gap-6">
                    <div class="bg-emerald-100 text-emerald-700 w-16 h-16 rounded-xl flex items-center justify-center text-2xl">
                        <i class="fas fa-lion"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-stone-800 uppercase tracking-tight">Expédition Lions de l'Atlas</h3>
                        <p class="text-sm text-stone-500"><i class="far fa-calendar-alt mr-2"></i>20 Déc. 2025 à 14:00 (1h30)</p>
                        <div class="flex gap-4 mt-2">
                            <span class="text-xs bg-stone-100 px-2 py-1 rounded">Français</span>
                            <span class="text-xs bg-stone-100 px-2 py-1 rounded">Capacité: 50 max</span>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col items-end gap-3">
                    <span class="text-2xl font-black text-emerald-900">15.00 €</span>
                    <div class="flex gap-2">
                        <button class="text-blue-600 hover:bg-blue-50 p-2 rounded-lg transition" title="Modifier"><i class="fas fa-edit"></i></button>
                        <button class="text-red-600 hover:bg-red-50 p-2 rounded-lg transition" title="Annuler"><i class="fas fa-times-circle"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>