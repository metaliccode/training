<?php
// session_start();
// if (!isset($_SESSION["login"])) {
//     header("Location: login.php");
//     exit;
// }

require '../helpers/functions.php';
$id = $_GET["id"];
// var_dump($id);
if (hapus($id) > 0) {
    echo "
    <script>
        alert('Data berhasil dihapus');
        document.location.href = '../index.php';
    </script>
";
} else {
    echo "
    <script>
        alert('Data GAGAL dihapus');
        document.location.href = '../index.php';
    </script>
    ";
}
