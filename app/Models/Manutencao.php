<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Manutencao extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'espaco_id',
        'tipo',
        'responsavel_id',
        'descricao',
        'data_prevista',
        'data_conclusao',
        'status',
        'responsavel_id_id',
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
            'espaco_id' => 'integer',
            'responsavel_id' => 'integer',
            'data_prevista' => 'datetime',
            'data_conclusao' => 'datetime',
            'responsavel_id_id' => 'integer',
        ];
    }

    public function espaco(): BelongsTo
    {
        return $this->belongsTo(Espaco::class);
    }

    public function responsavel(): BelongsTo
    {
        return $this->belongsTo(Morador::class);
    }

    public function responsavel(): BelongsTo
    {
        return $this->belongsTo(Responsavel::class);
    }
}
