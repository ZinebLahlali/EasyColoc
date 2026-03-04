<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colocation;
use Illuminate\Support\Facades\Auth;
use App\Models\Categorie;
use App\Models\Expense;
use App\Models\User;



class ColocationController extends Controller
{
    public function create()
    {
        return view('colocations.create');
    }

    public function show($id)
    {   
        $colocation = Colocation::findOrFail($id);
        $categories = $colocation->categories;
        $expenses = Expense::where('colocation_id', "=",$id)->with('user')->get();
        $usersTotal = $colocation->users()->count();

        $expensesTotal = $expenses->sum('montant');
            if ($usersTotal > 0) {
            $totalParIndividuelle = $expensesTotal / $usersTotal;
        } else {
            $totalParIndividuelle = 0;
        }

          $totalPayee = $expensesTotal;

          return view('colocations.show', compact(
                'colocation',
                'categories',
                'expenses',
                'expenses',
                'usersTotal',
                'expensesTotal',
                'totalParIndividuelle',
                'totalPayee'
        ));
    }

    //  public function showDetails()
    // {

    //     return view('colocations.show');
    // }

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

    

   



}
