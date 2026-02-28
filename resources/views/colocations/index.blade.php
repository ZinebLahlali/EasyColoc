@extends('layouts.app')

@section('content')
<div class="p-10">
    <h1 class="text-3xl font-bold mb-6">Mes Colocations</h1>

    @if($colocations->isEmpty())
        <p class="text-gray-500 font-semibold">Aucune colocation disponible.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($colocations as $coloc)
                <a href="{{ route('colocations.show', $coloc->id) }}" class="block bg-white p-6 rounded-2xl shadow-md hover:-translate-y-1 transition-all border border-gray-50">
                    <h2 class="text-xl font-bold mb-2">{{ $coloc->nom }}</h2>
                    <p class="text-gray-600 mb-1">{{ $coloc->adresse }}</p>
                    <p class="text-gray-600">Capacité : {{ $coloc->capacite }}</p>
                </a>
            @endforeach
        </div>
    @endif
</div>
@endsection