<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;

class ExpenseController extends Controller
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
    public function showFormExpense()
    {
        return view('expenses.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeExpense(Request $request)
    {    $user = Auth::user()->id;
          Expense::create([
            'titre' => $request->titre,
            'montant' => $request->montant,
            'date' => $request->date,
            'user_id' => $user,
            'colocation_id' => $request->colocation_id,
            'categorie_id' => $request->categorie_id,
        ]);

         return back()->with('success', 'Dépense ajoutée !');
    }

    public function afficherExpense()
    {
        $expenses = Expense::all();
      return view('colocations.index', compact('expenses'));
    }
}
    

