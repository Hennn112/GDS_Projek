<?php
require "connect.php";
session_start();
if (isset($_SESSION['username'])) {
    header("location: admin-datasiswa.php");
}elseif (!isset($_SESSION['username'])) {
    header("location: index.php");
}
if (isset($_POST['submit'])){
    $username = $_POST['uname'];
    $password = $_POST['psw'];

    if (login($username, $password)) {
        header("Location: admin-datasiswa.php");
    } elseif(login($username,$password) == 0) {
        echo "<script> alert('Input Again Password and Username');
        document.location.href = 'index.php';
        </script>";
        die;
    }
}
?>