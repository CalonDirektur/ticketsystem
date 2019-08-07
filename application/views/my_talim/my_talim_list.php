<section class="content-header">
  <h1>
    <?= ucfirst($this->uri->segment(2)) ?> My Ta'lim Tickets
    <!-- <small>it all starts here</small> -->
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <table id="myTable" class="table status responsive">
        <thead>
          <th>ID My Talim</th>
          <th>Nama Cabang</th>
          <th>Nama Konsumen</th>
          <th>Jenis Konsumen</th>
          <th>Pendidikan</th>
          <th>Ticket Status</th>
          <th></th>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($data as $d) {  ?>
            <tr>
              <td>#<?= $d->id_mytalim ?></td>
              <td><?= $d->nama_cabang ?></td>
              <td><?= $d->nama_konsumen ?></td>
              <td><?= $d->jenis_konsumen ?></td>
              <td><?= ucfirst($d->pendidikan) ?></td>
              <?php if ($d->id_approval == 0) { ?>
                <td><label class="badge badge-secondary">Belum Direview</label></td>
                <td><a class="btn btn-secondary" href="<?= base_url('status/pending/mytalim/id/' . $d->id_mytalim) ?>">Detail</a></td>
              <?php } else if ($d->id_approval == 1) { ?>
                <td><label class="badge badge-danger">Ditolak</label></td>
                <td><a class="btn btn-secondary" href="<?= base_url('status/rejected/mytalim/id/' . $d->id_mytalim) ?>">Detail</a></td>
              <?php } else if ($d->id_approval == 2) { ?>
                <td><label class="badge badge-success">Disetujui Admin 1</label></td>
                <td><a class="btn btn-secondary" href="<?= base_url('status/approved/mytalim/id/' . $d->id_mytalim) ?>">Detail</a></td>
              <?php } else if ($d->id_approval == 3) { ?>
                <td><label class="badge badge-primary">Selesai</label></td>
                <td><a class="btn btn-secondary" href="<?= base_url('status/completed/mytalim/id/' . $d->id_mytalim) ?>">Detail</a></td>
              <?php } ?>
            </tr>
            <?php
            $no++;
          } ?>
        </tbody>
      </table>
    </div>
  </div>
</section>