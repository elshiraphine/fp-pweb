<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau belum
if (isset($_POST['daftar'])) {

    // ambil data dari formulir
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];
    $password = $_POST['password'];

    // Buat id menggunakan UUID
    $id = uniqid();

    // buat query
    $sql = "INSERT INTO calon_siswa (id, nama, alamat, jenis_kelamin, agama, sekolah_asal, password)
            VALUES ('$id', '$nama', '$alamat', '$jk', '$agama', '$sekolah', '$password')";

    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if ($query) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index.php?status=sukses');
        exit;
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: index.php?status=gagal');
        exit;
    }
} else {
    die("Akses dilarang...");
}

?>
