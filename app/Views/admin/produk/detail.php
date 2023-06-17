<!-- render halaman -->
<?= $this->extend('admin/layout/template') ?>

<?= $this->Section('content') ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 text-dark">
                <?= $title; ?>
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>" class="text-primary">Dashboard</a>
                </li>
                <li class="breadcrumb-item active text-dark">
                    <?= $title; ?>
                </li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Detail Produk : <?= $data_produk->nama_produk?></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <tr>
                                    <th>Nama</th>
                                    <td>: <?= $data_produk->nama_produk ?></td>
                                </tr>
                                <tr>
                                    <th>Kategori</th>
                                    <td>: <?= $data_produk->kategori_slug ?></td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td>: <?= $data_produk->deskripsi ?></td>
                                </tr>
                                <tr>
                                    <th width="50%">Gambar</th>
                                    <td><img src="<?= base_url('asset-admin/img/'.$data_produk->gambar_produk) ?>" 
                                    alt="" width="50%"></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Input</th>
                                    <td>
                                        <?= date('d/m/Y | h:i:s', strtotime($data_produk->tanggal_input)) ?>
                                    </td>
                                </tr>
                                </table>

                                <div class="justify-content-end d-flex">
                                    <a href="<?= base_url('daftar-produk') ?>" class="btn btn-secondary btn-sm mt-2">Kembali</a>
                                </div>
                                    
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
        </div>

    </main>

<!-- Modal Tambah-->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i> Tambah Kategori Produk</h5>
                <!-- <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i> <span style="color: black;">Tambah Kategori Produk</span></h5> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('daftar-kategori/tambah') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" required>

                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection() ?>