<?php

class Project_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function insert() {
        $title = $this->input->post('title');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $budget_amount = $this->input->post('budget_amount');
        $client=$this->input->post('e1');
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
        $this->db->order_by('id');
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }

    public function delete($id) {
        $this->db->delete('project', array('id' => $id));
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
}

?>
