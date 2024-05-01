<?php
// Koneksi ke database
$servername = "localhost"; // Ganti dengan nama host Anda
$username = "username"; // Ganti dengan username database Anda
$password = "password"; // Ganti dengan password database Anda
$dbname = "nama_database"; // Ganti dengan nama database Anda

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil nomor ilmiah dari formulir
$nomor_ilmiah = $_POST['nomor_ilmiah'];

// Fungsi untuk memeriksa apakah suatu nomor adalah nomor ilmiah
function isScientificNumber($number) {
    // Lakukan validasi di sini, contoh:
    // Jika nomor ilmiah adalah nomor yang hanya terdiri dari angka 0-9 dan huruf e atau E (untuk eksponen)
    // Anda dapat menyesuaikan validasi sesuai dengan definisi nomor ilmiah yang Anda inginkan.
    if (preg_match('/^[0-9.eE]+$/', $number)) {
        return true;
    } else {
        return false;
    }
}

// Periksa apakah nomor yang dimasukkan adalah nomor ilmiah atau bukan
if (isScientificNumber($nomor_ilmiah)) {
    echo "Nomor Ilmiah: $nomor_ilmiah";
} else {
    echo "Bukan Nomor Ilmiah: $nomor_ilmiah";
}

// Tutup koneksi
$conn->close();
?>