<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class ProdukController extends BaseController
{
    // daftar produk
    public function index()
    {
        $data = [
            'title' => 'Daftar Produk',
            'daftar_produk' => $this->ProdukModel->orderBy('id_produk', 'DESC')->findAll()
        ];
        return view('admin/produk/index', $data);
    }

    // form tambah produk
    public function form_create()
    {
        $data = [
            'title' => 'Tambah Produk',
            'kategori_produk'  => $this->KategoriModel->findAll(),
            'validation' => \Config\Services::validation()
            
        ];

        return view('admin/produk/create', $data);
    }

    // form ubah produk
    public function form_update($id_produk)
    {
        $data = [ 
            'title' => 'Ubah Produk', 
            'data_produk' => $this->ProdukModel->find($id_produk),
            'kategori_produk' => $this->KategoriModel->findAll(),
            'validation' => \Config\Services::validation()
    ];

        return view('admin/produk/update', $data);
    }

    // fungsi tambah produk
    public function create_produk()
    {
       $rules = $this->validate([
        'nama_produk'   => 'required', 
        'kategori_slug' => 'required',
        'deskripsi'     => 'required',
        'gambar_produk' => 'max_size[gambar_produk,5000]|is_image[gambar_produk]|mime_in[gambar_produk,image/png,image/jpg,image/jpeg]|ext_in[gambar_produk,png,jpg,jpeg]'
        // 'gambar_produk' => 'uploaded[gambar_produk]|max_size[gambar_produk,2048]|is_image[gambar_produk]|mime_in[gambar_produk,image/png,image/jpg]|ext_in[gambar_produk,png,jpg,gif]'

       ]);

       // jika validasi gagal
       if (!$rules) {
            session()->setFlashdata('failed', 'Data Produk Gagal Ditambahkan');
            return redirect()->back()->withInput();
       }
        // jika data valid
       // membuat slug 
       $slug_produk = url_title($this->request->getPost('nama_produk'), '-', TRUE);

       // ambil file gambar
       $gambar = $this->request->getFile('gambar_produk');

        // ambil random nama file
       $namaGambar = $gambar->getRandomName();

       // pindahkan file
       $gambar->move(WRITEPATH. '../public/asset-admin/img/', $namaGambar);


       $this->ProdukModel->insert([
            'slug_produk' => $slug_produk,
            'nama_produk' => $this->request->getPost('nama_produk'),
            'kategori_slug' => $this->request->getPost('kategori_slug'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'gambar_produk' => $namaGambar
       ]);

       return redirect()->to(base_url('daftar-produk'))->with('success', 'Data Produk Berhasil Ditambahkan');

    }

     // fungsi ubah produk
     public function update_produk($id_produk)
     {
        // aturan validasi input
        $rules = $this->validate([
         'nama_produk'   => 'required', 
         'kategori_slug' => 'required',
         'deskripsi'     => 'required',
         'gambar_produk' => 'max_size[gambar_produk,5000]|is_image[gambar_produk]|mime_in[gambar_produk,image/png,image/jpg,image/jpeg]|ext_in[gambar_produk,png,jpg,jpeg]'
         // 'gambar_produk' => 'uploaded[gambar_produk]|max_size[gambar_produk,2048]|is_image[gambar_produk]|mime_in[gambar_produk,image/png,image/jpg]|ext_in[gambar_produk,png,jpg,gif]'
 
        ]);
 
        // jika validasi gagal
        if (!$rules) {
             session()->setFlashdata('failed', 'Data Produk Gagal Diubah');
             return redirect()->back()->withInput();
        }
         // jika data valid
        // membuat slug 
        $slug_produk = url_title($this->request->getPost('nama_produk'), '-', TRUE);
 
        // ambil file gambar
        $gambar = $this->request->getFile('gambar_produk');

        // check gambar diubah atau tidak
        if ($gambar->getError() == 4) { 
            $namaGambar = $this->request->getPost("gambarLama");
        } else {
            // ambil random nama file
            $namaGambar = $gambar->getRandomName();
 
            // pindahkan file
            $gambar->move(WRITEPATH. '../public/asset-admin/img/', $namaGambar);

            // hapus gambar lama dari direktori 
            unlink(WRITEPATH. '../public/asset-admin/img/' . $this->request->getPost("gambarLama"));

        } 
 
        $this->ProdukModel->update($id_produk, [
             'slug_produk' => $slug_produk,
             'nama_produk' => $this->request->getPost('nama_produk'),
             'kategori_slug' => $this->request->getPost('kategori_slug'),
             'deskripsi' => $this->request->getPost('deskripsi'),
             'gambar_produk' => $namaGambar
        ]);
 
        return redirect()->to(base_url('daftar-produk'))->with('success', 'Data Produk Berhasil Diubah');
 
     }

   // fungsi hapus produk
    public function delete_produk()
    {
        if ($this->request->isAJAX()) {
            $id_produk = $this->request->getVar('id_produk');

            $produk = $this->ProdukModel->find($id_produk);

            // hapus gambar lama dari direktori
            unlink(WRITEPATH. '../public/asset-admin/img/' . $produk->gambar_produk);

            $this->ProdukModel->delete($id_produk);

            $result = [
                'success' => 'Data Produk Berhasil Dihapus'

            ];

            echo json_encode($result);

            // return redirect()->back()->with('success', 'Data Produk Berhasil Dihapus');
        } else {
            exit('404 Not found');
        }
    }

            // fungsi detail produk
            public function detail_produk ($id_produk)
            {
                $data = [
                    'title' => 'Detail Produk',
                    'data_produk' => $this->ProdukModel->find($id_produk)
                ];

                return view('admin/produk/detail', $data);
        }
        
    

    // daftar kategori produk
    public function kategori()
    {
        $data = [
            'title' => 'Daftar kategori Produk',
            'daftar_kategori' => $this->KategoriModel->orderBy('id_kategori', 'DESC')->findAll()
        ];
        return view('admin/produk/kategori', $data);
    }

    // tambah kategori produk
    public function store(){
        // ambil slug
        $slug = url_title($this->request->getPost('nama_kategori'), '-', TRUE);

        // simpan data ke database
        $data = [
            'nama_kategori' => esc($this->request->getPost('nama_kategori')),
            'slug_kategori' => $slug
        ];

        $this->KategoriModel->insert($data);

        return redirect()->back()->with('success', 'Data Kategori Produk Berhasil Ditambahkan');
    }

    // ubah kategori produk
    public function update($id_kategori){
        // ambil slug
        $slug = url_title($this->request->getPost('nama_kategori'), '-', TRUE);

        // simpan data ke database
        $data = [
            'nama_kategori' => esc($this->request->getPost('nama_kategori')),
            'slug_kategori' => $slug
        ];

        $this->KategoriModel->update($id_kategori, $data);

        return redirect()->back()->with('success', 'Data Kategori Produk Berhasil Diubah');
    }

    // hapus kategori produk
    public function destroy($id_kategori){
        $this->KategoriModel->where('id_kategori', $id_kategori)->delete();

        return redirect()->back()->with('success', 'Data Kategori Produk Berhasil Dihapus');

}

}
