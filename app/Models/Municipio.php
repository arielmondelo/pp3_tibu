<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Municipio extends Model
{
    use HasFactory;

    public function solicitudOrg(): HasMany
    {
        return $this->hasMany(Solicitud::class, 'origen_id');
    }

    public function solicitudDest(): HasMany
    {
        return $this->hasMany(Solicitud::class, 'destino_id');
    }
}
