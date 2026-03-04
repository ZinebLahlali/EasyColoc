@extends('layouts.app')

@section('content')
<div class="p-10">
    <div class="flex justify-between p-4">
        <h1 class="text-3xl font-bold mb-6">Mes Colocations</h1>
         <a href="{{route('colocation.create')}}" class="text-blue-500 border border-blue-200 px-4 py-2 rounded-lg flex items-center gap-2 hover:bg-blue-50 transition">
                Ajouter colocation
        </a>
    </div>

    @if($colocations->isEmpty())
        <p class="text-gray-500 font-semibold">Aucune colocation disponible.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($colocations as $coloc)
                <a href="{{ route('colocations.show', $coloc->id) }}" class="block bg-white p-6 rounded-2xl shadow-md hover:-translate-y-1 transition-all border border-gray-50">
                <div class="flex justify-between">
                    <h2 class="text-xl font-bold mb-2">{{ $coloc->nom }}</h2>
                    @php 
                    $bg_color = $coloc->status == "actif" ? 'green':'red';
                    @endphp
                    <p class="text-sm text-{{$bg_color}}-600 p-2 bg-{{$bg_color}}-200 rounded-xl">{{ $coloc->status}}</p>
                </div>    
                    @if($coloc->status === "actif")
                    @php 
                    $nbr_colocataires = count($coloc->users)-1;
                    @endphp
                     <p class="text-gray-600 mb-1"> Colocataire(s): {{$nbr_colocataires}}</p>
                    @endif
                </a>
            @endforeach
        </div>
    @endif
</div>
@endsection