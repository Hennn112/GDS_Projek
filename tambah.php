<?php
    require 'controller.php';
   
    if( isset($_POST["submit"])){
        if(tambah($_POST) > 0 ){
            echo "
                <script>
                    alert('Data Anda berhasil dimasukkan');
                    document.location.href = 'tampil_data.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Data Anda gagal dimasukan');
                    document.location.href = 'tampil_data.php';
                </script>
            ";
        }
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Input Data Siswa</title>
    <style>
      body {
            background-image: url('img/wppp.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .topnav {
            padding: 1.5% 2% 0 2% ;
            overflow: hidden;
        }
        
        /* Style the links inside the navigation bar */
        .topnav p {
            float: left;
            color: #000;
            text-align: center;
            text-decoration: none;
            font-size: 17px;
            font-style: bold;
            margin-top: 10px;
            font-weight: bold;
        }

        .topnav img {
            float: left;
            width: 50px;
            max-width: 100%;
        }

        span{
            color: #0D1282;
        }
        

            .h3{
                text-align : center;
                font-weight: bold;
                
            }
            
            .form-label{
                font-weight: bold;
            }

    </style>
</head>
<body>
<div class="topnav">
        <img src="img/wikrama.png" alt="">
        <p class="active" href="#home">GDS <span>Wikrama</span></p>
    </div>
    <ul>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="position-absolute top-50 start-50 translate-middle">
                <div class="d-flex justify-content-center">
                    <div class="card" style="width: 30rem; background-color: #454CF0;">
                        <div class ="card-body">
                            <div class="h3">
                                <h3>Laporkan Siswa</h3>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Pelapor :</label>
                                <input type="text" class="form-control"  name="nama_pelapor" autocomplete='off'>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Siswa :</label>
                                <input type="text" class="form-control"  name="nama_siswa" autocomplete='off'>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Deskripsi Laporan :</label>
                                <input type="text" class="form-control"  name="isi_laporan" autocomplete='off'>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Gambar :</label>
                                <input type="file" class="form-control"  name="gambar" >
                            </div>
                        </div>
                        <div class ="card-footer">
                            <button type="submit" name="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </ul>
</body>
</html>