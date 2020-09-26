<?php
require APPPATH . 'libraries/REST_Controller.php';
class Produk extends REST_Controller{
// construct
  public function __construct(){
    parent::__construct();
    $this->load->model('M_produk');
  }

  // method index untuk menampilkan semua data produk menggunakan method get
  public function index_get(){
    $id = $this->get( 'id' );
    if ( !$id ){
      $response = $this->M_produk->all_produk();
    }else{

    $response = $this->M_produk->get_produk(
        $this->get('id')
      );
    }
    $this->response($response);
  }

// untuk menambah produk menaggunakan method post
  public function add_post(){
    $response = $this->M_produk->add_produk(
        $this->post('category'),
        $this->post('nama_produk'),
        $this->post('deskripsi'),
        $this->post('harga'),
        $this->post('stok')
      );
    $this->response($response);
  }

// update data produk menggunakan method put
  public function update_put(){
    $response = $this->M_produk->update_produk(
        $this->put('id'),
        $this->put('category'),
        $this->put('nama_produk'),
        $this->put('deskripsi'),
        $this->put('harga'),
        $this->put('stok')
      );
    $this->response($response);
  }

// hapus data produk menggunakan method delete
  public function delete_delete(){
    $response = $this->M_produk->delete_produk(
        $this->delete('id')
      );
    $this->response($response);
  }
}