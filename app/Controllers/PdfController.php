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
                ->select('reservasi.id_reservasi, reservasi.nik, reservasi.nama_tamu, kamar.no_kamar, type_kamar.type_kamar, reservasi.jml_kamar, reservasi.checkin, reservasi.checkout, reservasi.total')
                // ->join('tamu', 'tamu.nik = reservasi.nik')
                ->join('reservasi_kamar', 'reservasi.id_reservasi = reservasi_kamar.id_reservasi')
                ->join('kamar', 'kamar.id_kamar = reservasi_kamar.id_kamar')
                ->join('type_kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar')
                ->where($syarat)->find()[0],
            'nama_file' => $filename
        ];
        return view('tamu/pdf_rsv', $data);
    }

    public function lihat($id)
    {
        // ambil id_reservasi untuk menampilkan invoice
        $syarat = ['reservasi.id_reservasi' => $id];

        // ambil id_reservasi dari reservasi_kamar untuk menampilkan no_kamar
        $syarat2 = ['reservasi_kamar.id_reservasi' => $id];
        $a = $this->reservasiKamarModel
            ->select('no_kamar')
            ->join('kamar', 'kamar.id_kamar = reservasi_kamar.id_kamar')
            ->where($syarat2)
            ->get()->getResultArray();

        // foreach ($a as $value) {
        //     $b = [
        //         'id_kamar' => $value['no_kamar'],
        //     ];
        // }

        // $arr = array_map(function($a){ return $a['no_kamar']; }, $arr);

        $filename = 'INV-AHL-' . $syarat['reservasi.id_reservasi'] . ' | ' . date('d-M-Y');
        $data = [
            'reservasi' => $this->reservasiModel
                ->select('reservasi.id_reservasi, reservasi.nik, reservasi.nama_tamu, kamar.no_kamar, type_kamar.type_kamar, reservasi.jml_kamar, reservasi.checkin, reservasi.checkout, reservasi.total, reservasi.nama_pemesan, reservasi.no_telp, reservasi.email, type_kamar.harga, datediff(reservasi.checkout,reservasi.checkin) as jmlHari')
                // ->join('tamu', 'tamu.nik = reservasi.nik')
                ->join('reservasi_kamar', 'reservasi.id_reservasi = reservasi_kamar.id_reservasi')
                ->join('kamar', 'kamar.id_kamar = reservasi_kamar.id_kamar')
                ->join('type_kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar')
                ->where($syarat)->find()[0],
            'no_kamar' => array_column($a, 'no_kamar'),
            'no_kamar2' => $a,
            'nama_file' => $filename
        ];

        // dd($data);
        return view('tamu/invoice', $data);
    }

    public function generate($id)
    {
        $syarat = ['reservasi.id_reservasi' => $id];
        $filename = 'INV-AHL-' . $syarat['reservasi.id_reservasi'] . ' | ' . date('d-M-Y');
        $data = [
            'reservasi' => $this->reservasiModel
                ->select('reservasi.id_reservasi, reservasi.nik, reservasi.nama_tamu, kamar.no_kamar, type_kamar.type_kamar, reservasi.jml_kamar, reservasi.checkin, reservasi.checkout, reservasi.total, reservasi.nama_pemesan, reservasi.no_telp, reservasi.email, type_kamar.harga, datediff(reservasi.checkout,reservasi.checkin) as jmlHari')
                // ->join('tamu', 'tamu.nik = reservasi.nik')
                ->join('reservasi_kamar', 'reservasi.id_reservasi = reservasi_kamar.id_reservasi')
                ->join('kamar', 'kamar.id_kamar = reservasi_kamar.id_kamar')
                ->join('type_kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar')
                ->where($syarat)->find()[0],
            'nama_file' => $filename
        ];


        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $options = new Options();
        $options = $dompdf->getOptions();
        // $options->setDefaultFont('Courier');
        $options->setIsHtml5ParserEnabled(false);
        $dompdf->setOptions($options);

        // load HTML content
        $dompdf->loadHtml(view('tamu/invoice', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename);
    }
}
