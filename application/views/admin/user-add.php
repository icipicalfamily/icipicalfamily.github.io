<section class="content">
	<div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Tambah User</h5>
                    </div>
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama">
                                <?= form_error('nama', '<small class="text-danger pl-1">','</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Masukan Username">
                                <?= form_error('username', '<small class="text-danger pl-1">','</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Masukan Email">
                                <?= form_error('email', '<small class="text-danger pl-1">','</small>'); ?>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password1" class="form-control" placeholder="Masukan Password">
                                        <?= form_error('password1', '<small class="text-danger pl-1">','</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Ulangi Password</label>
                                        <input type="password" name="password2" class="form-control" placeholder="Ulangi Password">
                                        <?= form_error('password2', '<small class="text-danger pl-1">','</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label>Telp</label>
                                <input type="text" name="telp" class="form-control" placeholder="Masukan Telp">
                                <?= form_error('telp', '<small class="text-danger pl-1">','</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" placeholder="Masukan Alamat"></textarea>
                                <?= form_error('alamat', '<small class="text-danger pl-1">','</small>'); ?>
                            </div>
                            
                            <div class="form-group">
                                <label>Role ID</label>
                                <select name="role_id" class="form-control">
                                    <option value="">Pilih Role ID</option>
                                    <?php foreach($role_id as $rl) : ?>
                                    <option value="<?= $rl['id_rld'] ?>"><?= ucfirst($rl['role_id']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('role_id', '<small class="text-danger pl-1">','</small>'); ?>
                            </div>

                            <button class="btn btn-primary"><i class="fa fa-pencil"></i> Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>