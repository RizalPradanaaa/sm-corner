<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller{
    public function __construct()
    {
            parent::__construct();
            if(!$this->session->userdata('email')){
                redirect('auth/login');
            }
    }

    public function index()
    {
        if($this->session->userdata('role_id') == !2){
            redirect('auth/not_found');
        }
        $data['judul'] = 'SM - Corner | Admin';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        $data['barangs'] = $this->db->get('barang')->result_array();
        $data['pemasukan'] = $this->db->get('pemasukan')->result_array();
        $data['total_user'] = $this->db->get('user')->num_rows();
        $data['total_barang'] = $this->db->get('barang')->num_rows();

        $this->load->view('templates/admin/header.php', $data);
        $this->load->view('templates/admin/sidebar2.php', $data);
        $this->load->view('templates/admin/topbar.php', $data);
        $this->load->view('admin/index.php', $data);
        $this->load->view('templates/admin/footer.php');
    }

    public function barang()
    {
        $data['judul'] = 'SM - Corner | Barang';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['barangs'] = $this->db->get('barang')->result_array();

        $this->form_validation->set_rules('kode', 'Kode', 'required|trim', [
            'required' => 'Kode tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('stok', 'Stok', 'required|trim', [
            'required' => 'Stok tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim', [
            'required' => 'Harga tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('diskon', 'Diskon', 'required|trim', [
            'required' => 'Diskon tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim', [
            'required' => 'Deskripsi tidak boleh kosong!'
        ]);

        if($this->form_validation->run() == false){
            $this->load->view('templates/admin/header.php', $data);
            $this->load->view('templates/admin/sidebar2.php', $data);
            $this->load->view('templates/admin/topbar.php', $data);
            $this->load->view('admin/barang.php', $data);
            $this->load->view('templates/admin/footer.php');
        }else{
            $config['upload_path']          = './public/assets/img/barang/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = '2048';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')){
                $this->upload->display_errors();
            }else{
                $gambar = $this->upload->data('file_name');
                $kode = $this->input->post('kode', true);
                $nama = $this->input->post('nama', true);
                $kategori = $this->input->post('kategori', true);
                $stok = $this->input->post('stok', true);
                $harga = $this->input->post('harga', true);
                $diskon = $this->input->post('diskon', true);
                $deskripsi = $this->input->post('deskripsi', true);

                $data = [
                    'kode' => $kode,
                    'nama' => $nama,
                    'kategori' => $kategori,
                    'stok' => $stok,
                    'harga' => $harga,
                    'diskon' => $diskon,
                    'gambar' => $gambar,
                    'deskripsi' => $deskripsi
                ];

                $this->db->insert('barang', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> anda berhasil, menambahkan barang!</div>');
                redirect('admin/barang');
            }
        }


    }

    public function update($id)
    {
        $data['judul'] = 'SM - Corner | Barang';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['barang'] = $this->db->get_where('barang', ['id' => $id])->row_array();

        $data['kategori'] = ['Aksesoris', 'Atribut', 'Buku', 'Jaket', 'Kain', 'Pakaian'];

        $this->form_validation->set_rules('kode', 'Kode', 'required|trim', [
            'required' => 'Kode tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('stok', 'Stok', 'required|trim', [
            'required' => 'Stok tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim', [
            'required' => 'Harga tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('diskon', 'Diskon', 'required|trim', [
            'required' => 'Diskon tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim', [
            'required' => 'Deskripsi tidak boleh kosong!'
        ]);

        if($this->form_validation->run() == false){
            $this->load->view('templates/admin/header.php', $data);
            $this->load->view('templates/admin/sidebar2.php', $data);
            $this->load->view('templates/admin/topbar.php', $data);
            $this->load->view('admin/update.php', $data);
            $this->load->view('templates/admin/footer.php');
        }else{
            $id = $this->input->post('id', true);
            $kode = $this->input->post('kode', true);
            $nama = $this->input->post('nama', true);
            $kategori = $this->input->post('kategori', true);
            $stok = $this->input->post('stok', true);
            $harga = $this->input->post('harga', true);
            $diskon = $this->input->post('diskon', true);
            $deskripsi = $this->input->post('deskripsi', true);

            // Cek jika ada image
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './public/assets/img/barang/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $old_image = $data['barang']['gambar'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'public/assets/img/barang/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                }else{
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('kode', $kode);
            $this->db->set('nama', $nama);
            $this->db->set('kategori', $kategori);
            $this->db->set('stok', $stok);
            $this->db->set('harga', $harga);
            $this->db->set('diskon', $diskon);
            $this->db->set('deskripsi', $deskripsi);
            $this->db->where('id', $id);
            $this->db->update('barang');

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show col-lg-10" role="alert">
            <strong>Selamat!</strong> barang anda berhasil diupdate!</div>');

            redirect('admin/barang');
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('barang');

        $data['barang'] = $this->db->get_where('barang', ['id' => $id])->row_array();
        $old_image =  $data['barang']['gambar'];
        // if ($old_image != 'default.jpg') {
        //     unlink(FCPATH . 'public/assets/img/barang/' . $old_image);
        // }
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> data barang berhasil dihapus!</div>');
        redirect('admin/barang');
    }

    public function transaksi()
    {
        $data['judul'] = 'SM - Corner | Transaksi';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['status_user'] = $this->db->get_where('alamat_user', ['status' => 2])->result_array();

        $data['alamat_user'] = $this->db->get('alamat_user')->result_array();

        $this->load->view('templates/admin/header.php', $data);
        $this->load->view('templates/admin/sidebar2.php', $data);
        $this->load->view('templates/admin/topbar.php', $data);
        $this->load->view('admin/transaksi.php', $data);
        $this->load->view('templates/admin/footer.php');
    }

    public function detailtransaksi($id)
    {
        $data['judul'] = 'SM - Corner | Detail Transaksi';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['keranjang'] = $this->db->get_where('keranjang', ['id_user' => $id])->result_array();

        $data['transfer'] = $this->db->get_where('alamat_user', ['id_user' => $id])->result_array();

        $this->load->view('templates/admin/header.php', $data);
        $this->load->view('templates/admin/sidebar2.php', $data);
        $this->load->view('templates/admin/topbar.php', $data);
        $this->load->view('admin/detailtransaksi.php', $data);
        $this->load->view('templates/admin/footer.php');
    }

    public function terima($id)
    {
        $this->db->set('status', 1);
        $this->db->where('id_user', $id);
        $this->db->update('alamat_user');
        redirect('Admin/transaksi');
    }

    public function tolak($id)
    {
        $this->db->set('status', 0);
        $this->db->where('id_user', $id);
        $this->db->update('alamat_user');
        redirect('Admin/transaksi');
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
            $this->load->view('templates/admin/sidebar2.php', $data);
            $this->load->view('templates/admin/topbar.php', $data);
            $this->load->view('admin/settings.php', $data);
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

            redirect('admin/settings');
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
                redirect('admin/password');
            }else{
                if ($password_lama == $password_baru) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show col-lg-10" role="alert">
                    <strong>Password!</strong> baru tidak boleh sama dengan password lama!</div>');
                    redirect('admin/password');
                }else{
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show col-lg-10" role="alert">
                    <strong>Password!</strong> anda berhasil diperbarui!</div>');
                    redirect('admin/password');
                }
            }
        }
    }

    public function kasir()
    {
        $data['judul'] = 'SM - Corner | Kasir';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['pemasukan'] = $this->db->get('pemasukan')->result_array();
        $data['kasir'] = $this->db->get('kasir')->result_array();
        $data['bayar'] = $this->db->get('bayar')->result_array();

        if ($this->input->post('keyword')) {
        
        $keyword = $this->input->post('keyword');
        $this->db->like('nama', $keyword);
        $this->db->or_like('kode', $keyword);
        $data['barang'] = $this->db->get('barang')->result_array();
        }

        if ($this->input->post('id_barang')) {
            $jumlah = 1;
            $harga = $this->input->post('harga', true);
            $total = $harga * $jumlah;
            $data = [
                'id_barang' => $this->input->post('id_barang', true),
                'kode' => $this->input->post('kode', true),
                'nama' => $this->input->post('nama', true),
                'jumlah' => $jumlah,
                'harga' => $harga,
                'total' => $total,
                'stok' => $this->input->post('stok', true)
            ];

            $this->db->insert('kasir', $data);
            redirect('admin/kasir');
        }

        if ($this->input->post('id')) {
            $id = $this->input->post('id');
            $jumlah = $this->input->post('jumlah');
            $harga = $this->input->post('harga');

            $total = $jumlah * $harga;

            $this->db->set('total', $total);
            $this->db->set('jumlah', $jumlah);
            $this->db->where('id', $id);
            $this->db->update('kasir');
            redirect('admin/kasir');
        }

        if ($this->input->post('total')) {
            $total_semua = (int) $this->input->post('total', true);
            $bayar = $this->input->post('bayar', true);
            $diskon_rupiah = (int) $this->input->post('diskon_rupiah', true);

            if ($diskon_rupiah) {
                $total_sementara = $total_semua - $diskon_rupiah;
                $total_semua = $total_sementara;
                $kembali = $bayar - $total_semua;
            }else{
                $kembali = $bayar - $total_semua;
            }
            
            $data = [
                'total_semua' => $total_semua,
                'bayar' => $bayar,
                'diskon_rupiah' => $diskon_rupiah,
                'kembali' => $kembali
            ];

            $this->db->insert('bayar', $data);

            $pemasukan_lama = $this->input->post('pemasukan', true);
            $pemasukan_baru = $pemasukan_lama + $total_semua;

            $this->db->set('total', $pemasukan_baru);
            $this->db->where('id', 1);
            $this->db->update('pemasukan');

            // $id_barang = $this->input->post('id_barang', true);
            // $stok_lama = $this->input->post('stok', true);
            // $jumlah = $this->input->post('jumlah', true);

            // $stok_baru = $stok_lama - $jumlah;
            // if($stok_baru < 0){
            //     $stok_baru = 0;
            // }

            // $this->db->set('stok', $stok_baru);
            // $this->db->where('id', $id_barang);
            // $this->db->update('barang');
            redirect('admin/kasir');
        }

        $this->load->view('templates/admin/header.php', $data);
        $this->load->view('templates/admin/sidebar2.php', $data);
        $this->load->view('templates/admin/topbar.php', $data);
        $this->load->view('admin/kasir.php', $data);
        $this->load->view('templates/admin/footer.php');
    }

    public function deletekeranjang($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kasir');
        redirect('admin/kasir');
    }

    public function deletekeranjangall()
    {
        $this->db->empty_table('kasir');
        redirect('admin/kasir');
    }

    public function deleteall()
    {
        $this->db->empty_table('bayar');
        redirect('admin/kasir');
    }

    public function print()
    {
        $data['kasir'] = $this->db->get('kasir')->result_array();
        $data['bayar'] = $this->db->get('bayar')->result_array();
        $this->load->view('admin/print.php', $data);
    }
}