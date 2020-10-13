<?php
require APPPATH . 'libraries/REST_Controller.php';
class Kategori extends REST_Controller{
// construct
  public function __construct(){
    parent::__construct();
    $this->load->model('M_kategori');
  }

  // method index untuk menampilkan semua data kategori menggunakan method get
  public function index_get(){
    $id = $this->get( 'id' );
    if ( !$id ){
      $response = $this->M_kategori->all_kategori();
    }else{

    $response = $this->M_kategori->get_kategori(
        $this->get('id')
      );
    }
    $this->response($response);
  }

// untuk menambah kategori menaggunakan method post
  public function add_post(){
    $response = $this->M_kategori->add_kategori(
        $this->post('nama'),
        $this->post('status')
      );
    $this->response($response);
  }

// update data kategori menggunakan method put
  public function update_put(){
    $response = $this->M_kategori->update_kategori(
        $this->put('id_kategori'),
        $this->put('nama')
      );
    $this->response($response);
  }

// hapus data kategori menggunakan method delete
  public function delete_delete(){
    $response = $this->M_kategori->delete_kategori(
        $this->delete('id_kategori')
      );
    $this->response($response);
  }
}