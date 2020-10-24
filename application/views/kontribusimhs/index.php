<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Mahasiswa Beastudi</h1>
    <div class="row">
        <div class="col-lg-10">
            <div class="card-body">
                <div class="table-responsive">
                    <?= form_error('dana', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                    <?= $this->session->flashdata('message'); ?>
                    <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#newRoleModal">Tambah</a>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Mahasiswa</th>
                                <th scope="col">Kontribusi</th>
                                <th scope="col">Waktu Kontribusi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($kontribusimhs as $da) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td>
                                    <?php foreach ($beastudi as $be) { ?>
                                    <?php if ($be->id == $da['nama_id']) {
                                                echo $be->nama_mh;
                                            }
                                        } ?>
                                    </td>
                                    <td><?php foreach ($kontribusi as $k) { ?>
                                    <?php if ($k->id == $da['kontribusi_id']) {
                                                echo $k->kontribusi;
                                            }
                                    } ?>
                                        </td>
                                    <td><?= $da['date']; ?></td>
                                    <td>
                                        <a href="<?= base_url(); ?>kontribusimhs/edit/<?= $da['id']; ?>" class="badge badge-success">Edit</a>
                                        <a href="<?= base_url(); ?>kontribusimhs/delete/<?= $da['id']; ?>" class="badge badge-danger">delete</a>
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
<!-- /.container-fluid -->
</div>
<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- method="post" ketika input tidak terlihat di url -->
            <!-- action untuk mengarakan controller role -->
            <form action="<?= base_url('kontribusimhs/insert'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                    <select class="form-control" id="nama_mh" name="nama_mh">
                            <option class="hidden" selected disabled> -- Mahasiswa Beastudi --</option>
                            <?php foreach ($beastudi as $be) { ?>
                                <option value="<?= $be->id ?>"> <?= $be->nama_mh ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="kontribusi" name="kontribusi">
                            <option class="hidden" selected disabled> -- Pilih Jenis Kontribusi --</option>
                            <?php foreach ($kontribusi as $k) { ?>
                                <option value="<?= $k->id ?>"> <?= $k->kontribusi ?></option>
                            <?php } ?>
                        </select>
                        <small class="form-text- text-danger"><?= form_error('kontribusi'); ?></small>
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" placeholder="Waktu Kontribusi" name="date" id="date" value="<?php echo isset($itemOutData->date_out) ? set_value('date_out', date('m/d/Y', strtotime($itemOutData->date_out))) : set_value('date_out'); ?>" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>