<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "responsi";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM rumahsakit WHERE ID = $id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        die("Data tidak ditemukan.");
    }
} else {
    die("ID tidak valid.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = htmlspecialchars($_POST['nama']);
    $kecamatan = htmlspecialchars($_POST['kecamatan']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $layanan = htmlspecialchars($_POST['layanan']);
    $longitude = htmlspecialchars($_POST['longitude']);
    $latitude = htmlspecialchars($_POST['latitude']);
    $tabel = $_POST['tabel'];

    if ($tabel == 'rumahsakit') {
        $sql_update = "UPDATE rumahsakit SET nama='$nama', kecamatan='$kecamatan', alamat='$alamat', layanan='$layanan', longitude='$longitude', latitude='$latitude' WHERE ID=$id";
    } elseif ($tabel == 'puskesmas') {
        $sql_update = "UPDATE puskesmas SET nama='$nama', kecamatan='$kecamatan', alamat='$alamat', layanan='$layanan', longitude='$longitude', latitude='$latitude' WHERE ID=$id";
    }

    if ($conn->query($sql_update) === TRUE) {
        header("Location: database.php");
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        .form-label {
            font-weight: bold;
        }

        .btn-primary {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 123, 255, 0.4);
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Card -->
                <div class="card p-4">
                    <h3 class="text-center mb-4 text-primary">
                        <i class="fa-solid fa-pen-to-square"></i> Edit Data
                    </h3>
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="tabel" class="form-label"><i class="fa-solid fa-table"></i> Pilih Tabel</label>
                            <select class="form-select" name="tabel" id="tabel" required>
                                <option value="rumahsakit">Rumah Sakit</option>
                                <option value="puskesmas">Puskesmas</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="nama" class="form-label"><i class="fa-solid fa-hospital"></i> Nama</label>
                            <input type="text" class="form-control" name="nama" value="<?php echo htmlspecialchars($row['nama']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="kecamatan" class="form-label"><i class="fa-solid fa-map-location"></i> Kecamatan</label>
                            <input type="text" class="form-control" name="kecamatan" value="<?php echo htmlspecialchars($row['kecamatan']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label"><i class="fa-solid fa-location-dot"></i> Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="<?php echo htmlspecialchars($row['alamat']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="layanan" class="form-label"><i class="fa-solid fa-list"></i> Layanan</label>
                            <input type="text" class="form-control" name="layanan" value="<?php echo htmlspecialchars($row['layanan']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="longitude" class="form-label"><i class="fa-solid fa-globe"></i> Longitude</label>
                            <input type="text" class="form-control" name="longitude" value="<?php echo htmlspecialchars($row['longitude']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="latitude" class="form-label"><i class="fa-solid fa-globe"></i> Latitude</label>
                            <input type="text" class="form-control" name="latitude" value="<?php echo htmlspecialchars($row['latitude']); ?>" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-solid fa-floppy-disk"></i> Update
                            </button>
                        </div>
                    </form>
                </div>
                <!-- End Card -->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
