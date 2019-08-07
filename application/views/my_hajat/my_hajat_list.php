<section class="content-header">
  <h1>
    <?= ucfirst($this->uri->segment(2)); ?> My Hajat Support Request Tickets
    <!-- <small>it all starts here</small> -->
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <!-- My Hajat Table -->
      <?php if ($data->num_rows() > 0) { ?>
        <!-- My Hajat  Table -->
        <div class="card mt-4">
          <div class="card-header">
            <h3 class="card-title">Tabel My Hajat</h3>
          </div>
          <div class="card-body p-0">
            <table class="display status responsive" width="100%">
              <thead>
                <tr>
                  <th class="all">ID My Hajat</th>
                  <th>Cabang</th>
                  <th class="all">Nama Konsumen</th>
                  <th>Jenis Konsumen</th>
                  <th>Produk</th>
                  <th class="all">Ticket Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($data->result() as $myhajat) {
                  if ($myhajat->id_renovasi != NULL) {
                    ?>
                    <tr>
                      <td width="1%">#<?= $myhajat->id_my_hajat ?></td>
                      <td><?= $myhajat->nama_cabang ?></td>
                      <td><?= $myhajat->nama_konsumen_renovasi ?></td>
                      <td><?= $myhajat->jenis_konsumen_renovasi ?></td>
                      <td><?= $myhajat->produk ?></td>
                      <?php if ($myhajat->id_approval_renovasi == 0) { ?>
                        <td><span class="badge badge-secondary">Pending</span></td>
                        <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/renovasi/' . $myhajat->id_renovasi) ?>">Detail</a></td>
                      <?php } else if ($myhajat->id_approval_renovasi == 1) { ?>
                        <td><span class="badge badge-danger">Ditolak</span></td>
                        <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/renovasi/' . $myhajat->id_renovasi) ?>">Detail</a></td>
                      <?php } else if ($myhajat->id_approval_renovasi == 2) { ?>
                        <td><span class="badge badge-success">Disetujui Admin 1</span></td>
                        <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/renovasi/' . $myhajat->id_renovasi) ?>">Detail</a></td>
                      <?php } else if ($myhajat->id_approval_renovasi == 3) { ?>
                        <td><span class="badge badge-primary">Selesai</span></td>
                        <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/renovasi/' . $myhajat->id_renovasi) ?>">Detail</a></td>
                      <?php } ?>
                    </tr>
                    <?php
                    $no++;
                  }
                  if ($myhajat->id_sewa != NULL) {
                    ?>
                    <tr>
                      <td width="1%">#<?= $myhajat->id_my_hajat ?></td>
                      <td><?= $myhajat->nama_cabang ?></td>
                      <td><?= $myhajat->nama_konsumen_sewa ?></td>
                      <td><?= $myhajat->jenis_konsumen_sewa ?></td>
                      <td><?= $myhajat->produk ?></td>
                      <?php if ($myhajat->id_approval_sewa == 0) { ?>
                        <td><span class="badge badge-secondary">Pending</span></td>
                        <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/sewa/' . $myhajat->id_sewa) ?>">Detail</a></td>
                      <?php } else if ($myhajat->id_approval_sewa == 1) { ?>
                        <td><span class="badge badge-danger">Ditolak</span></td>
                        <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/sewa/' . $myhajat->id_sewa) ?>">Detail</a></td>
                      <?php } else if ($myhajat->id_approval_sewa == 2) { ?>
                        <td><span class="badge badge-success">Disetujui Admin 1</span></td>
                        <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/sewa/' . $myhajat->id_sewa) ?>">Detail</a></td>
                      <?php } else if ($myhajat->id_approval_sewa == 3) { ?>
                        <td><span class="badge badge-primary">Selesai</span></td>
                        <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/sewa/' . $myhajat->id_sewa) ?>">Detail</a></td>
                      <?php } ?>
                    </tr>
                    <?php
                    $no++;
                  }
                  if ($myhajat->id_wedding != NULL) {
                    ?>
                    <tr>
                      <td width="1%">#<?= $myhajat->id_my_hajat ?></td>
                      <td><?= $myhajat->nama_cabang ?></td>
                      <td><?= $myhajat->nama_konsumen_wedding ?></td>
                      <td><?= $myhajat->jenis_konsumen_wedding ?></td>
                      <td><?= $myhajat->produk ?></td>
                      <?php if ($myhajat->id_approval_wedding == 0) { ?>
                        <td><span class="badge badge-secondary">Pending</span></td>
                        <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/wedding/' . $myhajat->id_wedding) ?>">Detail</a></td>
                      <?php } else if ($myhajat->id_approval_wedding == 1) { ?>
                        <td><span class="badge badge-danger">Ditolak</span></td>
                        <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/wedding/' . $myhajat->id_wedding) ?>">Detail</a></td>
                      <?php } else if ($myhajat->id_approval_wedding == 2) { ?>
                        <td><span class="badge badge-success">Disetujui Admin 1</span></td>
                        <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/wedding/' . $myhajat->id_wedding) ?>">Detail</a></td>
                      <?php } else if ($myhajat->id_approval_wedding == 3) { ?>
                        <td><span class="badge badge-primary">Selesai</span></td>
                        <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/wedding/' . $myhajat->id_wedding) ?>">Detail</a></td>
                      <?php } ?>
                    </tr>
                    <?php
                    $no++;
                  }
                  if ($myhajat->id_franchise != NULL) {
                    ?>
                    <tr>
                      <td width="1%">#<?= $myhajat->id_my_hajat ?></td>
                      <td><?= $myhajat->nama_cabang ?></td>
                      <td><?= $myhajat->nama_konsumen_franchise ?></td>
                      <td><?= $myhajat->jenis_konsumen_franchise ?></td>
                      <td><?= $myhajat->produk ?></td>
                      <?php if ($myhajat->id_approval_franchise == 0) { ?>
                        <td><span class="badge badge-secondary">Pending</span></td>
                        <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/franchise/' . $myhajat->id_franchise) ?>">Detail</a></td>
                      <?php } else if ($myhajat->id_approval_franchise == 1) { ?>
                        <td><span class="badge badge-danger">Ditolak</span></td>
                        <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/franchise/' . $myhajat->id_franchise) ?>">Detail</a></td>
                      <?php } else if ($myhajat->id_approval_franchise == 2) { ?>
                        <td><span class="badge badge-success">Disetujui Admin 1</span></td>
                        <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/franchise/' . $myhajat->id_franchise) ?>">Detail</a></td>
                      <?php } else if ($myhajat->id_approval_franchise == 3) { ?>
                        <td><span class="badge badge-primary">Selesai</span></td>
                        <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/franchise/' . $myhajat->id_franchise) ?>">Detail</a></td>
                      <?php } ?>
                    </tr>
                    <?php
                    $no++;
                  }
                  if ($myhajat->id_myhajat_lainnya != NULL) {
                    ?>
                    <tr>
                      <td width="1%">#<?= $myhajat->id_my_hajat ?></td>
                      <td><?= $myhajat->nama_cabang ?></td>
                      <td><?= $myhajat->nama_konsumen_lainnya ?></td>
                      <td><?= $myhajat->jenis_konsumen_lainnya ?></td>
                      <td><?= $myhajat->produk ?></td>
                      <?php if ($myhajat->id_approval_lainnya == 0) { ?>
                        <td><span class="badge badge-secondary">Pending</span></td>
                        <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/pending/myhajat/lainnya/' . $myhajat->id_myhajat_lainnya) ?>">Detail</a></td>
                      <?php } else if ($myhajat->id_approval_lainnya == 1) { ?>
                        <td><span class="badge badge-danger">Ditolak</span></td>
                        <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/rejected/myhajat/lainnya/' . $myhajat->id_myhajat_lainnya) ?>">Detail</a></td>
                      <?php } else if ($myhajat->id_approval_lainnya == 2) { ?>
                        <td><span class="badge badge-success">Disetujui Admin 1</span></td>
                        <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/approved/myhajat/lainnya/' . $myhajat->id_myhajat_lainnya) ?>">Detail</a></td>
                      <?php } else if ($myhajat->id_approval_lainnya == 3) { ?>
                        <td><span class="badge badge-primary">Selesai</span></td>
                        <td><a class="btn btn-primary btn-rounded btn-fw" href="<?= base_url('status/completed/myhajat/lainnya/' . $myhajat->id_myhajat_lainnya) ?>">Detail</a></td>
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
      <?php } else { ?>

        <div class="card text-center p-4">
          <h1>Tidak ada data</h1>
        </div>
      <?php } ?>
    </div>
  </div>
</section>