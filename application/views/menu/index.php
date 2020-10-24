<div class="container-fluid">
	<div class="row mt-12">
		<div class="col md-5">
			<div class="card-deck">
				<div class="col-xl-1 col-md-8 mb-7">
				</div>
				<div class="col-xl-10 col-md-8 mb-5">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="table-responsive">
								<div class="d-sm-flex align-items-center justify-content-between mb-4">
									<h3 class="h3 mb-0 text-gray-800"><?= $title; ?></h3>
									<a href="#" class="d-none d-sm-inline-block btn btn-primary shadow-sm" data-toggle="modal" data-target="#newMenuModal">Tambah</a>
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
											<th scope="col">Menu</th>
											<th scope="col">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1; ?>
										<?php foreach ($menu as $m) : ?>
											<tr>
												<th scope="row"><?= $i++; ?></th>
												<td><?= $m['menu']; ?></td>
												<th>
													<a href="<?= base_url(); ?>menu/edit/<?= $m['id']; ?>" class="btn btn-success btn-circle btn-sm">
														<i class="fas fa-edit"></i>
													</a>
													<a href="<?= base_url(); ?>menu/delete/<?= $m['id']; ?>" class="btn btn-danger btn-circle btn-sm">
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
	</div>
</div>
<!-- footer -->
</div>

<!-- Modal -->
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<!-- method="post" ketika input tidak terlihat di url -->
			<!-- action untuk mengarakan controller menu -->
			<form action="<?= base_url('menu'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Add</button>
				</div>
			</form>
		</div>
	</div>
</div>
