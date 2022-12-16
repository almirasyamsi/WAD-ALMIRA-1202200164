<?php
session_unset();
session_start();
session_destroy();

setcookie('id', '',time()-3600);
setcookie('key', '',time()-3600);

if (isset($_SESSION["login"])) {
    header("Location: Login-Almira.php");
    exit;
}
?>