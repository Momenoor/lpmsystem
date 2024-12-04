<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Slider extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'image',
        'link',
        'link_text',
    ];
    protected $casts = [
        'subtitle' => 'array',
    ];


//    protected function subtitle(): Attribute
//    {
//        return Attribute::make(
//            get: fn($value) => $value
//                ? Str::of($value)
//                    ->replace('\n', '<br>')
//                    ->trim()
//                : null
//        );
//
//    }
}
