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
									<form action="" method='post'>
										<div class="form-group row">
											<label for="menu" class="col-sm-3 col-form-label">Nama</label>
											<div class="col-sm-9">
												<input type="text" name="nama" class="form-control" id="nama" value="<?= $pic['nama']; ?>">
												<small class="form-text- text-danger"><?= form_error('menu_id'); ?></small>
											</div>
										</div>
										<div class="form-group row">
											<label for="menu" class="col-sm-3 col-form-label">Divisi</label>
											<div class="col-sm-9">
												<input type="text" name="divisi" class="form-control" id="divisi" value="<?= $pic['divisi']; ?>">
												<small class="form-text text-danger"><?= form_error('pic'); ?></small>
											</div>
										</div>
										<input type="hidden" name="id" value="<?= $pic['id']; ?>">
										<div class="form-file row justify-content-end">
											<div class="col-sm-9">
												<button type="submit" name="edit" class="btn btn-primary">Edit</button>
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
