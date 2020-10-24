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
									<h3 class="h3 mb-4 text-gray-800"><?= $title; ?></h3>
									<hr>
									<?= $this->session->flashdata('message'); ?>
									<form action="<?= base_url('user/changepassword'); ?>" method="post">
										<div class="form-group">
											<label for="current_password">Password Lama</label>
											<input type="password" class="form-control" id="current_password" name="current_password">
											<?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<div class="form-group">
											<label for="new_password1">Password Baru</label>
											<input type="password" class="form-control" id="new_password1" name="new_password1">
											<?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<div class="form-group">
											<label for="new_password2">Ulangi Password</label>
											<input type="password" class="form-control" id="new_password2" name="new_password2">
											<?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-primary">Lupa Password</button>
										</div>
									</form>
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
