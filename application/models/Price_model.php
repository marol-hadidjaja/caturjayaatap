<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Price_model extends CI_Model{
  // public $url, $title, $summary, $content, $created_at, $updated_at;

  public function __construct(){
		parent::__construct();
		$this->load->database();
  }

  public function get($id = FALSE){
    if ($id === FALSE){
      $query = $this->db->get('prices');
      return $query->result_array();
    }

    $query = $this->db->get_where('prices', array('id' => $id));
    return $query->row_array();
  }

  public function _count($product_id){
    $query = $this->db->get_where('prices', array('product_id' => $product_id));
    return $query->num_rows();
  }

  public function create($data){
    $this->db->insert('prices', $data);
  }

  public function update($id, $data){
    $this->db->set($data);
    $this->db->where('id', $id);
    $query = $this->db->update('prices');
    if($this->db->affected_rows() == 1)
      return TRUE;
    else
      return FALSE;
  }
}
