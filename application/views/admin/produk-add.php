<section class="content">
	<div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Tambah Produk</h5>
                    </div>
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama Produk</label>
                                <input type="text" name="nama_produk" class="form-control" placeholder="Masukan Nama Produk">
                                <?= form_error('nama_produk', '<small class="text-danger pl-1">','</small>'); ?>
                            </div>
                           
                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="kategori" class="form-control">
                                    <option value="">Pilih Kategori</option>
                                    <?php foreach($kategori as $kt) : ?>
                                    <option value="<?= $kt['kategori'] ?>"><?= strtoupper($kt['kategori']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('kategori', '<small class="text-danger pl-1">','</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="number" name="harga" class="form-control" placeholder="Masukan Harga">
                                <?= form_error('harga', '<small class="text-danger pl-1">','</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Stok</label>
                                <input type="number" name="stok" class="form-control" placeholder="Masukan Stok">
                                <?= form_error('stok', '<small class="text-danger pl-1">','</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Gambar</label>
                                <input id="fileUpload" type="file" name="gambar" class="form-control">
                                <div id="image-holder"> </div>
                            </div>
							<div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" id="editor1" class="form-control" placeholder="Masukan Deskripsi Produk"></textarea>
                                <?= form_error('deskripsi', '<small class="text-danger pl-1">','</small>'); ?>
                            </div>
                            <button class="btn btn-primary"><i class="fa fa-pencil"></i> Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="<?= base_url('asset/js/ckeditor/ckeditor.js'); ?>"></script>
<script>
	CKEDITOR.replace( 'editor1' );
</script>
