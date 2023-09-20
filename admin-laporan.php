<?php
require 'connect.php';
session_start();
if (!isset($_SESSION['username'])) {
    header("location: index2.php");
}
$datas = query("SELECT * FROM data_laporan");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/Wikrama-logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="style/admin-page.css">
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
            <a href="admin-dashboard.php"><img src="img/layouts (1) 1.svg" alt=""> Dashboard</a>
            <a href="admin-datasiswa.php"><img src="img/user (1) 1.svg" alt=""> Data Siswa</a>
            <a href="admin-laporan.php"><img src="img/document 1.svg" alt=""> Data Laporan</a>
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
        <h1>Data Laporan</h1>
        <hr>
        <table class="table" border="1">
            <tr>
                <th>No</th>
                <th>Nama Pelapor</th>
                <th>Nama Siswa</th>
                <th>Isi Laporan</th>
                <th>Gambar</th>
            </tr>
            <?php $i = 1?>
            <?php foreach($datas as $data):?>
            <tr>
                <td><?= $i?></td>
                <td><?= $data['pelapor']?></td>
                <td><?= $data['siswa']?></td>
                <td><?= $data['laporan']?></td>
                <td><img src="<?= $data['gambar']?>" alt=""></td>
            </tr>
            <?php $i++;?>
            <?php endforeach;?>
        </table>
    </div>
    
</body>
</html>