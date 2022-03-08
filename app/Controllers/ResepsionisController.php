<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ResepsionisController extends BaseController
{
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
    }
}
