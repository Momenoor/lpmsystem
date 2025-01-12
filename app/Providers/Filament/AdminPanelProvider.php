<?php

namespace App\Providers\Filament;

use App\Http\Middleware\setLocale;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    /**
     * @throws \Exception
     */
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandLogo(asset('images/logo-1_1.png'))
            ->brandLogoHeight('50px')
            ->colors([
                'primary' => Color::Purple,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                SetLocale::class,
            ])
            ->authMiddleware([
                Authenticate::class,
                SetLocale::class,
            ])
            ->userMenuItems([
                MenuItem::make()
                    ->icon('heroicon-o-language')
                    ->label(function () {
                        $supportedLocales = config('app.supported_locales');
                        $currentLocale = config('app.locale');
                        foreach ($supportedLocales as $supportedLocale) {
                            if ($supportedLocale !== $currentLocale) {
                                return strtoupper($supportedLocale);
                            }
                        }
                        return strtoupper($currentLocale);
                    })
                    ->url(function () {
                        $supportedLocales = config('app.supported_locales', ['en', 'ar']);
                        $currentLocale = app()->getLocale();
                        foreach ($supportedLocales as $supportedLocale) {
                            if ($supportedLocale !== $currentLocale) {
                                return route('set-locale', ['language' => $supportedLocale]);
                            }
                        }
                        return '#';
                    })
            ]);
    }
}
