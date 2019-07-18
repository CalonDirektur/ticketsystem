<section class="content-header">
  <h1>
    Detail My Hajat Renovasi Tickets
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- Rencana mau masukkin lampiran -->
    <div class="col-lg-6">

    </div>

    <div class="col-lg-6">
      <div class="box">
        <div class="box-header text-center">
          <h3 class="box-title">Data Ticket My Hajat Renovasi</h3>
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
              <td>#<?= $data->id_renovasi ?></td>
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
              <td><b>Nama Vendor</b></td>
              <td><?= $data->nama_vendor ?></td>
            </tr>
            <tr>
              <td><b>Jenis Vendor</b></td>
              <td><?= $data->jenis_vendor ?></td>
            </tr>
            <tr>
              <td><b>Bagian Bangunan</b></td>
              <td><?= $data->bagian_bangunan ?></td>
            </tr>
            <tr>
              <td><b>Luas Bangunan</b></td>
              <td><?= $data->luas_bangunan ?></td>
            </tr>
            <tr>
              <td><b>Jumlah Pekerja</b></td>
              <td><?= $data->jumlah_pekerja ?></td>
            </tr>
            <tr>
              <td><b>Estimasi Waktu</b></td>
              <td><?= $data->estimasi_waktu ?></td>
            </tr>
            <tr>
              <td><b>Nilai Pembiayaan</b></td>
              <td><?= $data->nilai_pembiayaan ?></td>
            </tr>
            <tr>
              <td><b>Informasi Tambahan</b></td>
              <td><?= $data->informasi_tambahan ?></td>
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
                  echo '<span class="label label-success">Disetujui Admin 1</span>';
                }
                if ($data->id_approval == 3) {
                  echo '<span class="label label-primary">Selesai</span>';
                }
                ?>
              </td>
            </tr>
            <!-- Tombol Aksi ini akan muncul untuk Admin 1 -->
            <?php if ($this->session->userdata('level') == 2 && $data->id_approval == 0) { ?>
              <tr>
                <td><b>Aksi:</b></td>
                <td>
                  <a class="btn btn-primary" href="<?= base_url('Admin1/approve/myhajat/renovasi/' . $data->id_renovasi) ?>">Approve</a>
                  <a class="btn btn-danger" href="<?= base_url('Admin1/reject/myhajat/renovasi/' . $data->id_renovasi) ?>">Reject</a>
                </td>
              </tr>
            <?php } ?>
            <?php if ($this->session->userdata('level') == 3 && $data->id_approval == 2) { ?>
              <tr>
                <td><b>Aksi:</b></td>
                <td>
                  <a class="btn btn-primary" href="<?= base_url('Admin2/complete/myhajat/renovasi/' . $data->id_renovasi) ?>">Approve</a>
                </td>
              </tr>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>
</section>