<section class="content-header">
      <h1>
        Review Ticket Admin 1
        <!-- <small>it all starts here</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
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
            <th>Nama</th>
            <th>Alamat</th>
            <th>Hobi</th>
            <th>Id Approval</th>
            <th></th>
          </thead>
        <tbody>
          <form method="post" action="<?= site_url('Admin_1/aksi') ?>">
          <?php 
          $no = 1;
          foreach($records as $r) {  ?>
            <tr>
              <td>#<?= $r['id_data'] ?></td>
              <td><?= $r['nama'] ?></td>
              <td><?= $r['alamat'] ?></td>
              <td><?= $r['hobi'] ?></td>
              <td><?= $r['id_approval'] ?></td>
              <td>
                <a name="approve" href="<?= site_url('Admin_1/approve/'.$r['id_data']) ?>" class="btn-sm btn-primary">Approve</a>
                <a name="reject" href="<?= site_url('Admin_1/reject/'.$r['id_data']) ?>" class="btn-sm btn-danger">Reject</a>
              </td>
            </tr>
          <?php 
          $no++;
          } ?>
          </form>
        </tbody>
        </table>
      </div>
      <div class="col-lg-2">

      </div>
    </div>
  </section>