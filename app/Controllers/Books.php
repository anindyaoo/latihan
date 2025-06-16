<?php

namespace App\Controllers;

use App\Models\BooksModel;

class Books extends BaseController
{
    protected $BukuModel;
    public function __construct()
    {
        $this->BukuModel = new BooksModel();
    }

    public function index()
    {
        // $buku = $this->BukuModel->findAll();
        $data = [
            'title' => 'Daftar Buku',
            'buku' => $this->BukuModel->getBuku()
        ];

        return view('books_view/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Buku',
            'buku' => $this->BukuModel->getBuku($slug)
        ];
        //jika buku tidak ada
        if (empty($data['buku'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul Buku' . $slug . 'Tidak ditemukan');
        }
        return view('books_view/detail', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Form tambah buku',
            'validation' => \Config\Services::validation()
        ];

        if (session()->has('validation')) {
            $data['validation'] = session('validation');
        }
        return view('books_view/tambah', $data);
    }

    public function simpan()
    {
        //validasi input
        if (
            !$this->validate([
                'judul' => [
                    'rules' => 'required|is_unique[books.judul]',
                    'erors' => [
                        'required' => '{field} buku harus diisi',
                        'is_unique' => '{field} buku sudah dimasukkan'
                    ]
                ],
                'penulis' => [
                    'rules' => 'required|is_unique[books.penulis]',
                    'errors' => [
                        'required' => '{field} Nama penulis harus diisi',
                        'is_unique' => '{field} sudah terdaftar di buku lain'
                    ]
                ],
                'penerbit' => [
                    'rules' => 'required|is_unique[books.penerbit]',
                    'errors' => [
                        'required' => '{field} Nama penerbit harus diisi',
                        'is_unique' => '{field} sudah terdaftar di buku lain'
                    ]
                ],
                'sampul' => [
                    'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        // 'uploaded' => 'Pilihlah gambar yang sesuai',
                        'max_size' => 'Ukuran file kebesaran',
                        'is_image' => 'File yang anda pilih bukan gambar',
                        'mime_in' => 'File yang anda pilih bukan gambar'
                    ]
                ],
            ])
        ) {
            return redirect()->to(base_url() . '/tambah')->withInput()->with('validation', $this->validator);
        }

        //$this->request->getVar('judul');

        //ambil file gambar
        $gambarSampul = $this->request->getFile('sampul');

        //cek apakah ada file yang diunggah
        if ($gambarSampul->getError() == 4) {
            $namaSampul = 'no-cover.png';
        } else {

            //generate nama gambar
            $namaSampul = $gambarSampul->getRandomName();

            //pindah file gambar ke folder img
            $gambarSampul->move('img/', $namaSampul);

            //ambil nama file gambar
            //$namaSampul = $gambarSampul->getName();
        }
        $slug = url_title($this->request->getVar('judul'), '_', true);
        $data = [
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul
        ];

        $this->BukuModel->save($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/');
    }

    public function delete($id)
    {
        //cari nama gambar
        $buku = $this->BukuModel->find($id);

        //cek jika file gambar default
        if ($buku['sampul'] != 'no-cover.png') {

            //hapus gambar
            unlink('img/' . $buku['sampul']);
        }

        $this->BukuModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form Edit data Buku',
            'validation' => \Config\Services::validation(),
            'buku' => $this->BukuModel->getBuku($slug)
        ];

        return view('books_view/edit', $data);
    }
    public function update($id)
    {
        //fungsi cek judul buku yang tersedia
        $bukuLama = $this->BukuModel->getBuku($this->request->getVar('slug'));
        if ($bukuLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[books.judul]';
        }

        if ($bukuLama['penulis'] == $this->request->getVar('penulis')) {
            $rule_penulis = 'required';
        } else {
            $rule_penulis = 'required|is_unique[books.penulis]';
        }

        if ($bukuLama['penerbit'] == $this->request->getVar('penerbit')) {
            $rule_penerbit = 'required';
        } else {
            $rule_penerbit = 'required|is_unique[books.penerbit]';
        }

        //validasi input
        if (
            !$this->validate([
                'judul' => [
                    'rules' => $rule_judul,
                    'errors' => [
                        'required' => '{field} buku harus di isi',
                        'is_unique' => '{field} buku harus dimasukkan'
                    ]
                ]
            ])
        ) {
            $validation = \Config\Services::validation();
            return redirect()->to('buku/edit' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }

        //konfigurasi file unggah
        $gambarSampul = $this->request->getFile('sampul');

        //cek gambar, apakah tetap gambar lama
        if ($gambarSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            //generate nama gambar
            $namaSampul = $gambarSampul->getRandomName();
            //pindahkan gambar
            $gambarSampul->move('img/', $namaSampul);
            //hapus file
            unlink('img/' . $this->request->getVar('sampulLama'));
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->BukuModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data berhasil di ubah');

        return redirect()->to('/');
    }
}


