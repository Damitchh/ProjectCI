<?php

class About extends CI_Controller {

    public function index(){
        $data['user'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
        
        $data['judul'] = 'About';
        $this->load->view('templates/header',$data);
        $this->load->view('about/index');
        $this->load->view('templates/footer');
    
    }
}