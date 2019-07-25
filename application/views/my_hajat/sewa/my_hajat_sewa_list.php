<section class="content-header">
  <h1>
    <?= ucfirst($this->uri->segment(2)) ?> My Hajat Sewa Tickets
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
        <table id="table-admin1" class="table">
          <thead>
            <th>ID Ticket</th>
            <th>Nama Konsumen</th>
            <th>Jenis Konsumen</th>
            <th>Nama Pemilik</th>
            <th>Ticket Status</th>
            <th></th>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($data as $d) {  ?>
              <tr>
                <td>#<?= $d->id_sewa ?></td>
                <td><?= $d->nama_konsumen ?></td>
                <td><?= $d->jenis_konsumen ?></td>
                <td><?= $d->nama_pemilik ?></td>
                <?php if ($d->id_approval == 0) { ?>
                  <td><label class="badge badge-default">Belum Direview</label></td>
                  <td><a class="btn btn-secondary" href="<?= base_url('status/pending/myhajat/sewa/' . $d->id_sewa) ?>">Detail</a></td>
                <?php } else if ($d->id_approval == 1) { ?>
                  <td><label class="label label-danger">Ditolak</label></td>
                  <td><a class="btn btn-secondary" href="<?= base_url('status/rejected/myhajat/sewa/' . $d->id_sewa) ?>">Detail</a></td>
                <?php } else if ($d->id_approval == 2) { ?>
                  <td><label class="label label-success">Disetujui Admin 1</label></td>
                  <td><a class="btn btn-secondary" href="<?= base_url('status/approved/myhajat/sewa/' . $d->id_sewa) ?>">Detail</a></td>
                <?php } else if ($d->id_approval == 3) { ?>
                  <td><label class="label label-primary">Selesai</label></td>
                  <td><a class="btn btn-secondary" href="<?= base_url('status/completed/myhajat/sewa/' . $d->id_lainnya) ?>">Detail</a></td>
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