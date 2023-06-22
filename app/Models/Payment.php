<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $table = "payments";

    protected $fillabe = [
        "amount",
        "note",
        "commande_id"
    ];

    public function commande() : BelongsTo
    {
        return $this->belongsTo(Commande::class ,"commande_id");
    }
}
