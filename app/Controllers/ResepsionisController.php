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
        $syarat = ['id_reservasi' => $id_rsv];
        $data = [
            'title' =>  'Detail Reservasi | AuHotelia',
            'reservasi' => $this->reservasiModel->where($syarat)->find()
        ];

        return view('resepsionis/detail-reservasi', $data);
    }

    public function data()
    {
        $reservasi = $this->reservasiModel
            ->select('*')
            // ->join('tamu', 'tamu.nik = reservasi.nik')
            ->join('reservasi_kamar', 'reservasi.id_reservasi = reservasi_kamar.id_reservasi')
            ->join('kamar', 'kamar.id_kamar = reservasi_kamar.id_kamar')
            ->join('type_kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar')
            ->orderBy('checkin', 'desc');

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
            if (array_key_exists($reserv['id_reservasi_kamar'], $data_kamar_)) {
                $reserv['kamar'] = $data_kamar_[$reserv['id_reservasi_kamar']];
            }

            // switch ($reserv['status']) {
            //     case 1:
            //         $reserv['status_txt'] = 'Pending';
            //         break;
            //     case 2:
            //         $reserv['status_txt'] = 'Check-In';
            //         break;
            //     case 3:
            //         $reserv['status_txt'] = 'Check-Out';
            //         break;
            // }

            return $reserv;
        }, $reservasi);
        // dd($reservasi);
        // search
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $reservasi = $this->reservasiModel->search($keyword);
        } else {
            $reservasi = $this->reservasiModel->join_tabel();
            // $reservasi = $reservasi;
        }

        $data = [
            'title' =>  'Data Reservasi | AuHotelia',
            'reservasi' => $reservasi,
            'keyword' => $keyword
        ];
        // $data['reservasi'] = $reservasi;

        return view('resepsionis/tampil-reservasi', $data);
    }

    public function checkin($id_reservasi)
    {
        // dd($id_reservasi);
        $berhasil = $this->reservasiModel->update($id_reservasi, ['status' => 2]);
        return redirect()->to('/resepsionis/reservasi');
    }

    public function checkout($id_reservasi)
    {
        // dd($id_reservasi);
        $berhasil = $this->reservasiModel->update($id_reservasi, ['status' => 3]);
        return redirect()->to('/resepsionis/reservasi');
    }

    public function hapusdatareservasi($id_reservasi)
    {
        $syarat = ['id_reservasi' => $id_reservasi];
        $infoFile = $this->reservasiModel->where($syarat)->find();

        // $this->reservasiModel->where('id_reservasi', $id_reservasi)->delete();
        $this->reservasiModel->where($infoFile)->delete();
        return redirect()->to('/resepsionis/reservasi');
    }
}
