<div class="container-fluid">
	<div class="row mt-12">
		<div class="col md-5">
			<div class="card-deck">
				<div class="col-xl-12 col-md-8 mb-5">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="row">
							<div class="col-lg-12">
								<div class="card-body">
									<div class="d-sm-flex align-items-center justify-content-between mb-4">
										<h3 class="h3 mb-0 text-gray-800"><?= $title; ?></h3>
										<a href="#" class="d-none d-sm-inline-block btn btn-primary shadow-sm" data-toggle="modal" data-target="#newSubMenuModal">Tambah</a>
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
													<th scope="col">Title</th>
													<th scope="col">Menu</th>
													<th scope="col">Url</th>
													<th scope="col">Icon</th>
													<th scope="col">Active</th>
													<th scope="col">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php $i = 1; ?>
												<?php foreach ($subMenu as $sm) : ?>
													<tr>
														<th scope="row"><?= $i++; ?></th>
														<td><?= $sm['title']; ?></td>
														<td><?= $sm['menu']; ?></td>
														<td><?= $sm['url']; ?></td>
														<td><?= $sm['icon']; ?></td>
														<td><?= $sm['is_active']; ?></td>
														<td>
															<a href="<?= base_url(); ?>menu/editsub/<?= $sm['id']; ?>" class="btn btn-success btn-circle btn-sm">
																<i class="fas fa-edit"></i>
															</a>
															<a href="<?= base_url(); ?>menu/hapus/<?= $sm['id']; ?>" class="btn btn-danger btn-circle btn-sm">
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
			</div>
		</div>
	</div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newSubMenuModalLabel">Tambah Data Sub Menu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<!-- method="post" ketika input tidak terlihat di url -->
			<!-- action untuk mengarakan controller menu -->
			<form action="<?php base_url('menu/submenu'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="title" name="title" placeholder="Submenu Title">
					</div>
					<div class="form-group">
						<select name="menu_id" id="menu_id" class="form-control">
							<option value="">Select Menu</option>
							<?php foreach ($menu as $m) : ?>
								<option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
					</div>
					<div class="form-group">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
							<label class="form-check-label" for="is_active">
								Active?
							</label>
						</div>
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
