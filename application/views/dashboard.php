  <section class="content-header mt-4">
    <?= $this->session->flashdata('success_request_support') ?>
    <?= $this->session->flashdata('success_update_support') ?>
    <?= $this->session->flashdata('berhasil_approve') ?>
    <?= $this->session->flashdata('berhasil_complete') ?>
    <?= $this->session->flashdata('berhasil_reject') ?>
    <?= $this->session->flashdata('update_profile_success') ?>
    <?= $this->session->flashdata('upload_error') ?>
    <h1 class="text-center">
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
    <!-- Tampilan untuk User Cabang -->
    <?php if ($this->session->userdata('level') == 1) { ?>
      <!-- Report Status Request Support -->
      <div class="row mt-4">
        <!-- Card Pending -->
        <div class="col-md-3 col-sm-6 col-6 mt-2 status-card card-pending" style="cursor: pointer">
          <div class="card text-center p-5">
            <h3 class="card-title">Pending</h3><br>
            <h3><span class="badge badge-secondary"><?= $total_pending ?></span></h3>
          </div>
        </div>
        <!-- Card Approved -->
        <div class="col-md-3 col-sm-6 col-6 mt-2 status-card card-approved" style="cursor: pointer">
          <div class="card text-center p-5">
            <h3 class="card-title">Approved</h3><br>
            <h3><span class="badge badge-success"><?= $total_approved ?></span></h3>
          </div>
        </div>
        <!-- Card Rejected -->
        <div class="col-md-3 col-sm-6 col-6 mt-2 status-card card-rejected" style="cursor: pointer">
          <div class="card text-center p-5">
            <h3 class="card-title">Rejected</h3><br>
            <h3><span class="badge badge-danger"><?= $total_rejected ?></span></h3>
          </div>
        </div>
        <!-- Card Completed -->
        <div class="col-md-3 col-sm-6 col-6 mt-2 status-card card-completed" style="cursor: pointer">
          <div class="card text-center p-5">
            <h3 class="card-title">Completed</h3><br>
            <h3><span class="badge badge-info"><?= $total_completed ?></span></h3>
          </div>
        </div>
      </div>

      <!-- Daftar Support Tiket -->
      <div class="card mt-4">
        <div class="card-header">
          <h3 class="card-title">Daftar Support Tiket</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <!-- Form Input Produk -->
            <div class="col-md-2 col-sm-6 col-6 mt-1 mt-2">
              <a href="<?= base_url('ticket_register/form_input_produk') ?>">
                <div class="card">
                  <div class="card-header text-center">
                    <img class="img-fluid" src="<?= base_url('assets2/img/no-pict.png') ?>" width="100" height="82" alt="">
                  </div>
                  <div class="card-body text-center p-2 p-2">
                    Form Input Produk
                  </div>
                </div>
              </a>
            </div>

            <!-- Form Lead Management -->
            <div class="col-md-2 col-sm-6 col-6 mt-1 mt-2">
              <a href="<?= base_url('ticket_register/form_lead_management') ?>">
                <div class="card">
                  <div class="card-header text-center">
                    <img class="img-fluid" src="<?= base_url('assets2/img/no-pict.png') ?>" width="100" height="82" alt="">
                  </div>
                  <div class="card-body text-center p-2 p-2">
                    Form Lead Management
                  </div>
                </div>
              </a>
            </div>
            <!-- Form Aktivasi Agent -->
            <div class="col-md-2 col-sm-6 col-6 mt-1 mt-2">
              <a href="<?= base_url('ticket_register/form_aktivasi_agent') ?>">
                <div class="card">
                  <div class="card-header text-center">
                    <img class="img-fluid" src="<?= base_url('assets2/img/no-pict.png') ?>" width="100" height="82" alt="">
                  </div>
                  <div class="card-body text-center p-2 p-2">
                    Form Aktivasi Agent
                  </div>
                </div>
              </a>
            </div>

            <!-- Form NST -->
            <div class="col-md-2 col-sm-6 col-6 mt-1 mt-2">
              <a href="<?= base_url('ticket_register/form_nst') ?>">
                <div class="card">
                  <div class="card-header text-center">
                    <img class="img-fluid" src="<?= base_url('assets2/img/no-pict.png') ?>" width="100" height="82" alt="">
                  </div>
                  <div class="card-body text-center p-2 p-2">
                    Form NST
                  </div>
                </div>
              </a>
            </div>

          </div>
        </div>
      </div>

      <!-- Nav tabs -->
      <ul class="nav nav-tabs mt-4">
        <li class="nav-item active">
          <a class="nav-link active" data-toggle="tab" href="#pending">Pending <label class="badge badge-secondary"><?= $total_pending ?></label></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#approved">Approved <label class="badge badge-success"><?= $total_approved ?></label></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#rejected">Rejected <label class="badge badge-danger"><?= $total_rejected ?></label></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#completed">Completed <label class="badge badge-info"><?= $total_completed ?></label></a>
        </li>
      </ul>
      <br>

      <div class="tab-content">


        <!-- Tab Pending -->
        <div class="tab-pane container-fluid active" id="pending">

          <!-- Table Pending -->
          <table class="display status responsive" width="100%">
            <thead>
              <tr>
                <th class="all">ID Ticket</th>
                <th>User Pengaju</th>
                <th class="all">Cabang</th>
                <th>Nama Konsumen</th>
                <th class="all">Produk</th>
                <th class="all">Ticket Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($ticket_records_pending->result() as $tickets) {
                if ($tickets->id_mytalim != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_mytalim ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_mytalim == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_mysafar != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_mysafar ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_mysafar == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_myihram != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_myihram ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_myihram == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_lead != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_lead_management ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_lead_management == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/lead_management/id/' . $tickets->id_lead) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lead_management == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/lead_management/id/' . $tickets->id_lead) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lead_management == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/lead_management/id/' . $tickets->id_lead) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lead_management == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/lead_management/id/' . $tickets->id_lead) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_agent != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_aktivasi_agent ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_aktivasi_agent == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_nst != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_nst ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_nst == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/nst/id/' . $tickets->id_nst) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_nst == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/nst/id/' . $tickets->id_nst) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_nst == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/nst/id/' . $tickets->id_nst) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_nst == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/nst/id/' . $tickets->id_nst) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_renovasi != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_renovasi ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_renovasi == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_sewa != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_sewa ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_sewa == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_wedding != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_wedding ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_wedding == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_franchise != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_franchise ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_franchise == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_myhajat_lainnya != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_lainnya ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_lainnya == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }
              } ?>
            </tbody>
          </table>

        </div>

        <!-- Tab Approved -->
        <div class="tab-pane container-fluid fade" id="approved">

          <!-- Table Approved -->
          <table class="display status responsive" width="100%">
            <thead>
              <tr>
                <th class="all">ID Ticket</th>
                <th>User Pengaju</th>
                <th class="all">Cabang</th>
                <th>Nama Konsumen</th>
                <th class="all">Produk</th>
                <th class="all">Ticket Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($ticket_records_approved->result() as $tickets) {
                if ($tickets->id_mytalim != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_mytalim ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_mytalim == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_mysafar != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_mysafar ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_mysafar == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_myihram != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_myihram ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_myihram == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_lead != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_lead_management ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_lead_management == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/lead_management/id/' . $tickets->id_lead) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lead_management == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/lead_management/id/' . $tickets->id_lead) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lead_management == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/lead_management/id/' . $tickets->id_lead) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lead_management == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/lead_management/id/' . $tickets->id_lead) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_agent != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_aktivasi_agent ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_aktivasi_agent == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_nst != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_nst ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_nst == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/nst/id/' . $tickets->id_nst) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_nst == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/nst/id/' . $tickets->id_nst) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_nst == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/nst/id/' . $tickets->id_nst) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_nst == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/nst/id/' . $tickets->id_nst) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_renovasi != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_renovasi ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_renovasi == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_sewa != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_sewa ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_sewa == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_wedding != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_wedding ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_wedding == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_franchise != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_franchise ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_franchise == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_myhajat_lainnya != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_lainnya ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_lainnya == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }
              } ?>
            </tbody>
          </table>

        </div>


        <!-- Tab Rejected -->
        <div class="tab-pane container-fluid fade" id="rejected">

          <!-- Table Rejected -->
          <table class="display status responsive" width="100%">
            <thead>
              <tr>
                <th class="all">ID Ticket</th>
                <th>User Pengaju</th>
                <th class="all">Cabang</th>
                <th>Nama Konsumen</th>
                <th class="all">Produk</th>
                <th class="all">Ticket Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($ticket_records_rejected->result() as $tickets) {
                if ($tickets->id_mytalim != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_mytalim ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_mytalim == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_mysafar != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_mysafar ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_mysafar == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_myihram != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_myihram ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_myihram == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_lead != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_lead_management ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_lead_management == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/lead_management/id/' . $tickets->id_lead) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lead_management == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/lead_management/id/' . $tickets->id_lead) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lead_management == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/lead_management/id/' . $tickets->id_lead) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lead_management == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/lead_management/id/' . $tickets->id_lead) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_agent != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_aktivasi_agent ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_aktivasi_agent == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_nst != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_nst ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_nst == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/nst/id/' . $tickets->id_nst) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_nst == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/nst/id/' . $tickets->id_nst) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_nst == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/nst/id/' . $tickets->id_nst) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_nst == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/nst/id/' . $tickets->id_nst) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_renovasi != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_renovasi ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_renovasi == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_sewa != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_sewa ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_sewa == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_wedding != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_wedding ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_wedding == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_franchise != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_franchise ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_franchise == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_myhajat_lainnya != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_lainnya ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_lainnya == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }
              } ?>
            </tbody>
          </table>

        </div>

        <!-- Tab completed -->
        <div class="tab-pane container-fluid fade" id="completed">

          <!-- Table Completed -->
          <table class="display status responsive" width="100%">
            <thead>
              <tr>
                <th class="all">ID Ticket</th>
                <th>User Pengaju</th>
                <th class="all">Cabang</th>
                <th>Nama Konsumen</th>
                <th class="all">Produk</th>
                <th class="all">Ticket Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($ticket_records_completed->result() as $tickets) {
                if ($tickets->id_mytalim != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_mytalim ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_mytalim == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_mysafar != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_mysafar ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_mysafar == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_myihram != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_myihram ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_myihram == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_lead != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_lead_management ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_lead_management == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/lead_management/id/' . $tickets->id_lead) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lead_management == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/lead_management/id/' . $tickets->id_lead) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lead_management == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/lead_management/id/' . $tickets->id_lead) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lead_management == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/lead_management/id/' . $tickets->id_lead) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_agent != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_aktivasi_agent ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_aktivasi_agent == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_nst != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_nst ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_nst == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/nst/id/' . $tickets->id_nst) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_nst == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/nst/id/' . $tickets->id_nst) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_nst == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/nst/id/' . $tickets->id_nst) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_nst == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/nst/id/' . $tickets->id_nst) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_renovasi != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_renovasi ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_renovasi == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_sewa != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_sewa ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_sewa == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_wedding != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_wedding ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_wedding == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_franchise != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_franchise ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_franchise == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_myhajat_lainnya != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_lainnya ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_lainnya == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }
              } ?>
            </tbody>
          </table>

        </div>
      </div>


    <?php }  ?>

    <!-- Admin 1 Lia -->
    <?php if ($this->session->userdata('level') == 2) { ?>
      <!-- Report Status Request Support -->
      <div class="row mt-4">
        <div class="col-lg-3 col-md-3 col-sm-6 col-6 status-card card-pending mt-2" style="cursor: pointer">
          <div class="card text-center p-5">
            <h3 class="card-title">Pending</h3><br>
            <h3><span class="badge badge-secondary"><?= $total_pending ?></span></h3>
          </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-6 status-card card-approved mt-2" style="cursor: pointer">
          <div class="card text-center p-5">
            <h3 class="card-title">Approved</h3><br>
            <h3><span class="badge badge-success"><?= $total_approved ?></span></h3>
          </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-6 status-card card-rejected mt-2" style="cursor: pointer">
          <div class="card text-center p-5">
            <h3 class="card-title">Rejected</h3><br>
            <h3><span class="badge badge-danger"><?= $total_rejected ?></span></h3>
          </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-6 status-card card-completed mt-2" style="cursor: pointer">
          <div class="card text-center p-5">
            <h3 class="card-title">Completed</h3><br>
            <h3><span class="badge badge-info"><?= $total_completed ?></span></h3>
          </div>
        </div>
      </div>


      <!-- Nav tabs -->
      <ul class="nav nav-tabs mt-4">
        <li class="nav-item active">
          <a class="nav-link active" data-toggle="tab" href="#pending">Pending <label class="badge badge-secondary"><?= $total_pending ?></label></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#approved">Approved <label class="badge badge-success"><?= $total_approved ?></label></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#rejected">Rejected <label class="badge badge-danger"><?= $total_rejected ?></label></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#completed">Completed <label class="badge badge-info"><?= $total_completed ?></label></a>
        </li>
      </ul>
      <br>

      <div class="tab-content">


        <!-- Tab Pending -->
        <div class="tab-pane container-fluid active" id="pending">

          <!-- Table Pending -->
          <table class="display status responsive" width="100%">
            <thead>
              <tr>
                <th class="all">ID Ticket</th>
                <th>User Pengaju</th>
                <th class="all">Cabang</th>
                <th>Nama Konsumen</th>
                <th class="all">Produk</th>
                <th class="all">Ticket Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($ticket_records_pending->result() as $tickets) {
                if ($tickets->id_mytalim != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_mytalim ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_mytalim == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_mysafar != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_mysafar ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_mysafar == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_myihram != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_myihram ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_myihram == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }


                if ($tickets->id_agent != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_aktivasi_agent ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_aktivasi_agent == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }


                if ($tickets->id_renovasi != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_renovasi ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_renovasi == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_sewa != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_sewa ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_sewa == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_wedding != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_wedding ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_wedding == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_franchise != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_franchise ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_franchise == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_myhajat_lainnya != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_lainnya ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_lainnya == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }
              } ?>
            </tbody>
          </table>

        </div>

        <!-- Tab Approved -->
        <div class="tab-pane container-fluid fade" id="approved">

          <!-- Table Approved -->
          <table class="display status responsive" width="100%">
            <thead>
              <tr>
                <th class="all">ID Ticket</th>
                <th>User Pengaju</th>
                <th class="all">Cabang</th>
                <th>Nama Konsumen</th>
                <th class="all">Produk</th>
                <th class="all">Ticket Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($ticket_records_approved->result() as $tickets) {
                if ($tickets->id_mytalim != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_mytalim ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_mytalim == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_mysafar != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_mysafar ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_mysafar == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_myihram != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_myihram ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_myihram == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }


                if ($tickets->id_agent != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_aktivasi_agent ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_aktivasi_agent == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }


                if ($tickets->id_renovasi != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_renovasi ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_renovasi == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_sewa != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_sewa ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_sewa == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_wedding != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_wedding ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_wedding == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_franchise != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_franchise ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_franchise == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_myhajat_lainnya != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_lainnya ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_lainnya == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }
              } ?>
            </tbody>
          </table>

        </div>


        <!-- Tab Rejected -->
        <div class="tab-pane container-fluid fade" id="rejected">

          <!-- Table Rejected -->
          <table class="display status responsive" width="100%">
            <thead>
              <tr>
                <th class="all">ID Ticket</th>
                <th>User Pengaju</th>
                <th class="all">Cabang</th>
                <th>Nama Konsumen</th>
                <th class="all">Produk</th>
                <th class="all">Ticket Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($ticket_records_rejected->result() as $tickets) {
                if ($tickets->id_mytalim != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_mytalim ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_mytalim == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_mysafar != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_mysafar ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_mysafar == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_myihram != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_myihram ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_myihram == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }


                if ($tickets->id_agent != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_aktivasi_agent ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_aktivasi_agent == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }


                if ($tickets->id_renovasi != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_renovasi ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_renovasi == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_sewa != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_sewa ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_sewa == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_wedding != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_wedding ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_wedding == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_franchise != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_franchise ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_franchise == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_myhajat_lainnya != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_lainnya ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_lainnya == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }
              } ?>
            </tbody>
          </table>

        </div>

        <!-- Tab completed -->
        <div class="tab-pane container-fluid fade" id="completed">

          <!-- Table Completed -->
          <table class="display status responsive" width="100%">
            <thead>
              <tr>
                <th class="all">ID Ticket</th>
                <th>User Pengaju</th>
                <th class="all">Cabang</th>
                <th>Nama Konsumen</th>
                <th class="all">Produk</th>
                <th class="all">Ticket Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($ticket_records_completed->result() as $tickets) {
                if ($tickets->id_mytalim != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_mytalim ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_mytalim == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_mysafar != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_mysafar ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_mysafar == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_myihram != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_myihram ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_myihram == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }


                if ($tickets->id_agent != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_aktivasi_agent ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_aktivasi_agent == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }


                if ($tickets->id_renovasi != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_renovasi ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_renovasi == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_sewa != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_sewa ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_sewa == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_wedding != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_wedding ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_wedding == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_franchise != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_franchise ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_franchise == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_myhajat_lainnya != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_lainnya ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_lainnya == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }
              } ?>
            </tbody>
          </table>

        </div>
      </div>

    <?php }  ?>

    <!-- Admin 2 Gede -->
    <?php if ($this->session->userdata('level') == 3) { ?>
      <!-- Report Status Request Support -->
      <div class="row mt-4">

        <div class="col-lg-4 col-md-4 col-sm-6 col-6 status-card card-approved mt-2" style="cursor: pointer">
          <!-- Disetujui Admin 1  -->
          <div class="card text-center p-5">
            <h3 class="card-title">Disetujui Admin 1</h3><br>
            <h3><span class="badge badge-success"><?= $total_approved ?></span></h3>
          </div>
        </div>
        <!-- Ditolak -->
        <div class="col-lg-4 col-md-4 col-sm-6 col-6 status-card card-rejected mt-2" style="cursor: pointer">
          <div class="card text-center p-5">
            <h3 class="card-title">Ditolak</h3><br>
            <h3><span class="badge badge-danger"><?= $total_rejected ?></span></h3>
          </div>
        </div>

        <!-- Selesai -->
        <div class="col-lg-4 col-md-4 col-sm-6 col-6 status-card card-completed mt-2" style="cursor: pointer">
          <div class="card text-center p-5">
            <h3 class="card-title">Selesai</h3><br>
            <h3><span class="badge badge-info"><?= $total_completed ?></span></h3>
          </div>
        </div>
      </div>

     <!-- Nav tabs -->
     <ul class="nav nav-tabs mt-4">
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#pending">Pending <label class="badge badge-secondary"><?= $total_pending ?></label></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link active" data-toggle="tab" href="#approved">Approved <label class="badge badge-success"><?= $total_approved ?></label></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#rejected">Rejected <label class="badge badge-danger"><?= $total_rejected ?></label></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#completed">Completed <label class="badge badge-info"><?= $total_completed ?></label></a>
        </li>
      </ul>
      <br>

      <div class="tab-content">


        <!-- Tab Pending -->
        <div class="tab-pane container-fluid fade" id="pending">

          <!-- Table Pending -->
          <table class="display status responsive" width="100%">
            <thead>
              <tr>
                <th class="all">ID Ticket</th>
                <th>User Pengaju</th>
                <th class="all">Cabang</th>
                <th>Nama Konsumen</th>
                <th class="all">Produk</th>
                <th class="all">Ticket Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($ticket_records_pending->result() as $tickets) {
                if ($tickets->id_mytalim != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_mytalim ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_mytalim == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_mysafar != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_mysafar ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_mysafar == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_myihram != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_myihram ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_myihram == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }


                if ($tickets->id_agent != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_aktivasi_agent ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_aktivasi_agent == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }


                if ($tickets->id_renovasi != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_renovasi ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_renovasi == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_sewa != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_sewa ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_sewa == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_wedding != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_wedding ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_wedding == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_franchise != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_franchise ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_franchise == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_myhajat_lainnya != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_lainnya ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_lainnya == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }
              } ?>
            </tbody>
          </table>

        </div>

        <!-- Tab Approved -->
        <div class="tab-pane container-fluid active" id="approved">

          <!-- Table Approved -->
          <table class="display status responsive" width="100%">
            <thead>
              <tr>
                <th class="all">ID Ticket</th>
                <th>User Pengaju</th>
                <th class="all">Cabang</th>
                <th>Nama Konsumen</th>
                <th class="all">Produk</th>
                <th class="all">Ticket Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($ticket_records_approved->result() as $tickets) {
                if ($tickets->id_mytalim != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_mytalim ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_mytalim == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_mysafar != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_mysafar ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_mysafar == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_myihram != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_myihram ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_myihram == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }


                if ($tickets->id_agent != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_aktivasi_agent ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_aktivasi_agent == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }


                if ($tickets->id_renovasi != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_renovasi ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_renovasi == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_sewa != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_sewa ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_sewa == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_wedding != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_wedding ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_wedding == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_franchise != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_franchise ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_franchise == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_myhajat_lainnya != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_lainnya ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_lainnya == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }
              } ?>
            </tbody>
          </table>

        </div>


        <!-- Tab Rejected -->
        <div class="tab-pane container-fluid fade" id="rejected">

          <!-- Table Rejected -->
          <table class="display status responsive" width="100%">
            <thead>
              <tr>
                <th class="all">ID Ticket</th>
                <th>User Pengaju</th>
                <th class="all">Cabang</th>
                <th>Nama Konsumen</th>
                <th class="all">Produk</th>
                <th class="all">Ticket Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($ticket_records_rejected->result() as $tickets) {
                if ($tickets->id_mytalim != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_mytalim ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_mytalim == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_mysafar != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_mysafar ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_mysafar == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_myihram != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_myihram ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_myihram == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }


                if ($tickets->id_agent != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_aktivasi_agent ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_aktivasi_agent == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }


                if ($tickets->id_renovasi != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_renovasi ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_renovasi == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_sewa != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_sewa ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_sewa == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_wedding != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_wedding ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_wedding == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_franchise != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_franchise ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_franchise == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_myhajat_lainnya != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_lainnya ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_lainnya == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }
              } ?>
            </tbody>
          </table>

        </div>

        <!-- Tab completed -->
        <div class="tab-pane container-fluid fade" id="completed">

          <!-- Table Completed -->
          <table class="display status responsive" width="100%">
            <thead>
              <tr>
                <th class="all">ID Ticket</th>
                <th>User Pengaju</th>
                <th class="all">Cabang</th>
                <th>Nama Konsumen</th>
                <th class="all">Produk</th>
                <th class="all">Ticket Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($ticket_records_completed->result() as $tickets) {
                if ($tickets->id_mytalim != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_mytalim ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_mytalim == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mytalim == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_mysafar != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_mysafar ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_mysafar == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_mysafar == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_myihram != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_myihram ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_myihram == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_myihram == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }


                if ($tickets->id_agent != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_aktivasi_agent ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_aktivasi_agent == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_aktivasi_agent == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }


                if ($tickets->id_renovasi != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_renovasi ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_renovasi == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_renovasi == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_sewa != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_sewa ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_sewa == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_sewa == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_wedding != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_wedding ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_wedding == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_wedding == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_franchise != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_franchise ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_franchise == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_franchise == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }

                if ($tickets->id_myhajat_lainnya != NULL) {
                  ?>
                  <tr>
                    <td width="10%">#<?= $tickets->id_ticket ?></td>
                    <td><?= $tickets->name ?></td>
                    <td><?= $tickets->nama_cabang ?></td>
                    <td><?= $tickets->nama_konsumen_lainnya ?></td>
                    <td><?= $tickets->produk ?></td>
                    <?php if ($tickets->id_approval_lainnya == 0) { ?>
                      <td><span class="badge badge-secondary pending">Pending</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 1) { ?>
                      <td><span class="badge badge-danger rejected">Ditolak</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 2) { ?>
                      <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } else if ($tickets->id_approval_lainnya == 3) { ?>
                      <td><span class="badge badge-info completed">Selesai</span></td>
                      <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                    <?php } ?>
                  </tr>
                  <?php
                  $no++;
                }
              } ?>
            </tbody>
          </table>

        </div>
      </div>
      </div>
    <?php }  ?>

    <!-- Admin NST Arif -->
    <?php if ($this->session->userdata('level') == 4) { ?>
      <div class="card">
        <div class="card-body p-0">

              <!-- NST Table -->
                <div class="card mt-4">
                  <div class="card-header">
                    <h3 class="card-title">Tabel NST</h3>
                  </div>
                  <div class="card-body p-0">
                    <table class="display status responsive" width="100%">
                      <thead>
                        <tr>
                          <th>ID NST</th>
                          <th>Lead ID</th>
                          <th>Date</th>
                          <th>Nama Konsumen</th>
                          <th class="all">Produk</th>
                          <th>Ticket Status</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($nst_records->result() as $d) {  ?>
                          <tr>
                            <td width="1%">#<?= $d->id_nst ?></td>
                            <td><?= $d->lead_id ?></td>
                            <td><?= $d->tanggal_diubah ?></td>
                            <td><?= $d->nama_konsumen ?></td>
                            <td><?= $d->produk ?></td>
                            <?php if ($d->id_approval == 0) { ?>
                              <td><span class="badge badge-secondary pending">Pending</span></td>
                              <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/nst/id/' . $d->id_nst) ?>">Detail</a></td>
                            <?php } else if ($d->id_approval == 1) { ?>
                              <td><span class="badge badge-danger rejected">Ditolak</span></td>
                              <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/nst/id/' . $d->id_nst) ?>">Detail</a></td>
                            <?php } else if ($d->id_approval == 2) { ?>
                              <td><span class="badge badge-success">Disetujui Admin NST</span></td>
                              <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/nst/id/' . $d->id_nst) ?>">Detail</a></td>
                            <?php } else if ($d->id_approval == 3) { ?>
                              <td><span class="badge badge-info completed">Selesai</span></td>
                              <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/nst/id/' . $d->id_nst) ?>">Detail</a></td>
                            <?php } ?>
                          </tr>
                          <?php
                          $no++;
                        } ?>
                      </tbody>
                    </table>
                  </div>
                </div>

              <!-- Lead Management Table -->
                <div class="card mt-4">
                  <div class="card-header">
                    <h3 class="card-title">Tabel Lead Management</h3>
                  </div>
                  <div class="card-body p-0">
                    <table class="display status responsive" width="100%">
                      <thead>
                        <tr>
                          <th>ID Lead Mgt.</th>
                          <th>Lead ID</th>
                          <th>Date</th>
                          <th>Nama Konsumen</th>
                          <th>Sumber Lead</th>
                          <th class="all">Produk</th>
                          <th>Ticket Status</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($lead_management_records->result() as $d) {  ?>
                          <tr>
                            <td width="1%">#<?= $d->id_lead ?></td>
                            <td><?= ucfirst($d->lead_id) ?></td>
                            <td><?= $d->tanggal_diubah ?></td>
                            <td><?= $d->nama_konsumen ?></td>
                            <td><?= $d->sumber_lead ?></td>
                            <td><?= $d->produk ?></td>
                            <?php if ($d->id_approval == 0) { ?>
                              <td><span class="badge badge-secondary pending">Pending</span></td>
                              <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/lead_management/id/' . $d->id_lead) ?>">Detail</a></td>
                            <?php } else if ($d->id_approval == 1) { ?>
                              <td><span class="badge badge-danger rejected">Ditolak</span></td>
                              <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/lead_management/id/' . $d->id_lead) ?>">Detail</a></td>
                            <?php } else if ($d->id_approval == 2) { ?>
                              <td><span class="badge badge-success">Disetujui Admin NST</span></td>
                              <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/lead_management/id/' . $d->id_lead) ?>">Detail</a></td>
                            <?php } else if ($d->id_approval == 3) { ?>
                              <td><span class="badge badge-info completed">Selesai</span></td>
                              <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/lead_management/id/' . $d->id_lead) ?>">Detail</a></td>
                            <?php } ?>
                          </tr>
                          <?php
                          $no++;
                        } ?>
                      </tbody>
                    </table>
                  </div>
                </div>

        </div>
      </div>
    <?php }  ?>

    <!-- Admin Superuser -->
    <?php if ($this->session->userdata('level') == 5) { ?>
      <!-- Report Status Request Support -->
      <div class="row mt-4">
        <!-- Card Pending -->
        <div class="col-md-3 col-sm-6 col-6 mt-2 status-card card-pending" style="cursor: pointer">
          <div class="card text-center p-5">
            <h3 class="card-title">Pending</h3><br>
            <h3><span class="badge badge-secondary"><?= $total_pending ?></span></h3>
          </div>
        </div>
        <!-- Card Approved -->
        <div class="col-md-3 col-sm-6 col-6 mt-2 status-card card-approved" style="cursor: pointer">
          <div class="card text-center p-5">
            <h3 class="card-title">Approved</h3><br>
            <h3><span class="badge badge-success"><?= $total_approved ?></span></h3>
          </div>
        </div>
        <!-- Card Rejected -->
        <div class="col-md-3 col-sm-6 col-6 mt-2 status-card card-rejected" style="cursor: pointer">
          <div class="card text-center p-5">
            <h3 class="card-title">Rejected</h3><br>
            <h3><span class="badge badge-danger"><?= $total_rejected ?></span></h3>
          </div>
        </div>
        <!-- Card Completed -->
        <div class="col-md-3 col-sm-6 col-6 mt-2 status-card card-completed" style="cursor: pointer">
          <div class="card text-center p-5">
            <h3 class="card-title">Completed</h3><br>
            <h3><span class="badge badge-info"><?= $total_completed ?></span></h3>
          </div>
        </div>
      </div>

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

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Request Support</h3>
            </div>
            <div class="card-body p-0">
              <table class="display status responsive" width="100%">
                <thead>
                  <tr>
                    <th class="all">ID Ticket</th>
                    <th>User Pengaju</th>
                    <th class="all">Cabang</th>
                    <th>Nama Konsumen</th>
                    <th class="all">Produk</th>
                    <th class="all">Ticket Status</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($ticket_records->result() as $tickets) {
                    if ($tickets->id_mytalim != NULL) {
                      ?>
                      <tr>
                        <td width="10%">#<?= $tickets->id_ticket ?></td>
                        <td><?= $tickets->name ?></td>
                        <td><?= $tickets->nama_cabang ?></td>
                        <td><?= $tickets->nama_konsumen_mytalim ?></td>
                        <td><?= $tickets->produk ?></td>
                        <?php if ($tickets->id_approval_mytalim == 0) { ?>
                          <td><span class="badge badge-secondary pending">Pending</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                        <?php } else if ($tickets->id_approval_mytalim == 1) { ?>
                          <td><span class="badge badge-danger rejected">Ditolak</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                        <?php } else if ($tickets->id_approval_mytalim == 2) { ?>
                          <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                        <?php } else if ($tickets->id_approval_mytalim == 3) { ?>
                          <td><span class="badge badge-info completed">Selesai</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/mytalim/id/' . $tickets->id_mytalim) ?>">Detail</a></td>
                        <?php } ?>
                      </tr>
                      <?php
                      $no++;
                    }

                    if ($tickets->id_mysafar != NULL) {
                      ?>
                      <tr>
                        <td width="10%">#<?= $tickets->id_ticket ?></td>
                        <td><?= $tickets->name ?></td>
                        <td><?= $tickets->nama_cabang ?></td>
                        <td><?= $tickets->nama_konsumen_mysafar ?></td>
                        <td><?= $tickets->produk ?></td>
                        <?php if ($tickets->id_approval_mysafar == 0) { ?>
                          <td><span class="badge badge-secondary pending">Pending</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                        <?php } else if ($tickets->id_approval_mysafar == 1) { ?>
                          <td><span class="badge badge-danger rejected">Ditolak</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                        <?php } else if ($tickets->id_approval_mysafar == 2) { ?>
                          <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                        <?php } else if ($tickets->id_approval_mysafar == 3) { ?>
                          <td><span class="badge badge-info completed">Selesai</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/mysafar/id/' . $tickets->id_mysafar) ?>">Detail</a></td>
                        <?php } ?>
                      </tr>
                      <?php
                      $no++;
                    }

                    if ($tickets->id_myihram != NULL) {
                      ?>
                      <tr>
                        <td width="10%">#<?= $tickets->id_ticket ?></td>
                        <td><?= $tickets->name ?></td>
                        <td><?= $tickets->nama_cabang ?></td>
                        <td><?= $tickets->nama_konsumen_myihram ?></td>
                        <td><?= $tickets->produk ?></td>
                        <?php if ($tickets->id_approval_myihram == 0) { ?>
                          <td><span class="badge badge-secondary pending">Pending</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                        <?php } else if ($tickets->id_approval_myihram == 1) { ?>
                          <td><span class="badge badge-danger rejected">Ditolak</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                        <?php } else if ($tickets->id_approval_myihram == 2) { ?>
                          <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                        <?php } else if ($tickets->id_approval_myihram == 3) { ?>
                          <td><span class="badge badge-info completed">Selesai</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myihram/id/' . $tickets->id_myihram) ?>">Detail</a></td>
                        <?php } ?>
                      </tr>
                      <?php
                      $no++;
                    }

                    if ($tickets->id_lead != NULL) {
                      ?>
                      <tr>
                        <td width="10%">#<?= $tickets->id_ticket ?></td>
                        <td><?= $tickets->name ?></td>
                        <td><?= $tickets->nama_cabang ?></td>
                        <td><?= $tickets->nama_konsumen_lead_management ?></td>
                        <td><?= $tickets->produk ?></td>
                        <?php if ($tickets->id_approval_lead_management == 0) { ?>
                          <td><span class="badge badge-secondary pending">Pending</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/lead_management/id/' . $tickets->id_lead) ?>">Detail</a></td>
                        <?php } else if ($tickets->id_approval_lead_management == 1) { ?>
                          <td><span class="badge badge-danger rejected">Ditolak</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/lead_management/id/' . $tickets->id_lead) ?>">Detail</a></td>
                        <?php } else if ($tickets->id_approval_lead_management == 2) { ?>
                          <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/lead_management/id/' . $tickets->id_lead) ?>">Detail</a></td>
                        <?php } else if ($tickets->id_approval_lead_management == 3) { ?>
                          <td><span class="badge badge-info completed">Selesai</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/lead_management/id/' . $tickets->id_lead) ?>">Detail</a></td>
                        <?php } ?>
                      </tr>
                      <?php
                      $no++;
                    }

                    if ($tickets->id_agent != NULL) {
                      ?>
                      <tr>
                        <td width="10%">#<?= $tickets->id_ticket ?></td>
                        <td><?= $tickets->name ?></td>
                        <td><?= $tickets->nama_cabang ?></td>
                        <td><?= $tickets->nama_aktivasi_agent ?></td>
                        <td><?= $tickets->produk ?></td>
                        <?php if ($tickets->id_approval_aktivasi_agent == 0) { ?>
                          <td><span class="badge badge-secondary pending">Pending</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                        <?php } else if ($tickets->id_approval_aktivasi_agent == 1) { ?>
                          <td><span class="badge badge-danger rejected">Ditolak</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                        <?php } else if ($tickets->id_approval_aktivasi_agent == 2) { ?>
                          <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                        <?php } else if ($tickets->id_approval_aktivasi_agent == 3) { ?>
                          <td><span class="badge badge-info completed">Selesai</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/aktivasi_agent/id/' . $tickets->id_agent) ?>">Detail</a></td>
                        <?php } ?>
                      </tr>
                      <?php
                      $no++;
                    }

                    if ($tickets->id_nst != NULL) {
                      ?>
                      <tr>
                        <td width="10%">#<?= $tickets->id_ticket ?></td>
                        <td><?= $tickets->name ?></td>
                        <td><?= $tickets->nama_cabang ?></td>
                        <td><?= $tickets->nama_konsumen_nst ?></td>
                        <td><?= $tickets->produk ?></td>
                        <?php if ($tickets->id_approval_nst == 0) { ?>
                          <td><span class="badge badge-secondary pending">Pending</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/nst/id/' . $tickets->id_nst) ?>">Detail</a></td>
                        <?php } else if ($tickets->id_approval_nst == 1) { ?>
                          <td><span class="badge badge-danger rejected">Ditolak</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/nst/id/' . $tickets->id_nst) ?>">Detail</a></td>
                        <?php } else if ($tickets->id_approval_nst == 2) { ?>
                          <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/nst/id/' . $tickets->id_nst) ?>">Detail</a></td>
                        <?php } else if ($tickets->id_approval_nst == 3) { ?>
                          <td><span class="badge badge-info completed">Selesai</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/nst/id/' . $tickets->id_nst) ?>">Detail</a></td>
                        <?php } ?>
                      </tr>
                      <?php
                      $no++;
                    }

                    if ($tickets->id_renovasi != NULL) {
                      ?>
                      <tr>
                        <td width="10%">#<?= $tickets->id_ticket ?></td>
                        <td><?= $tickets->name ?></td>
                        <td><?= $tickets->nama_cabang ?></td>
                        <td><?= $tickets->nama_konsumen_renovasi ?></td>
                        <td><?= $tickets->produk ?></td>
                        <?php if ($tickets->id_approval_renovasi == 0) { ?>
                          <td><span class="badge badge-secondary pending">Pending</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                        <?php } else if ($tickets->id_approval_renovasi == 1) { ?>
                          <td><span class="badge badge-danger rejected">Ditolak</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                        <?php } else if ($tickets->id_approval_renovasi == 2) { ?>
                          <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                        <?php } else if ($tickets->id_approval_renovasi == 3) { ?>
                          <td><span class="badge badge-info completed">Selesai</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/renovasi/' . $tickets->id_renovasi) ?>">Detail</a></td>
                        <?php } ?>
                      </tr>
                      <?php
                      $no++;
                    }

                    if ($tickets->id_sewa != NULL) {
                      ?>
                      <tr>
                        <td width="10%">#<?= $tickets->id_ticket ?></td>
                        <td><?= $tickets->name ?></td>
                        <td><?= $tickets->nama_cabang ?></td>
                        <td><?= $tickets->nama_konsumen_sewa ?></td>
                        <td><?= $tickets->produk ?></td>
                        <?php if ($tickets->id_approval_sewa == 0) { ?>
                          <td><span class="badge badge-secondary pending">Pending</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                        <?php } else if ($tickets->id_approval_sewa == 1) { ?>
                          <td><span class="badge badge-danger rejected">Ditolak</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                        <?php } else if ($tickets->id_approval_sewa == 2) { ?>
                          <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                        <?php } else if ($tickets->id_approval_sewa == 3) { ?>
                          <td><span class="badge badge-info completed">Selesai</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/sewa/' . $tickets->id_sewa) ?>">Detail</a></td>
                        <?php } ?>
                      </tr>
                      <?php
                      $no++;
                    }

                    if ($tickets->id_wedding != NULL) {
                      ?>
                      <tr>
                        <td width="10%">#<?= $tickets->id_ticket ?></td>
                        <td><?= $tickets->name ?></td>
                        <td><?= $tickets->nama_cabang ?></td>
                        <td><?= $tickets->nama_konsumen_wedding ?></td>
                        <td><?= $tickets->produk ?></td>
                        <?php if ($tickets->id_approval_wedding == 0) { ?>
                          <td><span class="badge badge-secondary pending">Pending</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                        <?php } else if ($tickets->id_approval_wedding == 1) { ?>
                          <td><span class="badge badge-danger rejected">Ditolak</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                        <?php } else if ($tickets->id_approval_wedding == 2) { ?>
                          <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                        <?php } else if ($tickets->id_approval_wedding == 3) { ?>
                          <td><span class="badge badge-info completed">Selesai</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/wedding/' . $tickets->id_wedding) ?>">Detail</a></td>
                        <?php } ?>
                      </tr>
                      <?php
                      $no++;
                    }

                    if ($tickets->id_franchise != NULL) {
                      ?>
                      <tr>
                        <td width="10%">#<?= $tickets->id_ticket ?></td>
                        <td><?= $tickets->name ?></td>
                        <td><?= $tickets->nama_cabang ?></td>
                        <td><?= $tickets->nama_konsumen_franchise ?></td>
                        <td><?= $tickets->produk ?></td>
                        <?php if ($tickets->id_approval_franchise == 0) { ?>
                          <td><span class="badge badge-secondary pending">Pending</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                        <?php } else if ($tickets->id_approval_franchise == 1) { ?>
                          <td><span class="badge badge-danger rejected">Ditolak</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                        <?php } else if ($tickets->id_approval_franchise == 2) { ?>
                          <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                        <?php } else if ($tickets->id_approval_franchise == 3) { ?>
                          <td><span class="badge badge-info completed">Selesai</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/franchise/' . $tickets->id_franchise) ?>">Detail</a></td>
                        <?php } ?>
                      </tr>
                      <?php
                      $no++;
                    }

                    if ($tickets->id_myhajat_lainnya != NULL) {
                      ?>
                      <tr>
                        <td width="10%">#<?= $tickets->id_ticket ?></td>
                        <td><?= $tickets->name ?></td>
                        <td><?= $tickets->nama_cabang ?></td>
                        <td><?= $tickets->nama_konsumen_lainnya ?></td>
                        <td><?= $tickets->produk ?></td>
                        <?php if ($tickets->id_approval_lainnya == 0) { ?>
                          <td><span class="badge badge-secondary pending">Pending</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                        <?php } else if ($tickets->id_approval_lainnya == 1) { ?>
                          <td><span class="badge badge-danger rejected">Ditolak</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                        <?php } else if ($tickets->id_approval_lainnya == 2) { ?>
                          <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                        <?php } else if ($tickets->id_approval_lainnya == 3) { ?>
                          <td><span class="badge badge-info completed">Selesai</span></td>
                          <td><a class="btn btn-info btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">Detail</a></td>
                        <?php } ?>
                      </tr>
                      <?php
                      $no++;
                    }
                  } ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>

        <div class="tab-pane container-fluid fade" id="kategori-produk">

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
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#completed">Completed <label class="badge badge-info"><?= $total_completed ?></label></a>
            </li>
          </ul>

          <div class="tab-content">

            <div class="tab-pane container-fluid active" id="pending">
              <div class="row mt-4">

                <div class="col-md-3 col-sm-6 col-6 mt-1">
                  <a href="<?= base_url('status/pending/myhajat/') ?>">
                    <div class="card">
                      <div class="card-header text-center">
                        <img src="<?= base_url('assets2/img/my-hajat-82.png') ?>" alt=""></i>
                      </div>
                      <div class="card-body text-center p-2">
                        <span>My Hajat</span><br>
                        <label class="badge badge-secondary"><?= $total_pending_myhajat ?></span>
                      </div>
                    </div>
                  </a>
                </div>


                <div class="col-md-3 col-sm-6 col-6 mt-1">
                  <a href="<?= base_url('status/pending/mytalim/') ?>">
                    <div class="card">
                      <div class="card-header text-center">
                        <img src="<?= base_url('assets2/img/my-talim-82.png') ?>" alt="">
                      </div>
                      <div class="card-body text-center p-2">
                        <span>My Talim</span><br>
                        <label class="badge badge-secondary"><?= $pending_mytalim ?></label>
                      </div>
                    </div>
                  </a>
                </div>

                <div class="col-md-3 col-sm-6 col-6 mt-1">
                  <a href="<?= base_url('status/pending/myihram/') ?>">
                    <div class="card">
                      <div class="card-header text-center">
                        <img src="<?= base_url('assets2/img/my-ihram-82.png') ?>" alt="">
                      </div>
                      <div class="card-body text-center p-2">
                        <span>My Ihram</span><br>
                        <label class="badge badge-secondary"><?= $pending_myihram ?></label>
                      </div>
                    </div>
                  </a>
                </div>

                <div class="col-md-3 col-sm-6 col-6 mt-1">
                  <a href="<?= base_url('status/pending/mysafar/') ?>">
                    <div class="card">
                      <div class="card-header text-center">
                        <img src="<?= base_url('assets2/img/my-safar-82.png') ?>" alt="">
                      </div>
                      <div class="card-body text-center p-2">
                        <span>My Safar</span><br>
                        <label class="badge badge-secondary"><?= $pending_mysafar ?></label>
                      </div>
                    </div>
                  </a>
                </div>

              </div>

              <div class="row mt-4">

                <div class="col-md-3 col-sm-6 col-6 mt-1">
                  <a href="<?= base_url('status/pending/aktivasi_agent/') ?>">
                    <div class="card">
                      <div class="card-header text-center">
                        <img src="<?= base_url('assets2/img/no-pict.png') ?>" alt="" height="82" width="100">
                      </div>
                      <div class="card-body text-center p-2">
                        <span>Aktivasi Agent</span><br>
                        <label class="badge badge-secondary"><?= $pending_aktivasi_agent ?></label>
                      </div>
                    </div>
                  </a>
                </div>

                <div class="col-md-3 col-sm-6 col-6 mt-1">
                  <a href="<?= base_url('status/pending/nst') ?>">
                    <div class="card">
                      <div class="card-header text-center">
                        <img src="<?= base_url('assets2/img/no-pict.png') ?>" alt="" height="82" width="100"></i>
                      </div>
                      <div class="card-body text-center p-2">
                        <span>NST</span><br>
                        <label class="badge badge-secondary"><?= $pending_nst ?></span>
                      </div>
                    </div>
                  </a>
                </div>

                <div class="col-md-3 col-sm-6 col-6 mt-1">
                  <a href="<?= base_url('status/pending/lead_management') ?>">
                    <div class="card">
                      <div class="card-header text-center">
                        <img src="<?= base_url('assets2/img/no-pict.png') ?>" alt="" height="82" width="100"></i>
                      </div>
                      <div class="card-body text-center p-2">
                        <span>Lead Management</span><br>
                        <label class="badge badge-secondary"><?= $pending_lead_management ?></span>
                      </div>
                    </div>
                  </a>
                </div>

              </div>

            </div>

            <div class="tab-pane container-fluid fade" id="approved">
              <div class="row mt-4">

                <div class="col-md-3 col-sm-6 col-6 mt-1">
                  <a href="<?= base_url('status/approved/myhajat/') ?>">
                    <div class="card">
                      <div class="card-header text-center">
                        <img src="<?= base_url('assets2/img/my-hajat-82.png') ?>" alt=""></i>
                      </div>
                      <div class="card-body text-center p-2">
                        <span>My Hajat</span><br>
                        <label class="badge badge-success"><?= $total_approved_myhajat ?></span>
                      </div>
                    </div>
                  </a>
                </div>

                <div class="col-md-3 col-sm-6 col-6 mt-1">
                  <a href="<?= base_url('status/approved/mytalim/') ?>">
                    <div class="card">
                      <div class="card-header text-center">
                        <img src="<?= base_url('assets2/img/my-talim-82.png') ?>" alt="">
                      </div>
                      <div class="card-body text-center p-2">
                        <span>My Talim</span><br>
                        <label class="badge badge-success"><?= $approved_mytalim ?></span>
                      </div>
                    </div>
                  </a>
                </div>

                <div class="col-md-3 col-sm-6 col-6 mt-1">
                  <a href="<?= base_url('status/approved/myihram/') ?>">
                    <div class="card">
                      <div class="card-header text-center">
                        <img src="<?= base_url('assets2/img/my-ihram-82.png') ?>" alt="">
                      </div>
                      <div class="card-body text-center p-2">
                        <span>My Ihram</span><br>
                        <label class="badge badge-success"><?= $approved_myihram ?></label>
                      </div>
                    </div>
                  </a>
                </div>

                <div class="col-md-3 col-sm-6 col-6 mt-1">
                  <a href="<?= base_url('status/approved/mysafar/') ?>">
                    <div class="card">
                      <div class="card-header text-center">
                        <img src="<?= base_url('assets2/img/my-safar-82.png') ?>" alt="">
                      </div>
                      <div class="card-body text-center p-2">
                        <span>My Safar</span><br>
                        <label class="badge badge-success"><?= $approved_mysafar ?></label>
                      </div>
                    </div>
                  </a>
                </div>

              </div>

              <div class="row mt-4">
                <div class="col-md-3 col-sm-6 col-6 mt-1">
                  <a href="<?= base_url('status/approved/aktivasi_agent/') ?>">
                    <div class="card">
                      <div class="card-header text-center">
                        <img src="<?= base_url('assets2/img/no-pict.png') ?>" alt="" height="82" width="100">
                      </div>
                      <div class="card-body text-center p-2">
                        <span>Aktivasi Agent</span><br>
                        <label class="badge badge-success"><?= $approved_aktivasi_agent ?></label>
                      </div>
                    </div>
                  </a>
                </div>

                <div class="col-md-3 col-sm-6 col-6 mt-1">
                  <a href="<?= base_url('status/approved/nst') ?>">
                    <div class="card">
                      <div class="card-header text-center">
                        <img src="<?= base_url('assets2/img/no-pict.png') ?>" alt="" height="82" width="100"></i>
                      </div>
                      <div class="card-body text-center p-2">
                        <span>NST</span><br>
                        <label class="badge badge-secondary"><?= $approved_nst ?></span>
                      </div>
                    </div>
                  </a>
                </div>

                <div class="col-md-3 col-sm-6 col-6 mt-1">
                  <a href="<?= base_url('status/approved/lead_management') ?>">
                    <div class="card">
                      <div class="card-header text-center">
                        <img src="<?= base_url('assets2/img/no-pict.png') ?>" alt="" height="82" width="100"></i>
                      </div>
                      <div class="card-body text-center p-2">
                        <span>Lead Management</span><br>
                        <label class="badge badge-secondary"><?= $approved_lead_management ?></span>
                      </div>
                    </div>
                  </a>
                </div>
              </div>

            </div>

            <div class="tab-pane container-fluid fade" id="rejected">
              <div class="row mt-4">

                <div class="col-md-3 col-sm-6 col-6 mt-1">
                  <a href="<?= base_url('status/rejected/myhajat/') ?>">
                    <div class="card">
                      <div class="card-header text-center">
                        <img src="<?= base_url('assets2/img/my-hajat-82.png') ?>" alt=""></i>
                      </div>
                      <div class="card-body text-center p-2">
                        <span>My Hajat</span><br>
                        <label class="badge badge-danger"><?= $total_rejected_myhajat ?></span>
                      </div>
                    </div>
                  </a>
                </div>

                <div class="col-md-3 col-sm-6 col-6 mt-1">
                  <a href="<?= base_url('status/rejected/mytalim/') ?>">
                    <div class="card">
                      <div class="card-header text-center">
                        <img src="<?= base_url('assets2/img/my-talim-82.png') ?>" alt="">
                      </div>
                      <div class="card-body text-center p-2">
                        <span>My Talim</span><br>
                        <label class="badge badge-danger"><?= $rejected_mytalim ?></span>
                      </div>
                    </div>
                  </a>
                </div>

                <div class="col-md-3 col-sm-6 col-6 mt-1">
                  <a href="<?= base_url('status/rejected/myihram/') ?>">
                    <div class="card">
                      <div class="card-header text-center">
                        <img src="<?= base_url('assets2/img/my-ihram-82.png') ?>" alt="">
                      </div>
                      <div class="card-body text-center p-2">
                        <span>My Ihram</span><br>
                        <label class="badge badge-danger"><?= $rejected_myihram ?></label>
                      </div>
                    </div>
                  </a>
                </div>

                <div class="col-md-3 col-sm-6 col-6 mt-1">
                  <a href="<?= base_url('status/rejected/mysafar/') ?>">
                    <div class="card">
                      <div class="card-header text-center">
                        <img src="<?= base_url('assets2/img/my-safar-82.png') ?>" alt="">
                      </div>
                      <div class="card-body text-center p-2">
                        <span>My Safar</span><br>
                        <label class="badge badge-danger"><?= $rejected_mysafar ?></label>
                      </div>
                    </div>
                  </a>
                </div>

              </div>

              <div class="row mt-4">

                <div class="col-md-3 col-sm-6 col-6 mt-1">
                  <a href="<?= base_url('status/rejected/aktivasi_agent/') ?>">
                    <div class="card">
                      <div class="card-header text-center">
                        <img src="<?= base_url('assets2/img/no-pict.png') ?>" alt="" height="82" width="100">
                      </div>
                      <div class="card-body text-center p-2">
                        <span>Aktivasi Agent</span><br>
                        <label class="badge badge-danger"><?= $rejected_aktivasi_agent ?></label>
                      </div>
                    </div>
                  </a>
                </div>

                <div class="col-md-3 col-sm-6 col-6 mt-1">
                  <a href="<?= base_url('status/rejected/nst') ?>">
                    <div class="card">
                      <div class="card-header text-center">
                        <img src="<?= base_url('assets2/img/no-pict.png') ?>" alt="" height="82" width="100"></i>
                      </div>
                      <div class="card-body text-center p-2">
                        <span>NST</span><br>
                        <label class="badge badge-secondary"><?= $rejected_nst ?></span>
                      </div>
                    </div>
                  </a>
                </div>

                <div class="col-md-3 col-sm-6 col-6 mt-1">
                  <a href="<?= base_url('status/rejected/lead_management') ?>">
                    <div class="card">
                      <div class="card-header text-center">
                        <img src="<?= base_url('assets2/img/no-pict.png') ?>" alt="" height="82" width="100"></i>
                      </div>
                      <div class="card-body text-center p-2">
                        <span>Lead Management</span><br>
                        <label class="badge badge-secondary"><?= $rejected_lead_management ?></span>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>

            <!-- Tab completed -->
            <div class="tab-pane container-fluid fade" id="completed">

              <div class="row mt-4">
                <div class="col-md-3 col-sm-6 col-6 mt-1">
                  <a href="<?= base_url('status/completed/myhajat') ?>">
                    <div class="card">
                      <div class="card-header text-center">
                        <img src="<?= base_url('assets2/img/my-hajat-82.png') ?>" alt=""></i>
                      </div>
                      <div class="card-body text-center p-2">
                        <span>My Hajat</span><br>
                        <label class="badge badge-info"><?= $total_completed_myhajat ?></span>
                      </div>
                    </div>
                  </a>
                </div>

                <div class="col-md-3 col-sm-6 col-6 mt-1">
                  <a href="<?= base_url('status/completed/mytalim/') ?>">
                    <div class="card">
                      <div class="card-header text-center">
                        <img src="<?= base_url('assets2/img/my-talim-82.png') ?>" alt="">
                      </div>
                      <div class="card-body text-center p-2">
                        <span>My Talim</span><br>
                        <label class="badge badge-info"><?= $completed_mytalim ?></span>
                      </div>
                    </div>
                  </a>
                </div>

                <div class="col-md-3 col-sm-6 col-6 mt-1">
                  <a href="<?= base_url('status/completed/myihram/') ?>">
                    <div class="card">
                      <div class="card-header text-center">
                        <img src="<?= base_url('assets2/img/my-ihram-82.png') ?>" alt="">
                      </div>
                      <div class="card-body text-center p-2">
                        <span>My Ihram</span><br>
                        <label class="badge badge-info"><?= $completed_myihram ?></label>
                      </div>
                    </div>
                  </a>
                </div>

                <div class="col-md-3 col-sm-6 col-6 mt-1">
                  <a href="<?= base_url('status/completed/mysafar/') ?>">
                    <div class="card">
                      <div class="card-header text-center">
                        <img src="<?= base_url('assets2/img/my-safar-82.png') ?>" alt="">
                      </div>
                      <div class="card-body text-center p-2">
                        <span>My Safar</span><br>
                        <label class="badge badge-info"><?= $completed_mysafar ?></label>
                      </div>
                    </div>
                  </a>
                </div>
              </div>

              <div class="row">
                <div class="col-md-3 col-sm-6 col-6 mt-1">
                  <a href="<?= base_url('status/completed/aktivasi_agent/') ?>">
                    <div class="card">
                      <div class="card-header text-center">
                        <img src="<?= base_url('assets2/img/no-pict.png') ?>" alt="" width="100" height="82">
                      </div>
                      <div class="card-body text-center p-2">
                        <span>Aktivasi Agent</span><br>
                        <label class="badge badge-info"><?= $completed_aktivasi_agent ?></label>
                      </div>
                    </div>
                  </a>
                </div>

                <div class="col-md-3 col-sm-6 col-6 mt-1">
                  <a href="<?= base_url('status/completed/nst') ?>">
                    <div class="card">
                      <div class="card-header text-center">
                        <img src="<?= base_url('assets2/img/no-pict.png') ?>" width="100" height="82"></i>
                      </div>
                      <div class="card-body text-center p-2">
                        <span>NST</span><br>
                        <label class="badge badge-info"><?= $completed_nst ?></span>
                      </div>
                    </div>
                  </a>
                </div>

                <div class="col-md-3 col-sm-6 col-6 mt-1">
                  <a href="<?= base_url('status/completed/lead_management') ?>">
                    <div class="card">
                      <div class="card-header text-center">
                        <img src="<?= base_url('assets2/img/no-pict.png') ?>" alt="" width="100" height="82"></i>
                      </div>
                      <div class="card-body text-center p-2">
                        <span>Lead Management</span><br>
                        <label class="badge badge-info"><?= $completed_lead_management ?></span>
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