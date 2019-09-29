<div class="container-fluid">
    <section class="content-header text-center mt-4">
        <h4>Input Pertanyaan</h4>
        <p><?= date('d F, Y'); ?></p>
    </section>
    <section class="content">
        <?php if ($this->session->userdata('level') != 5) { ?>

            <div class="row p-2">
                <div class="col-lg-12">
                    <div class="card p-5">
                        <form method="post" action="<?= site_urL('faq/add_input_pertanyaan') ?>">
                            <input name="id_user" type="hidden" value="<?= $this->fungsi->user_login()->id_user ?>">
                            <input name="id_cabang" type="hidden" value="<?= $this->fungsi->user_login()->id_cabang ?>">
                            <div class="form-group">
                                <label for="jenis_pesan">Jenis Pesan</label>
                                <select name="jenis_pesan" id="jenis_pesan" class="form-control" required>
                                    <option disabled required selected value="">- Pilih jenis pesan -</option>
                                    <option value="Saran">Saran</option>
                                    <option value="Kritik">Kritik</option>
                                    <option value="Informasi">Informasi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="isi_pesan">Isi Pesan</label>
                                <textarea class="form-control" name="isi_pesan" id="isi_pesan" cols="30" rows="10" required></textarea>
                            </div>
                            <button class="btn btn-block btn-info" type="submit">Kirim</button>
                        </form>
                    </div>

                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <?php } ?>
        <?php if ($this->session->userdata('level') == 5) { ?>
            <div class="row mt-2">
                <div class="col-lg-12">
                    <div class="card">
                        <table class="table">
                            <thead>
                                <th>No.</th>
                                <th>Pesan</th>
                                <th>Jenis Pesan</th>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                    foreach ($data->result() as $pesan) {
                                        ?>
                                    <tr>
                                        <td><?= $no++ ?>. </td>
                                        <td><?= $pesan->isi_pesan ?></td>
                                        <td><?= $pesan->jenis_pesan ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php } ?>
    </section>
</div>