<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  public function index(){
    $this->load->view('home', ['title'=>'Home']);

  }

  public function insert()
  {

    if ($this->form_validation->run('signup')) {
        $data = $this->input->post(null, true);
        unset($data['insert']);
        $this->load->model('usermodel');
        $this->usermodel->saveUser($data);
        $output = array('status'=>'success','msg'=>'Record Saved successfully');
        echo json_encode($output);
        return null;
    } else {
      
      	$output = array('status'=>'fail','error'=>validation_errors());
      	echo json_encode($output);
      	die();
    }
  }

  public function fetchUsers(){
	$this->load->model('usermodel');
	$results = $this->usermodel->fetchUsers();
	if ($results) {
	// code...
	$output = array('data'=> $results);
	echo json_encode($output);
	return null;
	} else {
	$output = array('status'=>'fail');
	echo json_encode($output);
	}
  }

  public function updateUser() {
      $id = $_POST['id'];
      $this->load->model('usermodel');
      $result = $this->usermodel->updateUser($id);
      if ($result) {
        $output = array('status'=>'success','result'=>$result);
        echo json_encode($output);
        return null;
      } else {
        $output = array('status'=>'fail');
        echo json_encode($output);
        return null;
      }
  }

  public function updateUserData() {
      $id = $_POST['id'];
      $data = array(
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'contact' => $_POST['contact']
      );
      $this->load->model('usermodel');
      $result = $this->usermodel->update($id, $data);
      if ($result) {
        $output = array('status'=>'success','result'=>$result);
        echo json_encode($output);
        return null;
      } else {
        $output = array('status'=>'fail');
        echo json_encode($output);
        return null;
      }
  }

  public function delete()
  {

  }


}
?>
