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
    <!-- Daftar Support Tiket -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Daftar Support Tiket</h3>
      </div>
      <div class="card-body">
        <div class="row">

          <div class="col-md-2 col-sm-6 col-xs-12">
            <a href="<?= base_url('ticket_register/form_my_hajat') ?>">
              <div class="card">
                <div class="card-header text-center">
                  <img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt="">
                </div>
                <div class="card-body text-center">
                  My Hajat
                </div>
              </div>
            </a>
          </div>

          <!-- fix for small devices only -->
          <div class="clearfix visible-sm-block"></div>

          <div class="col-md-2 col-sm-6 col-xs-12">
            <a href="<?= base_url('ticket_register/form_my_talim') ?>">
              <div class="card">
                <div class="card-header text-center">
                  <img src="<?= base_url('assets/img/my-talim-82.png') ?>" alt="">
                </div>
                <div class="card-body text-center">
                  My Ta'lim
                </div>
              </div>
            </a>
          </div>
          </a>
        </div>
      </div>
    </div>

    <!-- Status Support Tiket -->
    <div class="card" style="padding: 8px">
      <div class="card-header">
        <h3 class="card-title">Status Support Ticket</h3>
      </div>
      <div class="card-body">

        <!-- Nav pills -->
        <ul class="nav nav-pills" style="margin-bottom: 16px">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="pill" href="#list-all">All</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="pill" href="#kategori-produk">Kategori Produk</a>
          </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane container-fluid active" id="list-all">

            <!-- My Ta'lim Table -->
            <?php if ($mytalim_records->num_rows() > 0) { ?>
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Tabel My Talim</h3>
                </div>
                <div class="card-body">
                  <table class="table table-striped" id="myTable">
                    <thead>
                      <th>ID Ticket</th>
                      <th>Nama Konsumen</th>
                      <th>Jenis Konsumen</th>
                      <th>Pendidikan</th>
                      <th>Produk</th>
                      <th>Ticket Status</th>
                      <th></th>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($mytalim_records->result() as $d) {  ?>
                        <tr>
                          <td>#<?= $d->id_mytalim ?></td>
                          <td><?= $d->nama_konsumen ?></td>
                          <td><?= $d->jenis_konsumen ?></td>
                          <td><?= ucfirst($d->pendidikan) ?></td>
                          <td>My Ta'lim</td>
                          <?php if ($d->id_approval == 0) { ?>
                            <td><span class="badge badge-secondary">Belum Direview</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/pending/mytalim/id/' . $d->id_mytalim) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 1) { ?>
                            <td><span class="badge badge-danger">Ditolak</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/rejected/mytalim/id/' . $d->id_mytalim) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 2) { ?>
                            <td><span class="badge badge-success">Disetujui Admin 1</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/approved/mytalim/id/' . $d->id_mytalim) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 3) { ?>
                            <td><span class="badge badge-primary">Selesai</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/completed/mytalim/id/' . $d->id_mytalim) ?>">Detail</a></td>
                          <?php } ?>
                        </tr>
                        <?php
                        $no++;
                      } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            <?php } ?>

            <?php if ($myhajat_renovasi_records->num_rows() > 0) { ?>
              <!-- My Hajat Renovasi Table -->
              <div class="card mt-4">
                <div class="card-header">
                  <h3 class="card-title">Tabel My Hajat Renovasi</h3>
                </div>
                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <th>ID Ticket</th>
                      <th>Nama Konsumen</th>
                      <th>Jenis Konsumen</th>
                      <th>Nama Vendor</th>
                      <th>Produk</th>
                      <th>Ticket Status</th>
                      <th></th>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($myhajat_renovasi_records->result() as $d) {  ?>
                        <tr>
                          <td>#<?= $d->id_renovasi ?></td>
                          <td><?= $d->nama_konsumen ?></td>
                          <td><?= $d->jenis_konsumen ?></td>
                          <td><?= ucfirst($d->nama_vendor) ?></td>
                          <td>My Hajat Renovasi</td>
                          <?php if ($d->id_approval == 0) { ?>
                            <td><span class="badge badge-secondary">Belum Direview</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/renovasi/' . $d->id_renovasi) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 1) { ?>
                            <td><span class="badge badge-danger">Ditolak</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/renovasi/' . $d->id_renovasi) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 2) { ?>
                            <td><span class="badge badge-success">Disetujui Admin 1</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/renovasi/' . $d->id_renovasi) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 3) { ?>
                            <td><span class="badge badge-primary">Selesai</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/renovasi/' . $d->id_renovasi) ?>">Detail</a></td>
                          <?php } ?>
                        </tr>
                        <?php
                        $no++;
                      } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            <?php } ?>

            <!-- My Hajat Sewa Table -->
            <?php if ($myhajat_sewa_records->num_rows() > 0) { ?>
              <div class="card mt-4">
                <div class="card-header">
                  <h3 class="card-title">Tabel My Hajat Sewa</h3>
                </div>
                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <th>ID Ticket</th>
                      <th>Nama Konsumen</th>
                      <th>Jenis Konsumen</th>
                      <th>Nama Pemilik</th>
                      <th>Produk</th>
                      <th>Ticket Status</th>
                      <th></th>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($myhajat_sewa_records->result() as $d) {  ?>
                        <tr>
                          <td>#<?= $d->id_sewa ?></td>
                          <td><?= $d->nama_konsumen ?></td>
                          <td><?= $d->jenis_konsumen ?></td>
                          <td><?= ucfirst($d->nama_pemilik) ?></td>
                          <td>My Hajat Sewa</td>
                          <?php if ($d->id_approval == 0) { ?>
                            <td><span class="badge badge-secondary">Belum Direview</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/sewa/' . $d->id_sewa) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 1) { ?>
                            <td><span class="badge badge-danger">Ditolak</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/sewa/' . $d->id_sewa) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 2) { ?>
                            <td><span class="badge badge-success">Disetujui Admin 1</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/sewa/' . $d->id_sewa) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 3) { ?>
                            <td><span class="badge badge-primary">Selesai</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/sewa/' . $d->id_sewa) ?>">Detail</a></td>
                          <?php } ?>
                        </tr>
                        <?php
                        $no++;
                      } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            <?php } ?>

            <!-- My Hajat Wedding Table -->
            <?php if ($myhajat_wedding_records->num_rows() > 0) { ?>
              <div class="card mt-4">
                <div class="card-header">
                  <h3 class="card-title">Tabel My Hajat Wedding</h3>
                </div>
                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <th>ID Ticket</th>
                      <th>Nama Konsumen</th>
                      <th>Jenis Konsumen</th>
                      <th>Nama WO</th>
                      <th>Produk</th>
                      <th>Ticket Status</th>
                      <th></th>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($myhajat_wedding_records->result() as $d) {  ?>
                        <tr>
                          <td>#<?= $d->id_wedding ?></td>
                          <td><?= $d->nama_konsumen ?></td>
                          <td><?= $d->jenis_konsumen ?></td>
                          <td><?= ucfirst($d->nama_wo) ?></td>
                          <td>My Hajat Wedding</td>
                          <?php if ($d->id_approval == 0) { ?>
                            <td><span class="badge badge-secondary">Belum Direview</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/wedding/' . $d->id_wedding) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 1) { ?>
                            <td><span class="badge badge-danger">Ditolak</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/wedding/' . $d->id_wedding) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 2) { ?>
                            <td><span class="badge badge-success">Disetujui Admin 1</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/wedding/' . $d->id_wedding) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 3) { ?>
                            <td><span class="badge badge-primary">Selesai</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/wedding/' . $d->id_wedding) ?>">Detail</a></td>
                          <?php } ?>
                        </tr>
                        <?php
                        $no++;
                      } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            <?php } ?>

            <!-- My Hajat Franchise Table -->
            <?php if ($myhajat_franchise_records->num_rows() > 0) { ?>
              <div class="card mt-4">
                <div class="card-header">
                  <h3 class="card-title">Tabel My Hajat Franchise</h3>
                </div>
                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <th>ID Ticket</th>
                      <th>Nama Konsumen</th>
                      <th>Jenis Konsumen</th>
                      <th>Nama Franchise</th>
                      <th>Produk</th>
                      <th>Ticket Status</th>
                      <th></th>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($myhajat_franchise_records->result() as $d) {  ?>
                        <tr>
                          <td>#<?= $d->id_franchise ?></td>
                          <td><?= $d->nama_konsumen ?></td>
                          <td><?= $d->jenis_konsumen ?></td>
                          <td><?= ucfirst($d->nama_franchise) ?></td>
                          <td>My Hajat Franchise</td>
                          <?php if ($d->id_approval == 0) { ?>
                            <td><span class="badge badge-secondary">Belum Direview</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/franchise/' . $d->id_franchise) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 1) { ?>
                            <td><span class="badge badge-danger">Ditolak</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/franchise/' . $d->id_franchise) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 2) { ?>
                            <td><span class="badge badge-success">Disetujui Admin 1</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/franchise/' . $d->id_franchise) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 3) { ?>
                            <td><span class="badge badge-primary">Selesai</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/franchise/' . $d->id_franchise) ?>">Detail</a></td>
                          <?php } ?>
                        </tr>
                        <?php
                        $no++;
                      } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            <?php } ?>

            <!-- My Hajat Lainnya Table -->
            <?php if ($myhajat_lainnya_records->num_rows() > 0) { ?>
              <div class="card mt-4">
                <div class="card-header">
                  <h3 class="card-title">Tabel My Hajat Lainnya</h3>
                </div>
                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <th>ID Ticket</th>
                      <th>Nama Konsumen</th>
                      <th>Jenis Konsumen</th>
                      <th>Nama Penyedia Jasa</th>
                      <th>Produk</th>
                      <th>Ticket Status</th>
                      <th></th>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($myhajat_lainnya_records->result() as $d) {  ?>
                        <tr>
                          <td>#<?= $d->id_myhajat_lainnya ?></td>
                          <td><?= $d->nama_konsumen ?></td>
                          <td><?= $d->jenis_konsumen ?></td>
                          <td><?= ucfirst($d->nama_penyedia_jasa) ?></td>
                          <td>My Hajat Lainnya</td>
                          <?php if ($d->id_approval == 0) { ?>
                            <td><span class="badge badge-secondary">Belum Direview</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/lainnya/' . $d->id_myhajat_lainnya) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 1) { ?>
                            <td><span class="badge badge-danger">Ditolak</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/lainnya/' . $d->id_myhajat_lainnya) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 2) { ?>
                            <td><span class="badge badge-success">Disetujui Admin 1</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/lainnya/' . $d->id_myhajat_lainnya) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 3) { ?>
                            <td><span class="badge badge-primary">Selesai</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/lainnya/' . $d->id_myhajat_lainnya) ?>">Detail</a></td>
                          <?php } ?>
                        </tr>
                        <?php
                        $no++;
                      } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            <?php } ?>

          </div>
          <div class="tab-pane container-fluid fade" id="kategori-produk">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
              <li class="nav-item active">
                <a class="nav-link active" data-toggle="tab" href="#pending">Pending <label class="badge badge-secondary"><?= $total_pending ?></label></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#approved">Approved <label class="badge badge-success"><?= $total_approved ?></label></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#rejected">Rejected <label class="badge badge-danger"><?= $total_rejected ?></label></a>
              </li>
            </ul>
            <br>
            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane container-fluid active" id="pending">
                <div class="row">
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="<?= base_url('status/pending/myhajat/renovasi') ?>">
                      <div class="card">
                        <div class="card-header text-center">
                          <img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt=""></i>
                        </div>
                        <div class="card-body text-center">
                          <span>My Hajat Renovasi</span><br>
                          <label class="badge badge-secondary"><?= $pending_myhajat_renovasi ?></span>
                        </div>
                      </div>
                    </a>
                  </div>


                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="<?= base_url('status/pending/myhajat/sewa') ?>">
                      <div class="card">
                        <div class="card-header text-center">
                          <img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt="">
                        </div>
                        <div class="card-body text-center">
                          <span>My Hajat Sewa</span><br>
                          <label class="badge badge-secondary"><?= $pending_myhajat_sewa ?></span>
                        </div>
                      </div>
                    </a>
                  </div>


                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="<?= base_url('status/pending/myhajat/wedding') ?>">
                      <div class="card">
                        <div class="card-header text-center">
                          <img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt="">
                        </div>
                        <div class="card-body text-center">
                          <span>My Hajat Wedding</span><br>
                          <label class="badge badge-secondary"><?= $pending_myhajat_wedding ?></span>
                        </div>
                      </div>
                    </a>
                  </div>

                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="<?= base_url('status/pending/myhajat/franchise') ?>">
                      <div class="card">
                        <div class="card-header text-center">
                          <img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt="">
                        </div>
                        <div class="card-body text-center">
                          <span>My Hajat Franchise</span><br>
                          <label class="badge badge-secondary"><?= $pending_myhajat_franchise ?></span>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>

                <div class="row mt-4">
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="<?= base_url('status/pending/myhajat/lainnya') ?>">
                      <div class="card">
                        <div class="card-header text-center">
                          <img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt="">
                        </div>
                        <div class="card-body text-center">
                          <span>My Hajat Lainnya</span><br>
                          <label class="badge badge-secondary"><?= $pending_myhajat_lainnya ?></span>
                        </div>
                      </div>
                    </a>
                  </div>

                  <!-- fix for small devices only -->
                  <div class="clearfix visible-sm-block"></div>

                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="<?= base_url('status/pending/mytalim/') ?>">
                      <div class="card">
                        <div class="card-header text-center">
                          <img src="<?= base_url('assets/img/my-talim-82.png') ?>" alt="">
                        </div>
                        <div class="card-body text-center">
                          <span>My Talim</span><br>
                          <label class="badge badge-secondary"><?= $pending_mytalim ?></la>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>

              </div>

              <div class="tab-pane container-fluid fade" id="approved">

                <div class="row">
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="<?= base_url('status/approved/myhajat/renovasi') ?>">
                      <div class="card">
                        <div class="card-header text-center">
                          <img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt=""></i>
                        </div>
                        <div class="card-body text-center">
                          <span>My Hajat Renovasi</span><br>
                          <label class="badge badge-success"><?= $approved_myhajat_renovasi ?></span>
                        </div>
                      </div>
                    </a>
                  </div>


                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="<?= base_url('status/approved/myhajat/sewa') ?>">
                      <div class="card">
                        <div class="card-header text-center">
                          <img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt="">
                        </div>
                        <div class="card-body text-center">
                          <span>My Hajat Sewa</span><br>
                          <label class="badge badge-success"><?= $approved_myhajat_sewa ?></span>
                        </div>
                      </div>
                    </a>
                  </div>


                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="<?= base_url('status/approved/myhajat/wedding') ?>">
                      <div class="card">
                        <div class="card-header text-center">
                          <img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt="">
                        </div>
                        <div class="card-body text-center">
                          <span>My Hajat Wedding</span><br>
                          <label class="badge badge-success"><?= $approved_myhajat_wedding ?></span>
                        </div>
                      </div>
                    </a>
                  </div>

                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="<?= base_url('status/approved/myhajat/franchise') ?>">
                      <div class="card">
                        <div class="card-header text-center">
                          <img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt="">
                        </div>
                        <div class="card-body text-center">
                          <span>My Hajat Franchise</span><br>
                          <label class="badge badge-success"><?= $approved_myhajat_franchise ?></span>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>

                <div class="row mt-4">
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="<?= base_url('status/approved/myhajat/lainnya') ?>">
                      <div class="card">
                        <div class="card-header text-center">
                          <img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt="">
                        </div>
                        <div class="card-body text-center">
                          <span>My Hajat Lainnya</span><br>
                          <label class="badge badge-success"><?= $approved_myhajat_lainnya ?></span>
                        </div>
                      </div>
                    </a>
                  </div>

                  <!-- fix for small devices only -->
                  <div class="clearfix visible-sm-block"></div>

                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="<?= base_url('status/approved/mytalim/') ?>">
                      <div class="card">
                        <div class="card-header text-center">
                          <img src="<?= base_url('assets/img/my-talim-82.png') ?>" alt="">
                        </div>
                        <div class="card-body text-center">
                          <span>My Talim</span><br>
                          <label class="badge badge-success"><?= $approved_mytalim ?></span>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>

              </div>

              <div class="tab-pane container-fluid fade" id="rejected">

                <div class="row">
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="<?= base_url('status/rejected/myhajat/renovasi') ?>">
                      <div class="card">
                        <div class="card-header text-center">
                          <img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt=""></i>
                        </div>
                        <div class="card-body text-center">
                          <span>My Hajat Renovasi</span><br>
                          <label class="badge badge-danger"><?= $rejected_myhajat_renovasi ?></span>
                        </div>
                      </div>
                    </a>
                  </div>


                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="<?= base_url('status/rejected/myhajat/sewa') ?>">
                      <div class="card">
                        <div class="card-header text-center">
                          <img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt="">
                        </div>
                        <div class="card-body text-center">
                          <span>My Hajat Sewa</span><br>
                          <label class="badge badge-danger"><?= $rejected_myhajat_sewa ?></span>
                        </div>
                      </div>
                    </a>
                  </div>


                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="<?= base_url('status/rejected/myhajat/wedding') ?>">
                      <div class="card">
                        <div class="card-header text-center">
                          <img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt="">
                        </div>
                        <div class="card-body text-center">
                          <span>My Hajat Wedding</span><br>
                          <label class="badge badge-danger"><?= $rejected_myhajat_wedding ?></span>
                        </div>
                      </div>
                    </a>
                  </div>

                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="<?= base_url('status/rejected/myhajat/franchise') ?>">
                      <div class="card">
                        <div class="card-header text-center">
                          <img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt="">
                        </div>
                        <div class="card-body text-center">
                          <span>My Hajat Franchise</span><br>
                          <label class="badge badge-danger"><?= $rejected_myhajat_franchise ?></span>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>

                <div class="row mt-4">
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="<?= base_url('status/rejected/myhajat/lainnya') ?>">
                      <div class="card">
                        <div class="card-header text-center">
                          <img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt="">
                        </div>
                        <div class="card-body text-center">
                          <span>My Hajat Lainnya</span><br>
                          <label class="badge badge-danger"><?= $rejected_myhajat_lainnya ?></span>
                        </div>
                      </div>
                    </a>
                  </div>

                  <!-- fix for small devices only -->
                  <div class="clearfix visible-sm-block"></div>

                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="<?= base_url('status/rejected/mytalim/') ?>">
                      <div class="card">
                        <div class="card-header text-center">
                          <img src="<?= base_url('assets/img/my-talim-82.png') ?>" alt="">
                        </div>
                        <div class="card-body text-center">
                          <span>My Talim</span><br>
                          <label class="badge badge-danger"><?= $rejected_mytalim ?></span>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

  <?php }  ?>

  <?php if ($this->session->userdata('level') == 2) { ?>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Review Tiket Support</h3>
      </div>
      <div class="card-body">

        <!-- Nav pills -->
        <ul class="nav nav-pills" style="margin-bottom: 16px">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="pill" href="#list-all">All</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="pill" href="#kategori-produk">Kategori Produk</a>
          </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane container-fluid active" id="list-all">

            <!-- My Ta'lim Table -->
            <?php if ($mytalim_records->num_rows() > 0) { ?>
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Tabel My Talim</h3>
                </div>
                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <th>ID Ticket</th>
                      <th>Nama Konsumen</th>
                      <th>Jenis Konsumen</th>
                      <th>Pendidikan</th>
                      <th>Produk</th>
                      <th>Ticket Status</th>
                      <th></th>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($mytalim_records->result() as $d) {  ?>
                        <tr>
                          <td>#<?= $d->id_mytalim ?></td>
                          <td><?= $d->nama_konsumen ?></td>
                          <td><?= $d->jenis_konsumen ?></td>
                          <td><?= ucfirst($d->pendidikan) ?></td>
                          <td>My Ta'lim</td>
                          <?php if ($d->id_approval == 0) { ?>
                            <td><span class="badge badge-secondary">Belum Direview</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/pending/mytalim/id/' . $d->id_mytalim) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 1) { ?>
                            <td><span class="badge badge-danger">Ditolak</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/rejected/mytalim/id/' . $d->id_mytalim) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 2) { ?>
                            <td><span class="badge badge-success">Disetujui Admin 1</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/approved/mytalim/id/' . $d->id_mytalim) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 3) { ?>
                            <td><span class="badge badge-primary">Selesai</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/completed/mytalim/id/' . $d->id_mytalim) ?>">Detail</a></td>
                          <?php } ?>
                        </tr>
                        <?php
                        $no++;
                      } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            <?php } ?>

            <!-- My Hajat Renovasi Table -->
            <?php if ($myhajat_renovasi_records->num_rows() > 0) { ?>
              <div class="card mt-4">
                <div class="card-header">
                  <h3 class="card-title">Tabel My Hajat Renovasi</h3>
                </div>
                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <th>ID Ticket</th>
                      <th>Nama Konsumen</th>
                      <th>Jenis Konsumen</th>
                      <th>Nama Vendor</th>
                      <th>Produk</th>
                      <th>Ticket Status</th>
                      <th></th>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($myhajat_renovasi_records->result() as $d) {  ?>
                        <tr>
                          <td>#<?= $d->id_renovasi ?></td>
                          <td><?= $d->nama_konsumen ?></td>
                          <td><?= $d->jenis_konsumen ?></td>
                          <td><?= ucfirst($d->nama_vendor) ?></td>
                          <td>My Hajat Renovasi</td>
                          <?php if ($d->id_approval == 0) { ?>
                            <td><span class="badge badge-secondary">Belum Direview</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/renovasi/' . $d->id_renovasi) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 1) { ?>
                            <td><span class="badge badge-danger">Ditolak</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/renovasi/' . $d->id_renovasi) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 2) { ?>
                            <td><span class="badge badge-success">Disetujui Admin 1</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/renovasi/' . $d->id_renovasi) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 3) { ?>
                            <td><span class="badge badge-primary">Selesai</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/renovasi/' . $d->id_renovasi) ?>">Detail</a></td>
                          <?php } ?>
                        </tr>
                        <?php
                        $no++;
                      } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            <?php } ?>

            <!-- My Hajat Sewa Table -->
            <?php if ($myhajat_sewa_records->num_rows() > 0) { ?>
              <div class="card mt-4">
                <div class="card-header">
                  <h3 class="card-title">Tabel My Hajat Sewa</h3>
                </div>
                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <th>ID Ticket</th>
                      <th>Nama Konsumen</th>
                      <th>Jenis Konsumen</th>
                      <th>Nama Pemilik</th>
                      <th>Produk</th>
                      <th>Ticket Status</th>
                      <th></th>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($myhajat_sewa_records->result() as $d) {  ?>
                        <tr>
                          <td>#<?= $d->id_sewa ?></td>
                          <td><?= $d->nama_konsumen ?></td>
                          <td><?= $d->jenis_konsumen ?></td>
                          <td><?= ucfirst($d->nama_pemilik) ?></td>
                          <td>My Hajat Sewa</td>
                          <?php if ($d->id_approval == 0) { ?>
                            <td><span class="badge badge-secondary">Belum Direview</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/sewa/' . $d->id_sewa) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 1) { ?>
                            <td><span class="badge badge-danger">Ditolak</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/sewa/' . $d->id_sewa) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 2) { ?>
                            <td><span class="badge badge-success">Disetujui Admin 1</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/sewa/' . $d->id_sewa) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 3) { ?>
                            <td><span class="badge badge-primary">Selesai</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/sewa/' . $d->id_sewa) ?>">Detail</a></td>
                          <?php } ?>
                        </tr>
                        <?php
                        $no++;
                      } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            <?php } ?>

            <!-- My Hajat Wedding Table -->
            <?php if ($myhajat_wedding_records->num_rows() > 0) { ?>
              <div class="card mt-4">
                <div class="card-header">
                  <h3 class="card-title">Tabel My Hajat Wedding</h3>
                </div>
                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <th>ID Ticket</th>
                      <th>Nama Konsumen</th>
                      <th>Jenis Konsumen</th>
                      <th>Nama WO</th>
                      <th>Produk</th>
                      <th>Ticket Status</th>
                      <th></th>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($myhajat_wedding_records->result() as $d) {  ?>
                        <tr>
                          <td>#<?= $d->id_wedding ?></td>
                          <td><?= $d->nama_konsumen ?></td>
                          <td><?= $d->jenis_konsumen ?></td>
                          <td><?= ucfirst($d->nama_wo) ?></td>
                          <td>My Hajat Wedding</td>
                          <?php if ($d->id_approval == 0) { ?>
                            <td><span class="badge badge-secondary">Belum Direview</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/wedding/' . $d->id_wedding) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 1) { ?>
                            <td><span class="badge badge-danger">Ditolak</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/wedding/' . $d->id_wedding) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 2) { ?>
                            <td><span class="badge badge-success">Disetujui Admin 1</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/wedding/' . $d->id_wedding) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 3) { ?>
                            <td><span class="badge badge-primary">Selesai</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/wedding/' . $d->id_wedding) ?>">Detail</a></td>
                          <?php } ?>
                        </tr>
                        <?php
                        $no++;
                      } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            <?php } ?>

            <!-- My Hajat Franchise Table -->
            <?php if ($myhajat_franchise_records->num_rows() > 0) { ?>
              <div class="card mt-4">
                <div class="card-header">
                  <h3 class="card-title">Tabel My Hajat Franchise</h3>
                </div>
                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <th>ID Ticket</th>
                      <th>Nama Konsumen</th>
                      <th>Jenis Konsumen</th>
                      <th>Nama Franchise</th>
                      <th>Produk</th>
                      <th>Ticket Status</th>
                      <th></th>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($myhajat_franchise_records->result() as $d) {  ?>
                        <tr>
                          <td>#<?= $d->id_franchise ?></td>
                          <td><?= $d->nama_konsumen ?></td>
                          <td><?= $d->jenis_konsumen ?></td>
                          <td><?= ucfirst($d->nama_franchise) ?></td>
                          <td>My Hajat Franchise</td>
                          <?php if ($d->id_approval == 0) { ?>
                            <td><span class="badge badge-secondary">Belum Direview</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/wedding/' . $d->id_franchise) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 1) { ?>
                            <td><span class="badge badge-danger">Ditolak</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/wedding/' . $d->id_franchise) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 2) { ?>
                            <td><span class="badge badge-success">Disetujui Admin 1</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/wedding/' . $d->id_franchise) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 3) { ?>
                            <td><span class="badge badge-primary">Selesai</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/wedding/' . $d->id_franchise) ?>">Detail</a></td>
                          <?php } ?>
                        </tr>
                        <?php
                        $no++;
                      } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            <?php } ?>

            <!-- My Hajat Lainnya Table -->
            <?php if ($myhajat_lainnya_records->num_rows() > 0) { ?>
              <div class="card mt-4">
                <div class="card-header">
                  <h3 class="card-title">Tabel My Hajat Lainnya</h3>
                </div>
                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <th>ID Ticket</th>
                      <th>Nama Konsumen</th>
                      <th>Jenis Konsumen</th>
                      <th>Nama Penyedia Jasa</th>
                      <th>Produk</th>
                      <th>Ticket Status</th>
                      <th></th>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($myhajat_lainnya_records->result() as $d) {  ?>
                        <tr>
                          <td>#<?= $d->id_myhajat_lainnya ?></td>
                          <td><?= $d->nama_konsumen ?></td>
                          <td><?= $d->jenis_konsumen ?></td>
                          <td><?= ucfirst($d->nama_penyedia_jasa) ?></td>
                          <td>My Hajat Lainnya</td>
                          <?php if ($d->id_approval == 0) { ?>
                            <td><span class="badge badge-secondary">Belum Direview</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/lainnya/' . $d->id_myhajat_lainnya) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 1) { ?>
                            <td><span class="badge badge-danger">Ditolak</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/lainnya/' . $d->id_myhajat_lainnya) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 2) { ?>
                            <td><span class="badge badge-success">Disetujui Admin 1</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/lainnya/' . $d->id_myhajat_lainnya) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 3) { ?>
                            <td><span class="badge badge-primary">Selesai</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/lainnya/' . $d->id_myhajat_lainnya) ?>">Detail</a></td>
                          <?php } ?>
                        </tr>
                        <?php
                        $no++;
                      } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            <?php } ?>

          </div>
          <div class="tab-pane container-fluid fade" id="kategori-produk">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
              <li class="nav-item active">
                <a class="nav-link active" data-toggle="tab" href="#pending">Pending <span class="badge badge-secondary"><?= $total_pending ?></span></a>
              </li>
            </ul>
            <br>
            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane container-fluid active" id="pending">
                <div class="row">

                  <div class="col-md-2 col-sm-6 col-xs-12">
                    <a href="<?= base_url('status/pending/myhajat/renovasi') ?>">
                      <div class="card">
                        <div class="card-header text-center">
                          <img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt="">
                        </div>
                        <div class="card-body text-center">
                          My Hajat Renovasi<br>
                          <span class="badge badge-secondary"><?= $pending_myhajat_renovasi ?></span>
                        </div>
                      </div>
                    </a>
                  </div>

                  <div class="col-md-2 col-sm-6 col-xs-12">
                    <a href="<?= base_url('status/pending/myhajat/sewa') ?>">
                      <div class="card">
                        <div class="card-header text-center">
                          <img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt="">
                        </div>
                        <div class="card-body text-center">
                          My Hajat Sewa<br>
                          <span class="badge badge-secondary"><?= $pending_myhajat_sewa ?></span>
                        </div>
                      </div>
                    </a>
                  </div>

                  <div class="col-md-2 col-sm-6 col-xs-12">
                    <a href="<?= base_url('status/pending/myhajat/wedding') ?>">
                      <div class="card">
                        <div class="card-header text-center">
                          <img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt="">
                        </div>
                        <div class="card-body text-center">
                          My Hajat Wedding<br>
                          <span class="badge badge-secondary"><?= $pending_myhajat_wedding ?></span>
                        </div>
                      </div>
                    </a>
                  </div>

                  <div class="col-md-2 col-sm-6 col-xs-12">
                    <a href="<?= base_url('status/pending/myhajat/franchise') ?>">
                      <div class="card">
                        <div class="card-header text-center">
                          <img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt="">
                        </div>
                        <div class="card-body text-center">
                          My Hajat Franchise<br>
                          <span class="badge badge-secondary"><?= $pending_myhajat_franchise ?></span>
                        </div>
                      </div>
                    </a>
                  </div>

                </div>
                <div class="row mt-4">
                  <div class="col-md-2 col-sm-6 col-xs-12">
                    <a href="<?= base_url('status/pending/myhajat/lainnya') ?>">
                      <div class="card">
                        <div class="card-header text-center">
                          <img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt="">
                        </div>
                        <div class="card-body text-center">
                          My Hajat Lainnya<br>
                          <span class="badge badge-secondary"><?= $pending_myhajat_lainnya ?></span>
                        </div>
                      </div>
                    </a>
                  </div>

                  <!-- fix for small devices only -->
                  <div class="clearfix visible-sm-block"></div>

                  <div class="col-md-2 col-sm-6 col-xs-12">
                    <a href="<?= base_url('status/pending/mytalim') ?>">
                      <div class="card">
                        <div class="card-header text-center">
                          <img src="<?= base_url('assets/img/my-talim-82.png') ?>" alt="">
                        </div>
                        <div class="card-body text-center">
                          My Talim<br>
                          <span class="badge badge-secondary"><?= $pending_mytalim ?></span>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

  <?php }  ?>

  <?php if ($this->session->userdata('level') == 3) { ?>
    <div class="card">
      <div class="card-header">Review Ticket Support</div>
      <div class="card-body">
        <!-- Nav pills -->
        <ul class="nav nav-pills" style="margin-bottom: 16px">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="pill" href="#list-all">All</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="pill" href="#kategori-produk">Kategori Produk</a>
          </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane container-fluid active" id="list-all">
            <!-- My Ta'lim Table -->
            <?php if ($mytalim_records->num_rows() > 0) { ?>
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Tabel My Talim</h3>
                </div>
                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <th>ID Ticket</th>
                      <th>Nama Konsumen</th>
                      <th>Jenis Konsumen</th>
                      <th>Pendidikan</th>
                      <th>Produk</th>
                      <th>Ticket Status</th>
                      <th></th>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($mytalim_records->result() as $d) {  ?>
                        <tr>
                          <td>#<?= $d->id_mytalim ?></td>
                          <td><?= $d->nama_konsumen ?></td>
                          <td><?= $d->jenis_konsumen ?></td>
                          <td><?= ucfirst($d->pendidikan) ?></td>
                          <td>My Ta'lim</td>
                          <?php if ($d->id_approval == 0) { ?>
                            <td><span class="badge badge-secondary">Belum Direview</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/pending/mytalim/id/' . $d->id_mytalim) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 1) { ?>
                            <td><span class="badge badge-danger">Ditolak</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/rejected/mytalim/id/' . $d->id_mytalim) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 2) { ?>
                            <td><span class="badge badge-success">Disetujui Admin 1</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/approved/mytalim/id/' . $d->id_mytalim) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 3) { ?>
                            <td><span class="badge badge-primary">Selesai</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/completed/mytalim/id/' . $d->id_mytalim) ?>">Detail</a></td>
                          <?php } ?>
                        </tr>
                        <?php
                        $no++;
                      } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            <?php } ?>

            <!-- My Hajat Renovasi Table -->
            <?php if ($myhajat_renovasi_records->num_rows() > 0) { ?>
              <div class="card mt-4">
                <div class="card-header">
                  <h3 class="card-title">Tabel My Hajat Renovasi</h3>
                </div>
                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <th>ID Ticket</th>
                      <th>Nama Konsumen</th>
                      <th>Jenis Konsumen</th>
                      <th>Nama Vendor</th>
                      <th>Produk</th>
                      <th>Ticket Status</th>
                      <th></th>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($myhajat_renovasi_records->result() as $d) {  ?>
                        <tr>
                          <td>#<?= $d->id_renovasi ?></td>
                          <td><?= $d->nama_konsumen ?></td>
                          <td><?= $d->jenis_konsumen ?></td>
                          <td><?= ucfirst($d->nama_vendor) ?></td>
                          <td>My Hajat Renovasi</td>
                          <?php if ($d->id_approval == 0) { ?>
                            <td><span class="badge badge-secondary">Belum Direview</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/renovasi/' . $d->id_renovasi) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 1) { ?>
                            <td><span class="badge badge-danger">Ditolak</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/renovasi/' . $d->id_renovasi) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 2) { ?>
                            <td><span class="badge badge-success">Disetujui Admin 1</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/renovasi/' . $d->id_renovasi) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 3) { ?>
                            <td><span class="badge badge-primary">Selesai</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/renovasi/' . $d->id_renovasi) ?>">Detail</a></td>
                          <?php } ?>
                        </tr>
                        <?php
                        $no++;
                      } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            <?php } ?>

            <!-- My Hajat Sewa Table -->
            <?php if ($myhajat_sewa_records->num_rows() > 0) { ?>
              <div class="card mt-4">
                <div class="card-header">
                  <h3 class="card-title">Tabel My Hajat Sewa</h3>
                </div>
                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <th>ID Ticket</th>
                      <th>Nama Konsumen</th>
                      <th>Jenis Konsumen</th>
                      <th>Nama Pemilik</th>
                      <th>Produk</th>
                      <th>Ticket Status</th>
                      <th></th>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($myhajat_sewa_records->result() as $d) {  ?>
                        <tr>
                          <td>#<?= $d->id_sewa ?></td>
                          <td><?= $d->nama_konsumen ?></td>
                          <td><?= $d->jenis_konsumen ?></td>
                          <td><?= ucfirst($d->nama_pemilik) ?></td>
                          <td>My Hajat Sewa</td>
                          <?php if ($d->id_approval == 0) { ?>
                            <td><span class="badge badge-secondary">Belum Direview</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/sewa/' . $d->id_sewa) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 1) { ?>
                            <td><span class="badge badge-danger">Ditolak</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/sewa/' . $d->id_sewa) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 2) { ?>
                            <td><span class="badge badge-success">Disetujui Admin 1</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/sewa/' . $d->id_sewa) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 3) { ?>
                            <td><span class="badge badge-primary">Selesai</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/sewa/' . $d->id_sewa) ?>">Detail</a></td>
                          <?php } ?>
                        </tr>
                        <?php
                        $no++;
                      } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            <?php } ?>

            <?php if ($myhajat_wedding_records->num_rows() > 0) { ?>
              <!-- My Hajat Wedding Table -->
              <div class="card mt-4">
                <div class="card-header">
                  <h3 class="card-title">Tabel My Hajat Wedding</h3>
                </div>
                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <th>ID Ticket</th>
                      <th>Nama Konsumen</th>
                      <th>Jenis Konsumen</th>
                      <th>Nama WO</th>
                      <th>Produk</th>
                      <th>Ticket Status</th>
                      <th></th>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($myhajat_wedding_records->result() as $d) {  ?>
                        <tr>
                          <td>#<?= $d->id_wedding ?></td>
                          <td><?= $d->nama_konsumen ?></td>
                          <td><?= $d->jenis_konsumen ?></td>
                          <td><?= ucfirst($d->nama_wo) ?></td>
                          <td>My Hajat Wedding</td>
                          <?php if ($d->id_approval == 0) { ?>
                            <td><span class="badge badge-secondary">Belum Direview</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/wedding/' . $d->id_wedding) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 1) { ?>
                            <td><span class="badge badge-danger">Ditolak</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/wedding/' . $d->id_wedding) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 2) { ?>
                            <td><span class="badge badge-success">Disetujui Admin 1</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/wedding/' . $d->id_wedding) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 3) { ?>
                            <td><span class="badge badge-primary">Selesai</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/wedding/' . $d->id_wedding) ?>">Detail</a></td>
                          <?php } ?>
                        </tr>
                        <?php
                        $no++;
                      } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            <?php } ?>

            <!-- My Hajat Wedding Table -->
            <?php if ($myhajat_franchise_records->num_rows() > 0) { ?>
              <div class="card mt-4">
                <div class="card-header">
                  <h3 class="card-title">Tabel My Hajat Franchise</h3>
                </div>
                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <th>ID Ticket</th>
                      <th>Nama Konsumen</th>
                      <th>Jenis Konsumen</th>
                      <th>Nama Franchise</th>
                      <th>Produk</th>
                      <th>Ticket Status</th>
                      <th></th>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($myhajat_franchise_records->result() as $d) {  ?>
                        <tr>
                          <td>#<?= $d->id_franchise ?></td>
                          <td><?= $d->nama_konsumen ?></td>
                          <td><?= $d->jenis_konsumen ?></td>
                          <td><?= ucfirst($d->nama_franchise) ?></td>
                          <td>My Hajat Franchise</td>
                          <?php if ($d->id_approval == 0) { ?>
                            <td><span class="badge badge-secondary">Belum Direview</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/wedding/' . $d->id_franchise) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 1) { ?>
                            <td><span class="badge badge-danger">Ditolak</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/wedding/' . $d->id_franchise) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 2) { ?>
                            <td><span class="badge badge-success">Disetujui Admin 1</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/wedding/' . $d->id_franchise) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 3) { ?>
                            <td><span class="badge badge-primary">Selesai</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/wedding/' . $d->id_franchise) ?>">Detail</a></td>
                          <?php } ?>
                        </tr>
                        <?php
                        $no++;
                      } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            <?php } ?>

            <!-- My Hajat Lainnya Table -->
            <?php if ($myhajat_lainnya_records->num_rows() > 0) { ?>
              <div class="card mt-4">
                <div class="card-header">
                  <h3 class="card-title">Tabel My Hajat Lainnya</h3>
                </div>
                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <th>ID Ticket</th>
                      <th>Nama Konsumen</th>
                      <th>Jenis Konsumen</th>
                      <th>Nama Penyedia Jasa</th>
                      <th>Produk</th>
                      <th>Ticket Status</th>
                      <th></th>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($myhajat_lainnya_records->result() as $d) {  ?>
                        <tr>
                          <td>#<?= $d->id_myhajat_lainnya ?></td>
                          <td><?= $d->nama_konsumen ?></td>
                          <td><?= $d->jenis_konsumen ?></td>
                          <td><?= ucfirst($d->nama_penyedia_jasa) ?></td>
                          <td>My Hajat Lainnya</td>
                          <?php if ($d->id_approval == 0) { ?>
                            <td><span class="badge badge-secondary">Belum Direview</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/lainnya/' . $d->id_myhajat_lainnya) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 1) { ?>
                            <td><span class="badge badge-danger">Ditolak</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/lainnya/' . $d->id_myhajat_lainnya) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 2) { ?>
                            <td><span class="badge badge-success">Disetujui Admin 1</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/lainnya/' . $d->id_myhajat_lainnya) ?>">Detail</a></td>
                          <?php } else if ($d->id_approval == 3) { ?>
                            <td><span class="badge badge-primary">Selesai</span></td>
                            <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/lainnya/' . $d->id_myhajat_lainnya) ?>">Detail</a></td>
                          <?php } ?>
                        </tr>
                        <?php
                        $no++;
                      } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            <?php } ?>

          </div>
          <div class="tab-pane container-fluid" id="kategori-produk">
            <div class="row mt-4">
              <!-- Tab panes -->
              <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="<?= base_url('status/approved/myhajat/renovasi') ?>">
                  <div class="card">
                    <div class="card-header text-center">
                      <img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt=""></i>
                    </div>
                    <div class="card-body text-center">
                      <span>My Hajat Renovasi</span><br>
                      <label class="badge badge-success"><?= $approved_myhajat_renovasi ?></span>
                    </div>
                  </div>
                </a>
              </div>


              <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="<?= base_url('status/approved/myhajat/sewa') ?>">
                  <div class="card">
                    <div class="card-header text-center">
                      <img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt="">
                    </div>
                    <div class="card-body text-center">
                      <span>My Hajat Sewa</span><br>
                      <label class="badge badge-success"><?= $approved_myhajat_sewa ?></span>
                    </div>
                  </div>
                </a>
              </div>


              <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="<?= base_url('status/approved/myhajat/wedding') ?>">
                  <div class="card">
                    <div class="card-header text-center">
                      <img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt="">
                    </div>
                    <div class="card-body text-center">
                      <span>My Hajat Wedding</span><br>
                      <label class="badge badge-success"><?= $approved_myhajat_wedding ?></span>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="<?= base_url('status/approved/myhajat/franchise') ?>">
                  <div class="card">
                    <div class="card-header text-center">
                      <img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt="">
                    </div>
                    <div class="card-body text-center">
                      <span>My Hajat Franchise</span><br>
                      <label class="badge badge-success"><?= $approved_myhajat_franchise ?></span>
                    </div>
                  </div>
                </a>
              </div>
            </div>

            <div class="row mt-4">
              <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="<?= base_url('status/approved/myhajat/lainnya') ?>">
                  <div class="card">
                    <div class="card-header text-center">
                      <img src="<?= base_url('assets/img/my-hajat-82.png') ?>" alt="">
                    </div>
                    <div class="card-body text-center">
                      <span>My Hajat Lainnya</span><br>
                      <label class="badge badge-success"><?= $approved_myhajat_lainnya ?></span>
                    </div>
                  </div>
                </a>
              </div>

              <!-- fix for small devices only -->
              <div class="clearfix visible-sm-block"></div>

              <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="<?= base_url('status/approved/mytalim/') ?>">
                  <div class="card">
                    <div class="card-header text-center">
                      <img src="<?= base_url('assets/img/my-talim-82.png') ?>" alt="">
                    </div>
                    <div class="card-body text-center">
                      <span>My Talim</span><br>
                      <label class="badge badge-success"><?= $approved_mytalim ?></span>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <?php }  ?>

</section>