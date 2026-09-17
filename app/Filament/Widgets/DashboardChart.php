<?php

namespace App\Filament\Widgets;

use App\Models\ContactInquiry;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class DashboardChart extends ChartWidget
{
    protected ?string $heading = 'Contact Inquiries';

    protected static ?int $sort = 2;
    protected int|string|array $columnSpan = [
        'md' => 1,
        'xl' => 2,
    ];

    protected function getData(): array
    {
        $days = match ($this->filter) {
            '7' => 7,
            '30' => 30,
            '180' => 180,
            '365' => 365,
            default => 30,
        };

        $startDate = Carbon::now()->subDays($days - 1)->startOfDay();

        $inquiries = ContactInquiry::query()
            ->where('created_at', '>=', $startDate)
            ->selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('total', 'date');

        $labels = [];
        $data = [];

        for ($i = 0; $i < $days; $i++) {
            $date = $startDate->copy()->addDays($i);

            $key = $date->format('Y-m-d');

            $labels[] = $days <= 30
                ? $date->format('d M')
                : $date->format('M d');

            $data[] = $inquiries[$key] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Inquiries',
                    'data' => $data,
                    'fill' => true,
                    'tension' => 0.4,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getFilters(): ?array
    {
        return [
            '7' => 'Last 7 Days',
            '30' => 'Last 30 Days',
            '180' => 'Last 6 Months',
            '365' => 'Last 1 Year',
        ];
    }
}
