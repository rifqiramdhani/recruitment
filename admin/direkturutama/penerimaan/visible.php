<?php 
    $id = $_POST['id_recruitment'];

    $query = mysqli_query($koneksi, "SELECT * FROM `rekrutmen` WHERE id_rekrutmen = '$id'");
    $getrekrutmen = mysqli_fetch_assoc($query);

    if($getrekrutmen['status_rekrutmen'] == 1){
        $sql = mysqli_query($koneksi, "UPDATE `rekrutmen` SET 
        `status_rekrutmen`= 0
        WHERE id_rekrutmen = '$id'");

        if ($sql) {
            $_SESSION['message'] = 'Data berhasil dinonaktifkan';
            $_SESSION['title'] = 'Data Rekrutmen';
            $_SESSION['type'] = 'success';
        } else {
            $_SESSION['message'] = 'Data gagal dinonaktifkan';
            $_SESSION['title'] = 'Data Rekrutmen';
            $_SESSION['type'] = 'error';
        }
    }else{
        $sql = mysqli_query($koneksi, "UPDATE `rekrutmen` SET 
        `status_rekrutmen`= 1
        WHERE id_rekrutmen = '$id'");

        if ($sql) {
            $_SESSION['message'] = 'Data berhasil diaktifkan';
            $_SESSION['title'] = 'Data Rekrutmen';
            $_SESSION['type'] = 'success';
        } else {
            $_SESSION['message'] = 'Data gagal diaktifkan';
            $_SESSION['title'] = 'Data Rekrutmen';
            $_SESSION['type'] = 'error';
        }
    }

?>