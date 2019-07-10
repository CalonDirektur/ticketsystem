<section class="content-header">
      <h1>
        Review Ticket
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
      <div class="col-lg-4">
  
      </div>
      <div class="col-lg-4">
        <table id="table-admin1" class="table">
          <thead>
            <th>No.</th>
            <th>Id Ticket</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Hobi</th>
            <th>Id Approval</th>
            <th></th>
          </thead>
        <tbody>
          <?php 
          $no = 1;
          foreach($records as $r) {  ?>
            <tr>
              <td><?= $no; ?></td>
              <td>#<?= $r['id_data'] ?></td>
              <td><?= $r['nama'] ?></td>
              <td><?= $r['alamat'] ?></td>
              <td><?= $r['hobi'] ?></td>
              <td><?= $r['id_approval'] == 2 ? '<small class="label bg-primary">Not Approved</small>' : ''  ?></td>
              <td><a name="approve" href="<?= site_url('Admin_2/approve/'.$r['id_data']) ?>" class="btn-sm btn-primary">Approve</a></td>
            </tr>
          <?php 
          $no++;
          } ?>
          </tbody>
        </table>
      </div>
      <div class="col-lg-4">

      </div>
    </div>
</section>