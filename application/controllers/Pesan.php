<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Pesan');
    }
    public function index()
    {
        $pesan = $this->M_Pesan->getPesan();
        $data = array(
            'pesan' => $pesan,
            'title' => 'Pesan Masuk',
            'css' => 'pesan.css'
        );
        $this->load->view('/admin/layout/header', $data);
        $this->load->view('/admin/pesan', $data);
        $this->load->view('/admin/layout/footer');
    }
    public function list()
    {
        echo "Haiii";
    }
}