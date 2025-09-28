<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Unidade extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'tipo',
        'bloco',
        'proprietario_id',
        'proprietario_id_id',
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
            'proprietario_id' => 'integer',
            'proprietario_id_id' => 'integer',
        ];
    }

    public function proprietario(): BelongsTo
    {
        return $this->belongsTo(Morador::class);
    }

    public function proprietario(): BelongsTo
    {
        return $this->belongsTo(Proprietario::class);
    }

    public function moradorUnidades(): BelongsToMany
    {
        return $this->belongsToMany(Morador::class);
    }
}
