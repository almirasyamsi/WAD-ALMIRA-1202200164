<?php
     include 'connector.php';

     $id_mobil = $_GET['id_mobil'];

     $query = "DELETE FROM showroom_almira_table WHERE id_mobil='$id_mobil'";

     $deleteQuery = mysqli_query($connect, $query);

     header('location:ListCar-Almira.php');
?>