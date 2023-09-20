<?php
require "connect.php";

session_start();
if (isset($_SESSION['username'])) {
    header("location: admin-datasiswa.php");
}elseif (!isset($_SESSION['username'])) {
    header("location: index2.php");
}
if (isset($_POST['submit'])) {
    if (add()) {
        header("location:admin-datasiswa.php");
    }else{
        echo "<script> alert('Data Gagal ditambahkan');
        document.location.href = 'admin-dashboard.php';
        </script>"; 
    }
}