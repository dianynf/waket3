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
									<h3 class="text-gray-800"><?= $title; ?></h3>
									<hr>
									<?php foreach ($users as $us) { ?>
										<form action="<?= base_url() . 'admin/update'; ?>" method='post'>
											<div class="form-group row">
												<input type="hidden" name="id" value="<?= $us->id ?>">
												<label for="email" class="col-sm-3 col-form-label">Email</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" id="email" name="email" value="<?= $us->email ?>" readonly>
												</div>
											</div>
											<div class="form-group row">
												<label for="name" class="col-sm-3 col-form-label">Full Name</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" id="name" name="name" value="<?= $us->name ?>" readonly>
													<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-sm-3">Gambar</div>
												<div class="col-sm-9">
													<div class="row">
														<div class="col-sm-3">
															<img src="<?= base_url('assets/img/profile/') . $us->image ?>" class="img-thumbnail">
														</div>
													</div>
												</div>
											</div>
											<div class="form-group row">
												<label for="name" class="col-sm-3 col-form-label">Role Id</label>
												<div class="col-sm-9">
													<select name="role_id" id="role_id" class="form-control">
														<?php
														$query = $this->db->query("SELECT * FROM user_role")->result();
														foreach ($query as $p) : ?>
															<option value="<?= $p->id; ?>"><?= $p->role; ?></option>
														<?php endforeach; ?>
													</select>
													<?= form_error('role_id', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<div class="form-group row">
												<label for="name" class="col-sm-3 col-form-label">Verifikasi Aktif</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" id="is_active" name="is_active" value="<?= $us->is_active ?>" readonly>
													<?= form_error('is_active', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<div class="form-file row justify-content-end">
												<div class="col-sm-9">
													<button type="submit" class="btn btn-primary">Edit</button>
												</div>
											</div>
										</form>
									<?php } ?>
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
