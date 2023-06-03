<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Solicitud extends Model
{
    use HasFactory;

    public function vehiculo(): BelongsTo
    {
        return $this->belongsTo(Vehiculo::class, 'vehiculo_id');
    }

    public function municipioOrigen(): BelongsTo
    {
        return $this->belongsTo(Municipio::class, 'origen_id');
    }

    public function municipioDestino(): BelongsTo
    {
        return $this->belongsTo(Municipio::class, 'destino_id');
    }

    public function carga(): BelongsTo
    {
        return $this->belongsTo(Carga::class, 'carga_id');
    }

    public function cargo(): BelongsTo
    {
        return $this->belongsTo(Cargo::class, 'cargo_id');
    }

    public function distancia(): HasMany
    {
        return $this->hasMany(Distancia::class);
    }

    public function pago(): HasMany
    {
        return $this->hasMany(Pago::class);
    }
    
}
