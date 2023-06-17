<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dasboard',
            'produk_teknologi'      => $this->ProdukModel->where('kategori_slug', 'teknologi')->countAllResults(),
            'produk_websecurity'    => $this->ProdukModel->where('kategori_slug', 'web-security')->countAllResults(),
            'produk_webseo'         => $this->ProdukModel->where('kategori_slug', 'web-seo')->countAllResults(),
            'produk_webserver'      => $this->ProdukModel->where('kategori_slug', 'web-server')->countAllResults(),
            'data_produk'           => $this->ProdukModel->limit (3)->find()


        ];
        return view('admin/dashboard/index', $data);
        
    }
}
