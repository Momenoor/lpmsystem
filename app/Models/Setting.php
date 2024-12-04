<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Setting extends Model
{
    protected $fillable = [
        'key',
        'value'
    ];


    public static function get(string $key, $default = null)
    {
        $value = static::query()->where('key', $key)->value('value') ?? $default;
        if (is_string($value) && is_json($value)) {
            $value = json_decode($value, true);
        }
        if ($key === 'site_logo' || $key === 'favicon' || $key === 'icon_boxes') {
            $value = $value ? (array)$value : null;
        }
        return $value;
    }

    public static function set(string $key, $value): void
    {
        if (is_array($value) || is_object($value)) {
            $value = json_encode($value);
        }
        static::updateOrCreate(['key' => $key], ['value' => $value ?? null]);
    }

    public static function getAll(array $defaults = []): array
    {
        $settings = static::query()
            ->get()
            ->pluck('value', 'key')
            ->toArray();

        $settings = Arr::map($settings, function ($value, $key) {
            // Decode JSON values into arrays
            if (is_string($value) && is_json($value)) {
                $value = json_decode($value, true);
            }

            // Handle file upload values (e.g., site_logo, favicon)
            if (in_array($key, ['site_logo', 'favicon'])) {
                return is_string($value) ? (array)$value : null;
            }

            // Handle icon_boxes repeater
            if ($key === 'icon_boxes' && is_array($value)) {
                return array_map(function ($subValue) {
                    if (is_array($subValue) && array_key_exists('image', $subValue)) {
                        $subValue['image'] = is_string($subValue['image']) ? (array)$subValue['image'] : null;
                    }
                    return $subValue;
                }, $value);
            }

            return $value;
        });

        return array_merge($defaults, $settings);
    }
}
