<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Prioritize the language from the route parameter
        $language = $request->route('language');

        // If no language is specified in the route, check the session
        if (!$language) {
            $language = session('locale') ?? cookie('locale');
        }

        // If still no language is set, fall back to the user's stored locale (if authenticated)
        if (!$language && auth()->check()) {
            $language = auth()->user()->language;
        }

        // If no language is set at all, use the application's default locale
        $language = $language ?? config('app.locale');

        // Validate the language against supported locales
        $supportedLocales = config('app.supported_locales', ['en', 'ar']);
        if (!in_array($language, $supportedLocales)) {
            $language = config('app.locale'); // Fallback to default if invalid
        }

        // Store the selected language in the session for persistence
        session(['locale' => $language]);
        cookie()->queue(cookie()->forever('locale', $language));

        // Set the application locale
        app()->setLocale($language);

        return $next($request);
    }

}
