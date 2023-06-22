<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\belongsToMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = [
        "name",
    ];

    public function users(): BelongsToMany 
    {
        return $this->belongsToMany(User::class, "role_user","user_id", "role_id");
    }

    public function permissions() : BelongsToMany
    {
        return $this->belongsToMany(Permission::class,"permission_role","role_id","permission_id");
    }
}
