<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colocation;
use Illuminate\Support\Facades\Auth;



class colocationController extends Controller
{
    public function create()
    {
        return view('colocation.create');
    }

    public function store(Request $request)
    {
       $request->validate([
        'nom' => 'required|string|max:255',
       
       ]);

       $user = Auth::user();

       $colocation = Colocation::create([
        'nom' => $request->nom,
        'owner_id' => $user->id,
       ]);

       $user->colocations()->attach($colocation->id,[
            'role' => 'owner',
            'joined_at' => now(),
       ]);



       return redirect()->back()->with('success', 'Colocation ajoutée');
    }



}
