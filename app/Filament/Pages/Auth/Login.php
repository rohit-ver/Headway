<?php

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\Login as BaseLogin;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;

class Login extends BaseLogin
{
    protected function getPasswordFormComponent(): Component
    {
        return TextInput::make('password')
            ->label('Password')
            ->password()
            ->revealable(filament()->arePasswordsRevealable())
            ->autocomplete('current-password')
            ->required()
            ->extraInputAttributes(['tabindex' => 2])
            ->hint(null)
            ->helperText(
                filament()->hasPasswordReset()
                    ? new HtmlString(Blade::render(
                        '<div class="text-end"><a href="' .
                        route('filament.' . filament()->getCurrentPanel()->getId() . '.auth.password-reset.request') .
                        '" class="text-sm">Forgot password?</a></div>'
                    ))
                    : null
            );
    }

    // "Remember me" chhupa diya, hamesha false rahega
    protected function getRememberFormComponent(): Component
    {
        return Checkbox::make('remember')
            ->default(false)
            ->hidden();
    }
}