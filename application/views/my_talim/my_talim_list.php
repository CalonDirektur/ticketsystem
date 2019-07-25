<section class="content-header">
  <h1>
    <?= ucfirst($this->uri->segment(2)) ?> My Ta'lim Tickets
    <!-- <small>it all starts here</small> -->
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-lg-2">

    </div>
    <div class="col-lg-6">
      <div class="table-responsive card">
        <table id="myTable" class="table">
          <thead>
            <th>ID Ticket</th>
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
                <td><?= $d->nama_konsumen ?></td>
                <td><?= $d->jenis_konsumen ?></td>
                <td><?= ucfirst($d->pendidikan) ?></td>
                <?php if ($d->id_approval == 0) { ?>
                  <td><label class="badge-secondary">Belum Direview</span></td>
                  <td><a class="btn btn-secondary" href="<?= base_url('status/pending/mytalim/id/' . $d->id_mytalim) ?>">Detail</a></td>
                <?php } else if ($d->id_approval == 1) { ?>
                  <td><label class="badge-danger">Ditolak</span></td>
                  <td><a class="btn btn-secondary" href="<?= base_url('status/rejected/mytalim/id/' . $d->id_mytalim) ?>">Detail</a></td>
                <?php } else if ($d->id_approval == 2) { ?>
                  <td><label class="badge-success">Disetujui Admin 1</span></td>
                  <td><a class="btn btn-secondary" href="<?= base_url('status/approved/mytalim/id/' . $d->id_mytalim) ?>">Detail</a></td>
                <?php } else if ($d->id_approval == 3) { ?>
                  <td><label class="badge-primary">Selesai</label></td>
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

    <div class="col-lg-2">

    </div>
  </div>
</section>