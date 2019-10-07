<!-- partial -->
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12 mb-4 mb-xl-0">
            <h4 class="font-weight-bold text-dark text-center">Dashboard</h4>
            <p class="font-weight-normal mb-2 text-muted text-center"><?= date('d F, Y'); ?></p>
        </div>
    </div>
    <div class="owl-carousel chart-owl">
        <div class="item">
            <!-- Customer -->
            <div class="card" style="height: 400px; min-height:400px">
                <div class=" card-body">
                    <select class="form-control pull-right col-3" id="monthly-tickets">
                        <?php
                        $month = $this->db->query("SELECT DISTINCT MONTH(tanggal_dibuat) as num, DATE_FORMAT(tanggal_dibuat, '%b') as bulan FROM tb_ticket WHERE tanggal_dibuat != '0000-00-00 00:00:00' ORDER BY MONTH(tanggal_dibuat) DESC");
                        foreach ($month->result() as $bulan) {
                            ?>
                            <option value="<?= DATE('Y') ?>-<?= $bulan->num ?>-00"><?= $bulan->bulan ?></option>
                        <?php } ?>
                    </select>
                    <h4 class="card-title">Tickets</h4>
                    <p><?= round($today_tickets) ?> pengajuan hari ini</p>
                    <h4 id="total-tiket" class="text-dark font-weight-bold mb-4"><?= $total_tickets ?></h4>
                    <canvas id="customers" height="800"></canvas>
                </div>
            </div>
        </div>
        <div class="item">
            <!-- Leads -->
            <div class="card" style="height: 400px; min-height:400px">
                <div class=" card-body">
                    <select class="form-control pull-right col-3" id="tahun-leads">
                        <?php
                        $year = $this->db->query("SELECT DISTINCT DATE_FORMAT(date_created, '%Y') as year FROM tb_lead_management WHERE date_created != '0000-00-00 00:00:00'");
                        foreach ($year->result() as $tahun) {
                            ?>
                            <option id="<?= $tahun->year ?>" value="<?= $tahun->year ?>-00-00"><?= $tahun->year ?></option>
                        <?php } ?>
                    </select>
                    <h4 class="card-title">Leads</h4>
                    <p><?= round($avg_leads) ?> per bulan</p>
                    <h4 class="text-dark font-weight-bold mb-2"><?= $total_leads ?></h4>
                    <canvas id="orders" height="800"></canvas>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="card" style="height: 400px; min-height:400px">
                <div class=" card-body">
                    <h4 class="card-title">Produk yang paling banyak disupport</h4>
                    <div class="row">
                        <div class="col-lg-5">
                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit amet cumque cupiditate</p> -->
                        </div>
                        <div class="col-lg-7">
                            <select class="form-control pull-right col-3" id="anually-product">
                                <?php
                                $year = $this->db->query("SELECT DISTINCT DATE_FORMAT(tanggal_dibuat, '%Y') as year FROM tb_ticket");
                                foreach ($year->result() as $tahun) {
                                    ?>
                                    <option id="<?= $tahun->year ?>" value="<?= $tahun->year ?>-00-00"><?= $tahun->year ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <canvas id="web-audience-metrics-satacked" class="mt-3"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="owl-carousel stats-carousel mt-3">
        <div class="item">
            <div class="card card-body" style="height: 450px; min-height:450px">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Waktu Penyelesaian Ticket</h4>
                </div>
                <p>Dari waktu pengajuan sampai terselesaikan</p>
                <div style="overflow-x: auto">
                    <table class="table">
                        <thead>
                            <tr class="bg-secondary">
                                <th>Jenis Support</th>
                                <th>Rata-rata Pengerjaan</th>
                            </tr>
                        </thead>
                        <tbody id="jumlah-status">
                            <tr>
                                <td>My Ihram</td>
                                <td><?= secondsToWords(round($penyelesaian_myihram)) ?></td>
                            </tr>
                            <tr>
                                <td>My Hajat</td>
                                <td><?= secondsToWords(round($penyelesaian_myhajat)) ?></td>
                            </tr>
                            <tr>
                                <td>My Ta'lim</td>
                                <td><?= secondsToWords(round($penyelesaian_mytalim)) ?></td>
                            </tr>
                            <tr>
                                <td>My Safar</td>
                                <td><?= secondsToWords(round($penyelesaian_mysafar)) ?></td>
                            </tr>
                            <tr>
                                <td>My Faedah</td>
                                <td><?= secondsToWords(round($penyelesaian_myfaedah)) ?></td>
                            </tr>
                            <tr>
                                <td>My CarS</td>
                                <td><?= secondsToWords(round($penyelesaian_mycars)) ?></td>
                            </tr>
                            <tr>
                                <td>NST</td>
                                <td><?= secondsToWords(round($penyelesaian_nst)) ?></td>
                            </tr>
                            <tr>
                                <td>Aktivasi Agent</td>
                                <td><?= secondsToWords(round($penyelesaian_aktivasi_agent)) ?></td>
                            </tr>
                            <tr>
                                <td>Mitra Kerjasama</td>
                                <td><?= secondsToWords(round($penyelesaian_mitra_kerjasama)) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="card card-body" style="height: 450px; min-height:450px">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Waktu Penyelesaian Admin</h4>
                </div>
                <p>Rata-rata waktu yang dibutuhkan admin untuk menyelesaikan 1 tugas</p>
                <table class="table">
                    <thead>
                        <tr class="bg-secondary">
                            <th>Jenis Support</th>
                            <th>Rata-rata Pengerjaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Admin 1</td>
                            <td><?= secondsToWords(round($penyelesaian_admin1)) ?></td>
                        </tr>
                        <tr>
                            <td>Admin 2</td>
                            <td><?= secondsToWords(round($penyelesaian_admin2)) ?></td>
                        </tr>
                        <tr>
                            <td>Admin NST Ijarah</td>
                            <td><?= secondsToWords(round($penyelesaian_admin_nst_1)) ?></td>
                        </tr>
                        <tr>
                            <td>Admin NST Murabahah</td>
                            <td><?= secondsToWords(round($penyelesaian_admin_nst_2)) ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="item">
            <div class="card card-body" style="height: 450px; min-height:450px">
                <div class="d-flex justify-content-between mb-2">
                    <h4 class="card-title">Status Ticket</h4>
                    <select class="form-control pull-right col-3" id="pilih-status">
                        <option id="produk" value="Produk">Produk</option>
                        <option id="nst" value="NST">NST</option>
                    </select>
                </div>
                <p>Rata-rata waktu yang dibutuhkan admin untuk menyelesaikan 1 tugas</p>
                <table class="table">
                    <thead>
                        <tr class="bg-secondary">
                            <th>Jenis Support</th>
                            <th>Rata-rata Pengerjaan</th>
                        </tr>
                    </thead>
                    <tbody id="jumlah-produk">
                        <tr>
                            <td><span class="badge badge-secondary">Pending</span></td>
                            <td><?= $status_pending ?> Tickets</td>
                        </tr>
                        <tr>
                            <td><span class="badge badge-success">Reviewed</span></td>
                            <td><?= $status_reviewed ?> Tickets</td>
                        </tr>
                        <tr>
                            <td><span class="badge badge-info">Completed</span></td>
                            <td><?= $status_completed ?> Tickets</td>
                        </tr>
                        <tr>
                            <td><span class="badge badge-danger">Rejected</span></td>
                            <td><?= $status_rejected ?> Tickets</td>
                        </tr>
                        <tr>
                            <td><span class="badge badge-warning">In Progress</span></td>
                            <td><?= $status_inprogress ?> Tickets</td>
                        </tr>
                    </tbody>
                    <tbody id="jumlah-nst" style="display:none">
                        <tr>
                            <td><span class="badge badge-secondary">Pending</span></td>
                            <td><?= $status_pending_nst ?> Tickets</td>
                        </tr>
                        <tr>
                            <td><span class="badge badge-info">Completed</span></td>
                            <td><?= $status_completed_nst ?> Tickets</td>
                        </tr>
                        <tr>
                            <td><span class="badge badge-danger">Rejected</span></td>
                            <td><?= $status_rejected_nst ?> Tickets</td>
                        </tr>
                        <tr>
                            <td><span class="badge badge-warning">In Progress</span></td>
                            <td><?= $status_inprogress_nst ?> Tickets</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="owl-carousel stats-carousel mt-3">
        <div class="item">
            <div class="grid-margin stretch-card">
                <div class="card card-body" style="height: 450px; min-height:450px">
                    <h4 class="card-title">Sumber Leads</h4>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="d-flex justify-content-between mt-2 text-dark mb-2">
                                <div><span class="font-weight-bold"><?= $total_leads ?></span> Leads</div>
                                <!-- <div>Goal: 2000</div> -->
                            </div>
                            <div class="progress progress-md grouped mb-2">
                                <?php foreach ($sumber_leads as $sumber) { ?>
                                    <div class="progress-bar bg-<?= $sumber->warna ?>" role="progressbar" style="width: <?= round(($sumber->count_leads / $total_leads) * 100) ?>%" aria-valuenow="<?= $sumber->count_leads ?>" aria-valuemin="0" aria-valuemax="<?= $total_leads ?>"></div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="traffic-source-legend">
                                <div class="d-flex justify-content-between mb-1 mt-2">
                                    <div class="font-weight-bold">SOURCE</div>
                                    <div class="font-weight-bold">TOTAL</div>
                                </div>
                                <?php foreach ($sumber_leads as $sumber) { ?>
                                    <div class="d-flex justify-content-between legend-label">
                                        <div><span class="bg-<?= $sumber->warna ?>"></span><?= $sumber->sumber_lead ?></div>
                                        <div><?= $sumber->count_leads ?></div>
                                    </div>
                                <?php } ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="grid-margin stretch-card">
                <div class="card card-body" style="height: 450px; min-height:450px">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">NST Status</h4>
                    </div>
                    <p>Alasan Reject terbanyak</p>
                    <div class="row mt-2 mb-2">
                        <table class="table">
                            <thead>
                                <tr class="bg-secondary">
                                    <th>Reject Status</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($alasan_reject_nst as $alasan_reject) { ?>
                                    <tr>
                                        <td><?= $alasan_reject->alasan_reject ?></td>
                                        <td><?= $alasan_reject->jumlah ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="grid-margin stretch-card">
                <div class="card card-body" style="height: 450px; min-height:450px">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Quotes</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 grid-margin-lg-0 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Aktivitas Cabang</h4>
                    <p>Support tiket, jumlah leads dan lainnya</p>
                    <div style="overflow-x: auto">
                        <table class="table">
                            <thead>
                                <tr class="bg-secondary">
                                    <th>Cabang</th>
                                    <th>Total Ticket</th>
                                    <th>Total Leads</th>
                                    <th>Top Request</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($aktivitas_cabang as $aktivitas) { ?>
                                    <tr>
                                        <td><?= $aktivitas->nama_cabang ?></td>
                                        <td><?= $aktivitas->tickets ?></td>
                                        <td><?= $aktivitas->leads ?></td>
                                        <td><?= $aktivitas->top_request  ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>