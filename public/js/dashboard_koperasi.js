src="https://code.jquery.com/jquery-3.6.0.min.js"

function loadKoperasiDashboard() {
    // Menggunakan AJAX untuk memuat konten dari view yang sesuai
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("main-content").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "{{ route('koperasi_dashboard') }}", true);
    xhttp.send();
}

function changeContent(view) {
    // Gantilah fungsi ini sesuai dengan kebutuhan Anda
    if (view === 'koperasi_dashboard') {
        loadKoperasiDashboard();
    } else {
        // Logika lain jika diperlukan
    }
}

document.addEventListener('DOMContentLoaded', function() {
    var cards = document.querySelectorAll('.card');

    cards.forEach(function(card) {
        card.addEventListener('click', function() {
            var routeName = this.getAttribute('data-route-name');
            window.location.href = routeName;
        });
    });
});