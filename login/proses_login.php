<?php
require('../function/koneksi.php');
require('../function/helper.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = mysqli_query($koneksi, "SELECT karyawan.*, nama_jabatan, nama_divisi FROM `karyawan` JOIN detail_jabatan ON detail_jabatan.id_dt_jabatan = karyawan.id_dt_jabatan JOIN jabatan ON detail_jabatan.id_jabatan = jabatan.id_jabatan JOIN divisi ON detail_jabatan.id_divisi = divisi.id_divisi WHERE email_karyawan = '$email'");



        if(mysqli_num_rows($query) > 0){
            $user = mysqli_fetch_assoc($query);
            

            if(password_verify($password, $user['password_karyawan'])){
                if($user['status_karyawan'] == 1){

                    $data = [
                        'login' => true,
                        'email' => $email,
                        'level' => strtolower($user['nama_jabatan']. $user['nama_divisi']),
                        'id_karyawan' => $user['id_karyawan']
                    ];

                    //fungsi memasukkan data kedalam session
                    session_userdata($data);
                    redirect('admin');

                }else{
                    redirect('login/index.php', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Maaf akun anda tidak aktif. Silahkan hubungi Staff SDM untuk info mengenai akun.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                }

            }else{
                redirect('login/index.php', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Maaf password yang anda masukan salah.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
            }
        
        }else{
            redirect('login/index.php', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Maaf email yang anda masukan belum terdaftar.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
        }
    }

}else{
    header('location: index.php');
}

?>