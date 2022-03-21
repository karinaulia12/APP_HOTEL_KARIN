<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TamuController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'AuHotelia',
            'data_fumum' => $this->fUmumModel->findAll(),
            'data_fkamar' => $this->fKamarModel->get_typeKamar()
        ];
        return view('tamu/lp_tamu2', $data);
    }

    public function tampil_booking()
    {
        $data = [
            'title' => 'Form Booking AuHotelia'
        ];
        return view('tamu/form-booking', $data);
    }

    public function data()
    {
        $reservasi = $this->reservasiModel
            ->select('reservasi.id_reservasi, nik, checkin, checkout, jml_kamar, harga, total, status');

        $reservasi = $reservasi->get()->getResultArray();

        // ambil data id_reservasinya saja
        $id_reservasi = [];
        foreach ($reservasi as $key => $value) {
            $id_reservasi[] = $value['id_reservasi'];
        }

        // query id_kamar di tabel reservasi_kamar
        $data_kamar = [];
        if (count($reservasi) > 0)
            $data_kamar = \config\Database::connect()
                ->table('reservasi_kamar')
                ->select('id_reservasi_kamar, no_kamar')
                ->whereIn('id_reservasi', $id_reservasi)
                ->join('kamar', 'kamar.id_kamar = reservasi_kamar.id_kamar')
                ->get()->getResultArray();

        // $data_kamar = data mentah dari db
        // $data_kamar = data yang sudah distruktur ulang pengelompokannya
        // struktur ulang data_kamar
        $data_kamar_ = [];
        foreach ($data_kamar as $key => $value) {
            $data_kamar_[$value['id_reservasi_kamar']][] = $value['no_kamar'];
        }

        // memasukkan $data_kamar ke $reservasi
        // $reservasi = array_map(
        //     function ($reserv) use ($data_kamar_) {
        //     $reserv['kamar'] = [];
        //     if(array_key_exists($reserv['id_reservasi'], $data_kamar_)) {
        //         $reserv['kamar'] = $data_kamar_[$reserv['id_reservasi']];
        //     }

        //     switch ($reserv['status']) {
        //         case 1:
        //             $reserv['status_txt'] = 'Pending';
        //             break;
        //             case 2:
        //                 $reserv['status_txt'] = 'Check-In';
        //                 break;
        //     }
        // }
    }
}
