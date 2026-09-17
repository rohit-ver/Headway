<?php

namespace App\Filament\Resources\ContactInquiries\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ContactInquiryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Customer Details')
                    ->description('This information was submitted by the customer and cannot be edited.')
                    ->schema([

                        TextInput::make('name')
                            ->disabled(),

                        TextInput::make('email')
                            ->disabled(),

                        TextInput::make('phone')
                            ->disabled(),

                        TextInput::make('whatsapp')
                            ->disabled(),

                        TextInput::make('customer_type')
                            ->disabled(),

                        TextInput::make('subject')
                            ->disabled(),

                        Textarea::make('message')
                            ->disabled()
                            ->columnSpanFull(),

                    ])
                    ->columns(2),

                Section::make('Update Status')
                    ->schema([

                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'new' => 'New',
                                'contacted' => 'Contacted',
                                'quotation' => 'Quotation Sent',
                                'closed' => 'Closed',
                            ])
                            ->required(),

                    ]),

            ]);
    }
}