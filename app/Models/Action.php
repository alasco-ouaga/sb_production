<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Action extends Model
{
    use HasFactory;

    protected $table = "actions";

    protected $fillable = [
        "delete",
        "update",
        "user_id",
    ];

    public function User() : BelongsTo 
    {
        return $this->belongsTo(User::class,"user_id");
    }
}
