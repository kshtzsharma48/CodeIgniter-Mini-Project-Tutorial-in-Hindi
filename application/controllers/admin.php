<?php

class admin extends MY_controller
{
  
 public function welcome()
 {
    
  $this->load->model('loginmodel','ar');
  $articles=$this->ar->articleList();
  $this->load->view('admin/dashboard',['articles'=>$articles]);
 }

 public function adduser()
 {
    
   $this->load->view('admin/add_article');
  
 }
 public function userValidation()
 {

  if($this->form_validation->run('add_article_rules'))
  {
      $post=$this->input->post(); 
      $this->load->model('loginmodel','useradd');
      if($this->useradd->add_articles($post))
      {
         $this->session->set_flashdata('msg','Articles added successfully');
          $this->session->set_flashdata('msg_class','alert-success');
      }
      else
      {
         $this->session->set_flashdata('msg','Articles not added Please try again!!');
         $this->session->set_flashdata('msg_class','alert-danger');
      }
      return redirect('admin/welcome');
}
  else
  {
   $this->load->view('admin/add_article');
  }

 }
 
 public function edituser()
 {

 }
 public function deluser()
 {


 }
 public function __construct()
  {
    parent::__construct();
    if( ! $this->session->userdata('id') )
    return redirect('login');
    
  }
  public function logout()
  {
    $this->session->unset_userdata('id');
    return redirect('login');
  }
 

	
}


?>