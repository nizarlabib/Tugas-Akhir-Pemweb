<?php
$data['title'] = 'Barang';
$this->view('templates/dsheader', $data); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-2 text-gray-800">Data Barang</h1>
        <a href="<?= base_url('dashboard/addbarang'); ?>" class="btn btn-primary"><i class="fas fa-plus text-white-50"></i> Tambah Barang</a>
    </div>
    <?php echo $this->session->flashdata('message');
    unset($_SESSION['message']); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama barang</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Supplier</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php $i = 1;
                    foreach ($barang as $b) : ?>
                        <tbody>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $b['namaBarang']; ?></td>
                                <td><?= $b['harga']; ?></td>
                                <td><?= $b['stok']; ?></td>
                                <td><?= $b['namaSupplier']; ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <a type="button" class="btn btn-success" href="<?= base_url('dashboard/detailbarang/') ?><?= $b['idBarang']; ?>">Detail</a>

                                        <a type="button" class="btn btn-warning" href="<?= base_url('dashboard/editbarang/') ?><?= $b['idBarang']; ?>">Edit</a>

                                        <a type="button" class="btn btn-danger" href="<?= base_url('dashboard/deletebarang/') ?><?= $b['idBarang']; ?>" data-toggle="modal" data-target="#deleteModal">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    <?php $i++;
                    endforeach; ?>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php $this->view('templates/dsfooter'); ?>
<!-- Delete barang Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete barang</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Anda yakin akan menghapus barang ini?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
                <a class="btn btn-primary" href="<?= base_url('dashboard/deletebarang/') ?><?= $b['idBarang']; ?>">Hapus</a>
            </div>
        </div>
    </div>
</div>