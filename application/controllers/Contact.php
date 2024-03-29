<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Contact');
    }
    public function index()
    {
        // $kendaraan = $this->M_Kendaraan->getKendaraan();
        $user = $this->session->userdata('id');
        $history = $this->M_Contact->getHistoryPesan($user);
        // $history = json_decode(json_encode($history), true);
        // $history = $history["0"];
        // $history = $history['id'];

        $data = array(
            // 'kendaraan' => $kendaraan,
            'title' => 'List Kendaraan',
            'css' => 'contact.css',
            'history' => $history,
            'notif' => ''
        );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->load->view('/user/layout/header', $data);
        $this->load->view('/user/contact', $data);
        $this->load->view('/user/layout/footer');
    }
    public function save()
    {
        $nama = $this->input->post('nama');
        $pesan = $this->input->post('pesan');
        $id = $this->M_Contact->cekData($nama);
        $id = json_decode(json_encode($id), true);
        $id = $id["0"];
        $id = $id['id'];

        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'user_id' => $id,
            'pesan' => $pesan,
            'tanggal' => date("Y-m-d H:i:s")
        );
        $page = array(
            'title' => 'Contact Us',
            'css' => 'contact.css',
            'notif' => 'Terimakasih telah menghubungi kami'
        );

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->M_Contact->insertPesan($data);

        redirect(base_url('/contact'));
    }
}
