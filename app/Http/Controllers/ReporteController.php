<?php

namespace App\Http\Controllers;

use App\Models\Viaje;

use Barryvdh\DomPDF\Facade\Pdf;

class ReporteController extends Controller
{
    public function viaje($id)
    {
        $viaje = Viaje::with([

            'cliente',
            'piloto',
            'camion',
            'historial'

        ])->findOrFail($id);

        $pdf = Pdf::loadView(

            'reportes.viaje',

            compact('viaje')

        );

        return $pdf->download(

            'reporte_' .
            $viaje->codigo_guia .
            '.pdf'

        );
    }
}