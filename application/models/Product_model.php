<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model{
  // public $url, $title, $summary, $content, $created_at, $updated_at;

  public function __construct(){
		parent::__construct();
		$this->load->database();
    $this->load->model('price_model');
    $this->load->model('specification_model');
    $this->load->model('product_image_model');
    $this->load->model('category_model');
  }

  public function get($id = FALSE, $limit = FALSE){
    if ($id === FALSE){
      $this->db->select('products.*');
      $this->db->from('products');
      // $this->db->join('prices', 'products.id = prices.product_id');
      // $this->db->join('specifications', 'specifications.price_id = prices.id');
      $this->db->order_by('updated_at', 'DESC');
      // $this->db->order_by('products.updated_at DESC, prices.updated_at DESC, specifications.updated_at DESC');
      if($limit)
        $this->db->limit($limit);
      $query = $this->db->get();
      return $query->result_array();
    }

    $this->db->select('products.name AS name, products.id AS product_id, products.description AS description,
      products.hide AS hide, products.featured AS featured,
      categories.id AS category_id, categories.name AS category_name');
    $this->db->join('categories', 'categories.id = products.category_id');
    $query = $this->db->get_where('products', array('products.id' => $id));
    $result = array('product' => $query->row_array(),
      'prices' => $this->price_model->get($id));
    return $result;
  }

  public function get_featured($limit = FALSE){
    $this->db->from('products');
    $this->db->where('featured', true);
    $this->db->order_by('updated_at', 'DESC');
    if($limit)
      $this->db->limit($limit);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_full($id = FALSE){
    if ($id === FALSE){
      $this->db->from('products');
      $this->db->order_by('updated_at', 'DESC');
      $query = $this->db->get();
      $result = $query->result_array();
      foreach($result as $k => $v){
        $result['images'] = $this->product_image_model->get($id);
      }
      return $result;
    }

    /*
    $this->db->select('products.name AS name, products.id AS product_id, ');
    $this->db->join('categories', 'categories.id = products.category_id', 'left');
    */
    $query = $this->db->get_where('products', array('id' => $id));
    $result = array('product' => $query->row_array(),
      'prices' => $this->price_model->get($id));
    return $result;
  }

  public function create($data, $images){
    $this->db->trans_start();
    $product = $data['product'];
    $product['created_at'] = (new DateTime())->format('Y-m-d h:m:s');
    // $product['category_id'] = 1;
    if(is_numeric($product['category']))
      $product['category_id'] = $product['category'];
    else{
      $category_id = $this->category_model->create($product['category']);
      $product['category_id'] = $category_id;
    }
    unset($product['category']);
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
    if(is_numeric($data['product']['category']))
      $product['category_id'] = $data['product']['category'];
    else{
      $category_id = $this->category_model->create($data['product']['category']);
      $product['category_id'] = $category_id;
    }
    unset($product['category']);
    // $product['category_id'] = 1;
    /*
    echo "data product:<br/>";
    print_r($product);
    echo "<br/>";
     */
    $this->db->where('id', $id);
    $this->db->update('products', $product);

    $product_images = $this->product_image_model->get($id);
    /*
    echo "current product_images: ";
    print_r($product_images);
    echo "<br/>";
     */
    $product_image_ids = array_map(function($val){ return $val['id']; }, $product_images);
    /*
    echo "current product_image_ids: ";
    print_r($product_image_ids);
    echo "<br/>";
     */
    $deleted_image_ids = array_diff($product_image_ids, explode(',', $data['images']));
    /*
    echo "deleted_image_ids: ";
    print_r($deleted_image_ids);
    echo "<br/>";
     */
    if(count($deleted_image_ids) > 0)
      $this->product_image_model->_delete($id, $deleted_image_ids);
    /*
    echo "images: ";
    print_r($images);
    echo "<br/>";
     */
    foreach($images['success'] as $image){
      $image_item = array('product_id' => $id,
        'filename' => $image['filename'],
        'alt' => $image['alt'],
        'created_at' => (new DateTime())->format('Y-m-d h:m:s'));
      $this->product_image_model->create($image_item);
    }

    $product_prices = $this->price_model->get($id);
    // echo "price_model last query: ". $this->db->last_query()."<br/>";
    $product_price_ids = array_unique(array_map(function($val){ return $val['price_id']; }, $product_prices));
    /*
    echo "current product_price_ids: ";
    print_r($product_price_ids);
    echo "<br/>";
    echo "data prices:";
    print_r($data['prices']);
    echo "<br/>";
    */
    $h_prices = array_map(function($val){ return $val['id']; }, $data['prices']);
    /*
    echo "h_prices: ";
    print_r($h_prices);
    echo "<br/>";
    */
    $deleted_price_ids = array_diff($product_price_ids, $h_prices);
    if(count($deleted_price_ids) > 0){
      $this->price_model->_delete($deleted_price_ids);
    }
    /*
    echo "deleted_price_ids: ";
    print_r($deleted_price_ids);
    echo "<br/>";
    */
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
