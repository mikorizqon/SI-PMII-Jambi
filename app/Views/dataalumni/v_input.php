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
            <?php echo form_open('dataalumni/insertdata') ?>
            <div class="card-body">

            <div class="form-group">
                    <label>NIK</label>
                    <input name="nik" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('nik') ?></p>
                </div>

            <div class="form-group">
                    <label>Nama</label>
                    <input name="nama" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('nama') ?></p>
                </div>

                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input name="tempat_lahir" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('tempat_lahir') ?></p>
                </div>

            <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input name="tanggal_lahir" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('tanggal_lahir') ?></p>
                </div>

            <div class="form-group">
                    <label>Alamat Tinggal</label>
                    <input name="alamat_tinggal" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('alamat_tinggal') ?></p>
                </div>

            <div class="form-group">
                    <label>Universitas</label>
                    <input name="universitas" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('universitas') ?></p>
                </div>
            
            <div class="form-group">
                    <label>propesi</label>
                    <input name="propesi" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('propesi') ?></p>
                </div>

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
              <a href="<?= base_url('dataalumni') ?>" class="btn btn-success btn-flat">Kembali</a>
            </div>
            <?php echo form_close() ?>
          </div>
        </div>
        <!-- /.col-->