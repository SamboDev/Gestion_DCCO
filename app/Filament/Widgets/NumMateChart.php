<?php

namespace App\Filament\Widgets;

use App\Models\AreaConocimiento;
use Filament\Widgets\ChartWidget;

class NumMateChart extends ChartWidget
{
    protected static ?string $heading = 'Número de Materias por Área de Conocimiento';
    protected function getData(): array
    {

        // Obtener todas las áreas de conocimiento con las materias únicas
        $areasConocimiento = AreaConocimiento::with(['materias' => function ($query) {
            $query->distinct('id')->select('id', 'id_are'); // Obtener materias únicas por área de conocimiento
        }])->get();

        // Preparar datos para la gráfica
        $data = [
            'datasets' => [
                [
                    'label' => 'Número de Materias por Área de Conocimiento',
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                    'data' => $areasConocimiento->pluck('materias')->map->count(), // Contar las materias únicas
                ],
            ],
            'labels' => $areasConocimiento->pluck('nombre_are')->toArray(),
        ];


        return $data;
    }



    protected function getType(): string
    {
        return 'bar';
    }
}
