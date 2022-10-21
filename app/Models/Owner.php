<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_at',
        'updated_at',
        'nom',
        'prenom',
        'email',
        'telephone',
        'user_id'
    ];

    public function appartements()
    {
        return $this->hasMany(Appartement::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFullNameAttribute()
    {
        return $this->nom . ' ' . $this->prenom;
    }

    public function getCreatedAtAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }
}
