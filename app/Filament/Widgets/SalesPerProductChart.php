<?php

namespace App\Filament\Widgets;

use App\Models\SaleProduct;
use App\Util\NumericUtil;
use Illuminate\Support\Facades\DB;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class SalesPerProductChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static ?string $chartId = 'salesPerProductChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Produtos mais Vendidos';
    protected static ?string $footer = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.';

    protected static ?int $sort = 1;
    
    protected function getOptions(): array
    {
        // $topProducts = SaleProduct::query()
        //     ->with('product')
        //     ->select(
        //         'product_id',
        //         DB::raw('SUM(sub_total) as total_value')
        //     )
        //     ->groupBy('product_id')
        //     ->orderByDesc('total_value')
        //     ->limit(5)
        //     ->get();


        // // Calcula o total de vendas
        // $totalSales = SaleProduct::sum('sub_total');
        
        // // Calcula o valor para "Outros"
        // $topProductsSum = $topProducts->sum('total_value');
        // $othersValue = $totalSales - $topProductsSum;
        
        // // Prepara os dados para o gráfico
        // $series = $topProducts->pluck('total_value')->map(function ($value) {
        //     return NumericUtil::castTextAsFloat($value);
        // })->toArray();
        // $labels = $topProducts->map(function($item) {
        //     return $item->product->description;
        // })->toArray();
        
        // // Adiciona a categoria "Outros"
        // if ($othersValue > 0) {
        //     $series[] = $othersValue;
        //     $labels[] = 'Outros';
        // }
        
        return [
            'chart' => [
                'type' => 'donut',
                'height' => 300,
            ],
            'series' => [],//$series,
            'labels' => [],//$labels,
            'legend' => [
                'labels' => [
                    'fontFamily' => 'inherit',
                ],
            ],
        ];
    }
}
