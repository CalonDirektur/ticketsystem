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
              <td>#<?= $data->id_wedding ?></td>
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
              <td><b>Nama Wedding Organizer</b></td>
              <td><?= $data->nama_wo ?></td>
            </tr>
            <tr>
              <td><b>Jenis Wedding Organizer</b></td>
              <td><?= $data->jenis_wo ?></td>
            </tr>
            <tr>
              <td><b>Lama Usaha Berdiri</b></td>
              <td><?= $data->lama_berdiri ?></td>
            </tr>
            <tr>
              <td><b>Jumlah Biaya Acara</b></td>
              <td><?= $data->jumlah_biaya ?></td>
            </tr>
            <tr>
              <td><b>Jumlah Undangan</b></td>
              <td><?= $data->jumlah_undangan ?></td>
            </tr>
            <tr>
              <td><b>Akun Media Sosial Wedding Organizer</b></td>
              <td><?= $data->akun_sosmed ?></td>
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
                  <a class="btn btn-primary" href="<?= base_url('Admin1/approve/myhajat/wedding/' . $data->id_wedding) ?>">Approve</a>
                  <a class="btn btn-danger" href="<?= base_url('Admin1/reject/myhajat/wedding/' . $data->id_wedding) ?>">Reject</a>
                </td>
              </tr>
            <?php } ?>
            <!-- Tombol Aksi ini akan muncul untuk Admin 1 -->
            <?php if ($this->session->userdata('level') == 3 && $data->id_approval == 2) { ?>
              <tr>
                <td><b>Aksi:</b></td>
                <td>
                  <a class="btn btn-primary" href="<?= base_url('Admin2/complete/myhajat/wedding/' . $data->id_wedding) ?>">Approve</a>
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
      <form method="post" action="<?= base_url('comment/post_comment') ?>">
        <div class="box">
          <div class="box-header with-border">
            <b>Post Komentar</b>
          </div>
          <div class="box-body">
            <div class="form-group">
              <textarea class="form-control" name="post_comment" id="post_comment" cols="10" rows="2" placeholder="Masukkan Komentar Anda" required></textarea>
              <input type="hidden" name="id_komentar" value="<?= $data->id_wedding ?>">
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary pull-right" name="submit_komentar">Kirim</button>
          </div>
      </form>
    </div>
  </div>
  </div>


  <?php foreach ($komentar as $komen) { ?>
    <div class="row">
      <div class="col-lg-12 col-md-12">

        <div class="box box-widget">
          <div class="box-header with-border">
            <div class="user-block"> <span class="username"><a href="#">Administrator 1</a></span>
              <span class="description">Diposting: <?= $komen->date ?></span>
            </div>
            <div class="box-tools">
              <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read">
                <i class="fa fa-circle-o"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <p><?= $komen->comment ?></p>
          </div>
          <!-- Reply Box Comment -->
          <div class="box-footer box-comments">
          <?php 
          $this->db->from('tb_comment');
          $this->db->where('parent_comment_id = '. $komen->id);
          $reply = $this->db->get();
           ?>
      <?php foreach ($reply->result() as $balasan) { ?>
            <div class="box-comment">
              <div class="comment-text">
                <span class="username">
                  User
                  <span class="text-muted pull-right"><?= $komen->date ?></span>
                </span>
                <?= $balasan->comment ?>
              </div>
            </div>
      <?php } ?>
          </div>
          <div class="box-footer">
            <form action="<?= base_url('comment/post_reply'); ?>" method="post">
              <div class="img-push">
                <input name="parent_comment" type="hidden" value="<?= $komen->id ?>">
                <input name="id_komentar" type="hidden" value="<?= $data->id_wedding ?>">
                <input name="post_reply" type="text" class="form-control input-sm" placeholder="Press enter to post comment">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
  <?php } ?>

</section>