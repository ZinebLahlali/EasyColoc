<x-app-layout>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-extrabold italic text-gray-800 uppercase tracking-wider">
            Tableau de Bord
        </h2>
        <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-xl shadow-md flex items-center gap-2 transition">
            <span class="text-lg font-bold">+</span> Nouvelle colocation
        </button>
    </div>

    <div class="bg-green-50 border border-green-100 text-green-700 px-4 py-3 rounded-2xl mb-8 flex items-center gap-3">
        <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
        <p class="text-sm font-medium">Vous avez quitté la colocation.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
        <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-gray-100 flex flex-col justify-center min-h-[160px]">
            <div class="flex items-center gap-3 mb-4">
                <div class="bg-green-100 p-2 rounded-lg">
                    <i class="fas fa-wallet text-green-600"></i>
                </div>
                <h3 class="text-gray-400 font-medium">Mon score réputation</h3>
            </div>
            <p class="text-4xl font-bold text-gray-800">-1</p>
        </div>

        <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-gray-100 flex flex-col justify-center min-h-[160px]">
            <div class="flex items-center gap-3 mb-4">
                <div class="bg-indigo-100 p-2 rounded-lg">
                    <i class="fas fa-shopping-cart text-indigo-600"></i>
                </div>
                <h3 class="text-gray-400 font-medium">Dépenses Globales (Feb)</h3>
            </div>
            <p class="text-4xl font-bold text-gray-800">140,00 €</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <div class="lg:col-span-2">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-gray-800">Dépenses récentes</h3>
                <a href="#" class="text-indigo-600 text-sm font-semibold hover:underline">Voir tout</a>
            </div>

            <div class="bg-white rounded-[2rem] shadow-sm border border-gray-50 overflow-hidden">
                <table class="w-full text-left">
                    <thead class="bg-gray-50/50">
                        <tr>
                            <th class="px-8 py-4 text-xs font-bold text-gray-400 uppercase">Titre / Catégorie</th>
                            <th class="px-8 py-4 text-xs font-bold text-gray-400 uppercase text-center">Payeur</th>
                            <th class="px-8 py-4 text-xs font-bold text-gray-400 uppercase text-center">Montant</th>
                            <th class="px-8 py-4 text-xs font-bold text-gray-400 uppercase text-right">Coloc</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        <tr class="hover:bg-gray-50/50 transition">
                            <td class="px-8 py-6">
                                <p class="font-bold text-gray-800">facture wifi</p>
                                <span class="text-[10px] bg-indigo-50 text-indigo-400 px-2 py-0.5 rounded uppercase font-bold">Internet</span>
                            </td>
                            <td class="px-8 py-6 text-center">
                                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-600 text-xs font-bold">A</span>
                            </td>
                            <td class="px-8 py-6 text-center font-bold text-gray-800">90,00 €</td>
                            <td class="px-8 py-6 text-right text-gray-400 text-sm italic">coloc 1</td>
                        </tr>
                        <tr class="hover:bg-gray-50/50 transition">
                            <td class="px-8 py-6">
                                <p class="font-bold text-gray-800">facture électricité</p>
                                <span class="text-[10px] bg-gray-100 text-gray-400 px-2 py-0.5 rounded uppercase font-bold">Electricité</span>
                            </td>
                            <td class="px-8 py-6 text-center">
                                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-indigo-100 text-indigo-600 text-xs font-bold">U</span>
                            </td>
                            <td class="px-8 py-6 text-center font-bold text-gray-800">50,00 €</td>
                            <td class="px-8 py-6 text-right text-gray-400 text-sm italic">coloc 1</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="lg:col-span-1">
            <div class="bg-[#1a1c23] text-white p-8 rounded-[2rem] shadow-xl min-h-[200px]">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="font-bold text-lg">Membres de la coloc</h3>
                    <span class="text-[10px] bg-gray-800 px-2 py-1 rounded text-gray-400 font-bold uppercase tracking-widest">Vide</span>
                </div>
                
                <div class="flex flex-col items-center justify-center py-4 opacity-50">
                    <p class="text-sm text-gray-400 italic">Aucune colocation active.</p>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>