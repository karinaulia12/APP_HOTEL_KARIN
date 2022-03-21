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
        if (count($reservasi) > 0) {
            $data_kamar = \config\Database::connect()
                ->table('reservasi_kamar')
                ->select('id_reservasi_kamar, no_kamar')
                ->whereIn('id_reservasi', $id_reservasi)
                ->join('kamar', 'kamar.id_kamar = reservasi_kamar.id_kamar')
                ->get()->getResultArray();
        }
        // $data_kamar = data mentah dari db
        // $data_kamar = data yang sudah distruktur ulang pengelompokannya
        // struktur ulang data_kamar
        $data_kamar_ = [];
        foreach ($data_kamar as $key => $value) {
            $data_kamar_[$value['id_reservasi_kamar']][] = $value['no_kamar'];
        }

        // memasukkan $data_kamar ke $reservasi
        // $reservasi = array_map(function ($reserv) use ($data_kamar_) {
        //     $reserv['kamar'] = [];
        //     if(array_key_exists($reserv['id_reservasi'], $data_kamar_)) {
        //         $reserv['kamar'] = $data_kamar_[$reserv['id_reservasi_kamar']];
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

    public function checkin($id_reservasi)
    {
        $berhasil = $this->reservasi->update($id_reservasi, ['status' => 2]);
        return redirect()->to('/resepsionis/reservasi');
    }

    public function checkout($id_reservasi)
    {
        $berhasil = $this->reservasi->update($id_reservasi, ['status' => 3]);
        return redirect()->to('/resepsionis/reservasi');
    }

    public function terima($id_reservasi)
    {
        $berhasil = $this->reservasi->update($id_reservasi, ['status' => 4]);
        return redirect()->to('/resepsionis/reservasi');
    }

    public function tolak($id_reservasi)
    {
        $berhasil = $this->reservasi->update($id_reservasi, ['status' => 5]);
        return redirect()->to('/resepsionis/reservasi');
    }

    public function hapusdatareservasi($id_reservasi)
    {
        $syarat = ['id_reservasi' => $id_reservasi];
        $infoFile = $this->reservasiModel->where($syarat)->find();

        $this->reservasiModel->where('id_reservasi', $id_reservasi)->delete();
        return redirect()->to('/resepsionis/reservasi');
    }

    public function form()
    {
        // mengambil semua data kamar
        $data = [
            'kamar' => $this->kamarModel->findAll()
        ];
        return view('tamu/form-booking', $data);
    }

    public function simpan()
    {
        d($this->request->getPost());

        $jml_kamar = count($this->request->getPost('pilihKamar'));
        $id_kamarkamar = $this->request->getPost('pilihKamar');

        // ambil harga kamar berd. tipe kamar
        $this->kamarModel->select('harga')
            ->whereIn('id_kamar', $id_kamarkamar)
            ->join('type_kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar')
            ->get('')->getResultArray();

        $harga_kamar = 0;
        foreach ($this->kamarModel as $value) {
            $harga_kamar = $harga_kamar + $value['harga'];
        }

        $checkin = $this->request->getPost('checkin');
        $checkout = $this->request->getPost('checkout');

        $in = new \DateTime($checkin);
        $out = new \DateTime($checkout);
        $interval = $in->diff($out);
        $jml_hari = $interval->d;

        $this->reservasiModel->insert(
            [
                'nik' => $this->request->getPost('nik'),
                'checkin' => $checkin,
                'checkout' => $checkout,
                'jml_kamar' => $jml_kamar,
                'harga' => $harga_kamar,
                'total' => $harga_kamar * $jml_hari,
                'status' => 1
            ]
        );

        $data = [];
        foreach ($id_kamarkamar as $key => $value) {
            $data[] = [
                'id_kamar' => $value,
                'id_reservasi' => $this->reservasiModel->getInsertId()
            ];
        }

        $db = \config\Database::connect();
        $builder = $db->table('reservasi_kamar');
        $builder->insertBatch($data);

        return redirect()->to('/reservasi/data');
    }
}
