<?php
    session_start();
    define("BASE_URL", "http://localhost/skripsi/recruitment/");


    function cek_login(){
        if(!isset($_SESSION['login'])){
            redirect('login');
        }
    }

    //fungsi memasukan data kedalam session
    function session_userdata($data)
    {
        foreach ($data as $key => $value) {
            $_SESSION[$key] = $value;
        }
    }

    //fungsi untuk pindah halaman dengan membawa pesan
    function redirect($url, $message = false)
    {
        if($message)
        {
            $_SESSION['message'] = $message;
        }
        header('location: '. BASE_URL . $url);
    }

    //fungsi untuk cek pesan yang di bawa oleh fungsi redirect
    function session_flashdata()
    {
        if (isset($_SESSION['message'])) :
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        endif;
    }

    //fungsi untuk mengubah dari integer menjadi Rp, int
    function rupiah($nilai = 0)
    {
        $string = "Rp, " . number_format($nilai);
        return $string;
    }

    //fungsi untuk mencegah serangan xss
    function cetak($str)
    {
        return htmlentities($str, ENT_QUOTES, 'UTF-8');
    }

    //fungsii untuk mengubah tanggal menjadi tanggal indonesia
    function tgl_indo($tgl)
    {
        $ubah = gmdate($tgl, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $tanggal = $pecah[2];
        $bulan = bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal . ' ' . $bulan . ' ' . $tahun;
    }

    function bulan($bln)
    {
        switch ($bln) {
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
        }
    }
