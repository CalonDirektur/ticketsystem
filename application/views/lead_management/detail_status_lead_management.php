<div class="container-fluid">
	<section class="content-header">
		<h1>
			Detail Lead Management Tickets
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<form method="post" action="<?= base_url('ticket_register/edit') ?>" enctype="multipart/form-data">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<!-- Form Pertanyaan LEAD MANAGEMENT -->
					<div class="card">
						<div class="card-header text-center">
							<h3 class="card-title">Data Ticket</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body no-padding">
							<table class="table">
								<thead>
									<th>Kolom</th>
									<th>Isi</th>
								</thead>
								<tr>
									<td><b>ID Lead Management</b></td>
									<td><input type="text" class="form-control" name="id_lead" id="id_lead" value="<?= $data->id_lead ?>" readonly required></td>
								</tr>
								<tr>
									<td><b>Nama Cabang</b></td>
									<td>
										<input type="text" class="form-control" name="nama_cabang" id="nama_cabang" value="<?= $data->nama_cabang ?>" readonly required>
									</td>
								</tr>
								<tr>
									<td><b>Lead ID</b></td>
									<td><input type="text" class="form-control enable" name="lead_id" id="lead_id" value="<?= $data->lead_id ?>" readonly required></td>
								</tr>
								<tr>
									<td><b>Asal Leads</b></td>
									<td>
										<select required name="asal_leads" id="asal_leads" class="form-control enable" required disabled>
											<option disabled selected value="">- Pilih Sumber Lead -</option>
											<option value="In Branch" <?= $data->asal_leads == 'In Branch' ? 'selected' : ''  ?>>In Branch</option>
											<option value="Cross-Branch" <?= $data->asal_leads == 'Cross-Branch' ? 'selected' : ''  ?>>Cross-Branch</option>
										</select>
									</td>
								</tr>
								<tr>
									<td><b>Cabang Tujuan</b></td>
									<td>
										<input type="text" class="form-control enable" name="cabang_tujuan" id="cabang_tujuan" value="<?= $data->cabang_tujuan ?>" readonly required>
									</td>
								</tr>
								<tr>
									<td><b>Nama Konsumen</b></td>
									<td>
										<input type="text" class="form-control enable" name="nama_konsumen" id="nama_konsumen" value="<?= $data->nama_konsumen ?>" readonly required>
									</td>
								</tr>
								<tr>
									<td><b>Sumber Lead</b></td>
									<td>
										<select required name="sumber_lead" id="sumber_lead" class="form-control enable" required disabled>
											<option disabled selected value="">- Pilih Sumber Lead -</option>
											<option value="Direct Selling" <?= $data->sumber_lead == 'Direct Selling' ? 'selected' : ''  ?>>Direct Selling</option>
											<option value="Tour & Travel / Penyedia Jasa" <?= $data->sumber_lead == 'Tour & Travel / Penyedia Jasa' ? 'selected' : ''  ?>>Tour & Travel / Penyedia Jasa</option>
											<option value="Agent" <?= $data->sumber_lead == 'Agent' ? 'selected' : ''  ?>>Agent</option>
											<option value="EGC" <?= $data->sumber_lead == 'EGC' ? 'selected' : ''  ?>>EGC</option>
											<option value="CGC" <?= $data->sumber_lead == 'CGC' ? 'selected' : ''  ?>>CGC</option>
											<option value="Digital Marketing" <?= $data->sumber_lead == 'Digital Marketing' ? 'selected' : ''  ?>>Digital Marketing</option>
											<option value="Digital Partner" <?= $data->sumber_lead == 'Digital Partner' ? 'selected' : ''  ?>>Digital Partner</option>
											<option value="Website BFI Syariah" <?= $data->sumber_lead == 'Website BFI Syariah' ? 'selected' : ''  ?>>Website BFI Syariah</option>
											<option value="Walk-in" <?= $data->sumber_lead == 'Walk-in' ? 'selected' : ''  ?>>Walk-in</option>
											<option value="RO" <?= $data->sumber_lead == 'RO' ? 'selected' : ''  ?>>RO</option>
										</select>
									</td>
								</tr>
								<tr>
									<td><b>Nama Pemberi Lead</b></td>
									<td>
										<input type="text" class="form-control enable" name="nama_pemberi_lead" id="nama_pemberi_lead" value="<?= $data->nama_pemberi_lead ?>" readonly required>
									</td>
								</tr>
								<tr>
									<td><b>Object Price</b></td>
									<td>
										<input type="number" class="form-control enable" name="object_price" id="object_price" value="<?= $data->object_price ?>" readonly required>
									</td>
								</tr>
								<tr>
									<td><b>Produk</b></td>
									<td>
										<select class="form-control enable" name="produk" id="produk" disabled>
											<option value="My Ihram" <?= $data->produk == 'My Ihram' ? 'selected' : ''  ?>> My Ihram</option>
											<option value="My Hajat" <?= $data->produk == 'My Hajat' ? 'selected' : ''  ?>> My Hajat</option>
											<option value="My Cars" <?= $data->produk == 'My Cars' ? 'selected' : ''  ?>> My Cars</option>
											<option value="My Talim" <?= $data->produk == 'My Talim' ? 'selected' : ''  ?>> My Talim</option>
											<option value="My Faedah" <?= $data->produk == 'My Faedah' ? 'selected' : ''  ?>> My Faedah</option>
											<option value="My CarS" <?= $data->produk == 'My CarS' ? 'selected' : ''  ?>> My CarS</option>
										</select>
									</td>
								</tr>
								<!-- Menu ini muncul khusus untuk Admin NST -->
								<?php if ($this->session->userdata('level') == 4) { ?>
									<tr>
										<td><b>Tahap Reject</b></td>
										<td>
											<select class="form-control enable" name="tahap_reject" id="tahap_reject" disabled>
												<option disabled selected value="">- Pilih Tahap Reject -</option>
												<option value="Pefindo Checking" <?= $data->tahap_reject == 'Pefindo Checking' ? 'selected' : ''  ?>> Pefindo Checking</option>
												<option value="Credit Scoring" <?= $data->tahap_reject == 'Credit Scoring' ? 'selected' : ''  ?>> Credit Scoring</option>
											</select>
										</td>
									</tr>
									<tr>
										<td><b>Tipe Pefindo</b></td>
										<td>
											<select class="form-control enable" name="tipe_pefindo" id="tipe_pefindo" disabled>
												<option disabled selected value="">- Pilih Tipe Pefindo -</option>
												<option value="Collectibility" <?= $data->tipe_pefindo == 'Collectibility' ? 'selected' : ''  ?>> Collectibility</option>
												<option value="DRS>70%" <?= $data->tipe_pefindo == 'DRS>70%' ? 'selected' : ''  ?>> DRS>70%</option>
												<option value="No Pefindo" <?= $data->tipe_pefindo == 'No Pefindo' ? 'selected' : ''  ?>> No Pefindo</option>
												<option value="DSR>125%" <?= $data->tipe_pefindo == 'DSR>125%' ? 'selected' : ''  ?>> DSR>125%</option>
											</select>
										</td>
									</tr>
									<tr>
										<td><b>Max Past Due</b></td>
										<td>
											<input type="number" class="form-control enable" name="max_past_due" id="max_past_due" value="<?= $data->max_past_due ?>" readonly required>
										</td>
									</tr>
									<tr>
										<td><b>DSR</b></td>
										<td>
											<input type="text" class="form-control enable" name="dsr" id="dsr" value="<?= $data->dsr ?>" readonly required>
										</td>
									</tr>
									<tr>
										<td><b>Status</b></td>
										<td>
											<select class="form-control enable" name="status" id="status" disabled>
												<option disabled selected value="">- Pilih Status -</option>
												<option value="Reject" <?= $data->status == 'Reject' ? 'selected' : ''  ?>>Reject</option>
												<option value="Approve" <?= $data->status == 'Approve' ? 'selected' : ''  ?>>Approve</option>
												<option value="Return/Hold" <?= $data->status == 'Return/Hold' ? 'selected' : ''  ?>>Return/Hold</option>
												<option value="Belum Appeal" <?= $data->status == 'Belum Appeal' ? 'selected' : ''  ?>>Belum Appeal</option>
											</select>
										</td>
									</tr>
									<tr>
									<tr>
										<td><b>SLA Branch</b></td>
										<td>
											<input type="text" class="form-control enable" name="sla_branch" id="sla_branch" value="<?= $data->sla_branch ?>" readonly required>
										</td>
									</tr>
									<tr>
										<td><b>Cabang Survey</b></td>
										<td>
											<input type="text" class="form-control enable" name="cabang_survey" id="cabang_survey" value="<?= $data->cabang_survey ?>" readonly required>
										</td>
									</tr>
									<tr>
										<td><b>Informasi Tambahan</b></td>
										<td>
											<textarea rows="5" class="form-control enable" name="informasi_tambahan" id="informasi_tambahan" readonly><?= $data->informasi_tambahan ?></textarea>
										</td>
									</tr>
									<tr>
									<?php } ?>
									<td><b>Status:</b></td>
									<td>
										<?php
										if ($data->id_approval == 0) {
											echo '<label class="badge badge-secondary">Pending</label>';
										}
										if ($data->id_approval == 1) {
											echo '<label class="badge badge-danger">Ditolak</label>';
										}
										if ($data->id_approval == 2) {
											echo '<label class="badge badge-success">Disetujui Admin NST</label>';
										}
										if ($data->id_approval == 3) {
											echo '<label class="badge badge-primary">Selesai</label>';
										}
										?>
									</td>
								</tr>
								<!-- Tombol ini muncul khusus untuk user -->
								<?php if (($this->session->userdata('level') == 1 || $this->session->userdata('level') == 4 || $this->session->userdata('level') == 5) && ($data->id_approval == 0 || $data->id_approval == 1)) { ?>
									<tr>
										<td>
											<button type="button" id="ubah" class="btn btn-secondary">Ubah Data</button>
										</td>
										<td></td>
									</tr>
								<?php } ?>

								<!-- Tombol Aksi ini akan muncul untuk Admin NST -->
								<?php if (($this->session->userdata('level') == 1 || $this->session->userdata('level') == 4) && ($data->id_approval == 0 || $data->id_approval == 2)) { ?>
									<tr>
										<td><b>Aksi:</b></td>
										<td>
											<button onclick="return confirm('Harap periksa kembali\n,Apakah Anda yakin data yang diisi sudah benar?');" type="submit" id="edit_lead_management" class="btn btn-primary enable" name="edit_lead_management" disabled>Kirim Data!</button>
										</td>
									</tr>
								<?php } ?>
							</table>
						</div>
						<?php if ($this->session->userdata('level') == 4) { ?>
							<div class="card-footer">
								<!-- Tombol ini muncul khusus untuk user -->
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</form>

		<!-- Post Komentar -->
		<div class="row mt-4">
			<div class="col-lg-12 col-md-12">
				<form method="post" action="<?= base_url('comment/post_comment/id_lead') ?>">
					<div class="card">
						<div class="card-header with-border">
							<b>Post Komentar</b>
						</div>
						<div class="card-body">
							<div class="form-group">
								<textarea class="form-control" name="post_comment" id="post_comment" cols="10" rows="2" placeholder="Masukkan Komentar Anda" required></textarea>
								<input type="hidden" name="id_komentar" value="<?= $data->id_lead ?>">
								<input type="hidden" name="id_user" value="<?= $this->fungsi->user_login()->id_user ?>">
								<input type="hidden" name="redirect" value="<?= $this->uri->uri_string() ?>">
							</div>
						</div>
						<div class="card-footer">
							<button type="submit" class="btn btn-primary pull-right" name="submit_komentar">Kirim</button>
						</div>
					</div>
				</form>
			</div>
		</div>

		<!-- Menampilkan Komentar -->
		<?php foreach ($komentar as $komen) { ?>
			<div class="row mt-4">
				<div class="col-lg-12 col-md-12">

					<div class="card card-widget">
						<div class="card-header with-border">
							<div class="user-block"> <b><span class="username"><?= $komen->name ?> (<?= $komen->nama_cabang ?>)</span></b><br>
								<span class="description">Diposting: <?= $komen->date ?></span>
							</div>
						</div>
						<div class="card-body">
							<p><?= $komen->comment ?></p>
						</div>

						<!-- Reply card Comment -->
						<div class="card-footer card-comments">
							<?php
							$this->db->select('*, DATE_FORMAT(date, "%d %M %Y %H:%i:%s") AS date');
							$this->db->from('tb_comment, user, tb_cabang');
							$this->db->where('parent_comment_id = ' . $komen->id . ' AND
                              user.id_user = tb_comment.id_user AND
                              user.id_cabang = tb_cabang.id_cabang');
							$reply = $this->db->get();
							?>
							<?php foreach ($reply->result() as $balasan) { ?>
								<div class="card-comment">
									<div class="comment-text">
										<span class="username">
											<b><?= $balasan->name ?> (<?= $balasan->nama_cabang ?>)</b><br>
											<p class="text-muted pull-right"><?= $komen->date ?></p>
										</span>
										<?= $balasan->comment ?>
									</div>
								</div>
								<hr>
							<?php } ?>
						</div>
						<div class="card-footer">
							<form action="<?= base_url('comment/post_reply/id_lead'); ?>" method="post">
								<div class="img-push">
									<input name="parent_comment" type="hidden" value="<?= $komen->id ?>">
									<input type="hidden" name="id_user" value="<?= $this->fungsi->user_login()->id_user ?>">
									<input name="id_komentar" type="hidden" value="<?= $data->id_lead ?>">
									<input type="hidden" name="redirect" value="<?= $this->uri->uri_string() ?>">
									<input name="post_reply" type="text" class="form-control input-sm" placeholder="Press enter to post comment">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

	</section>
</div>