<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    use HasFactory;

    protected $table = 'structures';

    protected $fillable = [
        'name',
        'email',
        'locality',
        'web_link',
        'matricule',
        'img_name',
        'locality_id',
        'commune_id'
    ];

    public function telephones(): HasMany 
    {
        return $this->hasMany(Telephone::class,"telephone_id");
    }

    public function custumers(): HasMany 
    {
        return $this->hasMany(Custumer::class, "custumer_id");
    }
}
