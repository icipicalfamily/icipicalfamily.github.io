<!-- Page Footer-->
<footer class="main-footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <p>iCAPiCIP &copy; <?= date('Y'); ?></p>
                </div>
                <div class="col-sm-6 text-right">
                  <p>Design by <a href="<?= base_url(); ?>" class="external">iCAPiCIP</a></p>
                  <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="<?= base_url('asset/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('asset/'); ?>vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?= base_url('asset/'); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url('asset/'); ?>vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="<?= base_url('asset/'); ?>vendor/chart.js/Chart.min.js"></script>
    <script src="<?= base_url('asset/'); ?>vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?= base_url('asset/'); ?>js/charts-home.js"></script>
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
    </script>
  </body>
</html>
