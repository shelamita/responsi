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

// Cek jika ada parameter 'id' dan 'tabel' yang diterima
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
} else {
    echo "<div class='alert alert-warning'>ID tidak ditemukan!</div>";
    exit;
}

// Fungsi untuk menghapus data berdasarkan tabel
function hapusData($conn, $id, $tabel) {
    $sql = "DELETE FROM $tabel WHERE ID = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: database.php?tabel=$tabel");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}

// Cek jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tabel = $_POST['tabel'];
    hapusData($conn, $id, $tabel);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container mt-4">
        <h3>Hapus Data</h3>
        <p>Silakan pilih data yang akan dihapus.</p>

        <!-- Form untuk memilih tabel dan menghapus data -->
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            
            <!-- Pilihan Tabel -->
            <div class="mb-3">
                <label for="tabel" class="form-label">Pilih Tabel:</label>
                <select class="form-select" name="tabel" required>
                    <option value="rumahsakit">Rumah Sakit</option>
                    <option value="puskesmas">Puskesmas</option>
                </select>
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-danger">Hapus Data</button>
        </form>
    </div>
</body>

</html>
