@extends('layouts.app')

@section('content')

<div>

    <!-- Message succès -->
    <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-8 flex items-center gap-2">
        <span class="w-2 h-2 bg-green-500 rounded-full"></span>
        Paiement enregistré.
    </div>

    <!-- Header -->
    <div class="flex justify-between items-start mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Dépenses récentes</h2>

        <div class="flex gap-3">
            <!-- Bouton ouvrir modal -->
            <button id="openInviteBtn"
                class="bg-white border border-indigo-600 text-indigo-600 px-4 py-2 rounded-lg shadow-sm hover:bg-indigo-50 font-bold transition">
                <i class="fas fa-user-plus mr-1"></i> Inviter un membre
            </button>

            <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow-sm hover:bg-indigo-700 font-bold">
                + Nouvelle dépense
            </button>

            <button class="text-red-500 border border-red-200 px-4 py-2 rounded-lg flex items-center gap-2 hover:bg-red-50 transition">
                <i class="fas fa-sign-out-alt"></i> Quitter
            </button>

            <button class="bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-gray-900 transition">
                <i class="fas fa-arrow-left"></i> Retour
            </button>
        </div>
    </div>

    <!-- Contenu -->
    <div class="grid grid-cols-3 gap-8">

        <!-- Tableau -->
        <div class="col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-4 border-b flex items-center gap-2 text-gray-500 text-sm">
                <i class="fas fa-filter text-indigo-600"></i>
                <span>Filtrer par mois:</span>
                <select class="text-sm border-none bg-gray-100 rounded px-2 py-1 focus:ring-0">
                    <option>Tous les mois</option>
                </select>
            </div>

            <table class="w-full text-left">
                <thead class="text-xs text-gray-400 uppercase bg-gray-50 font-bold">
                    <tr>
                        <th class="px-6 py-4">Titre / Catégorie</th>
                        <th class="px-6 py-4">Payeur</th>
                        <th class="px-6 py-4 text-center">Montant</th>
                        <th class="px-6 py-4 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            <p class="font-bold text-gray-800">Facture Wifi</p>
                            <span class="text-[10px] bg-indigo-50 text-indigo-400 px-2 py-0.5 rounded uppercase font-bold">
                                Internet
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="w-8 h-8 bg-blue-100 text-blue-600 flex items-center justify-center rounded-full text-xs font-bold">
                                A
                            </span>
                        </td>
                        <td class="px-6 py-4 font-bold text-gray-800 text-center">
                            90,00 €
                        </td>
                        <td class="px-6 py-4 text-right text-gray-300">
                            <i class="fas fa-trash hover:text-red-500 cursor-pointer transition"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <h3 class="font-bold text-gray-800 mb-4">Qui doit à qui ?</h3>
                <div class="bg-green-50 p-4 rounded-xl border border-green-100">
                    <p class="text-xs text-gray-500 uppercase font-bold mb-1">Dette en cours</p>
                    <p class="text-sm text-gray-700">user 2 → admin</p>
                    <p class="text-2xl font-bold text-green-600">30,00 €</p>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- MODAL -->
<div id="inviteModal"
     class="fixed inset-0 z-50 hidden items-center justify-center bg-gray-900/50 backdrop-blur-sm px-4">

    <div id="modalContent"
         class="bg-white w-full max-w-lg rounded-[2.5rem] p-10 shadow-2xl animate-scaleIn">

        <h2 class="text-3xl font-bold text-gray-800 mb-2">Inviter un membre</h2>
        <p class="text-gray-400 mb-8">Ajoutez un nouveau colocataire à votre groupe.</p>
       
        <form action="{{route('send.invitation')}}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-500 mb-3 ml-1 uppercase tracking-wide">
                    Email du membre
                </label>
                <input type="email" name="email" required placeholder="exemple@mail.com"
                       class="w-full px-5 py-4 bg-gray-50 border-gray-200 border-2 rounded-2xl focus:border-indigo-500 focus:ring-0 transition text-gray-700">
            </div>

            <div class="flex justify-end gap-4">
                <button type="button" id="closeInviteBtn"
                        class="px-8 py-3 rounded-xl font-bold text-gray-400 hover:bg-gray-100 transition">
                    Annuler
                </button>

                <button type="submit"
                        class="px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold shadow-lg shadow-indigo-100 transition">
                    Envoyer l'invitation
                </button>
            </div>
        </form>
    </div>
</div>

<!-- SCRIPT -->
<script>
    const openBtn = document.getElementById('openInviteBtn');
    const closeBtn = document.getElementById('closeInviteBtn');
    const modal = document.getElementById('inviteModal');
    const modalContent = document.getElementById('modalContent');

    // Ouvrir
    openBtn.addEventListener('click', () => {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    });

    // Fermer bouton Annuler
    closeBtn.addEventListener('click', () => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    });

    // Fermer si clic en dehors
    modal.addEventListener('click', (e) => {
        if (!modalContent.contains(e.target)) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    });
</script>

@endsection