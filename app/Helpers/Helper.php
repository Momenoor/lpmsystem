<?php

use App\Services\SettingsService;

if (!function_exists('setting')) {
    /**
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    function setting(string $key, $default = null): string|array|null
    {
        $settings = app(SettingsService::class);
        return $settings->get($key, $default);
    }
}

if (!function_exists('is_json')) {
    function is_json($string): bool
    {
        if (!is_string($string)) {
            return false;
        }

        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }
}

