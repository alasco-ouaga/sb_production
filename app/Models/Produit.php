<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produit extends Model
{
    use HasFactory;

    protected $table = "produits";

    protected $fillable = [
        "name",
        "amount"
    ];

    public function commandes() : HasMany 
    {
        return $this->hasMany(Commande::class , "commande_id");
    }

}
