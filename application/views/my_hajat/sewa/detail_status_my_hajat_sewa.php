<section class="content-header">
  <h1>
    Detail My Hajat Sewa Tickets
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
          <h3 class="box-title">Data Ticket My Hajat Sewa</h3>
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
                  <a class="btn btn-primary" href="<?= base_url('Admin1/approve/myhajat/sewa/' . $data->id_sewa) ?>">Approve</a>
                  <a class="btn btn-danger" href="<?= base_url('Admin1/reject/myhajat/sewa/' . $data->id_sewa) ?>">Reject</a>
                </td>
              </tr>
            <?php } ?>
            <?php if ($this->session->userdata('level') == 3 && $data->id_approval == 2) { ?>
              <tr>
                <td><b>Aksi:</b></td>
                <td>
                  <a class="btn btn-primary" href="<?= base_url('Admin2/completed/myhajat/sewa/' . $data->id_sewa) ?>">Approve</a>
                </td>
              </tr>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Post Komentar -->
  <div class="row">
    <div class="col-lg-12 col-md-6">
      <div class="box">
        <div class="box-header with-border">
          <b>Post Komentar</b>
        </div>
        <div class="box-body">
          <div class="form-group">
            <textarea class="form-control" name="post_comment" id="post_comment" cols="10" rows="2" placeholder="Masukkan Komentar Anda"></textarea>
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary pull-right" name="submit_komentar">Kirim</button>
        </div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="box box-widget">
        <div class="box-header with-border">
          <div class="user-block"> <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
            <span class="description">Shared publicly - 7:30 PM Today</span>
          </div>
          <!-- /.user-block -->
          <div class="box-tools">
            <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read">
              <i class="fa fa-circle-o"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <!-- post text -->
          <p>Far far away, behind the word mountains, far from the
            countries Vokalia and Consonantia, there live the blind
            texts. Separated they live in Bookmarksgrove right at</p>

          <p>the coast of the Semantics, a large language ocean.
            A small river named Duden flows by their place and supplies
            it with the necessary regelialia. It is a paradisematic
            country, in which roasted parts of sentences fly into
            your mouth.</p>

          <!-- Social sharing buttons -->
          <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
          <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
          <span class="pull-right text-muted">45 likes - 2 comments</span>
        </div>
        <!-- /.box-body -->
        <div class="box-footer box-comments">
          <div class="box-comment">
            <div class="comment-text">
              <span class="username">
                Nora Havisham
                <span class="text-muted pull-right">8:03 PM Today</span>
              </span>
              The point of using Lorem Ipsum is that it has a more-or-less
              normal distribution of letters, as opposed to using
              'Content here, content here', making it look like readable English.
            </div>
          </div>
        </div>
        <div class="box-footer">
          <form action="#" method="post">
            <div class="img-push">
              <input type="text" class="form-control input-sm" placeholder="Press enter to post comment">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>