<?php
include_once '../config/Database.php';
include_once '../classes/Gudang.php';

$database = new Database();
$db = $database->getConnection();

$gudang = new Gudang($db);

if (isset($_GET['id'])) {
    $gudang->id = $_GET['id'];
    $stmt = $gudang->read();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_POST) {
    $gudang->id = $_POST['id'];
    $gudang->name = $_POST['name'];
    $gudang->location = $_POST['location'];
    $gudang->capacity = $_POST['capacity'];
    $gudang->status = $_POST['status'];
    $gudang->opening_hour = $_POST['opening_hour'];
    $gudang->closing_hour = $_POST['closing_hour'];

    if ($gudang->update()) {
        echo "Gudang berhasil diperbarui.";
    } else {
        echo "Gagal memperbarui gudang.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Gudang</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Update Gudang</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm p-4">
                    <form method="post">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Gudang</label>
                            <input type="text" id="name" name="name" class="form-control" value="<?php echo $row['name']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="location" class="form-label">Lokasi</label>
                            <input type="text" id="location" name="location" class="form-control" value="<?php echo $row['location']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="capacity" class="form-label">Kapasitas</label>
                            <input type="number" id="capacity" name="capacity" class="form-control" value="<?php echo $row['capacity']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" name="status" class="form-select">
                                <option value="aktif" <?php echo ($row['status'] == 'aktif') ? 'selected' : ''; ?>>Aktif</option>
                                <option value="tidak_aktif" <?php echo ($row['status'] == 'tidak_aktif') ? 'selected' : ''; ?>>Tidak Aktif</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="opening_hour" class="form-label">Jam Buka</label>
                            <input type="time" id="opening_hour" name="opening_hour" class="form-control" value="<?php echo $row['opening_hour']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="closing_hour" class="form-label">Jam Tutup</label>
                            <input type="time" id="closing_hour" name="closing_hour" class="form-control" value="<?php echo $row['closing_hour']; ?>" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

