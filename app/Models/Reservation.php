<?php

namespace App\Models;

use Buildix\Timex\Models\Event;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Reservation extends Event
{
    use HasFactory;


    protected $fillable =
        [
            "date",
            "heure",
            "tarification_id",
            "customer_id",
            "owner_id",
            "appartement_id",
            "date_debut",
            "date_fin",
        ];

    public function appartement():BelongsTo
    {
        return $this->belongsTo(Appartement::class);
    }

    public function customer():BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function tarification(): BelongsTo
    {
        return $this->BelongsTo(Tarification::class);
    }
//     TODO: ajouter la generation de reference
//    Todo : Ajouter le paiement
}
