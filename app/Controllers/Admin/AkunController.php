<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use \Myth\Auth\Models\UserModel;

class AkunController extends BaseController
{
    protected $userModel; 
    protected $db, $builder;

    public function __construct()
    {
        $this->userModel    = new UserModel();
        $this->db           = \Config\Database::connect();
        $this->builder      = $this->db->table('users');
    }

    public function index()
    {
        $data = [
            'title' => 'Data Akun',
            'data_user' => $this->builder->get()->getResultObject()
        ];

        return view('admin/akun/index', $data);
    }

    public function update($id)
    {
        $data = [
            'email' => strip_tags($this->request->getPost('email')), 
            'username' => strip_tags($this->request->getPost('username'))
        ];

        $this->builder->where('id', $id);
        $this->builder->update($data);

        return redirect()->back()->with('success', 'Data Akun Berhasil Diubah');
    }

    public function delete($id) 
    {
        $this->builder->delete(['id' => $id]);
        
        return redirect()->back()->with('success', 'Data Akun Berhasil Dihapus');
    }
}
