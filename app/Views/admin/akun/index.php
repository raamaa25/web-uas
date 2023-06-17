<!-- render halaman -->
<?= $this->extend('admin/layout/template') ?>

<!-- render halaman -->
<?= $this->Section('content') ?>

<!-- Main Content -->

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Akun</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>" class="text-primary">Dashboard</a></li>
        <li class="breadcrumb-item active text-dark">
            <?= $title; ?>
        </li>
    </ol>
</div>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <a href="<?= base_url('register'); ?>" class="btn btn-sm btn-primary mb-3"><i
                        class="fa fa-user-plus"></i>Registrasi</a>
                <!-- flash message -->
                <?php if (session('success')): ?>
                    <div class="alert alert-success">
                        <?= session('success'); ?>
                    </div>
                <?php endif; ?>

                <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Tanggal Registrasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($data_user as $akun): ?>
                            <tr>
                                <td>
                                    <?= $no++; ?>
                                </td>
                                <td>
                                    <?= $akun->email; ?>
                                </td>
                                <td>
                                    <?= $akun->username; ?>
                                </td>
                                <td>
                                    <?= $akun->created_at; ?>
                                </td>
                                <td class="text-center" width="15%">
                                    <button class="btn btn-sm btn-success" data-toggle="modal"
                                        data-target="#ubahModal<?= $akun->id ?>"><i class="fas fa-edit"></i> Ubah</button>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#hapusModal<?= $akun->id ?>"><i class="fas fa-trash-alt"></i> Hapus</button>
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

<!-- End of Main Content -->

<?php foreach ($data_user as $akun): ?>
    <!-- Modal ubah -->
    <div class="modal fade" id="ubahModal<?= $akun->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Ubah Akun</h5>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open('akun/ubah/' . $akun->id); ?>
                    <input type="hidden" name="_method" value="PUT">
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?= $akun->email; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" value="<?= $akun->username; ?>" required minlength="3">
                        </div>
                        <a href="<?= base_url('forgot') ?>">Reset Password</a>

                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-success btn-sm">Ubah</button>
                </div>
                    <?= form_close(); ?>
                </div>
                
            </div>
        </div>
    </div>
<?php endforeach; ?>


<?php foreach ($data_user as $akun): ?>
    <!-- Modal hapus -->
    <div class="modal fade" id="hapusModal<?= $akun->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash-alt"></i> Hapus Akun</h5>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open('akun/hapus/' . $akun->id); ?>
                    <input type="hidden" name="_method" value="DELETE">
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?= $akun->email; ?>" required>
                        </div>

                        <p>Yakin Data Akun: <?= $akun->username; ?>, akan dihapus.?</p>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </div>
                    <?= form_close(); ?>
                </div>
                
            </div>
        </div>
    </div>
<?php endforeach; ?>




<!-- render halaman -->
<?= $this->endSection() ?>