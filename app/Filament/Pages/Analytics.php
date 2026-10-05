<?php

namespace App\Filament\Pages;

use App\Models\ContactInquiry;
use App\Models\Customer;
use App\Models\Product;
use App\Models\WebsiteVisit;
use Filament\Pages\Page;
use Illuminate\Support\Carbon;
use App\Models\ProductView;

class Analytics extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-chart-bar';

    protected static ?string $navigationLabel = 'Analytics';

    protected static ?string $title = 'Website Analytics';

    protected static string|\UnitEnum|null $navigationGroup = 'Reports';

    protected string $view = 'filament.pages.analytics';


    /*
    |--------------------------------------------------------------------------
    | Summary Cards
    |--------------------------------------------------------------------------
    */

    public function getTotalVisitors(): int
    {
        return WebsiteVisit::count();
    }


    public function getTodayVisitors(): int
    {
        return WebsiteVisit::whereDate(
            'created_at',
            today()
        )->count();
    }


    public function getCustomersCount(): int
    {
        return Customer::count();
    }


    public function getProductsCount(): int
    {
        return Product::count();
    }


    public function getInquiriesCount(): int
    {
        return ContactInquiry::count();
    }


    /*
    |--------------------------------------------------------------------------
    | Last 7 Days Visitors
    |--------------------------------------------------------------------------
    */

    public function getVisitorChart(): array
    {
        $data = [];

        for ($i = 6; $i >= 0; $i--) {

            $date = Carbon::today()->subDays($i);

            $data[] = [
                'date' => $date->format('d M'),

                'day' => $date->format('D'),

                'count' => WebsiteVisit::whereDate(
                    'created_at',
                    $date
                )->count(),
            ];
        }

        return $data;
    }


    /*
    |--------------------------------------------------------------------------
    | Most Visited Pages
    |--------------------------------------------------------------------------
    */

    public function getTopPages()
    {
        return WebsiteVisit::query()
            ->select('page_url')
            ->selectRaw('COUNT(*) as visits')
            ->whereNotNull('page_url')
            ->groupBy('page_url')
            ->orderByDesc('visits')
            ->limit(5)
            ->get();
    }


    /*
    |--------------------------------------------------------------------------
    | Recent Visitors
    |--------------------------------------------------------------------------
    */

    public function getRecentVisitors()
    {
        return WebsiteVisit::query()
            ->latest()
            ->limit(8)
            ->get();
    }

    public function getTotalProductViews(): int
{
    return ProductView::count();
}

public function getProductsViewedCount(): int
{
    return ProductView::distinct('product_id')->count('product_id');
}

public function getMostViewedProducts()
{
    return Product::query()
        ->withCount('views')
        ->whereHas('views')
        ->orderByDesc('views_count')
        ->limit(10)
        ->get();
}
}