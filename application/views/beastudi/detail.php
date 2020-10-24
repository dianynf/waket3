<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="row mt-12">
		<div class="col md-5">
			<div class="card-deck">
				<div class="col-xl-2 col-md-8 mb-7">
				</div>
				<div class="col-xl-8 col-md-8 mb-5">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="modal-body">
							<?php foreach ($beastudi1 as $bes) { ?>
								<form action="#" method='get'>
									<h3 class="text-gray-800">Data <?= $bes->nama_mh ?></h3>
									<hr>
									<input type="hidden" name="id" value="<?= $bes->id ?>">
									<div class="form-group row">
										<label for="menu" class="col-sm-3 col-form-label">PIC</label>
										<div class="col-sm-7 mt-2">:
											<?php
											$query = $this->db->query("SELECT * FROM pic")->result();
											foreach ($query as $k) { ?>
											<?php if ($k->id == $bes->pic_id) {
													echo $k->nama;
												}
											} ?>
										</div>
									</div>
									<hr>
									<div class="form-group row">
										<label for="menu" class="col-sm-3 col-form-label">Nama</label>
										<div class="col-sm-7 mt-2">:
											<a><?= $bes->nama_mh ?></a>
										</div>
									</div>
									<hr>
									<div class="form-group row">
										<label for="jk" class="col-sm-3 col-form-label">Jenis Kelamin</label>
										<div class="col-sm-7 mt-2">:
											<a><?= $beastudi['jk']; ?></a>
										</div>
									</div>
									<hr>
									<div class="form-group row">
										<label for="jk" class="col-sm-3 col-form-label">Kelas</label>
										<div class="col-sm-7 mt-2">:
											<a><?= $beastudi['kelas']; ?></a>
										</div>
									</div>
									<hr>
									<div class="form-group row">
										<label for="menu" class="col-sm-3 col-form-label">Semester</label>
										<div class="col-sm-7 mt-2">:
											<?php
											$query = $this->db->query("SELECT * FROM semester")->result();
											foreach ($query as $k) { ?>
											<?php if ($k->id == $bes->semester_id) {
													echo $k->semester;
												}
											} ?>
										</div>
									</div>
									<hr>
									<div class="form-group row">
										<label for="menu" class="col-sm-3 col-form-label">Angkatan</label>
										<div class="col-sm-7 mt-2">:
											<a><?= $beastudi['angkatan']; ?></a>
										</div>
									</div>
									<hr>
									<div class="form-group row">
										<label for="menu" class="col-sm-3 col-form-label">Program Studi</label>
										<div class="col-sm-7 mt-2">:
											<?php
											$query = $this->db->query("SELECT * FROM programstudi")->result();
											foreach ($query as $k) { ?>
											<?php if ($k->id == $bes->programstudi_id) {
													echo $k->programstudi;
												}
											} ?>
										</div>
									</div>
									<hr>
									<div class="form-group row">
										<label for="menu" class="col-sm-3 col-form-label">Kontribusi</label>
										<div class="col-sm-7 mt-2">:
											<?php
											$query = $this->db->query("SELECT * FROM kontribusi")->result();
											foreach ($query as $k) { ?>
											<?php if ($k->id == $bes->kontribusi_id) {
													echo $k->kontribusi;
												}
											} ?>
										</div>
									</div>
									<hr>
									<div class="form-group row">
										<label for="jk" class="col-sm-3 col-form-label">Status</label>
										<div class="col-sm-7 mt-2">:
											<a><?= $beastudi['status']; ?></a>
										</div>
									</div>
									<hr>
									<div class="form-group row">
										<label for="menu" class="col-sm-3 col-form-label">Keterangan</label>
										<div class="col-sm-7 mt-2">:
											<a><?= $bes->keterangan; ?></a>
										</div>
									</div>
									<hr>
									<div class=" form-file row justify-content-end">
										<div class="col-sm-12">
											<a href="<?= base_url(); ?>beastudi/" class="btn btn-primary">Kembali</a>
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
