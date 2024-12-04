<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'photo',
        'bio',
        'expertise',
        'role',
    ];

    public function departmentsAsHead(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Department::class, 'head_of_department_id');
    }
}
