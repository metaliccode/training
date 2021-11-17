<?php

require "../helpers/functions.php";

$id = $_GET["id"];
$pegawai = query("SELECT * FROM pegawai WHERE id=$id")[0];
// var_dump($pegawai);
// die;
// var_dump($mhs[0]["nama"]);  -> hasilnya array numeric karena punya  $rows [0]
// var_dump($mhs["nama"]);
?>
<!DOCTYPE html>

<head>
    <title>Ubah Pegawai</title>
</head>

<body>
    <h1>Ubah Pegawai</h1>
    <ul>
        <form action="../controllers/ubah.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $pegawai["id"]; ?>">
            <input type="hidden" name="gambarlama" value="<?= $pegawai["gambar"]; ?>">
            <li>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" value="<?= $pegawai["nama"]; ?>" required>
            </li>
            <li>
                <label for="divisi">divisi</label>
                <input type="text" name="divisi" id="divisi" value="<?= $pegawai["divisi"]; ?>" required>
            </li>
            <li>
                <label for="alamat">alamat</label>
                <input type="text" name="alamat" id="alamat" value="<?= $pegawai["alamat"]; ?>" required>
            </li>
            <li>
                <label for="gambar">Gambar</label>
                <br>
                <img src="../assets/img/<?= $pegawai["gambar"]; ?>" width="60" height="60">
                <br>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <br>
                <button name="submit">Ubah Data!</button>
            </li>
        </form>

    </ul>
</body>

</html>