<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class TeamController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Manage Team',
            'daftar_team' => $this->TeamModel->findAll(),
            'validation' => \Config\Services::validation()

        ];

        return view('admin/team/index', $data);
    }

    public function update($id_team) 
    {
        // aturan validasi input
        $rules = $this->validate([
            'nama'      => 'required',
            'jabatan'   => 'required',
            'fb'        => 'required',
            'ig'         => 'required',
            'gambar_team' => 'max_size[gambar_team,10000]|is_image[gambar_team]|mime_in[gambar_team,image/png,image/jpg,image/jpeg]|ext_in[gambar_team,png,jpg,jpeg]'
            // 'gambar_team' => 'uploaded[gambar_team]|max_size[gambar_team,2048]|is_image[gambar_team]|mime_in[gambar_team,image/png,image/jpg]|ext_in[gambar_team,png,jpg,gif]'

        ]);

        // jika validasi gagal
        if (!$rules) {
            session()->setFlashdata('failed', 'Data Team Gagal Diubah');
            return redirect()->back()->withInput();
        }


        // ambil file gambar
        $gambar = $this->request->getFile('gambar_team');

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

        $this->TeamModel->update($id_team, [
            'nama'    => $this->request->getPost('nama'),
            'jabatan' => $this->request->getPost('jabatan'),
            'fb'      => $this->request->getPost('fb'),
            'ig'      => $this->request->getPost('ig'),
            'gambar_team' => $namaGambar
        ]);

        return redirect()->to(base_url('team'))->with('success', 'Data Team Berhasil Diubah');
    }
}
