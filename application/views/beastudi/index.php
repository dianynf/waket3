<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="d-sm-flex align-items-center justify-content-between mb-4">
					<h3 class="h3 mb-0 text-gray-800"><?= $title; ?></h3>
					<a href="#" class="d-none d-sm-inline-block btn btn-primary shadow-sm" data-toggle="modal" data-target="#newRoleModal">Tambah</a>
				</div>
				<div class="row mt-3">
					<div class="col-md-12">
						<?= form_error('beastudi', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
						<?= $this->session->flashdata('message'); ?>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Pic</th>
								<th scope="col">Nama</th>
								<th scope="col">Semester</th>
								<th scope="col">Angkatan</th>
								<th scope="col">Program Studi</th>
								<th scope="col">Status</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							<?php foreach ($beastudi as $bs) : ?>
								<tr>
									<th scope="row"><?= $i++; ?></th>
									<td><?= $bs['nama']; ?></td>
									<td><?= $bs['nama_mh']; ?></td>
									<td>
										<?php foreach ($semester as $s) { ?>
										<?php if ($s->id == $bs['semester_id']) {
												echo $s->semester;
											}
										} ?>
									</td>
									<td><?= $bs['angkatan']; ?></td>
									<td>
										<?php foreach ($programstudi as $k) { ?>
										<?php if ($k->id == $bs['programstudi_id']) {
												echo $k->programstudi;
											}
										} ?>
									</td>
									<td><?= $bs['status']; ?></td>
									<td>
										<a href="<?= base_url(); ?>beastudi/detail/<?= $bs['id']; ?>" class="btn btn-info btn-circle btn-sm">
											<i class="fas fa-info-circle"></i>
										</a>
										<a href="<?= base_url(); ?>beastudi/edit/<?= $bs['id']; ?>" class="btn btn-success btn-circle btn-sm">
											<i class="fas fa-edit"></i>
										</a>
										<a href="<?= base_url(); ?>beastudi/delete/<?= $bs['id']; ?>" class="btn btn-danger btn-circle btn-sm">
											<i class="fas fa-trash"></i>
										</a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="register-heading">Identitas Mahasiswa Beastudi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('beastudi/insert'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<select name="pic_id" id="pic_id" class="form-control">
							<option value="" selected disabled>Pilih PIC</option>
							<?php
							$query = $this->db->query("SELECT * FROM pic");
							foreach ($query->result() as $p) : ?>
								<option value="<?= $p->id; ?>"><?= $p->nama; ?></option>
							<?php endforeach; ?>
						</select>
						<small class="form-text- text-danger"><?= form_error('nama'); ?></small>
					</div>
					<div class="form-group">
						<input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap">
						<small class="form-text- text-danger"><?= form_error('nama'); ?></small>
					</div>
					<div class="form-group">
						<label class="radio inline">
							<input type="radio" name="jk" value="Laki-Laki" checked>
							<span> Laki - Laki </span>
						</label>
						<label class="radio inline">
							<input type="radio" name="jk" value="Perempuan">
							<span> Perempuan </span>
						</label>
						<small class="form-text- text-danger"><?= form_error('jk'); ?></small>
					</div>
					<div class="form-group">
						<input type="text" name="kelas" class="form-control" id="kelas" placeholder="Kelas">
						<small class="form-text- text-danger"><?= form_error('kelas'); ?></small>
					</div>
					<div class="form-group">
						<select class="form-control" name="semester" id="semester">
							<option class="hidden" selected disabled>Semester</option>
							<?php foreach ($semester as $s) { ?>
								<option value="<?= $s->id ?>"> <?= $s->semester ?></option>
							<?php } ?>
						</select>
						<small class="form-text- text-danger"><?= form_error('semester'); ?></small>
					</div>
					<div class="form-group">
						<input type="number" class="form-control" placeholder="Angkatan (Tahun)" id="angkatan" name="angkatan" />
					</div>
					<div class="form-group">
						<select class="form-control" name="programstudi" id="programstudi">
							<option class="hidden" selected disabled>Pilih Program Studi</option>
							<?php foreach ($programstudi as $k) { ?>
								<option value="<?= $k->id ?>"> <?= $k->programstudi ?></option>
							<?php } ?>
						</select>
						<small class="form-text- text-danger"><?= form_error('programstudi'); ?></small>
					</div>
					<div class="form-group">
						<select class="form-control" id="kontribusi" name="kontribusi">
							<option class="hidden" selected disabled>Pilih Jenis Kontribusi</option>
							<?php foreach ($kontribusi as $k) { ?>
								<option value="<?= $k->id ?>"> <?= $k->kontribusi ?></option>
							<?php } ?>
						</select>
						<small class="form-text- text-danger"><?= form_error('kontribusi'); ?></small>
					</div>
					<div class="form-group">
						<label class="radio inline">
							<input type="radio" name="status" value="Sudah Kontribusi" checked>
							<span> Sudah Kontribusi </span>
						</label>
						<label class="radio inline">
							<input type="radio" name="status" value="Belum Kontribusi">
							<span> Belum Kontribusi </span>
						</label>
						<small class="form-text- text-danger"><?= form_error('jk'); ?></small>
					</div>
					<div class="form-group">
						<textarea class="form-control" rows="5" name="keterangan" class="form-control" id="keterangan" placeholder="Keterangan"></textarea>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
						<button type="submit" class="btn btn-primary">Tambah</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
