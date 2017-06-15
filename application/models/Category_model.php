<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model{
  public function __construct(){
		parent::__construct();
		$this->load->database();
  }

  public function search($q){
    $this->db->like('name', $q);
    $this->db->order_by('name ASC');
    $query = $this->db->get('categories');
    return $query->result_array();
  }

  public function get($name = FALSE){
    if ($name === FALSE){
      $query = $this->db->get('categories');
      $result = $query->result_array();
      foreach($result as $k => $v){
        $result[$k]['images'] = $this->product_image_model->get($v['id']);
      }
      return $result;
    }

    $this->db->where('name', $name);
    $query = $this->db->get('categories');
    return $query->row();
  }

  public function find_by_id($id){
    $this->db->where('id', $id);
    $query = $this->db->get('categories');
    return $query->row_array();
  }

  public function create($name){
    $category = array('name' => $name, 'created_at' => (new DateTime())->format('Y-m-d h:m:s'));
    $this->db->insert('categories', $category);
    return $this->db->insert_id();
  }
}
