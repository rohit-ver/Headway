<?php

namespace App\Filament\Resources\Banners\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BannerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                /*
                 |--------------------------------------------------------------------------
                 | Banner Information
                 |--------------------------------------------------------------------------
                 */

                Section::make('Banner Information')
                    ->description('Upload and manage your homepage banner')
                    ->schema([
                        TextInput::make('title')
                            ->label('Banner Title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true),

                        FileUpload::make('image')
                            ->label('Banner Image')
                            ->image()
                            ->imageEditor()
                            ->disk('uploads')
                            ->directory('banners')
                            ->visibility('public')
                            ->maxSize(5120)
                            ->required(),

                        TextInput::make('sort_order')
                            ->label('Sort Order')
                            ->numeric()
                            ->default(0)
                            ->minValue(0)
                            ->required(),

                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),

                    ])
                    ->columnSpanFull(),
            ]);
    }
}

