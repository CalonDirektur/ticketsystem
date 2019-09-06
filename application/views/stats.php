<!-- partial -->
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12 mb-4 mb-xl-0">
            <h4 class="font-weight-bold text-dark text-center">Dashboard</h4>
            <p class="font-weight-normal mb-2 text-muted text-center"><?= date('d F, Y'); ?></p>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-xl-3 flex-column d-flex grid-margin stretch-card">
            <div class="row flex-grow">
                <!-- Customer -->
                <div class="col-sm-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tickets</h4>
                            <p>50 pengajuan per hari</p>
                            <h4 class="text-dark font-weight-bold mb-2">3981</h4>
                            <canvas id="customers"></canvas>
                        </div>
                    </div>
                </div>
                <!-- Leads -->
                <div class="col-sm-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Leads</h4>
                            <p>1032 per bulan</p>
                            <h4 class="text-dark font-weight-bold mb-2">4,981</h4>
                            <canvas id="orders"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 d-flex grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Produk yang paling banyak disupport</h4>
                    <div class="row">
                        <div class="col-lg-5">
                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit amet cumque cupiditate</p> -->
                        </div>
                        <!-- <div class="col-lg-7">
                            <div class="chart-legends d-lg-block d-none" id="chart-legends"></div>
                        </div> -->
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
    <div class="row">
        <div class="col-xl-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Waktu Penyelesaian Ticket</h4>
                    </div>
                    <p>Dari waktu pengajuan sampai terselesaikan</p>
                    <div class="row mt-2 mb-2">
                        <table class="table">
                            <thead>
                                <tr class="bg-secondary">
                                    <th>Jenis Support</th>
                                    <th>Rata-rata Pengerjaan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>My Ihram</td>
                                    <td>22 Menit</td>
                                </tr>
                                <tr>
                                    <td>My Hajat</td>
                                    <td>1 Jam</td>
                                </tr>
                                <tr>
                                    <td>My Safar</td>
                                    <td>14 Menit</td>
                                </tr>
                                <tr>
                                    <td>My Faedah</td>
                                    <td>13 Menit</td>
                                </tr>
                                <tr>
                                    <td>My CarS</td>
                                    <td>20 Jam</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Waktu Penyelesaian Admin</h4>
                    </div>
                    <p>Rata-rata waktu yang dibutuhkan admin untuk menyelesaikan 1 tugas</p>
                    <div class="row mt-2 mb-2">
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
                                    <td>22 Menit</td>
                                </tr>
                                <tr>
                                    <td>Admin 2</td>
                                    <td>1 Jam</td>
                                </tr>
                                <tr>
                                    <td>Admin NST</td>
                                    <td>14 Menit</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Status Ticket</h4>
                    </div>
                    <p>Rata-rata waktu yang dibutuhkan admin untuk menyelesaikan 1 tugas</p>
                    <div class="row mt-2 mb-2">
                        <table class="table">
                            <thead>
                                <tr class="bg-secondary">
                                    <th>Jenis Support</th>
                                    <th>Rata-rata Pengerjaan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Pending</td>
                                    <td>23 Tickets</td>
                                </tr>
                                <tr>
                                    <td>Reviewed</td>
                                    <td>433 Tickets</td>
                                </tr>
                                <tr>
                                    <td>Approved</td>
                                    <td>300 Tickets</td>
                                </tr>
                                <tr>
                                    <td>Completed</td>
                                    <td>200 Ticket</td>
                                </tr>
                                <tr>
                                    <td>Rejected</td>
                                    <td>500 Tickets</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sumber Leads</h4>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="d-flex justify-content-between mt-2 text-dark mb-2">
                                <div><span class="font-weight-bold">3444</span> Leads</div>
                                <!-- <div>Goal: 2000</div> -->
                            </div>
                            <div class="progress progress-md grouped mb-2">
                                <div class="progress-bar  bg-danger" role="progressbar" style="width: 30%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar  bg-primary" role="progressbar" style="width: 10%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 10%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-success" role="progressbar" style="width: 5%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-light" role="progressbar" style="width: 25%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="traffic-source-legend">
                                <div class="d-flex justify-content-between mb-1 mt-2">
                                    <div class="font-weight-bold">SOURCE</div>
                                    <div class="font-weight-bold">TOTAL</div>
                                </div>
                                <div class="d-flex justify-content-between legend-label">
                                    <div><span class="bg-danger"></span>Digital Marketing</div>
                                    <div>22</div>
                                </div>
                                <div class="d-flex justify-content-between legend-label">
                                    <div><span class="bg-info"></span>Penyedia Jasa</div>
                                    <div>1000</div>
                                </div>
                                <div class="d-flex justify-content-between legend-label">
                                    <div><span class="bg-primary"></span>Direct Selling</div>
                                    <div>2000</div>
                                </div>
                                <div class="d-flex justify-content-between legend-label">
                                    <div><span class="bg-warning"></span>Agent</div>
                                    <div>10000</div>
                                </div>
                                <div class="d-flex justify-content-between legend-label">
                                    <div><span class="bg-success"></span>Walk in</div>
                                    <div>20000</div>
                                </div>
                                <div class="d-flex justify-content-between legend-label">
                                    <div><span class="bg-light"></span>RO</div>
                                    <div>20000</div>
                                </div>
                                <div class="d-flex justify-content-between legend-label">
                                    <div><span class="bg-light"></span>EGC / CGC</div>
                                    <div>20000</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
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
                                <tr>
                                    <td>Fraud Checking</td>
                                    <td>22</td>
                                </tr>
                                <tr>
                                    <td>Televerifikator</td>
                                    <td>23</td>
                                </tr>
                                <tr>
                                    <td>Capacity</td>
                                    <td>23</td>
                                </tr>
                                <tr>
                                    <td>Administrator</td>
                                    <td>123</td>
                                </tr>
                                <tr>
                                    <td>Others</td>
                                    <td>1234</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
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

                    <div class="row mt-2 mb-2">
                        <table class="table">
                            <thead>
                                <tr class="bg-secondary">
                                    <th>Jenis Support</th>
                                    <th>Total Ticket</th>
                                    <th>Total Leads</th>
                                    <th>Top Request</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Jakarta Selatan</td>
                                    <td>23</td>
                                    <td>23</td>
                                    <td>23</td>
                                </tr>
                                <tr>
                                    <td>Reviewed</td>
                                    <td>433</td>
                                    <td>433</td>
                                    <td>433</td>
                                </tr>
                                <tr>
                                    <td>Approved</td>
                                    <td>300</td>
                                    <td>300</td>
                                    <td>300</td>
                                </tr>
                                <tr>
                                    <td>Completed</td>
                                    <td>200</td>
                                    <td>200</td>
                                    <td>200</td>
                                </tr>
                                <tr>
                                    <td>Rejected</td>
                                    <td>500</td>
                                    <td>500</td>
                                    <td>500</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>