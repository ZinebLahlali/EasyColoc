<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\Colocation;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
   public function createCategory(Colocation $colocation)
    {
        return view('categories.create', compact('colocation'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
        ]);

        Categorie::create([
            'titre' => $request->titre,
            'colocation_id' => $request->colocation_id,

        ]);
        
        return redirect()->back()->with('success', 'Catégorie ajoutée !');

        
    }
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorie $categorie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie)
    {
        //
    }
}
