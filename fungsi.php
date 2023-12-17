<?php
    include 'koneksi.php';

    function createData($postData){
        global $databaseLink;

        $judul = $postData['judul'];
        $genre = $postData['genre'];
        $tanggalRilis = $postData['tanggalRilis'];
        $pengembang = $postData['pengembang'];
        $rating = $postData['rating'];

        $createQuery = "INSERT INTO datagame VALUES(
            null,
            '$judul',
            '$genre',
            '$tanggalRilis',
            '$pengembang',
            '$rating')";
        
        mysqli_query($databaseLink, $createQuery);
        return true;
    }

    function updateData($postData){
        global $databaseLink;

        $idGame = $postData['id'];
        $judul = $postData['judul'];
        $genre = $postData['genre'];
        $tanggalRilis = $postData['tanggalRilis'];
        $pengembang = $postData['pengembang'];
        $rating = $postData['rating'];

        $updateQuery = "UPDATE datagame SET 
            Judul='$judul', 
            Genre='$genre', 
            tanggalRilis='$tanggalRilis', 
            Pengembang='$pengembang', 
            Rating='$rating' 
            WHERE id='$idGame' ;";
            
        mysqli_query($databaseLink, $updateQuery);
        return true;
    }

    function deleteData($getData){
        global $databaseLink;

        $idGame = $getData['hapus'];
        $deleteQuery = "DELETE FROM datagame WHERE id = '$idGame'; ";
        mysqli_query($databaseLink, $deleteQuery);
        return true; 
    }
?>