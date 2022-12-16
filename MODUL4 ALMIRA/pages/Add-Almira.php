<?php
    include 'connector.php';
    
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    $nama = "Almira_1202200164";

    if(isset($_POST['submit'])){
        $id = $_POST['id_mobil'];
        $namamobil = $_POST['nmobil'];
        $pemilik = $_POST['npemilik'];
        $mobil = $_POST['mmobil'];
        $tgl = $_POST['tanggal'];
        $desc= $_POST['deskripsi'];
        $status= $_POST['status'];
        
        $rand = rand();
        $ekstensi =  array('png','jpg','jpeg','gif');
        $filename = $_FILES['gambar']['name'];
        $ukuran = $_FILES['gambar']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        
        if(!in_array($ext,$ekstensi) ) {
            header("location:Home-Almira.php?alert=gagal-memuat");
        }else{	
            $xx = $rand.'_'.$filename;
            move_uploaded_file($_FILES['gambar']['tmp_name'], '../asset/images/'.$rand.'_'.$filename);
            $postEvent = mysqli_query($connect, "INSERT INTO showroom_almira_table VALUES ('$id_mobil', '$namamobil', '$pemilik', '$mobil', '$tgl', '$desc', '$xx','$status')");
            header("location:ListCar-Almira.php");
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-7mQhpDl5nRA5nY9lr8F1st2NbIly/8WqhjTp+0oFxEA/QUuvlbF6M1KXezGBh3Nb" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
    <title>EAD Rent Car</title>

</head>
<body>
    <nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-primary">
        <a 
            href="Home-Almira.php"
            class="navbar-brand mb-0 h1">
                <img
                class="d-inline-block align-top"
                src="https://drive.google.com/uc?export=view&id=1hqBNDU1Tx1RKd8wzC1bmnhwBr-7YsK23"
                width="150" height="50" />
        </a>
        <button 
        type="button"
        data-bs-toggle="collapse"
        data-bs-rarget="#navbarNav"
        class="navbar-toggler"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle Navigation"
        >
            <Span class="navbar-toggler-icon"></Span>
        </button>
        
        <div 
        class="collapse navbar-collapse" 
        id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a href="Home-Almira.php" class="nav-link">
                    Home
                </a>
            </li>
            <li class="nav-item active">
                <a href="ListCar-Almira" class="nav-link active">
                    MyCar
                </a>
            </li>
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="far fa-user"></i> &nbsp; <?= $nama; ?>
                </a>
                <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item text-primary" href="Profile-Almira.php"><i class="fas fa-user-edit"></i>&nbsp; Profile</a></li>
                    <li><a class="dropdown-item text-primary" href="Logout-Almira.php"><i class="fas fa-sign-out-alt"></i>&nbsp; Logout</a></li>
                </ul>
            </li>
        </ul>
        </div>
    </nav>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <div class="container mt-5 pt-5">
        <div class="card ">
            <h3 class="text-center pt-4 fw-bold">Tambah Mobil</h3>
            <form method="post" action="" enctype="multipart/form-data" style="margin-left:15px;margin-right:15px;margin-bottom:15px">
                <div class="mb-3">
                    <label for="nmobil" class="form-label fw-bold">Nama Mobil</label>
                    <input type="text" class="form-control" id="nmobil" name="nmobil" placeholder="BMW E30">
                </div>
                <div class="mb-3">
                    <label for="npemilik" class="form-label fw-bold">Nama Pemilik</label>
                    <input type="text" class="form-control" id="npemilik" name="npemilik" value="<?= $nama ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="mmobil" class="form-label fw-bold">Merk</label>
                    <input type="text" class="form-control" id="mmobil" name="mmobil" placeholder="BMW">
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label fw-bold">Tanggal Beli</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                <div class="mb-3">
                    <label for="deskripsi" class="form-label fw-bold">Deskripsi</label>
                    <textarea class="form-control" rows="3" cols="30" name="deskripsi" placeholder="Ketikan deskripsi mobil"></textarea>
                </div>
                <div class="mb-3">
                    <label class="fw-bold">Foto</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="gambar" name="gambar">
                    </div>
                    <br>
                <div class="mb-3">
                    <label for="status" class="form-label fw-bold">Status Pembayaran</label>
                    <br>
                    <div class="form-check form-check-inline" style="margin-left:15px">
                        <input class="form-check-input" type="radio" name="status" id="status" value="Lunas">
                        <label class="form-check-label" for="inlineRadio1">Lunas</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status" value="Belum Lunas">
                        <label class="form-check-label" for="inlineRadio2">Belum Lunas</label>
                    </div>
                </div>
                <div>
                    <button class="btn btn-primary" type="submit" name="submit">Selesai</button>
                </div>
            </form>
        </div>
    </div>
</body>