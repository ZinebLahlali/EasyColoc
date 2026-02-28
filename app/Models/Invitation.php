<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    /** @use HasFactory<\Database\Factories\InvitationFactory> */
    use HasFactory;
     protected $fillable = [
        'status',
        'token',
        'colocation_id',
        'expries_at',
        'email',
     ];

       public function colocation()
        {
            return $this->belongsTo(Colocation::class);
        }

}
