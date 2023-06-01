<?php
class penjualan extends Controller {

    public function __construct(){

        if($_SESSION['session_login'] != 'sudah_login') {
            
        Flasher::setMessage('Login','Tidak ditemukan.','danger');
        header('location: '. base_url . '/login');
        exit;
        
        }
    }

    public function index(){
        $data['title']='Data Penjualan';
        $data['penjualan']=$this->model('PenjualanModel')->getAllPenjualan();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('penjualan/index', $data);
        $this->view('templates/footer');
    }




    public function tambahPenjualan(){
        $data['title'] = 'Tambah Data Penjualan';
        $data['kategori']=$this->model('KategoriModel')->getAllKategori();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('penjualan/create', $data);
        $this->view('templates/footer');
    }
    public function simpanPenjualan(){
        if( $this->model('PenjualanModel')->tambahPenjualan($_POST) > 0 ){
            Flasher::setMessage('Berhasil','ditambahkan', 'success');
            header('location: ' . base_url . '/penjualan');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/penjualan');
            exit;
        }
    }  



    
    public function editPenjualan($id){
        $data['title'] = 'Detail Data Penjualan';
        $data['kategori']=$this->model('KategoriModel')->getAllKategori();
        $data['penjualan'] = $this->model('PenjualanModel')->getPenjualanById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('penjualan/edit', $data);
        $this->view('templates/footer');
    }
    public function updatePenjualan(){
        if( $this->model('PenjualanModel')->updatePenjualan($_POST) > 0 ){
            Flasher::setMessage('Berhasil','diupdate', 'success');
            header('location: ' . base_url . '/penjualan');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location: ' . base_url . '/penjualan');
            exit;
        }
    }  


    

    public function cariPenjualan(){
        $data['title'] = 'Data Penjualan';
        $data['penjualan'] = $this->model('PenjualanModel')->cariPenjualan();
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('penjualan/index', $data);
        $this->view('templates/footer');
    }
    public function hapuspenjualan($id){
        if( $this->model('PenjualanModel')->deletePenjualan($id) > 0 ){
            Flasher::setMessage('Berhasil','dihapus', 'success');
            header('location: ' . base_url . '/penjualan');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/penjualan');
            exit;
        }
    }  



}
