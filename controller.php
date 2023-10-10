<?php
    $conn = mysqli_connect("localhost","root", "", "db_gds_wikrama"); 

    function tampilData( $query ){
        global $conn;
        $result = mysqli_query($conn, $query);
        $wadah = [];
        while( $baju = mysqli_fetch_assoc($result)) {
            $wadah[] =$baju;
        }
        return $wadah;
    }

    function tambah( $data){
        global $conn;
        $nama_pelapor   = htmlspecialchars($data["nama_pelapor"]);
        $nama_siswa     = htmlspecialchars($data["nama_siswa"]);
        $isi_laporan    = htmlspecialchars($data["isi_laporan"]);
        $gambar         = null;
        
        // GAMBAR
        $filename = $_FILES['gambar']['name'];
        if($filename) {
            $rand = rand();
            $ekstensi =  array('png','jpg','jpeg','gif');
            $ukuran = $_FILES['gambar']['size'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(in_array($ext, $ekstensi) && $ukuran < 1044070){	
                $gambar = $rand.'_'.$filename;
                move_uploaded_file($_FILES['gambar']['tmp_name'], 'img/'.$rand.$filename);
            }else{
                return 0;
            }
        }

        $query = "INSERT INTO data_laporan VALUES (
                                null, 
                                '$nama_pelapor', 
                                '$nama_siswa', 
                                '$isi_laporan', 
                                '$gambar'
                            )";

        $result = mysqli_query($conn, $query);

        if (!$result) {
            echo '<pre>';
            var_dump($conn);
            echo '<pre>';

            exit();
        }

        // yg akan dikembalikan nilai atau -1 untuk menghasilkan pesan
        return mysqli_affected_rows($conn);
    }