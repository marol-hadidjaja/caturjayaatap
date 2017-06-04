<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Price_model extends CI_Model{
  public function __construct(){
		parent::__construct();
		$this->load->database();
  }

  public function get($product_id){
    $this->db->select('prices.id AS price_id, prices.price, prices.per,
                       specifications.id, specifications.name, specifications.measurement, specifications.unit');
    $this->db->from('prices');
    $this->db->join('specifications', 'prices.id = specifications.price_id', 'left');
    $this->db->where('prices.product_id', $product_id);
    $this->db->order_by('specifications.id DESC, prices.id DESC');
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

  public function _delete($price_ids){
    $this->db->from('prices');
    $this->db->where_in("id", $price_ids);
    $this->db->delete("prices");
  }
}
