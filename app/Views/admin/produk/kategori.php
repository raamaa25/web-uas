<!-- render halaman -->
<?= $this->extend('admin/layout/template') ?>

<?= $this->Section('content') ?>



<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 text-dark"><?= $title; ?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>" class="text-primary">Dashboard</a></li>
                <li class="breadcrumb-item active text-dark"><?= $title; ?></li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                      <!-- DataTales Example -->
 <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Kategori Produk</h6>
                        </div>
                        <div class="card-body">
                            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm mb-4" 
data-toggle="modal" data-target="#tambahModal">
    <i class="fas fa-plus"></i> Tambah
</button>

<!-- notif berhasil tambah kategori -->
<?php if(session('success')) : ?>
    <div class="alert alert-success" role="alert">
    <?= session('success'); ?>
    </div>
<?php endif; ?>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kategori</th>
                                            <th>Tanggal Input</th>
                                            <th>Fungsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                        <?php foreach($daftar_kategori as $kategori) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $kategori->nama_kategori; ?></td>
                                                <td><?= date('d/m/Y H:i:s', strtotime($kategori->tanggal_input)); ?></td>
                                                <td width="15%" class="text-center">
                                                    <button type="button" class="btn btn-success btn-sm" 
                                                    data-toggle="modal" data-target="#ubahModal<?= $kategori->id_kategori; ?>"><i class="fas 
                                                    fa-edit"></i> Ubah</button>
                                                    <button type="button" class="btn btn-danger btn-sm" 
                                                    data-toggle="modal" data-target="#hapusModal<?= $kategori->id_kategori; ?>"><i class="fas 
                                                    fa-trash-alt"></i> Hapus</button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                 
                                    
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                </div>
            </div>
          
    </main>
    </div>



<!-- Modal Tambah-->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <form action="<?= base_url('daftar-kategori/tambah')?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label for="nama_kategori">Nama Kategori</label>
                <input type="text" name="nama_kategori" id="nama_kategori" class="form-control"
                required>

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

<!-- modal ubah -->
<?php foreach ($daftar_kategori as $kategori) : ?>
<div class="modal fade" id="ubahModal<?= $kategori->id_kategori; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i> Ubah Kategori Produk</h5>
        <!-- <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i> <span style="color: black;">Tambah Kategori Produk</span></h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('daftar-kategori/ubah/'.$kategori->id_kategori) ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PUT">

            <div class="mb-3">
                <label for="nama_kategori">Nama Kategori</label>
                <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" value="<?= $kategori->nama_kategori; ?>" required>

            </div>
      
      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary btn-sm">Ubah</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>

<!-- modal hapus -->
<?php foreach ($daftar_kategori as $kategori) : ?>
<div class="modal fade" id="hapusModal<?= $kategori->id_kategori; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash-alt"></i> Hapus Kategori Produk</h5>
        <!-- <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i> <span style="color: black;">Tambah Kategori Produk</span></h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('daftar-kategori/hapus/'.$kategori->id_kategori) ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="DELETE">

            <p>Yakin Data Kategori Produk : <?= $kategori->nama_kategori; ?>, Akan Dihapus.?</p>
      
      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>






 


<?= $this->endSection() ?>

