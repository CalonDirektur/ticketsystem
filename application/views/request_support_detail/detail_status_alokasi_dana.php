<div class="container-fluid mt-4 mb-4">
	<section class="content-header text-center">
		<h4>
			Detail Alokasi Dana
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
							<h3 class="card-title">Data Ticket</h3>
							<div class="row p-0 m-0">
								<div class="col-6 p-0 m-0">
									<a href="#" id="id-ticket">ID Ticket: #<?= $data->id_ticket ?></a>
								</div>
								<div class="col-6 p-0 m-0">
									<div id="status-ticket" class="pull-right">
										<?php
										if ($data->status == 0) {
											echo '<label class="badge badge-secondary">Pending</label>';
										}
										if ($data->status == 1) {
											echo '<label class="badge badge-danger">Rejected</label>';
										}
										if ($data->status == 2) {
											echo '<label class="badge badge-success">Reviewed</label>';
										}
										if ($data->status == 3) {
											echo '<label class="badge badge-info">Completed</label>';
										}
										if ($data->status == 4) {
											echo '<label class="badge badge-warning">In Process</label>';
										}
										?>
									</div>
								</div>
							</div>
							<hr class="hr">
							<div id="hide-detail-ticket" class="row p-0 m-0">
								<div class="col-6 p-0 m-0">
									<?= ($data->tanggal_dibuat != NULL ? '<p>Created on ' . $data->tanggal_dibuat . '</p>' : '') ?>
									<?= ($data->tanggal_diubah != NULL ? '<p>Terakhir diubah ' . $data->tanggal_diubah . '</p>' : '')  ?>
									<?= ($data->tanggal_disetujui != NULL ? '<p>Approved on ' . $data->tanggal_disetujui . '</p>' : '')  ?>
									<?= ($data->tanggal_diselesaikan != NULL ? '<p>Completed on ' . $data->tanggal_diselesaikan . '</p>' : '')  ?>
									<?php if ($data->status == 1) {
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
								<label for="">ID Ticket</label>
								<input type="text" class="form-control" name="id_ticket" id="id_ticket" value="<?= $data->id_ticket ?>" readonly required>
								<input type="hidden" class="form-control" name="id_alokasi_dana" id="id_alokasi_dana" value="<?= $data->id_alokasi_dana ?>" readonly required>
							</div>

							<!-- Nama Cabang -->
							<div class="form-group">
								<label for="">Cabang</label>
								<input class="form-control" type="text" value="<?= $data->nama_cabang ?>" disabled value>
							</div>

							<!-- Nama -->
							<div class="form-group">
								<label for="nama_konsumen">Nama Konsumen</label>
								<input class="form-control enable" type="text" name="nama_konsumen" id="nama_konsumen" placeholder="Okky Aditya Wibowo" value="<?= $data->nama_konsumen ?>" readonly required>
							</div>

							<!-- Nomor Kontrak -->
							<div class="form-group">
								<label for="nama">Nomor Kontrak</label>
								<input class="form-control enable" type="number" name="nomor_kontrak" id="nomor_kontrak" placeholder="123456" value="<?= $data->nomor_kontrak ?>" readonly required>
							</div>

							<!-- Angsuran -->
							<div class="form-group">
								<label for="nama">Angsuran</label>
								<input class="form-control enable" type="text" name="angsuran" id="angsuran" placeholder="Angsuran" value="<?= $data->angsuran ?>" readonly required>
							</div>

							<!-- Dana yang ditransfer -->
							<div class="form-group">
								<label for="biaya_pertahun">Dana yang ditransfer</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text bg-success text-white">Rp.</span>
									</div>
									<input name="dana" id="dana" type="number" class="form-control enable" placeholder="Dana yang ditransfer" value="<?= $data->dana ?>" readonly required>
								</div>
							</div>

							<!-- Bank Tujuan -->
							<div class="form-group">
								<label for="nama">Bank Tujuan</label>
								<input class="form-control enable" type="text" name="bank_tujuan" id="bank_tujuan" placeholder="Mandiri / BCA / BRI / BNI" value="<?= $data->bank_tujuan ?>" readonly required>
							</div>

							<!-- Catatan -->
							<div class="form-group">
								<label for="catatan">Catatan</label>
								<textarea class="form-control enable" name="catatan" id="catatan" cols="30" rows="10" readonly><?= $data->catatan ?></textarea>
							</div>

							<!-- Lampiran -->
							<div class="form-group">
								<label>Lampiran</label>
								<!-- Show Picture -->
								<a target="_blank" href="<?= base_url('uploads/alokasi_dana/' . $data->lampiran) ?>"><img class="img-fluid img-thumbnail" src="<?= base_url('uploads/alokasi_dana/' . $data->lampiran) ?>" alt=""></a>
								<!-- Upload Button -->
								<input type="file" name="lampiran" class="file-upload-default">
								<div class="input-group col-xs-12">
									<input type="text" class="form-control file-upload-info" required disabled placeholder="Upload Lampiran">
									<span class="input-group-append">
										<button class="file-upload-browse btn btn-info enable" type="button" disabled>Upload</button>
									</span>
								</div>
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
							<?php if ($this->session->userdata('level') == 2 || $this->session->userdata('level') == 3 || $this->session->userdata('level') == 5) { ?>
								<a class="btn btn-info" onclick="return confirm('Apakah Anda yakin MENYETUJUI request support ini?')" href="<?= base_url('Aksi/approve/' . $data->id_ticket) ?>">Approve</a>
								<a class="btn btn-danger" onclick="return confirm('Apakah Anda yakin MENOLAK request support ini?')" href="<?= base_url('Aksi/reject/' . $data->id_ticket) ?>">Reject</a>
							<?php } ?>

							<button type="submit" id="edit_alokasi_dana" class="btn btn-info enable pull-right" name="edit_alokasi_dana" disabled>Update Data!</button>
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
					<form method="post" action="<?= base_url('comment/post_comment/id_alokasi_dana') ?>">
						<div class="card">
							<div class="card-header with-border">
								<b>Post Komentar</b>
							</div>
							<div class="card-body">
								<div class="form-group">
									<textarea class="form-control" name="post_comment" id="post_comment" cols="10" rows="2" placeholder="Masukkan Komentar Anda" required></textarea>
									<input type="hidden" name="id_komentar" value="<?= $data->id_alokasi_dana ?>">
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
									<input name="id_komentar" type="hidden" value="<?= $data->id_alokasi_dana ?>">
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