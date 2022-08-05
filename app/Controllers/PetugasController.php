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
        return view('petugas/dashboard', $data);
    }

    public function argon()
    {
        return view('argon/card');
    }

    // function tampilan
    public function tampiltambahkamar()
    {
        $data = [
            'title' => 'Tambah Kamar AuHotelia',
            'dataKamar' => $this->kamarModel->findAll(),
            'dataTypeKamar' => $this->typeKamarModel->findAll(),
            'validasi' => \Config\Services::validation()
        ];
        session()->set($data);
        return view('kamar/tambah-kamar', $data);
    }

    public function tampildetailkamar($id_kamar)
    {
        // $join_typeKamar = $this->kamarModel->join('type_kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar')->get()->getResultArray();

        $data = [
            'title' => 'Detail Kamar AuHotelia',
            'judul' => 'Detail Kamar',
            'dataKamar' => $this->kamarModel->where('id_kamar', $id_kamar)
                ->join('type_kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar')
                ->join('fasilitas_kamar', 'type_kamar.id_type_kamar = fasilitas_kamar.id_type_kamar')
                ->findAll(),
            'data_typeKamar' => $this->kamarModel->typeKamar_detailKamar($id_kamar),
            'nama_fasilitas' => $this->fKamarModel->typeKamar_inDetail($id_kamar)
        ];
        return view('kamar/detail-kamar', $data);
    }

    public function tampileditkamar($id_kamar)
    {
        $data = [
            'title' => 'Edit Kamar AuHotelia',
            'judul' => 'Edit Kamar',
            'dataKamar' => $this->kamarModel
                ->where('id_kamar', $id_kamar)
                ->join('type_kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar')
                ->findAll(),
            'data_typekamar' => $this->typeKamarModel->findAll(),
            'data_typeKamar' => $this->kamarModel->join_typeKamar(),
            'validasi' => \Config\Services::validation()
        ];
        // dd($data);
        return view('kamar/edit-kamar', $data);
    }

    public function tampilfasilitaskamar()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $fkamar = $this->fKamarModel->search($keyword);
        } else {
            $fkamar = $this->fKamarModel->get_typeKamar();
        }

        // $tabeljoin = $this->kamarModel->join('fasilitas_kamar', 'kamar.id_kamar = fasilitas_kamar.id_kamar')->get()->getResultArray();

        $data = [
            'title' => 'Fasilitas Kamar AuHotelia',
            // 'dataKamar' => $tabeljoin,
            'fkamar' => $fkamar,
            'data_tk' => $this->fKamarModel->get_typeKamar(),
            'keyword' => $keyword
        ];

        return view('fkamar/fasilitas-kamar', $data);
    }

    public function tampildetail_fkamar($id_fkamar)
    {
        $data = [
            'title' => 'Detail Fasilitas Kamar AuHotelia',
            // 'dataFkamar' => $this->fKamarModel->where('id_fkamar', $id_fkamar)->findAll()
            'dataFkamar' => $this->fKamarModel->detail_fkamar($id_fkamar)
        ];

        return view('fkamar/detail-fkamar', $data);
    }

    public function tampiltambah_fkamar()
    {
        $data = [
            'title' => 'Tambah Fasilitas Kamar AuHotelia',
            'validasi' => \Config\Services::validation(),
            'dataTypeKamar' => $this->typeKamarModel->findAll()
            // 'data_typeKamar' => $this->fKamarModel->findAll()
        ];
        return view('fkamar/tambah-fkamar', $data);
    }

    public function tampiledit_fkamar($id_fkamar)
    {
        $data = [
            'title' => 'Edit Fasilitas Kamar AuHotelia',
            'data_fkamar' => $this->fKamarModel->where('id_fkamar', $id_fkamar)
                ->join('type_kamar', 'type_kamar.id_type_kamar = fasilitas_kamar.id_type_kamar')
                ->get()->getResultArray(),
            'fkamar' => $this->fKamarModel
                ->join('type_kamar', 'type_kamar.id_type_kamar = fasilitas_kamar.id_type_kamar')
                ->orderBy('harga', 'asc')
                ->get()->getResultArray(),
            'data_tk' => $this->fKamarModel->get_typeKamar(),
            'validasi' => \Config\Services::validation()
        ];

        return view('fkamar/edit-fkamar', $data);
    }

    public function tampil_fumum()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $fumum = $this->fUmumModel->search($keyword);
        } else {
            $fumum = $this->fUmumModel;
        }

        $data = [
            'title' => 'Fasilitas Hotel AuHotelia',
            // 'data_fumum' => $this->fUmumModel->findAll()
            'data_fumum' => $fumum->paginate(10, 'fasilitas_umum'),
            'pager' => $this->fUmumModel->pager,
            'keyword' => $keyword
        ];
        return view('fumum/fasilitas-umum', $data);
    }

    public function tampiltambah_fumum()
    {

        $data = [
            'title' => 'Tambah Fasilitas Hotel AuHotelia',
            'validasi' => \Config\Services::validation()
        ];
        return view('fumum/tambah-fumum', $data);
    }

    public function tampiledit_fumum($id_fumum)
    {
        $data = [
            'title' => 'Edit Fasilitas Hotel AuHotelia',
            'data_fumum' => $this->fUmumModel->where('id_fumum', $id_fumum)->findAll(),
            'validasi' => \Config\Services::validation()
        ];

        return view('fumum/edit-fumum', $data);
    }

    public function tampiltambah_tkamar()
    {
        $data = [
            'title' => 'Tambah Tipe Kamar AuHotelia',
            'validasi' => \Config\Services::validation(),
            'dataTypeKamar' => $this->typeKamarModel->findAll()
            // 'data_typeKamar' => $this->fKamarModel->findAll()
        ];
        // dd($data);
        return view('tkamar/tambah-tkamar', $data);
    }

    public function tampiledit_tkamar($id_tkamar)
    {
        $syarat = ['type_kamar.id_type_kamar' => $id_tkamar];
        $data = [
            'title' => 'Edit Tipe Kamar AuHotelia',
            'data_tk' => $this->typeKamarModel
                ->join('fasilitas_kamar', 'type_kamar.id_type_kamar = fasilitas_kamar.id_type_kamar')
                ->where($syarat)->find(),
            'validasi' => \Config\Services::validation()
        ];
        // dd($data);
        return view('tkamar/edit-tkamar', $data);
    }

    // crud kamar
    public function tampilKamar()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $kamar = $this->kamarModel->search($keyword);
        } else {
            $kamar = $this->kamarModel
                ->join("{$this->typeKamarModel->table}", "{$this->typeKamarModel->table}.id_type_kamar = kamar.id_type_kamar")
                ->orderBy('no_kamar', 'asc')
                ->get()->getResultArray();
        }

        $data = [
            'title' => 'Kamar AuHotelia',
            'judul' => 'Data Kamar',
            'kamar' => $kamar,
            'pager' => $this->kamarModel->pager,
            'keyword' => $keyword,
            'dataKamar' => $this->kamarModel->findAll(),
            'dataTypeKamar' => $this->typeKamarModel->findAll(),
            'validasi' => \Config\Services::validation(),
            'action' => site_url('PetugasController/tampilKamar'),
        ];
        // dd($data);
        return view('kamar/tampil-kamar', $data);
    }

    public function tambahKamar()
    {
        // pengkondisian untuk validasi
        if (!$this->validate([
            'no_kamar' => [
                'rules' => 'required|max_length[10]|is_unique[kamar.no_kamar]',
                'errors' => [
                    'required' => 'Nomor Kamar harus diisi.',
                    'max_length' => 'Nomor Kamar terlalu panjang',
                    'is_unique' => 'Nomor Kamar sudah terdaftar.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/petugas/kamar/tambah')->withInput('validation', $validation);
        }

        helper(['form']);
        $inputdata = [
            'no_kamar' => $this->request->getPost('no_kamar'),
            'id_type_kamar' => $this->request->getPost('id_type_kamar'),
        ];

        session()->set($inputdata);
        $this->kamarModel->insert($inputdata);
        session()->setFlashdata('tambahKamar', 'Data kamar berhasil ditambahkan');
        return redirect()->to('/petugas/kamar');
    }

    public function editKamar1()
    {
        $id_kamar = $this->request->getPost('id_kamar');
        $no_kamar = $this->request->getPost('no_kamar');
        $nama_foto_lama = $this->request->getPost('nama_foto');
        $syarat = ['id_kamar' => $id_kamar];
        // $file = $this->request->getFile('foto');
        // if ($file->isValid() && !$file->hasMoved()) {
        //     if (file_exists('gambar/' . $nama_foto_lama)) {
        //         unlink('gambar/' . $nama_foto_lama);
        //     }
        //     $nama_foto = $file->getRandomName();
        //     $file->move(WRITEPATH . '../public/gambar', $nama_foto);
        // } else {
        //     $nama_foto = $nama_foto_lama;
        // }
        $data = [
            'no_kamar' => $no_kamar,
            'id_type_kamar' => $this->request->getPost('type_kamar'),
            // 'deskripsi' => $this->request->getPost('deskripsi')
        ];
        // dd($data);
        $this->kamarModel->where($syarat)->set($data)->update();
        return redirect()->to('/petugas/kamar')->with('editKamar', 'Data kamar berhasil diupdate');
    }

    public function hapusKamar($id_kamar)
    {
        $syarat = ['id_kamar' => $id_kamar];
        $dataKamar = $this->kamarModel->where($syarat)
            // ->join('type_kamar', 'type_kamar.id_type_kamar =')
            ->find();

        // $file = $dataKamar[0]['foto'];
        // // if ($file->isValid() && !$file->hasMoved()) {
        // if (file_exists('gambar/' . $file)) {
        //     unlink('gambar/' . $file);
        // }
        // }
        // hapus foto
        // unlink('gambar/' . $dataKamar[0]['foto']);
        $this->kamarModel->where($syarat)->delete();
        session()->setFlashdata('hapusKamar', 'Data Kamar berhasil dihapus');
        return redirect()->to('/petugas/kamar');
    }

    // crud fasilitas kamar
    public function tambah_fkamar()
    {

        if (!$this->validate([
            'nama_fkamar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Fasilitas Kamar harus diisi.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/petugas/fkamar/tambah')->withInput('validation', $validation);
        }
        helper(['form']);
        $inputdata = [
            'nama_fkamar' => $this->request->getPost('nama_fkamar'),
            'id_type_kamar' => $this->request->getPost('id_type_kamar')
        ];

        session()->set($inputdata);
        $this->fKamarModel->insert($inputdata);
        session()->setFlashdata('tambahFkamar', 'Data fasilitas kamar berhasil ditambahkan');
        return redirect()->to('/petugas/fkamar');
    }

    public function edit_fkamar()
    {
        helper(['form']);
        $id_fkamar = $this->request->getPost('id_fkamar');
        $id_tk = $this->request->getPost('id_tk');

        if ($this->request->getPost('id_fkamar')) {
            $inputdata = [
                'nama_fkamar' => $this->request->getPost('nama_fkamar'),
                // 'foto' => $upload->getName(),
                'id_type_kamar' => $this->request->getPost('type_kamar'),
                'stok_kamar' => $this->request->getPost('stok_kamar')
            ];
            session()->set($inputdata);
            $db = \config\Database::connect();
            // update fasilitas_kamar
            $db->table('fasilitas_kamar as fk')
                ->where('id_fkamar', $id_fkamar)
                // ->where('id_type_kamar', )
                ->set('fk.nama_fkamar', $this->request->getPost('nama_fkamar'))
                ->set('fk.id_type_kamar', $this->request->getPost('type_kamar'))
                ->update();

            // update stok pada type_kamar
            $db->table('type_kamar as tk')
                ->where('id_type_kamar', $id_tk)
                ->set('tk.stok_kamar', $this->request->getPost('stok_kamar'))
                ->update();

            session()->setFlashdata('edit_fkamar', 'Data fasilitas hotel berhasil diupdate');
            return redirect()->to('/petugas/fkamar');
        }
    }

    public function hapus_fkamar($id_fkamar)
    {
        $syarat = ['id_fkamar' => $id_fkamar];
        $this->fKamarModel->where($syarat)->find();
        $this->fKamarModel->where('id_fkamar', $id_fkamar)->delete();
        session()->setFlashdata('hapus_fkamar', 'Data Kamar berhasil dihapus');
        return redirect()->to('/petugas/fkamar');
    }

    // crud fasilitas hotel
    public function tambah_fumum()
    {
        if (!$this->validate([
            'nama_fumum' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Fasilitas Kamar harus diisi.'
                ]
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|is_image[foto]',
                'errors' => [
                    'uploaded' => 'Foto harus diisi.',
                    'is_image' => 'File yang Anda upload bukan gambar'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi harus diisi.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/petugas/fumum/tambah')->withInput('validation', $validation);
        }

        helper(['form']);
        $fileFoto = $this->request->getFile('foto');
        $nama_foto = $fileFoto->getRandomName();
        $fileFoto->move(WRITEPATH . '../public/gambar', $nama_foto);
        $inputdata = [
            'nama_fumum' => $this->request->getPost('nama_fumum'),
            'foto' => $nama_foto,
            'deskripsi' => $this->request->getPost('deskripsi')
        ];

        session()->set($inputdata);
        $this->fUmumModel->insert($inputdata);
        session()->setFlashdata('tambah_fumum', 'Data fasilitas hotel berhasil ditambahkan');
        return redirect()->to('/petugas/fumum');
    }

    public function edit_fumum($id_fumum)
    {
        helper(['form']);
        $id_fumum = $this->request->getPost('id_fumum');
        $syarat = [
            'id_fumum' => $id_fumum
        ];
        $nama_foto_lama = $this->request->getPost('nama_foto_fumum');

        $file = $this->request->getFile('foto');
        if ($file->isValid() && !$file->hasMoved()) {
            if (file_exists('gambar/' . $nama_foto_lama)) {
                unlink('gambar/' . $nama_foto_lama);
            }
            $nama_foto_fumum = $file->getRandomName();
            $file->move(WRITEPATH . '../public/gambar/', $nama_foto_fumum);
        } else {
            $nama_foto_fumum = $nama_foto_lama;
        }

        $data = [
            'nama_fumum' => $this->request->getPost('nama_fumum'),
            'foto' => $nama_foto_fumum,
            'deskripsi' => $this->request->getPost('deskripsi')
        ];
        // d($data);
        $this->fUmumModel->where($syarat)->set($data)->update();
        session()->setFlashdata('edit_fumum', 'Data fasilitas hotel berhasil diupdate');
        return redirect()->to('/petugas/fumum');
    }

    public function hapus_fumum($id_fumum)
    {
        helper(['form']);
        $syarat = ['id_fumum' => $id_fumum];
        $data_fumum = $this->fUmumModel->where($syarat)->find();
        unlink('gambar/' . $data_fumum[0]['foto']);
        $this->fUmumModel->where('id_fumum', $id_fumum)->delete();
        session()->setFlashdata('hapus_fumum', 'Data fasilitas hotel berhasil dihapus');
        return redirect()->to('/petugas/fumum');
    }

    // crud type_kamar
    public function tampiltypekamar()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $tkamar = $this->typeKamarModel->search($keyword);
        } else {
            $tkamar = $this->typeKamarModel->join_fasilitas();
        }

        $data = [
            'title' => 'Tipe Kamar AuHotelia',
            'judul' => 'Tipe Kamar',
            'tkamar' => $tkamar,
            // 'data_tk' => $this->fKamarModel->get_typeKamar(),
            'keyword' => $keyword,
        ];
        // dd($data);
        return view('tkamar/type-kamar', $data);
    }

    public function tambah_tkamar()
    {
        // // pengkondisian untuk validasi
        if (!$this->validate([
            'type_kamar' => [
                'rules' => 'required|max_length[100]|is_unique[kamar.no_kamar]',
                'errors' => [
                    'required' => 'Nomor Kamar harus diisi.',
                    'max_length' => 'Nomor Kamar terlalu panjang',
                    'is_unique' => 'Nomor Kamar sudah terdaftar.'
                ]
            ],
            'harga' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Harga harus diisi.',
                    'numeric' => 'Yang Anda masukkan bukan angka.',
                ]
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|is_image[foto]|mime_in[foto,image/jpg,image/png,image/jpeg]',
                'errors' => [
                    'uploaded' => 'Foto harus diisi.',
                    'is_image' => 'File yang Anda pilih bukan gambar.',
                    'mime_in' => 'Foto yang Anda pilih harus memiliki ekstensi .jpg, .png, atau .jpeg.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/petugas/tkamar/tambah')->withInput('validation', $validation);
        }

        helper(['form']);
        $tk = $this->request->getPost('type_kamar');
        $hrg = $this->request->getPost('harga');
        $fkamar = $this->request->getPost('nama_fkamar');
        $deskripsi = $this->request->getPost('deskripsi');

        //  ambil gambar
        $fileFoto = $this->request->getFile('foto');
        //  ambil nama file
        $namaFoto = $fileFoto->getRandomName();
        // pindahkan file ke folder public/gambar
        $fileFoto->move(WRITEPATH . '../public/gambar/', $namaFoto);

        $input_tk = [
            'type_kamar' => $tk,
            'harga' => $hrg,
            'foto' => $namaFoto
        ];
        $this->typeKamarModel->insert($input_tk);

        $input_fkamar = [
            'id_type_kamar' => $this->typeKamarModel->getInsertId(),
            'nama_fkamar' => $fkamar,
            'deskripsi' => $deskripsi,
        ];
        $this->fKamarModel->insert($input_fkamar);

        session()->setFlashdata('tambah_tkamar', 'Data tipe kamar berhasil ditambahkan');
        return redirect()->to('/petugas/tkamar');
    }

    public function edit_tkamar()
    {
        helper(['form']);
        $id_tk = $this->request->getPost('id_type_kamar');
        $id_fk = $this->request->getPost('id_fkamar');
        $tk = $this->request->getPost('type_kamar');
        $hrg = $this->request->getPost('harga');
        $fkamar = $this->request->getPost('nama_fkamar');
        $deskripsi = $this->request->getPost('deskripsi');
        $nama_foto_lama = $this->request->getPost('nama_foto');
        $file = $this->request->getFile('foto');

        if ($file->isValid() && !$file->hasMoved()) {
            if (file_exists('gambar/' . $nama_foto_lama)) {
                unlink('gambar/' . $nama_foto_lama);
            }
            $nama_foto = $file->getRandomName();
            $file->move(WRITEPATH . '../public/gambar', $nama_foto);
        } else {
            $nama_foto = $nama_foto_lama;
        }

        if ($this->request->getPost('id_fkamar')) {
            $input_tk = [
                'type_kamar' => $tk,
                'harga' => $hrg,
                'foto' => $nama_foto
            ];
            $input_fk = [
                'nama_fkamar' => $fkamar,
                'deskripsi' => $deskripsi,
            ];

            $db = \config\Database::connect();
            // update type_kamar
            $db->table('type_kamar as tk')
                ->where('id_type_kamar', $id_tk)
                ->update($input_tk);

            // update fasilitas_kamar
            $db->table('fasilitas_kamar as fk')
                ->where('id_fkamar', $id_fk)
                ->update($input_fk);

            session()->setFlashdata('edit_tkamar', 'Data tipe kamar berhasil diupdate');
            return redirect()->to('/petugas/tkamar');
        }
    }

    public function hapus_tkamar($id_tkamar)
    {
        $syarat = ['id_type_kamar' => $id_tkamar];

        $data_tk = $this->typeKamarModel->where($syarat)->find();
        $this->typeKamarModel->where('id_type_kamar', $id_tkamar)->delete();
        // $file = $data_tk[0]['foto'];
        // if (file_exists('gambar/' . $file)) {
        //     unlink('gambar/' . $file);
        // }
        session()->setFlashdata('hapus_tkamar', 'Data tipe kamar berhasil dihapus');
        return redirect()->to('/petugas/tkamar');
    }
}
