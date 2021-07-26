<!-- Page Content -->
<div class="container">
	<?= $this->session->flashdata('message'); ?>
	<div class="row p-2">
		<div class="owl-carousel owl-theme">
			<?php foreach($promo as $pm) : ?>
			<div class="item" style="width: 100rem; height: 20rem;">
				<img style="width: 100rem; height: 20rem;" src="<?= base_url('asset/img/promo/').$pm['gambar'] ?>"
					class="img-fluid" alt="">
			</div>
			<?php endforeach; ?>
		</div>
	</div>
	<br><br>
	<div class="row">
		<?php foreach($produk as $pd) : ?>
		<div class="col-lg-4 col-md-6 mb-4">
			<div class="card h-100">
				<a href="" data-toggle="modal" data-target="#myModal<?= $pd['id_produk']; ?>"><img
						class="card-img-top img-prod" src="<?= base_url('asset/img/produk/').$pd['gambar']; ?>"
						alt=""></a>
				<div class="card-body">
					<h4 class="card-title">
						<a href="" data-toggle="modal" data-target="#myModal<?= $pd['id_produk']; ?>"
							class="text-dark"><?= ucfirst($pd['nama_produk']); ?></a>
					</h4>
					<h5 class="text-secondary"><?= 'Rp. '.number_format($pd['harga'],0,',','.'); ?></h5>
					<p class="card-text">
						<?= strtoupper($pd['kategori']); ?>
					</p>
				</div>
				<div class="card-footer bg-white text-center">
					<?php if(!$this->session->userdata('id_user')) : ?>
					<a href="<?= base_url('login') ?>" class="btn btn-secondary"><i
							class="fa fa-shopping-cart"></i> Add Cart</a>
					<?php else: ?>
					<a href="<?= base_url('add/cart/').$pd['id_produk']; ?>" class="btn btn-secondary"><i
							class="fa fa-shopping-cart"></i> Add Cart</a>
					<?php endif; ?>
						
				</div>
			</div>
		</div>
		<?php endforeach; ?>
		<?php if(empty($produk)) : ?>
		<div class="col-lg-12">
			<h1 class="text-center" style="font-size: 200px;">404</h1>
			<h1 class="text-center" style="margin-bottom: 20rem;">Produk tidak ditemukan!</h1>
		</div>
		<?php endif; ?>


	</div>
	<!-- /.row -->



</div>
<!-- /.row -->

</div>
<!-- /.container -->

<?php foreach($produk as $pd) : ?>
<div class="modal fade" id="myModal<?= $pd['id_produk'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><?= $pd['nama_produk']; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>


            </div>
            
                <div class="modal-body">
                    <div class="text-center">
                    
                    <img src="<?= base_url('asset/img/produk/').$pd['gambar']; ?>" alt="" class="img-thumbnail">
                    </div>


                    <table class="table mt-3">
                        <tr>
                            <th>Jenis</th>
                            <th>:</th>
                            <td><?= ucfirst($pd['kategori']); ?></td>
                        </tr>
                        
                        <tr>
                            <th>Stok</th>
                            <th>:</th>
                            <td><?= $pd['stok']; ?></td>
                        </tr>
                        <tr>
                            <th>Harga</th>
                            <th>:</th>
                            <td>Rp <?= number_format($pd['harga'],0,',','.'); ?></td>
                        </tr>
						<tr>
							<th colspan="3">Deskripsi</th>
						</tr>
						<tr>
							<td colspan="3"><?= $pd['deskripsi']; ?></td>
						</tr>
                    </table>
                   

                </div>
                <div class="modal-footer">
					<?php if(!$this->session->userdata('id_user')) : ?>
                    	<a href="<?= base_url('login') ?>" class="btn btn-secondary"><i class="fa fa-shopping-cart"></i> Add Cart</a>
					<?php else : ?>
                    	<a href="<?= base_url('add/cart/').$pd['id_produk']; ?>" class="btn btn-secondary"><i class="fa fa-shopping-cart"></i> Add Cart</a>
					<?php endif; ?>
                </div>
         
        </div>
    </div>
</div>
<?php endforeach; ?>
