<section class="content-header">
      <h1>
        Detaiil My Ta'lim Tickets
        <!-- <small>it all starts here</small> -->
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-lg-6">

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
                        if($data->id_approval == 0){echo '<span class="label label-warning">Belum Direview</span>'; }
                        if($data->id_approval == 1){echo '<span class="label label-danger">Ditolak</span>'; }
                        if($data->id_approval == 2){echo '<span class="label label-primary">Disetujui</span>'; }
                        if($data->id_approval == 3){echo '<span class="label label-success">Selesai</span>';}
                      ?>
                    </td>
                  </tr>
              </table>
            </div>
        </div>
    </div>
</section>