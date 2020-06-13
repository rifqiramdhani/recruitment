<?php
require_once('../../../function/helper.php');
require_once('../../../function/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nilai = $_POST['nilai'];

    var_dump($nilai);


}
