<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Register</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="stylesheet" href="style.css"/>
</head>
<body>

    <?php

        // Disaat pengguna klik submit, maka insert ke database
        if (isset($_POST['submit'])) 
        {
            $namapengguna = mysqli_real_escape_string($con, stripslashes($_POST['username']));
            $email = mysqli_real_escape_string($con, stripslashes($_POST['email']));
            $sandi = mysqli_real_escape_string($con, stripslashes($_POST['password']));
            $sandi = password_hash($sandi, PASSWORD_BCRYPT);

            $result   = mysqli_query($con, "INSERT into `users` (nama_pengguna, kata_sandi, email)
            VALUES ('$namapengguna', '$sandi', '$email')");

            if ($result) 
            {
                echo "<div class='form'>
                        <h3>Anda berhasil mendaftar.</h3><br/>
                        <p class='link'>Sekarang Anda bisa masuk ke akun, <a href='login.php'>masuk Sekarang</a>.</p>
                      </div>";
            }
            else 
            {
                echo "<div class='form'>
                        <h3>Tidak dapat membuat akun.</h3><br/>
                        <p class='link'>Silahkan klik <a href='register.php'>daftar</a> lagi.</p>
                      </div>";
            }
        } 
        else { ?>

        <form class="form" method="post">
            <h2 class="login-title">Pendaftaran</h2>
            <input type="text" class="login-input" name="username" placeholder="Nama Pengguna" required /><br/>
            <input type="text" class="login-input" name="email" placeholder="Alamat Email"><br/>
            <input type="password" class="login-input" name="password" placeholder="Kata Sandi"><br/>
            <input type="submit" name="submit" value="Daftar" class="login-button"><br/><br/>

            <p class="link">Apakah sudah memiliki akun? <a href="login.php">Masuk sekarang</a>.</p>
        </form>
        
        <?php } ?>

    </body>
</html>