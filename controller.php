<?php
     $conn = mysqli_connect("localhost","root","","db_nana");

    function query($query){
        global $conn;
       $result = mysqli_query($conn, $query);
       $kotak = [];
       while( $box = mysqli_fetch_assoc($result) ){
        $kotak[]= $box;
       }
       return $kotak;
    }

function input ($data){
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $nis = htmlspecialchars($data["nis"]);
    $rombel = htmlspecialchars($data["rombel"]);
    $rayon= htmlspecialchars($data["rayon"]);
    $status= htmlspecialchars($data["status"]);
    $hobi= htmlspecialchars($data["hobi"]);
    $alamat= htmlspecialchars($data["alamat"]);
    $mereklaptop= htmlspecialchars($data["merk_laptop"]);
    $citacita= htmlspecialchars($data["cita_cita"]);
    $gambar= htmlspecialchars($data["gambar"]);
    

    $query = "INSERT INTO students
                VALUES 
                ('', '$nama', '$nis', '$rombel', '$rayon', '$status', '$hobi', '$alamat', '$mereklaptop', '$citacita', '$gambar')";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }


function delete($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM `students` WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function UPDATE($data){
    global $conn;

        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $nis = htmlspecialchars($data["nis"]);
        $rombel = htmlspecialchars($data["rombel"]);
        $rayon = htmlspecialchars($data["rayon"]);
        $status = htmlspecialchars($data["status"]);
        $hobi = htmlspecialchars($data["hobi"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $laptop = htmlspecialchars($data["laptop"]);
        $citacita = htmlspecialchars($data["cita_cita"]);
        $gambar = htmlspecialchars($data["gambar"]);

        $query = "UPDATE students SET
            nama = '$nama',
            nis = '$nis',
            rombel = '$rombel',
            rayon = '$rayon',
            status = '$status',
            hobi = '$hobi',
            alamat = '$alamat',
            merk_laptop = '$laptop',
            cita_cita = '$citacita',
            gambar = '$gambar' 
            WHERE id = $id
            ";
        
        mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
?>