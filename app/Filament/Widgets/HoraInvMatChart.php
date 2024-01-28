<?php

namespace App\Filament\Widgets;
use App\Models\Materia;
use Filament\Widgets\ChartWidget;

class HoraInvMatChart extends ChartWidget
{
    protected static ?string $heading = 'Horas de investigación Por Materia';

    protected function getData(): array
    {
        // Obtener todas las materias
        $materias = Materia::all();

        // Preparar datos para la gráfica
        $data = [
            'datasets' => [
                [
                    'label' => 'Horas de investigación Por Materia',
                    'backgroundColor' => ['#36A2EB', '#4BC0C0', '#FFCE56', '#FF6384'], // Colores para cada área
                    'borderColor' => '#ffffff',
                    'data' => $materias->pluck('horas_invest_mat')->toArray(), // Obtener directamente el valor de 'horas_total'
                ],
            ],
            'labels' => $materias->pluck('nombre_mat')->toArray(),
        ];

        return $data;
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
