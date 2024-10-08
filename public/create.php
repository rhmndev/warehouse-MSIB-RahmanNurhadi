<?php
include_once '../config/Database.php';
include_once '../classes/Gudang.php';

$database = new Database();
$db = $database->getConnection();

if ($_POST) {
    $gudang = new Gudang($db);

    $gudang->name = $_POST['name'];
    $gudang->location = $_POST['location'];
    $gudang->capacity = $_POST['capacity'];
    $gudang->status = $_POST['status'];
    $gudang->opening_hour = $_POST['opening_hour'];
    $gudang->closing_hour = $_POST['closing_hour'];

    if ($gudang->create()) {
        echo "Gudang berhasil ditambahkan.";
    } else {
        echo "Gagal menambahkan gudang.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Gudang</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="text-center">Tambah Gudang</h1>
    <form method="post" class="mt-4">
        <div class="mb-3">
            <label for="name" class="form-label">Nama Gudang</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan nama gudang" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Lokasi</label>
            <input type="text" id="location" name="location" class="form-control" placeholder="Masukkan lokasi gudang" required>
        </div>
        <div class="mb-3">
            <label for="capacity" class="form-label">Kapasitas</label>
            <input type="number" id="capacity" name="capacity" class="form-control" placeholder="Masukkan kapasitas" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select id="status" name="status" class="form-select">
                <option value="aktif">Aktif</option>
                <option value="tidak_aktif">Tidak Aktif</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="opening_hour" class="form-label">Jam Buka</label>
            <input type="time" id="opening_hour" name="opening_hour" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="closing_hour" class="form-label">Jam Tutup</label>
            <input type="time" id="closing_hour" name="closing_hour" class="form-control" required>
        </div>
        <input type="submit" value="Simpan" class="btn btn-primary">
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

