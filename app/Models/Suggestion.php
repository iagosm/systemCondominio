<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Suggestion extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'resident_id',
        'title',
        'description',
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
            'resident_id' => 'integer',
            'created_at' => 'datetime',
        ];
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'suggestion_tags', 'suggestion_id', 'tag_id');
    }

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d/m/Y H:i:s');
    }

    public function resident(): BelongsTo
    {
        return $this->belongsTo(Resident::class);
    }

    public function suggestionTags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
