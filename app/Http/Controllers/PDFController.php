<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;
use Mpdf\Mpdf;

class PDFController extends Controller
{
    public function generarTicket(array $tickets)
    {
        $mpdf = new Mpdf();
        $mpdf->SetCompression(true);
        $mpdf->simpleTables = true;
        $mpdf->useSubstitutions = false;
        $mpdf->imageVars['images'] = 70;


        foreach ($tickets as $ticket) {
            $url = "https://miller365.web.app/validar-ticket/" . $ticket['codigo'];
            $qrCode = QrCode::size(200)->generate($url);
            $qrCode = str_replace('<?xml version="1.0" encoding="UTF-8"?>', '', $qrCode);
    
            $mpdf->WriteHTML(view('pdfs.ticket', compact('ticket', 'qrCode'))->render());
    
            if (end($tickets) !== $ticket) {
                $mpdf->AddPage();
            }
        }
    
        $mpdf->Output('Tickets.pdf', 'I');
    }
}
