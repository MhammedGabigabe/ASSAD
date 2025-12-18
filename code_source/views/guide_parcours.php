<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Visite - ASSAD Zoo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .step-number { font-family: 'Georgia', serif; }
        .drag-handle { cursor: grab; }
        .drag-handle:active { cursor: grabbing; }
    </style>
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
            <a href="guide_create_tour.php" class="flex items-center gap-4 px-4 py-3 rounded-xl bg-amber-500 text-emerald-950 font-bold shadow-lg">
                <i class="fas fa-plus-circle w-6"></i> Créer une Visite
            </a>
            <a href="guide_reservations.php" class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-emerald-900 transition text-emerald-100">
                <i class="fas fa-clipboard-list w-6"></i> Réservations
            </a>
        </nav>
        <div class="p-6 border-t border-emerald-900">
            <p class="text-[10px] text-emerald-500 uppercase tracking-widest font-bold">Session Guide : Actif</p>
        </div>
    </aside>

    <main class="flex-1 p-10">
        
        <header class="mb-10 flex justify-between items-start">
            <div>
                <h1 class="text-4xl font-black text-emerald-900 tracking-tight">Nouvelle Expédition</h1>
                <p class="text-stone-500 mt-2">Définissez votre itinéraire et partagez votre passion africaine.</p>
            </div>
            <a href="guide_dashboard.php" class="text-emerald-800 font-bold hover:text-amber-600 transition flex items-center gap-2">
                <i class="fas fa-arrow-left"></i> Retour
            </a>
        </header>

        <form action="process_tour.php" method="POST" class="max-w-6xl mx-auto space-y-8">
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-white p-8 rounded-3xl shadow-sm border border-stone-200">
                        <h2 class="text-lg font-bold text-emerald-900 mb-6 flex items-center gap-2">
                            <i class="fas fa-info-circle text-amber-500"></i> Informations Générales
                        </h2>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-xs font-black text-stone-400 uppercase tracking-widest mb-2">Titre de la visite virtuelle</label>
                                <input type="text" name="title" required placeholder="Ex: Sur les traces du Lion de Barbarie" 
                                       class="w-full px-4 py-3 rounded-xl border border-stone-200 focus:ring-2 focus:ring-emerald-500 outline-none transition bg-stone-50/50">
                            </div>
                            
                            <div>
                                <label class="block text-xs font-black text-stone-400 uppercase tracking-widest mb-2">Description narrative</label>
                                <textarea name="description" rows="4" placeholder="Décrivez l'expérience unique que vous proposez..." 
                                          class="w-full px-4 py-3 rounded-xl border border-stone-200 focus:ring-2 focus:ring-emerald-500 outline-none transition bg-stone-50/50"></textarea>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-black text-stone-400 uppercase tracking-widest mb-2">Langue</label>
                                    <select name="language" class="w-full px-4 py-3 rounded-xl border border-stone-200 focus:ring-2 focus:ring-emerald-500 outline-none bg-stone-50/50">
                                        <option value="fr">Français 🇫🇷</option>
                                        <option value="ar">Arabe 🇲🇦</option>
                                        <option value="en">Anglais 🇬🇧</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-black text-stone-400 uppercase tracking-widest mb-2">Capacité Max (Pers.)</label>
                                    <input type="number" name="capacity" placeholder="50" 
                                           class="w-full px-4 py-3 rounded-xl border border-stone-200 focus:ring-2 focus:ring-emerald-500 outline-none bg-stone-50/50">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-8 rounded-3xl shadow-sm border border-stone-200">
                        <h2 class="text-lg font-bold text-emerald-900 mb-6 flex items-center gap-2">
                            <i class="fas fa-map-marked-alt text-amber-500"></i> Parcours & Étapes
                        </h2>
                        <p class="text-sm text-stone-500 mb-6">Ajoutez les zones du zoo que vous allez traverser dans l'ordre de votre choix.</p>
                        
                        <div id="steps-list" class="space-y-3">
                            <div class="flex items-center gap-4 bg-stone-50 p-4 rounded-2xl border border-stone-200 group">
                                <div class="step-number w-8 h-8 bg-emerald-800 text-white rounded-full flex items-center justify-center font-bold shadow-sm">1</div>
                                <select name="steps[]" class="flex-1 bg-transparent font-bold text-stone-700 outline-none">
                                    <option value="1">Zone Mammifères (Lions, Gazelles)</option>
                                    <option value="2">Montagnes de l'Atlas (Singes, Mouflons)</option>
                                    <option value="3">Volière Royale (Oiseaux exotiques)</option>
                                    <option value="4">Zone Aquatique (Crocodiles, Hippos)</option>
                                </select>
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-grip-lines text-stone-300 drag-handle"></i>
                                    <button type="button" class="text-stone-300 hover:text-red-500 transition"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                        </div>

                        <button type="button" id="add-step" class="mt-6 w-full py-4 border-2 border-dashed border-emerald-200 rounded-2xl text-emerald-700 font-bold hover:bg-emerald-50 transition flex items-center justify-center gap-2">
                            <i class="fas fa-plus-circle"></i> Ajouter une étape au parcours
                        </button>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-emerald-900 p-8 rounded-3xl shadow-xl text-white">
                        <h2 class="text-lg font-bold mb-6 text-amber-400">Planification</h2>
                        
                        <div class="space-y-6">
                            <div>
                                <label class="block text-[10px] font-black uppercase tracking-widest text-emerald-400 mb-2">Date de l'événement</label>
                                <input type="date" name="date" class="w-full bg-emerald-800 border border-emerald-700 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-amber-500">
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-emerald-400 mb-2">Début</label>
                                    <input type="time" name="start_time" class="w-full bg-emerald-800 border border-emerald-700 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-amber-500">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-emerald-400 mb-2">Durée (min)</label>
                                    <input type="number" name="duration" placeholder="60" class="w-full bg-emerald-800 border border-emerald-700 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-amber-500">
                                </div>
                            </div>
                            <div>
                                <label class="block text-[10px] font-black uppercase tracking-widest text-emerald-400 mb-2">Tarif de la visite (€)</label>
                                <div class="relative">
                                    <span class="absolute left-4 top-3 text-amber-500 font-bold">€</span>
                                    <input type="number" step="0.01" name="price" placeholder="15.00" class="w-full bg-emerald-800 border border-emerald-700 rounded-xl pl-10 pr-4 py-3 outline-none focus:ring-2 focus:ring-amber-500 font-bold text-xl">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="w-full mt-10 bg-amber-500 text-emerald-950 font-black py-4 rounded-2xl shadow-lg hover:bg-amber-400 transition transform hover:-translate-y-1 uppercase tracking-tighter">
                            Publier la visite
                        </button>
                        <p class="text-[10px] text-emerald-400 text-center mt-4 italic">En publiant, vous acceptez la charte éthique du Zoo ASSAD.</p>
                    </div>

                    <div class="bg-white p-6 rounded-3xl border border-stone-200">
                        <h3 class="text-sm font-bold text-stone-800 mb-4">Besoin d'aide ?</h3>
                        <ul class="text-xs text-stone-500 space-y-3">
                            <li class="flex gap-2"><i class="fas fa-lightbulb text-amber-500"></i> Essayez de varier les habitats pour une visite dynamique.</li>
                            <li class="flex gap-2"><i class="fas fa-clock text-emerald-600"></i> Les visites de 45-60 min sont les plus populaires.</li>
                        </ul>
                    </div>
                </div>

            </div>
        </form>
    </main>

    <script>
        // Logique simple pour ajouter des étapes
        const addButton = document.getElementById('add-step');
        const list = document.getElementById('steps-list');
        
        addButton.addEventListener('click', () => {
            const stepCount = list.children.length + 1;
            const newStep = document.createElement('div');
            newStep.className = "flex items-center gap-4 bg-stone-50 p-4 rounded-2xl border border-stone-200 group";
            newStep.innerHTML = `
                <div class="step-number w-8 h-8 bg-emerald-800 text-white rounded-full flex items-center justify-center font-bold shadow-sm">${stepCount}</div>
                <select name="steps[]" class="flex-1 bg-transparent font-bold text-stone-700 outline-none">
                    <option value="1">Zone Mammifères (Lions, Gazelles)</option>
                    <option value="2">Montagnes de l'Atlas (Singes, Mouflons)</option>
                    <option value="3">Volière Royale (Oiseaux exotiques)</option>
                    <option value="4">Zone Aquatique (Crocodiles, Hippos)</option>
                </select>
                <div class="flex items-center gap-2">
                    <i class="fas fa-grip-lines text-stone-300 drag-handle"></i>
                    <button type="button" onclick="this.parentElement.parentElement.remove()" class="text-stone-300 hover:text-red-500 transition"><i class="fas fa-times"></i></button>
                </div>
            `;
            list.appendChild(newStep);
        });
    </script>
</body>
</html>