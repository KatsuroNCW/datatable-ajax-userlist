<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserDAO extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }

  public function select()
  {
    $query = $this->db->get('user');
    return $query->result();
  }

  public function create($user) {
    return $this->db->insert('user', $user);
  }

  public function update($user) {
    $this->db->where('id', $user->id);
    return $this->db->update('user', $user);
  }

  public function delete($user) {
    return $this->db->delete('user', $user);
  }

}
