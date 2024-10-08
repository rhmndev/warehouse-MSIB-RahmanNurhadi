<?php
include_once '../config/Database.php';
include_once '../classes/Gudang.php';

$database = new Database();
$db = $database->getConnection();

if (isset($_GET['id'])) {
    $gudang = new Gudang($db);
    $gudang->id = $_GET['id'];

    if ($gudang->delete()) {
        echo "Gudang berhasil dihapus.";
    } else {
        echo "Gagal menghapus gudang.";
    }
}
?>
