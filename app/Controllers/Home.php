<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'AuHotelia',
            'data_fumum' => $this->fUmumModel->findAll(),
            'data_fkamar' => $this->fKamarModel->get_typeKamar(),
            'type_kamar' => $this->typeKamarModel->findAll()
        ];
        return view('layout/template_tamu', $data);
    }
}
