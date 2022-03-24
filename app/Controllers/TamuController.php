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

    public function form()
    {
        $data = [
            'title' => 'Form Booking AuHotelia',
            'kamar' => $this->kamarModel->findAll()
        ];
        return view('tamu/form-booking', $data);
    }

    public function simpanBooking()
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
