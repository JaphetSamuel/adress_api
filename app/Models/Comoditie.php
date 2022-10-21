<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Comoditie extends Model
{
    use HasFactory;

    protected $table = 'comodites';

    protected $fillable = [
        'created_at',
        'updated_at',
        'nom',
    ];

    public function appartements(): BelongsToMany
    {
        return $this->belongsToMany(Appartement::class );
    }
}
