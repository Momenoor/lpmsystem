<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'type',
        'author_id',
        'published_at',
        'is_published',
    ];

    public function author(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function scopeIsPublished($query)
    {
        return $query->where('is_published', true);
    }
}
