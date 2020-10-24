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
									<?= form_open_multipart('user/edit'); ?>
									<div class="form-group row">
										<label for="email" class="col-sm-2 col-form-label">Email</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
										</div>
									</div>
									<div class="form-group row">
										<label for="name" class="col-sm-2 col-form-label">Full Name</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
											<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-sm-2">Gambar</div>
										<div class="col-sm-10">
											<div class="row">
												<div class="col-sm-3">
													<img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
												</div>
												<div class="col-sm-9">
													<div class="custom-file">
														<input type="file" class="custom-file-input" id="image" name="image" value="<?= $user['image']; ?>">
														<label class="custom-file-label" for="image"><?= $user['image']; ?>"</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-file row justify-content-end">
										<div class="col-sm-10">
											<button type="submit" class="btn btn-primary">Edit</button>
										</div>
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
