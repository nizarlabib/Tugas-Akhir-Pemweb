<?php
$data['title'] = 'Transaksi';
$this->view('templates/dsheader', $data); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-2 text-gray-800">Data Transaksi</h1>
        <a href="<?= base_url('dashboard/addtransaksi'); ?>" class="btn btn-primary"><i class="fas fa-plus text-white-50"></i> Tambah Transaksi</a>
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
                            <th>Tanggal Transaksi</th>
                            <th>Total Transaksi</th>
                            <th>Barang yang Dibeli</th>
                            <th>User</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <?php $i = 1;
                    foreach ($transaksi as $t) : ?>
                        <tbody>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $t['tglTransaksi']; ?></td>
                                <td><?= $t['total']; ?></td>
                                <td><?= $t['namaBarang']; ?></td>
                                <td><?= $t['name']; ?></td>
                                <!-- <td>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <a type="button" class="btn btn-success" href="<?= base_url('dashboard/detailtransaksi/'); ?><?= $t['idTransaksi']; ?>">Detail</a>
                                    </div>
                                </td> -->
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