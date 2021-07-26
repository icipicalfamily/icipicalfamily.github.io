<section class="content">
	<div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Proses Transaksi</h5>
                    </div>
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="table-responsive">
                                    
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
                                                    <th colspan="6" class="text-right">Ongkir</th>
                                                    <td><?= 'Rp '.number_format($invoices['ongkir'],0,',','.'); ?></td>
                                            </tr>
                                            <tr>
                                                    <th colspan="6" class="text-right">Total</th>
                                                    <td><?= 'Rp '.number_format($total_akhir,0,',','.'); ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <label>Bukti Transfer</label>
                            <br>
                            <?php if(empty($invoices['bukti_transfer'])) : ?>
                            <p class="text-danger">Belum ada</p>
                            
                            <?php else: ?>
                            <a target="_blank" href="<?= base_url('asset/img/bukti_transfer/').$invoices['bukti_transfer']; ?>">     
                                  <img style="width: 500px" src="<?= base_url('asset/img/bukti_transfer/').$invoices['bukti_transfer']; ?>" class="img-fluid img-thumbnail">
                            </a>

                            <?php endif; ?>
                            <br><br>
                            <div class="form-group">
                                <label>No Resi</label>
                                <input type="text" name="no_resi" class="form-control" placeholder="Masukan No Resi" value="<?= $invoices['no_resi']; ?>">
                                <?= form_error('no_resi', '<small class="text-danger pl-1">','</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Jasa Pengiriman</label>
                                <input type="text" name="jasa_pengiriman" class="form-control" placeholder="Masukan Jasa Pengiriman" value="<?= $invoices['jasa_pengiriman']; ?>">
                                <?= form_error('jasa_pengiriman', '<small class="text-danger pl-1">','</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Ongkir</label>
                                <input type="number" name="ongkir" class="form-control" placeholder="Masukan Ongkir" value="<?= $invoices['ongkir']; ?>">
                                <?= form_error('ongkir', '<small class="text-danger pl-1">','</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="">Pilih Status</option>
                                    <?php foreach($status as $st) : ?>
                                    <?php if($st == $invoices['status']) : ?>
                                        <option value="<?= $st ?>" selected><?= ucfirst($st); ?></option>
                                    <?php else :?> 
                                        <option value="<?= $st ?>"><?= ucfirst($st); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('status', '<small class="text-danger pl-1">','</small>'); ?>
                            </div>
                     

                            <button class="btn btn-success"><i class="fa fa-pencil"></i> Proses</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
