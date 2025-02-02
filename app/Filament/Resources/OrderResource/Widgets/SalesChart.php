<?php

namespace App\Filament\Resources\OrderResource\Widgets;



use Filament\Widgets\ChartWidget;
use App\Models\Order;
use Carbon\Carbon;

class SalesChart extends ChartWidget
{
    protected static ?string $heading = 'Sales Chart';

    protected function getData(): array
    {
        // Fetch orders created in the last 30 days
        $orders = Order::whereBetween('created_at', [
            Carbon::now()->subDays(30)->startOfDay(),
            Carbon::now()->endOfDay(),
        ])
        ->selectRaw('DATE(created_at) as date, SUM(grand_total) as total_sales')
        ->groupBy('date')
        ->orderBy('date')
        ->get();

        // Prepare data for the chart
        $labels = [];
        $salesData = [];

        foreach ($orders as $order) {
            $labels[] = $order->date;
            $salesData[] = $order->total_sales;
        }

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Sales per Day (LKR)',
                    'data' => $salesData,
                    'borderColor' => '#4CAF50', 
                    'backgroundColor' => 'rgba(76, 175, 80, 0.2)', // Transparent background
                    'fill' => true,
                    'tension' => 0.4, // Smooth curve line
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line'; // Line chart type
    }
}
