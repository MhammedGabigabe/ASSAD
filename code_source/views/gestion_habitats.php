<?php
require_once "../controllers/gestion_habitat.php"

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Habitats - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-stone-50 font-sans min-h-screen flex">

    <aside class="w-64 bg-emerald-900 min-h-screen text-white p-6 shadow-xl">
        <h1 class="text-2xl font-bold mb-10 flex items-center gap-2 italic">
            <i class="fas fa-user-shield"></i> AdminPanel
        </h1>
        <nav class="space-y-4">
            <a href="admin_dashboard.php" class="block p-3 hover:bg-emerald-800 rounded-lg">
                <i class="fas fa-chart-line mr-2"></i> Statistiques
            </a>
            <a href="admin_users.php" class="block p-3 hover:bg-emerald-800 rounded-lg">
                <i class="fas fa-users mr-2"></i> Utilisateurs
            </a>
            <a href="gestion_animal.php" class="block p-3 hover:bg-emerald-800 rounded-lg">
                <i class="fas fa-hippo mr-2"></i> Animaux
            </a>
            <a href="gestion_habitats.php" class="block p-3 bg-emerald-700 rounded-lg">
                <i class="fas fa-mountain mr-2"></i> Habitats
            </a>
            <hr class="border-emerald-800 my-4">
            <a href="../controllers/logout.php" class="block p-3 text-amber-400 hover:text-white">
                <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
            </a>
        </nav>
    </aside>


    <main class="flex-1 p-10 overflow-y-auto">

        <header class="flex justify-between items-center mb-10">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Gestion des Habitats</h1>
                <p class="text-stone-500">Ajouter, modifier ou supprimer les habitats du zoo.</p>
            </div>
        </header>

        <div class="bg-white rounded-3xl shadow-md border border-stone-200 p-6 mb-8">
                <h3 class="font-bold text-emerald-900 mb-4">
                    <i class="fas fa-plus-circle text-amber-500 mr-2"></i>
                    <?= $habitat_edit ? "Modifier un habitat" : "Ajouter un habitat" ?>
                </h3>

            <form method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <?php if($habitat_edit){ ?>
                    <input type="hidden" name="id_habitat" value="<?= $habitat_edit['id_habitat'] ?>">
                <?php } ?>
                <input type="text" name="nom" required
                    placeholder="Nom de l'habitat"
                    value="<?= $habitat_edit['nom'] ?? '' ?>"
                    class="border border-stone-200 rounded-xl px-4 py-2 focus:ring-2 focus:ring-emerald-500">

                <textarea name="description" required
                    placeholder="Description"
                    class="border border-stone-200 rounded-xl px-4 py-2 md:col-span-2 focus:ring-2 focus:ring-emerald-500"><?= $habitat_edit['description'] ?? '' ?></textarea>

                <input type="text" name="climat" required
                    placeholder="Type climat"
                    value="<?= $habitat_edit['type_climat'] ?? '' ?>"
                    class="border border-stone-200 rounded-xl px-4 py-2 focus:ring-2 focus:ring-emerald-500"> 
                    
                <input type="text" name="zone" required
                    placeholder="Zone zoo"
                    value="<?= $habitat_edit['zone_zoo'] ?? '' ?>"
                    class="border border-stone-200 rounded-xl px-4 py-2 focus:ring-2 focus:ring-emerald-500">     

                <button name="ajouter"
                    class="bg-emerald-700 text-white px-6 py-2 rounded-xl font-bold hover:bg-emerald-800 md:col-span-2 w-fit">
                    <?= $habitat_edit ? "Mettre à jour" : "Ajouter" ?>
                </button>
            </form>
        </div>

        <div class="bg-white rounded-3xl shadow-xl border border-stone-200 overflow-hidden">
            <div class="p-6 border-b border-stone-100 bg-stone-50/50 flex justify-between items-center">
                <h3 class="font-bold text-emerald-900">
                    <i class="fas fa-list text-amber-500 mr-2"></i> Liste des habitats
                </h3>
            </div>

            <form method="POST">
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-stone-400 text-xs uppercase tracking-widest border-b">
                                <th class="p-6">Nom</th>
                                <th class="p-6">Description</th>
                                <th class="p-6">Type climat</th>
                                <th class="p-6">Zone zoo</th>
                                <th class="p-6 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            <?php foreach ($liste_habitats as $habitat): ?>
                                <tr class="hover:bg-amber-50/30">
                                    <td class="p-6 font-bold text-stone-800">
                                        <?= htmlspecialchars($habitat['nom']) ?>
                                    </td>
                                    <td class="p-6 text-stone-600 text-sm">
                                        <?= htmlspecialchars($habitat['description']) ?>
                                    </td>
                                    <td class="p-6 text-stone-600 text-sm">
                                        <?= htmlspecialchars($habitat['type_climat']) ?>
                                    </td>
                                    <td class="p-6 text-stone-600 text-sm">
                                        <?= htmlspecialchars($habitat['zone_zoo']) ?>
                                    </td>
                                    <td class="p-6 text-right space-x-2 flex">
                                        <button name="supprimer" value="<?= $habitat['id_habitat'] ?>"
                                            class="bg-red-500 text-white px-4 py-1.5 rounded-lg text-xs font-bold hover:bg-red-600">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <button name="modifier" value="<?= $habitat['id_habitat'] ?>"
                                            class="flex-1 bg-stone-100 text-stone-600 text-center py-2 rounded-lg text-sm font-bold hover:bg-amber-100 hover:text-amber-700 transition">
                                            <i class="fas fa-edit mr-1"></i> Modifier
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>

    </main>
</body>
</html>
