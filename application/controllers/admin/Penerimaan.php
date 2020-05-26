<?php defined('BASEPATH') or exit('No direct script access allowed');

class Penerimaan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main_model');
        $this->load->helper('form');
        $this->load->helper('fungsi');
        //
        cek_user('Admin');
    }

}
?>