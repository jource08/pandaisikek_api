<?php
// extends class Model
class M_kategori extends CI_Model{
// response jika field ada yang kosong
  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }
// function untuk insert data ke tabel kategori
  public function add_kategori($nama){
    if(empty($nama)){
        return $this->empty_response();
      }else{
        $data = array(
          "nama" => $nama
        );
    $insert = $this->db->insert("categories", $data);
    if($insert){
            $response['status']=200;
            $response['error']=false;
            $response['message']='Data kategori ditambahkan.';
            return $response;
          }else{
            $response['status']=502;
            $response['error']=true;
            $response['message']='Data kategori gagal ditambahkan.';
            return $response;
          }
        }
  }

// mengambil semua data kategori
  public function all_kategori(){
    $all = $this->db->get("categories")->result();
        $response['status']=200;
        $response['error']=false;
        $response['kategori']=$all;
        return $response;
    }

    public function get_kategori($id){
      $where = array(
            "id_kategori" => $id
          );
      $this->db->where($where);
        $all = $this->db->get("categories")->result();

        if($all){ 
            $response['status']=200;
            $response['error']=false;
            $response['kategori']=$all;
            return $response;
        }else{
            $response['status']=404;
            $response['error']=true;
            $response['message']='Data tidak ditemukan!';
            return $response;
        }

    }

    // hapus data kategori
  public function delete_kategori($id){
    if($id == ''){
          return $this->empty_response();
        }else{
          $where = array(
            "id_kategori" => $id
          );
    $this->db->where($where);
    $delete = $this->db->delete("categories");
          if($delete){
            $response['status']=200;
            $response['error']=false;
            $response['message']='Data kategori dihapus.';
            return $response;
          }else{
            $response['status']=502;
            $response['error']=true;
            $response['message']='Data kategori gagal dihapus.';
            return $response;
          }
        }
    }
// update kategori
  public function update_kategori($id,$category,$nama_kategori,$deskripsi,$harga,$stok){
    if($id == '' || empty($nama_kategori) || empty($deskripsi) || empty($harga) || empty($stok)){
          return $this->empty_response();
        }else{
          $where = array(
            "id_kategori" => $id
          );
    $set = array(
            "category"    => $category,
            "nama_kategori" => $nama_kategori,
            "deskripsi"   => $deskripsi,
            "harga"       => $harga,
            "stok"        => $stok
          );
    $this->db->where($where);
    $update = $this->db->update("kategori",$set);
          if($update){
            $response['status']=200;
            $response['error']=false;
            $response['message']='Data kategori diubah.';
            return $response;
          }else{
            $response['status']=502;
            $response['error']=true;
            $response['message']='Data kategori gagal diubah.';
            return $response;
          }
        }
    }
}
