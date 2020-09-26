<?php
require APPPATH . 'libraries/REST_Controller.php';
class Backend_Login extends REST_Controller{
// construct
  public function __construct(){
    parent::__construct();
    $this->load->model('M_Backend_Login');
  }

  // get dt login
  public function login_get(){
      $response = $this->M_Backend_Login->get_login(
        $this->get('username'),
        $this->get('password')
      );
    $this->response($response);
  }

}