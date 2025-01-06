<div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $judul ?></h3>

                <div class="card-tools">
                  <a href="<?= base_url('datamapaba/input') ?>" class="btn btn-primary btn-flat btn-xs">
                    <i class="fas fa-plus"></i> Tambah
                  </a>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php

                            use App\Controllers\datamapaba;

                if (session()->get('insert')) {
                    echo '<div class="alert alert-success">';
                    echo session()->get('insert');
                    echo '</div>';
                }
                
                if (session()->get('update')) {
                    echo '<div class="alert alert-primary">';
                    echo session()->get('update');
                    echo '</div>';
                }

                if (session()->get('delete')) {
                    echo '<div class="alert alert-danger">';
                    echo session()->get('delete');
                    echo '</div>';
                }

                ?>
                <table class="table table-bordered table-sm">
                    <tr class="text-center bg-primary">
                        <th>NO</th>    
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat Tinggal</th>
                        <th>Universitas</th>
                        <th>Tahun Mapaba</th>
                        <th>Aksi</th>
                    <tr>
                    
                    <?php $no = 1;
                     foreach ($datamapaba as $key => $d) { ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td class="text-center"><?= $d['nik']?></td>
                        <td class=><?= $d['nama']?></td>
                        <td class=><?= $d['tempat_lahir']?></td>
                        <td class="text-center"><?= $d['tanggal_lahir']?></td>
                        <td class=><?= $d['alamat_tinggal']?></td>
                        <td class="text-center"><?= $d['universitas']?></td>
                        <td class="text-center"><?= $d['tahun_mapaba']?></td>
                        <td class="text-center">
                            <div class="btn-group">
                                
                                <a href="<?= base_url('datamapaba/edit/' . $d['nama']) ?>" class="btn btn-warning btn-sm btn-flat"><i class="fas fa-pencil-alt"></i></a>
                                <a href="<?= base_url('datamapaba/deletedata/' . $d['nama']) ?>" onclick="return confirm('Yakin Hapus Data..?')" class="btn btn-danger btn-sm btn-flat"><i class="fas fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>