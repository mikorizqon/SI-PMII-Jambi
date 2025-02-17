<div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                <?= $subjudul ?>
              </h3>
            </div>
            <?php
            session();
            $validasi = \Config\Services::validation();
            ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <?php echo form_open('userdatapkl/insertdata') ?>
            <div class="card-body">

            <div class="form-group">
                    <label>NIK</label>
                    <input name="nik" class="form-control" value="<?= old('nik') ?>">
                    <p class="text-danger"><?= validation_show_error('nik') ?></p>
                </div>

            <div class="form-group">
                    <label>Nama</label>
                    <input name="nama" class="form-control" value="<?= old('nama') ?>">
                    <p class="text-danger"><?= validation_show_error('nama') ?></p>
                </div>

                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input name="tempat_lahir" class="form-control" value="<?= old('tempat_lahir') ?>">
                    <p class="text-danger"><?= validation_show_error('tempat_lahir') ?></p>
                </div>

                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input name="tanggal_lahir" type="date" class="form-control" value="<?= old('tanggal_lahir') ?>">
                    <p class="text-danger"><?= validation_show_error('tanggal_lahir') ?></p>
                </div>

            <div class="form-group">
                    <label>Cabang</label>
                    <input name="cabang" class="form-control" value="<?= old('cabang') ?>">
                    <p class="text-danger"><?= validation_show_error('cabang') ?></p>
                </div>

            <div class="form-group">
                    <label>Universitas</label>
                    <input name="universitas" class="form-control" value="<?= old('universitas') ?>">
                    <p class="text-danger"><?= validation_show_error('universitas') ?></p>
                </div>
            
            <div class="form-group">
                    <label>Tahun PKL</label>
                    <input name="tahun_pkl" type="number" min="2000" max="2099" step="1" class="form-control" value="<?= old('tahun_pkl') ?>">
                    <p class="text-danger"><?= validation_show_error('tahun_pkl') ?></p>
                </div>

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
              <a href="<?= base_url('userdatapkl') ?>" class="btn btn-success btn-flat">Kembali</a>
            </div>
            <?php echo form_close() ?>
          </div>
        </div>
        <!-- /.col-->