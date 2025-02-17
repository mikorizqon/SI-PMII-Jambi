<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                    <a href="<?= base_url('userdatapkn/input') ?>" class="btn btn-primary btn-xs ms-2">
                        <i class="fas fa-plus"></i> Tambah
                    </a>
                </div>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="flash-data" data-flashdata="<?= session()->getFlashdata('success') ?>" data-type="success"></div>
            <?php endif; ?>
            
            <?php if (session()->getFlashdata('error')): ?>
                <div class="flash-data" data-flashdata="<?= session()->getFlashdata('error') ?>" data-type="error"></div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('delete')): ?>
                <div class="flash-data" data-flashdata="<?= session()->getFlashdata('delete') ?>" data-type="delete"></div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('update')): ?>
                <div class="flash-data" data-flashdata="<?= session()->getFlashdata('update') ?>" data-type="update"></div>
            <?php endif; ?>

            <!-- Hapus atau komentari baris berikut -->
            <!-- <pre><?php print_r($userdatapkn); ?></pre> -->
            <table class="table table-bordered table-sm" id="dataTable">
                <tr class="text-center bg-primary">
                    <th>NO</th>
                    <th>ID</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Universitas</th>
                    <th>Cabang</th>
                    <th>Tahun pkn</th>
                    <th>Aksi</th>
                </tr>

                <?php $no = 1;
                foreach ($userdatapkn as $d) { ?>
                    <tr class="search-item">
                        <td class="text-center"><?= $no++; ?></td>
                        <td class="text-center"><?= $d['id'] ?></td>
                        <td class="text-center"><?= $d['nik'] ?></td>
                        <td><?= $d['nama'] ?></td>
                        <td><?= $d['tempat_lahir'] ?></td>
                        <td class="text-center"><?= $d['tanggal_lahir'] ?></td>
                        <td><?= $d['universitas'] ?></td>
                        <td><?= $d['cabang'] ?></td>
                        <td class="text-center"><?= $d['tahun_pkn'] ?></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="<?= base_url('userdatapkn/edit/' . $d['nama']) ?>" class="btn btn-warning btn-sm btn-flat"><i class="fas fa-pencil-alt"></i></a>
                                <a href="<?= base_url('userdatapkn/deletedata/' . $d['nama']) ?>" onclick="return confirm('Yakin Hapus Data..?')" class="btn btn-danger btn-sm btn-flat"><i class="fas fa-trash"></i></a>
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

    .swal2-popup {
        font-size: 0.9rem !important;
    }

    .swal2-title {
        font-size: 1.3rem !important;
    }

    .swal2-confirm, .swal2-cancel {
        font-size: 0.9rem !important;
    }

    
    /* Styling untuk tabel */
    .table {
        font-family: 'Poppins', sans-serif;
        font-size: 0.9rem;
        color: #4a5568;
        border-radius: 8px;
        overflow: hidden;
    }

    .table th {
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 0.5px;
        background-color: #3c8dbc !important;
        color: white;
        border: none;
        padding: 12px 15px;
    }

    .table td {
        padding: 12px 15px;
        border-color: #edf2f7;
        vertical-align: middle;
    }

    .table tr:nth-child(even) {
        background-color: #f8fafc;
    }

    .table tr:hover {
        background-color: #ebf4ff;
        transition: all 0.2s ease;
    }

    /* Styling untuk tombol aksi */
    .btn-group .btn {
        padding: 4px 8px;
        margin: 0 2px;
        border-radius: 4px;
        transition: all 0.2s ease;
    }

    .btn-group .btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .btn-warning {
        background-color: #f6ad55;
        border-color: #f6ad55;
    }

    .btn-danger {
        background-color: #fc8181;
        border-color: #fc8181;
    }

    .btn-warning:hover {
        background-color: #ed8936;
        border-color: #ed8936;
    }

    .btn-danger:hover {
        background-color: #f56565;
        border-color: #f56565;
    }

    /* Styling untuk text alignment */
    .text-center {
        font-weight: 500;
    }

    td:not(.text-center) {
        font-weight: 400;
    }

    /* Existing styles remain unchanged */
    #searchInput {
        transition: all 0.3s ease;
        border-color: #dee2e6;
    }

    
</style>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
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

    // Fungsi untuk menampilkan SweetAlert2
    const flashData = $('.flash-data').data('flashdata');
    const flashType = $('.flash-data').data('type');

    if (flashData) {
        let title, icon;
        
        switch(flashType) {
            case 'success':
                title = 'Berhasil';
                icon = 'success';
                break;
            case 'error':
                title = 'Error';
                icon = 'error';
                break;
            case 'delete':
                title = 'Terhapus';
                icon = 'success';
                break;
            case 'update':
                title = 'Terupdate';
                icon = 'success';
                break;
            default:
                title = 'Notifikasi';
                icon = 'info';
        }

        Swal.fire({
            title: title,
            text: flashData,
            icon: icon,
            showConfirmButton: false,
            timer: 1500
        });
    }

    // Konfirmasi Delete dengan SweetAlert2
    $('.btn-delete').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = href;
            }
        });
    });
</script>