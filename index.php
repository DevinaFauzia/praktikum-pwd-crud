<?php
require_once 'model/Musik.php';
$musik = new Musik();
$data = $musik->getAllMusik();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Musik</title>
</head>
<link rel="stylesheet" href="style.css">
<body>
    <h3>Tambahkan lagu favoritmu</h3>
    <a href="admin/page/form-lagu.php">+ Tambah Lagu</a>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Penyanyi</th>
            <th>Thn Rilis</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        foreach ($data as $row) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . $row['judul'] . "</td>";
            echo "<td>" . $row['penyanyi'] . "</td>";
            echo "<td>" . $row['rilis'] . "</td>";
            echo "<td>
                    <a href='admin/page/edit.php?id=" . $row['id'] . "'>Edit</a> | 
                    <a href='admin/page/simpan.php?hapus=" . $row['id'] . "' onclick=\"return confirm('Hapus?')\">Hapus</a>
                  </td>";
            echo "</tr>";
        }
        ?>

    </table>
</body>
</html>
