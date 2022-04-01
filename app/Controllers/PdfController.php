<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Dompdf\Dompdf;

class PdfController extends BaseController
{
    public function index($id)
    {
        $syarat = ['reservasi.id_reservasi' => $id];
        $data = [
            'reservasi' => $this->reservasiModel->select('reservasi.id_reservasi, tamu.nik, tamu.nama_tamu, kamar.no_kamar, type_kamar.type_kamar, reservasi.jml_kamar, reservasi.checkin, reservasi.checkout, reservasi.total')
                ->join('tamu', 'tamu.nik = reservasi.nik')
                ->join('reservasi_kamar', 'reservasi.id_reservasi = reservasi_kamar.id_reservasi')
                ->join('kamar', 'kamar.id_kamar = reservasi_kamar.id_kamar')
                ->join('type_kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar')
                ->where($syarat)->find()[0]
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
