<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_image_model extends CI_Model{
  // public $url, $title, $summary, $content, $created_at, $updated_at;

  public function __construct(){
		parent::__construct();
		$this->load->database();
  }

  public function get($product_id){
    $this->db->from('product_images');
    $this->db->where('product_id', $product_id);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function create($data){
    $this->db->insert('product_images', $data);
  }

  public function _delete($ids){
    $this->db->where_not_in("id", $ids);
    $this->db->delete("product_images");
  }
}
