<?php

require_once('../../function/helper.php');

unset($_SESSION['login_calon_karyawan']);
unset($_SESSION['email_calon_karyawan']);
unset($_SESSION['id_calon_karyawan']);

$_SESSION['message'] = 'Selamat anda berhasil logout';
$_SESSION['title'] = 'Login';
$_SESSION['type'] = 'success';

redirect('index.php');

?>