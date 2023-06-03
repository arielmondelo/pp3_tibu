<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;
    public function solicitud(): BelongsTo
    {
        return $this->belongsTo(Solicitud::class);
    }
}
