<?php
$data['title'] = 'User';
$this->view('templates/dsheader', $data); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Status User</h1>
    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">User <?= $user['name']; ?></h6>
            </div>
            <!-- Card Body -->
            <form action="<?= base_url('dashboard/updateuser'); ?>" method="post">
                <div class="card-body">

                    <!-- <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Total Transaksi</label>
                        <input type="text" class="form-control" name="total" id="formGroupExampleInput2">
                    </div> -->
                    <input type="hidden" class="form-control" name="id" value="<?= $user['id']; ?>">
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Edit status</label>
                        <div>
                            <select class="form-select form-control" name="active">
                                <option selected value="<?= $user['is_active']; ?>">Pilih</option>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="hidden" class="form-control" name="idUser" value="<?= $this->session->userdata('id'); ?>">
                    </div>
                    <div class="float-md-right">
                        <a class="btn btn-secondary mb-3" href="<?= base_url('dashboard/user') ?>">Kembali</a>
                        <button type="submit" name="kirim" class="btn btn-primary mb-3">Edit</button>
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