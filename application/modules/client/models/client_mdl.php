<?php

class Client_Mdl extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function insert() {
        $title = $this->input->post('title');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $budget_amount = $this->input->post('budget_amount');
        $client=$this->input->post('select');
        $data = array(
            'title' => $title,
            'start' => $start_date,
            'end' => $end_date,
            'budget_amount' => $budget_amount,
            'cl_id'=>$client
        );
        $query = $this->db->get_where('project', array('title' => $title));
        $row = $query->row_array();
        if (empty($row)) {
            $this->db->insert('project', $data);
            // return $query->result();
        }
    }

    public function getdata() {
        $this->db->select('id,title,client.firstname AS client_firstname,client.lastname AS last, start,end,budget_amount,cl_id');
        $this->db->from('project');
        $this->db->join('client', 'project.cl_id = client.c_id');
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }

    public function delete($id) {
        $this->db->delete('project', array('id' => $id));
    }

    public function cdelete($id) {
        $this->db->delete('client', array('c_id' => $id));
    }

    public function pdelete($id) {
        $this->db->delete('payment', array('p_id' => $id));
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
        $this->db->insert('client', $data);
    }

    public function pgetdata() {
        $this->db->select('p_id,project.title as project_title,amount,paid_date,pro_id');
        $this->db->from('payment');
        $this->db->join('project', 'payment.pro_id = project.id');
       // $this->db->order_by('p_id');
        // $this->db->join('project','project.title=');
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }

    public function pinsert() {
        $amount = $this->input->post('amount');
        $paid_date = $this->input->post('paid_date');
        $project = $this->input->post('select');

        $data = array(
            'paid_date' => $paid_date,
            'amount' => $amount,
            'pro_id' => $project
        );
        $query = $this->db->get_where('payment', array('paid_date' => $paid_date));
        $row = $query->row_array();
        if (empty($row)) {
            $this->db->insert('payment', $data);
        }
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

    public function pupdate($id) {
        $paid_date = $this->input->post('paid_date');
        $amount = $this->input->post('amount');

        $data = array(
            'paid_date' => $paid_date,
            'amount' => $amount
        );
        $this->db->where('p_id', $id);
        $this->db->update('payment', $data);
    }

    public function pro_update($id) {
        $title = $this->input->post('title');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $budget_amount = $this->input->post('budget_amount');
        $data = array(
            'title' => $title,
            'start' => $start_date,
            'end' => $end_date,
            'budget_amount' => $budget_amount
        );
        $this->db->where('id', $id);
        $this->db->update('project', $data);
    }

      public function search($match = "default") {
        $this->db->select('id,title,client.firstname AS client_firstname,client.lastname AS last, start,end,budget_amount,cl_id');
        $this->db->from('project');
        $this->db->like('title', $match);
        $this->db->join('client', 'project.cl_id = client.c_id');
        $query = $this->db->get();
        return $query->result();
    } 
       public function cl_search($match = "default") {
        $this->db->select('*');
        //$this->db->from('client');
        $this->db->like('firstname', $match);
       // $this->db->join('client', 'project.cl_id = client.c_id');
        $query = $this->db->get('client');
        return $query->result_array();
    } 
}

?>
