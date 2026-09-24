<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms\Components\TextInput;
use Filament\Auth\Pages\Login as BaseLogin;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Blade;

class Login extends BaseLogin
{
    protected function getPasswordFormComponent(): TextInput
    {
        return TextInput::make('password')
            ->label('Password')
            ->password()
            ->revealable(filament()->arePasswordsRevealable())
            ->autocomplete('current-password')
            ->required()
            ->extraInputAttributes(['tabindex' => 2])
            // Hint hata diya (jo upar aata tha)
            ->hint(null)
            // Neeche helper text me link daal diya
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
}