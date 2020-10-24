<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-8">
            <div class="modal-body">
                <?php foreach ($kontribusimhs as $bes) { ?>
                    <form action="<?= base_url() . 'kontribusimhs/update'; ?>" method='post'>
                        <input type="hidden" name="id" value="<?= $bes->id ?>">
                        <div class="form-group row">
                            <label for="menu" class="col-sm-3 col-form-label">Nama Mahasiswa</label>
                            <div class="col-sm-7">
                                <select name="nama_mh" id="nama_mh" class="form-control">
                                    <?php
                                        $query = $this->db->query("SELECT * FROM beastudi")->result();
                                        foreach ($query as $p) : ?>
                                        <option <?php if ($p->id == $bes->nama_id) {
                                                            echo 'selected';
                                                        } ?> value="<?= $p->id; ?>"><?= $p->nama_mh; ?>
                                        </option>
                                    <?php endforeach; ?>
                                <small class="form-text- text-danger"><?= form_error('nama_id'); ?></small>
                                </select> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="menu" class="col-sm-3 col-form-label">Kontribusi</label>
                            <div class="col-sm-7">
                                <select class="form-control" name="kontribusi" id="kontribusi">
                                    <?php foreach ($kontribusi as $s) : ?>
                                        <option <?= $s->id == $bes->kontribusi_id ? 'selected' : null; ?> value="<?= $s->id; ?>"><?= $s->kontribusi; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="menu" class="col-sm-3 col-form-label">Waktu Kontribusi</label>
                            <div class="col-sm-7">
                                <input type="date" name="date" class="form-control" id="date" placeholder="Waktu Kontribusi" value="<?= $bes->date ?>">
                                <small class="form-text- text-danger"><?= form_error('date'); ?></small>
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