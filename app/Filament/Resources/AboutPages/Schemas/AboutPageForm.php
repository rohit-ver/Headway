<?php

namespace App\Filament\Resources\AboutPages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AboutPageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                /*
                |--------------------------------------------------------------------------
                | ABOUT HERO
                |--------------------------------------------------------------------------
                */

                Section::make('About Hero')
                    ->description('Manage the main About Headway section.')
                    ->schema([

                        Grid::make(2)
                            ->schema([

                                TextInput::make('hero_tag')
                                    ->label('Section Tag')
                                    ->placeholder('ABOUT HEADWAY')
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('hero_title')
                                    ->label('Main Heading')
                                    ->placeholder('Quality Foods')
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('hero_highlight')
                                    ->label('Heading Highlight')
                                    ->placeholder('Trusted Globally.')
                                    ->required()
                                    ->maxLength(255),

                            ]),

                        Textarea::make('hero_description')
                            ->label('Hero Description')
                            ->rows(6)
                            ->required()
                            ->columnSpanFull(),

                        FileUpload::make('hero_image')
                            ->label('Hero Image')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->disk('public')
                            ->directory('about')
                            ->visibility('public')
                            ->maxSize(5120)
                            ->columnSpanFull(),

                    ])
                    ->columnSpanFull(),


                /*
                |--------------------------------------------------------------------------
                | OUR VISION
                |--------------------------------------------------------------------------
                */

                Section::make('Our Vision')
                    ->description('Manage the Our Vision section content and image.')
                    ->schema([

                        Grid::make(2)
                            ->schema([

                                TextInput::make('vision_tag')
                                    ->label('Section Tag')
                                    ->placeholder('OUR VISION')
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('vision_title')
                                    ->label('Main Heading')
                                    ->placeholder('Progressing With')
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('vision_highlight')
                                    ->label('Heading Highlight')
                                    ->placeholder('Roots..')
                                    ->required()
                                    ->maxLength(255),

                            ]),

                        Textarea::make('vision_description_1')
                            ->label('Vision Description 1')
                            ->rows(5)
                            ->required()
                            ->columnSpanFull(),


                        FileUpload::make('vision_image')
                            ->label('Vision Image')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->disk('public')
                            ->directory('about')
                            ->visibility('public')
                            ->maxSize(5120)
                            ->columnSpanFull(),

                    ])
                    ->columnSpanFull(),

            ]);
    }
}