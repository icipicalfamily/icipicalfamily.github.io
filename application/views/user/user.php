<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>User</h1>
            <?= $this->session->flashdata('message'); ?>
            <table class="table">
                <tr>
                    <th>Nama</th>
                    <th>:</th>
                    <td><?= $usx['nama']; ?></td>
                </tr>
                <tr>
                    <th>Username</th>
                    <th>:</th>
                    <td><?= $usx['username']; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <th>:</th>
                    <td><?= $usx['email']; ?></td>
                </tr>
                <tr>
                    <th>Telp</th>
                    <th>:</th>
                    <td><?= $usx['telp']; ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <th>:</th>
                    <td><?= $usx['alamat']; ?></td>
                </tr>
            </table>
            <div class="btn-group">
                <a href="<?= base_url('user/edit'); ?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit Profile</a>
                <a href="<?= base_url('user/changepassword'); ?>" class="btn btn-warning"><i class="fa fa-lock"></i> Ganti Password</a>
            </div>
        </div>
    </div>
</div>