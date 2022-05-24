<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Dompdf\Dompdf;
use Dompdf\Options;

class PdfController extends BaseController
{
    public function index($id)
    {
        $syarat = ['reservasi.id_reservasi' => $id];
        $filename = 'INV-AHL-' . $syarat['reservasi.id_reservasi'] . ' | ' . date('d-M-Y');
        $data = [
            'reservasi' => $this->reservasiModel
                ->select('reservasi.id_reservasi, reservasi.nik, reservasi.nama_tamu, kamar.no_kamar, type_kamar.type_kamar, reservasi.jml_kamar, reservasi.checkin, reservasi.checkout, reservasi.total, reservasi.nama_pemesan, reservasi.no_telp, reservasi.email, type_kamar.harga, datediff(reservasi.checkout,reservasi.checkin) as jmlHari')
                ->join('type_kamar', 'type_kamar.id_type_kamar = reservasi.id_type_kamar')
                ->join('kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar')
                ->where($syarat)->find()[0],
            'nama_file' => $filename
        ];
        // dd($data);
        // return view('tamu/pdf_rsv', $data);
        return view('tamu/invoice1', $data);
    }

    public function generate($id)
    {
        $syarat = ['reservasi.id_reservasi' => $id];
        $filename = 'INV-AHL-' . $syarat['reservasi.id_reservasi'] . ' | ' . date('d-M-Y');
        $data = [
            'reservasi' => $this->reservasiModel
                ->select('reservasi.id_reservasi, reservasi.nik, reservasi.nama_tamu, kamar.no_kamar, type_kamar.type_kamar, reservasi.jml_kamar, reservasi.checkin, reservasi.checkout, reservasi.total, reservasi.nama_pemesan, reservasi.no_telp, reservasi.email, type_kamar.harga, datediff(reservasi.checkout,reservasi.checkin) as jmlHari')
                ->join('type_kamar', 'type_kamar.id_type_kamar = reservasi.id_type_kamar')
                ->join('kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar')
                ->where($syarat)->find()[0],
            'nama_file' => $filename
        ];

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $options = new Options();
        $options = $dompdf->getOptions();
        $options->setDefaultFont('Courier');
        $options->setIsHtml5ParserEnabled(false);
        $dompdf->setOptions($options);

        // load HTML content
        $dompdf->loadHtml(view('tamu/invoice1', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename);
    }
}
