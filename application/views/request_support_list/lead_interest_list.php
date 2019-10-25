<section class="content-header text-center mt-4 mb-4">
  <h4>
    <?= ucfirst($this->uri->segment(2)) ?> Lead Interest
    <!-- <small>it all starts here</small> -->
  </h4>
  <p><?= date('d F, y') ?></p>
</section>

<!-- Main content -->
<section class="content m-2">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">

        <div class="row mt-4 m-1">
          <div class="col-lg-12">
            <form action="#" method="get" class="form-inline my-2 my-lg-0 pull-right">
              <div class="form-group">
                <div class="input-group">
                  <input class="form-control form-rounded cariTiket" type="text" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                    <button class="btn btn-sm btn-outline-secondary input-group-text form-rounded" type="button"><i class="icon-search"></i></button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>

        <hr>
        <div class="table-responsive">
          <table class="table table-striped table-bordered display status dt-responsive nowrap" width="100%">
            <thead>
              <th class="all">ID Lead Interest.</th>
              <th>Nama</th>
              <th>E-mail</th>
              <th class="all">Telepon</th>
              <th class="all">Kota</th>
              <th>Produk</th>
              <th>Sumber Lead</th>
              <th>Status</th>
              <th class="all"></th>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($data->result() as $d) {  ?>
                <tr>
                  <td><?= $d->id_lead_interest ?></td>
                  <td><?= $d->nama ?></td>
                  <td><?= $d->email ?></td>
                  <td><?= $d->telepon ?></td>
                  <td><?= $d->kota ?></td>
                  <td><?= $d->produk ?></td>
                  <td><?= $d->sumber_lead ?></td>
                  <?php if ($d->id_approval == 0) { ?>
                    <td><label class="badge badge-secondary">Pending</span></td>
                  <?php } else if ($d->id_approval == 1) { ?>
                    <td><label class="badge badge-danger">Ditolak</span></td>
                  <?php } else if ($d->id_approval == 2) { ?>
                    <td><label class="badge badge-success">Disetujui</span></td>
                  <?php } else if ($d->id_approval == 3) { ?>
                    <td><label class="badge badge-info">Selesai</label></td>
                  <?php } else if ($d->id_approval == 4) { ?>
                    <td><label class="badge badge-warning">In Progress</label></td>
                  <?php } ?>
                  <td><a class="btn btn-secondary" href="<?= base_url('status/detail/lead_interest/id/' . $d->id_lead_interest) ?>">Detail</a></td>
                </tr>
              <?php
                $no++;
              } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>