<?php
$data['title'] = 'Supplier';
$this->view('templates/dsheader', $data); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Detail Supplier</h1>
    <!-- Area Chart -->
    <div class="col-xl-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Detail <?= $supplier['namaSupplier']; ?></h6>
                <!-- <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div> -->
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>ID Supplier</th>
                            <td><?= $supplier['idSupplier']; ?></td>
                        </tr>
                        <tr>
                            <th>Nama Supplier</th>
                            <td><?= $supplier['namaSupplier']; ?></td>
                        </tr>
                        <tr>
                            <th>No Telepon</th>
                            <td><?= $supplier['noHp']; ?></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td><?= $supplier['alamat']; ?></td>
                        </tr>
                    </tbody>
                </table>

                <a type="button" class="btn btn-secondary mt-2 float-md-right" href="<?= base_url('dashboard/supplier'); ?>">Kembali</a>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php $this->view('templates/dsfooter'); ?>