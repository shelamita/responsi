<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "responsi";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $kecamatan = $_POST["kecamatan"];
    $alamat = $_POST["alamat"];
    $layanan = $_POST["layanan"];
    $longitude = $_POST["longitude"];
    $latitude = $_POST["latitude"];
    $tabel = $_POST["tabel"]; // Pilihan tabel

    // Pilih tabel berdasarkan dropdown
    if ($tabel == "rumahsakit") {
        $sql = "INSERT INTO rumahsakit (nama, kecamatan, alamat, layanan, longitude, latitude) 
                VALUES ('$nama', '$kecamatan', '$alamat', '$layanan', '$longitude', '$latitude')";
    } elseif ($tabel == "puskesmas") {
        $sql = "INSERT INTO puskesmas (nama, kecamatan, alamat, layanan, longitude, latitude) 
                VALUES ('$nama', '$kecamatan', '$alamat', '$layanan', '$longitude', '$latitude')";
    } elseif ($tabel == "posyandu") {
        $sql = "INSERT INTO posyandu (nama, kecamatan, alamat, layanan, longitude, latitude) 
                VALUES ('$nama', '$kecamatan', '$alamat', '$layanan', '$longitude', '$latitude')";
    } else {
        echo "<div style='color:red;'>Tabel tidak valid!</div>";
        exit;
    }

    // Eksekusi query
    if ($conn->query($sql) === TRUE) {
        echo "<div style='color:green;'>Data berhasil disimpan ke tabel $tabel!</div>";
        echo "<a href='database.php'>Kembali Database</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Tutup koneksi
$conn->close();
?>
