<main id="main" class="main">
    <div class="container-fluid">
    <div class="pagetitle">
      <h1><?php echo $judul;?></h1>
    </div><!-- End Page Title -->
      <div class="row">
        <div class="col-md-6">
          <a href="<?=base_url('Perpustakaan/tambah')?>" class="btn btn-info mb-2">Tambah Review Buku</a>
        </div>
        <div class="col-md-12">
          <?=$this->session->flashdata('message');?>
          <table class="table">
            <thead>
              <tr>
                <td>No</td>
                <td>Nama Reviewer</td>
                <td>Judul Buku</td>
                <td>Genre</td>
                <td>Review Buku</td>
                <td>Gambar</td>
                <td>Aksi</td>
              </tr>
            </thead>
            <tbody>
              <?php $i=1;?>
              <?php foreach($perpustakaan as $us): ?>
              <tr>
                <td><?= $i;?></td>
                <td><?= $us['nama_reviewer'];?></td>
                <td><?= $us['judul_buku'];?></td>
                <td><?= $us['genre_buku'];?></td>
                <td><?= $us['review_buku'];?></td>
                <td><img src="<?= base_url('assets/img/review/').$us['gambar'];?>" style="width:100px;" class="img-thumbnail"></td>
                <td><a href="<?=base_url('Perpustakaan/hapus/') . $us['id'];?>" class="badge badge-danger">Hapus</a>
              </tr>
              <?php $i++;?>
              <?php endforeach;?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main><!-- End #main -->

  