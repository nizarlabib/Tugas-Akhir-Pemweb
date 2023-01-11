<?php
$data['title'] = 'Transaksi';
$this->view('templates/dsheader', $data); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah data transaksi</h1>
    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Transaksi</h6>
            </div>
            <!-- Card Body -->
            <form action="<?= base_url('dashboard/addtransaksi'); ?>" method="post">
                <div class="card-body">

                    <!-- <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Total Transaksi</label>
                        <input type="text" class="form-control" name="total" id="formGroupExampleInput2">
                    </div> -->
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Barang</label>
                        <div>
                            <select class="form-select form-control" name="idBarang" required>
                                <option selected value="">Pilih</option>
                                <?php foreach ($barang as $b) : ?>
                                    <option value="<?= $b['idBarang'] ?>"><?= $b['namaBarang']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="hidden" class="form-control" name="idUser" value="<?= $this->session->userdata('id'); ?>">
                    </div>
                    <div class="float-md-right">
                        <a class="btn btn-secondary mb-3" href="<?= base_url('dashboard/transaksi') ?>">Kembali</a>
                        <button type="submit" name="kirim" class="btn btn-primary mb-3">Tambah</button>
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