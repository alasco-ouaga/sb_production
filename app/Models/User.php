<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\belongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'matricule',
        'email',
        'password',
        'locality',
        'access'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function structure(): BelongsTo {
        return $this->belongsTo(Structure::class, "structure_id");
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, "role_user","user_id","role_id");
    }

    public function actions() : HasMany
    {
       return $this->hasMany(Action::class , "action_id"); 
    }
}
