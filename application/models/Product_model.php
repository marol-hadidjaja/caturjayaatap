<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model{
  // public $url, $title, $summary, $content, $created_at, $updated_at;

  public function __construct(){
		parent::__construct();
		$this->load->database();
  }

  public function get($id = FALSE){
    if ($id === FALSE){
      $query = $this->db->get('products');
      return $query->result_array();
    }

    $query = $this->db->get_where('products', array('id' => $id));
    return $query->row_array();
  }

  public function create($data){
    $this->db->trans_start();
    $this->db->insert('products', $data);
    $this->db->trans_complete();
  }

  public function update($id, $data){
    $this->db->set($data);
    $this->db->where('id', $id);
    $query = $this->db->update('products');
    if($this->db->affected_rows() == 1)
      return TRUE;
    else
      return FALSE;
  }
}
