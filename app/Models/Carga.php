<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Carga extends Model
{
    use HasFactory;

    public function solicitud(): HasMany
    {
        return $this->hasMany(Solicitud::class, 'carga_id');
    }
}
