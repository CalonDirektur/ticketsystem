<section class="content-header">
  <h1>
    List 
    My Hajat Tickets
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
            <th>Nama Vendor</th>
            <th>Ticket Status</th>
            <th></th>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($data as $d) {  ?>
              <tr>
                <td>#<?= $d->id_myhajat_lainnya ?></td>
                <td><?= $d->nama_konsumen ?></td>
                <td><?= $d->jenis_konsumen?></td>
                <td><?= $d->nama_penyedia_jasa ?></td>
                <?php if($d->id_approval == 0){ ?>
                  <td><span class="label label-default">Belum Direview</span></td>
                  <td><a class="btn btn-default" href="<?= base_url('status/pending/myhajat/lainnya/' . $d->id_myhajat_lainnya) ?>">Detail</a></td>
                <?php } else if($d->id_approval == 1){ ?>
                  <td><span class="label label-danger">Ditolak</span></td>
                  <td><a class="btn btn-default" href="<?= base_url('status/rejected/myhajat/lainnya/' . $d->id_myhajat_lainnya) ?>">Detail</a></td>
               <?php } else if($d->id_approval == 2) { ?>
                <td><span class="label label-success">Disetujui Admin 1</span></td>
                  <td><a class="btn btn-default" href="<?= base_url('status/approved/myhajat/lainnya/' . $d->id_myhajat_lainnya) ?>">Detail</a></td>
              <?php } else if ($d->id_approval == 3) { ?>
                <td><span class="label label-primary">Selesai</span></td>
                <td><a class="btn btn-default" href="<?= base_url('status/completed/myhajat/lainnya/' . $d->id_myhajat_lainnya) ?>">Detail</a></td>
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