<section class="content">
	<div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Promo</h5>
                    </div>
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama Promo</label>
                                <input type="text" name="nama_promo" class="form-control" placeholder="Masukan Nama Promo" value="<?= $promo['nama_promo']; ?>">
                                <?= form_error('nama_promo', '<small class="text-danger pl-1">','</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Gambar</label>
                                <input id="fileUpload" type="file" name="gambar" class="form-control">
                                <div id="image-holder"> 
                                <img id="preview-img" class="img-fluid img-thumbnail img-cal" src="<?= base_url('asset/img/promo/').$promo['gambar']; ?>" alt="">
                                </div>
                            </div>
                            <button class="btn btn-warning"><i class="fa fa-edit"></i> Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>