<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\ContactInquiry;
use App\Models\Product;
use App\Models\Customer;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected int|string|array $columnSpan = 'full';
    protected function getStats(): array
    {
        $products = Product::count();
        $categories = Category::count();
        $customers = Customer::count();
        $inquiries = ContactInquiry::count();

        return [
            Stat::make('Total Products', $products)
                ->description('Products available in store')
                ->descriptionIcon('heroicon-m-cube')
                ->color('primary')
                ->chart([
                    Product::query()
                        ->whereDate('created_at', '>=', now()->subDays(6))
                        ->selectRaw('DATE(created_at) as date, COUNT(*) as total')
                        ->groupBy('date')
                        ->orderBy('date')
                        ->pluck('total')
                        ->values()
                        ->toArray(),
                ]),

            Stat::make('Categories', $categories)
                ->description('Active product categories')
                ->descriptionIcon('heroicon-m-rectangle-stack')
                ->color('warning'),

            Stat::make('Customers', $customers)
                ->description('Registered customers')
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),

            Stat::make('Contact Inquiries', $inquiries)
                ->description('Total customer inquiries')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('danger'),
        ];
    }
}