<?php

namespace App\Filament\Widgets;

use App\Enums\SaleStatusEnum;
use App\Models\Sale;
use App\Util\NumericUtil;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class SalesByClientChart extends ApexChartWidget
{

    protected static ?string $chartId = 'salesByClientChart';

    protected static ?string $heading = 'SalesByClientChart';

    protected static ?int $sort = 2;
    
    protected function getOptions(): array
    {
        // Obter o início e fim do último mês
        // $startOfLastMonth = now()->startOfMonth()->format('Y-m-d');
        // $endOfLastMonth = now()->endOfMonth()->format('Y-m-d');
        
        // // Buscar os top 10 clientes com maiores compras no último mês
        // $topClients = Sale::join('client', 'sale.client_id', '=', 'client.id')
        //     ->whereDate('sale.date_sale', '>=', $startOfLastMonth)
        //     ->whereDate('sale.date_sale', '<=', $endOfLastMonth)
        //     ->where('sale.status', SaleStatusEnum::PAID)
        //     ->selectRaw('CASE 
        //                     WHEN LENGTH(client.name) > 10 THEN CONCAT(LEFT(client.name, 10), \'...\')
        //                     ELSE client.name 
        //                 END AS client_name, SUM(sale.total_value) as total')
        //     ->groupBy('client.id', 'client.name')
        //     ->orderByDesc('total')
        //     ->limit(10)
        //     ->get();
        
        // // Se não houver dados do último mês, pegar os últimos 3 meses
        // if ($topClients->isEmpty()) {
        //     self::$heading = 'Clientes que Mais Compraram (Últimos 3 Meses)';
        //     $startDate = now()->subMonths(3)->startOfMonth()->format('Y-m-d');
        //     $endDate = now()->format('Y-m-d');
            
        //     $topClients = Sale::join('client', 'sale.client_id', '=', 'client.id')
        //         ->whereDate('sale.date_sale', '>=', $startDate)
        //         ->whereDate('sale.date_sale', '<=', $endDate)
        //         ->where('sale.status', SaleStatusEnum::PAID)
        //         ->selectRaw('CASE 
        //                         WHEN LENGTH(client.name) > 10 THEN CONCAT(LEFT(client.name, 10), \'...\')
        //                         ELSE client.name 
        //                     END AS client_name, SUM(sale.total_value) as total')
        //         ->groupBy('client.id', 'client.name')
        //         ->orderByDesc('total')
        //         ->limit(10)
        //         ->get();
        // }
        
        // // Extrair nomes dos clientes e valores totais
        // $clientNames = $topClients->pluck('client_name')->toArray();
        // $totals = $topClients->pluck('total')->map(function ($value) {
        //     return NumericUtil::castTextAsFloat($value);
        // })->toArray();
        
        // // Se ainda não houver dados, fornecer dados padrão
        // if (empty($clientNames)) {
        //     self::$heading = 'Clientes que Mais Compraram (Sem Dados)';
        //     $clientNames = ['Sem dados'];
        //     $totals = [0];
        // }
        
        return [
            'chart' => [
                'type' => 'bar',
                'height' => 300,
            ],
            'series' => [
                [
                    'name' => 'SalesByClientChart',
                    'data' => [7, 4, 6, 10, 14, 7, 5, 9, 10, 15, 13, 18],
                ],
            ],
            'xaxis' => [
                'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                    ],
                ],
            ],
            'yaxis' => [
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                    ],
                ],
            ],
            'colors' => ['#f59e0b'],
        ];
    }
}
