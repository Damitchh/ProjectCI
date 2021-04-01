<?php

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Cari_model');
        $this->load->library('form_validation');

    }

    public function index(){

        $this->form_validation->set_rules('username', 'Username', 'required|trim',[
            'required' => 'Isi Username Kamu' ,
        ]
        );
        $this->form_validation->set_rules('password','Password','required|trim|min_length[4]', [
            'required' => 'Isi Password Kamu' ,
            'min_length' => 'Minimal 4 karakter!'
        ]
        );

        if ($this->form_validation->run()==false){
            $data['judul'] = 'Login';
            $this->load->view('templates/headerLogin',$data);
            $this->load->view('login/index');
            $this->load->view('templates/footer');
        }
        else{
            //lolos
            $this->_login();
            
        }
    }
            private function _login(){
                $username = $this->input->post('username');
                $password = $this->input->post('password');

                $user = $this->db->get_where('user', ['username' => $username])->row_array();

                //kalau ada user
                if($user){
                    //kalo usser aktif
                    if($user['is_active']== 1){
                        //cek password
                        if($password == $user['password']){
                            
                            $data = [
                                'username' => $user['username'],
                                'role' => $user['role']
                            ];
                            $this->session->set_userdata($data);
                            redirect('home');
                        } else{
                            $this->session->set_flashdata('message','<b>PASSWORD SALAH</b>');
                            redirect('login');
                        }

                    } else {
                        $this->session->set_flashdata('message','<b>USERNAME BELUM DIAKTIFKAN</b>');
                        redirect('login');
                    }

                }else{
                    $this->session->set_flashdata('message','<b>USERNAME BELUM TERDAFTAR</b>');
                    redirect('login');
                }
                
            }




    public function registrasi(){

        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]',[
            'required' => 'Isi Username Kamu' ,
            'is_unique' => 'Username Tidak Tersedia'
        ]
        );
        $this->form_validation->set_rules('password1','Password','required|trim|min_length[4]', [
            'required' => 'Isi Password Kamu' ,
            'min_length' => 'Minimal 4 karakter!'
        ]
        );
        $this->form_validation->set_rules('password2','Password','required|trim|matches[password1]',[
            'required' => 'Harus Di isi',
            'matches' => 'Password Tidak Sama' 
        ]);

        if($this->form_validation->run() == false){
            
            $data['judul'] = 'Registrasi';
            $this->load->view('templates/headerLogin',$data);
            $this->load->view('login/indexRegist');
            $this->load->view('templates/footer');

        }
        else{

            $data = [
                'username' => htmlspecialchars($this->input->post('username',true)),
                'password' => $this->input->post('password1'),
                'role' => 1,
                'is_active' =>1
            ];
            $this->db->insert('user',$data);
            $this->session->set_flashdata('message','<b>BERHASIL DAFTAR. SILAHKAN LOGIN</b>');
            redirect('login');
        }

    }

    public function keluar(){

        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');

        $this->session->set_flashdata('message','<b>BERHASIL KELUAR</b>');
        redirect('login');
    }

}