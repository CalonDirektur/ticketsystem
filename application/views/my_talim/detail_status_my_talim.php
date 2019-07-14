<section class="content-header">
  <h1>
    Detail My Ta'lim Tickets
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-lg-6">
      <div class="row">
        <img id="gambar" class="img-fluid" src="<?= base_url('uploads/mytalim/' . $data->ktp) ?>" alt="no photo" width="550" height="400">

      </div>
      <div class="row">
        <img class="thumb" id="ktp" src="<?= base_url('uploads/mytalim/' . $data->ktp) ?>" alt="no photo" width="50" height="50">
        <img class="thumb" id="kk" src="<?= base_url('uploads/mytalim/' . $data->kk) ?>" alt="no photo" width="50" height="50">
        <img class="thumb" id="bukti_penghasilan" src="<?= base_url('uploads/mytalim/' . $data->bukti_penghasilan) ?>" alt="no photo" width="50" height="50">
        <img class="thumb" id="npwp" src="<?= base_url('uploads/mytalim/' . $data->npwp) ?>" alt="no photo" width="50" height="50">
        <img class="thumb" id="tambahan" src="<?= base_url('uploads/mytalim/' . $data->tambahan) ?>" alt="no photo" width="50" height="50">
      </div>
    </div>
    <div class="col-lg-6">
      <div class="box">
        <div class="box-header text-center">
          <h3 class="box-title">Data Ticket</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table table-striped">
            <thead>
              <th>Kolom</th>
              <th>Isi</th>
            </thead>
            <tr>
              <td><b>ID Ticket</b></td>
              <td>#<?= $data->id_mytalim ?></td>
            </tr>
            <tr>
              <td><b>Nama Konsumen</b></td>
              <td><?= $data->nama_konsumen ?></td>
            </tr>
            <tr>
              <td><b>Jenis Konsumen</b></td>
              <td><?= $data->jenis_konsumen ?></td>
            </tr>
            <tr>
              <td><b>Pendidikan</b></td>
              <td><?= $data->pendidikan ?></td>
            </tr>
            <tr>
              <td><b>Nama Lembaga</b></td>
              <td><?= $data->nama_lembaga ?></td>
            </tr>
            <tr>
              <td><b>Tahun Berdiri</b></td>
              <td><?= $data->tahun_berdiri ?></td>
            </tr>
            <tr>
              <td><b>Akreditasi</b></td>
              <td><?= $data->akreditasi ?></td>
            </tr>
            <tr>
              <td><b>Tahun Periode</b></td>
              <td><?= $data->periode ?></td>
            </tr>
            <tr>
              <td><b>Tujuan Pembiayaan</b></td>
              <td><?= $data->tujuan_pembiayaan ?></td>
            </tr>
            <tr>
              <td><b>Nilai Pembiayaan</b></td>
              <td><?= $data->nilai_pembiayaan ?></td>
            </tr>
            <tr>
              <td><b>Status:</b></td>
              <td>
                <?php
                if ($data->id_approval == 0) {
                  echo '<span class="label label-warning">Belum Direview</span>';
                }
                if ($data->id_approval == 1) {
                  echo '<span class="label label-danger">Ditolak</span>';
                }
                if ($data->id_approval == 2) {
                  echo '<span class="label label-primary">Disetujui</span>';
                }
                if ($data->id_approval == 3) {
                  echo '<span class="label label-success">Selesai</span>';
                }
                ?>
              </td>
            </tr>
            <!-- Tombol Aksi ini akan muncul untuk Admin 1 -->
            <?php if ($this->session->userdata('level') == 2 && $data->id_approval == 0) { ?>
              <tr>
                <td><b>Aksi:</b></td>
                <td>
                  <a class="btn btn-primary" href="<?= base_url('Admin1/approve/mytalim/' . $data->id_mytalim) ?>">Approve</a>
                  <a class="btn btn-danger" href="<?= base_url('Admin1/reject/mytalim/' . $data->id_mytalim) ?>">Reject</a>
                </td>
              </tr>
            <?php } ?>
            <?php if ($this->session->userdata('level') == 3 && $data->id_approval == 2) { ?>
              <tr>
                <td><b>Aksi:</b></td>
                <td>
                  <a class="btn btn-primary" href="<?= base_url('Admin2/approve/mytalim/' . $data->id_mytalim) ?>">Approve</a>
                </td>
              </tr>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>
</section>