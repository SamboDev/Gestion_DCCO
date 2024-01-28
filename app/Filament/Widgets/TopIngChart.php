<?php

namespace App\Filament\Widgets;
use App\Models\DocenteMateria;
use Filament\Widgets\ChartWidget;

class TopIngChart extends ChartWidget
{
    protected static ?string $heading = 'Top Ingenieros por Materia';
    protected static ?int $sort = 4;
    protected function getData(): array
    {
        // Obtener todas las relaciones de DocenteMateria con Docente y Materia
        $docMat = DocenteMateria::with(['docente', 'materia'])->get();

        // Agrupar por id_doc y contar la cantidad de materias únicas
        $data = [
            'datasets' => [
                [
                    'label' => 'Top Ingenieros por Materia',
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                    'data' => $docMat->groupBy('id_doc')->map(function ($group) {
                        return $group->pluck('materia.id')->unique()->count();
                    })->values()->toArray(),
                ],
            ],
            'labels' => $docMat->map(function ($doc) {
                return optional($doc->docente)->nombre_doc;
            })->values()->toArray(),
        ];

        return $data;
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
