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
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Produk</h6>
                        </div>
                        <div class="card-body">

                            <!-- notif berhasil tambah produk -->
                            <?php if (session('success')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= str_replace('localhost:8080 says', '', session('success')); ?>
                                </div>
                            <?php endif; ?>

                            <!-- notif gagal tambah produk -->
                            <?php if (session('failed')) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= str_replace('localhost:8080 says', '', session('failed')); ?>
                                </div>
                            <?php endif; ?>

                            <form action="<?= base_url('daftar-produk/create-produk'); ?>" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                                <?= csrf_field(); ?>

                                <div class="row">
                                    <div class="mb3 col-6">
                                        <label for="nama_produk">Nama Produk</label>
                                        <input type="text" name="nama_produk" id="nama_produk" class="form-control <?= $validation->hasError('nama_produk') ? 'is-invalid' : null ?>" required value="<?= old('nama_produk') ?>">

                                        <?php if ($validation->hasError('nama_produk')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_produk'); ?>
                                            </div>
                                        <?php endif; ?>

                                    </div>

                                    <div class="mb3 col-6">
                                        <label for="kategori_slug">Kategori Produk</label>
                                        <select name="kategori_slug" id="kategori_slug" class="form-control <?= $validation->hasError('kategori_slug') ? 'is-invalid' : null ?>" required>
                                            <option value="" hidden>-- pilih --</option>

                                            <?php foreach ($kategori_produk as $kategori) : ?>
                                                <?php if (old('kategori_slug') == $kategori->slug_kategori) : ?>
                                                    <option value="<?= $kategori->slug_kategori; ?>" selected><?= $kategori->nama_kategori; ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $kategori->slug_kategori; ?>"><?= $kategori->nama_kategori; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>

                                        </select>

                                        <?php if ($validation->hasError('kategori_slug')) : ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kategori_slug'); ?>
                                            </div>
                                        <?php endif; ?>


                                    </div>
                                </div>


                                <div class="mb3">
                                    <label for="deskripsi">Deskripsi Produk</label>
                                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control <?= $validation->hasError('deskripsi') ? 'is-invalid' : null  ?>" required><?= old('deskripsi') ?></textarea>

                                    <?php if ($validation->hasError('deskripsi')) : ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('deskripsi'); ?>
                                        </div>
                                    <?php endif; ?>

                                </div>


                                <div class="mb3">
                                    <label for="gambar_produk">Gambar Produk</label>
                                    <small for="gambar_slider">*max upload 5mb</small>
                                    <input type="file" name="gambar_produk" id="gambar_produk" class="form-control <?= $validation->hasError('gambar_produk') ? 'is-invalid' : null ?>" onchange="previewImg()">

                                    <?php if ($validation->hasError('gambar_produk')) : ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('gambar_produk'); ?>
                                        </div>
                                    <?php endif; ?>

                                    <img src="" alt="" class="preview-img mt-2" width="100px">
                                </div>

                                <div class="justify-content-end d-flex">
                                    <button class="btn btn-primary btn-sm mt-4">Tambah</button>
                                </div>

                            </form>

                            <div class="table-responsive">

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


<?= $this->Section('script'); ?>
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('deskripsi');
</script>
<script>
    function validateForm() {
        const gambar = document.querySelector('#gambar_produk');
        const file = gambar.files[0];
        const fileSize = file.size / 1024 / 1024; // Convert to MB

        if (fileSize > 5) {
            alert('Ukuran gambar melebihi 5MB. Silakan pilih gambar dengan ukuran lebih kecil.');
            return false;
        }

        return true;
    }

    function previewImg() {
        const gambar = document.querySelector('#gambar_produk');
        const imgPreview = document.querySelector('.preview-img');

        const fileGambar = new FileReader();
        fileGambar.readAsDataURL(gambar.files[0]);

        fileGambar.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>
<?= $this->endSection(); ?>
