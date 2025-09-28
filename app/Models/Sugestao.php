<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sugestao extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'morador_id',
        'titulo',
        'descricao',
        'status',
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
        ];
    }

    public function morador(): BelongsTo
    {
        return $this->belongsTo(Morador::class);
    }

    public function sugestaoTags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
