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
            <?= form_open('datauser/updatedata/' . $datauser['nama_user']) ?>
            <div class="card-body">

            <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama_user" value="<?= $datauser['nama_user'] ?>" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('nama_user') ?></p>
                </div>

                <div class="form-group">
                    <label>User Name</label>
                    <input type="text" name="username" value="<?= $datauser['username'] ?>" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('username') ?></p>
                </div>

            <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" value="<?= $datauser['password'] ?>" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('password') ?></p>
                </div>

            <div class="form-group">
                    <label>Level</label>
                    <select name="level" class="form-control">
                        <option value="admin" <?= ($datauser['level'] == 'admin') ? 'selected' : '' ?>>Admin</option>
                        <option value="user" <?= ($datauser['level'] == 'user') ? 'selected' : '' ?>>User</option>
                    </select>
                    <p class="text-danger"><?= $validasi->getError('level') ?></p>
                </div>
            
            <div class="form-group">
                    <label>Cabang</label>
                    <input type="text" name="cabang" value="<?= $datauser['cabang'] ?>" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('cabang') ?></p>
                </div>

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
              <a href="<?= base_url('datauser') ?>" class="btn btn-success btn-flat">Kembali</a>
            </div>
            <?= form_close() ?>
          </div>
        </div>
        <!-- /.col-->