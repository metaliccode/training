<?php
require '../helpers/functions.php';
//jika tombol di tekan
if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) {
        // echo "berhasil";
        echo "
            <script>
                alert('Data berhasil diubah');
                document.location.href = '../index.php';
            </script>
        ";
    } else {
        echo "
        <script>
            alert('Data GAGAL diubah');
            document.location.href = '.../index.php';
        </script>
    ";
    }
}
