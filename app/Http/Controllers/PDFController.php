<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;
use Mpdf\Mpdf;

class PDFController extends Controller
{
    public function generarTicket()
    {
        $ticket['codigo'] = "Ticket01";
        $ticket['fecha'] = "23/09/2024";
        $ticket['vendedor'] = "DiegoLM";
        $ticket['numero'] = "031";
        $ticket['valor'] = "1";
        $ticket['premio1'] = "580";
        $ticket['premio2'] = "100";
        $ticket['premio3'] = "25";
        $ticket['premio4'] = "15";
        $ticket['premio5'] = "10";
        $ticket['premio6'] = "10";
        $ticket['premio7'] = "5";

        $qrCode = QrCode::size(200)->generate($ticket['codigo']);
        $qrCode = str_replace('<?xml version="1.0" encoding="UTF-8"?>', '', $qrCode);

        // return Pdf::loadView('pdfs/ticket', compact('ticket', 'qrCode'))
        //     ->setPaper('a4', 'portrait')
        //     ->setOption([
        //         'isHtml5ParserEnabled' => true,
        //         'isRemoteEnabled' => true,
        //         'isFontSubsettingEnabled' => true,
        //     ])
        //     ->stream('Ticket ' . $ticket['codigo'] . '.pdf'); 

        $mpdf = new Mpdf();
        $mpdf->imageVars['images'] = 70;
        $mpdf->SetCompression(true);
        $mpdf->simpleTables = true;
        $mpdf->useSubstitutions = false;
        $mpdf->WriteHTML(view('pdfs.ticket', compact('ticket', 'qrCode'))->render());
        $mpdf->Output('Ticket ' . $ticket['codigo'] . '.pdf', 'I');
    }
}
