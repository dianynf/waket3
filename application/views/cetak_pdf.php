<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Mahasiswa Beastudi STT Terpadu Nurul Fikri</title>
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <!-- <div id="logo">
        <img src="<?= base_url('assets/img/images/logo.png'); ?>">
      </div> -->
      <h1>SEKOLAH TINGGI TEKNOLOGI <br> TERPADU NURUL FIKRI</h1>
    </header>
      <table border="1">
        <thead>
          <tr>
            <th>NO</th>
            <th>PIC</th>
            <th>Nama Mahasiswa</th>
            <th>Semester</th>
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
    <footer>
      Sekolah Tinggi Teknologi Terpadu Nurul Fikri 
    </footer>
  </body>
</html>
       
    