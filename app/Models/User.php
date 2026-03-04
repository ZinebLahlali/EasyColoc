<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
     public function colocations(): BelongsToMany
     {
        return $this->belongsToMany(colocation::class);
     }


    protected $fillable = [
        'photo',
        'name',
        'pseudo',
        'email',
        'password',
      
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

   public function colocationActive()
   {
     return $this->colocations()->where('status', 'actif');
   }




   public function colocataires()
   {
    // tous les membres de colocation même moi
     return $this->colocationActive()->with('users')->get();
   }

   public function paiements(): HasMany
   {
     return $this->hasMany(paiement::class);
   }

   public function role()
   {
     return $this->colocationActive()->withPivot('role');
   }

   public function left_at()
   {
     return $this->colocationActive()->withPivot('left_at');
   }

 public function solde_Remboursements()
 {
    $colocs = $this->colocataires()->first()->users;
    $onVousDoit=0;
    $nbr_part = 1; // sa part
    if($this->role->first()->pivot->role == 'owner'){
       foreach($colocs as $coloc){
            if($coloc->left_at->first()->pivot->left_at)
                $nbr_part++;
       }
    }
    $expenses = $this->colocationActive()->first()->expenses;
    foreach($expenses as $expense){
        if($this->id == $expense->user_id){

            $partIndividuelle = $expense->montant/count($colocs); 
            $onVousDoit += $expense->montant - $nbr_part*$partIndividuelle;
        }
    }
    return $onVousDoit;
 }

}
