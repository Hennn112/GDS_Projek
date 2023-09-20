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
        <h1>Data Siswa</h1>
        <hr>    
        <h6><a class="button" onclick="document.getElementById('id01').style.display='block'">Tambah Data Siswa</a></h6>
      
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
    <div id="id01" class="modal">
        <form class="modal-content" action="create.php" method="post">
            <div class="container">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required><br><br>

            <label for="rayon">Rayon:</label>
            <input type="text" id="rayon" name="rayon" required><br><br>

            <label for="nis">NIS:</label>
            <input type="text" id="nis" name="nis" required><br><br>

            <label for="rombel">Rombel:</label>
            <input type="text" id="rombel" name="rombel" required><br><br>

            <button type="submit" name="submit">Tambah</button>

            <div class="container">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
            </div>
            </div>
        </form>

<script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }
</script>

</body>
</html>