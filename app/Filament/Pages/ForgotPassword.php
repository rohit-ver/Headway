<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class ForgotPassword extends Page
{
    protected string $view = 'filament.pages.forgot-password';

    protected static ?string $title = 'Forgot Password';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $slug = 'forgot-password';
}