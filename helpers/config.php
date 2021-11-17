<?php
// koneklsi ke database 
// $con = mysqli_connect(
//     "localhost",
//     "root",
//     "",
//     "db_pegawai"
// );

$con = mysqli_connect("localhost", "root", "") or die("Koneksi ke Database Gagal");
mysqli_select_db($con, "dbpegawai") or die("Database Salah!");
