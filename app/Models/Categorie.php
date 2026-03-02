<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Categorie extends Model
{
    protected $fillable = [
        'titre',
        'colocation_id',
    ];

    public function colocations(): BelongsTo
    {
        return $this->belongsTo(Colocation::class);
    }
}
