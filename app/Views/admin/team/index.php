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
                <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>" class="text-primary">Dashboard</a></li>
                <li class="breadcrumb-item active text-dark">
                    <?= $title; ?>
                </li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Team</h6>
                        </div>
                        <div class="card-body">
                            <!-- notif berhasil ubah -->
                            <?php if (session('success')): ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session('success'); ?>
                                </div>
                            <?php endif; ?>

                            <!-- notif gagal ubah -->
                            <?php if (session('failed')): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= session('failed'); ?>
                                </div>
                            <?php endif; ?>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Facebook</th>
                                            <th>Instagram</th>
                                            <th>Foto</th>
                                            <th>Fungsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($daftar_team as $team): ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $team->nama; ?></td>
                                                <td><?= $team->jabatan; ?></td>
                                                <td><?= $team->fb; ?></td>
                                                <td><?= $team->ig; ?></td>
                                                <td class="text-center">
                                                    <img src="<?= base_url('asset-admin/img/' . $team->gambar_team) ?>"
                                                        alt="gambar" width="100px">
                                                </td>
                                                <td width="15%" class="text-center">
                                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                                        data-target="#ubahModal<?= $team->id_team; ?>"><i class="fas fa-edit"></i> Ubah</button>
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

<!-- modal ubah -->
<?php foreach ($daftar_team as $team): ?>
    <div class="modal fade" id="ubahModal<?= $team->id_team; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i> Ubah Team</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('team/ubah/' . $team->id_team) ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="gambarLama" value="<?= $team->gambar_team; ?>">

                        <div class="mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama"
                                class="form-control <?= $validation->hasError('nama') ? 'is-invalid' : null ?>"
                                value="<?= old('nama', $team->nama) ?>" required>

                            <?php if ($validation->hasError('nama')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama'); ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" name="jabatan" id="jabatan"
                                class="form-control <?= $validation->hasError('jabatan') ? 'is-invalid' : null ?>"
                                value="<?= old('jabatan', $team->jabatan) ?>" required>

                            <?php if ($validation->hasError('jabatan')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jabatan'); ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="fb">Link Facebook</label>
                            <input type="text" name="fb" id="fb"
                                class="form-control <?= $validation->hasError('fb') ? 'is-invalid' : null ?>"
                                value="<?= old('fb', $team->fb) ?>" required>

                            <?php if ($validation->hasError('fb')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('fb'); ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3 col-sm-6">
                            <label for="ig">Link Instagram</label>
                            <input type="text" name="ig" id="ig"
                                class="form-control <?= $validation->hasError('ig') ? 'is-invalid' : null ?>"
                                value="<?= old('ig', $team->ig) ?>" required>

                            <?php if ($validation->hasError('ig')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ig'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        </div>

                        <div class="mb-3">
                            <label for="gambar_team">Foto</label>
                            <small for="gambar_slider">*max upload 10MB</small>
                            <input type="file" name="gambar_team" id="gambar_team<?= $team->id_team ?>"
                                class="form-control <?= $validation->hasError('gambar_team') ? 'is-invalid' : null ?>"
                                onchange="validateImageSize<?= $team->id_team ?>(this)">
                            <small class="text-danger" id="error-message<?= $team->id_team ?>"></small>
                            <img src="<?= base_url('asset-admin/img/' . $team->gambar_team) ?>" alt=""
                                class="preview-img<?= $team->id_team ?> mt-2" width="100px">
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

    <script>
        function validateImageSize<?= $team->id_team ?>(fileInput) {
            var fileSize = fileInput.files[0].size; // Mendapatkan ukuran file dalam byte
            var maxSize = 10 * 1024 * 1024; // Ukuran maksimum yang diizinkan, misalnya 500 MB
            var errorMessage = document.getElementById('error-message<?= $team->id_team ?>');

            if (fileSize > maxSize) {
                errorMessage.innerHTML = "Ukuran gambar terlalu besar. Maksimum ukuran yang diizinkan adalah 5 MB.";
                fileInput.value = ""; // Mengosongkan input file
                $('.preview-img<?= $team->id_team ?>').attr('src', '<?= base_url('asset-admin/img/' . $team->gambar_team) ?>');
            } else {
                errorMessage.innerHTML = "";
                previewImg<?= $team->id_team ?>(fileInput);
            }
        }

        function previewImg<?= $team->id_team ?>(fileInput) {
            var previewImg = document.querySelector('.preview-img<?= $team->id_team ?>');
            var file = fileInput.files[0];
            var reader = new FileReader();

            reader.addEventListener("load", function () {
                previewImg.src = reader.result;
            }, false);

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
<?php endforeach; ?>



<?= $this->endSection() ?>
