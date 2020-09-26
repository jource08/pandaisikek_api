<?php
// extends class Model
class M_Backend_Login extends CI_Model{
// response jika field ada yang kosong
  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }

// Login
    public function get_login($username,$password){
      $where = array(
            "username" => $username,
            "password" => $password,
          );
      $this->db->where($where);
        $all = $this->db->select("nama,jabatan")->get("admin_web")->result();

        if($all){ 
            $response['status']=200;
            $response['error']=false;
            $response['admin_web']=$all;
            return $response;
        }else{
            $response['status']=404;
            $response['error']=true;
            $response['message']='User tidak ditemukan!';
            return $response;
        }

    }

}
