<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="table-responsive">
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h3 class="h3 mb-0 text-gray-800"><?= $title; ?></h3>
						<a href="<?= base_url('report/laporan_pdf') ?>" class="btn btn-danger mb-2">
							<i class=" fas fa-download"></i> Export PDF
						</a>
					</div>
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">PIC</th>
								<th scope="col">Nama Mahasiswa</th>
								<th scope="col">Semester</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							<?php foreach ($beastudi as $bs) : ?>
								<tr>
									<th scope="row"><?= $i++; ?></th>
									<td><?= $bs['nama']; ?></td>
									<td><?= $bs['nama_mh']; ?></td>
									<td>
										<?php foreach ($semester as $s) { ?>
										<?php if ($s->id == $bs['semester_id']) {
												echo $s->semester;
											}
										} ?>
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
