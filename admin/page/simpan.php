<?php
require_once '../../model/Musik.php';
$musik = new Musik();

if (isset($_POST['simpan'])) {
    $data = [
        'judul' => $_POST['judul'],
        'penyanyi' => $_POST['penyanyi'],
        'rilis' => $_POST['rilis']
    ];
    $musik->simpan($data);
} elseif (isset($_POST['update'])) {
    $data = [
        'judul' => $_POST['judul'],
        'penyanyi' => $_POST['penyanyi'],
        'rilis' => $_POST['rilis']
    ];
    $musik->update($data, $_POST['id']);
} elseif (isset($_GET['hapus'])) {
    $musik->hapus($_GET['hapus']);
}

header("Location: ../../index.php");
exit;
