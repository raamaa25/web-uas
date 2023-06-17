<!-- render halaman -->
<?= $this->extend('admin/layout/template') ?>

<?= $this->Section('style'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?= $this->endSection(); ?>

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
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Produk</h6>
                        </div>
                        <div class="card-body">
                            <!-- Button trigger modal -->
                            <a href="<?= base_url('daftar-produk/tambah'); ?>" class="btn btn-primary btn-sm mb-4">
                                <i class="fas fa-plus"></i> Tambah
                            </a>

                            <!-- Notifikasi berhasil -->
                            <div class="swal" data-swal="<?= session('success') ?>"></div>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Kategori</th>
                                            <th>Tanggal Input</th>
                                            <th>Fungsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($daftar_produk as $produk): ?>
                                            <tr>
                                                <td>
                                                    <?= $no++; ?>
                                                </td>
                                                <td>
                                                    <?= $produk->nama_produk; ?>
                                                </td>
                                                <td>
                                                    <?= $produk->kategori_slug; ?>
                                                </td>
                                                <td>
                                                    <?= date('d/m/Y H:i:s', strtotime($produk->tanggal_input)); ?>
                                                </td>
                                                <td width="20%" class="text-center">

                                                    <a href="<?= base_url('daftar-produk/detail-produk/' . $produk->id_produk) ?>"
                                                        class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i>
                                                        Detail</a>

                                                    <a href="<?= base_url('daftar-produk/ubah/' .
                                                        $produk->id_produk) ?>" class="btn btn-success 
                                                    btn-sm"><i class="fas fa-edit"></i> Ubah</a>

                                                    <!-- <button type="button" class="btn btn-danger btn-sm"><i class="fas 
                                                    fa-trash-alt"></i> Hapus</button> -->
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="hapus('<?= $produk->id_produk; ?>')"><i class="fa fa-trash-alt"></i> Hapus</button>


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

<?= $this->Section('script'); ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const swal = $('.swal').data('swal');

    if (swal) {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: swal,
            showConfirmButton: false,
            timer: 1900
        })
    }

//     function hapus(id_produk) {
//         Swal.fire({
//             title: 'Hapus',
//             text: "Yakin Data Produk Akan Dihapus ?",
//             icon: 'question',
//             showCancelButton: true,
//             confirmButtonColor: '#d33', 
//             cancelButtonColor: '#3085d6',
//             cancelButtonText: 'Batal',
//             confirmButtonText: 'Hapus'
//         }).then((result) => {
//              $.ajax({
//                 type: 'POST',
//                 url: '<?= base_url("daftar-produk/delete-produk"); ?>',
//                 data: {
//                     // _method: 'delete',
//                     <?= csrf_token()?>: "<?= csrf_hash(); ?>",
//                     id_produk: id_produk
//                 },
//                 dataType: 'json',
//                 success: function(response) {
//                     if (response.success) {
//                         Swal.fire({
//                             icon: 'success',
//                             title: 'Berhasil',
//                             text: response.success, 
//                             // showConfirmButton: true,
//                             // timer: 1900
//                         }).then((result) => {
//                             if (result.value) {
//                                 window.location.href = "<?= base_url('daftar-produk'); ?>"
//                             }

//                         })

//                 }
//             }
//         })


// //             if (result.isConfirmed) {
// //     Swal.fire(
// //       'Terhapus!',
// //       'Telah Berhasil Dihapus.',
// //       'success'
// //     )
// //   }
// })

//     }

function hapus(id_produk) {
    Swal.fire({
        title: 'Hapus',
        text: "Yakin Data Produk Akan Dihapus ?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#d33', 
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'POST',
                url: '<?= base_url("daftar-produk/delete-produk"); ?>',
                data: {
                    _method: 'delete',
                    <?= csrf_token()?>: "<?= csrf_hash(); ?>",
                    id_produk: id_produk
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.success
                        }).then(() => {
                            window.location.href = "<?= base_url('daftar-produk'); ?>";
                        });
                    }
                }
            });
        }
    });
    
    return false;
}




</script>
<?= $this->endSection(); ?>