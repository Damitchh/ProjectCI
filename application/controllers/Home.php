<?php

class Home extends CI_Controller {

    public function index(){
        $data['judul'] = 'E-Library';
        $data['user'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();


            if($data['user']['role']==1){

                $this->load->view('templates/header',$data);
                $this->load->view('home/index',$data);
                $this->load->view('templates/footer');
            } else {
                $this->load->view('templates/headeradmin',$data);
                $this->load->view('home/indexadmin',$data);
                $this->load->view('templates/footer');
            }



    }
}