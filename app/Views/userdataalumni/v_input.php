<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>
        </div>
        <div class="card-body">
            <?php 
            // Tampilkan pesan error validasi jika ada
            $validation = \Config\Services::validation();
            if ($validation->getErrors()) {
                echo '<div class="alert alert-danger">';
                echo $validation->listErrors();
                echo '</div>';
            }
            ?>
            
            <form action="<?= base_url('userdataalumni/insertdata') ?>" method="POST">
                <?= csrf_field() ?>
                <div class="form-group">
                    <label>NIK</label>
                    <input name="nik" class="form-control" value="<?= old('nik') ?>" placeholder="Masukkan NIK">
                </div>
                
                <div class="form-group">
                    <label>Nama</label>
                    <input name="nama" class="form-control" value="<?= old('nama') ?>" placeholder="Masukkan Nama">
                </div>
                
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input name="tempat_lahir" class="form-control" value="<?= old('tempat_lahir') ?>" placeholder="Masukkan Tempat Lahir">
                </div>
                
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" value="<?= old('tanggal_lahir') ?>">
                </div>
                
                <div class="form-group">
                    <label>Cabang</label>
                    <input name="cabang" class="form-control" value="<?= old('cabang') ?>" placeholder="Masukkan Cabang">
                </div>
                
                <div class="form-group">
                    <label>Universitas</label>
                    <input name="universitas" class="form-control" value="<?= old('universitas') ?>" placeholder="Masukkan Universitas">
                </div>
                
                <div class="form-group">
                    <label>Profesi</label>
                    <input name="propesi" class="form-control" value="<?= old('propesi') ?>" placeholder="Masukkan Profesi">
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('userdataalumni') ?>" class="btn btn-success">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>