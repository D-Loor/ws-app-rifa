<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generarTicket()
    {
        $codigo = "Ticket01";
        $fecha = "23/09/2024";
        $vendedor = "DiegoLM";
        $numero = "031";
        $valor = "1";
        $premio1 = "580";
        $premio2 = "100";
        $premio3 = "25";
        $premio4 = "15";
        $premio5 = "10";
        $premio6 = "10";
        $premio7 = "5";

        //return response()->json(['result'=>$rp,'result2'=>$espaciosrp]);

        return Pdf::loadView('pdfs/ticket', compact('fecha', 'vendedor', 'numero', 'valor', 'premio1', 'premio2', 'premio3', 'premio4', 'premio5', 'premio6', 'premio7'))
            ->setPaper('a4', 'portrait')
            ->stream('Ticket ' . $codigo . '.pdf');
    }
}
