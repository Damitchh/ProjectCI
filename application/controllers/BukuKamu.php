<?php

class BukuKamu extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Cari_model');

    }

    public function index($peminjam){
        $data['user'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();

        $data['peminjaman'] = $this->Cari_model->getBukuPinjam($peminjam);
        $data['judul'] = 'Buku Kamu';

        $this->load->view('templates/header',$data);
        $this->load->view('bukukamu/index',$data);
        $this->load->view('templates/footer');
    
    }

    public function pengembalian($idbuku){
        $data['buku'] = $this->Cari_model->getBukuByid($idbuku);
        $idbukukirim = $data ['buku']['id_buku'];
        $data['user'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
        $this->Cari_model->bukuKembali($data['buku']['stock'],$idbukukirim,$data['user']['username']);
        
        $this->load->view('templates/header',$data);
        $this->load->view('bukukamu/indexThanks',$data);
        $this->load->view('templates/footer');
    }

    public function indexadmin(){
        $data['user'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();

        $data['peminjaman'] = $this->Cari_model->getAllBukuPinjam();
        $data['judul'] = 'Buku Yang Sedang di Pinjam';

        $this->load->view('templates/headeradmin',$data);
        $this->load->view('bukukamu/indexadmin',$data);
        $this->load->view('templates/footer');
    
    }
}