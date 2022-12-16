    <?php
    session_start();
    require 'Function-Almira.php';

    //cek ada cookie?
    if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
        $id = $_COOKIE['id'];
        $key = $_COOKIE['key'];

        // ambil username berdasarkan id
        $result = mysqli_query($conn,"SELECT email FROM users WHERE id = '$id'");
        $row = mysqli_fetch_assoc($result);

        // cek cookie dan username
        if ($key === hash('sha256', $row['email'])) {
            $_SESSION['logon'] = true;
        }

    }


    if (isset($_SESSION["login"])) {
        header("Location: Login-Almira.php");
        exit;
    }


    if (isset ($_POST["login"])) {

        $email = $_POST["email"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

        // cek username
        if (mysqli_num_rows($result) === 1) {


            // cek password
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row["password"]) ){
                // set session
                $_SESSION["login"] = true;
                $_SESSION["id"]=$row["id"];

                //cek remember me
                if (isset($_POST["remember"])) {
                    // Buat COOKIE

                    setcookie('id', $row['id'], time()+3600);
                    setcookie('key', hash('sha256',$row['email']), time()+3600);
                }


                echo "
                <script>
                    alert('Anda Berhasil Login');
                    document.location.href='Home-Almira.php';
                </script>
                ";
                exit;
            }

        }

        $error = true;
        if (isset($error)) {
            echo "<script>
                    alert('username atau password salah'); 
                </script>";
       }

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

        <title>Login</title>
      </head>
      <body>
      <!-- Card Login -->
      <div class="d-flex justify-content-between align-items-center" style="height: 100vh;">
        <div class="img" style="margin-left:0px;">
        <img src="https://cdn-webcartop.com/wp-content/uploads/2021/04/webcartop_X5_1-680x453.jpg" style="transform: scaleX(-1);width: 1200px; height: 970px;" alt="">
        </div>
                <div class="col-5 ">
                       <div class="card  " style="margin-top:50px; width: rem; height:64rem; ">
                        <div class="card-body p-4">
                                <h2 class="card-title text-left">Login</h2>
                                <hr>
                                <form method="POST" action="">
                                    <label for="email"> <b>Email</b></label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="">
                                    <br>
                                    <label for="password"> <b>Kata Sandi</b></label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="">
                                    <br>
                                    <input type="checkbox" name="remember" id="remember">                
                                    <label for="remember">Remember Me </label>
                                    <br><br>
                                    <left><button type="submit" name="login" class="btn btn-primary" style="width: 140px;">Login</button></left>
                                    <br>
                                    <p class="text-left">Anda belum punya akun? <a href="Register-Almira.php">Register</a></p>
                                </form>       
                        </div>
                    </div> 
                </div>
            </div>`
        </div>
      <!-- End Card Login  -->




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


      </body>
    </html>
