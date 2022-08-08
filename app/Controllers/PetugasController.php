<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kamar;

class PetugasController extends BaseController
{
    public function index()
    {
        return view('petugas/v_login');
    }

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
    }

    public function login()
    {
        $syarat = [
            'username' => $this->request->getPost('username'),
            'password' => md5($this->request->getPost('password'))
        ];
        $dataLogin = $this->petugasModel->where($syarat)->find();
        if (count($dataLogin) == 1) {
            $session_data = [
                'username' => $dataLogin[0]['username'],
                // 'id_petugas' => $dataLogin[0]['id_petugas'],
                'nama_petugas' => $dataLogin[0]['nama_petugas'],
                'no_hp' => $dataLogin[0]['no_hp'],
                'alamat' => $dataLogin[0]['alamat'],
                'level' => $dataLogin[0]['level'],
                'sudahkahLogin' => true
            ];
            session()->set($session_data);
            if (session()->get('level') == 'admin') {
                return redirect()->to('/petugas/dashboard');
            } else {
                return redirect()->to('/resepsionis/dashboard');
            }
        } else {
            session()->setFlashdata('salahLogin', 'Username atau Password Anda salah.');
            return redirect()->to('/petugas');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/petugas');
    }

    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard Petugas | AuHotelia',
            'judul' => 'Dashboard ' . session()->get('level'),
            'hitung_kamar' => $this->kamarModel->hitung_kamar(),
            'hitung_fkamar' => $this->fKamarModel->hitung_fkamar(),
            'hitung_fumum' => $this->fUmumModel->hitung_fumum(),
            'hitung_tkamar' => $this->typeKamarModel->countTipeKamar()
        ];
        // dd($data);
        return view('petugas/dashboard', $data);
    }
}
