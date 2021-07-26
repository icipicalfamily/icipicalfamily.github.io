<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Transaksi</h5>
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
                                        <th>ID Invoices</th>
                                        <th>Date</th>
                                        <th>Du Date</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th><i class="fa fa-cogs"></i></th>
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
                                        <td>
                                            <?php 
                                                foreach($user as $us) {
                                                    if($us['id_user'] == $iv['id_user']) {
                                                        echo ucfirst($us['username']);
                                                    }
                                                }
                                            ?>
                                        </td>   
                                        <td><?= $iv['status']; ?></td>  
                                          
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url('admin/transaksi/del/').$iv['id']; ?>" onclick="return confirm('Yakin?');" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                <a href="<?= base_url('admin/transaksi/proses/').$iv['id']; ?>" class="btn btn-success"><i class="fa fa-money"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php if(empty($invoices)) : ?>
                                        <tr>
                                            <td colspan="8" class="text-center">Data tidak ditemukan!</td>
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