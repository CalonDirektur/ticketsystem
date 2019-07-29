<section class="content-header">
  <h1>
    <?= ucfirst($this->uri->segment(2)) ?> Aktivasi Agent Tickets
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
            <th>ID Aktivasi Agent</th>
            <th>Nama Cabang</th>
            <th>Nama Agent</th>
            <th>Jenis Agent</th>
            <th>Ticket Status</th>
            <th></th>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($data as $d) {  ?>
              <tr>
                <td>#<?= $d->id_agent ?></td>
                <td><?= $d->nama_cabang ?></td>
                <td><?= $d->nama_agent ?></td>
                <td><?= $d->jenis_agent ?></td>
                <?php if ($d->id_approval == 0) { ?>
                  <td><label class="badge-secondary">Belum Direview</span></td>
                  <td><a class="btn btn-secondary" href="<?= base_url('status/pending/aktivasi_agent/id/' . $d->id_agent) ?>">Detail</a></td>
                <?php } else if ($d->id_approval == 1) { ?>
                  <td><label class="badge-danger">Ditolak</span></td>
                  <td><a class="btn btn-secondary" href="<?= base_url('status/rejected/aktivasi_agent/id/' . $d->id_agent) ?>">Detail</a></td>
                <?php } else if ($d->id_approval == 2) { ?>
                  <td><label class="badge-success">Disetujui Admin 1</span></td>
                  <td><a class="btn btn-secondary" href="<?= base_url('status/approved/aktivasi_agent/id/' . $d->id_agent) ?>">Detail</a></td>
                <?php } else if ($d->id_approval == 3) { ?>
                  <td><label class="badge-primary">Selesai</label></td>
                  <td><a class="btn btn-secondary" href="<?= base_url('status/completed/aktivasi_agent/id/' . $d->id_agent) ?>">Detail</a></td>
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