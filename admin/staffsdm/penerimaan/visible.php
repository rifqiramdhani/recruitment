<?php 
    $id = $_POST['id_recruitment'];

    $query = mysqli_query($koneksi, "SELECT * FROM `recruitment` WHERE id_recruitment = '$id'");
    $getrecruitment = mysqli_fetch_assoc($query);

    if($getrecruitment['status_recruitment'] == 1){
        $sql = mysqli_query($koneksi, "UPDATE `recruitment` SET 
        `status_recruitment`= 0
        WHERE id_recruitment = '$id'");

        if ($sql) {
            $_SESSION['message'] = 'Data berhasil tidak ditampilkan di beranda';
            $_SESSION['title'] = 'Data Penerimaan';
            $_SESSION['type'] = 'success';
        } else {
            $_SESSION['message'] = 'Data gagal tidak ditampilkan di beranda';
            $_SESSION['title'] = 'Data Penerimaan';
            $_SESSION['type'] = 'error';
        }
    }else{
        $sql = mysqli_query($koneksi, "UPDATE `recruitment` SET 
        `status_recruitment`= 1
        WHERE id_recruitment = '$id'");

        if ($sql) {
            $_SESSION['message'] = 'Data berhasil ditampilkan di beranda';
            $_SESSION['title'] = 'Data Penerimaan';
            $_SESSION['type'] = 'success';
        } else {
            $_SESSION['message'] = 'Data gagal ditampilkan di beranda';
            $_SESSION['title'] = 'Data Penerimaan';
            $_SESSION['type'] = 'error';
        }
    }

?>