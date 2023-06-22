<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Custumer extends Model
{
    use HasFactory;

    protected $table = "custumers";

    protected $fillable = [
        'first_name',
        'last_name',
        'matricule',
        'locality',
        'email',
        'phone',
        'password',
        'structure_id',
    ];

    public function structure() : BelongsTo 
    {
        return $this->belongsTo(Structure::class , "structure_id");
    }

    public function commandes() : HasMany 
    {
        return $this->hasMany(Commande::class , "commande_id");
    }
}
