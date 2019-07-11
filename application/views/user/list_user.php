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
            <th>Nama</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Level</th>
            <th>ID Cabang</th>
          </thead>
        <tbody>
          <form method="post" action="<?= site_url('Admin_1/aksi') ?>">
          <?php 
          $no = 1;
          foreach($list_user as $list) {  ?>
            <tr>
              <td>#<?= $list['id_user'] ?></td>
              <td><?= $list['name'] ?></td>
              <td><?= $list['username'] ?></td>
              <td><?= $list['email'] ?></td>
              <td><?= $list['password'] ?></td>             
              <td><?= $list['level'] ?></td>             
              <td><?= $list['id_cabang'] ?></td>             
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