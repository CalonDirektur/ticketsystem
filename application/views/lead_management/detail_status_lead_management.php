<div class="container-fluid mt-4 mb-4">
	<section class="content-header text-center">
		<h4>
			Detail Lead Management Tickets
		</h4>
		<p><?= date('d F, Y'); ?></p>
	</section>

	<!-- Main content -->
	<section class="content">
		<form method="post" action="<?= base_url('ticket_register/edit') ?>" enctype="multipart/form-data">
			<div class="row">
				<div class="col-lg-2">

				</div>

				<div class="col-lg-8">
					<!-- Form Pertanyaan LEAD MANAGEMENT -->
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Data Ticket</h3>
							<div class="row p-0 m-0">
								<div class="col-6 p-0 m-0">
									<a href="#" id="id-ticket">ID Ticket: #<?= $data->id_ticket ?></a>
								</div>
								<div class="col-6 p-0 m-0">
								</div>
							</div>
							<hr class="hr">
							<div id="hide-detail-ticket" class="row p-0 m-0">
								<div class="col-6 p-0 m-0">
									<?= ($data->tanggal_dibuat != NULL ? '<p>Created on ' . $data->tanggal_dibuat . '</p>' : '') ?>
									<?= ($data->tanggal_diubah != NULL ? '<p>Terakhir diubah ' . $data->tanggal_diubah . '</p>' : '')  ?>
									<?= ($data->tanggal_disetujui != NULL ? '<p>Approved on ' . $data->tanggal_disetujui . '</p>' : '')  ?>
									<?= ($data->tanggal_diselesaikan != NULL ? '<p>Completed on ' . $data->tanggal_diselesaikan . '</p>' : '')  ?>
									<?php if ($data->id_approval == 1) {
										echo ($data->tanggal_ditolak != NULL ? '<p>Rejected on ' . $data->tanggal_ditolak . '</p>' : '');
									} ?>
								</div>
								<div class="col-6 p-0 m-0">

								</div>
							</div>
						</div>
						<div class="card-body">
							<!-- ID Ticket -->
							<div class="form-group">
								<label for="id_ticket">ID Ticket</label>
								<input type="text" class="form-control" name="id_ticket" id="id_ticket" value="<?= $data->id_ticket ?>" readonly required>
								<input type="hidden" class="form-control" name="id_lead" id="id_lead" value="<?= $data->id_lead ?>" readonly required>
							</div>
							<!-- Nama Cabang -->
							<div class="form-group">
								<label for="nama_cabang">Nama Cabang</label>
								<input type="text" class="form-control" name="nama_cabang" id="nama_cabang" value="<?= $data->cabang_user ?>" readonly required>
							</div>
							<!-- Lead ID -->
							<div class="form-group">
								<label for="lead_id">Lead ID</label>
								<input type="text" class="form-control <?= ($this->session->userdata('level') == 4 || $this->session->userdata('level') == 5) ? '' : 'enable' ?>" name="lead_id" id="lead_id" value="<?= $data->lead_id ?>" readonly required>
							</div>
							<!-- Asal Leads -->
							<div class="form-group">
								<label for="asal_leads">Asal Leads</label>
								<select required name="asal_leads" id="asal_leads" class="form-control <?= ($this->session->userdata('level') == 4 || $this->session->userdata('level') == 5) ? '' : 'enable' ?>" required disabled>
									<option disabled selected value="">- Pilih Sumber Lead -</option>
									<option value="In Branch" <?= $data->asal_leads == 'In Branch' ? 'selected' : ''  ?>>In Branch</option>
									<option value="Cross-Branch" <?= $data->asal_leads == 'Cross-Branch' ? 'selected' : ''  ?>>Cross-Branch</option>
								</select>
							</div>
							<!-- Cabang Tujuan -->
							<div class="cross-branch">
								<div class="form-group">
									<label for="cabang_tujuan">Cabang Tujuan</label>
									<select name="cabang_tujuan" id="cabang_tujuan" class="form-control <?= ($this->session->userdata('level') == 4 || $this->session->userdata('level') == 5) ? '' : 'enable' ?> cross-branch" disabled>
										<option selected value="">- Tidak Ada Cabang Tujuan -</option>
										<?php
										foreach ($cabang_tujuan->result() as $p) {
											?>
										<option value="<?= $p->id_cabang ?>" <?= $p->id_cabang == $data->id_cabang_tujuan ? 'selected' : '' ?> <?= $p->id_cabang == 46 ? 'disabled' : '' ?>><?= $p->nama_cabang ?></option>
										<?php }  ?>
									</select>
								</div>
								<!-- Surveyor -->
								<div class="form-group">
									<label for="surveyor">Surveyor</label>
									<input type="text" class="form-control <?= ($this->session->userdata('level') == 4 || $this->session->userdata('level') == 5) ? '' : 'enable' ?> cross-branch" name="surveyor" id="surveyor" value="<?= $data->surveyor ?>" readonly>
								</div>
								<!-- TTD PIC -->
								<div class="form-group">
									<label for="ttd_pic">TTD PIC</label>
									<input type="text" class="form-control <?= ($this->session->userdata('level') == 4 || $this->session->userdata('level') == 5) ? '' : 'enable' ?>" name="ttd_pic" id="ttd_pic" value="<?= $data->ttd_pic ?>" readonly>
								</div>
								<!-- Nama Konsumen -->
								<div class="form-group">
									<b>Nama Konsumen</b>
									<input type="text" class="form-control <?= ($this->session->userdata('level') == 4 || $this->session->userdata('level') == 5) ? '' : 'enable' ?> cross-branch" name="nama_konsumen" id="nama_konsumen" value="<?= $data->nama_konsumen ?>" readonly required>
								</div>
							</div>
							<!-- Sumber Lead -->
							<div class="form-group">
								<label for="sumber_lead">Sumber Lead</label>
								<select required name="sumber_lead" id="sumber_lead" class="form-control <?= ($this->session->userdata('level') == 4 || $this->session->userdata('level') == 5) ? '' : 'enable' ?>" required disabled>
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
							</div>
							<!-- Nama Pemberi Lead -->
							<div class="form-group">
								<label for="nama_pemeberi_lead">Nama Pemberi Lead</label>
								<input type="text" class="form-control <?= ($this->session->userdata('level') == 4 || $this->session->userdata('level') == 5) ? '' : 'enable' ?>" name="nama_pemberi_lead" id="nama_pemberi_lead" value="<?= $data->nama_pemberi_lead ?>" readonly required>
							</div>
							<!-- Object Price -->
							<div class="form-group">
								<label for="object_price">Object Price</label>
								<input type="number" class="form-control <?= ($this->session->userdata('level') == 4 || $this->session->userdata('level') == 5) ? '' : 'enable' ?>" name="object_price" id="object_price" value="<?= $data->object_price ?>" readonly required>
							</div>
							<!-- Produk -->
							<div class="form-group">
								<label>Produk</label>
								<select class="form-control <?= ($this->session->userdata('level') == 4 || $this->session->userdata('level') == 5) ? '' : 'enable' ?>" name="produk" id="produk" disabled>
									<option disabled selected value="">- Pilih Produk -</option>
									<option value="My Hajat" <?= $data->produk == 'My Hajat' ? 'selected' : ''  ?>> My Hajat</option>
									<option value="My Talim" <?= $data->produk == 'My Talim' ? 'selected' : ''  ?>> My Talim</option>
									<option value="My Faedah" <?= $data->produk == 'My Faedah' ? 'selected' : ''  ?>> My Faedah</option>
									<option value="My Ihram" <?= $data->produk == 'My Ihram' ? 'selected' : ''  ?>> My Ihram</option>
									<option value="My Safar" <?= $data->produk == 'My Safar' ? 'selected' : ''  ?>> My Safar</option>
									<option value="My CarS" <?= $data->produk == 'My CarS' ? 'selected' : ''  ?>> My CarS</option>
								</select>
							</div>


							<!-- Menu ini muncul khusus untuk Admin NST dan Superuser -->
							<?php if ($this->session->userdata('level') == 4 || $this->session->userdata('level') == 5) { ?>
							<!-- Input hidden karena formulir yang diisikan user diatas di-disable -->
							<input type="hidden" name="lead_id" value="<?= $data->lead_id ?>">
							<input type="hidden" name="asal_leads" value="<?= $data->asal_leads ?>">
							<input type="hidden" name="cabang_tujuan" value="<?= $data->id_cabang_tujuan ?>">
							<input type="hidden" name="sumber_lead" value="<?= $data->sumber_lead ?>">
							<input type="hidden" name="produk" value="<?= $data->produk ?>">
							<div class="text-center mb-4 mt-4">
								<b>Form di bawah diisikan oleh Admin NST</b>
							</div>
							<div class="form-group">
								<label for="tahap_reject">Tahap Reject</label>
								<select class="form-control enable" name="tahap_reject" id="tahap_reject" required>
									<option disabled selected value="">- Pilih Tahap Reject -</option>
									<option value="Pefindo Checking" <?= $data->tahap_reject == 'Pefindo Checking' ? 'selected' : ''  ?>> Pefindo Checking</option>
									<option value="Credit Scoring" <?= $data->tahap_reject == 'Credit Scoring' ? 'selected' : ''  ?>> Credit Scoring</option>
								</select>
							</div>
							<div class="form-group">
								<label for="tipe_pefindo">Tipe Pefindo</label>
								<select class="form-control enable" name="tipe_pefindo" id="tipe_pefindo" required>
									<option disabled selected value="">- Pilih Tipe Pefindo -</option>
									<option value="Collectibility" <?= $data->tipe_pefindo == 'Collectibility' ? 'selected' : ''  ?>> Collectibility</option>
									<option value="DRS>70%" <?= $data->tipe_pefindo == 'DRS>70%' ? 'selected' : ''  ?>> DRS>70%</option>
									<option value="No Pefindo" <?= $data->tipe_pefindo == 'No Pefindo' ? 'selected' : ''  ?>> No Pefindo</option>
									<option value="DSR>125%" <?= $data->tipe_pefindo == 'DSR>125%' ? 'selected' : ''  ?>> DSR>125%</option>
								</select>
							</div>
							<div class="form-group">
								<label for="max_past_due">Max Past Due</>
									<input type="number" class="form-control enable" name="max_past_due" id="max_past_due" value="<?= $data->max_past_due ?>" required>
							</div>
							<div class="form-group">
								<label for="dsr">DSR</label>
								<input type="text" class="form-control enable" name="dsr" id="dsr" value="<?= $data->dsr ?>" required>
							</div>
							<div class="form-group">
								<label for="status">Status</label>
								<select class="form-control enable" name="status" id="status">
									<option disabled selected value="">- Pilih Status -</option>
									<option value="Reject" <?= $data->status == 'Reject' ? 'selected' : ''  ?>>Reject</option>
									<option value="Approve" <?= $data->status == 'Approve' ? 'selected' : ''  ?>>Approve</option>
									<option value="Return/Hold" <?= $data->status == 'Return/Hold' ? 'selected' : ''  ?>>Return/Hold</option>
									<option value="Belum Appeal" <?= $data->status == 'Belum Appeal' ? 'selected' : ''  ?>>Belum Appeal</option>
								</select>
							</div>
							<div class="form-group">
								<label for="sla_branch">SLA Branch</label>
								<input type="text" class="form-control enable" name="sla_branch" id="sla_branch" value="<?= $data->sla_branch ?>" required>
							</div>
							<div class="form-group">
								<label for="cabang_survey">Cabang Survey</label>
								<input type="text" class="form-control enable" name="cabang_survey" id="cabang_survey" value="<?= $data->cabang_survey ?>" required>
							</div>
							<div class="form-group">
								<label for="informasi_tambahan">Informasi Tambahan</label>
								<textarea rows="5" class="form-control enable" name="informasi_tambahan" id="informasi_tambahan"><?= $data->informasi_tambahan ?></textarea>
							</div>
							<?php } ?>
						</div>
						<div class="form-group">
							<!-- Tombol ubah data muncul khusus untuk user -->
							<?php if (($this->session->userdata('level') == 1) && ($data->id_approval == 0)) { ?>
							<button type="button" id="ubah" class="btn btn-secondary">Ubah Data</button>
							<?php } ?>
							<!-- Tombol ubah data muncul khusus untuk ADMIN NST dan SUPERUSER -->
							<?php if ($this->session->userdata('level') == 5) { ?>
							<button type="button" id="ubah" class="btn btn-secondary">Ubah Data</button>
							<?php } ?>
						</div>
						<div class="card-footer text-center">
							<!-- Tombol UPDATE DATA ini akan muncul untuk Admin NST dan SUPERUSER -->
							<?php if ($this->session->userdata('level') == 4 || $this->session->userdata('level') == 5) { ?>
							<button type="submit" id="edit_lead_management" class="btn btn-info enable" name="edit_lead_management">Update Data!</button>
							<?php } ?>
							<!-- Tombol UPDATE DATA ini akan muncul khusus User -->
							<?php if (($this->session->userdata('level') == 1) && ($data->id_approval == 0)) { ?>
							<button type="submit" id="edit_lead_management_user" class="btn btn-info enable" name="edit_lead_management_user" disabled>Update Data!</button>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="col-lg-2">

				</div>
			</div>
		</form>

		<?php if ($komentar->num_rows() == 0) { ?>
		<!-- Post Komentar -->
		<div class="row mt-4">
			<div class="col-lg-2">

			</div>
			<div class="col-lg-8">
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
								<input type="hidden" name="id_ticket_komentar" value="<?= $data->id_ticket ?>">
								<input type="hidden" name="redirect" value="<?= $this->uri->uri_string() ?>">
							</div>
						</div>
						<div class="card-footer">
							<button type="submit" class="btn btn-info pull-right" name="submit_komentar">Post Komentar</button>
						</div>
					</div>
				</form>
			</div>
			<div class="col-lg-2">

			</div>
		</div>
		<?php } ?>

		<!-- Menampilkan Komentar -->
		<?php foreach ($komentar->result() as $komen) { ?>
		<div class="row mt-4">
			<div class="col-lg-2">

			</div>
			<div class="col-lg-8">

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
								<input type="hidden" name="id_ticket_reply" value="<?= $data->id_ticket ?>">
								<input name="id_komentar" type="hidden" value="<?= $data->id_lead ?>">
								<input type="hidden" name="redirect" value="<?= $this->uri->uri_string() ?>">
								<input name="post_reply" type="text" class="form-control input-sm" placeholder="Press enter to post comment">
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-2">

			</div>
		</div>
		<?php } ?>

	</section>
</div>