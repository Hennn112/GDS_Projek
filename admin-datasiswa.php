    
<?php
require 'connect.php';
$datas = query("SELECT * FROM admin");

session_start();
if(!isset($_SESSION['username'])) {
    header("location: index.php");
}
if (isset($_POST['submit'])) {
    if (add() > 0 ) {
        header("location:admin-datasiswa.php");
    }else{
        echo "<script> alert('Data Gagal ditambahkan');
        document.location.href = 'admin-dashboard.php';
        </script>"; 
    }
}

if (isset($_POST['cari'])) {
    $datas = cari($_POST['keyword']);
}

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

                <td><a 
                        class="button"
                        style="cursor: pointer;"
                        onclick="handleEdit('<?= implode(',', $data)?>')"> 
                        Edit
                    </a> 
                    <a href="delete.php?id=<?= $data['id'];?>">Delete</a></td>

            </tr>
            <?php $i++ ?>
            <?php endforeach;?>
        </table>
    </div>

    <div id="id01" class="modal">
        <form class="modal-content" action="" method="post">
            <div class="container">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required autocomplete="off"><br><br>

                <label for="rayon">Rayon:</label>
                <input type="text" id="rayon" name="rayon" required autocomplete="off"><br><br>

                <label for="nis">NIS:</label>
                <input type="text" id="nis" name="nis" required autocomplete="off"><br><br>

                <label for="rombel">Rombel:</label>
                <input type="text" id="rombel" name="rombel" required autocomplete="off"><br><br>

                <button type="submit" name="submit">Tambah</button>

                <div class="container">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                </div>

                </div>
            </form>
        </div>
        <div id="id02" class="modal">
            <form class="modal-content" action="update.php" method="post">
                <div class="container">
                    <input type="hidden" name="id" id="id">

                    <label for="nama">Nama : </label>
                    <input type="text" id="nama" name="nama" value="<?= $data["nama"]; ?>">

                    <label for="rayon">Rayon : </label>
                    <input type="text" id="rayon" name="rayon" value="<?= $data["rayon"]; ?>">

                    <label for="nis">Nis : </label>
                    <input type="text" id="nis" name="nis" value="<?= $data["nis"]; ?>">

                    <label for="Rombel">Rombel : </label>
                    <input type="text" id="rombel" name="rombel" value="<?= $data["rombel"]; ?>">

                    <button type="submit" name="submit">Update</button>

                    <div class="container">
                        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                    </div>
                </div>
            </form>
        </div>


<script>
    // Get the modal
    var modal           = document.getElementById('id01');
    var modalUpdate     = document.getElementById('id02');
    
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    const handleEdit = function(value){    
        // string to array
        const data = value.split(',');
        
        // Show Modal Update
        modalUpdate.style.display = "block";

        // SET DATA FOR UPDATE
        var id      =document.getElementById('id');
        var nama    =document.getElementById('nama');
        var rayon   =document.getElementById('rayon');
        var nis     =document.getElementById('nis');
        var rombel  =document.getElementById('rombel');
        
        id.value      = data[0]; // SET id
        nama.value    = data[1]; // SET nama
        rayon.value   = data[2]; // SET rayon
        nis.value     = data[3]; // SET nis
        rombel.value  = data[4]; // SET rombel
    };
</script>

</body>
</html>