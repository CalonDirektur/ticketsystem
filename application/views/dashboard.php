<section class="content-header">
  <h1>
    Dashboard
    <!-- <small>it all starts here</small> -->
  </h1>
  <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol> -->
</section>

<!-- Main content -->
<section class="content">
  <?php if ($this->session->userdata('level') == 1) { ?>
    <div class="box">
      <div class="box-header text-center">
        <h3 class="box-title">DAFTAR SUPPORT TIKET</h3>
      </div>
      <div class="box-body">
        <div class="row">
          <a href="<?= base_url('ticket_register/form_my_hajat') ?>">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">My Hajat</span>
                </div>
              </div>
            </div>
          </a>

          <!-- fix for small devices only -->
          <div class="clearfix visible-sm-block"></div>

          <a href="<?= base_url('ticket_register/form_my_talim') ?>">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">My Ta'lim</span>
                </div>
              </div>
            </div>
          </a>
        </div>

        <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">My Faedah</span>
                <!-- <span class="info-box-number">2,000</span> -->
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">My Cars</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">My Ihram</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">My Safar</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <?php }  ?>

  <?php if ($this->session->userdata('level') == 2) { ?>
    <div class="box">
      <div class="box-header text-center">
        <h3 class="box-title">Review Tiket Support</h3>
        <hr>
      </div>
      <div class="box-body">
        <div class="row">
          <a href="<?= base_url('admin1/review/myhajat') ?>">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">My Hajat</span>
                </div>
              </div>
            </div>
          </a>

          <!-- fix for small devices only -->
          <div class="clearfix visible-sm-block"></div>

          <a href="<?= base_url('admin1/review/mytalim') ?>">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">My Ta'lim</span>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>

  <?php }  ?>

  <?php if ($this->session->userdata('level') == 3) { ?>
    <div class="box">
      <div class="box-header text-center">
        <h3 class="box-title">Review Tiket Support</h3>
        <hr>
      </div>
      <div class="box-body">
        <div class="row">
          <a href="<?= base_url('admin2/review/myhajat') ?>">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">My Hajat</span>
                </div>
              </div>
            </div>
          </a>

          <!-- fix for small devices only -->
          <div class="clearfix visible-sm-block"></div>

          <a href="<?= base_url('admin2/review/mytalim') ?>">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">My Ta'lim</span>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>

  <?php }  ?>

</section>