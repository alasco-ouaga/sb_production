<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Commande extends Model
{
    use HasFactory;

    protected $table = "commandes";

    protected $fillable = [
        "quantity",
        "amount",
        "note",
        "custumer_id",
        "produit_id",
    ];

    public function custumer() : BelongsTo 
    {
        return $this->belongsTo(Custumer::class , "custumer_id");
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class, "payment_id");
    }

    public function saison() : BelongsTo 
    {
        return $this->belongsTo(Saison::class , "saison_id");
    }
}
