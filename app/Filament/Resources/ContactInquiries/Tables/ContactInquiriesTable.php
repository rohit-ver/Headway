<?php

namespace App\Filament\Resources\ContactInquiries\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ContactInquiriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('name')
                    ->label('Customer')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->copyable(),

                TextColumn::make('phone')
                    ->label('Phone')
                    ->searchable()
                    ->copyable(),

                TextColumn::make('whatsapp')
                    ->label('WhatsApp')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('customer_type')
                    ->label('Type')
                    ->badge()
                    ->colors([
                        'success' => 'domestic',
                        'info' => 'international',
                    ])
                    ->searchable(),

                TextColumn::make('subject')
                    ->label('Subject')
                    ->limit(30)
                    ->searchable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->colors([
                        'warning' => 'new',
                        'info' => 'contacted',
                        'success' => 'quotation',
                        'gray' => 'closed',
                    ]),

                TextColumn::make('created_at')
                    ->label('Received On')
                    ->dateTime('d M Y, h:i A')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([

                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'new' => 'New',
                        'contacted' => 'Contacted',
                        'quotation' => 'Quotation Sent',
                        'closed' => 'Closed',
                    ]),

                SelectFilter::make('customer_type')
                    ->label('Customer Type')
                    ->options([
                        'domestic' => 'Domestic',
                        'international' => 'International',
                    ]),

            ])
            ->filtersLayout(FiltersLayout::AboveContent)
            ->filtersFormColumns(2)
            ->recordActions([
                ViewAction::make(),
                DeleteAction::make(),
            ])
            ->recordActionsColumnLabel('Action')
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}