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
          <table class="table table-striped table-bordered display status dt-responsive nowrap width=" 100%">
            <thead>
              <th class="all">ID Lead Mgmt.</th>
              <th>Requester</th>
              <th>Cabang</th>
              <th>Lead ID</th>
              <th class="all">Nama Konsumen</th>
              <th class="all">Sumber Lead</th>
              <th>Produk</th>
              <th class="all"></th>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($data->result() as $d) {  ?>
                <tr>
                  <td><?= $d->id_lead ?></td>
                  <td><?= $d->name ?></td>
                  <td><?= $d->nama_cabang ?></td>
                  <td><?= $d->lead_id ?></td>
                  <td><?= $d->nama_konsumen ?></td>
                  <td><?= $d->sumber_lead ?></td>
                  <td><?= $d->produk ?></td>
                  <?php if ($d->id_approval == 0) { ?>
                    <td><a class="btn btn-secondary" href="<?= base_url('status/detail/lead_management/id/' . $d->id_lead) ?>">Detail</a></td>
                  <?php } else if ($d->id_approval == 1) { ?>
                    <td><a class="btn btn-secondary" href="<?= base_url('status/detail/lead_management/id/' . $d->id_lead) ?>">Detail</a></td>
                  <?php } else if ($d->id_approval == 2) { ?>
                    <td><a class="btn btn-secondary" href="<?= base_url('status/detail/lead_management/id/' . $d->id_lead) ?>">Detail</a></td>
                  <?php } else if ($d->id_approval == 3) { ?>
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
  </div>
</section>