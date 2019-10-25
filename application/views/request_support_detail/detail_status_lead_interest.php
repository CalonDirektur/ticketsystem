<div class="container-fluid mt-4 mb-4">
	<section class="content-header text-center">
		<h4>
			Detail Lead Interest
		</h4>
		<p><?= date('d F, Y'); ?></p>
	</section>

	<!-- Main content -->
	<section class="content">
		<form method="post" action="<?= base_url('ticket_register/edit') ?>" enctype="multipart/form-data" autocomplete="off">
			<div class="row">
				<div class="col-lg-2">

				</div>
				<div class="col-lg-8">
					<!-- Form Pertanyaan LEAD MANAGEMENT -->
					<div class="card">
						<div class="card-header">
							<h3 class="card-title pull-left">Data Ticket</h3>
							<?php
							if ($data->id_approval == 0) {
								echo '<label class="badge badge-secondary pull-right">Pending</label>';
							}
							if ($data->id_approval == 1) {
								echo '<label class="badge badge-danger pull-right">Rejected</label>';
							}
							if ($data->id_approval == 2) {
								echo '<label class="badge badge-success pull-right">Reviewed</label>';
							}
							if ($data->id_approval == 3) {
								echo '<label class="badge badge-info pull-right">Completed</label>';
							}
							if ($data->id_approval == 4) {
								echo '<label class="badge badge-warning pull-right">In Process</label>';
							}
							?>
						</div>
						<div class="card-body">
							<input type="hidden" name="redirect" value="<?= $this->uri->uri_string() ?>">
							<!-- ID Lead Interest -->
							<input type="hidden" class="form-control" name="id_lead_interest" id="id_lead_interest" value="<?= $data->id_lead_interest ?>" readonly required>

							<!-- Source -->
							<!-- <div class="form-group">
								<label for="source">Source</label>
								<input class="form-control" type="text" name="source" id="source" value="<?= $data->source ?>" placeholder="http://www.natieva.com/" required>
							</div> -->

							<!-- Nama -->
							<div class="form-group">
								<label for="nama">Nama</label>
								<input class="form-control enable" type="text" name="nama" id="nama" value="<?= $data->nama ?>" placeholder="Okky Aditya Wibowo" required readonly>
							</div>

							<!-- email -->
							<div class="form-group">
								<label for="email">E-mail</label>
								<input class="form-control enable" type="email" name="email" id="email" value="<?= $data->email ?>" placeholder="its.okkay@gmail.com" required readonly>
							</div>

							<!-- telepon -->
							<div class="form-group">
								<label for="telepon">Telepon</label>
								<input class="form-control enable" type="number" name="telepon" id="telepon" value="<?= $data->telepon ?>" placeholder="08xxxxxxxxxx" required readonly>
							</div>

							<!-- kota -->
							<!-- <div class="form-group">
								<label for="kota">Kota</label>
								<input class="form-control" type="text" name="kota" id="kota" value="<?= $data->kota ?>" placeholder="Tangerang" required>
							</div> -->

							<!-- Sumber Lead -->
							<div class="form-group">
								<label for="sumber_lead">Sumber Lead</label>
								<select required name="sumber_lead" id="sumber_lead" class="form-control <?= ($this->session->userdata('level') == 4) ? '' : 'enable' ?>" disabled>
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
								<!-- <input type="hidden" name="sumber_lead" value="<?= $data->sumber_lead ?>"> -->
							</div>
							<!-- produk -->
							<!-- <div class="form-group">
								<label for="produk">Produk </label>
								<select class="form-control" name="produk" id="produk" required>
									<optgroup label="Umroh">
										<option value="Paket A" <?= $data->produk == 'Paket A' ? 'selected' : '' ?>>Paket A</option>
										<option value="Paket B" <?= $data->produk == 'Paket B' ? 'selected' : '' ?>>Paket B</option>
										<option value="Paket C" <?= $data->produk == 'Paket C' ? 'selected' : '' ?>>Paket C</option>
									</optgroup>
									<optgroup label="Lainnya">
										<option <?= $data->produk == 'Pendidikan/Renovasi/Lainnya' ? 'selected' : '' ?> value="Pendidikan/Renovasi/Lainnya">Pendidikan/Renovasi/Lainnya</option>
										<option <?= $data->produk == 'Nilai Pembiayaan' ? 'selected' : '' ?> value="Nilai Pembiayaan">Nilai Pembiayaan</option>
										<option <?= $data->produk == 'Nama Instansi' ? 'selected' : '' ?> value="Nama Instansi">Nama Instansi</option>
										<option <?= $data->produk == 'Telepon Instansi' ? 'selected' : '' ?> value="Telepon Instansi">Telepon Instansi</option>
									</optgroup>
								</select>
							</div> -->
							<!-- Catatan -->
							<div class="form-group">
								<label for="catatan">Catatan</label>
								<textarea class="form-control enable" name="catatan" id="catatan" cols="30" rows="10" readonly><?= $data->catatan ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<!-- Tombol ubah data muncul khusus untuk user -->
							<?php if (($this->session->userdata('level') == 1 || $this->session->userdata('level') == 6)) { ?>
								<button type="button" id="ubah" class="btn btn-secondary ml-4">Ubah Data</button>
							<?php } ?>
							<!-- Tombol ubah data muncul khusus untuk ADMIN NST dan SUPERUSER -->
							<?php if ($this->session->userdata('level') == 5) { ?>
								<button type="button" id="ubah" class="btn btn-secondary ml-4">Ubah Data</button>
							<?php } ?>
						</div>
						<div class="card-footer">
							<!-- Tombol UPDATE DATA ini akan muncul untuk Admin NST dan SUPERUSER -->
							<?php if ($this->session->userdata('level') == 2 || $this->session->userdata('level') == 3 || $this->session->userdata('level') == 5 || $this->session->userdata('level') == 6) { ?>
								<a class="btn btn-info" onclick="return confirm('Apakah Anda yakin MENYETUJUI request support ini?')" href="<?= base_url('Aksi/approve/lead_interest/id/' . $data->id_lead_interest) ?>">Approve</a>
								<a class="btn btn-danger" onclick="return confirm('Apakah Anda yakin MENOLAK request support ini?')" href="<?= base_url('Aksi/reject/lead_interest/id/' . $data->id_lead_interest) ?>">Reject</a>
							<?php } ?>

							<button type="submit" id="edit_lead_interest" class="btn btn-info enable pull-right" name="edit_lead_interest" disabled>Update Data!</button>
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
					<form method="post" action="<?= base_url('comment/post_comment/id_lead_interest') ?>">
						<div class="card">
							<div class="card-header with-border">
								<b>Post Komentar</b>
							</div>
							<div class="card-body">
								<div class="form-group">
									<textarea class="form-control" name="post_comment" id="post_comment" cols="10" rows="2" placeholder="Masukkan Komentar Anda" required></textarea>
									<input type="hidden" name="id_komentar" value="<?= $data->id_lead_interest ?>">
									<input type="hidden" name="id_user" value="<?= $this->fungsi->user_login()->id_user ?>">
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
									<input name="id_komentar" type="hidden" value="<?= $data->id_lead_interest ?>">
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