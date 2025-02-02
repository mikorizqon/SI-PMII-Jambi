function confirmDelete(url, nama) {
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
            window.location.href = url + nama;
        }
    });
}

// Fungsi untuk menampilkan notifikasi
function showNotification() {
    // Notifikasi Delete
    const deleteFlash = document.querySelector('.delete-flash');
    if (deleteFlash) {
        Swal.fire({
            title: 'Berhasil!',
            text: deleteFlash.getAttribute('data-message'),
            icon: 'success',
            timer: 3000,
            timerProgressBar: true,
            showConfirmButton: false
        });
    }

    // Notifikasi Insert
    const insertFlash = document.querySelector('.insert-flash');
    if (insertFlash) {
        Swal.fire({
            title: 'Berhasil!',
            text: insertFlash.getAttribute('data-message'),
            icon: 'success',
            timer: 3000,
            timerProgressBar: true,
            showConfirmButton: false
        });
    }

    // Notifikasi Update
    const updateFlash = document.querySelector('.update-flash');
    if (updateFlash) {
        Swal.fire({
            title: 'Berhasil!',
            text: updateFlash.getAttribute('data-message'),
            icon: 'success',
            timer: 3000,
            timerProgressBar: true,
            showConfirmButton: false
        });
    }
}

// Jalankan saat dokumen dimuat
document.addEventListener('DOMContentLoaded', showNotification); 