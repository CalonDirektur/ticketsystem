<section class="content-header">
  <h1>
    <?= ucfirst($this->uri->segment(2)) ?> Lead Management Tickets
    <!-- <small>it all starts here</small> -->
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="card p-0">
        <table class="display status responsive" width="100%">
          <thead>
            <th>ID Lead Management</th>
            <th>Lead ID</th>
            <th>Nama Konsumen</th>
            <th>Sumber Lead</th>
            <th>Produk</th>
            <th>Ticket Status</th>
            <th></th>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($data as $d) {  ?>
              <tr>
                <td>#<?= $d->id_lead ?></td>
                <td><?= $d->lead_id ?></td>
                <td><?= $d->nama_cabang ?></td>
                <td><?= $d->nama_konsumen ?></td>
                <td><?= $d->sumber_lead ?></td>
                <td><?= $d->produk ?></td>
                <?php if ($d->id_approval == 0) { ?>
                  <td><label class="badge-secondary">Belum Direview</span></td>
                  <td><a class="btn btn-secondary" href="<?= base_url('status/pending/lead_management/id/' . $d->id_lead) ?>">Detail</a></td>
                <?php } else if ($d->id_approval == 1) { ?>
                  <td><label class="badge-danger">Ditolak</span></td>
                  <td><a class="btn btn-secondary" href="<?= base_url('status/rejected/lead_management/id/' . $d->id_lead) ?>">Detail</a></td>
                <?php } else if ($d->id_approval == 2) { ?>
                  <td><label class="badge-success">Disetujui Admin 1</span></td>
                  <td><a class="btn btn-secondary" href="<?= base_url('status/approved/lead_management/id/' . $d->id_lead) ?>">Detail</a></td>
                <?php } else if ($d->id_approval == 3) { ?>
                  <td><label class="badge-primary">Selesai</label></td>
                  <td><a class="btn btn-secondary" href="<?= base_url('status/completed/lead_management/id/' . $d->id_lead) ?>">Detail</a></td>
                <?php } ?>
              </tr>
              <?php
              $no++;
            } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>