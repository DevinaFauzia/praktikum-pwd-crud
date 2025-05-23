<?php 
require_once '../../model/Musik.php';
$musik = new Musik();
$id = isset($_GET['id']) ? $_GET['id'] : null;
$row = $id ? $musik->getMusikById($id) : null;
$isEdit = $row !== null;
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $isEdit ? 'Edit Lagu' : 'Tambah Lagu' ?></title>
    <style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background: linear-gradient(to right, #fff0f5, #ffe6f0, #fff4fa);
        margin: 0;
        padding: 20px;
        color: #663344;
    }

    .form-container {
        max-width: 400px;
        margin: 50px auto;
        background: #fff0f5;
        padding: 30px 40px;
        border-radius: 20px;
        box-shadow: 0 6px 18px rgba(204, 51, 102, 0.15);
        border: 2px solid #ff99cc;
    }

    form h3 {
        text-align: center;
        color: #d16ba5;
        margin-bottom: 20px;
        font-weight: 600;
    }

    label {
        display: block;
        margin-top: 15px;
        color: #b35982;
        font-weight: 500;
    }

    input[type="text"],
    input[type="number"] {
        width: 100%;
        padding: 10px 12px;
        margin-top: 5px;
        border: 1px solid #f0cce5;
        border-radius: 10px;
        background: #ffe6f2;
        font-size: 14px;
    }

    input:focus {
        outline: none;
        border-color: #d16ba5;
        background: #fff0f5;
    }

    button {
        margin-top: 20px;
        width: 100%;
        padding: 12px;
        background: #ff66a3;
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        font-weight: bold;
        transition: background 0.3s ease;
    }

    button:hover {
        background: #d1477a;
    }
    </style>

</head>
<body>
    <div class="form-container">
        <form method="POST" action="simpan.php">
            <?php if ($isEdit): ?>
                <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>">
            <?php endif; ?>

            <h3><?= $isEdit ? 'Edit Lagu' : 'Tambah Lagu' ?></h3>

            <label>Judul</label>
            <input type="text" name="judul" value="<?= $isEdit ? htmlspecialchars($row['judul']) : '' ?>" required>

            <label>Penyanyi</label>
            <input type="text" name="penyanyi" value="<?= $isEdit ? htmlspecialchars($row['penyanyi']) : '' ?>" required>

            <label>Rilis</label>
            <input type="number" name="rilis" value="<?= $isEdit ? htmlspecialchars($row['rilis']) : '' ?>" required>

            <button type="submit" name="<?= $isEdit ? 'update' : 'simpan' ?>">
                <?= $isEdit ? 'Update' : 'Simpan' ?>
            </button>
        </form>
    </div>
</body>
</html>


