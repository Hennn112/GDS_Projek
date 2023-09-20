<?php 
$db = mysqli_connect("localhost","root","","db_gds_wikrama");

function query($query) {
    global $db;
    $result = mysqli_query($db,$query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows [] = $row;
    }
    return $rows;
}

function add(){
    global $db;
    
    $nis = $_POST["nis"];
    $nama = $_POST["nama"];
    $rombel = $_POST["rombel"];
    $rayon = $_POST["rayon"];

    $query = "INSERT INTO `admin` 
              VALUES ('','$nama','$rayon','$rombel','$nis')";
    $result = mysqli_query($db, $query);
    return $result;
}

//function untuk hapus data siswa pada table admin
function hapus() {
    $id = $_GET['id'];
    global $db;

    //diapit oleh backtick membedakan tabel dan sintaks sql
    $sql = "DELETE FROM `admin` WHERE id = $id";
    $result = mysqli_query($db,$sql);
    return $result;
}

function login($username, $password) {
    global $db;

    $sql = "SELECT * FROM `login` WHERE username = '$username' AND pasword = '$password'";
    $result = mysqli_query($db, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $barisData = mysqli_fetch_assoc($result);

        $_SESSION['username'] = $barisData['username'];

        return true; // Login berhasil
    } else {
        return false; // Login gagal
    }
}
?>