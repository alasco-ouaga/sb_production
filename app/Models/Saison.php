<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Saison extends Model
{
    use HasFactory;

    protected $table = "saisons";
    protected $fillable = [
        "begin",
        "end"
    ];

    public function commandes() : HasMany
    {
        return $this->hasMany(Commande::class);
    }
}
