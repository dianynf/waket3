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
								<div class="card-body">
									<h3 class="h3 mb-4 text-gray-800"><?= $title; ?> <?= $user['name']; ?></h3>
									<div class="card mb-12 col-lg-12">
										<div class="row no-gutters">
											<div class="col-md-3">
												<img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img">
											</div>
											<div class="col-md-8">
												<div class="card-body">
													<p class="card-text"><?= $user['email']; ?></p>
													<p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['date_created']); ?></small></p>
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
	</div>
</div>
</div>
