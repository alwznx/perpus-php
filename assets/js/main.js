// 1. FUNGSI UNTUK LOGIN
async function handleLogin(event) {
    event.preventDefault(); // Ini mencegah halaman me-reload!
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const errorDiv = document.getElementById('error-message');

    try {
        // "Menelepon" server.js
        const response = await fetch(`${API_URL}/login`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ username, password })
        });

        const result = await response.json();

        if (response.ok) { // Jika server bilang (status 200) "Sukses"
            localStorage.setItem(AUTH_KEY, 'true'); // Simpan status login
            window.location.href = 'dashboard.html';
        } else { // Jika server bilang "Gagal"
            errorDiv.textContent = result.message;
            errorDiv.style.display = 'block';
        }
    } catch (error) {
        // Ini terjadi jika server.js Anda mati
        errorDiv.textContent = 'Tidak dapat terhubung ke server.';
        errorDiv.style.display = 'block';
    }
}

// 2. FUNGSI UNTUK LOGOUT
function handleLogout() {
    localStorage.removeItem(AUTH_KEY);
    window.location.href = 'index.html';
}

// 3. FUNGSI UNTUK CEK APAKAH SUDAH LOGIN
function checkAuth() {
    const auth = localStorage.getItem(AUTH_KEY);
    const currentPage = window.location.pathname.split('/').pop();

    if (!auth && currentPage !== 'index.html' && currentPage !== '') {
        // Jika belum login DAN tidak di halaman login, tendang ke login
        window.location.href = 'index.html';
    } else if (auth && (currentPage === 'index.html' || currentPage === '')) {
        // Jika sudah login TAPI di halaman login, lempar ke dashboard
        window.location.href = 'dashboard.html';
    }
}

// =================================================================
// FUNGSI UNTUK HALAMAN BUKU (CRUD)
// =================================================================

// 1. FUNGSI UNTUK MEMUAT DATA BUKU DARI DATABASE
async function loadBooks() {
    const tbody = document.getElementById('books-table-body');
    if (!tbody) return; // Keluar jika ini bukan halaman buku

    try {
        const response = await fetch(`${API_URL}/buku`); // Panggil API GET /api/buku
        const result = await response.json();

        if (result.success) {
            tbody.innerHTML = ''; // Kosongkan tabel dulu
            result.data.forEach(buku => {
                const row = `
                    <tr>
                        <td>${buku.id}</td>
                        <td>${buku.judul}</td>
                        <td>${buku.penulis}</td>
                        <td>${buku.isbn}</td>
                        <td>${buku.tahun}</td>
                        <td>${buku.stok}</td>
                        <td>
                            <button class="btn btn-sm btn-danger" onclick="deleteBook(${boku.id})">Hapus</button>
                        </td>
                    </tr>
                `;
                tbody.innerHTML += row;
            });
        }
    } catch (error) {
        tbody.innerHTML = '<tr><td colspan="7">Gagal memuat data dari server.</td></tr>';
    }
}

// 2. FUNGSI UNTUK MENAMBAH BUKU KE DATABASE
async function addBook(event) {
    event.preventDefault();

    const bookData = {
        judul: document.getElementById('book-title').value,
        penulis: document.getElementById('book-author').value,
        isbn: document.getElementById('book-isbn').value,
        tahun: document.getElementById('book-year').value,
        stok: document.getElementById('book-stock').value
    };

    try {
        const response = await fetch(`${API_URL}/buku`, { // Panggil API POST /api/buku
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(bookData)
        });
        const result = await response.json();

        if (result.success) {
            document.getElementById('book-form').reset(); // Kosongkan form
            loadBooks(); // Muat ulang daftar buku
        } else {
            alert('Gagal menambah buku: ' + result.message);
        }
    } catch (error) {
        alert('Tidak dapat terhubung ke server.');
    }
}

// 3. FUNGSI UNTUK MENGHAPUS BUKU DARI DATABASE
async function deleteBook(id) {
    if (!confirm('Apakah Anda yakin ingin menghapus buku ini?')) {
        return;
    }

    try {
        const response = await fetch(`${API_URL}/buku/${id}`, { // Panggil API DELETE /api/buku/:id
            method: 'DELETE'
        });
        const result = await response.json();

        if (result.success) {
            loadBooks(); // Muat ulang daftar buku
        } else {
            alert('Gagal menghapus buku: ' + result.message);
        }
    } catch (error) {
        alert('Tidak dapat terhubung ke server.');
    }
}

// =================================================================
// "PENYAMBUNG" EVENT LISTENER
// =================================================================
document.addEventListener('DOMContentLoaded', function() {

    // Cek status login di setiap halaman
    checkAuth();

    // --- Sambungkan Halaman Login ---
    const loginForm = document.getElementById('login-form');
    if (loginForm) {
        loginForm.addEventListener('submit', handleLogin);
    }

    // --- Sambungkan Tombol Logout ---
    const logoutBtn = document.getElementById('logout-btn');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', handleLogout);
    }

    // --- Sambungkan Halaman Buku ---
    const bookForm = document.getElementById('book-form');
    if (bookForm) {
        bookForm.addEventListener('submit', addBook);
    }

    // Jika kita di halaman buku, panggil fungsi untuk memuat data buku
    if (document.getElementById('books-table-body')) {
        loadBooks();
    }

    // (Kode untuk halaman anggota, kelas, dll. akan ditambahkan di sini nanti)
});