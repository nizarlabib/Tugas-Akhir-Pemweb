<?php
$data['title'] = 'Profile';
$this->view('templates/dsheader', $data); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">My Profile</h1>
    <?php echo $this->session->flashdata('message');
    unset($_SESSION['message']); ?>
    <!-- Area Chart -->
    <div class="col-xl-7 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="text-center"><img class="rounded-circle float-center" style="width: 10rem;" src="<?= base_url('assets/img/default.jpg'); ?>" alt="Card image cap"></div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Nama User</th>
                                <td><?= $user['name']; ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?= $user['email']; ?></td>
                            </tr>
                            <tr>
                                <th>No Telepon</th>
                                <td><?= $user['noHp']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="float-md-right">
                        <a type="button" class="btn btn-warning mt-2" href="<?= base_url('dashboard/updateprofile'); ?>">Edit Profile</a>

                        <a type="buton" class="btn btn-secondary mt-2" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php $this->view('templates/dsfooter'); ?>