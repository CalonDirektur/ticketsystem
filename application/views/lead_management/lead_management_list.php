<section class="content-header text-center mt-4 mb-4">
  <h4>
    <?= ucfirst($this->uri->segment(2)) ?> Lead Management Tickets
    <!-- <small>it all starts here</small> -->
  </h4>
  <p><?= date('d F, y') ?></p>
</section>

<!-- Main content -->
<section class="content m-2">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <table class="table display status dt-responsive" width="100%">
          <thead>
            <th>ID Ticket</th>
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
            foreach ($data->result() as $d) {  ?>
            <tr>
              <td>#<?= $d->id_ticket ?></td>
              <td><?= $d->lead_id ?></td>
              <td><?= $d->nama_konsumen ?></td>
              <td><?= $d->sumber_lead ?></td>
              <td><?= $d->produk ?></td>
              <?php if ($d->id_approval == 0) { ?>
              <td><label class="badge badge-secondary">Belum Direview</span></td>
              <td><a class="btn btn-secondary" href="<?= base_url('status/detail/lead_management/id/' . $d->id_lead) ?>">Detail</a></td>
              <?php } else if ($d->id_approval == 1) { ?>
              <td><label class="badge badge-danger">Ditolak</span></td>
              <td><a class="btn btn-secondary" href="<?= base_url('status/detail/lead_management/id/' . $d->id_lead) ?>">Detail</a></td>
              <?php } else if ($d->id_approval == 2) { ?>
              <td><label class="badge badge-success">Disetujui Admin 1</span></td>
              <td><a class="btn btn-secondary" href="<?= base_url('status/detail/lead_management/id/' . $d->id_lead) ?>">Detail</a></td>
              <?php } else if ($d->id_approval == 3) { ?>
              <td><label class="badge badge-primary">Selesai</label></td>
              <td><a class="btn btn-secondary" href="<?= base_url('status/detail/lead_management/id/' . $d->id_lead) ?>">Detail</a></td>
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