<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Promo</h5>
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
                                        <th>Nama Promo</th>
                                        <th>Gambar</th>
                                        <th>Waktu</th>
                                        <th><i class="fa fa-cogs"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach($promo as $pm) :
                                    ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $pm['nama_promo']; ?></td>
                                        <td>
                                            <img src="<?= base_url('asset/img/promo/').$pm['gambar']; ?>" style="width: 100px;" class="img-fluid" alt="">
                                        </td>
                                        <td><?= $pm['waktu']; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url('admin/promo/del/').$pm['id_promo']; ?>" onclick="return confirm('Yakin?');" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                <a href="<?= base_url('admin/promo/edit/').$pm['id_promo']; ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php if(empty($promo)) : ?>
                                        <tr>
                                            <td colspan="5" class="text-center">Data tidak ditemukan!</td>
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