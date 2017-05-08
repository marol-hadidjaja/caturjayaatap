<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Specification_model extends CI_Model{
  // public $url, $title, $summary, $content, $created_at, $updated_at;

  public function __construct(){
		parent::__construct();
		$this->load->database();
  }

  public function get($id = FALSE){
    if ($id === FALSE){
      $query = $this->db->get('specifications');
      return $query->result_array();
    }

    $query = $this->db->get_where('specifications', array('id' => $id));
    return $query->row_array();
  }

  public function _count($product_id){
    $this->db->select('*');
    $this->db->from('specifications');
    $this->db->join('prices', 'prices.id = specifications.price_id');
    $this->db->where('prices.product_id', $product_id);
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function create($data){
    $this->db->insert('specifications', $data);
  }

  public function update($id, $data){
    $this->db->set($data);
    $this->db->where('id', $id);
    $query = $this->db->update('specifications');
    if($this->db->affected_rows() == 1)
      return TRUE;
    else
      return FALSE;
  }
}
