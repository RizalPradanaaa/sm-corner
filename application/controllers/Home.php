<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller{

    public function index()
    {
        $data['judul'] = 'SM - Corner | Home';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['barangs'] = $this->db->get('barang')->result_array();

        if ($this->input->post('keyword')) {
        
            $keyword = $this->input->post('keyword');
            $this->db->like('nama', $keyword);
            $this->db->or_like('kode', $keyword);
            $data['barangs'] = $this->db->get('barang')->result_array();
        }

        $this->load->view('templates/home_header.php', $data);
        $this->load->view('home/index.php', $data);
        $this->load->view('templates/home_footer.php');
    }

    public function detail($id)
    {
        $data['judul'] = 'SM - Corner | Detail';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['barangs'] = $this->db->get('barang')->result_array();
        $data['barang'] = $this->db->get_where('barang', ['id' => $id])->row_array();

        // Validasi
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');

        if($this->form_validation->run() == false){
            $this->load->view('templates/home_header.php', $data);
            $this->load->view('home/detail.php', $data);
            $this->load->view('templates/home_footer.php');
        }else{
            $harga = $this->input->post('harga', true);
            $jumlah = $this->input->post('jumlah', true);
            $total = $harga * $jumlah;
            $data = [
                'id_user' => $this->input->post('id_user', true),
                'username' => $this->input->post('username', true),
                'kode' => $this->input->post('kode', true),
                'nama' => $this->input->post('nama', true),
                'gambar' => $this->input->post('gambar', true),
                'stok' => $this->input->post('stok', true),
                'harga' => $harga,
                'diskon' => $this->input->post('diskon', true),
                'jumlah' => $jumlah,
                'total' => $total,
                'date_created' => time()
            ];

            $this->db->insert('keranjang', $data);
            redirect('home/keranjang');
        }
    }

    public function kategori()
    {
        $data['judul'] = 'SM - Corner | Kategori';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['aksesoris'] = $this->db->get_where('barang', ['kategori' => 'aksesoris'])->result_array();
        $data['atribut'] = $this->db->get_where('barang', ['kategori' => 'atribut'])->result_array();
        $data['buku'] = $this->db->get_where('barang', ['kategori' => 'buku'])->result_array();
        $data['jaket'] = $this->db->get_where('barang', ['kategori' => 'jaket'])->result_array();
        $data['kain'] = $this->db->get_where('barang', ['kategori' => 'kain'])->result_array();
        $data['pakaian'] = $this->db->get_where('barang', ['kategori' => 'pakaian'])->result_array();

        $data['barangs'] = $this->db->get('barang')->result_array();
        $this->load->view('templates/home_header.php', $data);
        $this->load->view('home/kategori.php', $data);
        $this->load->view('templates/home_footer.php');
    }

    public function about()
    {
        $data['judul'] = 'SM - Corner | About';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/home_header.php', $data);
        $this->load->view('home/about.php', $data);
        $this->load->view('templates/home_footer.php');
    }

    public function profile()
    {
        if(!$this->session->userdata('email')){
            redirect('auth/login');
        }

        $data['judul'] = 'SM - Corner | Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Name', 'required|trim', [
            'required' => 'Username tidak boleh kosong!'
        ]);

        if($this->form_validation->run() == false){
            $this->load->view('templates/home_header.php', $data);
            $this->load->view('home/profile.php', $data);
            $this->load->view('templates/home_footer.php');  
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

            redirect('home/profile');
        }
    }

    public function password()
    {
        if(!$this->session->userdata('email')){
            redirect('auth/login');
        }

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
            $this->load->view('templates/home_header.php', $data);
            $this->load->view('home/password.php', $data);
            $this->load->view('templates/home_footer.php');
        }else{
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru1');
            if (!password_verify($password_lama, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show col-lg-10" role="alert">
                <strong>Password!</strong> lama anda salah!</div>');
                redirect('home/password');
            }else{
                if ($password_lama == $password_baru) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show col-lg-10" role="alert">
                    <strong>Password!</strong> baru tidak boleh sama dengan password lama!</div>');
                    redirect('home/password');
                }else{
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show col-lg-10" role="alert">
                    <strong>Password!</strong> anda berhasil diperbarui!</div>');
                    redirect('home/password');
                }
            }
        }
    }

    public function keranjang()
    {
        if(!$this->session->userdata('email')){
            redirect('auth/login');
        }

        $data['judul'] = 'SM - Corner | Keranjang';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $id_user = $data['user']['id'];

        $data['keranjang'] = $this->db->get_where('keranjang', ['id_user' => $id_user])->result_array();

        $this->load->view('templates/home_header.php', $data);
        $this->load->view('home/keranjang.php', $data);
        $this->load->view('templates/home_footer.php');
    }

    public function deletekeranjang($id)
    {
        if(!$this->session->userdata('email')){
            redirect('auth/login');
        }

        $this->db->where('id', $id);
        $this->db->delete('keranjang');
        redirect('home/keranjang');
    }

    public function offline()
    {

        $data['judul'] = 'SM - Corner | Offline';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/home_header.php', $data);
        $this->load->view('home/offline.php', $data);
        $this->load->view('templates/home_footer.php');
    }

    public function online()
    {
        if(!$this->session->userdata('email')){
            redirect('auth/login');
        }

        $data['judul'] = 'SM - Corner | Online';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $id_user = $data['user']['id'];
        $name = $data['user']['name'];

        $data['keranjang'] = $this->db->get_where('keranjang', ['id_user' => $id_user])->result_array();

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat tidak boleh kosong!'
        ]);

        if($this->form_validation->run() == false){
            $this->load->view('templates/home_header.php', $data);
            $this->load->view('home/online.php', $data);
            $this->load->view('templates/home_footer.php');
        }else{
            $config['upload_path']          = './public/assets/img/alamat/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = '2048';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('transfer')){
                $this->upload->display_errors();
            }else{
                $data = [
                    'id_user' => $id_user,
                    'nama_user' => $name,
                    'alamat' => $this->input->post('alamat', true),
                    'transfer' => $this->upload->data('file_name'),
                    'tanggal' => time(),
                    'status' => 2
                ];
    
                $this->db->insert('alamat_user', $data);
                redirect('home/keranjang');
            }
        }
        
    }
}