<?php
require "function.php";
    if (hapus() > 0) {
        header("location: admin-datasiswa.php");
    }else{
        echo "<script>alert('Data gagal dihapus!');
        document.location.href = 'admin-datasiswa.php';
        </script>";
    }
?>