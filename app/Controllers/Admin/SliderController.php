<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class SliderController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Manage Slider',
            'daftar_slider' => $this->SliderModel->findAll(),
            'validation' => \Config\Services::validation()
        ];

        return view('admin/slider/index', $data);
    }

    public function update($id_slider)
    {
        // aturan validasi input
        $rules = $this->validate([
            'judul_slider' => 'required',
            'deskripsi' => 'required',
            'gambar_slider' => 'max_size[gambar_slider,50120]|is_image[gambar_slider]|mime_in[gambar_slider,image/png,image/jpg,image/jpeg]|ext_in[gambar_slider,png,jpg,jpeg]'
            // 'gambar_slider' => 'uploaded[gambar_slider]|max_size[gambar_slider,2048]|is_image[gambar_slider]|mime_in[gambar_slider,image/png,image/jpg]|ext_in[gambar_slider,png,jpg,gif]'

        ]);

        // jika validasi gagal
        if (!$rules) {
            session()->setFlashdata('failed', 'Data Slider Gagal Diubah');
            return redirect()->back()->withInput();
        }


        // ambil file gambar
        $gambar = $this->request->getFile('gambar_slider');

        // check gambar diubah atau tidak
        if ($gambar->getError() == 4) {
            $namaGambar = $this->request->getPost("gambarLama");
        } else {
            // ambil random nama file
            $namaGambar = $gambar->getRandomName();

            // pindahkan file
            $gambar->move(WRITEPATH . '../public/asset-admin/img/', $namaGambar);

            // hapus gambar lama dari direktori 
            unlink(WRITEPATH . '../public/asset-admin/img/' . $this->request->getPost('gambarLama'));


        }

        $this->SliderModel->update($id_slider, [
            'judul_slider' => $this->request->getPost('judul_slider'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'gambar_slider' => $namaGambar
        ]);

        return redirect()->to(base_url('slider'))->with('success', 'Data Slider Berhasil Diubah');
    }

}