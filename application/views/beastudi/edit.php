<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="row mt-12">
		<div class="col md-5">
			<div class="card-deck">
				<div class="col-xl-12 col-md-8 mb-5">
					<div class="card border-left-primary shadow h-100 py-2">
						<!-- Page Heading -->
						<div class="row">
							<div class="col-lg-12">
								<div class="modal-body">
									<?php foreach ($beastudi as $bes) { ?>
										<h3 class="text-gray-800">Edit Data <?= $bes->nama_mh ?></h3>
										<hr>
										<form action="<?= base_url() . 'beastudi/update'; ?>" method='post'>
											<input type="hidden" name="id" value="<?= $bes->id ?>">
											<div class="form-group row">
												<label for="menu" class="col-sm-3 col-form-label">PIC</label>
												<div class="col-sm-9">
													<select name="pic_id" id="pic_id" class="form-control">
														<?php
														$query = $this->db->query("SELECT * FROM pic")->result();
														foreach ($query as $p) : ?>
															<option <?php if ($p->id == $bes->pic_id) {
																		echo 'selected';
																	} ?> value="<?= $p->id; ?>"><?= $p->nama; ?>
															</option>
														<?php endforeach; ?>
													</select>
													<small class="form-text- text-danger"><?= form_error('menu_id'); ?></small>
												</div>
											</div>
											<div class="form-group row">
												<label for="menu" class="col-sm-3 col-form-label">Nama</label>
												<div class="col-sm-9">
													<input type="text" name="nama_mh" class="form-control" id="nama_mh" placeholder="Nama Lengkap" value="<?= $bes->nama_mh ?>">
													<small class="form-text- text-danger"><?= form_error('nama_mh'); ?></small>
												</div>
											</div>
											<div class="form-group row">
												<label for="jk" class="col-sm-3 col-form-label">Jenis Kelamin</label>
												<div class="col-sm-9">
													<div class="form-group">
														<label for=""><input type="radio" name="jk" value="Laki-Laki" <?= $bes->jk == 'Laki-Laki' ? 'checked' : null; ?>> Laki-Laki</label>
														<label for=""><input type="radio" name="jk" value="Perempuan" <?= ($bes->jk == 'Perempuan') ? 'checked' : ''; ?>> Perempuan</label>
														<small class="form-text- text-danger"><?= form_error('jk'); ?></small>
													</div>
												</div>
											</div>
											<div class="form-group row">
												<label for="menu" class="col-sm-3 col-form-label">Kelas</label>
												<div class="col-sm-9">
													<input type="text" name="kelas" class="form-control" id="kelas" placeholder="Kelas" value="<?= $bes->kelas ?>">
													<small class="form-text- text-danger"><?= form_error('kelas'); ?></small>
												</div>
											</div>
											<div class="form-group row">
												<label for="menu" class="col-sm-3 col-form-label">Semester</label>
												<div class="col-sm-9">
													<select class="form-control" name="semester" id="semester">
														<?php foreach ($semester as $s) : ?>
															<option <?= $s->id == $bes->semester_id ? 'selected' : null; ?> value="<?= $s->id; ?>"><?= $s->semester; ?></option>
														<?php endforeach; ?>
													</select>
													<small class="form-text- text-danger"><?= form_error('semester'); ?></small>
												</div>
											</div>
											<div class="form-group row">
												<label for="menu" class="col-sm-3 col-form-label">Angkatan</label>
												<div class="col-sm-9">
													<input type="number" maxlength="4" class="form-control" placeholder="Angkatan" id="angkatan" name="angkatan" value="<?= $bes->angkatan ?>">
													<small class="form-text- text-danger"><?= form_error('angkatan'); ?></small>
												</div>
											</div>
											<div class="form-group row">
												<label for="menu" class="col-sm-3 col-form-label">Program Studi</label>
												<div class="col-sm-9">
													<select class="form-control" name="programstudi" id="programstudi">
														<?php foreach ($programstudi as $s) : ?>
															<option <?= $s->id == $bes->programstudi_id ? 'selected' : null; ?> value="<?= $s->id; ?>"><?= $s->programstudi; ?></option>
														<?php endforeach; ?>
													</select>
													<small class="form-text- text-danger"><?= form_error('programstudi'); ?></small>
												</div>
											</div>
											<div class="form-group row">
												<label for="menu" class="col-sm-3 col-form-label">Kontribusi</label>
												<div class="col-sm-9">
													<select class="form-control" name="kontribusi" id="kontribusi">
														<?php foreach ($kontribusi as $s) : ?>
															<option <?= $s->id == $bes->kontribusi_id ? 'selected' : null; ?> value="<?= $s->id; ?>"><?= $s->kontribusi; ?></option>
														<?php endforeach; ?>
													</select>
													<small class="form-text- text-danger"><?= form_error('kontribusi'); ?></small>
												</div>
											</div>
											<div class="form-group row">
												<label for="jk" class="col-sm-3 col-form-label">Jenis Kelamin</label>
												<div class="col-sm-9">
													<div class="form-group">
														<label for=""><input type="radio" name="status" value="Sudah Kontribusi" <?= $bes->status == 'Sudah Kontribusi' ? 'checked' : null; ?>> Sudah Kontribusi</label>
														<label for=""><input type="radio" name="status" value="Belum Kontribusi" <?= ($bes->status == 'Belum Kontribusi') ? 'checked' : ''; ?>> Belum Kontribusi</label>
														<small class="form-text- text-danger"><?= form_error('status'); ?></small>
													</div>
												</div>
											</div>
											<div class="form-group row">
												<label for="menu" class="col-sm-3 col-form-label">Keterangan</label>
												<div class="col-sm-9">
													<textarea class="form-control" rows="5" name="keterangan" id="keterangan"><?= $bes->keterangan; ?></textarea>
												</div>
											</div>
											<div class=" form-file row justify-content-end">
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
