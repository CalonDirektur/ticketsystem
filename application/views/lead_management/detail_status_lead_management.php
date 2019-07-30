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
									<td><b>ID lead_management</b></td>
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
									<td><input type="number" class="form-control enable" name="lead_id" id="lead_id" value="<?= $data->lead_id ?>" readonly required></td>
								</tr>
								<tr>
									<td><b>Nama Konsumen</b></td>
									<td>
										<input type="text" class="form-control enable" name="nama_konsumen" id="nama_konsumen" value="<?= $data->nama_konsumen ?>" readonly required>
									</td>
								</tr>
								<tr>
									<td><b>KTP Konsumen</b></td>
									<td>
										<input type="text" class="form-control enable" name="ktp_konsumen" id="ktp_konsumen" value="<?= $data->ktp_konsumen ?>" readonly required>
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

								<tr>
									<td><b>Status:</b></td>
									<td>
										<?php
										if ($data->id_approval == 0) {
											echo '<label class="badge badge-warning">Belum Direview</label>';
										}
										if ($data->id_approval == 1) {
											echo '<label class="badge badge-danger">Ditolak</label>';
										}
										if ($data->id_approval == 2) {
											echo '<label class="badge badge-success">Disetujui Admin 1</label>';
										}
										if ($data->id_approval == 3) {
											echo '<label class="badge badge-primary">Selesai</label>';
										}
										if ($data->id_approval == 4) {
											echo '<label class="badge badge-success">Disetujui Admin NST</label>';
										}
										?>
									</td>
								</tr>
								<!-- Tombol ini muncul khusus untuk user -->
								<?php if ($this->session->userdata('level') == 1 && ($data->id_approval == 0 || $data->id_approval == 1)) { ?>
									<tr>
										<td>
											<button type="button" id="ubah" class="btn btn-secondary">Ubah Data</button>
										</td>
										<td></td>
									</tr>
								<?php } ?>

								<!-- Tombol Aksi ini akan muncul untuk Admin NST -->
								<?php if ($this->session->userdata('level') == 4 && $data->id_approval == 0) { ?>
									<tr>
										<td><b>Aksi:</b></td>
										<td>
											<a class="btn btn-primary" href="<?= base_url('Admin_nst/approve/lead_management/id/' . $data->id_lead) ?>">Approve</a>
											<a class="btn btn-danger" href="<?= base_url('Admin_nst/reject/lead_management/id/' . $data->id_lead) ?>">Reject</a>
										</td>
									</tr>
								<?php } ?>
							</table>
						</div>
					</div>
					<!-- Form Upload Lampiran -->
					<div class="card card-primary mt-4">
						<div class="card-header with-border">
							<h3 class="card-title">Upload File</h3>
						</div>
						<div class="card-body" id="dynamic-field">
							<div class="form-group">
								<label for="upload_file1">Upload Berkas 1</label>
								<input name="upload_file1" id="upload_file1" type="file" class="form-control enable col-10" disabled>
							</div>
							<div class="form-group">
								<label for="upload_file2">Upload Berkas 2</label>
								<input name="upload_file2" id="upload_file2" type="file" class="form-control enable col-10" disabled>
							</div>
							<div class="form-group">
								<label for="upload_file3">Upload Berkas 3</label>
								<input name="upload_file3" id="upload_file3" type="file" class="form-control enable col-10" disabled>
							</div>
							<div class="form-group">
								<label for="upload_file4">Upload Berkas 4</label>
								<input name="upload_file4" id="upload_file4" type="file" class="form-control enable col-10" disabled>
							</div>
							<div class="form-group">
								<label for="upload_file5">Upload Berkas 5</label>
								<input name="upload_file5" id="upload_file5" type="file" class="form-control enable col-10" disabled>
							</div>
						</div>
						<?php if ($this->session->userdata('level') == 1 && ($data->id_approval == 0 || $data->id_approval == 1)) { ?>
							<div class="card-footer text-center">
								<!-- Tombol ini muncul khusus untuk user -->
								<button onclick="return confirm('Harap periksa kembali\n,Apakah Anda yakin data yang diisi sudah benar?');" type="submit" id="edit_lead_management" class="btn btn-primary enable" name="edit_lead_management" disabled>Kirim Data!</button>
			</form>
	</div>
<?php } ?>
</div>
</div>
</div>

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