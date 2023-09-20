<?php
require 'connect.php';
session_start();
if(!isset($_SESSION['username'])) {
    header("location: index2.php");
}

$datas = query("SELECT * FROM admin")

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/Wikrama-logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="style/admin-page2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://fonts.googleapis.com/css?family=Epilogue' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,300&display=swap" rel="stylesheet">
    <title>GDS Wikrama</title>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-top">
            <img src="img/Ellipse 1.svg" alt="">
            <h1>Admin Wikrama</h1>
            <a href="#services"><img src="img/layouts (1) 1.svg" alt=""> Dashboard</a>
            <a href="#clients"><img src="img/user (1) 1.svg" alt=""> Data Siswa</a>
            <a href="#contact"><img src="img/document 1.svg" alt=""> Data Laporan</a>
            <a href="#add"><img src="img/add-user 1.svg" alt=""> Tambah Siswa</a>
        </div>
        <div class="sidebar-bottom">
        <!-- Tambahkan link logout di bawah ini -->
            <a href="logout.php"><img src="img/logout 1.svg" alt=""> Logout</a>
        </div>
    </div>
    <div class="content">
        <div class="topnav">
            <img src="img/Wikrama.png" alt="">
            <p class="active" href="#home">GDS <span>Wikrama</span></p>
        </div>
        <div class="clearfix"></div>  
        <h1>Data Siswa</h1>
        <hr>    
        <h6><a href="">Tambah Data Siswa</a></h6>
        
        <table class="table" border="1">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Rayon</th>
                <th>NIS</th>
                <th>Rombel</th>
                <th>Aksi</th>
            </tr>
            <?php $i = 1;?>
            <?php foreach($datas as $data): ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $data['nama'];?></td>
                <td><?= $data['rayon'];?></td>
                <td><?= $data['nis'];?></td>
                <td><?= $data['rombel'];?></td>
                <td><a href="#">Edit </a><a href="delete.php?id=<?= $data['id'];?>">Delete</a></td>
            </tr>
            <?php $i++ ?>
            <?php endforeach;?>
        </table>
    </div>
</body>
</html>