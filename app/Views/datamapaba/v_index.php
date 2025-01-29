<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>

            <div class="card-tools">
                <div class="d-flex">
                    <!-- Search Box dengan animasi -->
                    <div class="input-group input-group-sm" style="width: 200px;">
                        <input type="text" id="searchInput" class="form-control form-control-sm border-right-0" placeholder="Cari data..">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent border-left-0" style="cursor: pointer;" id="searchIcon">
                                <i class="fas fa-search text-primary"></i>
                            </span>
                        </div>
                    </div>
                    <!-- Tombol Tambah -->
                    <a href="<?= base_url('datamapaba/input') ?>" class="btn btn-primary btn-xs ms-2">
                        <i class="fas fa-plus"></i> Tambah
                    </a>
                </div>
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
            <table class="table table-bordered table-sm" id="dataTable">
                <tr class="text-center bg-primary">
                    <th>NO</th>
                    <th>ID</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Cabang</th>
                    <th>Universitas</th>
                    <th>Tahun Mapaba</th>
                    <th>Aksi</th>
                <tr>

                    <?php $no = 1;
                    foreach ($datamapaba as $key => $d) { ?>
                <tr class="search-item">
                    <td class="text-center"><?= $no++; ?></td>
                    <td class="text-center"><?= $d['id'] ?></td>
                    <td class="text-center"><?= $d['nik'] ?></td>
                    <td class=><?= $d['nama'] ?></td>
                    <td class=><?= $d['tempat_lahir'] ?></td>
                    <td class="text-center"><?= $d['tanggal_lahir'] ?></td>

                    <td class=><?= $d['cabang'] ?></td>
                    <td class="text-center"><?= $d['universitas'] ?></td>
                    <td class="text-center"><?= $d['tahun_mapaba'] ?></td>
                    <td class="text-center">
                        <div class="btn-group">

                            <a href="<?= base_url('datamapaba/edit/' . $d['nama']) ?>" class="btn btn-warning btn-sm btn-flat"><i class="fas fa-pencil-alt"></i></a>
                            <a href="<?= base_url('datamapaba/deletedata/' . $d['nama']) ?>" onclick="return confirm('Yakin Hapus Data..?')" class="btn btn-danger btn-sm btn-flat"><i class="fas fa-trash"></i></a>
                        </div>
                    </td>
                </tr>
            <?php } ?>
            </table>

            <div class="mt-3 d-flex justify-content-between align-items-center">
                <div class="dataTables_info" id="dataInfo" role="status" aria-live="polite">
                    Menampilkan <span id="showingStart">1</span> sampai <span id="showingEnd">10</span> dari <span id="totalEntries">0</span> data
                </div>
                <div class="dataTables_paginate paging_simple_numbers">
                    <ul class="pagination pagination-sm m-0" id="pagination">
                        <li class="paginate_button page-item previous disabled" id="prevPage">
                            <a href="#" class="page-link">Sebelumnya</a>
                        </li>
                        <li class="paginate_button page-item next" id="nextPage">
                            <a href="#" class="page-link">Selanjutnya</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<style>
    #searchInput {
        transition: all 0.3s ease;
        border-color: #dee2e6;
    }

    #searchInput:focus {
        box-shadow: none;
        border-color: #80bdff;
        width: 250px;
    }

    .input-group-text {
        border-color: #dee2e6;
        transition: all 0.3s ease;
    }

    #searchInput:focus+.input-group-append .input-group-text {
        border-color: #80bdff;
    }

    .search-highlight {
        background-color: #ffeeba;
        padding: 2px;
        border-radius: 3px;
    }

    .search-animation {
        animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    .pagination .page-link {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
        line-height: 1.5;
        color: #007bff;
        background-color: #fff;
        border: 1px solid #dee2e6;
    }

    .pagination .page-item.disabled .page-link {
        color: #6c757d;
        pointer-events: none;
        cursor: not-allowed;
        background-color: #fff;
        border-color: #dee2e6;
    }

    .pagination .page-item:not(.disabled) .page-link:hover {
        color: #0056b3;
        text-decoration: none;
        background-color: #e9ecef;
        border-color: #dee2e6;
    }

    .dataTables_info {
        font-size: 0.875rem;
        color: #6c757d;
    }
</style>

<script>
    // Konfigurasi pagination
    const itemsPerPage = 10;
    let currentPage = 1;
    let filteredRows = [];

    function updatePagination() {
        const rows = document.getElementsByClassName('search-item');
        const searchText = document.getElementById('searchInput').value.toLowerCase();

        // Filter rows berdasarkan pencarian
        filteredRows = Array.from(rows).filter(row => {
            if (searchText === '') return true;
            return row.textContent.toLowerCase().includes(searchText);
        });

        const totalPages = Math.ceil(filteredRows.length / itemsPerPage);
        const start = (currentPage - 1) * itemsPerPage;
        const end = Math.min(start + itemsPerPage, filteredRows.length);

        // Update info showing entries
        document.getElementById('showingStart').textContent = filteredRows.length ? start + 1 : 0;
        document.getElementById('showingEnd').textContent = end;
        document.getElementById('totalEntries').textContent = filteredRows.length;

        // Show/hide rows based on current page
        Array.from(rows).forEach(row => row.style.display = 'none');
        for (let i = start; i < end; i++) {
            filteredRows[i].style.display = '';
        }

        // Update pagination buttons state
        document.getElementById('prevPage').classList.toggle('disabled', currentPage === 1);
        document.getElementById('nextPage').classList.toggle('disabled', currentPage === totalPages || totalPages === 0);
    }

    // Event listener untuk pencarian
    document.getElementById('searchInput').addEventListener('keyup', function() {
        currentPage = 1; // Reset ke halaman pertama saat mencari
        updatePagination();
    });

    // Event listeners untuk tombol pagination
    document.getElementById('prevPage').addEventListener('click', function(e) {
        e.preventDefault();
        if (currentPage > 1) {
            currentPage--;
            updatePagination();
        }
    });

    document.getElementById('nextPage').addEventListener('click', function(e) {
        e.preventDefault();
        const totalPages = Math.ceil(filteredRows.length / itemsPerPage);
        if (currentPage < totalPages) {
            currentPage++;
            updatePagination();
        }
    });

    // Inisialisasi pagination saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
        updatePagination();
    });

    // Update script pencarian yang sudah ada
    document.getElementById('searchInput').addEventListener('keyup', function() {
        let searchText = this.value.toLowerCase();
        let searchIcon = document.getElementById('searchIcon').querySelector('i');

        // Animasi ikon pencarian
        if (searchText.length > 0) {
            searchIcon.classList.remove('fa-search');
            searchIcon.classList.add('fa-times', 'text-danger');
        } else {
            searchIcon.classList.remove('fa-times', 'text-danger');
            searchIcon.classList.add('fa-search', 'text-primary');
        }

        // Update pagination setelah pencarian
        currentPage = 1;
        updatePagination();
    });
</script>