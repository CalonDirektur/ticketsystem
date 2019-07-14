<section class="content-header">
  <h1>
    Review Ticket Admin 1
    <!-- <small>it all starts here</small> -->
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-lg-2">

    </div>
    <div class="col-lg-6">
      <table id="table-admin1" class="table">
        <thead>
          <th>No.</th>
          <th>Nama Konsumen</th>
          <th>Jenis Konsumen</th>
          <th>Pendidikan</th>
          <th>Id Approval</th>
          <th></th>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($pending as $d) {  ?>
            <tr>
              <td>#<?= $d->id_mytalim ?></td>
              <td><?= $d->nama_konsumen ?></td>
              <td><?= $d->jenis_konsumen ?></td>
              <td><?= $d->pendidikan ?></td>
              <td><?= $d->id_approval == 0 ? '<span class="badge"> Belum direview</span>' : ''  ?></td>
              <td><a class="btn btn-default" href="<?= base_url('Admin1/review/mytalim/' . $d->id_mytalim) ?>">Klik</a></td>
            </tr>
            <?php
            $no++;
          } ?>
        </tbody>
      </table>
    </div>
    <div class="col-lg-2">

    </div>
  </div>
</section>