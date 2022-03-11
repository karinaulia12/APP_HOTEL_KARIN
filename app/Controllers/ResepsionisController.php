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
}
