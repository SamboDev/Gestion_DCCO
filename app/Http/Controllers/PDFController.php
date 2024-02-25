<?php

namespace App\Http\Controllers;

use App\Models\DocenteMateria;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class PDFController extends Controller
{
    public function downloadpdf($model, $view_name){
        $records = $model::all();

        $data = [
            'date' =>date('m/d/Y'),
            'records' => $records
        ];

        $pdf = PDF::loadView($view_name,$data);

        return $pdf->download("reporte.pdf");
    }

    public function userpdf($id){

        $user = User::find($id);

        return $user;
    }
}
