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
use Illuminate\Container\Attributes\Auth;
use App\Models\User;

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
            'expries_at' => now(),
            'status' => 'pending',
            'email' => $request->email,
        ]);
       
      

        Mail::to($request->email)->send(new InvitationMail($token));

        return "Invitaion envoyée à {$request->email}";
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
        $invitation = Invitation::where('token', $token)->where('status', 'pending') ->firstOrFail();
          if($invitation->expries_at < now()){
            return "Désole, cette invitation a expiré.";
          }
          
        $user = Auth::user();
        if(!$user){
            return redirect()->route('login')->with('info', "Veuillez vous connecter pour accepter l'invitation.");
        }  
        $invitation->colocation->users()->attach($user->id);

        $invitation->update(['status' => 'accepted']);
        return "Félicitations ! Vous êtes maintenant membre de la colocation.";
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
