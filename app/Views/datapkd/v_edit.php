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
            <?php echo form_open('datapkd/updatedata/' . $datapkd['nama']) ?>
            <div class="card-body">

            <div class="form-group">
                    <label>NIK</label>
                    <input name="nik" value="<?= $datapkd['nik']?>" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('nik') ?></p>
                </div>

            <div class="form-group">
                    <label>Nama</label>
                    <input name="nama" value="<?= $datapkd['nama']?>" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('nama') ?></p>
                </div>

                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input name="tempat_lahir" value="<?= $datapkd['tempat_lahir']?>" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('tempat_lahir') ?></p>
                </div>

            <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input name="tanggal_lahir" value="<?= $datapkd['tanggal_lahir']?>" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('tanggal_lahir') ?></p>
                </div>

           
            
                <div class="form-group">
                    <label>Cabang</label>
                    <input name="cabang" value="<?= $datapkd['cabang']?>" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('cabang') ?></p>
                </div>

            <div class="form-group">
                    <label>Universitas</label>
                    <input name="universitas" value="<?= $datapkd['universitas']?>" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('universitas') ?></p>
                </div>
            
            <div class="form-group">
                    <label>Tahun pkd</label>
                    <input name="tahun_pkd" value="<?= $datapkd['tahun_pkd']?>" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('tahun_pkd') ?></p>
                </div>



            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
              <a href="<?= base_url('datapkd') ?>" class="btn btn-success btn-flat">Kembali</a>
            </div>
            <?php echo form_close() ?>
          </div>
        </div>
        <!-- /.col-->