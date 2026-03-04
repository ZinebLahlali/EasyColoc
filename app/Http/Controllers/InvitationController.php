<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Http\Requests\StoreInvitationRequest;
use App\Http\Requests\UpdateInvitationRequest;
use App\Models\Colocation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvitationMail;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;

use function Symfony\Component\Clock\now;

class InvitationController extends Controller
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
        
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Colocation $colocation)
    {
        $request->validate([
            'email' => 'required|email|unique:invitations,email',
        ]);
        $token = Str::random(32);
        //   dd($request->email);
        try{
             Invitation::create([
            'colocation_id' => $colocation->id,
            'token' => $token,
            'expries_at' => Carbon::now()->addDay(1),
            'status' => 'pending',
            'email' => $request->email,
        ]);
       
      

        Mail::to($request->email)->send(new InvitationMail($token));

        // return "Invitaion envoyée à {$request->email}";
        return back();
         } catch (\Exception $e) {
             dd($e->getMessage()); 
            }
        
    }

    public function showInvitation()
    {
        return view('/Mail/invitation');
    }


    public function accept($token)
    {
        $invitation = Invitation::where('token', $token)->where('status', 'pending')->firstOrFail();
          if($invitation->expries_at < Carbon::now()){
            return "Désole, cette invitation a expiré.";
          }
          
        $user = Auth::user();

        $active = $user->colocationActive->first();
        // echo $active;
        if($active)
            {
                return redirect()->route('colocations.show', $active->id);
            }

        $invitation->colocation->users()->attach($user->id);

        $invitation->update(['status' => 'accepted']);

        return redirect()->route('colocations.show', $invitation->colocation_id)->with('succes', "Félicitations ! Vous êtes maintenant membre de la colocation.");
    }


    public function quitterColocation()
    {
        if()
    }


    /**
     * Display the specified resource.
     */
    public function show(Invitation $invitation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invitation $invitation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvitationRequest $request, Invitation $invitation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invitation $invitation)
    {
        //
    }
}
