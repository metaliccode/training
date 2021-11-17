<?php
require 'config.php';

function registrasi($data)
{
    global $con;
    // stripslashes -> berfungsi untuk mengatasi tidak masuk db kek '/' dll
    $username = strtolower(stripslashes($data["username"]));

    // mysqli_real_escape_string -> agar bisa menuliskan karakter kutif dll
    $password = mysqli_real_escape_string($con, $data["password"]);
    $password2 = mysqli_real_escape_string($con, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($con, "SELECT username FROM users WHERE username = '$username' ");
    if (mysqli_fetch_assoc($result)) {
        echo "
            <script>
                alert('Username sudah terdaftar !');
            </script>
        ";
        // untuk menghentikan insert dijalankan
        return false;
    }

    // cek konfirmasi password
    if ($password != $password2) {
        echo "
            <script>
                alert('Konfirmasi password tidak sesuai');
            </script>
        ";
        // ->untuk return ke mysqli_error
        return false;
    }

    // enkripsi password jangan pake md5 lagi kerena sudah mudah di bobol
    // PASSWORD_DEFAULT akan trs berubah jika ada uodate pengamanan baru dari php
    $password = password_hash($password, PASSWORD_DEFAULT);
    // var_dump($password);
    // die;

    // tambahkan user baru ke database
    mysqli_query(
        $con,
        "INSERT INTO users VALUES
            (NULL, '$username', '$password')"
    );

    return mysqli_affected_rows($con);

    // return 1; -> cek berhasil data dimasukan
}
