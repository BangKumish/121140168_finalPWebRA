<?php
    include 'fungsi.php';
    session_start();

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == 'create'){
            $success = createData($_POST);
            if(!$success){
                echo $success;
            } 
            $_SESSION['eksekusi'] = "Data Berhasil Ditambahkan";
            header("location: index.php");

        } elseif ($_POST['aksi'] == 'update'){
            $success = updateData($_POST);
            if(!$success){
                echo $success;
            } 
            $_SESSION['eksekusi'] = "Data Berhasil Dirubah";
            header("location: index.php");
        }
    }

    if(isset($_GET['hapus'])){
        $success = deleteData($_GET);
        if(!$success){
            echo $success;
        } 
        $_SESSION['eksekusi'] = "Data Berhasil Dihapus";
        header("location: index.php");
    }
?>