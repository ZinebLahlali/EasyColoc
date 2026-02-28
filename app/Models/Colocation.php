<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Colocation extends Model
{
   public function users(): BelongsToMany
   {
     return $this->belongsToMany(User::class);
   }

   protected $fillable = [
    'nom',
    'status',
    'owner_id',
   ];

   

}
