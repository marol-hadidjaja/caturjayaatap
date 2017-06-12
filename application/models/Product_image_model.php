<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_image_model extends CI_Model{
  // public $url, $title, $summary, $content, $created_at, $updated_at;
  // public $table_name = 'product_images';
  public $table_name = 'category_images';

  public function __construct(){
		parent::__construct();
		$this->load->database();
  }

  public function get($product_id){
    $this->db->from($this->table_name);
    // $this->db->where('product_id', $product_id);
    $this->db->where('category_id', $product_id);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function bulk_create($images, $category_id){
    $result = array();

    foreach($images as $image){
      $image_item = array('category_id' => $category_id,
        'filename' => $image['filename'],
        'alt' => $image['alt'],
        'created_at' => (new DateTime())->format('Y-m-d h:m:s'));
      $this->db->insert($this->table_name, $image_item);

      array_push($result, $this->db->insert_id());
    }

    return $result;
  }

  public function create($data){
    $this->db->insert($this->table_name, $data);
  }

  public function _delete($product_id, $ids){
    $this->db->from($this->table_name);
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
    $this->db->delete($this->table_name);
  }

  public function delete_by_id($id){
    $this->db->from($this->table_name);
    $this->db->where('id', $id);
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

    $this->db->where('id', $id);
    $this->db->delete($this->table_name);
  }
}
