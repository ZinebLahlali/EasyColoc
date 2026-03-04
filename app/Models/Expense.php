<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Expense extends Model
{
    protected $fillable = [
        'titre',
        'montant',
        'date',
        'user_id',
        'colocation_id',
        'categorie_id',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function paiements(): HasMany
    {
        return $this->hasMany(paiement::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
