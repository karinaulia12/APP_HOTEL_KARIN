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

    public function lp_fkamar()
    {
        $data = [
            'data_fkamar' => $this->fKamarModel->get_typeKamar(),
            'data_fumum' => $this->fUmumModel->findAll()
        ];
        return view('tamu/lp_fkamar', $data);
    }

    public function lp_fumum()
    {
        $data = [
            'data_fumum' => $this->fUmumModel->findAll(),
            'data_fkamar' => $this->fKamarModel->get_typeKamar()
        ];
        return view('tamu/lp_fumum', $data);
    }

    public function lp_harga()
    {
        $data = [
            'data_fkamar' => $this->fKamarModel->get_typeKamar(),
            'data_fumum' => $this->fUmumModel->findAll()
        ];
        return view('tamu/lp_harga', $data);
    }
    public function lp_form()
    {
        $data = [
            'data_fkamar' => $this->fKamarModel->get_typeKamar(),
            'data_fumum' => $this->fUmumModel->findAll()
        ];
        return view('tamu/lp_form', $data);
    }

    public function welcome()
    {
        return view('tamu/lp_home');
    }

    public function form()
    {
        $data = [
            'title' => 'Form Booking AuHotelia',
            'kamar' => $this->kamarModel->join_typeKamar(),
            'type_kamar' => $this->typeKamarModel->findAll()
        ];
        return view('tamu/form-booking', $data);
    }

    public function form_typeKamar($type_kamar)
    {
        $syarat = ['type_kamar' => $type_kamar];
        $type_kamar = $this->typeKamarModel->select('type_kamar')
            ->where($syarat)
            ->get()->getResultArray();
        $data = [
            // 'nama_tk' => 
            'tk' => $type_kamar
        ];

        return view('tamu/form-booking-tk', $data);
    }

    public function simpanBooking()
    {
        d($this->request->getPost());

        $jml_kamar = count($this->request->getPost('pilihKamar'));
        $id_kamarkamar = $this->request->getPost('pilihKamar');

        // ambil harga kamar berd. tipe kamar
        $hrg = $this->kamarModel->select('harga')
            ->whereIn('id_kamar', $id_kamarkamar)
            ->join('type_kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar')
            ->get()->getResultArray();

        $harga_kamar = 0;
        foreach ($hrg as $value) {
            $harga_kamar = $harga_kamar + $value['harga'];
        }

        $checkin = $this->request->getPost('checkin');
        $checkout = $this->request->getPost('checkout');

        $in = new \DateTime($checkin);
        $out = new \DateTime($checkout);
        $interval = $in->diff($out);
        $jml_hari = $interval->d;

        $rsv = [
            'nik' => $this->request->getPost('nik'),
            'nama_pemesan' => $this->request->getPost('nama_pemesan'),
            'no_telp' => $this->request->getPost('no_telp'),
            'email' => $this->request->getPost('email'),
            'nama_tamu' => $this->request->getPost('nama_tamu'),
            'checkin' => $checkin,
            'checkout' => $checkout,
            'jml_kamar' => $jml_kamar,
            'harga' => $harga_kamar,
            'total' => $harga_kamar * $jml_hari,
            'status' => 1
        ];
        dd($rsv);
        $this->reservasiModel->insert($rsv);

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

        session()->setFlashdata('pesan_kamar', 'Anda telah berhasil pesan kamar!');
        return redirect()->to('/reservasi/pdf/' . $this->reservasiModel->getInsertId());
    }

    public function simpanBooking1()
    {
        d($this->request->getPost());

        $jml_kamar = $this->request->getPost('jml_kamar');
        $id_typekamar = $this->request->getPost('type_kamar');

        // ambil harga kamar berd. tipe kamar
        $hrg = $this->typeKamarModel->select('harga')
            // ->whereIn('type_kamar', $id_typekamar)
            ->where('id_type_kamar', $id_typekamar)
            // ->join('type_kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar')
            ->get()->getResultArray();

        $harga_kamar = 0;
        foreach ($hrg as $value) {
            $harga_kamar = $harga_kamar + $value['harga'];
        }

        $checkin = $this->request->getPost('checkin');
        $checkout = $this->request->getPost('checkout');

        $in = new \DateTime($checkin);
        $out = new \DateTime($checkout);
        $interval = $in->diff($out);
        $jml_hari = $interval->d;

        $rsv = [
            'nik' => $this->request->getPost('nik'),
            'nama_pemesan' => $this->request->getPost('nama_pemesan'),
            'no_telp' => $this->request->getPost('no_telp'),
            'email' => $this->request->getPost('email'),
            'nama_tamu' => $this->request->getPost('nama_tamu'),
            'checkin' => $checkin,
            'checkout' => $checkout,
            'jml_kamar' => $jml_kamar,
            'harga' => $harga_kamar * $jml_kamar,
            'total' => $harga_kamar * $jml_hari * $jml_kamar,
            'status' => 1
        ];
        // dd($rsv);
        $this->reservasiModel->save($rsv);

        // ambil id_kamar berd. tipe kamar
        $id_kmr = $this->kamarModel->select('id_kamar')
            ->where('type_kamar.id_type_kamar', $id_typekamar)
            ->join('type_kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar')
            // ->find();
            ->get($jml_kamar)->getResultArray();

        foreach ($id_kmr as $value) {
            $data[] = [
                'id_kamar' => $value['id_kamar'],
                'id_reservasi' => $this->reservasiModel->getInsertId()
            ];
        }
        // dd($data);
        $this->reservasiKamarModel->insertBatch($data);

        session()->setFlashdata('pesan_kamar', 'Anda telah berhasil pesan kamar!');
        return redirect()->to('/reservasi/pdf/' . $this->reservasiModel->getInsertId());
    }
}
