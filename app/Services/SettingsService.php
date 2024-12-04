<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingsService
{
    protected array $settings = [];

    public function __construct()
    {
        $this->settings = Cache::rememberForever('app_settings', function () {
            return Setting::all()->pluck('value', 'key')->toArray();
        });
    }

    public function get(string $key, $default = null)
    {
        $value = $this->settings[$key] ?? $default;
        if (is_json($value)) {
            $value = json_decode($value, true);
        }
        return $value;
    }

    public function set(string $key, $value): void
    {
        $this->settings[$key] = $value;
        Cache::put('app_settings', $this->settings);
    }

    public static function clear(): void
    {
        Cache::forget('app_settings');
    }

}
