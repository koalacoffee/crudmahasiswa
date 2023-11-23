<main id="main" class="main">
    <div class="container-fluid">
        <div class="pagetitle">
            <h1 align="center"><?php echo $judul;?></h1>
        </div><!-- End Page Title -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header justify-content-center">
                        Form Review Buku | Review buku yang telah kamu baca disini :)
                    </div>
                    <div class="card-body"><br>
                    <img src="<?= base_url("assets/img/lib.jpg");?>" alt="" class="card-img" width=200px height=100px> <br>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group"><br>
                                <label for="nim">NIM</label>
                                <input type="text" name="nim" value="<?= set_value('nim')?>" class="form-control"
                                    id="nim" placeholder="NIM">
                                <?= form_error('nim','<small class="text-danger p1-3">','</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama_reviewer" value="<?= set_value('nama')?>"
                                    class="form-control" id="nama" placeholder="Nama">
                                <?= form_error('nama','<small class="text-danger p1-3">','</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="prodi">Prodi</label>
                                <select name="prodi" id="prodi" value="<?= set_value('prodi')?>" class="form-control">
                                    <option value="">Pilih Prodi</option>
                                    <?php foreach($prodi as $p):?>
                                    <option value="<?= $p['id'];?>"><?=$p['nama'];?></option>
                                    <?php endforeach;?>
                                </select>
                                <?= form_error('prodi','<small class="text-danger p1-3">','</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="judul_buku">Judul Buku</label>
                                <input type="text" name="judul_buku" value="<?= set_value('judul_buku')?>"
                                    class="form-control" id="judul_buku" placeholder="Judul Buku">
                                <?= form_error('judul_buku','<small class="text-danger p1-3">','</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="genre_buku">Genre Buku</label>
                                <input type="text" name="genre_buku" value="<?= set_value('genre_buku')?>"
                                    class="form-control" id="genre_buku" placeholder="Genre Buku">
                                <?= form_error('genre_buku','<small class="text-danger p1-3">','</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="review_buku">Review Buku</label>
                                <input type="text" name="review_buku" value="<?= set_value('review_buku')?>"
                                    class="form-control" id="review_buku" placeholder="Review Buku">
                                <?= form_error('review_buku','<small class="text-danger p1-3">','</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <div class="custom-file">
                                    <input type="file" name="gambar" value="<?= set_value('gambar')?>" class="custom-file-input" id="gambar">
                                    <label for="gambar" class="custom-file-label">Chooose File</label>
                                    <?= form_error('gambar','<small class="text-danger p1-3">','</small>');?>
                                </div>
                            </div>
                            <a href="<?=base_url('Perpustakaan')?>" class="btn btn-danger">Tutup</a>
                            <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah
                                Review</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main><!-- End #main -->