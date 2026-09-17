<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProductInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Product Information')
                    ->schema([

                        ImageEntry::make('main_image')
                            ->label('Main Image')
                            ->disk('public'),

                        Grid::make(2)
                            ->schema([

                                TextEntry::make('category.name')
                                    ->label('Category'),

                                TextEntry::make('name')
                                    ->label('Product Name'),

                                TextEntry::make('slug'),

                                TextEntry::make('sku')
                                    ->label('SKU'),

                                TextEntry::make('packaging_options')
                                    ->label('Packaging Options'),

                                TextEntry::make('moq')
                                    ->label('MOQ'),

                                TextEntry::make('availability')
                                    ->label('Availability')
                                    ->badge(),

                                TextEntry::make('suitable_for')
                                    ->label('Suitable For'),

                                TextEntry::make('status')
                                    ->label('Status')
                                    ->badge(),

                            ]),

                        TextEntry::make('description')
                            ->label('Description')
                            ->columnSpanFull(),

                    ])
                    ->columnSpanFull(),

                Section::make('Product Color Variants')
                    ->schema([

                        RepeatableEntry::make('images')
                            ->label('')
                            ->schema([

                                ImageEntry::make('image_path')
                                    ->label('Image')
                                    ->disk('public'),

                                TextEntry::make('color')
                                    ->label('Color'),

                                TextEntry::make('sort_order')
                                    ->label('Order'),

                            ])
                            ->columns(3),

                    ])
                    ->columnSpanFull(),

            ]);
    }
}