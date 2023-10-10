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
    
    $nis = htmlspecialchars($_POST["nis"]);
    $nama = htmlspecialchars($_POST["nama"]);
    $rombel = htmlspecialchars($_POST["rombel"]);
    $rayon = htmlspecialchars($_POST["rayon"]);

    $query = "INSERT INTO `admin` 
              VALUES ('','$nama','$rayon','$rombel','$nis')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//function untuk hapus data siswa pada table admin
function hapus() {
    $id = $_GET['id'];
    global $db;

    //diapit oleh backtick membedakan tabel dan sintaks sql
    $sql = "DELETE FROM `admin` WHERE id = $id";
    mysqli_query($db,$sql);

    return mysqli_affected_rows($db);
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


function update(){
    global $db;

    $id = $_POST["id"]; // ID data yang akan diperbarui
    $nis = $_POST["nis"];
    $nama = $_POST["nama"];
    $rombel = $_POST["rombel"];
    $rayon = $_POST["rayon"];

    $query = "UPDATE `admin` SET 
              `nama` = '$nama',
              `rayon` = '$rayon',
              `rombel` = '$rombel',
              `nis` = '$nis'
              WHERE `id` = $id";

    $result = mysqli_query($db, $query);

    return $result;
}


function edit() {
    global $db;
    
    $id = $_POST['id'];
    $nis = htmlspecialchars($_POST["nis"]);
    $nama = htmlspecialchars($_POST["nama"]);
    $rombel = htmlspecialchars($_POST["rombel"]);
    $rayon = htmlspecialchars($_POST["rayon"]);

    $query = "UPDATE `admin` SET 
                 nis = '$nis',
                 nama = '$nama',
                 rombel = '$rombel',
                 rayon = '$rayon' 
                 WHERE id = $id";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function cari($keyword) {
    $query = "SELECT * FROM `admin` WHERE
              nama LIKE '%$keyword%' OR
              nis LIKE '%$keyword%' OR
              rayon LIKE '%$keyword%' OR
              rombel LIKE '%$keyword%' OR
              ";
              
    return query($query);
}

?>