<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Produk</h5>
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
                                        <th>Nama Produk</th>
                                        
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Gambar</th>
                                        <th>Deskripsi</th>
                                        <th>Waktu</th>
                                        <th><i class="fa fa-cogs"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach($produk as $pr) :
                                    ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $pr['nama_produk']; ?></td>
                                        
                                        <td><?= $pr['kategori']; ?></td>
                                        <td><?= $pr['harga']; ?></td>
                                        <td><?= $pr['stok']; ?></td>
                                        <td>
											<img src="<?= base_url('asset/img/produk/').$pr['gambar']; ?>" style="width: 100px;" class="img-fluid" alt="">
                                        </td>
										<td><?= substr($pr['deskripsi'],0,100); ?></td>
                                        <td><?= $pr['waktu']; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url('admin/produk/del/').$pr['id_produk']; ?>" onclick="return confirm('Yakin?');" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                <a href="<?= base_url('admin/produk/edit/').$pr['id_produk']; ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php if(empty($produk)) : ?>
                                        <tr>
                                            <td colspan="9" class="text-center">Data tidak ditemukan!</td>
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
