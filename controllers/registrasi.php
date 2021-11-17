<?php
require '../helpers/registrasi.php';

if (isset($_POST["register"])) {

    if (registrasi($_POST) > 0) {
        echo "
            <script>
                alert('user baru berhasil ditambahkan !');
                document.location.href = '../index.php';
            </script>
        ";
    } else {
        echo mysqli_error($con);
    }
}
