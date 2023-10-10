<?php
    require 'connect.php';
    require 'controller.php';
   
    if( isset($_POST["submit"])){
        if(tambah($_POST) > 0 ){
            echo "
                <script>
                    alert('Data Anda berhasil dimasukkan');
                    document.location.href = 'tambah.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Data Anda gagal dimasukan');
                    document.location.href = 'tambah.php';
                </script>
            ";
        }
    }
$datas = query("SELECT * FROM `admin`");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Input Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
      body {
            /* background-image: url('img/wppp.png'); */
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
        
        /* Input Field CSS */
        .datainput {
          position: relative;
          margin: 5px 0 20px;
        }
.datainput p {
  font-size: 12px;
  background: #eee;
  display: inline-block;
  padding: 5px 15px;
  border-radius: 0.5rem;
}
.whatsapp-form textarea {
  min-height: 120px;
}
.datainput select, .datainput select option {
  padding: 12px 0;
  color: #555;
  font-size: 14px;
  width: 100%;
  border: none;
  border-bottom: 1px solid #ddd;
  outline: none;
  background: #fff;
}
.datainput input,
.datainput textarea {
  font-size: 15px;
  padding: 15px 0;
  display: block;
  width: 100%;
  border: none;
  border-bottom: 1px solid #ddd;
}
.datainput input:focus,
.datainput textarea:focus {
  outline: none;
}
.datainput label {
  color: #999;
  font-size: 14px;
  font-weight: 400;
  position: absolute;
  pointer-events: none;
  left: 0;
  top: 18px;
  transition: 0.2s ease all;
}
.datainput input:focus ~ label,
.datainput input:valid ~ label,
.datainput textarea:focus ~ label,
.datainput textarea:valid ~ label {
  top: -10px;
  font-size: 14px;
  color: #21a51f;
}
#notif-license span {
  font-size: 40px;
}
#notif-license {
  display: none;
  position: fixed;
}
.bar {
  position: relative;
  display: block;
  width: 100%;
}
.bar:before,
.bar:after {
  content: "";
  height: 2px;
  width: 0;
  bottom: 1px;
  position: absolute;
  background: #0D1282;
  transition: 0.2s ease all;
}
.bar:before {
  left: 50%;
}
.bar:after {
  right: 50%;
}
.datainput input:focus ~ .bar:before,
.datainput input:focus ~ .bar:after,
.datainput textarea:focus ~ .bar:before,
.datainput textarea:focus ~ .bar:after {
  width: 50%;
}
.indigox {
  background: #3f51b5;
}
.orangex {
  background: #ff9800;
}
.pinkx {
  background: #e91e63;
}
.bluex {
  background: #2196f3;
}
.purplex {
  background: #9c27b0;
}
.redx {
  background: #f44336;
}
.greenx {
  background: #4caf50;
}
.highlight {
  position: absolute;
  height: 50%;
  width: 100px;
  top: 25%;
  left: 0;
  pointer-events: none;
  opacity: 0.5;
}
.datainput input:focus ~ .highlight,
.datainput textarea:focus ~ .highlight {
  animation: inputHighlighter 0.3s ease;
}
.datainput input:focus ~ label,
.datainput input:valid ~ label,
.datainput textarea:focus ~ label,
.datainput textarea:valid ~ label {
  top: -10px;
  font-size: 13px;
  color: #0D1282;
}

/* Default Whatsapp Form CSS by www.idblanter.com */
form.whatsapp-form {
  box-shadow: 0 1px 6px rgba(32, 33, 36, 0.28);
  border-radius: 0.5rem;
  padding: 20px;
  box-sizing: border-box;
  color: #444;
  font-size: 14px;
  line-height: 1.5;
}
.whatsapp-form button.send_form {
  border: none;
  color: #fff;
  background: #0D1282;
  text-decoration: none;
  display: inline-block;
  padding: 10px 25px;
  border-radius: 0.3rem;
  font-weight: 700;
  letter-spacing: 0.5px;
  font-size: 15px;
} 
.whatsapp-form {
  width: 100%;
  max-width: 700px;
  margin: 0 auto;
  box-sizing: border-box;
}

</style>
</head>
<body>
  <div class="topnav">
    <img src="img/wikrama.png" alt="">
    <p class="active" href="#home">GDS <span>Wikrama</span></p>
  </div>
  
  <form class="whatsapp-form" method="post">
    <div class="datainput">
      <input class="validate" name="nama_pelapor" required="" type="text" value='' autocomplete="off"/>
      <span class="highlight"></span><span class="bar"></span>
      <label>Your Name</label>
    </div>
    <div class="datainput">
      <span class="highlight"></span><span class="bar">Pilih Siswa</span>
      <select id="wa_select" name="nama_siswa" class="select" >
        <?php foreach ($datas as $key => $data):?> 
          <option value="<?=$data ["nama"]?>"><?=$data["nama"];?> | <?=$data["rayon"];?></option>
          <?php endforeach;?>
        </select>
      </div>
    <div class="datainput">
      <textarea id='wa_textarea' placeholder='' maxlength='5000' row='1' required="" autocomplete="off" name="isi_laporan"></textarea>
      <span class="highlight"></span><span class="bar"></span>
      <label>Description</label>
    </div>
    <div class="datainput">
      <input class="validate" id="wa_email" name="gambar" type="file" value='' autocomplete="off"/>
      <span class="highlight"></span><span class="bar"></span>
      <label>gambar</label>
    </div>
    
    <button class="send_form" href="" type="submit" name="submit">Laporkan</button>
  </form>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.select').select2();
});
  </script>
</body>
</html>