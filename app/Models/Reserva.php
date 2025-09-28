<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reserva extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'morador_id',
        'espaco_id',
        'status',
        'valor',
        'data',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'morador_id' => 'integer',
            'espaco_id' => 'integer',
            'valor' => 'decimal:2',
            'data' => 'datetime',
        ];
    }

    public function morador(): BelongsTo
    {
        return $this->belongsTo(Morador::class);
    }

    public function espaco(): BelongsTo
    {
        return $this->belongsTo(Espaco::class);
    }
}
