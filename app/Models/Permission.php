<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends Model
{
    use HasFactory;

    protected $table = "permissions";

    protected $fillable = [
        "name",
        "role_id",
    ];

    public function roles() : BelongsToMany 
    {
        return $this->belongsToMany(Role::class , "role_id");
    }
}
