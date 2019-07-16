<section class="content-header">
  <h1>
    Detail My Ta'lim Tickets
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
              <td>#<?= $data->id_sewa ?></td>
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
              <td><b>Nama Pemilik</b></td>
              <td><?= $data->nama_pemilik ?></td>
            </tr>
            <tr>
              <td><b>Jenis Pemilik</b></td>
              <td><?= $data->jenis_pemilik ?></td>
            </tr>
            <tr>
              <td><b>Hubungan dengan Pemohon</b></td>
              <td><?= $data->hubungan_pemohon ?></td>
            </tr>
            <tr>
              <td><b>Luas Panjang</b></td>
              <td><?= $data->luas_panjang ?></td>
            </tr>
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
                  <a class="btn btn-primary" href="<?= base_url('Admin1/approve/myhajat/sewa/' . $data->id_myhajat) ?>">Approve</a>
                  <a class="btn btn-danger" href="<?= base_url('Admin1/reject/myhajat/sewa/' . $data->id_myhajat) ?>">Reject</a>
                </td>
              </tr>
            <?php } ?>
            <?php if ($this->session->userdata('level') == 3 && $data->id_approval == 2) { ?>
              <tr>
                <td><b>Aksi:</b></td>
                <td>
                  <a class="btn btn-primary" href="<?= base_url('Admin2/approve/myhajat/sewa/' . $data->id_myhajat) ?>">Approve</a>
                </td>
              </tr>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>
</section>