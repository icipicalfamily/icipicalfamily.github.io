
	<!-- Footer -->
	<?php if($this->uri->segment(1) == 'transaksi' || $this->uri->segment(1) == 'user') : ?>
	<footer>
		<div class="container">
			<p class="m-0 text-center text-dark">Copyright &copy; iCAPiCIP <?= date('Y'); ?></p>
		</div>
		<!-- /.container -->
	</footer>
	<?php else : ?>
	<footer class="py-5">
		<div class="container">
			<p class="m-0 text-center text-dark">Copyright &copy; iCAPiCIP <?= date('Y'); ?></p>
		</div>
		<!-- /.container -->
	</footer>

	<?php endif; ?>


	<div class="modal fade" id="myCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;Keranjang Belanja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>


            </div>
            
                <div class="modal-body">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Produk</th>
								<th>Jenis</th>
								<th>Jumlah</th>
								<th>Harga</th>
								<th>Subtotal</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$nc = 1;
								foreach($this->cart->contents() as $items) :
							?>
							<tr>
								<td><?= $nc++; ?></td>
								<td><?= ucfirst($items['name']); ?></td>
								<td><?= $items['type'];  ?></td>
								
								<td><?= $items['qty']; ?></td>
								<td><?= 'Rp '.number_format($items['price'],0,',','.'); ?></td>
								<td><?= 'Rp '.number_format($items['subtotal'],0,',','.'); ?></td>
							</tr>
							<?php endforeach; ?>
							<?php if(empty($this->cart->contents())) : ?>
								<tr>
									<td colspan="6" class="text-center">Keranjang Kosong</td>
								</tr>
							<?php endif; ?>
							<tr>
								<th class="text-right" colspan="5">Total : </th>
								<td>
									Rp <?= number_format($this->cart->total(),0,',','.'); ?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php if(!empty($this->cart->contents())) : ?>
                <div class="modal-footer">
                   <div class="text-center">
				   		<a onclick="return confirm('Yakin?')" href="<?= base_url('clear/cart'); ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus Cart</a>
						<a href="<?= base_url('order'); ?>" class="btn btn-success"><i class="fa fa-check"></i> Check Out </a>
				   </div>
				</div>
				<?php endif; ?>
         
        </div>
    </div>
</div>



	<!-- JavaScript files-->
	<script src="<?= base_url('asset/'); ?>vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('asset/'); ?>vendor/popper.js/umd/popper.min.js"> </script>
	<script src="<?= base_url('asset/'); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= base_url('asset/'); ?>vendor/jquery.cookie/jquery.cookie.js"> </script>
	<script src="<?= base_url('asset/'); ?>vendor/jquery-validation/jquery.validate.min.js"></script>
	<script src="<?= base_url('asset/'); ?>vendor/owlcarousel/js/owl.carousel.min.js"></script>
	<!-- Main File-->
	<script src="<?= base_url('asset/'); ?>js/front.js"></script>
	<script>
		$("#fileUpload").on('change', function () {

			if (typeof (FileReader) != "undefined") {

			var image_holder = $("#image-holder");
			image_holder.empty();

			var reader = new FileReader();
			reader.onload = function (e) {
				$("<img />", {
				"src": e.target.result,
				"class": "img-fluid img-thumbnail img-cal"
				
				}).appendTo(image_holder);

			}
			image_holder.show();
			reader.readAsDataURL($(this)[0].files[0]);
			} else {
				alert("This browser does not support FileReader.");
			}
		});
		$(document).ready(function () {
			$('.owl-carousel').owlCarousel({
        nav:true,
        autoplay:true,
        autoplayTimeout:5000,
        loop:true,
        autoWidth:true,
        items:5,
        responsive: {
            0: {
              items: 1
            },
            600: {
              items: 3
            },
            1000: {
              items: 5
            }
          }
    });
		});
	</script>
</body>

</html>
