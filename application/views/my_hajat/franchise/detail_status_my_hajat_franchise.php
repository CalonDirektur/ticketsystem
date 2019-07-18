<section class="content-header">
  <h1>
    Detail My Hajat Franchise Tickets
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
          <h3 class="box-title">Data Ticket My Hajat Franchise</h3>
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
              <td>#<?= $data->id_franchise ?></td>
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
              <td><b>Nama Franchise</b></td>
              <td><?= $data->nama_franchise ?></td>
            </tr>
            <tr>
              <td><b>Jumlah Cabang</b></td>
              <td><?= $data->jumlah_cabang ?></td>
            </tr>
            <tr>
              <td><b>Jenis Franchise</b></td>
              <td><?= $data->jenis_franchise ?></td>
            </tr>
            <tr>
              <td><b>Tahun Berdiri Franchise</b></td>
              <td><?= $data->tahun_berdiri_franchise ?></td>
            </tr>
            <tr>
              <td><b>Harga Franchise</b></td>
              <td><?= $data->harga_franchise ?></td>
            </tr>
            <tr>
              <td><b>Jangka Waktu Franchise</b></td>
              <td><?= $data->jangka_waktu_franchise ?></td>
            </tr>
            <tr>
              <td><b>Akun Media Sosial / Website Franchise</b></td>
              <td><?= $data->akun_sosmed_website ?></td>
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
                  <a class="btn btn-primary" href="<?= base_url('Admin1/approve/myhajat/franchise/' . $data->id_franchise) ?>">Approve</a>
                  <a class="btn btn-danger" href="<?= base_url('Admin1/reject/myhajat/franchise/' . $data->id_franchise) ?>">Reject</a>
                </td>
              </tr>
            <?php } ?>
            <?php if ($this->session->userdata('level') == 3 && $data->id_approval == 2) { ?>
              <tr>
                <td><b>Aksi:</b></td>
                <td>
                  <a class="btn btn-primary" href="<?= base_url('Admin2/complete/myhajat/franchise/' . $data->id_franchise) ?>">Approve</a>
                </td>
              </tr>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>
</section>