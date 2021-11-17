<!DOCTYPE html>

<head>
    <title>Document</title>
</head>

<body>
    <h1>Tambah Pegawai </h1>
    <ul>
        <form action="../controllers/tambah.php" method="POST" enctype="multipart/form-data">
            <li>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="divisi">Divisi</label>
                <input type="text" name="divisi" id="divisi" required>
            </li>
            <li>
                <Label for="alamat">Alamat</Label>
                <textarea type="text" name="alamat" rows="3" required></textarea>
            </li>
            <li>
                <label for="gambar">Gambar</label>
                <input type="file" name="gambar" id="gambar">
            </li>
            <button name="submit" style="margin-top: 20px;">Submits</button>
        </form>
    </ul>
</body>

</html>