<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slider_model extends CI_Model{
  // public $url, $title, $summary, $content, $created_at, $updated_at;

  public function __construct(){
		parent::__construct();
		$this->load->database();
  }

  public function get($id = FALSE){
    if ($id === FALSE){
      $query = $this->db->get('sliders');
      return $query->result_array();
    }

    $query = $this->db->get_where('sliders', array('id' => $id));
    return $query->row_array();
  }

  public function create($slider){
    // $slider = array('name' => $name, 'created_at' => (new DateTime())->format('Y-m-d h:m:s'));
    $slider['created_at'] = (new DateTime())->format('Y-m-d h:m:s');
    $this->db->insert('sliders', $slider);
    return $this->db->insert_id();
  }

  public function update($id, $data){
    $this->db->set($data);
    $this->db->where('id', $id);
    $query = $this->db->update('sliders');
    if($this->db->affected_rows() == 1)
      return TRUE;
    else
      return FALSE;
  }

  public function _delete(){
  }
}
