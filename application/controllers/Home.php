<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  public function index(){
    $this->load->view('home');

  }

  public function insert()
  {

    $this->form_validation->set_rules(
      [
        array(
          'field' => 'name',
          'label' => 'Name',
          'rules' => 'required|trim'
        ),
        array(
          'field' => 'email',
          'label' => 'Email',
          'rules' => 'required|trim|Valid_email'
        ),
        array(
          'field' => 'contact',
          'label' => 'Contact',
          'rules' => 'required|trim|max_length[10]|min_length[10]'
        )
      ]
    );
    if ($this->form_validation->run()) {
      $data = $this->input->post(null, true);
      unset($data['insert']);
      $this->load->model('usermodel');
      $this->usermodel->saveUser($data);
      $output = array('status'=>'success','msg'=>'Record Saved successfully');
      echo json_encode($output);
      return null;
    } else {

      $output = array('status'=>'fail','error'=>form_error('contact'));
      echo json_encode($output);
      die();
    }
  }

  public function fetchUsers(){
    $this->load->model('usermodel');
    $result = $this->usermodel->fetchUsers();
    if ($result) {
      // code...
      $output = array('status'=>'success','result'=>$result);
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
