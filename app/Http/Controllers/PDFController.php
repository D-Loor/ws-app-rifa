<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;
use Mpdf\Mpdf;

class PDFController extends Controller
{
    public function generarTicket(array $tickets)
    {
        $tempDir = storage_path('app/mpdf-temp');
        if (!is_dir($tempDir)) {
            mkdir($tempDir, 0775, true);
        }

        $mpdf = new Mpdf([
            'tempDir' => $tempDir,
            'curlAllowUnsafeSslRequests' => true,
        ]);
        $mpdf->SetCompression(true);
        $mpdf->simpleTables = true;
        $mpdf->useSubstitutions = false;
        $mpdf->imageVars['images'] = 70;


        $total = count($tickets);
        foreach ($tickets as $index => $ticket) {
            $url = "https://rifas.web.app/validar-ticket/" . $ticket['codigo'];
            $qrCode = QrCode::format('svg')->size(200)->generate($url);
            $qrCode = str_replace('<?xml version="1.0" encoding="UTF-8"?>', '', $qrCode);

            $mpdf->WriteHTML(view('pdfs.ticket', compact('ticket', 'qrCode'))->render());

            if ($index < $total - 1) {
                $mpdf->AddPage();
            }
        }

        // 'S' returns the PDF as string so Laravel can send a proper HTTP response
        $pdfContent = $mpdf->Output('Tickets.pdf', 'S');

        return response($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="Tickets.pdf"',
        ]);
    }
}
