<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends Admin_Controller{
  function __construct(){
    parent::__construct();

    $this->load->model('page_model');
  }

  private function handle_upload($files, $input_name){
    $r = array('status' => '', 'filename' => '');
    $upload_path = './uploads';
    $config = array();
    $config['upload_path'] = $upload_path;
    $config['allowed_types'] = 'jpg|jpeg|png';
    $config['file_name'] = 'about.jpg';

    $image_data = array();
    $is_file_error = FALSE;
    // Check if files are selected or not
    if($files[$input_name]['error'] == 4 || empty($files[$input_name]['name'])) {
      $is_file_error = TRUE;
      $r['status'] = 'error';
      $r['message'] = 'Select an image file.';
    }

    // if file was selected then proceed to upload
    if (!$is_file_error) {
      $this->load->library('upload');
      $this->upload->initialize($config);
      if(!$this->upload->do_upload('image')){
        // if file upload failed then catch the errors
        $image_data = $this->upload->data();
        $file = $upload_path . $image_data['file_name'];
        $r['status'] = 'error';
        $r['message'] = $this->upload->display_errors();
        if(file_exists($file)){
          unlink($file);
        }
      } // close check upload file failed
      else{
        $image_data = $this->upload->data();
        $r['status'] = 'success';
        $r['filename'] = $image_data['file_name'];
      }// close check upload file succeed
    } // close check is_file_error

    return $r;
  }

  public function edit($url){
    $this->middle = 'admin/pages/edit';
    $data = array();
    $data['page'] = $this->page_model->get_pages($url);
    $data['url'] = $url;
    $this->data = $data;
    $this->layout();
  }

  public function update($url){
    $data = array('title' => $this->input->post('title'),
      'summary' => $this->input->post('summary'),
      'content' => $this->input->post('content'));
    $result_upload = $this->handle_upload($_FILES, 'image');
    if($this->page_model->update_page($url, $data))
      $this->session->set_flashdata('message', "Update {$url} succeed");
    else
      $this->session->set_flashdata('message', "Update {$url} failed");

    redirect('admin/dashboard');
  }
}
