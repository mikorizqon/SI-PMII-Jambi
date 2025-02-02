<div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $judul ?></h3>

                <div class="card-tools">
                  <a href="<?= base_url('datauser/input') ?>" class="btn btn-primary btn-flat btn-xs">
                    <i class="fas fa-plus"></i> Tambah
                  </a>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php

                            use App\Controllers\datauser;

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
                        <th>Nama User</th>
                        <th>User Name</th>
                        <th>Level</th>
                        <th>Cabang</th>
                        <th>Aksi</th>
                    <tr>
                    
                    <?php $no = 1;
                     foreach ($datauser as $key => $d) { ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td class=><?= $d['nama_user']?></td>
                        <td class=><?= $d['username']?></td>
                        
                        <td class="text-center"><?= $d['level']?></td>
                        <td class="text-center"><?= $d['cabang']?></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="<?= base_url('datauser/edit/' . $d['nama_user']) ?>" class="btn btn-warning btn-sm btn-flat"><i class="fas fa-pencil-alt"></i></a>
                                <a href="<?= base_url('datauser/deletedata/' . $d['nama_user']) ?>" onclick="return confirm('Yakin Hapus Data..?')" class="btn btn-danger btn-sm btn-flat"><i class="fas fa-trash"></i></a>
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