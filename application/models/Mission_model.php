<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mission_model extends CI_Model{
  // public $url, $title, $summary, $content, $created_at, $updated_at;

  public function __construct(){
		parent::__construct();
		$this->load->database();
  }

  public function get(){
    $query = $this->db->get('missions');
    return $query->result_array();
  }

  public function create($mission){
    $mission['created_at'] = (new DateTime())->format('Y-m-d h:m:s');
    $this->db->insert('missions', $mission);
    return $this->db->insert_id();
  }

  public function bulk_create($missions){
    $ids = array();
    foreach($missions as $mission){
      $mission['created_at'] = (new DateTime())->format('Y-m-d h:m:s');
      $this->db->insert('missions', $mission);
      array_push($ids, $this->db->insert_id());
    }
    return $ids;
  }

  public function update($id, $data){
    $this->db->set($data);
    $this->db->where('id', $id);
    $query = $this->db->update('missions');
    if($this->db->affected_rows() == 1)
      return TRUE;
    else
      return FALSE;
  }

  public function bulk_update($missions){
    $success_count = 0;
    foreach($missions as $mission){
      $mission_id = $mission['id'];
      unset($mission['id']);
      $this->db->set($mission);
      $this->db->where('id', $mission_id);
      $query = $this->db->update('missions');
      if($this->db->affected_rows() == 1)
        $success_count += 1;
    }

    if($success_count == count($missions))
      return TRUE;
    else
      return FALSE;
  }

  public function _delete($ids){
    $this->db->where_in('id', $ids);
    $this->db->delete('missions');
  }
}
