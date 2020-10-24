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
										<input type="hidden" name="id" value="<?= $menu['id']; ?>">
										<div class="form-group row">
											<label for="menu" class="col-sm-2 col-form-label">Menu</label>
											<div class="col-sm-10">
												<input type="text" name="menu" class="form-control" id="menu" value="<?= $menu['menu']; ?>">
												<small class="form-text text-danger"><?= form_error('menu'); ?></small>
											</div>
										</div>
										<div class="form-file row justify-content-end">
											<div class="col-sm-10">
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
