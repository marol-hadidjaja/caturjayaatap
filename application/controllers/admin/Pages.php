<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends Admin_Controller{
  function __construct(){
    parent::__construct();

    $this->load->model('page_model');
  }

  private function handle_upload($files, $input_name){
    $r = array('status' => '', 'filename' => '', 'message' => '');
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
      $r['status'] = 'success';
      // $r['message'] = 'Select an image file.';
    }

    // if file was selected then proceed to upload
    if (!$is_file_error) {
      $this->load->library('upload');
      $this->upload->initialize($config);
      $this->upload->overwrite = true;
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

        // Resize file
        $image_lib_config = array();
        $image_lib_config['image_library'] = 'gd2';
        $image_lib_config['source_image'] = $image_data['full_path']; //get original image
        $image_lib_config['maintain_ratio'] = TRUE;
        $image_lib_config['width'] = 150;
        $image_lib_config['height'] = 100;
        $image_lib_config['create_thumb'] = TRUE;
        $image_lib_config['thumb_marker'] = '_thumb';
        $image_lib_config['master_dim'] = 'height';
        $image_lib_config['remove_spaces'] = TRUE;
        $this->load->library('image_lib');
        $this->image_lib->initialize($image_lib_config);

        if (!$this->image_lib->resize()) {
          // $this->handle_error($this->image_lib->display_errors());
          $r['status'] = 'error';
          $r['message'] = $this->image_lib->display_errors();
          //$r['filename'] = $image_data['orig_name']);
        }
        else{
          $r['status'] = 'success';
          $r['filename'] = $image_data['file_name'];
        }
        // $r['status'] = 'success';
        // $r['filename'] = $image_data['file_name'];
      }// close check upload file succeed
    } // close check is_file_error

    return $r;
  }

  public function edit($url){
    $this->middle = 'admin/pages/edit';
    $this->data['page'] = $this->page_model->get_pages($url);
    $this->data['url'] = $url;
    $this->data['title'] = 'CJA Admin - Edit Page '.$this->data['page']['title'];
    $this->layout();
  }

  public function update($url){
    $data = array('title' => $this->input->post('title'),
      'summary' => $this->input->post('summary'),
      'content' => $this->input->post('content'));
    $result_upload = $this->handle_upload($_FILES, 'image');
    // echo ($url == 'about' && $result_upload['status'] == 'success') ? 'true I<br/>' : 'false I<br/>';
    // echo $url != 'about' ? 'true II<br/>' : 'false II<br/>';
    // echo $this->page_model->update_page($url, $data) ? 'true III<br/>' : 'false II<br/>';
    /*
    if((($url == 'about' && $result_upload['status'] == 'success') ||
       $url != 'about') && $this->page_model->update_page($url, $data)){
      $this->session->set_flashdata('message_success', "Update {$url} succeed");
    }
    else{
      $message = "Update {$url} failed";
      if($result_upload['status'] == 'error')
        $message .= ": ".$result_upload['message'];
      $this->session->set_flashdata('message_fail', $message);
    }
    */
    if($url == 'about'){
      if($result_upload['status'] == 'success' && $this->page_model->update_page($url, $data)){
        $this->session->set_flashdata('message_success', "Update {$url} succeed");
      }
      else{
        $upload_message = trim(strip_tags($result_upload['message']));

        if(strpos($upload_message, 'exceeds the maximum') != null && strpos($upload_message, 'exceeds the maximum') >= 0)
          $upload_message = 'Maximum file size: 2MB';

        $message = "Update {$url} failed: ".$upload_message;
        $this->session->set_flashdata('message_fail', $message);
      }
    }
    else{
      if($this->page_model->update_page($url, $data)){
        $this->session->set_flashdata('message_success', "Update {$url} succeed");
      }
      else{
        $this->session->set_flashdata('message_fail', "Update {$url} failed");
      }
    }

    redirect('admin/dashboard');
  }
}
