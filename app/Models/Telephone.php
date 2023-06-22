<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Model;

class Telephone extends Model
{
    use HasFactory;

    protected $table = 'telephones';

    protected $fillable = [
        "phone",
        "structure_id",

    ];

    public function structure(): belongsTo 
    {
        return $this->belongsTo(Structure::class, "structure_id");
    }
}
