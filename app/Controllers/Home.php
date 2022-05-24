<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $type_kamar = $this->typeKamarModel->select('type_kamar, type_kamar.id_type_kamar, type_kamar.foto, type_kamar.harga, fasilitas_kamar.nama_fkamar')
            ->join('kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar')
            ->join('fasilitas_kamar', 'type_kamar.id_type_kamar = fasilitas_kamar.id_type_kamar')
            ->groupBy('kamar.id_type_kamar')
            ->get()->getResultArray();
        $f_kamar = $this->fKamarModel->select('nama_fkamar, type_kamar')
            ->join('type_kamar', 'type_kamar.id_type_kamar = fasilitas_kamar.id_type_kamar')
            ->groupBy('type_kamar')
            ->get()->getResultArray();
        $data = [
            'title' => 'AuHotelia',
            'data_fumum' => $this->fUmumModel->findAll(),
            // 'data_fkamar' => $this->fKamarModel->get_typeKamar(),
            'data_fkamar' => $f_kamar,
            'type_kamar' => $this->typeKamarModel->findAll(),
            'data_tk2' => $type_kamar
        ];
        // dd($data);
        // dd($type_kamar2);
        return view('layout/template_tamu', $data);
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

    public function form_typeKamar($id_type_kamar)
    {
        $syarat = ['type_kamar.id_type_kamar' => $id_type_kamar];
        $type_kamar = $this->typeKamarModel->select('type_kamar, type_kamar.id_type_kamar, type_kamar.foto, type_kamar.harga, fasilitas_kamar.nama_fkamar')
            ->join('kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar')
            ->join('fasilitas_kamar', 'type_kamar.id_type_kamar = fasilitas_kamar.id_type_kamar')
            ->where($syarat)
            ->find()[0];
        $f_kamar = $this->fKamarModel->select('nama_fkamar')
            ->join('type_kamar', 'type_kamar.id_type_kamar = fasilitas_kamar.id_type_kamar')
            ->where($syarat)
            ->get()->getResultArray();
        $kmr_tersedia = $this->kamarModel->select('id_kamar')
            ->where('status_kmr', 'tersedia')
            ->where($syarat)
            ->join('type_kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar')
            ->get()->getResultArray();
        $data = [
            'title' => 'Form Booking ' . $type_kamar['type_kamar'],
            'kamar' => $this->kamarModel->join_typeKamar(),
            'nama_tk' => $type_kamar,
            'fkamar' => $f_kamar,
            'kmr_tersedia' => $kmr_tersedia,
        ];
        // dd($f_kamar);
        return view('tamu/form-booking-tk', $data);
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
            'id_type_kamar' => $id_typekamar,
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
        d($rsv);
        $this->reservasiModel->save($rsv);

        $query = $this->kamarModel->select('id_kamar')
            ->where('kamar.status_kmr', 'tersedia')
            ->where('type_kamar.id_type_kamar', $id_typekamar)
            ->join('type_kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar');

        // jika jml kmr dipesan melebihi kmr yg tersedia
        $tersedia = $query->get()->getResultArray();
        d($tersedia);

        if ($jml_kamar > count($tersedia)) {
            $psn = 'Jumlah kamar yang dipesan melebihi batas kamar yang tersedia';
            session()->setFlashdata('gagal_rsv', $psn);
            return redirect()->to('/');
        }

        // ambil id_kamar berd. tipe kamar
        // $id_kmr = $query->get($jml_kamar)->getResultArray();
        $id_kmr = $this->kamarModel->select('id_kamar')
            ->where('kamar.status_kmr', 'tersedia')
            ->where('type_kamar.id_type_kamar', $id_typekamar)
            ->join('type_kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar')
            ->get($jml_kamar)->getResultArray();
        d($id_kmr);

        // jika id_kmr = 0
        if ($id_kmr === 0) {
            $psn = 'Maaf kamar yang Anda pesan sudah penuh';
            session()->setFlashdata('penuh', $psn);
            return redirect()->to('/');
        }

        foreach ($id_kmr as $value) {
            $data[] = [
                'id_kamar' => $value['id_kamar'],
                'status_kmr' => 'dipesan'
            ];
        }
        d($data);

        // $this->kamarModel->where('id_kamar', $id_kmr)->set(['status_kmr' => 'dipesan'])->update();
        // $this->kamarModel->where('id_kamar', $data)->update(['status_kmr' => 'dipesan']);
        $this->kamarModel->updateBatch($data, 'id_kamar');

        session()->setFlashdata('pesan_kamar', 'Anda telah berhasil pesan kamar!');
        return redirect()->to('/reservasi/pdf/' . $this->reservasiModel->getInsertId());
    }

    public function simpanBooking_tk()
    {
        // d($this->request->getPost());

        $jml_kamar = $this->request->getPost('jml_kamar');
        $id_typekamar = $this->request->getPost('id_tk');
        $nm_pemesan = $this->request->getPost('nama_pemesan');

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
            'id_type_kamar' => $id_typekamar,
            'nama_pemesan' => $nm_pemesan,
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
        // d($rsv);
        d($this->reservasiModel->save($rsv));

        $query = $this->kamarModel->select('id_kamar')
            ->where('kamar.status_kmr', 'tersedia')
            ->where('type_kamar.id_type_kamar', $id_typekamar)
            ->join('type_kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar');

        // jika jml kmr dipesan melebihi kmr yg tersedia
        $tersedia = $query->get()->getResultArray();
        d($tersedia);

        if ($jml_kamar > count($tersedia)) {
            $psn = 'Jumlah kamar yang dipesan melebihi batas kamar yang tersedia';
            session()->setFlashdata('gagal_rsv', $psn);
            return redirect()->to('/form-booking/' . $id_typekamar);
        }

        // ambil id_kamar berd. tipe kamar
        // $id_kmr = $query->get($jml_kamar)->getResultArray();
        $id_kmr = $this->kamarModel->select('id_kamar')
            ->where('kamar.status_kmr', 'tersedia')
            ->where('type_kamar.id_type_kamar', $id_typekamar)
            ->join('type_kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar')
            ->get($jml_kamar)->getResultArray();
        d($id_kmr);

        // jika id_kmr = 0
        if ($id_kmr === 0) {
            $psn = 'Maaf kamar yang Anda pesan sudah penuh';
            session()->setFlashdata('penuh', $psn);
            return redirect()->to('/form-booking/' . $id_typekamar);
        }

        foreach ($id_kmr as $value) {
            $data[] = [
                'id_kamar' => $value['id_kamar'],
                'status_kmr' => 'dipesan'
            ];
        }
        d($data);

        // $this->kamarModel->where('id_kamar', $id_kmr)->set(['status_kmr' => 'dipesan'])->update();
        // $this->kamarModel->where('id_kamar', $data)->update(['status_kmr' => 'dipesan']);
        $this->kamarModel->updateBatch($data, 'id_kamar');

        session()->setFlashdata('pesan_kamar', $nm_pemesan . ' telah berhasil pesan kamar!');
        return redirect()->to('/reservasi/pdf/' . $this->reservasiModel->getInsertId());
    }
}
