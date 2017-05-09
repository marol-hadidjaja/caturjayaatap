<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Price_model extends CI_Model{
  // public $url, $title, $summary, $content, $created_at, $updated_at;

  public function __construct(){
		parent::__construct();
		$this->load->database();
  }

  public function get($product_id){
    /*
    $this->db->select('*');
    $this->db->from('specifications');
    $this->db->join('prices', 'prices.id = specifications.price_id');
    $this->db->where('prices.product_id', $product_id);
    $query = $this->db->get();
    */
    $this->db->select('*');
    $this->db->from('prices');
    $this->db->join('specifications', 'prices.id = specifications.price_id', 'left');
    $this->db->where('product_id', $product_id);
    // $this->db->group_by('specifications.price_id');
    $query = $this->db->get();
    return $query->result_array();
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
