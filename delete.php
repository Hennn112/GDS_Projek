<?php
require "connect.php";
    if (hapus()) {
        header("location: admin-datasiswa.php");
    }else{
        echo "gagal";
    }
?>