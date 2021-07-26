<section class="content">
	<div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit User</h5>
                    </div>
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" value="<?= $user['nama']; ?>">
                                <?= form_error('nama', '<small class="text-danger pl-1">','</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Masukan Username" value="<?= $user['username']; ?>">
                                <?= form_error('username', '<small class="text-danger pl-1">','</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Masukan Email" value="<?= $user['email']; ?>">
                                <?= form_error('email', '<small class="text-danger pl-1">','</small>'); ?>
                            </div>
                            
                            <div class="form-group">
                                <label>Telp</label>
                                <input type="text" name="telp" class="form-control" placeholder="Masukan Telp" value="<?= $user['telp']; ?>">
                                <?= form_error('telp', '<small class="text-danger pl-1">','</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" placeholder="Masukan Alamat"><?= $user['alamat']; ?></textarea>
                                <?= form_error('alamat', '<small class="text-danger pl-1">','</small>'); ?>
                            </div>
                            
                            <div class="form-group">
                                <label>Role ID</label>
                                <select name="role_id" class="form-control">
                                    <option value="">Pilih Role ID</option>
                                    <?php foreach($role_id as $rl) : ?>
                                    <?php if($user['role_id'] == $rl['id_rld']) : ?>
                                        <option value="<?= $rl['id_rld'] ?>" selected><?= ucfirst($rl['role_id']); ?></option>
                                    <?php else : ?>
                                        <option value="<?= $rl['id_rld'] ?>"><?= ucfirst($rl['role_id']); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('role_id', '<small class="text-danger pl-1">','</small>'); ?>
                            </div>

                            <button class="btn btn-info"><i class="fa fa-edit"></i> Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>