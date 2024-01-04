<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Administrator extends CI_Controller{

    public function __construct()
    {
            parent::__construct();
            if(!$this->session->userdata('email')){
                redirect('auth/login');
            }

    }

    public function index()
    {
        if($this->session->userdata('role_id') == !1){
            redirect('auth/not_found');
        }
        
        $data['judul'] = 'SM - Corner | Administrator';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['pemasukan'] = $this->db->get('pemasukan')->result_array();

        $data['users'] = $this->db->get_where('user', ['role_id' => 2])->result_array();
        $data['barangs'] = $this->db->get('barang')->result_array();

        $data['total_user'] = $this->db->get('user')->num_rows();
        $data['total_barang'] = $this->db->get('barang')->num_rows();

        $this->load->view('templates/admin/header.php', $data);
        $this->load->view('templates/admin/sidebar1.php', $data);
        $this->load->view('templates/admin/topbar.php', $data);
        $this->load->view('administrator/index.php', $data);
        $this->load->view('templates/admin/footer.php');
    }

    public function users()
    {
        $data['judul'] = 'SM - Corner | Users';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['users'] = $this->db->get_where('user', ['role_id' => 2])->result_array();

        // Validasi
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'min_length' => 'Password Terlalu Pendek'
        ]);

        if($this->form_validation->run() == false){
            $this->load->view('templates/admin/header.php', $data);
            $this->load->view('templates/admin/sidebar1.php', $data);
            $this->load->view('templates/admin/topbar.php', $data);
            $this->load->view('administrator/users.php', $data);
            $this->load->view('templates/admin/footer.php');
        }else{
            $data = [
                'name' => $this->input->post('name', true),
                'email' => $this->input->post('email', true),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> anda berhasil, menambahkan akun admin!</div>');
            redirect('administrator/users');
        }

    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> akun admin berhasil dihapus!</div>');
        redirect('administrator/users');
    }

    public function settings()
    {

        $data['judul'] = 'SM - Corner | Settings';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Name', 'required|trim', [
            'required' => 'Username tidak boleh kosong!'
        ]);

        if($this->form_validation->run() == false){
            $this->load->view('templates/admin/header.php', $data);
            $this->load->view('templates/admin/sidebar1.php', $data);
            $this->load->view('templates/admin/topbar.php', $data);
            $this->load->view('administrator/settings.php', $data);
            $this->load->view('templates/admin/footer.php');
        }else{
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            // Cek jika ada image
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './public/assets/img/profile/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'public/assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                }else{
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show col-lg-9" role="alert">
            <strong>Selamat!</strong> profile anda berhasil diedit!</div>');

            redirect('administrator/settings');
        }
    }

    public function password()
    {
        $data['judul'] = 'SM - Corner | Password';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim|min_length[3]', [
            'required' => 'Password Tidak Boleh Kosong',
            'min_length' => 'Password Terlalu Pendek'
        ]);

        $this->form_validation->set_rules('password_baru1', 'Password Baru1', 'required|trim|min_length[3]|matches[password_baru2]', [
            'required' => 'Password Tidak Boleh Kosong',
            'matches' => 'Password Tidak Sama!',
            'min_length' => 'Password Terlalu Pendek'
        ]);

        $this->form_validation->set_rules('password_baru2', 'Password Baru2', 'required|trim|matches[password_baru1]');

        if($this->form_validation->run() == false){
            $this->load->view('templates/admin/header.php', $data);
            $this->load->view('templates/admin/sidebar1.php', $data);
            $this->load->view('templates/admin/topbar.php', $data);
            $this->load->view('administrator/password.php', $data);
            $this->load->view('templates/admin/footer.php');
        }else{
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru1');
            if (!password_verify($password_lama, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show col-lg-10" role="alert">
                <strong>Password!</strong> lama anda salah!</div>');
                redirect('administrator/password');
            }else{
                if ($password_lama == $password_baru) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show col-lg-10" role="alert">
                    <strong>Password!</strong> baru tidak boleh sama dengan password lama!</div>');
                    redirect('administrator/password');
                }else{
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show col-lg-10" role="alert">
                    <strong>Password!</strong> anda berhasil diperbarui!</div>');
                    redirect('administrator/password');
                }
            }
        }
    }
}