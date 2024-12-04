<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HonorList extends Model
{
    protected $fillable = [
        'staff_id',
        'achievement',
        'period',
    ];

    public function staff(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }

    public function honorLists(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(HonorList::class);
    }
}
