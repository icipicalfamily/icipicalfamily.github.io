<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>Transaksi</h1>
            <div class="alert alert-secondary" role="alert">
              <h4 class="alert-heading">Tata Cara Pembayaran</h4>
              <ol>
                <li>Tunggu keluar Tarif Ongkir</li>
                <li>Selanjutnya Lakukan Pembayaran ke rekening xxxx</li>
                <li>Setelah melakukan transaksi upload bukti transfer di halaman detail Transaksi</li>
                <li>Bukti transfer dalam gambar dengan format <strong>.JPG, .PNG</strong> dengan minimal ukuran sebesar 1 MB</li>
              </ol>
              <p class="mb-0"> <strong>Note :</strong> Jika ada pertanyaan perihal proses pembayaran dapat menghubungi Monica WA : <a class="btn btn-success" href="https://wa.me/6282274151034"> <strong><i class="fa fa-whatsapp"></i> +(62) 62 822-7415-1034</strong></a></p>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID Invoices</th>
                        <th>Date</th>
                        <th>Du Date</th>
                        <th>Status</th>
                        <th><i class="fa fa-cogs"></i></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        foreach($invoices as $iv) :
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $iv['id']; ?></td>
                        <td><?= $iv['date']; ?></td>
                        <td><?= $iv['du_date']; ?></td>
                        <td><?= $iv['status']; ?></td>
                        <td>
                            <a href="<?= base_url('transaksi/detail/').$iv['id']; ?>" class="btn btn-dark"><i class="fa fa-pencil"></i> Detail Transaksi</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
