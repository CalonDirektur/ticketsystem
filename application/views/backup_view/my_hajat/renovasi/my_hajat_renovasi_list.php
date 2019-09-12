<section class="content-header">
  <h1>
    <?= ucfirst($this->uri->segment(2)); ?> My Hajat Renovasi Tickets
    <!-- <small>it all starts here</small> -->
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-lg-6">
      <div class="card p-0">
        <table class="display status responsive" width="100%">
          <thead>
            <th>ID Ticket</th>
            <th>Nama Konsumen</th>
            <th>Nama Cabang</th>
            <th>Jenis Konsumen</th>
            <th>Nama Vendor</th>
            <th>Ticket Status</th>
            <th></th>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($data as $d) {  ?>
              <tr>
                <td>#<?= $d->id_renovasi ?></td>
                <td><?= $d->nama_cabang ?></td>
                <td><?= $d->nama_konsumen ?></td>
                <td><?= $d->jenis_konsumen ?></td>
                <td><?= $d->nama_vendor ?></td>
                <?php if ($d->id_approval == 0) { ?>
                  <td><label class="badge badge-secondary">Belum Direview</label></td>
                  <td><a class="btn btn-secondary" href="<?= base_url('status/pending/myhajat/renovasi/' . $d->id_renovasi) ?>">Detail</a></td>
                <?php } else if ($d->id_approval == 1) { ?>
                  <td><label class="badge badge-danger">Ditolak</label></td>
                  <td><a class="btn btn-secondary" href="<?= base_url('status/rejected/myhajat/renovasi/' . $d->id_renovasi) ?>">Detail</a></td>
                <?php } else if ($d->id_approval == 2) { ?>
                  <td><label class="badge badge-success">Disetujui Admin 1</label></td>
                  <td><a class="btn btn-secondary" href="<?= base_url('status/approved/myhajat/renovasi/' . $d->id_renovasi) ?>">Detail</a></td>
                <?php } else if ($d->id_approval == 3) { ?>
                  <td><label class="badge badge-primary">Selesai</label></td>
                  <td><a class="btn btn-secondary" href="<?= base_url('status/completed/myhajat/renovasi/' . $d->id_renovasi) ?>">Detail</a></td>
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