<!-- Page Content -->
  <div class="container">

    <div class="row">
      <div class="col-12">
        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="<?= base_url('assets/img')?>/suzuki_logo.png" alt="Second slide" width="350" height="900">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="<?= base_url('assets/img')?>/yamaha_logo.jpg" alt="third slide" width="350" height="900">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
    <div class="row">

          <?php foreach ($motor as $mtr) : ?>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="<?php echo base_url ('assets/upload/'.$mtr->gambar) ?>" style ="width : 160px; height : 130px" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#"><?php echo $mtr->merk ?> </a>
                </h4>
                <h5>No. Plat : <?php echo $mtr->no_plat ?> </h5>
                <h5>Harga&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo number_format($mtr->harga,2,',','.') ?> </h5>
                
              </div>
              <div class="card-footer">
               <a class="btn btn-warning" href="<?php echo base_url ('customer/dashboard/detail_motor/'). $mtr->id_motor?>"> Detail </a>
              </div>
            </div>
          </div>

        <?php endforeach; ?>
        </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
  
