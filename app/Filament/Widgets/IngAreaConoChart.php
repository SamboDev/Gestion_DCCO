<?php

namespace App\Filament\Widgets;

use App\Models\Nrc;
use Filament\Widgets\ChartWidget;

class IngAreaConoChart extends ChartWidget
{
    protected static ?string $heading = 'Ingeniero por Área de Conocimiento';
    protected function containerClass(): string
    {
        return 'ing-area-cono-chart-container';
    }

    protected function titleClass(): string
    {
        return 'ing-area-cono-chart-title';
    }

protected function getData(): array
{
    // Obtener todos los NRCs con sus respectivas relaciones
    $nrcs = Nrc::with(['materia.area_conocimiento', 'docente_materias.docente'])->get();

    $data = [
        'datasets' => [
            [
                'label' => 'Ingeniero por Área de Conocimiento',
                'backgroundColor' => '#36A2EB',
                'borderColor' => '#9BD0F5',
                'data' => $nrcs->groupBy('materia.area_conocimiento.nombre_are')->map(function ($group) {
                    return $group->pluck('docente_materias.docente.id')->unique()->count();
                })->values()->toArray(),
            ],
        ],
        'labels' => $nrcs->map(function ($nrc) {
            return optional(optional($nrc->materia)->area_conocimiento)->nombre_are;
        })->unique()->values()->toArray(),
    ];

    return $data;
}
    protected function getType(): string
    {
        return 'pie';
    }
}





