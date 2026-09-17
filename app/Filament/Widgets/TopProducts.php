<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class TopProducts extends TableWidget
{
    protected static ?int $sort = 4;

    protected int|string|array $columnSpan = [
        'md' => 1,
        'xl' => 4,
    ];

    public function table(Table $table): Table
    {
        return $table
            ->query(
                fn (): Builder => Product::query()
                    ->with('category')
                    ->latest()
                    ->limit(5)
            )
            ->columns([
                // Product Name
                \Filament\Tables\Columns\TextColumn::make('name')
                    ->label('Product')
                    ->searchable()
                    ->weight('bold'),

                // Category
                \Filament\Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->badge(),

                // SKU
                \Filament\Tables\Columns\TextColumn::make('sku')
                    ->label('SKU'),

                // Status
                \Filament\Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'active' => 'success',
                        'inactive' => 'danger',
                        default => 'gray',
                    }),

                // Added Date
                \Filament\Tables\Columns\TextColumn::make('created_at')
                    ->label('Added')
                    ->date('d M Y'),
            ])
            ->paginated(false);
    }
}