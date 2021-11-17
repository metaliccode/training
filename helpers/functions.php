<?php
require 'config.php';

function query($query)
{
    global $con;

    $result = mysqli_query($con, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $con;
    //anti script hacker
    $nama = htmlspecialchars($data["nama"]);
    $divisi = htmlspecialchars($data["divisi"]);
    $alamat = htmlspecialchars($data["alamat"]);

    // untuk upload file 
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    // query insertdata
    $query = "INSERT INTO pegawai VALUES(
        NULL, '$nama', '$divisi', '$alamat','$gambar'
    )";
    mysqli_query($con, $query);

    // cek apakah data berhasil di tambahkan atau tidak
    // if (mysqli_affected_rows($con) > 0) {
    //     echo "berhasil";
    //     var_dump(mysqli_affected_rows($con));
    // } else {
    //     echo "gagal";
    //     var_dump(mysqli_affected_rows($con));
    // }
    return mysqli_affected_rows($con);
}


function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload
    if ($error === 4) {
        echo "<script>
            alert ('Pilih gambar terlebih dahulu ! ');
            </script>
       ";
        return false;
    }

    // cek file yang boleh di upload 
    $ekstensiValid = ['jpeg', 'jpg', 'png'];
    // kegunaan fungsi explode (,) -> untuk merubah gambar menjadi string
    // jika paek delimiter -> ihsan.jpg = ['ihsan', 'jpg']
    $ekstensiGambar = explode('.', $namaFile);
    // untuk mengambil end () ekstensi string terakhir .
    // strtolower () berfungsi untuk merubah semuah string menjadi huruf kecil
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    // in_array () -> untuk cek apkh string ada dalam array
    if (!in_array($ekstensiGambar, $ekstensiValid)) {
        echo "<script>
        alert ('Yang anda upload bukan gambar !');
        </script>
   ";
        return false;
    }

    // cek ukuran jika terlalu besar -> dalam byte
    if ($ukuranFile > 1000000) {
        echo "<script>
        alert ('Ukuran gambar terlalu besar !');
        </script>
            ";
        return false;
    }

    // fungsi untuk memindahkan gambar dari dir sementara
    // generate nama baru -> supaya tidak bentrok dgn nama yang sama 
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    // pindahkan ke dir assets/img
    move_uploaded_file($tmpName, '../assets/img/' . $namaFileBaru);
    return $namaFileBaru;
}

function hapus($id)
{
    global $con;
    mysqli_query($con, "DELETE FROM pegawai WHERE id = $id");
    //cek database;
    return mysqli_affected_rows($con);
}

function ubah($data)
{
    global $con;
    $id = htmlspecialchars($data["id"]);

    $nama = htmlspecialchars($data["nama"]);
    $divisi = htmlspecialchars($data["divisi"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $gambarlama = $data["gambarlama"];

    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 0) {
        $gambar = upload();
    } else {
        $gambar = $gambarlama;
    }

    $query = "UPDATE pegawai SET 
         nama = '$nama', 
         divisi = '$divisi', 
         alamat = '$alamat',
         gambar =  '$gambar'
         WHERE id=$id
    ";
    mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}
