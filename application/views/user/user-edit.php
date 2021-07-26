<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1>User</h1>
			<?= $this->session->flashdata('message'); ?>
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label>Nama</label>
					<input type="text" name="nama" class="form-control" placeholder="Masukan Nama"
						value="<?= $usx['nama']; ?>">
					<?= form_error('nama', '<small class="text-danger pl-1">','</small>'); ?>
				</div>
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" class="form-control" placeholder="Masukan Username"
						value="<?= $usx['username']; ?>">
					<?= form_error('username', '<small class="text-danger pl-1">','</small>'); ?>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="email" class="form-control" placeholder="Masukan Email"
						value="<?= $usx['email']; ?>">
					<?= form_error('email', '<small class="text-danger pl-1">','</small>'); ?>
				</div>

				<div class="form-group">
					<label>Telp</label>
					<input type="text" name="telp" class="form-control" placeholder="Masukan Telp"
						value="<?= $usx['telp']; ?>">
					<?= form_error('telp', '<small class="text-danger pl-1">','</small>'); ?>
				</div>

				<div class="form-group">
					<label>Alamat</label>
					<textarea name="alamat" class="form-control"
						placeholder="Masukan Alamat"><?= $usx['alamat']; ?></textarea>
					<?= form_error('alamat', '<small class="text-danger pl-1">','</small>'); ?>
				</div>

                <button type="submit" class="btn btn-info"> <i class="fa fa-edit"></i> Edit Profile</button>
            </form>
		</div>
	</div>
</div>