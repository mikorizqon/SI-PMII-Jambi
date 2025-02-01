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
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable">
                    <thead>
                        <tr class="text-center">
                            <th width="5%">NO</th>
                            <th width="8%">ID</th>
                            <th width="12%">NIK</th>
                            <th width="15%">Nama</th>
                            <th width="12%">Tempat Lahir</th>
                            <th width="10%">Tanggal Lahir</th>
                            <th width="10%">Cabang</th>
                            <th width="12%">Universitas</th>
                            <th width="8%">Tahun</th>
                            <th width="8%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($datamapaba as $key => $d) { ?>
                            <tr class="search-item">
                                <td class="text-center"><?= $no++; ?></td>
                                <td class="text-center"><?= $d['id'] ?></td>
                                <td><?= $d['nik'] ?></td>
                                <td><?= $d['nama'] ?></td>
                                <td><?= $d['tempat_lahir'] ?></td>
                                <td class="text-center"><?= $d['tanggal_lahir'] ?></td>
                                <td><?= $d['cabang'] ?></td>
                                <td><?= $d['universitas'] ?></td>
                                <td class="text-center"><?= $d['tahun_mapaba'] ?></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="<?= base_url('datamapaba/edit/' . $d['nama']) ?>" class="btn btn-warning btn-sm" title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button onclick="confirmDelete('<?= $d['nama'] ?>')" class="btn btn-danger btn-sm" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

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

    /* Styling untuk tabel */
    .table {
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
    }

    .table thead th {
        background-color: #007bff;
        color: #fff;
        font-weight: 500;
        text-transform: uppercase;
        font-size: 0.9rem;
        padding: 12px;
        border: none;
        vertical-align: middle;
    }

    .table tbody tr {
        transition: all 0.3s ease;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    .table tbody tr:hover {
        background-color: #f0f7ff;
        transform: scale(1.01);
    }

    .table td {
        padding: 12px;
        vertical-align: middle;
        border-color: #e9ecef;
    }

    /* Styling untuk tombol aksi */
    .btn-group .btn {
        margin: 0 2px;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .btn-group .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    /* Styling untuk alert messages */
    .alert {
        border-radius: 8px;
        border: none;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        padding: 15px 20px;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border-left: 4px solid #28a745;
    }

    .alert-primary {
        background-color: #cce5ff;
        color: #004085;
        border-left: 4px solid #007bff;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border-left: 4px solid #dc3545;
    }

    /* Styling untuk card */
    .card {
        border: none;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    .card-header {
        background-color: #fff;
        border-bottom: 2px solid #f8f9fa;
        padding: 15px 20px;
    }

    .card-title {
        color: #2c3e50;
        font-weight: 600;
        margin: 0;
    }

    /* Animasi loading untuk tabel */
    @keyframes shimmer {
        0% {
            background-position: -1000px 0;
        }

        100% {
            background-position: 1000px 0;
        }
    }

    .loading {
        animation: shimmer 2s infinite linear;
        background: linear-gradient(to right, #f6f7f8 0%, #edeef1 20%, #f6f7f8 40%, #f6f7f8 100%);
        background-size: 1000px 100%;
    }

    /* Responsif untuk mobile */
    @media (max-width: 768px) {
        .table-responsive {
            border-radius: 8px;
            overflow-x: auto;
        }

        .btn-group .btn {
            padding: 0.25rem 0.5rem;
        }

        .card-header {
            flex-direction: column;
        }

        .card-tools {
            margin-top: 10px;
            width: 100%;
        }
    }

    .swal2-popup {
        font-family: 'Poppins', sans-serif;
    }

    .swal2-title {
        font-size: 1.5rem;
        font-weight: 600;
    }

    .swal2-html-container {
        font-size: 1rem;
    }

    .swal2-confirm {
        padding: 8px 25px !important;
    }

    .swal2-cancel {
        padding: 8px 25px !important;
    }

    .swal2-icon {
        width: 5em !important;
        height: 5em !important;
        margin: 1.25em auto 1.875em !important;
    }

    .swal2-icon .swal2-icon-content {
        font-size: 3.75em !important;
    }

    .swal2-actions {
        margin-top: 1.5em !important;
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

    // Tambahan untuk animasi loading
    document.addEventListener('DOMContentLoaded', function() {
        const table = document.getElementById('dataTable');
        table.style.opacity = '0';

        setTimeout(() => {
            table.style.transition = 'opacity 0.5s ease';
            table.style.opacity = '1';
        }, 300);
    });

    function confirmDelete(nama) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Tambahkan loading state
                Swal.fire({
                    title: 'Menghapus Data...',
                    html: 'Mohon tunggu sebentar',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading()
                    }
                });

                // Redirect ke URL delete
                window.location.href = "<?= base_url('datamapaba/deletedata/') ?>" + nama;
            }
        });
    }

    // Tampilkan SweetAlert untuk pesan sukses/error
    <?php if (session()->getFlashdata('delete')) : ?>
        Swal.fire({
            title: 'Berhasil!',
            text: '<?= session()->getFlashdata('delete') ?>',
            icon: 'success',
            timer: 3000,
            timerProgressBar: true,
            showConfirmButton: false
        });
    <?php endif; ?>

    <?php if (session()->getFlashdata('insert')) : ?>
        Swal.fire({
            title: 'Berhasil!',
            text: '<?= session()->getFlashdata('insert') ?>',
            icon: 'success',
            timer: 3000,
            timerProgressBar: true,
            showConfirmButton: false
        });
    <?php endif; ?>

    <?php if (session()->getFlashdata('update')) : ?>
        Swal.fire({
            title: 'Berhasil!',
            text: '<?= session()->getFlashdata('update') ?>',
            icon: 'success',
            timer: 3000,
            timerProgressBar: true,
            showConfirmButton: false
        });
    <?php endif; ?>
</script>