<?php
require "connect.php";
    if (hapus()) {
        header("location: admin-dashboard.php");
    }else{
        echo "gagal";
    }
?>