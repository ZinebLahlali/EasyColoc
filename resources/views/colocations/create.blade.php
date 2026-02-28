<x-guest-layout>
    <h2 class="text-xl font-bold mb-4">Ajouter une colocation</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('colocation.store') }}">
        @csrf

        <div class="mb-4">
            <x-input-label for="nom" value="Nom" />
            <x-text-input id="nom" name="nom" type="text" :value="old('nom')" required class="block mt-1 w-full" />
            <x-input-error :messages="$errors->get('nom')" class="mt-2" />
        </div>
        <x-primary-button>Ajouter</x-primary-button>
    </form>
</x-guest-layout>