<?php

class Cari extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Cari_model');
        
    }
    
    public function index(){
        
        $data['kategori'] = $this->Cari_model->getKategori();
        $data['buku'] = $this->Cari_model->getAllBuku();
        $data['user'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
        
        if($data['user']['role']==1){
            
            $data['judul'] = 'Cari Buku';

            if($this->input->post('kategori') == 'Semua'){
                $data['kategori'] = $this->Cari_model->getKategori();
            }else{
                if($this->input->post('kategori')){
                    $keyword = $this->input->post('kategori');
                    $data ['buku'] = $this->Cari_model->cariDataBuku($keyword);
                }

            }
            
            $this->load->view('templates/header',$data);
            $this->load->view('cari/index',$data);
            $this->load->view('templates/footer');
            
        } else {
            $data['judul'] = 'Kelola Buku';

            if($this->input->post('kategori') == 'Semua'){
                $data['kategori'] = $this->Cari_model->getKategori();
            }else{
                if($this->input->post('kategori')){
                    $keyword = $this->input->post('kategori');
                    $data ['buku'] = $this->Cari_model->cariDataBuku($keyword);
                }

            }

            $this->load->view('templates/headeradmin',$data);
            $this->load->view('cari/indexadmin',$data);
            $this->load->view('templates/footer');
        }
    }
    
    public function tambah(){
        $data['buku'] = $this->Cari_model->getKategori();
        $data['judul'] = 'Tambah Data Buku';
        $this->load->view('templates/headeradmin',$data);
        $this->load->view('cari/indextambah',$data);
        $this->load->view('templates/footer');

    }
    public function inputdata(){
        $this->Cari_model->tambahDataBuku();
        $this->session->set_flashdata('message',
        '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        Data <strong>Berhasil</strong> ditambahkan
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>'
        );
        redirect('cari');
    }

    public function hapusBuku($id_buku){
        $this->Cari_model->hapusDataBuku($id_buku);
        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        Data Berhasil <strong>Di Hapus</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('cari');
    }

    public function editJudulBuku(){

        $databarumasuk = [
            'judul' =>$this->input->post('judulbaru',true)
        ];
        $databaru = $databarumasuk;
        $datalamamasuk = [
            'judul' =>$this->input->post('judullama',true)
        ];
        $datalama = $datalamamasuk;


        $this->Cari_model->editJudulBuku($datalama['judul'],$databaru);

        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        Data Berhasil <strong>Di Ganti</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('cari');
    }

    public function editStockBuku(){

        $data = [
            'stock' =>$this->input->post('stockbaru',true)
        ];
        $judulbuku = [
            'judul' =>$this->input->post('judulbuku',true)
        ];

        $this->Cari_model->editJudulBuku($judulbuku['judul'],$data);

        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        Data Berhasil <strong>Di Ganti</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('cari');
    }

    public function detailBuku($id_buku){
        $data['user'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
        $data['judul'] = 'Detail Buku';
        $data['buku'] = $this->Cari_model->getBukuByid($id_buku);

        if($data['user']['role']==2){
        $this->load->view('templates/headeradmin',$data);
        $this->load->view('cari/indexdetailBuku',$data);
        $this->load->view('templates/footer');
        }
        else {
        $this->load->view('templates/header',$data);
        $this->load->view('cari/indexdetailBuku',$data);
        $this->load->view('templates/footer');
        }
    }
}