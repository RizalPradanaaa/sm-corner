<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller{

    public function login()
    {
        if($this->session->userdata('email')){
                redirect('admin');
        }

        $this->form_validation->set_rules('email', 'Name', 'required|trim|valid_email',[
            'required' => 'Email tidak boleh kosong',
            'valid_email' => 'Yang anda masukkan bukan email'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password tidak boleh kosong'
        ]);

        if($this->form_validation->run() == false){
            $data['judul'] = 'SM - Corner | Login';
            $this->load->view('templates/auth_header.php', $data);
            $this->load->view('auth/login.php');
            $this->load->view('templates/auth_footer.php');
        }else{
            $this->_login();
        }
    }

    private function _login()
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->db->get_where('user', ['email' => $email])->row_array();

            // Jika usernya ada
            if($user){
                // Jika usernya aktif

                if($user['is_active'] == 1){
                    // cek Password
                    if(password_verify($password, $user['password'])){
                        $data = [
                            'email' => $user['email'],
                            'role_id' => $user['role_id']
                        ];
                        $this->session->set_userdata($data);
                        if($user['role_id'] == 1){
                            redirect('administrator');
                        }else if($user['role_id'] == 2){
                            redirect('admin');
                        }else {
                            redirect('home');
                        }     
                    }else{
                        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Password!</strong> anda Salah!</div>');
                        redirect('auth/login');
                    }
                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Email!</strong> belum di aktivasi!</div>');
                    redirect('auth/login');
                }
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Email!</strong> belum terdaftar!</div>');
                redirect('auth/login');
            }
    }

    public function register()
    {
        if($this->session->userdata('email')){
            redirect('admin');
        }
        
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email Sudah Terdaftar'
        ]);

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password Tidak Sama!',
            'min_length' => 'Password Terlalu Pendek'
        ]);

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if($this->form_validation->run() == false){
            $data['judul'] = 'SM - Corner | Register';
            $this->load->view('templates/auth_header.php', $data);
            $this->load->view('auth/register.php');
            $this->load->view('templates/auth_footer.php');
        }else {
            $data = [
                'name' => $this->input->post('name', true),
                'email' => $this->input->post('email', true),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 3,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> akun anda berhasil dibuat, Silahkan Login!
          </div>');
            redirect('auth/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Selamat!</strong> anda berhasil logout!</div>');
        redirect('auth/login');
    }

    public function not_found()
    {
        $data['judul'] = 'SM - Corner | Not Found';
        $this->load->view('templates/auth_header.php', $data);
        $this->load->view('auth/not_found.php', $data);
        $this->load->view('templates/auth_footer.php');
    }
}
?>
