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
            $reservasi = $this->reservasiModel;
        }

        $data = [
            'title' =>  'Data Reservasi | AuHotelia',
            'reservasi' => $this->reservasiModel->join_tabel(),
            'keyword' => $keyword
        ];

        return view('resepsionis/tampil-reservasi', $data);
    }

    public function detail_reservasi($id_reservasi)
    {
        $data = [
            'title' =>  'Detail Reservasi | AuHotelia',
            'reservasi' => $this->reservasiModel->detail_rsv($id_reservasi)
        ];

        return view('resepsionis/detail-reservasi', $data);
    }

    public function tampil_tamu()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $tamu = $this->tamuModel->search($keyword);
        } else {
            $tamu = $this->tamuModel;
        }

        $data = [
            'title' => 'Data Tamu | AuHotelia',
            'data_tamu' => $this->tamuModel->findAll(),
            'keyword' => $keyword
        ];

        return view('resepsionis/tampil-tamu', $data);
    }


    public function data()
    {
        $reservasi = $this->reservasiModel
            // ->select('reservasi.id_reservasi, nik, checkin, checkout, jml_kamar, harga, total, status')
            ->select('*')
            ->join('tamu', 'tamu.nik = reservasi.nik')
            ->join('reservasi_kamar', 'reservasi.id_reservasi = reservasi_kamar.id_reservasi_kamar')
            ->join('kamar', 'kamar.id_kamar = reservasi_kamar.id_kamar')
            ->join('type_kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar');
        // ->get()->getResultArray();

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
        $reservasi = array_map(function ($reserv) use ($data_kamar_) {
            $reserv['kamar'] = [];
            if (array_key_exists($reserv['id_reservasi'], $data_kamar_)) {
                $reserv['kamar'] = $data_kamar_[$reserv['id_reservasi']];
            }

            switch ($reserv['status']) {
                case 1:
                    $reserv['status_txt'] = 'Pending';
                    break;
                case 2:
                    $reserv['status_txt'] = 'Check-In';
                    break;
                case 3:
                    $reserv['status_txt'] = 'Check-Out';
                    break;
                case 4:
                    $reserv['status_txt'] = 'Terima';
                    break;
                case 5:
                    $reserv['status_txt'] = 'Tolak';
                    break;
            }

            return $reserv;
        }, $reservasi);

        // search
        // $keyword = $this->request->getVar('keyword');
        // if ($keyword) {
        //     $reservasi = $this->reservasiModel->search($keyword);
        // } else {
        //     $reservasi = $this->reservasiModel;
        // }

        $data = [
            'title' =>  'Data Reservasi | AuHotelia',
            // 'reservasi' => $this->reservasiModel->join_tabel(),
            // 'keyword' => $keyword
        ];
        $data['reservasi'] = $reservasi;

        return view('resepsionis/tampil-reservasi', $data);
    }


    public function checkin($id_reservasi)
    {
        $berhasil = $this->reservasiModel->update($id_reservasi, ['status' => 2]);
        return redirect()->to('/resepsionis/reservasi');
    }

    public function checkout($id_reservasi)
    {
        $berhasil = $this->reservasiModel->update($id_reservasi, ['status' => 3]);
        return redirect()->to('/resepsionis/reservasi');
    }

    public function terima($id_reservasi)
    {
        $berhasil = $this->reservasiModel->update($id_reservasi, ['status' => 4]);
        return redirect()->to('/resepsionis/reservasi');
    }

    public function tolak($id_reservasi)
    {
        $berhasil = $this->reservasiModel->update($id_reservasi, ['status' => 5]);
        return redirect()->to('/resepsionis/reservasi');
    }

    public function hapusdatareservasi($id_reservasi)
    {
        $syarat = ['id_reservasi' => $id_reservasi];
        $infoFile = $this->reservasiModel->where($syarat)->find();

        $this->reservasiModel->where('id_reservasi', $id_reservasi)->delete();
        return redirect()->to('/resepsionis/reservasi');
    }
}
