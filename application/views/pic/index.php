<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="table-responsive">
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
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Nama</th>
								<th scope="col">Divisi</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							<?php foreach ($pic as $pi) : ?>
								<tr>
									<th scope="row"><?= $i++; ?></th>
									<td><?= $pi['nama']; ?></td>
									<td><?= $pi['divisi']; ?></td>
									<th>
										<a href="<?= base_url(); ?>pic/edit/<?= $pi['id']; ?>" class="btn btn-success btn-circle btn-sm">
											<i class="fas fa-edit"></i>
										</a>
										<a href="<?= base_url(); ?>pic/delete/<?= $pi['id']; ?>" class="btn btn-danger btn-circle btn-sm">
											<i class="fas fa-trash"></i>
										</a>
									</th>
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

<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newRoleModalLabel">Tambah Data Pic</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<!-- method="post" ketika input tidak terlihat di url -->
			<!-- action untuk mengarakan controller role -->
			<form action="<?= base_url('pic'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" id="nama" />
					</div>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Bagian / Divisi" name="divisi" id="divisi" />
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
					<button type="submit" class="btn btn-primary">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>
