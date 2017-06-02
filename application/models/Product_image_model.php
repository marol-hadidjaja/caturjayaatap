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

  public function _delete($product_id, $ids){
    $this->db->from('product_images');
    $this->db->where('product_id', $product_id);
    $this->db->where_in("id", $ids);
    $query = $this->db->get();
    $result = $query->result_array();
    if(count($result) > 0){
      foreach($result as $item){
        unlink('./uploads/'.$item['filename']);
        $extension_pos = strrpos($item['filename'], '.'); // find position of the last dot, so where the extension starts
        $thumb = substr($item['filename'], 0, $extension_pos) . '_thumb' . substr($item['filename'], $extension_pos);
        unlink('./uploads/'.$thumb);
      }
    }

    $this->db->where('product_id', $product_id);
    $this->db->where_in("id", $ids);
    $this->db->delete("product_images");
  }
}
