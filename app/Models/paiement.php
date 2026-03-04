<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class paiement extends Model
{
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function expenses():BelongsTo
    {
        return $this->belongsTo(Expense::class);
    }
}
