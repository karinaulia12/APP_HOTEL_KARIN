<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ResepsionisController extends BaseController
{
    public function __construct()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }

        if (session()->get('level' != 'admin')) {
            return redirect()->to('/petugas');
            exit;
        }

        if (session()->get('level' != 'admin')) {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
    }
    public function index()
    {
        return view('petugas/v_login');
    }

    public function dashboard()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }

        if (session()->get('level' != 'resepsionis')) {
            return redirect()->to('/petugas');
            exit;
        }

        $data = [
            'title' => 'Dashboard Resepsionis | AuHotelia',
            'jml_reservasi' => $this->reservasiModel->jml_reservasi()
        ];

        return view('resepsionis/dashboard_rsp', $data);
    }

    public function tampil_reservasi()
    {

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $reservasi = $this->reservasiModel->search($keyword);
        } else {
            $reservasi = $this->reservasiModel->join_tabel();
        }

        $data = [
            'title' =>  'Data Reservasi | AuHotelia',
            // 'reservasi' => $this->reservasiModel->join_tabel(),
            'reservasi' => $reservasi,
            'keyword' => $keyword
        ];

        return view('resepsionis/tampil-reservasi', $data);
    }

    public function detail_reservasi($id_rsv)
    {
        $syarat = ['reservasi.id_reservasi' => $id_rsv];
        $status = $this->reservasiModel->get_status($id_rsv);

        $stt = array_map(function ($s) use ($status) {
            $s[] = [];
            switch ($s['status']) {
                case 1:
                    $s['status_txt'] = 'Pending';
                    break;
                case 2:
                    $s['status_txt'] = 'Check-In';
                    break;
                case 3:
                    $s['status_txt'] = 'Check-Out';
                    break;
            }

            return $s;
        }, $status);

        $data = [
            'title' =>  'Detail Reservasi | AuHotelia',
            'reservasi' => $this->reservasiModel
                ->select('reservasi.id_reservasi, reservasi.nik, reservasi.nama_tamu, kamar.no_kamar, type_kamar.type_kamar, reservasi.jml_kamar, reservasi.checkin, reservasi.checkout, reservasi.total, reservasi.nama_pemesan, reservasi.no_telp, reservasi.email, type_kamar.harga, datediff(reservasi.checkout,reservasi.checkin) as jmlHari, reservasi.status')
                ->join('type_kamar', 'type_kamar.id_type_kamar = reservasi.id_type_kamar')
                ->join('kamar', 'kamar.id_type_kamar = type_kamar.id_type_kamar')
                ->where($syarat)->find()[0],
            'status' => $stt
        ];
        // dd($data);
        return view('resepsionis/detail-reservasi', $data);
    }

    public function data()
    {
        $reservasi = $this->reservasiModel
            ->select('reservasi.nama_tamu, reservasi.checkin, reservasi.checkout, type_kamar.type_kamar, reservasi.jml_kamar, reservasi.nama_pemesan, reservasi.total, reservasi.status, reservasi.id_reservasi, reservasi.nik, reservasi.no_telp, reservasi.email, reservasi.harga, type_kamar.id_type_kamar, type_kamar.harga, type_kamar.foto, kamar.status_kmr, kamar.id_kamar, kamar.id_type_kamar')
            ->join('type_kamar', 'type_kamar.id_type_kamar = reservasi.id_type_kamar')
            ->join('kamar', 'kamar.id_type_kamar = type_kamar.id_type_kamar')
            ->groupBy('reservasi.nama_pemesan')
            ->orderBy('checkin', 'desc');

        $reservasi = $reservasi->get()->getResultArray();

        // search checkin
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $reservasi = $this->reservasiModel->search($keyword);
        } else {
            $reservasi = $this->reservasiModel->join_tabel();

            // $datatamu = $this->reservasi->findAll();
        }

        $data = [
            'title' =>  'Data Reservasi | AuHotelia',
            'reservasi' => $reservasi,
            'keyword' => $keyword
        ];

        return view('resepsionis/tampil-reservasi', $data);
    }

    public function checkin($id_reservasi)
    {
        $syarat_rsv = ['reservasi.id_reservasi' => $id_reservasi];
        $id_kamar = $this->reservasiModel->get_id_kamar_checkin($id_reservasi);
        foreach ($id_kamar as $value) {
            $data[] = [
                'id_kamar' => $value['id_kamar'],
                'status_kmr' => 'ditempati'
            ];
        }
        $id_kmr = ['id_kamar' => $id_kamar];
        d($id_kamar);
        d($data);
        d($id_kmr);
        $syarat_kmr = ['kamar.status_kmr' => 'tersedia'];
        $stt_kamar = $this->kamarModel->select('status_kmr')->where($syarat_kmr, $syarat_rsv)->find();
        d($stt_kamar);
        $this->reservasiModel->update($id_reservasi, ['status' => 2]);
        $this->kamarModel->updateBatch($data, 'id_kamar');
        return redirect()->to('/resepsionis/reservasi');
    }

    public function checkout($id_reservasi)
    {
        $syarat = ['reservasi.id_reservasi' => $id_reservasi];
        $id_kamar = $this->reservasiModel->get_id_kamar_checkout($id_reservasi);
        $id_kmr = ['id_kamar' => $id_kamar];
        foreach ($id_kamar as $value) {
            $data[] = [
                'id_kamar' => $value['id_kamar'],
                'status_kmr' => 'tersedia'
            ];
        }

        $this->reservasiModel->update($id_reservasi, ['status' => 3]);
        $this->kamarModel->updateBatch($data, 'id_kamar');
        return redirect()->to('/resepsionis/reservasi');
    }

    public function pending($id_reservasi)
    {
        $syarat = ['reservasi.id_reservasi' => $id_reservasi];
        $id_kamar = $this->reservasiModel->get_id_kamar_pending($id_reservasi);
        $id_kmr = ['id_kamar' => $id_kamar];
        foreach ($id_kamar as $value) {
            $data[] = [
                'id_kamar' => $value['id_kamar'],
                'status_kmr' => 'dipesan'
            ];
        }

        $this->reservasiModel->update($id_reservasi, ['status' => 1]);
        $this->kamarModel->updateBatch($data, 'id_kamar');
        return redirect()->to('/resepsionis/reservasi');
    }

    public function tampil_tk()
    {
        $tersedia = $this->kamarModel->select('*')->where('status_kmr', 'tersedia')->get()->getResultArray();
        $data = [
            'title' => 'Tipe Kamar | AuHotelia',
            'tk' => $this->typeKamarModel->select('*')
                // ->join('kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar')
                ->get()->getResultArray(),
            // 'tersedia' => count($tersedia),
        ];

        return view('resepsionis/type_kamar', $data);
    }
}
