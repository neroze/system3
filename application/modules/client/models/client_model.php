<?php

class Client_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    public function cdelete($id) {
        $this->db->delete('client', array('c_id' => $id));
    }

    public function cgetdata() {
        $this->db->select('*');
        $this->db->from('client');
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }

    public function cinsert() {
       
       $email= $this->input->post('email');
        $data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'email' => $email,
            'phnum' => $this->input->post('phnum'),
            'address' => $this->input->post('address'),
            'city' => $this->input->post('city'),
            'state' => $this->input->post('state'),
            'country' => $this->input->post('country'),
            'Team'=>$this->input->post('Team'),
            'zip'=>$this->input->post('zip'),
            'client_since'=>$this->input->post('client_since')
        );
         $query = $this->db->get_where('client', array('email' => $email));
        $row = $query->row_array();
        if (empty($row)) {
        $this->db->insert('client', $data);
         $id = $this->db->insert_id();
         $quer = $this->db->get_where('client', array('c_id' => $id));
        
        return $quer->result();
        }
    }
    public function cupdate($id) {
       $data = array(
             'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'email' => $this->input->post('email'),
            'phnum' => $this->input->post('phnum'),
            'address' => $this->input->post('address'),
            'city' => $this->input->post('city'),
            'state' => $this->input->post('state'),
            'country' => $this->input->post('country'),
            'Team'=>$this->input->post('Team'),
           'zip'=>$this->input->post('zip'),
            'client_since'=>$this->input->post('client_since')
        );
        $this->db->where('c_id', $id);
        $this->db->update('client', $data);
        $this->db->select('firstname,lastname,email,phnum,zip,country,client_since');
        $query = $this->db->get_where('client', array('c_id' => $id));
        
        return  $query->result();
    }
      
}

?>
