<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1>Detail Transaksi</h1>
            <div class="alert alert-secondary" role="alert">
              <h4 class="alert-heading">Tata Cara Pembayaran</h4>
              <ol>
                <li>Tunggu keluar Tarif Ongkir</li>
                <li>Selanjutnya Lakukan Pembayaran ke rekening xxxx</li>
                <li>Setelah melakukan transaksi upload bukti transfer di halaman detail Transaksi</li>
                <li>Bukti transfer dalam gambar dengan format <strong>.JPG, .PNG</strong> dengan minimal ukuran sebesar 1 MB</li>
              </ol>
              <p class="mb-0"> <strong>Note :</strong> Jika ada pertanyaan perihal proses pembayaran dapat menghubungi Deny WA : <a class="btn btn-link text-dark" href="https://wa.me/62585607202024"> <strong>+(62) 856-0720-2024</strong></a></p>
            </div>
			<table class="table">
				<tr>
					<th>Nama</th>
					<td>:</td>
					<td><?= $invoices['nama']; ?></td>
				</tr>
				<tr>
					<th>Username</th>
					<td>:</td>
					<td><?= $invoices['username']; ?></td>
				</tr>
				<tr>
					<th>Email</th>
					<td>:</td>
					<td><?= $invoices['email']; ?></td>
				</tr>
				<tr>
					<th>Telp</th>
					<td>:</td>
					<td><?= $invoices['telp']; ?></td>
				</tr>
				<tr>
					<th>Alamat</th>
					<td>:</td>
					<td><?= $invoices['alamat']; ?></td>
				</tr>
				<tr>
				    <th>Status</th>
				    <td>:</td>
				    <td><?= $invoices['status']; ?></td>
				</tr>
				<tr>
					<th>#</th>
					<th>Produk</th>
					<th>Harga</th>
					<th>Jenis</th>
					
					<th>Jumlah</th>
					<th>Subtotal</th>
				</tr>
				<?php
                                            $no = 1;
                                            $ci =& get_instance();
                                            $subtotal = 1;
                                            $total = 0;
                                            $total_akhir = 0;
                                            foreach($transaksi as $tr) :
                                            $produk = $ci->MyModel->getProdukByID($tr['id_produk']);
                                            $subtotal = $tr['jml'] * $produk['harga'];
                                            $total += $subtotal;
                                            $total_akhir = $total + $invoices['ongkir'];
                                        ?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $produk['nama_produk']; ?></td>
					<td><?= 'Rp '.number_format($produk['harga'],0,',','.'); ?></td>
					<td><?= $produk['kategori']; ?></td>
					
					<td><?= $tr['jml']; ?></td>
					<td><?= 'Rp '.number_format($subtotal,0,',','.');  ?></td>
				</tr>
				<?php endforeach; ?>
				<tr>
					<th colspan="5" class="text-right">Ongkir</th>
					<td><?= 'Rp '.number_format($invoices['ongkir'],0,',','.'); ?></td>
				</tr>
				<tr>
					<th colspan="5" class="text-right">Total</th>
					<td><?= 'Rp '.number_format($total_akhir,0,',','.'); ?></td>
				</tr>
			</table>
            <h4 class="mt-2">Pengiriman</h4>
            <table class="table">
                <tr>
                    <th>No Resi</th>
                    <th>:</th>
                    <td><?= $invoices['no_resi']; ?></td>
                </tr>
                <tr>
                    <th>Jasa Pengiriman</th>
                    <th>:</th>
                    <td><?= $invoices['jasa_pengiriman']; ?></td>
                </tr>
                <tr>
                    <th>Ongkir</th>
                    <th>:</th>
                    <td><?= 'Rp '.number_format($invoices['ongkir'],0,',','.'); ?></td>
                </tr>
				
            </table>
            <form class="mt-5" action="<?= base_url('transaksi/upload_bukti'); ?>" method="post" enctype="multipart/form-data">
            
                <div class="form-group">
                    <h4>Bukti Transfer</h4>
                    <?= $this->session->flashdata('message'); ?>
                    <input type="hidden" name="id" value="<?= $invoices['id']; ?>">
                    <input id="fileUpload" type="file" name="bukti_transfer" class="form-control">
                    <div id="image-holder">
                        <img id="preview-img" class="img-fluid img-thumbnail img-cal"
                            src="<?= base_url('asset/img/bukti_transfer/').$invoices['bukti_transfer']; ?>" alt="">
                    </div>
                </div>
                <button type="submit" class="btn btn-dark">Upload Bukti Transfer</button>
            </form>

            
		</div>
	</div>
</div>

