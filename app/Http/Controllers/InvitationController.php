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
        Invitation::create([
            'colocation_id' => $colocation->id,
            'token' => $token,
            'expries_at' => now()->addDays(2),
            'status' => 'pending',
            'email' => $request->email,
        ]);

        Mail::to($request->email)->send(new InvitationMail($token));

        return "Invitaion envoyée à {$request->email}";
        
    }

    public function showInvitation()
    {
        return view('/Mail/invitation');
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
