<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting_model extends CI_Model{
  // public $url, $title, $summary, $content, $created_at, $updated_at;

  public function __construct(){
		parent::__construct();
		$this->load->database();
  }

  public function get(){
    $query = $this->db->get('settings');
    return $query->row();
  }

  public function update($data){
    $missions = $data['misi'];
    unset($data['misi']);

    if($missions && count($missions) > 0){
      $new_missions = array_filter($missions,
        function($val, $key){
          return $val['id'] == '';
        },
        ARRAY_FILTER_USE_BOTH);

      $updated_missions = array_filter(
        $missions,
        function ($val, $key){
          return $val['id'] != '';
        },
        ARRAY_FILTER_USE_BOTH
      );
    }

    $this->db->set($data);
    $query = $this->db->update('settings');
    if($this->db->affected_rows() == 1)
      return TRUE;
    else
      return FALSE;
  }
}
