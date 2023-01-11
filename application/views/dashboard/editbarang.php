<?php
$data['title'] = 'Barang';
$this->view('templates/dsheader', $data); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit data barang</h1>
    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Barang</h6>
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
            <form action="<?= base_url('dashboard/updatebarang'); ?>" method="post">
                <div class="card-body">
                    <div class="mb-3">
                        <input type="hidden" class="form-control" name="idBarang" value="<?= $barang['idBarang']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" name="nama" value="<?= $barang['namaBarang']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Harga</label>
                        <input type="number" class="form-control" name="harga" value="<?= $barang['harga']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Stok</label>
                        <input type="number" class="form-control" name="stok" value="<?= $barang['stok']; ?>" required>

                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Supplier</label>
                        <div>
                            <select class="form-select form-control" name="idSupplier">
                                <option selected value="<?= $barang['idSupplier']; ?>">Pilih</option>
                                <?php foreach ($supplier as $s) : ?>
                                    <option value="<?= $s['idSupplier'] ?>"><?= $s['namaSupplier']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="float-md-right">
                        <a class="btn btn-secondary mb-3" href="<?= base_url('dashboard/barang'); ?>">Kembali</a>
                        <button class="btn btn-primary mb-3" type="submit" name="kirim">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Pie Chart -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php $this->view('templates/dsfooter'); ?>