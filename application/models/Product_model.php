<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model{
  // public $url, $title, $summary, $content, $created_at, $updated_at;

  public function __construct(){
		parent::__construct();
		$this->load->database();
    $this->load->model('price_model');
    $this->load->model('specification_model');
  }

  public function get($id = FALSE){
    if ($id === FALSE){
      $query = $this->db->get('products');
      return $query->result_array();
    }

    $query = $this->db->get_where('products', array('id' => $id));
    $result = array('product' => $query->row_array(),
      'prices_count' => $this->price_model->_count($id),
      'specs_count' => $this->specification_model->_count($id));
    return $result;
  }

  public function create($data){
    $this->db->trans_start();
    $product = $data['product'];
    $product['created_at'] = (new DateTime())->format('Y-m-d');
    $product['category_id'] = 1;
    $this->db->insert('products', $product);
    $product_id = $this->db->insert_id();

    foreach($data['prices'] as $price){
      $item = array('price' => $price['price'],
        'per' => $price['per'],
        'product_id' => $product_id);

      $this->price_model->create($item);
      $price_id = $this->db->insert_id();

      foreach($price['specifications'] as $specification){
        $specification['price_id'] = $price_id;
        $this->specification_model->create($specification);
      }
    }
    $this->db->trans_complete();
    if ($this->db->trans_status() === FALSE)
      return FALSE;
    else
      return TRUE;
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
