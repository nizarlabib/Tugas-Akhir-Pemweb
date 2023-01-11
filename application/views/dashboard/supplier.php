<?php
$data['title'] = 'Supplier';
$this->view('templates/dsheader', $data); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-2 text-gray-800">Data Supplier</h1>
        <a href="<?= base_url('dashboard/addsupplier'); ?>" class="btn btn-primary"><i class="fas fa-plus text-white-50"></i> Tambah Supplier</a>
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
                            <th>Nama supplier</th>
                            <th>No Telepon</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php $i = 1;
                    foreach ($supplier as $s) : ?>
                        <tbody>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $s['namaSupplier']; ?></td>
                                <td><?= $s['noHp']; ?></td>
                                <td><?= $s['alamat']; ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <a type="button" class="btn btn-success" href="<?= base_url('dashboard/detailsupplier/') ?><?= $s['idSupplier']; ?>">Detail</a>

                                        <a type="button" class="btn btn-warning" href="<?= base_url('dashboard/editsupplier/') ?><?= $s['idSupplier']; ?>">Edit</a>

                                        <a type="button" class="btn btn-danger" href="<?= base_url('dashboard/deletesupplier/') ?><?= $s['idSupplier']; ?>" data-toggle="modal" data-target="#deleteModal">Delete</a>
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

<!-- Delete supplier Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete supplier</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Anda yakin akan menghapus supplier ini?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
                <a class="btn btn-primary" href="<?= base_url('dashboard/deletesupplier/') ?><?= $s['idSupplier']; ?>">Hapus</a>
            </div>
        </div>
    </div>
</div>