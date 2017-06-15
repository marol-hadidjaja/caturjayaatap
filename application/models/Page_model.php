<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page_model extends CI_Model{
  // public $url, $title, $summary, $content, $created_at, $updated_at;

  public function __construct(){
		parent::__construct();
		$this->load->database();
  }

  public function get_pages($url = FALSE){
    if ($url === FALSE){
      $query = $this->db->get('pages');
      return $query->result_array();
    }

    $url = $url == "home" ? "" : $url;
    $query = $this->db->get_where('pages', array('url' => $url));
    return $query->row_array();
  }

  public function update_page($url, $data){
    $this->db->trans_start();

    $this->db->set($data);
    $url = $url == "home" ? "" : $url;
    $this->db->where('url', $url);
    $query = $this->db->update('pages');

    $this->db->trans_complete();

    if($this->db->trans_status())
      return TRUE;
    else
      return FALSE;
  }
}
