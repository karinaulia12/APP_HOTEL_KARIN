<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Dompdf\Dompdf;

class PdfController extends BaseController
{
    public function index($id)
    {
        $data = [
            'reservasi' => $this->reservasiModel->join_utk_pdf($id)
        ];
        return view('tamu/pdf_rsv', $data);
    }

    public function generate()
    {
        $filename = date('y-m-d-H-i-s') . '-qadr-labs-report';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $dompdf->loadHtml(view('pdf_rsv'));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename);
    }
}
