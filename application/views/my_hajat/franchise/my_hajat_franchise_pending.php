<section class="content-header">
  <h1>
    Pending My Hajat Franchise Tickets
    <!-- <small>it all starts here</small> -->
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-lg-2">
    </div>
    <div class="col-lg-6">
      <div class="table-responsive card" >
      <table id="table-admin1" class="table">
        <thead>
          <th>ID Ticket</th>
          <th>Nama Konsumen</th>
          <th>Jenis Konsumen</th>
          <th>Nama Franchise</th>
          <th>Ticket Status</th>
          <th></th>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($data as $d) {  ?>
            <tr>
              <td>#<?= $d->id_franchise ?></td>
              <td><?= $d->nama_konsumen ?></td>
              <td><?= $d->jenis_konsumen?></td>
              <td><?= $d->nama_franchise ?></td>
              <td><span class="label label-default">Belum direview</span></td>
              <td><a class="btn btn-default" href="<?= base_url('status/pending/myhajat/franchise/' . $d->id_franchise) ?>">Detail</a></td>
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