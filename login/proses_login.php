<?php
require('../function/koneksi.php');
require('../function/helper.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['login'])){
        echo $email = $_POST['email'];
        echo $password = $_POST['password'];

        $querycek = mysqli_query($koneksi, "SELECT * FROM `karyawan` WHERE email_karyawan = '$email'");
        $getcek = mysqli_fetch_assoc($querycek);

        if(mysqli_num_rows($querycek) > 0){

            if(password_verify($password, $getcek['password_karyawan'])){
                if($getcek['status_karyawan'] == 1){
                    if($getcek['level'] == 'admin'){
                        $data = [
                            'login' => true,
                            'email' => $email,
                            'level' => 'admin',
                            'id_karyawan' => $getcek['id_karyawan'],
                            'nama_karyawan' => $getcek['nama_karyawan']
                        ];
                    }else{
                        $query = mysqli_query($koneksi, "SELECT karyawan.*, nama_jabatan, nama_divisi FROM `karyawan` JOIN jabatan USING(id_jabatan) JOIN divisi USING(id_divisi) WHERE email_karyawan = '$email'");
                        $user = mysqli_fetch_assoc($query);

                        $level = strtolower($user['nama_jabatan'] . $user['nama_divisi']);

                        $data = [
                                'login' => true,
                                'email' => $email,
                                'level' => str_replace(" ", "", $level),
                                'id_karyawan' => $user['id_karyawan'],
                                'nama_karyawan' => $user['nama_karyawan']
                            ];
                    }

                    //fungsi memasukkan data kedalam session
                    session_userdata($data);
                    redirect('admin');

                }else{
                    $_SESSION['message'] = 'Maaf akun anda tidak aktif. Silahkan hubungi Staff SDM untuk info mengenai akun.';
                    $_SESSION['title'] = 'Login';
                    $_SESSION['type'] = 'error';
                    header('location: index.php');
                }

            }else{
                $_SESSION['message'] = 'Maaf password yang anda masukan salah.';
                $_SESSION['title'] = 'Login';
                $_SESSION['type'] = 'error';
                header('location: index.php');
            }
        
        }else{
            $_SESSION['message'] = 'Maaf email yang anda masukan belum terdaftar..';
            $_SESSION['title'] = 'Login';
            $_SESSION['type'] = 'error';
            header('location: index.php');
        }
    }

}else{
    header('location: index.php');
}

?>