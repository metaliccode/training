<?php
require '../helpers/functions.php';
//jika tombol di tekan
if (isset($_POST["submit"])) {
    // var_dump($_POST);
    // var_dump($_FILES);
    // die;
    if (tambah($_POST) > 0) {
        // echo "berhasil";
        echo "
            <script>
                alert('Data berhasil ditambahkan');
                document.location.href = '../index.php';
            </script>
        ";
    } else {
        echo "
        <script>
            alert('Data GAGAL ditambahkan');
            document.location.href = '../index.php';
        </script>
        ";
        // echo "gagal";
    }
}
