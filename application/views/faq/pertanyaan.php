<div class="container-fluid">
    <section class="content-header text-center mt-4">
        <h4>Frequent Asked Question</h4>
        <p><?= date('d F, Y'); ?></p>
    </section>
    <section class="content">
        <div class="row p-2">
            <div class="col-lg-2">

            </div>
            <div class="col-lg-8">
                <!-- Large modal -->
                <?php if ($this->session->userdata('level') == 5) { ?>
                    <div class="row">
                        <div class="col">
                            <form method="post" action="<?= site_url('faq/add_pertanyaan') ?>" enctype="multipart/form-data">
                                <div class="card shadow p-4 rounded">
                                    <div class="form-group">
                                        <label for="pertanyaan">Pertanyaan</label>
                                        <input class="form-control rounded" type="text" name="pertanyaan" id="pertanyaan" placeholder="Masukkan Pertanyaan" required>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-10">
                                            <label for="id_faq_kategori">Kategori</label>
                                            <select class="form-control" name="id_faq_kategori" id="id_faq_kategori" required>
                                                <option disabled selected value="">- Pilih Kategori Pertanyaan -</option>
                                                <?php foreach ($kategori->result() as $kat) { ?>
                                                    <option value="<?= $kat->id_faq_kategori ?>"><?= $kat->kategori_faq ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <br>
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambahKategori"><i class="mdi mdi-plus btn-icon-prepend"></i>Tambah Kategori</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="jawaban">Jawaban</label>
                                        <textarea class="form-control" name="content" id="content" required></textarea>
                                    </div>
                                    <button class="btn btn-info" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php } ?>
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div id="accordion">
                            <?php
                            $this->db->from('tb_faq_kategori');
                            $kategori_faq = $this->db->get();
                            ?>
                            <?php
                            if ($kategori->num_rows() > 0) {
                                foreach ($kategori_faq->result() as $kat) {
                                    ?>
                                    <h3 class="p-3"><?= $kat->kategori_faq ?></h3>
                                    <div class="p-0">
                                        <table class="table table-hover">
                                            <?php
                                                    $parent = $kat->id_faq_kategori;
                                                    $this->db->from('tb_faq');
                                                    $this->db->where('id_faq_kategori', $parent);
                                                    $question = $this->db->get();
                                                    foreach ($question->result() as $pertanyaan) {
                                                        ?>
                                                <tr data-href="<?= base_url('faq/jawaban/' . $pertanyaan->id_faq) ?>" class="table-secondary clickable-row">
                                                    <td><?= $pertanyaan->pertanyaan ?></td>
                                                    <?php if ($this->session->userdata('level') == 5) { ?>
                                                        <td class="float-right"><a onclick="deletePertanyaan()" class="btn btn-danger text-white" href="<?= base_url('faq/delete_pertanyaan/' . $pertanyaan->id_faq) ?>">x</a></td>
                                                    <?php } ?>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="tambahKategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url('faq/add_kategori') ?>">
                    <div class="modal-body">
                        <label for="kategori_faq">Nama Kategori</label>
                        <input class="form-control" type="text" name="kategori_faq" id="kategori_faq" required>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Kategori</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kategori->result() as $kat) { ?>
                                    <tr>
                                        <td><?= $kat->id_faq_kategori ?></td>
                                        <td><?= $kat->kategori_faq ?></td>
                                        <td><a class="btn btn-danger text-white" href="<?= base_url('faq/delete_kategori/' . $kat->id_faq_kategori) ?>">Hapus</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>