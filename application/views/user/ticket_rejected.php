<section class="content-header">
      <h1>
        Rejected Ticket
        <!-- <small>it all starts here</small> -->
      </h1>
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
            <th>Nama</th>
            <th>Alamat</th>
            <th>Hobi</th>
            <th>Id Approval</th>
          </thead>
        <tbody>
          <?php 
          $no = 1;
          foreach($records as $r) {  ?>
            <tr>
              <td><?= $no; ?></td>
              <td><?= $r['nama'] ?></td>
              <td><?= $r['alamat'] ?></td>
              <td><?= $r['hobi'] ?></td>
              <td><?= $r['id_approval'] == 1 ? '<small class="label bg-red">Ditolak</small>' : ''  ?></td>
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