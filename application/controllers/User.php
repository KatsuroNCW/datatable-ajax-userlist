<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->load->view('user/index');
  }

  public function get()
  {
    $users = $this->UserDAO->select();
    $json = array('data' => $users);
    echo json_encode($json);
  }

  public function create()
  {
    $user = $_POST['user'];
    $this->UserDAO->create($user);
    echo '200';
  }

  public function edit()
  {
    $user = (object) $_POST['user'];
    $this->UserDAO->update($user);
    echo '200';
  }

  public function delete()
  {
    $user = $_POST['user'];
    $this->UserDAO->delete($user);
    echo '200';
  }
}
