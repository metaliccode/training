<!DOCTYPE html>
<html lang="en">

<head>
    <title>Halaman Registrasi</title>
    <style>
        label {
            display: block;
        }
    </style>
</head>

<body>
    <form action="../../controllers/registrasi.php" method="post">
        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <label for="password2">Konfirmasi Password :</label>
                <input type="password" name="password2" id="password2">
            </li>
            <li>
                <button type="submit" name="register">Register!</button>
            </li>
        </ul>
    </form>
</body>

</html>