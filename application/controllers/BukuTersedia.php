<?php

class BukuTersedia extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Cari_model');
        
    }
    
    
    public function index(){
        $data['buku'] = $this->Cari_model->getBukuAda();
        $data['user'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
        
        
        $data['judul'] = 'Buku Tersedia';
        if($data['user']['role']==1){
            
            $this->load->view('templates/header',$data);
            $this->load->view('bukutersedia/index',$data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/headeradmin',$data);
            $this->load->view('bukutersedia/indexadmin',$data);
            $this->load->view('templates/footer');
        }
        
    }
    
    public function formpinjam($id_buku){
        $data['user'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
        $data['judul'] = 'Detail Buku';
        $data['buku'] = $this->Cari_model->getBukuByid($id_buku);
        
        $this->load->view('templates/header',$data);
        $this->load->view('bukutersedia/indexformpinjam',$data);
        $this->load->view('templates/footer');
        // $stockbaru = $data['buku']['stock'] - 1;
    }
    
    public function pinjamBuku($id_buku){
        $data['user'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
        $peminjam =  $data['user']["username"];
        $data['buku'] = $this->Cari_model->getBukuByid($id_buku);

        $this->Cari_model->pinjamBuku($peminjam,$data['buku']['judul'],$data['buku']['id_buku']);

        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        Berhasil <strong>Meminjam Buku</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>');

        redirect('cari');
        

    }
}