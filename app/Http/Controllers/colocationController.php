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

    public function show($id)
    {
        //  dd('asdasd');
        $colocations = Colocation::findOrFail($id);
        // dd($colocations);
        return view('colocations.show', compact('colocations'));
        // return view('colocations.showDetails');
    }

     public function showDetails()
    {
        return view('colocations.show');
    }

    public function index()
    {
        $colocations = Colocation::all();
        return view('colocations.index', compact('colocations'));
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

    public function showColocation($id)
    {
       
    }



}
