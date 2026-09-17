<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\Width;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                /*
                |--------------------------------------------------------------------------
                | Product Information
                |--------------------------------------------------------------------------
                */

                Section::make('Product Information')
                    ->description('Add basic product details')
                    ->schema([

                        Grid::make(2)
                            ->schema([

                                Select::make('category_id')
                                    ->label('Category')
                                    ->relationship('category', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required(),

                                TextInput::make('name')
                                    ->label('Product Name')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function ($state, callable $set) {
                                        $set('slug', \Illuminate\Support\Str::slug($state));
                                    }),

                                TextInput::make('slug')
                                    ->label('Slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(ignoreRecord: true),

                                TextInput::make('sku')
                                    ->label('SKU')
                                    ->required()
                                    ->maxLength(100)
                                    ->unique(ignoreRecord: true),

                                TextInput::make('packaging_options')
                                    ->label('Packaging Options')
                                    ->placeholder('250gm, 500gm, 1kg, Bulk')
                                    ->maxLength(255),

                                TextInput::make('moq')
                                    ->label('MOQ')
                                    ->placeholder('100 KG')
                                    ->maxLength(100),

                                Select::make('availability')
                                    ->label('Availability')
                                    ->options([
                                        'in_stock' => 'In Stock',
                                        'out_of_stock' => 'Out of Stock',
                                    ])
                                    ->default('in_stock')
                                    ->required(),

                                TextInput::make('suitable_for')
                                    ->label('Suitable For')
                                    ->placeholder('Retailers, Wholesalers, Distributors')
                                    ->maxLength(255),

                                Select::make('status')
                                    ->label('Status')
                                    ->options([
                                        'active' => 'Active',
                                        'inactive' => 'Inactive',
                                    ])
                                    ->default('active')
                                    ->required(),

                            ]),

                        Textarea::make('description')
                            ->label('Description')
                            ->rows(3)
                            ->columnSpanFull(),

                        FileUpload::make('main_image')
                            ->label('Main Product Image')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->disk('public')
                            ->directory('products')
                            ->visibility('public')
                            ->required()
                            ->maxSize(5120),

                    ])
                    ->columnSpanFull(),


                /*
                |--------------------------------------------------------------------------
                | Product Color Variants
                |--------------------------------------------------------------------------
                */

                Section::make('Product Color Variants')
                    ->description('Add images for different product colors')
                    ->schema([

                        Repeater::make('images')
                            ->relationship()
                            ->label('')
                            ->schema([

                                FileUpload::make('image_path')
                                    ->label('Product Image')
                                    ->image()
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        '16:9',
                                        '4:3',
                                        '1:1',
                                    ])
                                    ->disk('public')
                                    ->directory('products/variants')
                                    ->visibility('public')
                                    ->required()
                                    ->maxSize(5120),

                                TextInput::make('color')
                                    ->label('Color')
                                    ->placeholder('e.g. Red, Green, Blue')
                                    ->required()
                                    ->maxLength(100),

                                TextInput::make('sort_order')
                                    ->label('Order')
                                    ->numeric()
                                    ->default(0),

                            ])
                            ->columns(3)
                            ->defaultItems(0)
                            ->addActionLabel('Add Color Variant')
                            ->reorderable('sort_order')
                            ->collapsible()
                            ->itemLabel(
                                fn(array $state): ?string =>
                                $state['color'] ?? 'New Color Variant'
                            ),

                    ])
                    ->columnSpanFull(),

            ]);
    }
}
