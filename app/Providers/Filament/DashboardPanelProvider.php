<?php

namespace App\Providers\Filament;

use App\Models\User;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Pages\Auth\Register;
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
use Jeffgreco13\FilamentBreezy\BreezyCore;
use Tests\Feature\RegistrationTest;

class DashboardPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('dashboard')
            ->path('dashboard')
            ->login()
            ->registration()
            ->font('Inconsolata')
            ->brandName('DCCO')
            ->brandLogo(asset('images/dcco1.png'))
            ->brandLogoHeight('4rem')
            ->favicon(asset('images/dcco1.png'))
            ->registration()
            ->font('Inconsolata')
            ->brandName('DCCO')
            ->brandLogo(asset('images/dcco1.png'))
            ->brandLogoHeight('4rem')
            ->favicon(asset('images/dcco1.png'))
            ->colors([
                'primary' => '#0088C3',
                'secondary' => '#608696',
                'tertiary' => '#49BAEB',
                'danger' => '#353D41',
                'gray' => '#0088C3',
                'info' => '#353D41',
                'success' => '#353D41',
                'warning' => '#353D41',
                'primary' => '#0088C3',
                'secondary' => '#608696',
                'tertiary' => '#49BAEB',
                'danger' => '#353D41',
                'gray' => '#0088C3',
                'info' => '#353D41',
                'success' => '#353D41',
                'warning' => '#353D41',
            ])
            //->topNavigation()
            ->profile()
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            //->topNavigation()
            ->profile()
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->unsavedChangesAlerts()
            ->unsavedChangesAlerts()
            ->discoverWidgets(app_path('Filament/Widgets'), 'App\\Filament\\Widgets')
            ->widgets([
                //Widgets\AccountWidget::class,
                //Widgets\FilamentInfoWidget::class,
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
            ])
            ->registration()
            ->plugin(
                BreezyCore::make()
                ->enableTwoFactorAuthentication(
                    force: false, // force the user to enable 2FA before they can use the application (default = false)
                )
                ->myProfile(
                    shouldRegisterUserMenu: true, // Sets the 'account' link in the panel User Menu (default = true)
                    shouldRegisterNavigation: false, // Adds a main navigation item for the My Profile page (default = false)
                    navigationGroup: 'Settings', // Sets the navigation group for the My Profile page (default = null)
                    hasAvatars: false, // Enables the avatar upload form component (default = false)
                    slug: 'my-profile'
                )
            )

            ->authMiddleware([
                Authenticate::class,
            ]);
    }

    public function styles(): array
    {
        return [
            asset('css/filament-styles.css'),
        ];
    }

}
