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
    <!-- Statistik -->
    <!-- <div class="box">
      <div class="box-header">
        <h3 class="box-title">Statistik</h3>
      </div>
      <div class="box-body">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">My Hajat</span>
                  <span class="info-box-number"></span>
                  
                </div>
              </div>
            </div>

          <!-- fix for small devices only -->
          <!-- <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">My Ta'lim</span>
                  <span class="info-box-number"></span>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div> --> 

    <!-- Daftar Support Tiket -->
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Daftar Support Tiket</h3>
      </div>
      <div class="box-body">
        <div class="row">
          <a href="<?= base_url('ticket_register/form_my_hajat') ?>">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt=""></span>
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
                <span class="info-box-icon bg-blue"><img src="<?= base_url('assets/img/my-talim-82.png') ?>" alt=""></span>
                <div class="info-box-content">
                  <span class="info-box-text">My Ta'lim</span>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>

    <!-- Status Support Tiket -->
    <div class="box" style="padding: 8px">
      <div class="box-header">
        <h3 class="box-title">Status Support Ticket</h3>
      </div>
      <div class="box-body">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
          <li class="nav-item active">
            <a class="nav-link active" data-toggle="tab" href="#pending">Pending <span class="badge badge-secondary"><?= $total_pending ?></span></a>
            
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#approved">Approved <span class="badge bg-green"><?= $total_approved ?></span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#rejected">Rejected <span class="badge bg-danger"><?= $total_rejected ?></span></a>
          </li>
        </ul>
        <br>
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane container active" id="pending">

            <a href="<?= base_url('status/pending/myhajat/renovasi') ?>">
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-red"><img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt=""></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">My Hajat Renovasi</span>
                    <span class="info-box-number"><?= $pending_myhajat_renovasi ?></span>
                  </div>
                </div>
              </div>
            </a>

            <a href="<?= base_url('status/pending/myhajat/sewa') ?>">
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-red"><img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt=""></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">My Hajat Sewa</span>
                    <span class="info-box-number"><?= $pending_myhajat_sewa ?></span>
                  </div>
                </div>
              </div>
            </a>

            <a href="<?= base_url('status/pending/myhajat/wedding') ?>">
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-red"><img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt=""></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">My Hajat Wedding</span>
                    <span class="info-box-number"><?= $pending_myhajat_wedding ?></span>
                  </div>
                </div>
              </div>
            </a>

            <a href="<?= base_url('status/pending/myhajat/franchise') ?>">
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-red"><img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt=""></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">My Hajat Franchise</span>
                    <span class="info-box-number"><?= $pending_myhajat_franchise ?></span>
                  </div>
                </div>
              </div>
            </a>

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

              <a href="<?= base_url('status/pending/mytalim') ?>">
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-light-blue"><img src="<?= base_url('assets/img/my-talim-82.png') ?>" alt=""></span>
                    <div class="info-box-content">
                      <span class="info-box-text">My Ta'lim</span>
                    <span class="info-box-number"><?= $pending_mytalim ?></span>
                    </div>
                  </div>
                </div>
              </a>
          </div>

          <div class="tab-pane container fade" id="approved">
            <a href="<?= base_url('status/approved/myhajat/renovasi') ?>">
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-red"><img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt=""></span>
                  <div class="info-box-content">
                    <span class="info-box-text">My Hajat Renovasi</span>
                    <span class="info-box-number"><?= $approved_myhajat_renovasi ?></span>
                  </div>
                </div>
              </div>
            </a>

            <a href="<?= base_url('status/approved/myhajat/sewa') ?>">
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-red"><img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt=""></span>
                  <div class="info-box-content">
                    <span class="info-box-text">My Hajat Sewa</span>
                    <span class="info-box-number"><?= $approved_myhajat_sewa ?></span>
                  </div>
                </div>
              </div>
            </a>

            <a href="<?= base_url('status/approved/myhajat/wedding') ?>">
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-red"><img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt=""></span>
                  <div class="info-box-content">
                    <span class="info-box-text">My Hajat Wedding</span>
                    <span class="info-box-number"><?= $approved_myhajat_wedding ?></span>
                  </div>
                </div>
              </div>
            </a>

            <a href="<?= base_url('status/approved/myhajat/franchise') ?>">
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-red"><img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt=""></span>
                  <div class="info-box-content">
                    <span class="info-box-text">My Hajat Franchise</span>
                    <span class="info-box-number"><?= $approved_myhajat_franchise ?></span>
                  </div>
                </div>
              </div>
            </a>

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <a href="<?= base_url('status/approved/mytalim') ?>">
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-green"><img src="<?= base_url('assets/img/my-talim-82.png') ?>"></span>
                  <div class="info-box-content">
                    <span class="info-box-text">My Ta'lim</span>
                    <span class="info-box-number"><?= $approved_mytalim ?></span>
                  </div>
                </div>
              </div>
            </a>
          </div>

          <div class="tab-pane container fade" id="rejected">
            <a href="<?= base_url('status/rejected/myhajat/renovasi') ?>">
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-red"><img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt=""></span>
                  <div class="info-box-content">
                    <span class="info-box-text">My Hajat Renovasi</span>
                    <span class="info-box-number"><?= $rejected_myhajat_renovasi ?></span>
                  </div>
                </div>
              </div>
            </a>

            <a href="<?= base_url('status/rejected/myhajat/sewa') ?>">
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-red"><img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt=""></span>
                  <div class="info-box-content">
                    <span class="info-box-text">My Hajat Sewa</span>
                    <span class="info-box-number"><?= $rejected_myhajat_sewa ?></span>
                  </div>
                </div>
              </div>
            </a>

            <a href="<?= base_url('status/rejected/myhajat/wedding') ?>">
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-red"><img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt=""></span>
                  <div class="info-box-content">
                    <span class="info-box-text">My Hajat Wedding</span>
                    <span class="info-box-number"><?= $rejected_myhajat_wedding ?></span>
                  </div>
                </div>
              </div>
            </a>

            <a href="<?= base_url('status/rejected/myhajat/franchise') ?>">
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-red"><img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt=""></span>
                  <div class="info-box-content">
                    <span class="info-box-text">My Hajat Franchise</span>
                    <span class="info-box-number"><?= $rejected_myhajat_franchise ?></span>
                  </div>
                </div>
              </div>
            </a>

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <a href="<?= base_url('status/rejected/mytalim') ?>">
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-green"><img src="<?= base_url('assets/img/my-talim-82.png') ?>"></span>
                  <div class="info-box-content">
                    <span class="info-box-text">My Ta'lim</span>
                    <span class="info-box-number"><?= $rejected_mytalim ?></span>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>

  <?php }  ?>

  <?php if ($this->session->userdata('level') == 2) { ?>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Review Tiket Support</h3>
        <hr>
      </div>
      <div class="box-body">
        <div class="row">
          
          <a href="<?= base_url('status/pending/myhajat/renovasi') ?>">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt=""></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">My Hajat Renovasi</span>
                  <span class="info-box-number"><?= $pending_myhajat_renovasi ?></span>
                </div>
              </div>
            </div>
          </a>

          <a href="<?= base_url('status/pending/myhajat/sewa') ?>">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt=""></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">My Hajat Sewa</span>
                  <span class="info-box-number"><?= $pending_myhajat_sewa ?></span>
                </div>
              </div>
            </div>
          </a>

          <a href="<?= base_url('status/pending/myhajat/wedding') ?>">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt=""></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">My Hajat Wedding</span>
                  <span class="info-box-number"><?= $pending_myhajat_wedding ?></span>
                </div>
              </div>
            </div>
          </a>

          <a href="<?= base_url('status/pending/myhajat/franchise') ?>">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt=""></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">My Hajat Franchise</span>
                  <span class="info-box-number"><?= $pending_myhajat_franchise ?></span>
                </div>
              </div>
            </div>
          </a>

          <!-- fix for small devices only -->
          <div class="clearfix visible-sm-block"></div>

          <a href="<?= base_url('status/pending/mytalim') ?>">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-light-blue"><img src="<?= base_url('assets/img/my-talim-82.png') ?>" alt=""></span>
                <div class="info-box-content">
                  <span class="info-box-text">My Ta'lim</span>
                <span class="info-box-number"><?= $pending_mytalim ?></span>
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
        <a href="<?= base_url('status/approved/myhajat/renovasi') ?>">
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-red"><img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt=""></span>
              <div class="info-box-content">
                <span class="info-box-text">My Hajat Renovasi</span>
                <span class="info-box-number"><?= $approved_myhajat_renovasi ?></span>
              </div>
            </div>
          </div>
        </a>

        <a href="<?= base_url('status/approved/myhajat/sewa') ?>">
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-red"><img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt=""></span>
              <div class="info-box-content">
                <span class="info-box-text">My Hajat sewa</span>
                <span class="info-box-number"><?= $approved_myhajat_sewa ?></span>
              </div>
            </div>
          </div>
        </a>

        <a href="<?= base_url('status/approved/myhajat/wedding') ?>">
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-red"><img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt=""></span>
              <div class="info-box-content">
                <span class="info-box-text">My Hajat wedding</span>
                <span class="info-box-number"><?= $approved_myhajat_wedding ?></span>
              </div>
            </div>
          </div>
        </a>

        <a href="<?= base_url('status/approved/myhajat/franchise') ?>">
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-red"><img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt=""></span>
              <div class="info-box-content">
                <span class="info-box-text">My Hajat franchise</span>
                <span class="info-box-number"><?= $approved_myhajat_franchise ?></span>
              </div>
            </div>
          </div>
        </a>

          <!-- fix for small devices only -->
          <div class="clearfix visible-sm-block"></div>

          <a href="<?= base_url('status/approved/mytalim') ?>">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-light-blue"><img src="<?= base_url('assets/img/my-talim-82.png') ?>"></span>
                <div class="info-box-content">
                  <span class="info-box-text">My Ta'lim</span>
                  <span class="info-box-number"><?= $approved_mytalim ?></span>
                </div>
              </div>
            </div>
          </a>

        </div>
      </div>
    </div>

  <?php }  ?>

</section>