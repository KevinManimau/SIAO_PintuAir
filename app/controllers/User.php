<?php

class User extends Controller{
    public function __construct()
    {
        if(is_null($_SESSION['info']['uname']) && is_null($_SESSION['info']['pass'])){
            header('Location: ' . BASEURL . 'Auth');
            exit;
        }
        if($_SESSION['info']['role'] !== 'ADMIN'){
            header('Location: ' . BASEURL . 'Auth/page404');
        }
    }
    public function index()
    {
        $data['title'] = 'User Management';
        $data['user'] = $this->model('User_model')->getAllUserElseManager();
        $this->view('templates/header',$data);
        $this->view('templates/topbar',$data);
        $this->view('templates/menus');
        $this->view('user/index',$data);
        $this->view('templates/footer');
    }
    public function hapus($id)
    {
        if($this->model('User_model')->hapusDatabyID($id) > 0){
                Flasher::setFlash('Berhasil','dihapus','secondary','fa fa-trash');
                header('Location: ' . BASEURL . 'User');
                exit;
        }else{
            Flasher::setFlash('Gagal','dihapus','danger','icon-close');
            header('Location: ' . BASEURL . 'User');
            exit;
        }
        
    }
    public function tambah(){
        if($this->model('User_model')->tambahDataUsers($_POST) > 0){
            Flasher::setFlash('Berhasil','ditambah','secondary','fa fa-trash');
            header('Location: ' . BASEURL . 'User');
            exit;
        }else{
            Flasher::setFlash('Gagal','ditambah','danger','icon-close');
            header('Location: ' . BASEURL . 'User');
            exit;
        } 
    }
    public function ubah(){
        if($this->model('User_model')->ubahDataUsers($_POST) > 0){
            Flasher::setFlash('Berhasil','diedit','secondary','fa fa-trash');
            header('Location: ' . BASEURL . 'User');
            exit;
        }else{
            Flasher::setFlash('Gagal','diedit','danger','icon-close');
            header('Location: ' . BASEURL . 'User');
            exit;
        } 
    }
    public function getUbah(){
        echo json_encode($this->model('User_model')->getUserbyId($_POST['id']));
    }
}