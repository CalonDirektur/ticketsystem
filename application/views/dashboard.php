  <section class="content-header mt-4">
    <?= $this->session->flashdata('success_request_support') ?>
    <?= $this->session->flashdata('success_update_support') ?>
    <?= $this->session->flashdata('berhasil_approve') ?>
    <?= $this->session->flashdata('berhasil_complete') ?>
    <?= $this->session->flashdata('berhasil_reject') ?>
    <?= $this->session->flashdata('update_profile_success') ?>
    <?= $this->session->flashdata('duplikat_input') ?>
    <?php print_r($this->session->flashdata('upload_error')) ?>
    <h1 class="text-center">
      Dashboard
      <!-- <small>it all starts here</small> -->
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="">Examples</a></li>
        <li class="active">Blank page</li>
      </ol> -->
  </section>
  <!-- Main content -->
  <section class="content p-2">
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
                  <img class="img-fluid" src="<?= base_url('assets2/img/Produk_Blue.png') ?>" width="100" height="82" alt="">
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
                  <img class="img-fluid" src="<?= base_url('assets2/img/Leads Mgmt_Blue.png') ?>" width="100" height="82" alt="">
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
                  <img class="img-fluid" src="<?= base_url('assets2/img/Aktivasi Agent_Blue.png') ?>" width="100" height="82" alt="">
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
                  <img class="img-fluid" src="<?= base_url('assets2/img/NST_Blue.png') ?>" width="100" height="82" alt="">
                </div>
                <div class="card-body text-center p-2 p-2">
                  Form NST
                </div>
              </div>
            </a>
          </div>

          <!-- Form Mitra Kerja Sama -->
          <div class="col-md-2 col-sm-6 col-6 mt-1 mt-2">
            <a href="<?= base_url('ticket_register/form_mitra_kerjasama') ?>">
              <div class="card">
                <div class="card-header text-center">
                  <img class="img-fluid" src="<?= base_url('assets2/img/no-pict.png') ?>" width="100" height="82" alt="">
                </div>
                <div class="card-body text-center p-2 p-2">
                  Form Mitra Kerja sama
                </div>
              </div>
            </a>
          </div>

        </div>
      </div>
    </div>

    <!-- Table Status Request Support -->
    <div class="card mt-4">
      <div class="card-header">
        <b class="card-title">Tabel Request Support</b>
      </div>
      <div class="table-responsive">

        <div class="card-body p-0">
          <table class="table display status dt-responsive" width="100%">
            <thead>
              <tr>
                <th class="all" width="1%">ID Ticket</th>
                <th class="all">Konsumen</th>
                <th class="all">Produk</th>
                <th class="all">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                foreach ($ticket_records->result() as $tickets) {
                  if ($tickets->id_mytalim != NULL) {
                    ?>
              <tr class="clickable-row" data-href="<?= base_url('status/detail/mytalim/id/' . $tickets->id_mytalim) ?>">
                <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
                <td><?= $tickets->nama_konsumen_mytalim ?></td>
                <td><?= $tickets->produk ?></td>
                <?php if ($tickets->id_approval_mytalim == 0) { ?>
                <td><span class="badge badge-secondary pending">Pending</span></td>
                <?php } else if ($tickets->id_approval_mytalim == 1) { ?>
                <td><span class="badge badge-danger rejected">Ditolak</span></td>
                <?php } else if ($tickets->id_approval_mytalim == 2) { ?>
                <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                <?php } else if ($tickets->id_approval_mytalim == 3) { ?>
                <td><span class="badge badge-info completed">Selesai</span></td>
                <?php } ?>
              </tr>
              <?php
                    $no++;
                  }

                  if ($tickets->id_mysafar != NULL) {
                    ?>
              <tr class="clickable-row" data-href="<?= base_url('status/detail/mysafar/id/' . $tickets->id_mysafar) ?>">
                <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
                <td><?= $tickets->nama_konsumen_mysafar ?></td>
                <td><?= $tickets->produk ?></td>
                <?php if ($tickets->id_approval_mysafar == 0) { ?>
                <td><span class="badge badge-secondary pending">Pending</span></td>
                <?php } else if ($tickets->id_approval_mysafar == 1) { ?>
                <td><span class="badge badge-danger rejected">Ditolak</span></td>
                <?php } else if ($tickets->id_approval_mysafar == 2) { ?>
                <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                <?php } else if ($tickets->id_approval_mysafar == 3) { ?>
                <td><span class="badge badge-info completed">Selesai</span></td>
                <?php } ?>
              </tr>
              <?php
                    $no++;
                  }

                  if ($tickets->id_myihram != NULL) {
                    ?>
              <tr class="clickable-row" data-href="<?= base_url('status/detail/myihram/id/' . $tickets->id_myihram) ?>">
                <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
                <td><?= $tickets->nama_konsumen_myihram ?></td>
                <td><?= $tickets->produk ?></td>
                <?php if ($tickets->id_approval_myihram == 0) { ?>
                <td><span class="badge badge-secondary pending">Pending</span></td>
                <?php } else if ($tickets->id_approval_myihram == 1) { ?>
                <td><span class="badge badge-danger rejected">Ditolak</span></td>
                <?php } else if ($tickets->id_approval_myihram == 2) { ?>
                <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                <?php } else if ($tickets->id_approval_myihram == 3) { ?>
                <td><span class="badge badge-info completed">Selesai</span></td>
                <?php } ?>
              </tr>
              <?php
                    $no++;
                  }

                  if ($tickets->id_agent != NULL) {
                    ?>
              <tr class="clickable-row" data-href="<?= base_url('status/detail/aktivasi_agent/id/' . $tickets->id_agent) ?>">
                <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
                <td><?= $tickets->nama_aktivasi_agent ?></td>
                <td><?= $tickets->produk ?></td>
                <?php if ($tickets->id_approval_aktivasi_agent == 0) { ?>
                <td><span class="badge badge-secondary pending">Pending</span></td>
                <?php } else if ($tickets->id_approval_aktivasi_agent == 1) { ?>
                <td><span class="badge badge-danger rejected">Ditolak</span></td>
                <?php } else if ($tickets->id_approval_aktivasi_agent == 2) { ?>
                <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                <?php } else if ($tickets->id_approval_aktivasi_agent == 3) { ?>
                <td><span class="badge badge-info completed">Selesai</span></td>
                <?php } ?>
              </tr>
              <?php
                    $no++;
                  }

                  if ($tickets->id_nst != NULL) {
                    ?>
              <tr class="clickable-row" data-href="<?= base_url('status/detail/nst/id/' . $tickets->id_nst) ?>">
                <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
                <td><?= $tickets->nama_konsumen_nst ?></td>
                <td><?= $tickets->produk ?></td>
                <?php if ($tickets->id_approval_nst == 0) { ?>
                <td><span class="badge badge-secondary pending">Pending</span></td>
                <?php } else if ($tickets->id_approval_nst == 1) { ?>
                <td><span class="badge badge-danger rejected">Ditolak</span></td>
                <?php } else if ($tickets->id_approval_nst == 2) { ?>
                <td><span class="badge badge-success approved">Disetujui Admin NST</span></td>
                <?php } else if ($tickets->id_approval_nst == 3) { ?>
                <td><span class="badge badge-info completed">Selesai</span></td>
                <?php } ?>
              </tr>
              <?php
                    $no++;
                  }

                  if ($tickets->id_renovasi != NULL) {
                    ?>
              <tr class="clickable-row" data-href="<?= base_url('status/detail/myhajat/renovasi/' . $tickets->id_renovasi) ?>">
                <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
                <td><?= $tickets->nama_konsumen_renovasi ?></td>
                <td><?= $tickets->produk ?></td>
                <?php if ($tickets->id_approval_renovasi == 0) { ?>
                <td><span class="badge badge-secondary pending">Pending</span></td>
                <?php } else if ($tickets->id_approval_renovasi == 1) { ?>
                <td><span class="badge badge-danger rejected">Ditolak</span></td>
                <?php } else if ($tickets->id_approval_renovasi == 2) { ?>
                <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                <?php } else if ($tickets->id_approval_renovasi == 3) { ?>
                <td><span class="badge badge-info completed">Selesai</span></td>
                <?php } ?>
              </tr>
              <?php
                    $no++;
                  }

                  if ($tickets->id_sewa != NULL) {
                    ?>
              <tr class="clickable-row" data-href="<?= base_url('status/detail/myhajat/sewa/' . $tickets->id_sewa) ?>">
                <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
                <td><?= $tickets->nama_konsumen_sewa ?></td>
                <td><?= $tickets->produk ?></td>
                <?php if ($tickets->id_approval_sewa == 0) { ?>
                <td><span class="badge badge-secondary pending">Pending</span></td>
                <?php } else if ($tickets->id_approval_sewa == 1) { ?>
                <td><span class="badge badge-danger rejected">Ditolak</span></td>
                <?php } else if ($tickets->id_approval_sewa == 2) { ?>
                <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                <?php } else if ($tickets->id_approval_sewa == 3) { ?>
                <td><span class="badge badge-info completed">Selesai</span></td>
                <?php } ?>
              </tr>
              <?php
                    $no++;
                  }

                  if ($tickets->id_wedding != NULL) {
                    ?>
              <tr class="clickable-row" data-href="<?= base_url('status/detail/myhajat/wedding/' . $tickets->id_wedding) ?>">
                <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
                <td><?= $tickets->nama_konsumen_wedding ?></td>
                <td><?= $tickets->produk ?></td>
                <?php if ($tickets->id_approval_wedding == 0) { ?>
                <td><span class="badge badge-secondary pending">Pending</span></td>
                <?php } else if ($tickets->id_approval_wedding == 1) { ?>
                <td><span class="badge badge-danger rejected">Ditolak</span></td>
                <?php } else if ($tickets->id_approval_wedding == 2) { ?>
                <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                <?php } else if ($tickets->id_approval_wedding == 3) { ?>
                <td><span class="badge badge-info completed">Selesai</span></td>
                <?php } ?>
              </tr>
              <?php
                    $no++;
                  }

                  if ($tickets->id_franchise != NULL) {
                    ?>
              <tr class="clickable-row" data-href="<?= base_url('status/detail/myhajat/franchise/' . $tickets->id_franchise) ?>">
                <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
                <td><?= $tickets->nama_konsumen_franchise ?></td>
                <td><?= $tickets->produk ?></td>
                <?php if ($tickets->id_approval_franchise == 0) { ?>
                <td><span class="badge badge-secondary pending">Pending</span></td>
                <?php } else if ($tickets->id_approval_franchise == 1) { ?>
                <td><span class="badge badge-danger rejected">Ditolak</span></td>
                <?php } else if ($tickets->id_approval_franchise == 2) { ?>
                <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                <?php } else if ($tickets->id_approval_franchise == 3) { ?>
                <td><span class="badge badge-info completed">Selesai</span></td>
                <?php } ?>
              </tr>
              <?php
                    $no++;
                  }

                  if ($tickets->id_myhajat_lainnya != NULL) {
                    ?>
              <tr class="clickable-row" data-href="<?= base_url('status/detail/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">
                <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
                <td><?= $tickets->nama_konsumen_lainnya ?></td>
                <td><?= $tickets->produk ?></td>
                <?php if ($tickets->id_approval_lainnya == 0) { ?>
                <td><span class="badge badge-secondary pending">Pending</span></td>
                <?php } else if ($tickets->id_approval_lainnya == 1) { ?>
                <td><span class="badge badge-danger rejected">Ditolak</span></td>
                <?php } else if ($tickets->id_approval_lainnya == 2) { ?>
                <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                <?php } else if ($tickets->id_approval_lainnya == 3) { ?>
                <td><span class="badge badge-info completed">Selesai</span></td>
                <?php } ?>
              </tr>
              <?php
                    $no++;
                  }
                  if ($tickets->id_mitra_kerjasama != NULL) {
                    ?>
              <tr class="clickable-row" data-href="<?= base_url('status/detail/mitra_kerjasama/id/' . $tickets->id_mitra_kerjasama) ?>">
                <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
                <td><?= $tickets->nama_mitra_kerjasama ?></td>
                <td><?= $tickets->produk ?></td>
                <?php if ($tickets->id_approval_mitra_kerjasama == 0) { ?>
                <td><span class="badge badge-secondary pending">Pending</span></td>
                <?php } else if ($tickets->id_approval_mitra_kerjasama == 1) { ?>
                <td><span class="badge badge-danger rejected">Ditolak</span></td>
                <?php } else if ($tickets->id_approval_mitra_kerjasama == 2) { ?>
                <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                <?php } else if ($tickets->id_approval_mitra_kerjasama == 3) { ?>
                <td><span class="badge badge-info completed">Selesai</span></td>
                <?php } ?>
              </tr>
              <?php
                  }
                  if ($tickets->id_myfaedah != NULL) {
                    ?>
              <tr class="clickable-row" data-href="<?= base_url('status/detail/myfaedah/id/' . $tickets->id_myfaedah) ?>">
                <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
                <td><?= $tickets->nama_konsumen_myfaedah ?></td>
                <td><?= $tickets->produk ?></td>
                <?php if ($tickets->id_approval_myfaedah == 0) { ?>
                <td><span class="badge badge-secondary pending">Pending</span></td>
                <?php } else if ($tickets->id_approval_myfaedah == 1) { ?>
                <td><span class="badge badge-danger rejected">Ditolak</span></td>
                <?php } else if ($tickets->id_approval_myfaedah == 2) { ?>
                <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                <?php } else if ($tickets->id_approval_myfaedah == 3) { ?>
                <td><span class="badge badge-info completed">Selesai</span></td>
                <?php } ?>
              </tr>
              <?php
                  }
                  if ($tickets->id_mycars != NULL) {
                    ?>
              <tr class="clickable-row" data-href="<?= base_url('status/detail/mycars/id/' . $tickets->id_mycars) ?>">
                <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
                <td><?= $tickets->nama_konsumen_mycars ?></td>
                <td><?= $tickets->produk ?></td>
                <?php if ($tickets->id_approval_mycars == 0) { ?>
                <td><span class="badge badge-secondary pending">Pending</span></td>
                <?php } else if ($tickets->id_approval_mycars == 1) { ?>
                <td><span class="badge badge-danger rejected">Ditolak</span></td>
                <?php } else if ($tickets->id_approval_mycars == 2) { ?>
                <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                <?php } else if ($tickets->id_approval_mycars == 3) { ?>
                <td><span class="badge badge-info completed">Selesai</span></td>
                <?php } ?>
              </tr>
              <?php
                  }
                }
                ?>
            </tbody>
          </table>
        </div>
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

    <!-- Table Status Request Support -->
    <div class="card mt-4">
      <div class="card-header">
        <b class="card-title">Tabel Request Support</b>
      </div>
      <div class="card-body p-0">
        <table class="table display status dt-responsive" width="100%">
          <thead>
            <tr>
              <th class="all" width="1%">ID Ticket</th>
              <th>Requester</th>
              <th>Cabang</th>
              <th class="all">Konsumen</th>
              <th class="all">Produk</th>
              <th class="all">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $no = 1;
              foreach ($ticket_records->result() as $tickets) {
                if ($tickets->id_mytalim != NULL) {
                  ?>
            <tr class="clickable-row" data-href="<?= base_url('status/detail/mytalim/id/' . $tickets->id_mytalim) ?>">
              <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
              <td><?= $tickets->name ?></td>
              <td><?= $tickets->nama_cabang ?></td>
              <td><?= $tickets->nama_konsumen_mytalim ?></td>
              <td><?= $tickets->produk ?></td>
              <?php if ($tickets->id_approval_mytalim == 0) { ?>
              <td><span class="badge badge-secondary pending">Pending</span></td>
              <?php } else if ($tickets->id_approval_mytalim == 1) { ?>
              <td><span class="badge badge-danger rejected">Ditolak</span></td>
              <?php } else if ($tickets->id_approval_mytalim == 2) { ?>
              <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
              <?php } else if ($tickets->id_approval_mytalim == 3) { ?>
              <td><span class="badge badge-info completed">Selesai</span></td>
              <?php } ?>
            </tr>
            <?php
                  $no++;
                }

                if ($tickets->id_mysafar != NULL) {
                  ?>
            <tr class="clickable-row" data-href="<?= base_url('status/detail/mysafar/id/' . $tickets->id_mysafar) ?>">
              <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
              <td><?= $tickets->name ?></td>
              <td><?= $tickets->nama_cabang ?></td>
              <td><?= $tickets->nama_konsumen_mysafar ?></td>
              <td><?= $tickets->produk ?></td>
              <?php if ($tickets->id_approval_mysafar == 0) { ?>
              <td><span class="badge badge-secondary pending">Pending</span></td>
              <?php } else if ($tickets->id_approval_mysafar == 1) { ?>
              <td><span class="badge badge-danger rejected">Ditolak</span></td>
              <?php } else if ($tickets->id_approval_mysafar == 2) { ?>
              <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
              <?php } else if ($tickets->id_approval_mysafar == 3) { ?>
              <td><span class="badge badge-info completed">Selesai</span></td>
              <?php } ?>
            </tr>
            <?php
                  $no++;
                }

                if ($tickets->id_myihram != NULL) {
                  ?>
            <tr class="clickable-row" data-href="<?= base_url('status/detail/myihram/id/' . $tickets->id_myihram) ?>">
              <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
              <td><?= $tickets->name ?></td>
              <td><?= $tickets->nama_cabang ?></td>
              <td><?= $tickets->nama_konsumen_myihram ?></td>
              <td><?= $tickets->produk ?></td>
              <?php if ($tickets->id_approval_myihram == 0) { ?>
              <td><span class="badge badge-secondary pending">Pending</span></td>
              <?php } else if ($tickets->id_approval_myihram == 1) { ?>
              <td><span class="badge badge-danger rejected">Ditolak</span></td>
              <?php } else if ($tickets->id_approval_myihram == 2) { ?>
              <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
              <?php } else if ($tickets->id_approval_myihram == 3) { ?>
              <td><span class="badge badge-info completed">Selesai</span></td>
              <?php } ?>
            </tr>
            <?php
                  $no++;
                }

                if ($tickets->id_agent != NULL) {
                  ?>
            <tr class="clickable-row" data-href="<?= base_url('status/detail/aktivasi_agent/id/' . $tickets->id_agent) ?>">
              <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
              <td><?= $tickets->name ?></td>
              <td><?= $tickets->nama_cabang ?></td>
              <td><?= $tickets->nama_aktivasi_agent ?></td>
              <td><?= $tickets->produk ?></td>
              <?php if ($tickets->id_approval_aktivasi_agent == 0) { ?>
              <td><span class="badge badge-secondary pending">Pending</span></td>
              <?php } else if ($tickets->id_approval_aktivasi_agent == 1) { ?>
              <td><span class="badge badge-danger rejected">Ditolak</span></td>
              <?php } else if ($tickets->id_approval_aktivasi_agent == 2) { ?>
              <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
              <?php } else if ($tickets->id_approval_aktivasi_agent == 3) { ?>
              <td><span class="badge badge-info completed">Selesai</span></td>
              <?php } ?>
            </tr>
            <?php
                  $no++;
                }

                if ($tickets->id_renovasi != NULL) {
                  ?>
            <tr class="clickable-row" data-href="<?= base_url('status/detail/myhajat/renovasi/' . $tickets->id_renovasi) ?>">
              <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
              <td><?= $tickets->name ?></td>
              <td><?= $tickets->nama_cabang ?></td>
              <td><?= $tickets->nama_konsumen_renovasi ?></td>
              <td><?= $tickets->produk ?></td>
              <?php if ($tickets->id_approval_renovasi == 0) { ?>
              <td><span class="badge badge-secondary pending">Pending</span></td>
              <?php } else if ($tickets->id_approval_renovasi == 1) { ?>
              <td><span class="badge badge-danger rejected">Ditolak</span></td>
              <?php } else if ($tickets->id_approval_renovasi == 2) { ?>
              <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
              <?php } else if ($tickets->id_approval_renovasi == 3) { ?>
              <td><span class="badge badge-info completed">Selesai</span></td>
              <?php } ?>
            </tr>
            <?php
                  $no++;
                }

                if ($tickets->id_sewa != NULL) {
                  ?>
            <tr class="clickable-row" data-href="<?= base_url('status/detail/myhajat/sewa/' . $tickets->id_sewa) ?>">
              <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
              <td><?= $tickets->name ?></td>
              <td><?= $tickets->nama_cabang ?></td>
              <td><?= $tickets->nama_konsumen_sewa ?></td>
              <td><?= $tickets->produk ?></td>
              <?php if ($tickets->id_approval_sewa == 0) { ?>
              <td><span class="badge badge-secondary pending">Pending</span></td>
              <?php } else if ($tickets->id_approval_sewa == 1) { ?>
              <td><span class="badge badge-danger rejected">Ditolak</span></td>
              <?php } else if ($tickets->id_approval_sewa == 2) { ?>
              <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
              <?php } else if ($tickets->id_approval_sewa == 3) { ?>
              <td><span class="badge badge-info completed">Selesai</span></td>
              <?php } ?>
            </tr>
            <?php
                  $no++;
                }

                if ($tickets->id_wedding != NULL) {
                  ?>
            <tr class="clickable-row" data-href="<?= base_url('status/detail/myhajat/wedding/' . $tickets->id_wedding) ?>">
              <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
              <td><?= $tickets->name ?></td>
              <td><?= $tickets->nama_cabang ?></td>
              <td><?= $tickets->nama_konsumen_wedding ?></td>
              <td><?= $tickets->produk ?></td>
              <?php if ($tickets->id_approval_wedding == 0) { ?>
              <td><span class="badge badge-secondary pending">Pending</span></td>
              <?php } else if ($tickets->id_approval_wedding == 1) { ?>
              <td><span class="badge badge-danger rejected">Ditolak</span></td>
              <?php } else if ($tickets->id_approval_wedding == 2) { ?>
              <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
              <?php } else if ($tickets->id_approval_wedding == 3) { ?>
              <td><span class="badge badge-info completed">Selesai</span></td>
              <?php } ?>
            </tr>
            <?php
                  $no++;
                }

                if ($tickets->id_franchise != NULL) {
                  ?>
            <tr class="clickable-row" data-href="<?= base_url('status/detail/myhajat/franchise/' . $tickets->id_franchise) ?>">
              <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
              <td><?= $tickets->name ?></td>
              <td><?= $tickets->nama_cabang ?></td>
              <td><?= $tickets->nama_konsumen_franchise ?></td>
              <td><?= $tickets->produk ?></td>
              <?php if ($tickets->id_approval_franchise == 0) { ?>
              <td><span class="badge badge-secondary pending">Pending</span></td>
              <?php } else if ($tickets->id_approval_franchise == 1) { ?>
              <td><span class="badge badge-danger rejected">Ditolak</span></td>
              <?php } else if ($tickets->id_approval_franchise == 2) { ?>
              <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
              <?php } else if ($tickets->id_approval_franchise == 3) { ?>
              <td><span class="badge badge-info completed">Selesai</span></td>
              <?php } ?>
            </tr>
            <?php
                  $no++;
                }

                if ($tickets->id_myhajat_lainnya != NULL) {
                  ?>
            <tr class="clickable-row" data-href="<?= base_url('status/detail/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">
              <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
              <td><?= $tickets->name ?></td>
              <td><?= $tickets->nama_cabang ?></td>
              <td><?= $tickets->nama_konsumen_lainnya ?></td>
              <td><?= $tickets->produk ?></td>
              <?php if ($tickets->id_approval_lainnya == 0) { ?>
              <td><span class="badge badge-secondary pending">Pending</span></td>
              <?php } else if ($tickets->id_approval_lainnya == 1) { ?>
              <td><span class="badge badge-danger rejected">Ditolak</span></td>
              <?php } else if ($tickets->id_approval_lainnya == 2) { ?>
              <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
              <?php } else if ($tickets->id_approval_lainnya == 3) { ?>
              <td><span class="badge badge-info completed">Selesai</span></td>
              <?php } ?>
            </tr>
            <?php
                  $no++;
                }

                if ($tickets->id_mitra_kerjasama != NULL) {
                  ?>
            <tr class="clickable-row" data-href="<?= base_url('status/detail/mitra_kerjasama/id/' . $tickets->id_mitra_kerjasama) ?>">
              <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
              <td><?= $tickets->name ?></td>
              <td><?= $tickets->nama_cabang ?></td>
              <td><?= $tickets->nama_mitra_kerjasama ?></td>
              <td><?= $tickets->produk ?></td>
              <?php if ($tickets->id_approval_mitra_kerjasama == 0) { ?>
              <td><span class="badge badge-secondary pending">Pending</span></td>
              <?php } else if ($tickets->id_approval_mitra_kerjasama == 1) { ?>
              <td><span class="badge badge-danger rejected">Ditolak</span></td>
              <?php } else if ($tickets->id_approval_mitra_kerjasama == 2) { ?>
              <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
              <?php } else if ($tickets->id_approval_mitra_kerjasama == 3) { ?>
              <td><span class="badge badge-info completed">Selesai</span></td>
              <?php } ?>
            </tr>
            <?php
                }
                if ($tickets->id_myfaedah != NULL) {
                  ?>
            <tr class="clickable-row" data-href="<?= base_url('status/detail/myfaedah/id/' . $tickets->id_myfaedah) ?>">
              <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
              <td><?= $tickets->name ?></td>
              <td><?= $tickets->nama_cabang ?></td>
              <td><?= $tickets->nama_konsumen_myfaedah ?></td>
              <td><?= $tickets->produk ?></td>
              <?php if ($tickets->id_approval_myfaedah == 0) { ?>
              <td><span class="badge badge-secondary pending">Pending</span></td>
              <?php } else if ($tickets->id_approval_myfaedah == 1) { ?>
              <td><span class="badge badge-danger rejected">Ditolak</span></td>
              <?php } else if ($tickets->id_approval_myfaedah == 2) { ?>
              <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
              <?php } else if ($tickets->id_approval_myfaedah == 3) { ?>
              <td><span class="badge badge-info completed">Selesai</span></td>
              <?php } ?>
            </tr>
            <?php
                }
                if ($tickets->id_mycars != NULL) {
                  ?>
            <tr class="clickable-row" data-href="<?= base_url('status/detail/mycars/id/' . $tickets->id_mycars) ?>">
              <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
              <td><?= $tickets->name ?></td>
              <td><?= $tickets->nama_cabang ?></td>
              <td><?= $tickets->nama_konsumen_mycars ?></td>
              <td><?= $tickets->produk ?></td>
              <?php if ($tickets->id_approval_mycars == 0) { ?>
              <td><span class="badge badge-secondary pending">Pending</span></td>
              <?php } else if ($tickets->id_approval_mycars == 1) { ?>
              <td><span class="badge badge-danger rejected">Ditolak</span></td>
              <?php } else if ($tickets->id_approval_mycars == 2) { ?>
              <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
              <?php } else if ($tickets->id_approval_mycars == 3) { ?>
              <td><span class="badge badge-info completed">Selesai</span></td>
              <?php } ?>
            </tr>
            <?php
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
      <!-- Card Pending -->
      <div class="col-md-3 col-sm-6 col-6 mt-2 status-card card-pending" style="cursor: pointer">
        <div class="card text-center p-5">
          <h3 class="card-title">Pending</h3><br>
          <h3><span class="badge badge-secondary"><?= $total_pending ?></span></h3>
        </div>
      </div>
      <!-- Disetujui Admin 1  -->
      <div class="col-lg-3 col-md-3 col-sm-6 col-6 status-card card-approved mt-2" style="cursor: pointer">
        <div class="card text-center p-5">
          <h3 class="card-title">Disetujui Admin 1</h3><br>
          <h3><span class="badge badge-success"><?= $total_approved ?></span></h3>
        </div>
      </div>
      <!-- Ditolak -->
      <div class="col-lg-3 col-md-3 col-sm-6 col-6 status-card card-rejected mt-2" style="cursor: pointer">
        <div class="card text-center p-5">
          <h3 class="card-title">Ditolak</h3><br>
          <h3><span class="badge badge-danger"><?= $total_rejected ?></span></h3>
        </div>
      </div>

      <!-- Selesai -->
      <div class="col-lg-3 col-md-3 col-sm-6 col-6 status-card card-completed mt-2" style="cursor: pointer">
        <div class="card text-center p-5">
          <h3 class="card-title">Selesai</h3><br>
          <h3><span class="badge badge-info"><?= $total_completed ?></span></h3>
        </div>
      </div>
    </div>

    <!-- Table Status Request Support -->
    <div class="card mt-4">
      <div class="card-header">
        <b class="card-title">Tabel Request Support</b>
      </div>
      <div class="card-body p-0">
        <table class="table display status dt-responsive nowrap" width="100%">
          <thead>
            <tr>
              <th class="all" width="1%">ID Ticket</th>
              <th>Requester</th>
              <th>Cabang</th>
              <th class="all">Konsumen</th>
              <th class="all">Produk</th>
              <th class="all">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $no = 1;
              foreach ($ticket_records->result() as $tickets) {
                if ($tickets->id_mytalim != NULL) {
                  ?>
            <tr class="clickable-row" data-href="<?= base_url('status/detail/mytalim/id/' . $tickets->id_mytalim) ?>">
              <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
              <td><?= $tickets->name ?></td>
              <td><?= $tickets->nama_cabang ?></td>
              <td><?= $tickets->nama_konsumen_mytalim ?></td>
              <td><?= $tickets->produk ?></td>
              <?php if ($tickets->id_approval_mytalim == 0) { ?>
              <td><span class="badge badge-secondary pending">Pending</span></td>
              <?php } else if ($tickets->id_approval_mytalim == 1) { ?>
              <td><span class="badge badge-danger rejected">Ditolak</span></td>
              <?php } else if ($tickets->id_approval_mytalim == 2) { ?>
              <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
              <?php } else if ($tickets->id_approval_mytalim == 3) { ?>
              <td><span class="badge badge-info completed">Selesai</span></td>
              <?php } ?>
            </tr>
            <?php
                  $no++;
                }

                if ($tickets->id_mysafar != NULL) {
                  ?>
            <tr class="clickable-row" data-href="<?= base_url('status/detail/mysafar/id/' . $tickets->id_mysafar) ?>">
              <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
              <td><?= $tickets->name ?></td>
              <td><?= $tickets->nama_cabang ?></td>
              <td><?= $tickets->nama_konsumen_mysafar ?></td>
              <td><?= $tickets->produk ?></td>
              <?php if ($tickets->id_approval_mysafar == 0) { ?>
              <td><span class="badge badge-secondary pending">Pending</span></td>
              <?php } else if ($tickets->id_approval_mysafar == 1) { ?>
              <td><span class="badge badge-danger rejected">Ditolak</span></td>
              <?php } else if ($tickets->id_approval_mysafar == 2) { ?>
              <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
              <?php } else if ($tickets->id_approval_mysafar == 3) { ?>
              <td><span class="badge badge-info completed">Selesai</span></td>
              <?php } ?>
            </tr>
            <?php
                  $no++;
                }

                if ($tickets->id_myihram != NULL) {
                  ?>
            <tr class="clickable-row" data-href="<?= base_url('status/detail/myihram/id/' . $tickets->id_myihram) ?>">
              <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
              <td><?= $tickets->name ?></td>
              <td><?= $tickets->nama_cabang ?></td>
              <td><?= $tickets->nama_konsumen_myihram ?></td>
              <td><?= $tickets->produk ?></td>
              <?php if ($tickets->id_approval_myihram == 0) { ?>
              <td><span class="badge badge-secondary pending">Pending</span></td>
              <?php } else if ($tickets->id_approval_myihram == 1) { ?>
              <td><span class="badge badge-danger rejected">Ditolak</span></td>
              <?php } else if ($tickets->id_approval_myihram == 2) { ?>
              <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
              <?php } else if ($tickets->id_approval_myihram == 3) { ?>
              <td><span class="badge badge-info completed">Selesai</span></td>
              <?php } ?>
            </tr>
            <?php
                  $no++;
                }

                if ($tickets->id_agent != NULL) {
                  ?>
            <tr class="clickable-row" data-href="<?= base_url('status/detail/aktivasi_agent/id/' . $tickets->id_agent) ?>">
              <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
              <td><?= $tickets->name ?></td>
              <td><?= $tickets->nama_cabang ?></td>
              <td><?= $tickets->nama_aktivasi_agent ?></td>
              <td><?= $tickets->produk ?></td>
              <?php if ($tickets->id_approval_aktivasi_agent == 0) { ?>
              <td><span class="badge badge-secondary pending">Pending</span></td>
              <?php } else if ($tickets->id_approval_aktivasi_agent == 1) { ?>
              <td><span class="badge badge-danger rejected">Ditolak</span></td>
              <?php } else if ($tickets->id_approval_aktivasi_agent == 2) { ?>
              <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
              <?php } else if ($tickets->id_approval_aktivasi_agent == 3) { ?>
              <td><span class="badge badge-info completed">Selesai</span></td>
              <?php } ?>
            </tr>
            <?php
                  $no++;
                }

                if ($tickets->id_renovasi != NULL) {
                  ?>
            <tr class="clickable-row" data-href="<?= base_url('status/detail/myhajat/renovasi/' . $tickets->id_renovasi) ?>">
              <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
              <td><?= $tickets->name ?></td>
              <td><?= $tickets->nama_cabang ?></td>
              <td><?= $tickets->nama_konsumen_renovasi ?></td>
              <td><?= $tickets->produk ?></td>
              <?php if ($tickets->id_approval_renovasi == 0) { ?>
              <td><span class="badge badge-secondary pending">Pending</span></td>
              <?php } else if ($tickets->id_approval_renovasi == 1) { ?>
              <td><span class="badge badge-danger rejected">Ditolak</span></td>
              <?php } else if ($tickets->id_approval_renovasi == 2) { ?>
              <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
              <?php } else if ($tickets->id_approval_renovasi == 3) { ?>
              <td><span class="badge badge-info completed">Selesai</span></td>
              <?php } ?>
            </tr>
            <?php
                  $no++;
                }

                if ($tickets->id_sewa != NULL) {
                  ?>
            <tr class="clickable-row" data-href="<?= base_url('status/detail/myhajat/sewa/' . $tickets->id_sewa) ?>">
              <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
              <td><?= $tickets->name ?></td>
              <td><?= $tickets->nama_cabang ?></td>
              <td><?= $tickets->nama_konsumen_sewa ?></td>
              <td><?= $tickets->produk ?></td>
              <?php if ($tickets->id_approval_sewa == 0) { ?>
              <td><span class="badge badge-secondary pending">Pending</span></td>
              <?php } else if ($tickets->id_approval_sewa == 1) { ?>
              <td><span class="badge badge-danger rejected">Ditolak</span></td>
              <?php } else if ($tickets->id_approval_sewa == 2) { ?>
              <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
              <?php } else if ($tickets->id_approval_sewa == 3) { ?>
              <td><span class="badge badge-info completed">Selesai</span></td>
              <?php } ?>
            </tr>
            <?php
                  $no++;
                }

                if ($tickets->id_wedding != NULL) {
                  ?>
            <tr class="clickable-row" data-href="<?= base_url('status/detail/myhajat/wedding/' . $tickets->id_wedding) ?>">
              <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
              <td><?= $tickets->name ?></td>
              <td><?= $tickets->nama_cabang ?></td>
              <td><?= $tickets->nama_konsumen_wedding ?></td>
              <td><?= $tickets->produk ?></td>
              <?php if ($tickets->id_approval_wedding == 0) { ?>
              <td><span class="badge badge-secondary pending">Pending</span></td>
              <?php } else if ($tickets->id_approval_wedding == 1) { ?>
              <td><span class="badge badge-danger rejected">Ditolak</span></td>
              <?php } else if ($tickets->id_approval_wedding == 2) { ?>
              <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
              <?php } else if ($tickets->id_approval_wedding == 3) { ?>
              <td><span class="badge badge-info completed">Selesai</span></td>
              <?php } ?>
            </tr>
            <?php
                  $no++;
                }

                if ($tickets->id_franchise != NULL) {
                  ?>
            <tr class="clickable-row" data-href="<?= base_url('status/detail/myhajat/franchise/' . $tickets->id_franchise) ?>">
              <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
              <td><?= $tickets->name ?></td>
              <td><?= $tickets->nama_cabang ?></td>
              <td><?= $tickets->nama_konsumen_franchise ?></td>
              <td><?= $tickets->produk ?></td>
              <?php if ($tickets->id_approval_franchise == 0) { ?>
              <td><span class="badge badge-secondary pending">Pending</span></td>
              <?php } else if ($tickets->id_approval_franchise == 1) { ?>
              <td><span class="badge badge-danger rejected">Ditolak</span></td>
              <?php } else if ($tickets->id_approval_franchise == 2) { ?>
              <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
              <?php } else if ($tickets->id_approval_franchise == 3) { ?>
              <td><span class="badge badge-info completed">Selesai</span></td>
              <?php } ?>
            </tr>
            <?php
                  $no++;
                }

                if ($tickets->id_myhajat_lainnya != NULL) {
                  ?>
            <tr class="clickable-row" data-href="<?= base_url('status/detail/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">
              <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
              <td><?= $tickets->name ?></td>
              <td><?= $tickets->nama_cabang ?></td>
              <td><?= $tickets->nama_konsumen_lainnya ?></td>
              <td><?= $tickets->produk ?></td>
              <?php if ($tickets->id_approval_lainnya == 0) { ?>
              <td><span class="badge badge-secondary pending">Pending</span></td>
              <?php } else if ($tickets->id_approval_lainnya == 1) { ?>
              <td><span class="badge badge-danger rejected">Ditolak</span></td>
              <?php } else if ($tickets->id_approval_lainnya == 2) { ?>
              <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
              <?php } else if ($tickets->id_approval_lainnya == 3) { ?>
              <td><span class="badge badge-info completed">Selesai</span></td>
              <?php } ?>
            </tr>
            <?php
                  $no++;
                }

                if ($tickets->id_mitra_kerjasama != NULL) {
                  ?>
            <tr class="clickable-row" data-href="<?= base_url('status/detail/mitra_kerjasama/id/' . $tickets->id_mitra_kerjasama) ?>">
              <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
              <td><?= $tickets->name ?></td>
              <td><?= $tickets->nama_cabang ?></td>
              <td><?= $tickets->nama_mitra_kerjasama ?></td>
              <td><?= $tickets->produk ?></td>
              <?php if ($tickets->id_approval_mitra_kerjasama == 0) { ?>
              <td><span class="badge badge-secondary pending">Pending</span></td>
              <?php } else if ($tickets->id_approval_mitra_kerjasama == 1) { ?>
              <td><span class="badge badge-danger rejected">Ditolak</span></td>
              <?php } else if ($tickets->id_approval_mitra_kerjasama == 2) { ?>
              <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
              <?php } else if ($tickets->id_approval_mitra_kerjasama == 3) { ?>
              <td><span class="badge badge-info completed">Selesai</span></td>
              <?php } ?>
            </tr>
            <?php
                }
                if ($tickets->id_myfaedah != NULL) {
                  ?>
            <tr class="clickable-row" data-href="<?= base_url('status/detail/myfaedah/id/' . $tickets->id_myfaedah) ?>">
              <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
              <td><?= $tickets->name ?></td>
              <td><?= $tickets->nama_cabang ?></td>
              <td><?= $tickets->nama_konsumen_myfaedah ?></td>
              <td><?= $tickets->produk ?></td>
              <?php if ($tickets->id_approval_myfaedah == 0) { ?>
              <td><span class="badge badge-secondary pending">Pending</span></td>
              <?php } else if ($tickets->id_approval_myfaedah == 1) { ?>
              <td><span class="badge badge-danger rejected">Ditolak</span></td>
              <?php } else if ($tickets->id_approval_myfaedah == 2) { ?>
              <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
              <?php } else if ($tickets->id_approval_myfaedah == 3) { ?>
              <td><span class="badge badge-info completed">Selesai</span></td>
              <?php } ?>
            </tr>
            <?php
                }
                if ($tickets->id_mycars != NULL) {
                  ?>
            <tr class="clickable-row" data-href="<?= base_url('status/detail/mycars/id/' . $tickets->id_mycars) ?>">
              <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
              <td><?= $tickets->name ?></td>
              <td><?= $tickets->nama_cabang ?></td>
              <td><?= $tickets->nama_konsumen_mycars ?></td>
              <td><?= $tickets->produk ?></td>
              <?php if ($tickets->id_approval_mycars == 0) { ?>
              <td><span class="badge badge-secondary pending">Pending</span></td>
              <?php } else if ($tickets->id_approval_mycars == 1) { ?>
              <td><span class="badge badge-danger rejected">Ditolak</span></td>
              <?php } else if ($tickets->id_approval_mycars == 2) { ?>
              <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
              <?php } else if ($tickets->id_approval_mycars == 3) { ?>
              <td><span class="badge badge-info completed">Selesai</span></td>
              <?php } ?>
            </tr>
            <?php
                }
              } ?>
          </tbody>
        </table>
      </div>
    </div>

    <?php }  ?>

    <!-- Admin NST Arif -->
    <?php if ($this->session->userdata('level') == 4) { ?>

    <!-- Table Status Request Support -->
    <div class="card mt-4">
      <div class="card-header">
        <b class="card-title">Tabel Request Support</b>
      </div>
      <div class="card-body p-0">
        <table class="table display status dt-responsive" width="100%">
          <thead>
            <tr>
              <th class="all" width="1%">ID Ticket</th>
              <th class="all">Requester</th>
              <th class="all">Cabang</th>
              <th class="all">Konsumen</th>
              <th>Produk</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $no = 1;
              foreach ($ticket_records->result() as $tickets) {
                if ($tickets->id_nst != NULL) {
                  ?>
            <tr class="clickable-row" data-href="<?= base_url('status/detail/nst/id/' . $tickets->id_nst) ?>">
              <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
              <td><?= $tickets->name ?></td>
              <td><?= $tickets->nama_cabang ?></td>
              <td><?= $tickets->nama_konsumen_nst ?></td>
              <td><?= $tickets->produk ?></td>
              <?php if ($tickets->id_approval_nst == 0) { ?>
              <td><span class="badge badge-secondary pending">Pending</span></td>
              <?php } else if ($tickets->id_approval_nst == 1) { ?>
              <td><span class="badge badge-danger rejected">Ditolak</span></td>
              <?php } else if ($tickets->id_approval_nst == 2) { ?>
              <td><span class="badge badge-success approved">Disetujui Admin NST</span></td>
              <?php } else if ($tickets->id_approval_nst == 3) { ?>
              <td><span class="badge badge-info completed">Selesai</span></td>
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

    <!-- Table Status Request Support -->
    <div class="card mt-4">
      <div class="card-header">
        <b class="card-title">Tabel Request Support</b>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table status dt-responsive" width="100%">
            <thead>
              <tr>
                <th class="all" width="1%">ID Ticket</th>
                <th>Requester</th>
                <th>Cabang</th>
                <th class="all">Konsumen</th>
                <th class="all">Produk</th>
                <th class="all">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                foreach ($ticket_records->result() as $tickets) {
                  if ($tickets->id_mytalim != NULL) {
                    ?>
              <tr class="clickable-row" data-href="<?= base_url('status/detail/mytalim/id/' . $tickets->id_mytalim) ?>">
                <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
                <td><?= $tickets->name ?></td>
                <td><?= $tickets->nama_cabang ?></td>
                <td><?= $tickets->nama_konsumen_mytalim ?></td>
                <td><?= $tickets->produk ?></td>
                <?php if ($tickets->id_approval_mytalim == 0) { ?>
                <td><span class="badge badge-secondary pending">Pending</span></td>
                <?php } else if ($tickets->id_approval_mytalim == 1) { ?>
                <td><span class="badge badge-danger rejected">Ditolak</span></td>
                <?php } else if ($tickets->id_approval_mytalim == 2) { ?>
                <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                <?php } else if ($tickets->id_approval_mytalim == 3) { ?>
                <td><span class="badge badge-info completed">Selesai</span></td>
                <?php } ?>
              </tr>
              <?php
                    $no++;
                  }

                  if ($tickets->id_mysafar != NULL) {
                    ?>
              <tr class="clickable-row" data-href="<?= base_url('status/detail/mysafar/id/' . $tickets->id_mysafar) ?>">
                <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
                <td><?= $tickets->name ?></td>
                <td><?= $tickets->nama_cabang ?></td>
                <td><?= $tickets->nama_konsumen_mysafar ?></td>
                <td><?= $tickets->produk ?></td>
                <?php if ($tickets->id_approval_mysafar == 0) { ?>
                <td><span class="badge badge-secondary pending">Pending</span></td>
                <?php } else if ($tickets->id_approval_mysafar == 1) { ?>
                <td><span class="badge badge-danger rejected">Ditolak</span></td>
                <?php } else if ($tickets->id_approval_mysafar == 2) { ?>
                <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                <?php } else if ($tickets->id_approval_mysafar == 3) { ?>
                <td><span class="badge badge-info completed">Selesai</span></td>
                <?php } ?>
              </tr>
              <?php
                    $no++;
                  }

                  if ($tickets->id_myihram != NULL) {
                    ?>
              <tr class="clickable-row" data-href="<?= base_url('status/detail/myihram/id/' . $tickets->id_myihram) ?>">
                <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
                <td><?= $tickets->name ?></td>
                <td><?= $tickets->nama_cabang ?></td>
                <td><?= $tickets->nama_konsumen_myihram ?></td>
                <td><?= $tickets->produk ?></td>
                <?php if ($tickets->id_approval_myihram == 0) { ?>
                <td><span class="badge badge-secondary pending">Pending</span></td>
                <?php } else if ($tickets->id_approval_myihram == 1) { ?>
                <td><span class="badge badge-danger rejected">Ditolak</span></td>
                <?php } else if ($tickets->id_approval_myihram == 2) { ?>
                <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                <?php } else if ($tickets->id_approval_myihram == 3) { ?>
                <td><span class="badge badge-info completed">Selesai</span></td>
                <?php } ?>
              </tr>
              <?php
                    $no++;
                  }
                  if ($tickets->id_agent != NULL) {
                    ?>
              <tr class="clickable-row" data-href="<?= base_url('status/detail/aktivasi_agent/id/' . $tickets->id_agent) ?>">
                <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
                <td><?= $tickets->name ?></td>
                <td><?= $tickets->nama_cabang ?></td>
                <td><?= $tickets->nama_aktivasi_agent ?></td>
                <td><?= $tickets->produk ?></td>
                <?php if ($tickets->id_approval_aktivasi_agent == 0) { ?>
                <td><span class="badge badge-secondary pending">Pending</span></td>
                <?php } else if ($tickets->id_approval_aktivasi_agent == 1) { ?>
                <td><span class="badge badge-danger rejected">Ditolak</span></td>
                <?php } else if ($tickets->id_approval_aktivasi_agent == 2) { ?>
                <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                <?php } else if ($tickets->id_approval_aktivasi_agent == 3) { ?>
                <td><span class="badge badge-info completed">Selesai</span></td>
                <?php } ?>
              </tr>
              <?php
                    $no++;
                  }

                  if ($tickets->id_nst != NULL) {
                    ?>
              <tr class="clickable-row" data-href="<?= base_url('status/detail/nst/id/' . $tickets->id_nst) ?>">
                <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
                <td><?= $tickets->name ?></td>
                <td><?= $tickets->nama_cabang ?></td>
                <td><?= $tickets->nama_konsumen_nst ?></td>
                <td><?= $tickets->produk ?></td>
                <?php if ($tickets->id_approval_nst == 0) { ?>
                <td><span class="badge badge-secondary pending">Pending</span></td>
                <?php } else if ($tickets->id_approval_nst == 1) { ?>
                <td><span class="badge badge-danger rejected">Ditolak</span></td>
                <?php } else if ($tickets->id_approval_nst == 2) { ?>
                <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                <?php } else if ($tickets->id_approval_nst == 3) { ?>
                <td><span class="badge badge-info completed">Selesai</span></td>
                <?php } ?>
              </tr>
              <?php
                    $no++;
                  }

                  if ($tickets->id_renovasi != NULL) {
                    ?>
              <tr class="clickable-row" data-href="<?= base_url('status/detail/myhajat/renovasi/' . $tickets->id_renovasi) ?>">
                <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
                <td><?= $tickets->name ?></td>
                <td><?= $tickets->nama_cabang ?></td>
                <td><?= $tickets->nama_konsumen_renovasi ?></td>
                <td><?= $tickets->produk ?></td>
                <?php if ($tickets->id_approval_renovasi == 0) { ?>
                <td><span class="badge badge-secondary pending">Pending</span></td>
                <?php } else if ($tickets->id_approval_renovasi == 1) { ?>
                <td><span class="badge badge-danger rejected">Ditolak</span></td>
                <?php } else if ($tickets->id_approval_renovasi == 2) { ?>
                <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                <?php } else if ($tickets->id_approval_renovasi == 3) { ?>
                <td><span class="badge badge-info completed">Selesai</span></td>
                <?php } ?>
              </tr>
              <?php
                    $no++;
                  }

                  if ($tickets->id_sewa != NULL) {
                    ?>
              <tr class="clickable-row" data-href="<?= base_url('status/detail/myhajat/sewa/' . $tickets->id_sewa) ?>">
                <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
                <td><?= $tickets->name ?></td>
                <td><?= $tickets->nama_cabang ?></td>
                <td><?= $tickets->nama_konsumen_sewa ?></td>
                <td><?= $tickets->produk ?></td>
                <?php if ($tickets->id_approval_sewa == 0) { ?>
                <td><span class="badge badge-secondary pending">Pending</span></td>
                <?php } else if ($tickets->id_approval_sewa == 1) { ?>
                <td><span class="badge badge-danger rejected">Ditolak</span></td>
                <?php } else if ($tickets->id_approval_sewa == 2) { ?>
                <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                <?php } else if ($tickets->id_approval_sewa == 3) { ?>
                <td><span class="badge badge-info completed">Selesai</span></td>
                <?php } ?>
              </tr>
              <?php
                    $no++;
                  }

                  if ($tickets->id_wedding != NULL) {
                    ?>
              <tr class="clickable-row" data-href="<?= base_url('status/detail/myhajat/wedding/' . $tickets->id_wedding) ?>">
                <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
                <td><?= $tickets->name ?></td>
                <td><?= $tickets->nama_cabang ?></td>
                <td><?= $tickets->nama_konsumen_wedding ?></td>
                <td><?= $tickets->produk ?></td>
                <?php if ($tickets->id_approval_wedding == 0) { ?>
                <td><span class="badge badge-secondary pending">Pending</span></td>
                <?php } else if ($tickets->id_approval_wedding == 1) { ?>
                <td><span class="badge badge-danger rejected">Ditolak</span></td>
                <?php } else if ($tickets->id_approval_wedding == 2) { ?>
                <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                <?php } else if ($tickets->id_approval_wedding == 3) { ?>
                <td><span class="badge badge-info completed">Selesai</span></td>
                <?php } ?>
              </tr>
              <?php
                    $no++;
                  }

                  if ($tickets->id_franchise != NULL) {
                    ?>
              <tr class="clickable-row" data-href="<?= base_url('status/detail/myhajat/franchise/' . $tickets->id_franchise) ?>">
                <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
                <td><?= $tickets->name ?></td>
                <td><?= $tickets->nama_cabang ?></td>
                <td><?= $tickets->nama_konsumen_franchise ?></td>
                <td><?= $tickets->produk ?></td>
                <?php if ($tickets->id_approval_franchise == 0) { ?>
                <td><span class="badge badge-secondary pending">Pending</span></td>
                <?php } else if ($tickets->id_approval_franchise == 1) { ?>
                <td><span class="badge badge-danger rejected">Ditolak</span></td>
                <?php } else if ($tickets->id_approval_franchise == 2) { ?>
                <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                <?php } else if ($tickets->id_approval_franchise == 3) { ?>
                <td><span class="badge badge-info completed">Selesai</span></td>
                <?php } ?>
              </tr>
              <?php
                    $no++;
                  }

                  if ($tickets->id_myhajat_lainnya != NULL) {
                    ?>
              <tr class="clickable-row" data-href="<?= base_url('status/detail/myhajat/lainnya/' . $tickets->id_myhajat_lainnya) ?>">
                <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
                <td><?= $tickets->name ?></td>
                <td><?= $tickets->nama_cabang ?></td>
                <td><?= $tickets->nama_konsumen_lainnya ?></td>
                <td><?= $tickets->produk ?></td>
                <?php if ($tickets->id_approval_lainnya == 0) { ?>
                <td><span class="badge badge-secondary pending">Pending</span></td>
                <?php } else if ($tickets->id_approval_lainnya == 1) { ?>
                <td><span class="badge badge-danger rejected">Ditolak</span></td>
                <?php } else if ($tickets->id_approval_lainnya == 2) { ?>
                <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                <?php } else if ($tickets->id_approval_lainnya == 3) { ?>
                <td><span class="badge badge-info completed">Selesai</span></td>
                <?php } ?>
              </tr>
              <?php
                    $no++;
                  }

                  if ($tickets->id_mitra_kerjasama != NULL) {
                    ?>
              <tr class="clickable-row" data-href="<?= base_url('status/detail/mitra_kerjasama/id/' . $tickets->id_mitra_kerjasama) ?>">
                <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
                <td><?= $tickets->name ?></td>
                <td><?= $tickets->nama_cabang ?></td>
                <td><?= $tickets->nama_mitra_kerjasama ?></td>
                <td><?= $tickets->produk ?></td>
                <?php if ($tickets->id_approval_mitra_kerjasama == 0) { ?>
                <td><span class="badge badge-secondary pending">Pending</span></td>
                <?php } else if ($tickets->id_approval_mitra_kerjasama == 1) { ?>
                <td><span class="badge badge-danger rejected">Ditolak</span></td>
                <?php } else if ($tickets->id_approval_mitra_kerjasama == 2) { ?>
                <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                <?php } else if ($tickets->id_approval_mitra_kerjasama == 3) { ?>
                <td><span class="badge badge-info completed">Selesai</span></td>
                <?php } ?>
              </tr>
              <?php
                  }
                  if ($tickets->id_myfaedah != NULL) {
                    ?>
              <tr class="clickable-row" data-href="<?= base_url('status/detail/myfaedah/id/' . $tickets->id_myfaedah) ?>">
                <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
                <td><?= $tickets->name ?></td>
                <td><?= $tickets->nama_cabang ?></td>
                <td><?= $tickets->nama_konsumen_myfaedah ?></td>
                <td><?= $tickets->produk ?></td>
                <?php if ($tickets->id_approval_myfaedah == 0) { ?>
                <td><span class="badge badge-secondary pending">Pending</span></td>
                <?php } else if ($tickets->id_approval_myfaedah == 1) { ?>
                <td><span class="badge badge-danger rejected">Ditolak</span></td>
                <?php } else if ($tickets->id_approval_myfaedah == 2) { ?>
                <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                <?php } else if ($tickets->id_approval_myfaedah == 3) { ?>
                <td><span class="badge badge-info completed">Selesai</span></td>
                <?php } ?>
              </tr>
              <?php
                  }
                  if ($tickets->id_mycars != NULL) {
                    ?>
              <tr class="clickable-row" data-href="<?= base_url('status/detail/mycars/id/' . $tickets->id_mycars) ?>">
                <td class="not-clickable" width="10%"><?= $tickets->id_ticket ?></td>
                <td><?= $tickets->name ?></td>
                <td><?= $tickets->nama_cabang ?></td>
                <td><?= $tickets->nama_konsumen_mycars ?></td>
                <td><?= $tickets->produk ?></td>
                <?php if ($tickets->id_approval_mycars == 0) { ?>
                <td><span class="badge badge-secondary pending">Pending</span></td>
                <?php } else if ($tickets->id_approval_mycars == 1) { ?>
                <td><span class="badge badge-danger rejected">Ditolak</span></td>
                <?php } else if ($tickets->id_approval_mycars == 2) { ?>
                <td><span class="badge badge-success approved">Disetujui Admin 1</span></td>
                <?php } else if ($tickets->id_approval_mycars == 3) { ?>
                <td><span class="badge badge-info completed">Selesai</span></td>
                <?php } ?>
              </tr>
              <?php
                  }
                } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <?php }  ?>

  </section>