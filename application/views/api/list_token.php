<div class="content-wrapper">
    <div class="container">
        <h3 class="text-center">List API Key Partner</h3>
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="card">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Partner</th>
                                <th>E-mail</th>
                                <th>Key</th>
                                <th>Tanggal Daftar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            if ($data->num_rows() > 0) {
                                foreach ($data->result() as $partner) { ?>
                                    <tr>
                                        <td><?= $no++ ?>.</td>
                                        <td><?= $partner->partner ?></td>
                                        <td><?= $partner->email ?></td>
                                        <td><?= $partner->key ?></td>
                                        <td><?= $partner->created_at ?></td>
                                        <td><a onclick="return confirm('Apakah Anda yakin ingin menghapus user API ini:\n <?= $partner->partner  ?>')" class="btn btn-danger" href="<?= base_url('Api/delete_key/' . $partner->user_id) ?>">Delete</a></td>
                                    </tr>
                                <?php
                                    }
                                } else {
                                    ?>
                                <tr>
                                    <td class="text-center" colspan="6"><b>Tidak ada data!</b></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>