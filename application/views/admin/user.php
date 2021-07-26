<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>User</h5>
                    </div>
                    <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="row">
                            <div class="col-lg-8">
                            </div>
                            <div class="col-lg-4">
                            
                                <form action="" method="post" encytype="multipart/form-data">
                                    <div class="input-group mb-3">
                                    
                                        <input type="text" class="form-control" name="search" placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive">
                        
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Telp</th>
                                        <th>Alamat</th>
                                        <th>Role ID</th>
                                        <th><i class="fa fa-cogs"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach($user as $us) :
                                    ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $us['nama']; ?></td>
                                        <td><?= $us['username']; ?></td>
                                        <td><?= $us['email']; ?></td>
                                        <td><?= $us['telp']; ?></td>
                                        <td><?= $us['alamat']; ?></td>
                                        <td>
                                            <?php
                                                foreach($role_id as $rl) {
                                                    if($rl['id_rld'] == $us['role_id']) {
                                                        echo ucfirst($rl['role_id']);
                                                    }
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url('admin/user/del/').$us['id_user']; ?>" onclick="return confirm('Yakin?');" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                <a href="<?= base_url('admin/user/edit/').$us['id_user']; ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                                <a href="<?= base_url('admin/user/changepassword/').$us['id_user']; ?>" class="btn btn-warning"><i class="fa fa-lock"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php if(empty($user)) : ?>
                                        <tr>
                                            <td colspan="8" class="text-center">Data tidak ditemukan!</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>