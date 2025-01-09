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
            <?php echo form_open('datauser/updatedata/' . $datauser['nama_user']) ?>
            <div class="card-body">

            <div class="form-group">
                    <label>Nama</label>
                    <input name="nama_user" value="<?= $datauser['nama_user']?>" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('nama_user') ?></p>
                </div>

                <div class="form-group">
                    <label>User Name</label>
                    <input name="username" value="<?= $datauser['username']?>" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('username') ?></p>
                </div>

            <div class="form-group">
                    <label>Password</label>
                    <input name="password" value="<?= $datauser['password']?>" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('password') ?></p>
                </div>

            <div class="form-group">
                    <label>Level</label>
                    <input name="level" value="<?= $datauser['level']?>" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('level') ?></p>
                </div>

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
              <a href="<?= base_url('datauser') ?>" class="btn btn-success btn-flat">Kembali</a>
            </div>
            <?php echo form_close() ?>
          </div>
        </div>
        <!-- /.col-->