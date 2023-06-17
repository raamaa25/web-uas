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
                            <h6 class="m-0 font-weight-bold text-primary">Data Slider</h6>
                        </div>
                        <div class="card-body">
                            <!-- notif berhasil ubah produk -->
                            <?php if (session('success')): ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session('success'); ?>
                                </div>
                            <?php endif; ?>

                            <!-- notif gagal ubah produk -->
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
                                            <th>Judul Slider</th>
                                            <th>Deskripsi</th>
                                            <th>Gambar</th>
                                            <th>Fungsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($daftar_slider as $slider): ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $slider->judul_slider; ?></td>
                                                <td><?= $slider->deskripsi; ?></td>
                                                <td class="text-center">
                                                    <img src="<?= base_url('asset-admin/img/' . $slider->gambar_slider) ?>"
                                                        alt="gambar" width="100px">
                                                </td>
                                                <td width="15%" class="text-center">
                                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                                        data-target="#ubahModal<?= $slider->id_slider; ?>"><i class="fas fa-edit"></i> Ubah</button>
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
<?php foreach ($daftar_slider as $slider): ?>
    <div class="modal fade" id="ubahModal<?= $slider->id_slider; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i> Ubah Slider Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('slider/ubah/' . $slider->id_slider) ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="gambarLama" value="<?= $slider->gambar_slider; ?>">

                        <div class="mb-3">
                            <label for="judul_slider">Judul Slider</label>
                            <input type="text" name="judul_slider" id="judul_slider"
                                class="form-control <?= $validation->hasError('judul_slider') ? 'is-invalid' : null ?>"
                                value="<?= old('judul_slider', $slider->judul_slider) ?>" required>

                            <?php if ($validation->hasError('judul_slider')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('judul_slider'); ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" cols="30" rows="5"
                                class="form-control"><?= old('deskripsi', $slider->deskripsi) ?></textarea>
                        </div>

                        <div class="mb-3">
                        <label for="gambar_slider">Gambar Slider</label>
                        <small for="gambar_slider">*max upload 50mb</small>
                            <input type="file" name="gambar_slider" id="gambar_slider<?= $slider->id_slider ?>"
                                class="form-control <?= $validation->hasError('gambar_slider') ? 'is-invalid' : null ?>"
                                onchange="validateImageSize<?= $slider->id_slider ?>(this)">
                            <small class="text-danger" id="error-message<?= $slider->id_slider ?>"></small>
                            <img src="<?= base_url('asset-admin/img/' . $slider->gambar_slider) ?>" alt=""
                                class="preview-img<?= $slider->id_slider ?> mt-2" width="100px">
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
        function validateImageSize<?= $slider->id_slider ?>(fileInput) {
            var fileSize = fileInput.files[0].size; // Mendapatkan ukuran file dalam byte
            var maxSize = 50 * 1024 * 1024; // Ukuran maksimum yang diizinkan, misalnya 5 MB
            var errorMessage = document.getElementById('error-message<?= $slider->id_slider ?>');

            if (fileSize > maxSize) {
                errorMessage.innerHTML = "Ukuran gambar terlalu besar. Maksimum ukuran yang diizinkan adalah 50 MB.";
                fileInput.value = ""; // Mengosongkan input file
                $('.preview-img<?= $slider->id_slider ?>').attr('src', '<?= base_url('asset-admin/img/' . $slider->gambar_slider) ?>');
            } else {
                errorMessage.innerHTML = "";
                previewImg<?= $slider->id_slider ?>(fileInput);
            }
        }

        function previewImg<?= $slider->id_slider ?>(fileInput) {
            var previewImg = document.querySelector('.preview-img<?= $slider->id_slider ?>');
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
