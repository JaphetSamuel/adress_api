<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Appartement extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_at',
        'updated_at',
        'titre',
        'description',
        'type',
        'disponible',
        'owner_id',
    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function comodites(): BelongsToMany
    {
        return $this->belongsToMany(Comoditie::class );
    }

    public function rooms(): BelongsToMany
    {
        return $this->belongsToMany(Room::class);
    }

    public function position():HasOne
    {
        return $this->hasOne(Position::class);
    }

}
