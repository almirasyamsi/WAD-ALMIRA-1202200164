<?php
require 'Function-Almira.php';

if (isset($_POST["daftar"])){
    
    if(registrasi($_POST)>0){
        echo "<script>
                alert('akun berhasil di daftarkan!'); 
            </script>";
    }else
    echo mysqli_error($conn);
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <title>Register</title>
  </head>
  <body>

    <!-- Card Login -->
    <<div class="d-flex justify-content-between align-items-center" style="height: 100vh;">
    <div class="img" style="margin-left:0px;">
        <img src="https://cdn-webcartop.com/wp-content/uploads/2021/04/webcartop_X5_1-680x453.jpg" style="transform: scaleX(-1);width: 1200px; height: 970px;" alt="">
    </div>
            <div class="col-5 ">
                   <div class="card  " style="margin-top:50px; width: rem; height:64rem; ">
                    <div class="card-body p-6">
                            <h2 style="padding-bottom:20px;">Register</h2>
                            <hr>
                            <form method="POST" action="">
                                <label for="email"> <b>Email</b></label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="" required>
                                <br>
                                <label for="nama"> <b>Nama</b></label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="" required>
                                <br>
                                <label for="no_hp"> <b>Nomor Handphone</b></label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="" required>
                                <br>
                                <label for="password"> <b>Kata Sandi</b></label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="" required>
                                <br>
                                <label for="password2"> <b>Konfirmasi Kata Sandi</b></label>
                                <input type="password" class="form-control" id="password2" name="password2" placeholder="" required>
                                <br>
                                <left><button type="submit" name="daftar" class="btn btn-primary" style="width: 140px;">Daftar</button></le>
                                <br>
                                <br>
                                <p class="text-left">Anda sudah punya akun? <a href="Login-Almira.php">Login</a></p>
                            </form>       
                    </div>
                </div> 
            </div>
        </div>
    </div>
  <!-- End Card Login  -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>