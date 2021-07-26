<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1>User</h1>
			<?= $this->session->flashdata('message'); ?>
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label>Password Lama</label>
					<input type="password" name="password_lama" class="form-control" placeholder="Password Lama">
					<?= form_error('password_lama', '<small class="text-danger pl-1">','</small>'); ?>
				</div>
				<div class="form-group">
					<label>Password Baru</label>
					<input type="password" name="password1" class="form-control" placeholder="Password Baru">
					<?= form_error('password1', '<small class="text-danger pl-1">','</small>'); ?>
				</div>
				<div class="form-group">
					<label>Ulangi Password</label>
					<input type="password" name="password2" class="form-control" placeholder="Ulangi Password Baru">
					<?= form_error('password2', '<small class="text-danger pl-1">','</small>'); ?>
				</div>


				<button class="btn btn-warning"><i class="fa fa-edit"></i> Ganti</button>
		</div>
	</div>
</div>