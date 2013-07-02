<?php

class Payment_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function pdelete($id) {
        $this->db->delete('payment', array('p_id' => $id));
    }

    public function pgetdata() {
        $this->db->select('p_id,project.title as project_title,amount,paid_date,pro_id');
        $this->db->from('payment');
        $this->db->join('project', 'payment.pro_id = project.id');
        $this->db->order_by('p_id');
       // $this->db->order_by('p_id');
        // $this->db->join('project','project.title=');
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }

    public function pinsert() {
        $amount = $this->input->post('amount');
        $paid_date = $this->input->post('paid_date');
        $project = $this->input->post('e1');

        $data = array(
            'paid_date' => $paid_date,
            'amount' => $amount,
            'pro_id' => $project
        );
        $this->db->insert('payment', $data);
        $id = $this->db->insert_id();
        $this->db->select('p_id,project.title as project_title,amount,paid_date,pro_id');
        $this->db->join('project', 'payment.pro_id = project.id');
        $query = $this->db->get_where('payment', array('p_id' => $id));
        return  $query->result();
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

         public function p_search($match = "default") {
        $this->db->select('p_id,project.title as project_title,amount,paid_date,pro_id');
        //$this->db->from('payment');
       // $this->db->from('project');
        $this->db->like('project.title', $match);
        $this->db->join('project', 'payment.pro_id = project.id');
        $query = $this->db->get('payment');
        //echo $this->db->last_query();
        return $query->result();
    } 
}

?>
