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
        $client = $this->input->post('e1');
        $data = array(
            'title' => $title,
            'start' => $start_date,
            'end' => $end_date,
            'budget_amount' => $budget_amount,
            'cl_id' => $client
        );
        $query = $this->db->get_where('project', array('title' => $title));
        $row = $query->row_array();
        if (empty($row)) {
            $this->db->insert('project', $data);

            $id = $this->db->insert_id();
            $this->db->select('id,title,client.firstname AS client_firstname,client.lastname AS last, start,end,budget_amount,cl_id');
            $this->db->join('client', 'project.cl_id = client.c_id');
            $this->db->order_by('id');
            $quer = $this->db->get_where('project', array('id' => $id));
            return $quer->result();
        }
    }

    public function getdata($start = -0, $limit = NULL) {
        $this->db->select('id,title,client.firstname AS client_firstname,client.lastname AS last, start,end,budget_amount,cl_id');
//        $this->db->from('project');
        $this->db->join('client', 'project.cl_id = client.c_id');
        $this->db->order_by('id');
        $query = $this->db->get('project', $limit, $start);
//        echo $this->db->last_query();
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
        $this->db->select('title,start,end,budget_amount');
        $query = $this->db->get_where('project', array('id' => $id));
        return $query->result();
    }

    public function pro_detail($id) {
        $this->db->select('id,project.title as Tit,amount,paid_date');
        $this->db->join('project', 'payment.pro_id = project.id');
        $quer = $this->db->get_where('payment', array('pro_id' => $id));
        return $quer->result();
    }

    public function totalData() {

        return $this->db->from('project')->count_all_results();
    }

    public function total_payment($id) {
        $this->db->select('amount,budget_amount');
        $this->db->join('project', 'payment.pro_id = project.id');
        $quer = $this->db->get_where('payment', array('pro_id' => $id));
//        echo $this->db->last_query();
        return $quer->result();
    }

    public function search($match, $start, $limit) {
        $this->db->select('id,title,client.firstname AS client_firstname,client.lastname AS last, start,end,budget_amount,cl_id');
        $this->db->like('title', $match);
        $this->db->join('client', 'project.cl_id = client.c_id');
        return $this->db->get('project', $limit, $start)->result();
    }

    public function total_pro($match) {
        $this->db->select('id,title,client.firstname AS client_firstname,client.lastname AS last, start,end,budget_amount,cl_id');
        $this->db->like('title', $match);
        $this->db->join('client', 'project.cl_id = client.c_id');
        return $this->db->from('project')->count_all_results();
    }

    public function detail($id) {
        $this->db->select('id,project.title as Tit,amount,paid_date');
        $this->db->join('project', 'payment.pro_id = project.id');
        $quer = $this->db->get_where('payment', array('pro_id' => $id));
        return $quer;
    }

    public function total($id) {
        $this->db->select('amount');
        $this->db->join('project', 'payment.pro_id = project.id');
        $quer = $this->db->get_where('payment', array('pro_id' => $id));
        return $quer->result();
    }

}

?>
