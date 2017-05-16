<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model{
  // public $url, $title, $summary, $content, $created_at, $updated_at;

  public function __construct(){
		parent::__construct();
		$this->load->database();
    $this->load->model('price_model');
    $this->load->model('specification_model');
    $this->load->model('product_image_model');
  }

  public function get($id = FALSE){
    if ($id === FALSE){
      $this->db->from('products');
      $this->db->order_by('updated_at', 'DESC');
      $query = $this->db->get();
      return $query->result_array();
    }

    $query = $this->db->get_where('products', array('id' => $id));
    $result = array('product' => $query->row_array(),
      'prices' => $this->price_model->get($id));
    return $result;
  }

  public function create($data, $images){
    $this->db->trans_start();
    $product = $data['product'];
    $product['created_at'] = (new DateTime())->format('Y-m-d h:m:s');
    $product['category_id'] = 1;
    $this->db->insert('products', $product);
    $product_id = $this->db->insert_id();

    foreach($images['success'] as $image){
      $image_item = array('product_id' => $product_id,
        'filename' => $image['filename'],
        'alt' => $image['alt'],
        'created_at' => (new DateTime())->format('Y-m-d h:m:s'));
      $this->product_image_model->create($image_item);
    }

    foreach($data['prices'] as $price){
      echo "<br/>price: ";
      print_r($price);
      echo "<br/>";
      echo "price per: {$price['per']}<br/>";
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

  public function update($id, $data, $images){
    $this->db->trans_start();
    $product = $data['product'];
    $product['category_id'] = 1;
    // echo "data product:<br/>";
    // print_r($product);
    // echo "<br/>";
    $this->db->where('id', $id);
    $this->db->update('products', $product);

    $product_images = $this->product_image_model->get($id);
    $product_image_ids = array_map(function($val){ return $val['id']; }, $product_images);
    $deleted_image_ids = array_diff($product_image_ids, explode(',', $data['images']));
    $this->product_image_model->_delete($deleted_image_ids);
    foreach($images['success'] as $image){
      $image_item = array('product_id' => $id,
        'filename' => $image['filename'],
        'alt' => $image['alt'],
        'created_at' => (new DateTime())->format('Y-m-d h:m:s'));
      $this->product_image_model->create($image_item);
    }

    foreach($data['prices'] as $price){
      $item = array('price' => $price['price'],
        'per' => $price['per']);
      // echo "data price:<br/>";
      // print_r($item);
      // echo "<br/>";

      // $this->db->where('id', $price_id);
      // echo "price_id: {$price['id']} -- count: ".count($price['id'])."<br/>";
      if(isset($price['id'])){
        // echo "price_id FOUND: {$price['id']}<br/>";
        $this->price_model->update($price['id'], $item);
        // echo "price[specification]: ";
        // print_r($price['specifications']);
        // echo "<br/>";
        // delete deleted specifications
        // how to delete deleted prices??
        $specs = array_filter($price['specifications'], function($val){ return isset($val['id']); });
        // echo "specs filter: ";
        // print_r($specs);
        // echo "<br/>";
        $spec_ids = array_map(function($arr){ return $arr['id']; }, $specs);
        // echo "spec_ids: ";
        // print_r(array_values($spec_ids));
        // echo "<br/>";
        $this->specification_model->_delete($price['id'], $spec_ids);
      }
      else{
        // echo "price_id not found<br/>";
        $item['product_id'] = $id;
        $this->price_model->create($item);
      }

      foreach($price['specifications'] as $specification){
        // $specification['price_id'] = $price_id;
        $item_2 = array('name' => $specification['name'], 'measurement' => $specification['measurement'], 'unit' => $specification['unit']);
        // echo "data specification:<br/>";
        // print_r($item_2);
        // echo "<br/>";

        // echo "<br/>specification['id']: {$specification['id']} -- ".count($specification['id'])."<br/>";
        if(isset($specification['id'])){
          // echo "specification_id FOUND -- {$specification['id']}<br/>";
          $this->specification_model->update($specification['id'], $item_2);
        }
        else{
          // echo "specification_id not found<br/>";
          // echo "price_id: {$price['id']}<br/>";
          $item_2['price_id'] = $price['id'];
          $this->specification_model->create($item_2);
        }
        // echo "<hr/>";
      }
    }
    $this->db->trans_complete();
    if ($this->db->trans_status() === FALSE)
      return FALSE;
    else
      return TRUE;
  }

  public function _delete($id){
    $this->db->trans_start();
    $this->db->where('id', $id);
    $this->db->delete('products');
    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE)
      return FALSE;
    else
      return TRUE;
  }
}
