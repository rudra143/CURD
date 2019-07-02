<?php

class Usermodel extends CI_Model{

    public function saveUser($data) {

        $this->db->trans_start();
  
        $this->db->insert('info',$data);
  
        $this->db->trans_complete();
  
        return $this->db->trans_status();
    
    }

    public function fetchUsers() {
    
        $query = $this->db->get('info');
        $results = $query->result_array();
        $records = [];
        foreach($results as $result){
            $records[] = $result;
        }
        return $records;

    }

    public function update($id, $data) {

        $this->db->trans_start();
  
        $query = $this->db->where('id',$id)->update('info', $data);
  
        $this->db->trans_complete();
  
        return $this->db->trans_status();
        
    }

    public function deleteUser($id){

        $this->db->trans_start();
  
        $query = $this->db->where('id',$id)->delete('info');
  
        $this->db->trans_complete();
  
        return $this->db->trans_status();

    }

}

 ?>
