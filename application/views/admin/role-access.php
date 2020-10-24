<div class="container-fluid">
	<div class="row mt-12">
		<div class="col md-5">
			<div class="card-deck">
				<div class="col-xl-2 col-md-8 mb-7">
				</div>
				<div class="col-xl-8 col-md-8 mb-5">
					<div class="card border-left-primary shadow h-100 py-2">
						<!-- Page Heading -->
						<div class="row">
							<div class="col-lg-12">
								<div class="modal-body">
									<h3 class="h3 mb-4 text-gray-800">Role : <?= $role['role']; ?></h3>
									<?= $this->session->flashdata('message'); ?>
									<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
										<thead>
											<tr>
												<th scope="col">No</th>
												<th scope="col">Menu</th>
												<th scope="col">Access</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1; ?>
											<!-- $menu ambil dari controller admin baris 46  -->
											<?php foreach ($menu as $m) : ?>
												<tr>
													<th scope="row"><?= $i++; ?></th>
													<td><?= $m['menu']; ?></td>
													<th>
														<div class="form-check">
															<!-- check_accces akan menerima dua parameter 1 role idnya berapa ambil dari baris 9 dan menu idnya berapa dari baris ke 21 nenti di query // untuk helper-->
															<input class="form-check-input" type="checkbox" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id'] ?>" data-menu="<?= $m['id']; ?>">
															<!-- baris 29 untuk jquery -->
														</div>
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
</div>
</div>
