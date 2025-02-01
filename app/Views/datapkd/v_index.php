<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title"><?= $judul ?></h3>

      <div class="card-tools">
        <a href="<?= base_url('datapkd/input') ?>" class="btn btn-primary btn-flat btn-xs">
          <i class="fas fa-plus"></i> Tambah
        </a>
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <?php

      use App\Controllers\datapkd;

      if (session()->getFlashdata('delete')) : ?>
        <div class="delete-flash" data-message="<?= session()->getFlashdata('delete') ?>"></div>
      <?php endif; ?>

      <?php if (session()->getFlashdata('insert')) : ?>
        <div class="insert-flash" data-message="<?= session()->getFlashdata('insert') ?>"></div>
      <?php endif; ?>

      <?php if (session()->getFlashdata('update')) : ?>
        <div class="update-flash" data-message="<?= session()->getFlashdata('update') ?>"></div>
      <?php endif; ?>

      <table class="table table-bordered table-sm">
        <tr class="text-center bg-primary">
          <th>NO</th>
          <th>ID</th>
          <th>NIK</th>
          <th>Nama</th>
          <th>Tempat Lahir</th>
          <th>Tanggal Lahir</th>
          <th>Cabang</th>
          <th>Universitas</th>
          <th>Tahun PKD</th>
          <th>Aksi</th>
        <tr>

          <?php $no = 1;
          foreach ($datapkd as $key => $d) { ?>
        <tr>
          <td class="text-center"><?= $no++; ?></td>
          <td class="text-center"><?= $d['id'] ?></td>
          <td class="text-center"><?= $d['nik'] ?></td>
          <td class=><?= $d['nama'] ?></td>
          <td class=><?= $d['tempat_lahir'] ?></td>
          <td class="text-center"><?= $d['tanggal_lahir'] ?></td>

          <td class=><?= $d['cabang'] ?></td>
          <td class="text-center"><?= $d['universitas'] ?></td>
          <td class="text-center"><?= $d['tahun_pkd'] ?></td>
          <td class="text-center">
            <div class="btn-group">
              <a href="<?= base_url('datapkd/edit/' . $d['nama']) ?>" class="btn btn-warning btn-sm btn-flat"><i class="fas fa-pencil-alt"></i></a>
              <button onclick="confirmDelete('<?= base_url('datapkd/deletedata/') ?>', '<?= $d['nama'] ?>')"
                class="btn btn-danger btn-sm" title="Hapus">
                <i class="fas fa-trash"></i>
              </button>
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