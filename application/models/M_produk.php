<?php
// extends class Model
class M_produk extends CI_Model{
// response jika field ada yang kosong
  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }
// function untuk insert data ke tabel produk
  public function add_produk($category,$nama_produk,$deskripsi,$harga,$stok){
    if(empty($category) || empty($nama_produk) || empty($deskripsi) || empty($harga) || empty($stok)){
        return $this->empty_response();
      }else{
        $data = array(
          "category"    => $category,
          "nama_produk" => $nama_produk,
          "deskripsi"   => $deskripsi,
          "harga"       => $harga,
          "stok"        => $stok
        );
    $insert = $this->db->insert("produk", $data);
    if($insert){
            $response['status']=200;
            $response['error']=false;
            $response['message']='Data produk ditambahkan.';
            return $response;
          }else{
            $response['status']=502;
            $response['error']=true;
            $response['message']='Data produk gagal ditambahkan.';
            return $response;
          }
        }
  }

// mengambil semua data produk
  public function all_produk(){
    $all = $this->db->get("produk")->result();
        $response['status']=200;
        $response['error']=false;
        $response['produk']=$all;
        return $response;
    }

    public function get_produk($id){
      $where = array(
            "id_produk" => $id
          );
      $this->db->where($where);
        $all = $this->db->get("produk")->result();

        if($all){ 
            $response['status']=200;
            $response['error']=false;
            $response['produk']=$all;
            return $response;
        }else{
            $response['status']=404;
            $response['error']=true;
            $response['message']='Data tidak ditemukan!';
            return $response;
        }

    }

    // hapus data produk
  public function delete_produk($id){
    if($id == ''){
          return $this->empty_response();
        }else{
          $where = array(
            "id_produk" => $id
          );
    $this->db->where($where);
    $delete = $this->db->delete("produk");
          if($delete){
            $response['status']=200;
            $response['error']=false;
            $response['message']='Data produk dihapus.';
            return $response;
          }else{
            $response['status']=502;
            $response['error']=true;
            $response['message']='Data produk gagal dihapus.';
            return $response;
          }
        }
    }
// update produk
  public function update_produk($id,$category,$nama_produk,$deskripsi,$harga,$stok){
    if($id == '' || empty($nama_produk) || empty($deskripsi) || empty($harga) || empty($stok)){
          return $this->empty_response();
        }else{
          $where = array(
            "id_produk" => $id
          );
    $set = array(
            "category"    => $category,
            "nama_produk" => $nama_produk,
            "deskripsi"   => $deskripsi,
            "harga"       => $harga,
            "stok"        => $stok
          );
    $this->db->where($where);
    $update = $this->db->update("produk",$set);
          if($update){
            $response['status']=200;
            $response['error']=false;
            $response['message']='Data produk diubah.';
            return $response;
          }else{
            $response['status']=502;
            $response['error']=true;
            $response['message']='Data produk gagal diubah.';
            return $response;
          }
        }
    }
}
