<?php

namespace App\Filament\Widgets;

use App\Models\Inquiry;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\Action;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class RecentBuyerRequests extends TableWidget
{
    protected static ?int $sort = 4;

    protected int|string|array $columnSpan = [
        'md' => 2,
        'xl' => 4,
    ];

    public function table(Table $table): Table
    {
        return $table
            ->heading('Recent Buyer Requests')
            ->description('Latest requests from buyers')
            ->query(
                Inquiry::query()
                    ->latest()
                    ->with('items') // 👈 eager load taaki modal me fast dikhe 
            )
            ->columns([
                TextColumn::make('name')
                    ->label('Buyer')
                    ->searchable()
                    ->weight('bold'),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->placeholder('-'),

                TextColumn::make('customer_type')
                    ->label('Customer Type')
                    ->searchable()
                    ->placeholder('-'),

                TextColumn::make('phone')
                    ->label('Phone')
                    ->searchable()
                    ->placeholder('-'),

                TextColumn::make('message')
                    ->label('Message')
                    ->searchable()
                    ->placeholder('-'),

                TextColumn::make('created_at')
                    ->label('Date')
                    ->date('d M Y')
                    ->sortable(),
            ])
            ->actions([
                Action::make('viewCartItems')
                    ->label('Cart Items')
                    ->icon('heroicon-o-shopping-cart')
                    ->color('primary')
                    ->modalHeading(fn (Inquiry $record) => "Cart Items - {$record->name}")
                    ->modalContent(fn (Inquiry $record) => view(
                        'filament.widgets.cart-items-modal',
                        ['items' => $record->items]
                    ))
                    ->modalSubmitAction(false)
                    ->modalCancelAction(false)
                    ->modalWidth('lg'),
            ])
            ->paginated([5]);
    }
}