<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

   public function categories(): HasMany
   {
    return $this->hasMany(Categorie::class);
   }

   public function expenses()
   {
    return $this->hasMany(Expense::class);
   }

   

}
