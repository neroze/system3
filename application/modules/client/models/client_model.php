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
        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $email = $this->input->post('email');
        $phnum = $this->input->post('phnum');
        $address = $this->input->post('address');
        $country = $this->input->post('country');

        $data = array(
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'phnum' => $phnum,
            'address' => $address,
            'country' => $country
        );
         $query = $this->db->get_where('client', array('email' => $email));
        $row = $query->row_array();
        if (empty($row)) {
        $this->db->insert('client', $data);
          $id = $this->db->insert_id();
         $quer = $this->db->get_where('client', array('c_id' => $id));
        return $quer->result();
        }
//        $id = $this->db->insert_id();
//         $quer = $this->db->get_where('payment', array('p_id' => $id));
//        return $quer->result();
    }
    public function cupdate($id) {
        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $email = $this->input->post('email');
        $phnum = $this->input->post('phnum');
        $address = $this->input->post('address');
        $country = $this->input->post('country');

        $data = array(
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'phnum' => $phnum,
            'address' => $address,
            'country' => $country
        );
        $this->db->where('c_id', $id);
        $this->db->update('client', $data);
    }
       public function cl_search($match = "default") {
        $this->db->select('*');
        $this->db->from('client');
        $this->db->like('firstname', $match);
       // $this->db->join('client', 'project.cl_id = client.c_id');
        $query = $this->db->get();
        return $query->result();
    } 
}

?>
