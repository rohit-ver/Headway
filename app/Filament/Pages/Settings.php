<?php

namespace App\Filament\Pages;

use App\Models\WebsiteSetting;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;

class Settings extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationLabel = 'Settings';

    protected static ?string $title = 'Website Settings';

    protected static string|\UnitEnum|null $navigationGroup = 'Website';

    protected static ?int $navigationSort = 1;

    protected string $view = 'filament.pages.settings';

    public ?array $data = [];

    public function mount(): void
    {
        $settings = WebsiteSetting::first();

        if (!$settings) {
            $settings = WebsiteSetting::create([
                'company_name' => 'HeadwayStrata',
                'website_status' => true,
            ]);
        }

        $this->form->fill($settings->toArray());
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->components([

                Tabs::make('Settings')
                    ->tabs([

                        /*
                        |--------------------------------------------------------------------------
                        | Company Information
                        |--------------------------------------------------------------------------
                        */

                        Tab::make('Company Information')
                            ->icon('heroicon-o-building-office')
                            ->schema([

                                Section::make('Company Details')
                                    ->description('Basic information about your company.')
                                    ->schema([

                                        TextInput::make('company_name')
                                            ->label('Company Name')
                                            ->placeholder('HeadwayStrata')
                                            ->required()
                                            ->maxLength(255),

                                        TextInput::make('email')
                                            ->label('Email Address')
                                            ->email()
                                            ->placeholder('info@example.com'),

                                        TextInput::make('phone')
                                            ->label('Phone Number')
                                            ->tel()
                                            ->placeholder('+91 9876543210'),

                                        TextInput::make('whatsapp')
                                            ->label('WhatsApp Number')
                                            ->tel()
                                            ->placeholder('+91 9876543210'),

                                        Textarea::make('address')
                                            ->label('Company Address')
                                            ->rows(4)
                                            ->placeholder('Enter complete company address...')
                                            ->columnSpanFull(),

                                    ])
                                    ->columns(2),

                            ]),

                        /*
                        |--------------------------------------------------------------------------
                        | Social Media
                        |--------------------------------------------------------------------------
                        */

                        Tab::make('Social Media')
                            ->icon('heroicon-o-share')
                            ->schema([

                                Section::make('Social Media Links')
                                    ->description('Add your official social media profile links.')
                                    ->schema([

                                        TextInput::make('facebook')
                                            ->label('Facebook')
                                            ->url()
                                            ->placeholder('https://facebook.com/yourpage'),

                                        TextInput::make('instagram')
                                            ->label('Instagram')
                                            ->url()
                                            ->placeholder('https://instagram.com/yourpage'),

                                        TextInput::make('linkedin')
                                            ->label('LinkedIn')
                                            ->url()
                                            ->placeholder('https://linkedin.com/company/yourcompany'),

                                        TextInput::make('youtube')
                                            ->label('YouTube')
                                            ->url()
                                            ->placeholder('https://youtube.com/@yourchannel'),

                                    ])
                                    ->columns(2),

                            ]),

                        /*
                        |--------------------------------------------------------------------------
                        | Website
                        |--------------------------------------------------------------------------
                        */

                        Tab::make('Website')
                            ->icon('heroicon-o-globe-alt')
                            ->schema([

                                Section::make('Website Configuration')
                                    ->description('Manage your website logo and availability.')
                                    ->schema([

                                        FileUpload::make('logo')
                                            ->label('Website Logo')
                                            ->image()
                                            ->disk('uploads')
                                            ->directory('settings')
                                            ->visibility('public')
                                            ->imageEditor()
                                            ->columnSpan(1),

                                        FileUpload::make('favicon')
                                            ->label('Favicon')
                                            ->image()
                                            ->disk('uploads')
                                            ->directory('settings')
                                            ->visibility('public')
                                            ->imageEditor()
                                            ->columnSpan(1),

                                        Toggle::make('website_status')
                                            ->label('Website Active')
                                            ->helperText('Turn this off if you want to temporarily disable the website.')
                                            ->default(true)
                                            ->columnSpanFull(),

                                    ])
                                    ->columns(2),

                            ]),

                        /*
                        |--------------------------------------------------------------------------
                        | SEO
                        |--------------------------------------------------------------------------
                        */

                        Tab::make('SEO')
                            ->icon('heroicon-o-magnifying-glass')
                            ->schema([

                                Section::make('Search Engine Optimization')
                                    ->description('Default SEO information for your website.')
                                    ->schema([

                                        TextInput::make('meta_title')
                                            ->label('Meta Title')
                                            ->maxLength(255)
                                            ->placeholder('HeadwayStrata - Premium Food Manufacturer'),

                                        Textarea::make('meta_description')
                                            ->label('Meta Description')
                                            ->rows(4)
                                            ->maxLength(500)
                                            ->placeholder('Enter your website meta description...')
                                            ->columnSpanFull(),

                                        Textarea::make('meta_keywords')
                                            ->label('Meta Keywords')
                                            ->rows(3)
                                            ->placeholder('makhana, namkeen, sweets, food manufacturer...')
                                            ->columnSpanFull(),

                                    ])
                                    ->columns(2),

                            ]),

                    ])
                    ->columnSpanFull(),

            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('save')
                ->label('Save Settings')
                ->icon('heroicon-o-check')
                ->action('save'),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $settings = WebsiteSetting::first();

        if (!$settings) {
            $settings = new WebsiteSetting();
        }

        $settings->fill($data);
        $settings->save();

        Notification::make()
            ->title('Settings saved successfully')
            ->success()
            ->send();
    }
}