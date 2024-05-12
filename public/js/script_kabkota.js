// Fungsi untuk mengubah konten
function changeContent(content) {
    document.getElementById("dashboardContent").innerHTML = `<h1>${content}</h1>`;
}

// Fungsi untuk menangani toggle sidebar dan submenu
function toggleSidebar() {
    var sidebar = document.getElementById("sidebar");
    var navbar = document.getElementById("mainNavbar");

    // Toggle class 'collapsed' pada sidebar
    sidebar.classList.toggle("collapsed");

    // Toggle class 'navbar-shifted' pada navbar
    navbar.classList.toggle("navbar-shifted");

    // Toggle class 'body-shifted' pada body
    document.body.classList.toggle("body-shifted");

    // Tambahkan kelas 'black' pada navbar untuk mengubah warna latar belakang
    navbar.classList.toggle("black", navbar.classList.contains("navbar-shifted"));

    // Tambahkan atau hapus class 'collapsed' pada sidebar header tergantung dari kondisi saat ini
    var sidebarHeader = document.querySelector(".sidebar-header");
    sidebarHeader.classList.toggle("collapsed", sidebar.classList.contains("collapsed"));
}

// Fungsi untuk menangani toggle submenu
function toggleSubMenu(submenuId) {
    var submenu = document.getElementById(submenuId);
    submenu.classList.toggle('show');
}

// Fungsi untuk logout (sesuaikan dengan kebutuhan Anda)
function logout() {
    // Implementasi fungsi logout di sini
    alert("Anda telah logout!");
}

// Pastikan sidebar tetap terbuka
var sidebar = document.getElementById("sidebar");
if (sidebar && sidebar.classList.contains("collapsed")) {
    toggleSidebar();
}

function changeContent(content) {
    console.log('Content changed:', content);
    document.getElementById("dashboardContent").innerHTML = `<h1>${content}</h1>`;
}


// Fungsi untuk menangani klik pada link di sidebar
function handleSidebarLinkClick(event) {
    event.preventDefault();
    // toggleSidebar(); // Sementara dihapus
    event.stopPropagation();
    console.log('Handle Sidebar Link Click function called');
    changeContent('Dashboard');
}

function handleOtherClicks(event) {
    // Logika penanganan event lainnya
    event.stopPropagation(); // Mencegah event klik menyebar
}

function logout() {
    console.log('Logout button clicked'); // Pastikan bahwa fungsi logout() dijalankan
    fetch('/logout', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({}),
    })
    .then(response => {
        if (response.ok) {
            window.location.href = '/login';
        } else {
            console.error('Logout request failed');
        }
    })
    .catch(error => {
        console.error('Network error:', error);
    });
}