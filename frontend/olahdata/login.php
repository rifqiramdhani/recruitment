<?php
require_once('../../function/helper.php');
require_once('../../function/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM `calon_karyawan` WHERE email_calon_karyawan = '$email'");
    $getdata = mysqli_fetch_assoc($query);


    if (mysqli_num_rows($query) > 0) {
        if ($getdata['status_calon_karyawan'] == 1) {
            if (password_verify($password, $getdata['password_calon_karyawan'])) {
                $data = [
                    'login_calon_karyawan' => true,
                    'email_calon_karyawan' => $email,
                    'id_calon_karyawan' => $getdata['id_calon_karyawan']
                ];

                //fungsi memasukkan data kedalam session
                session_userdata($data);

                $_SESSION['message'] = 'Selamat ' . $getdata['nama_calon_karyawan'] . ' berhasil login';
                $_SESSION['title'] = 'Login';
                $_SESSION['type'] = 'success';
                redirect('index.php');
            } else {
                $_SESSION['message'] = 'Maaf password salah!';
                $_SESSION['title'] = 'Login';
                $_SESSION['type'] = 'error';
                redirect('index.php');
            }
        }else{
            $_SESSION['message'] = 'Maaf email belum aktif!';
            $_SESSION['title'] = 'Login';
            $_SESSION['type'] = 'error';
            redirect('index.php');
        }
    } else {
        $_SESSION['message'] = 'Maaf email belum terdaftar!';
        $_SESSION['title'] = 'Login';
        $_SESSION['type'] = 'error';
        redirect('index.php');
    }
}
