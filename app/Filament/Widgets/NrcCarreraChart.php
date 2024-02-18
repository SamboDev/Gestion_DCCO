<?php

namespace App\Filament\Widgets;

use App\Models\Carrera;
use Filament\Widgets\ChartWidget;

class NrcCarreraChart extends ChartWidget
{
    protected static ?string $heading = 'Nrc por Carrera';
    protected static ?int $sort = 1;
    protected function getData(): array
    {
        // Obtener todas las carreras
        $carreras = Carrera::all();

        // Inicializar el array de datos
        $data = [
            'datasets' => [
                [
                    'label' => 'NRC por Carrera',
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                    'data' => [],
                ],
            ],
            'labels' => [],
        ];

        // Iterar sobre las carreras
        foreach ($carreras as $carrera) {
            // Contar la cantidad de NRCs relacionados con esta carrera
            $nrcCount = $carrera->nrcs()->count();  // <-- Utiliza la relación nrcs de la carrera

            // Agregar el conteo al array de datos
            $data['datasets'][0]['data'][] = $nrcCount;

            // Agregar el nombre de la carrera a las etiquetas
            $data['labels'][] = $carrera->nombre_car;
        }

        return $data;
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
