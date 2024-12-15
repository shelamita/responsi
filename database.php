<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "responsi";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("<div class='alert alert-danger'>Connection failed: " . $conn->connect_error . "</div>");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Fasilitas Kesehatan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {

            background-color: #ffe6e6;
        }

        .navbar {
            position: sticky;
            top: 0;
            z-index: 1000;
            /* Make sure it's above other content */
        }

        .bg-light {
            background: linear-gradient(135deg, #f8f9fa 0%, #e2e6ea 100%);
        }

        .poppins-semibold {
            font-family: "Poppins", sans-serif;
            font-weight: 600;
            font-style: normal;
        }

        .poppins-medium {
            font-family: "Poppins", sans-serif;
            font-weight: 500;
            font-style: normal;
        }

        .judul-peta {
            margin-left: 10px;
            /* Geser teks ke kanan 10px */
        }

        .hero {
            background: url('https://via.placeholder.com/1920x600') no-repeat center center/cover;
            color: white;
            padding: 100px 0;
            text-align: center;
        }

        .map-container {
            height: 500px;
        }

        footer {
            background: #660000;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand poppins-semibold judul-peta" href="#">
                <img src="icon\icon.png" alt="Logo" style="height: 40px;">
                PETA SEHATI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item poppins-medium"><a class="nav-link" href="index.html">Home</a></li>
                    <li class="nav-item poppins-medium"><a class="nav-link" href="map.html">Map</a></li>
                    <li class="nav-item poppins-medium"><a class="nav-link" href="index.html#info">About</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten Rumah Sakit -->
    <div class="container mt-5">
        <h2 class="text-center mb-4 poppins-medium">Rumah Sakit Terdata</h2>
        <?php
        // Query untuk menampilkan data Rumah Sakit
        $sql = "SELECT * FROM rumahsakit";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<div class='table-responsive'>
                    <table class='table table-striped table-bordered text-center'>
                        <thead class='table-light'>
                            <tr>
                                <th>Nama</th>
                                <th>Kecamatan</th>
                                <th>Alamat</th>
                                <th>Layanan</th>
                                <th>Longitude</th>
                                <th>Latitude</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row["nama"]) . "</td>
                        <td>" . htmlspecialchars($row["kecamatan"]) . "</td>
                        <td>" . htmlspecialchars($row["alamat"]) . "</td>
                        <td>" . htmlspecialchars($row["layanan"]) . "</td>
                        <td>" . htmlspecialchars($row["longitude"]) . "</td>
                        <td>" . htmlspecialchars($row["latitude"]) . "</td>
                        <td class='d-flex justify-content-center'>
                            <a href='edit.php?id=" . intval($row["id"]) . "' class='btn btn-sm btn-warning me-2'>Edit</a>
                            <a href='delete.php?id=" . intval($row["id"]) . "' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?');\" class='btn btn-sm btn-danger'>Delete</a>
                        </td>
                    </tr>";
            }
            echo "</tbody></table></div>";
        } else {
            echo "<div class='alert alert-warning text-center'>Tidak ada data ditemukan.</div>";
        }
        ?>
    </div>
    <div class="text-end mb-3 me-4">
    <div class="d-flex justify-content-center mb-3">
            <!-- Tombol Kembali -->
            <div class="text-center me-3">
                <a href="index.html" class="btn btn-secondary">Kembali</a>
            </div>

            <!-- Tombol Tambah Data Rumah Sakit-->
            <div class="text-center">
                <a href="input.html" class="btn btn-primary">Tambah Data Rumah Sakit</a>
            </div>
        </div>
    </div>

    <!-- Konten Puskesmas -->
    <div id="puskesmas"
    class="container mt-5">
        <h2 class="text-center mb-4 poppins-medium">Puskesmas Terdata</h2>
        <?php
        // Query untuk menampilkan data Puskesmas
        $sql = "SELECT * FROM puskesmas";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<div class='table-responsive'>
                    <table class='table table-striped table-bordered text-center'>
                        <thead class='table-light'>
                            <tr>
                                <th>Nama</th>
                                <th>Kecamatan</th>
                                <th>Alamat</th>
                                <th>Layanan</th>
                                <th>Longitude</th>
                                <th>Latitude</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row["nama"]) . "</td>
                        <td>" . htmlspecialchars($row["kecamatan"]) . "</td>
                        <td>" . htmlspecialchars($row["alamat"]) . "</td>
                        <td>" . htmlspecialchars($row["layanan"]) . "</td>
                        <td>" . htmlspecialchars($row["longitude"]) . "</td>
                        <td>" . htmlspecialchars($row["latitude"]) . "</td>
                        <td class='d-flex justify-content-center'>
                            <a href='edit.php?id=" . intval($row["id"]) . "' class='btn btn-sm btn-warning me-2'>Edit</a>
                            <a href='delete.php?id=" . intval($row["id"]) . "' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?');\" class='btn btn-sm btn-danger'>Delete</a>
                        </td>
                    </tr>";
            }
            echo "</tbody></table></div>";
        } else {
            echo "<div class='alert alert-warning text-center'>Tidak ada data ditemukan.</div>";
        }
        ?>
    </div>
    <div class="text-end mb-3 me-4">
    <div class="d-flex justify-content-center mb-3">
            <!-- Tombol Kembali -->
            <div class="text-center me-3">
                <a href="index.html" class="btn btn-secondary">Kembali</a>
            </div>

            <!-- Tombol Tambah Data Rumah Sakit-->
            <div class="text-center">
                <a href="input.html" class="btn btn-primary">Tambah Data Puskesmas</a>
            </div>
        </div>
    </div>

    <!-- Konten Posyandu -->
    <div id="posyandu"
    class="container mt-5">
        <h2 class="text-center mb-4 poppins-medium">Posyandu Terdata</h2>
        <?php
        // Query untuk menampilkan data Posyandu
        $sql = "SELECT * FROM posyandu";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<div class='table-responsive'>
                    <table class='table table-striped table-bordered text-center'>
                        <thead class='table-light'>
                            <tr>
                                <th>Nama</th>
                                <th>Kecamatan</th>
                                <th>Alamat</th>
                                <th>Layanan</th>
                                <th>Longitude</th>
                                <th>Latitude</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row["nama"]) . "</td>
                        <td>" . htmlspecialchars($row["kecamatan"]) . "</td>
                        <td>" . htmlspecialchars($row["alamat"]) . "</td>
                        <td>" . htmlspecialchars($row["layanan"]) . "</td>
                        <td>" . htmlspecialchars($row["longitude"]) . "</td>
                        <td>" . htmlspecialchars($row["latitude"]) . "</td>
                        <td class='d-flex justify-content-center'>
                            <a href='edit.php?id=" . intval($row["id"]) . "' class='btn btn-sm btn-warning me-2'>Edit</a>
                            <a href='delete.php?id=" . intval($row["id"]) . "' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?');\" class='btn btn-sm btn-danger'>Delete</a>
                        </td>
                    </tr>";
            }
            echo "</tbody></table></div>";
        } else {
            echo "<div class='alert alert-warning text-center'>Tidak ada data ditemukan.</div>";
        }
        ?>
    </div>
    <div class="text-end mb-3 me-4">
    <div class="d-flex justify-content-center mb-3">
            <!-- Tombol Kembali -->
            <div class="text-center me-3">
                <a href="index.html" class="btn btn-secondary">Kembali</a>
            </div>

            <!-- Tombol Tambah Data Rumah Sakit-->
            <div class="text-center">
                <a href="input.html" class="btn btn-primary">Tambah Data Posyandu</a>
            </div>
        </div>
    </div>

    <!-- Konten Total Faskes -->
    <div id="faskes"
    class="container mt-5">
        <h2 class="text-center mb-4 poppins-medium">Total Faskes Terdata</h2>
        <?php
        // Query untuk menampilkan data Faskes
        $sql = "SELECT * FROM total";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<div class='table-responsive'>
                    <table class='table table-striped table-bordered text-center'>
                        <thead class='table-light'>
                            <tr>
                                <th>Kecamatan</th>
                                <th>Rumah Sakit</th>
                                <th>Puskesmas</th>
                                <th>Posyandu</th>
                                <th>Total Faskes</th>
                            </tr>
                        </thead>
                        <tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row["kecamatan"]) . "</td>
                        <td>" . htmlspecialchars($row["rumahsakit"]) . "</td>
                        <td>" . htmlspecialchars($row["puskesmas"]) . "</td>
                        <td>" . htmlspecialchars($row["posyandu"]) . "</td>
                        <td>" . htmlspecialchars($row["total_faskes"]) . "</td>
                    </tr>";
            }
            echo "</tbody></table></div>";
        } else {
            echo "<div class='alert alert-warning text-center'>Tidak ada data ditemukan.</div>";
        }
        $conn->close();
        ?>
    </div>
    <div class="text-end mb-3 me-4">
        <div class="d-flex justify-content-end mb-3" style="padding-right: 100px;">
            <a href="statistik.html" class="btn btn-success">Cek Statistik</a>
        </div>
    </div>


    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Shelamita. All rights reserved.</p>
        <a href="index.html" class="btn btn-danger">Kembali ke Halaman Utama</a>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>