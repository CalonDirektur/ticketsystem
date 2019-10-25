<div class="container-fluid mt-4 mb-4">
	<section class="content-header text-center">
		<h4>
			Detail NST Tickets
		</h4>
	</section>

	<!-- Main content -->
	<section class="content">
		<form method="post" action="<?= base_url('ticket_register/edit') ?>" enctype="multipart/form-data">
			<div class="row">
				<!-- Form Pertanyaan NST -->
				<div class="col-lg-6 ">
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
										if ($data->id_approval == 0) {
											echo '<label class="badge badge-secondary">Pending</label>';
										}
										if ($data->id_approval == 1) {
											echo '<label class="badge badge-danger">Rejected</label>';
										}
										if ($data->id_approval == 2) {
											echo '<label class="badge badge-success">Disetujui</label>';
										}
										if ($data->id_approval == 3) {
											echo '<label class="badge badge-info">Completed</label>';
										}
										if ($data->id_approval == 4) {
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
									<?php if ($data->id_approval == 1) {
										echo ($data->tanggal_ditolak != NULL ? '<p>Rejected on ' . $data->tanggal_ditolak . '</p>' : '');
									} ?>
								</div>
								<div class="col-6 p-0 m-0">

								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="form-group">
								<!-- ID Ticket -->
								<label for="">ID Ticket</label>
								<input type="text" class="form-control" name="id_ticket" id="id_ticket" value="<?= $data->id_ticket ?>" readonly required>
								<input type="hidden" class="form-control" name="id_nst" id="id_nst" value="<?= $data->id_nst ?>" readonly required>
							</div>
							<div class="form-group">
								<label for="">Nama Cabang</label>
								<input type="text" class="form-control" name="nama_cabang" id="nama_cabang" value="<?= $data->nama_cabang ?>" readonly required>
							</div>
							<div class="form-group">
								<label for="">Nama Konsumen</label>
								<input type="text" class="form-control" name="nama_konsumen" id="nama_konsumen" value="<?= $data->nama_konsumen ?>" readonly required>
							</div>
							<div class="form-group">
								<label for="lead_id">Lead ID</label><br>
								<div class="input-group">
									<input id="lead_id" name="lead_id" type="text" class="form-control lead_id" placeholder="201908SLOS123456" maxlength="16" value="<?= $data->lead_id ?>" readonly required>
									<div class="input-group-append">
										<button type="button" class="btn btn-danger enable clear-lead-id" disabled>x</button>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="">Produk</label>
								<select class="form-control" name="produk" id="produk" disabled>
									<option disabled selected value="">- Pilih Produk -</option>
									<option value="My Ihram" <?= $data->produk == "My Ihram" ? "selected" : ""  ?>> My Ihram</option>
									<option value="My Hajat" <?= $data->produk == "My Hajat" ? "selected" : ""  ?>> My Hajat</option>
									<option value="My Cars" <?= $data->produk == "My Cars" ? "selected" : ""  ?>> My Cars</option>
									<option value="My Talim" <?= $data->produk == "My Talim" ? "selected" : ""  ?>> My Talim</option>
									<option value="My Faedah" <?= $data->produk == "My Faedah" ? "selected" : ""  ?>> My Faedah</option>
									<option value="My CarS" <?= $data->produk == "My CarS" ? "selected" : ""  ?>> My CarS</option>
								</select>
								<input id="nama_produk" type="hidden" name="produk" value="<?= $data->produk ?>">
							</div>

							<!-- Tombol ini muncul khusus untuk user -->
							<?php if (($this->session->userdata('level') == 1 || $this->session->userdata('level') == 6) && ($data->id_approval == 0 || $data->id_approval == 1)) { ?>
								<button type="button" id="ubah" class="btn btn-secondary">Ubah Data</button>
							<?php } ?>
						</div>
						<div class="card-footer">
							<!-- Tombol Aksi ini akan muncul untuk Admin NST -->
							<?php if (($this->session->userdata('level') == 4 || $this->session->userdata('level') == 5 || $this->session->userdata('level') == 7)) { ?>
								<a onclick="return confirm('Apakah Anda yakin MENYETUJUI request support ini?')" class="btn btn-info" href="<?= base_url('Aksi/complete/nst/id/' . $data->id_nst) ?>">Approve</a>
								<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
									Reject
								</button>
							<?php } ?>
						</div>
					</div>
				</div>
				<!-- Bagian Munculin lampiran -->
				<div class="col-lg-6">
					<!-- Form Upload Lampiran -->
					<div id="upload" class="card">
						<div class="card-header">
							<h3 class="card-title text-center">Lampiran (Attachment) <a class="btn btn-info float-right" href="<?= base_url('zip/createzip/tb_nst/id_nst/nst/' . $data->id_nst) ?>">Download All</a></h3>
						</div>
						<div class="card-body p-0" id="dynamic-field">
							<table class="table text-center" width="100%">
								<thead>
									<th width="50%">File Terlampir</th>
									<th>Ubah/tambah file lampiran</th>
								</thead>
								<tbody>
									<tr>
										<td>
											<?php if ($data->upload_file1 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/nst/' . $data->upload_file1) ?>"><?= $data->upload_file1 ?></a><?php } ?>
										</td>
										<td>
											<div class="form-group">
												<input type="file" name="upload_file1" class="file-upload-default">
												<div class="input-group col-xs-12">
													<input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
													<span class="input-group-append">
														<button class="file-upload-browse btn btn-info enable" disabled type="button">Upload</button>
													</span>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<?php if ($data->upload_file2 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/nst/' . $data->upload_file2) ?>"><?= $data->upload_file2 ?></a><?php } ?>
										</td>
										<td>
											<div class="form-group">
												<input type="file" name="upload_file2" class="file-upload-default">
												<div class="input-group col-xs-12">
													<input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
													<span class="input-group-append">
														<button class="file-upload-browse btn btn-info enable" disabled type="button">Upload</button>
													</span>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<?php if ($data->upload_file3 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/nst/' . $data->upload_file3) ?>"><?= $data->upload_file3 ?></a><?php } ?>
										</td>
										<td>
											<div class="form-group">
												<input type="file" name="upload_file3" class="file-upload-default">
												<div class="input-group col-xs-12">
													<input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
													<span class="input-group-append">
														<button class="file-upload-browse btn btn-info enable" disabled type="button">Upload</button>
													</span>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<?php if ($data->upload_file4 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/nst/' . $data->upload_file4) ?>"><?= $data->upload_file4 ?></a><?php } ?>
										</td>
										<td>
											<div class="form-group">
												<input type="file" name="upload_file4" class="file-upload-default">
												<div class="input-group col-xs-12">
													<input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
													<span class="input-group-append">
														<button class="file-upload-browse btn btn-info enable" disabled type="button">Upload</button>
													</span>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<?php if ($data->upload_file5 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/nst/' . $data->upload_file5) ?>"><?= $data->upload_file5 ?></a><?php } ?>
										</td>
										<td>
											<div class="form-group">
												<input type="file" name="upload_file5" class="file-upload-default">
												<div class="input-group col-xs-12">
													<input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
													<span class="input-group-append">
														<button class="file-upload-browse btn btn-info enable" disabled type="button">Upload</button>
													</span>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<?php if ($data->upload_file6 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/nst/' . $data->upload_file6) ?>"><?= $data->upload_file6 ?></a><?php } ?>
										</td>
										<td>
											<div class="form-group">
												<input type="file" name="upload_file6" class="file-upload-default">
												<div class="input-group col-xs-12">
													<input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
													<span class="input-group-append">
														<button class="file-upload-browse btn btn-info enable" disabled type="button">Upload</button>
													</span>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<?php if ($data->upload_file7 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/nst/' . $data->upload_file7) ?>"><?= $data->upload_file7 ?></a><?php } ?>
										</td>
										<td>
											<div class="form-group">
												<input type="file" name="upload_file7" class="file-upload-default">
												<div class="input-group col-xs-12">
													<input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
													<span class="input-group-append">
														<button class="file-upload-browse btn btn-info enable" disabled type="button">Upload</button>
													</span>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<?php if ($data->upload_file8 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/nst/' . $data->upload_file8) ?>"><?= $data->upload_file8 ?></a><?php } ?>
										</td>
										<td>
											<div class="form-group">
												<input type="file" name="upload_file8" class="file-upload-default">
												<div class="input-group col-xs-12">
													<input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
													<span class="input-group-append">
														<button class="file-upload-browse btn btn-info enable" disabled type="button">Upload</button>
													</span>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<?php if ($data->upload_file9 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/nst/' . $data->upload_file9) ?>"><?= $data->upload_file9 ?></a><?php } ?>
										</td>
										<td>
											<div class="form-group">
												<input type="file" name="upload_file9" class="file-upload-default">
												<div class="input-group col-xs-12">
													<input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
													<span class="input-group-append">
														<button class="file-upload-browse btn btn-info enable" disabled type="button">Upload</button>
													</span>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<?php if ($data->upload_file10 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/nst/' . $data->upload_file10) ?>"><?= $data->upload_file10 ?></a><?php } ?>
										</td>
										<td>
											<div class="form-group">
												<input type="file" name="upload_file10" class="file-upload-default">
												<div class="input-group col-xs-12">
													<input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
													<span class="input-group-append">
														<button class="file-upload-browse btn btn-info enable" disabled type="button">Upload</button>
													</span>
												</div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<?php if (($this->session->userdata('level') == 1 || $this->session->userdata('level') == 6) && ($data->id_approval == 0 || $data->id_approval == 1 || $data->id_approval == 2)) { ?>
							<div class="card-footer text-center">
								<!-- Tombol ini muncul khusus untuk user -->
								<!-- <button type="button" id="ubah" class="btn btn-secondary">Ubah Data</button> -->
								<button type="submit" id="edit_nst" class="btn btn-info enable" name="edit_nst" disabled>Update Data!</button>
							</div>
						<?php } ?>
						<?php if ($this->session->userdata('level') == 5) { ?>
							<div class="card-footer text-center">
								<!-- Tombol ini muncul khusus untuk SUPERUSER -->
								<button type="submit" id="edit_nst_superuser" class="btn btn-info enable" name="edit_nst_superuser" disabled>Update Data!</button>
							</div>
						<?php } ?>
					</div>
				</div>

			</div>
		</form>
		<?php if ($komentar->num_rows() == 0) { ?>
			<!-- Post Komentar -->
			<div class="row mt-4">
				<div class="col-lg-12 col-md-12">
					<form method="post" action="<?= base_url('comment/post_comment/id_nst') ?>">
						<div class="card">
							<div class="card-header with-border">
								<label for="">Post Komentar</label>
							</div>
							<div class="card-body">
								<div class="form-group">
									<textarea class="form-control" name="post_comment" id="post_comment" cols="10" rows="2" placeholder="Masukkan Komentar Anda" required></textarea>
									<input type="hidden" name="id_komentar" value="<?= $data->id_nst ?>">
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
			</div>
		<?php } ?>

		<!-- Menampilkan Komentar -->
		<?php foreach ($komentar->result() as $komen) { ?>
			<div class="row mt-4">
				<div class="col-lg-12 col-md-12">

					<div class="card card-widget">
						<div class="card-header with-border">
							<div class="user-block"> <label for=""><span class="username"><?= $komen->name ?> (<?= $komen->nama_cabang ?>)</span></label><br>
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
											<label for=""><?= $balasan->name ?> (<?= $balasan->nama_cabang ?>)</label><br>
											<p class="text-muted pull-right"><?= $balasan->date ?></p>
										</span>
										<?= $balasan->comment ?>
									</div>
								</div>
								<hr>
							<?php } ?>
						</div>
						<div class="card-footer">
							<form action="<?= base_url('comment/post_reply/id_nst'); ?>" method="post">
								<div class="img-push">
									<input name="parent_comment" type="hidden" value="<?= $komen->id ?>">
									<input type="hidden" name="id_user" value="<?= $this->fungsi->user_login()->id_user ?>">
									<input type="hidden" name="id_ticket_reply" value="<?= $data->id_ticket ?>">
									<input name="id_komentar" type="hidden" value="<?= $data->id_nst ?>">
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
	<!-- Modal -->
	<form method="post" action="<?= base_url('Aksi/reject/nst/id') ?>">
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Alasan Reject</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<input type="hidden" class="form-control" name="id_nst_reject" id="id_nst_reject" value="<?= $data->id_nst ?>" readonly required>
							<label for="">Alasan Reject</label>
							<select class="form-control" name="alasan_reject" id="alasan_reject">
								<option disabled selected value="">- Pilih Alasan Reject -</option>
								<option value="Administration">Administration</option>
								<option value="Capacity">Capacity</option>
								<option value="Pefindo">Pefindo</option>
								<option value="Others">Others</option>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
						<button type="submit" onclick="return confirm('Apakah Anda yakin MENOLAK request support ini?')" class="btn btn-danger">Reject</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>

<!-- Button trigger modal -->