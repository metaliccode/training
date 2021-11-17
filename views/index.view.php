<?php
// require 'helpers/functions.php';
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>

<head>
    <title>Training</title>
</head>

<body>
    <a href="logout.php">Logout</a>
    <h1>Daftar Pegawai</h1>
    <div><a href="views/tambah.view.php">Tambah Data Pegawai</a></div>

    <?php
    $pegawai = query("SELECT * FROM pegawai");
    ?>
    <br>
    <table border="1" cellspacing="0" cellpadding="5">
        <tr>
            <th>No.</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Divisi</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1;
        foreach ($pegawai as $row) :
        ?>
            <tr>
                <td><?= $i; ?></td>
                <td><img src="assets/img/<?= $row["gambar"]; ?>" width="50"></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["divisi"]; ?></td>
                <td><?= $row["alamat"]; ?></td>
                <td>
                    <a href="views/ubah.view.php?id=<?= $row["id"]; ?>">Ubah</a>
                    <a href="controllers/hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin?');">Hapus</a>
                </td>
            </tr>
        <?php $i++;
        endforeach; ?>
    </table>
</body>

</html>