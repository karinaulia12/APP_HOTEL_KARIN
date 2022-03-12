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
            'data_fkamar' => $this->fKamarModel->findAll()
        ];
        return view('tamu/lp_tamu', $data);
    }

    public function tampil_booking()
    {
        $data = [
            'title' => 'Form Booking AuHotelia'
        ];
        return view('tamu/form-booking', $data);
    }
}
