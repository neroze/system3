<?php

class Project extends MX_Controller {

    function __construct() {
        if ($this->ion_auth->logged_in()) {
            parent::__construct();
        } else {
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect('auth/login', 'refresh');
        }
    }

    public function index() {
        $limit = 4;
        $n = 4;
        $this->load->model('project_model');
        $total_records = $this->project_model->totalData();
        $start = $this->uri->segment($n);
        if (!$start)
            $start = 0;
        $feed['record'] = $this->project_model->getdata($start, $limit);
        $this->load->module('client');
        $this->load->model('client_model');
        $feed['records'] = $this->client_model->cgetdata();

        $this->load->library('pagination');
        $config['base_url'] = site_url('project/index/page');
        $config['total_rows'] = $total_records;
        $config['per_page'] = $limit;
        $config['uri_segment'] = 4;
        $config['next_link'] = 'next';
        $config['prev_link'] = 'prev';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li id="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li id="next">';
        $config['next_tag_close'] = '</li>';
        // $config['num_links'] = 2;
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $this->pagination->initialize($config);
        $this->load->view('project_view', $feed);
    }

    public function pro_insert() {
        $this->load->model('project_model');
        $feed = $this->project_model->insert();
        echo json_encode($feed);
    }

    public function deletedata($id) {
        $this->load->model('project_model');
        $this->project_model->delete($id);
    }

    public function details($id) {

        $this->load->model('project_model');
        $feed = $this->project_model->pro_detail($id);
        $paid = $this->project_model->total_payment($id);
        $sum = 0;
        foreach ($paid as $val) {
            $sum += $val->amount;
        }
        $due = $val->budget_amount - $sum;
        $cs = json_encode(array("a" => $feed, "b" => $sum,"c"=>$due));

        echo $cs;
    }

    public function pro_updatedata($id) {
        $this->load->model('project_model');
        $feed = $this->project_model->pro_update($id);
        echo json_encode($feed);
    }

    public function pay_insert() {
        $this->load->model('payment/payment_model');
        $this->payment_model->pinsert();
    }

    public function pro_search() {

        $limit = 4;
        $n = 4;
        $this->load->model('project_model');

        $start = $this->uri->segment($n);
        if (!$start)
            $start = 0;
        $match = $this->input->post('search');
        $feed['record'] = $this->project_model->search($match, $start, $limit);
        $this->load->module('client');
        $this->load->model('client_model');
        $feed['records'] = $this->client_model->cgetdata();
        $total_records = $this->project_model->total_pro($match);
        if (!$this->project_model->search($match, $start, $limit)) {
            $this->load->view('unsucess');
        } else {
            $this->load->library('pagination');
            $config['base_url'] = site_url('project/index/page');
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit;
            $config['uri_segment'] = 4;
            $config['next_link'] = 'next';
            $config['prev_link'] = 'prev';
            $config['first_link'] = false;
            $config['last_link'] = false;
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li id="prev">';
            $config['prev_tag_close'] = '</li>';
            $config['next_tag_open'] = '<li id="next">';
            $config['next_tag_close'] = '</li>';
            // $config['num_links'] = 2;
            $config['cur_tag_open'] = '<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';
            $this->pagination->initialize($config);
            $this->load->view('project_view', $feed);
        }
    }

    public function export($id) {
        $this->load->dbutil();
        $this->load->model('project_model');
        $feed = $this->project_model->detail($id);
//        $data = ltrim(strstr($this->dbutil->csv_from_result($feed, ',', "\r\n"), "\r\n"));
        $data = $this->dbutil->csv_from_result($feed, ',', "\r\n");
        $this->load->helper('download');
        force_download("project_files.csv", $data);
        exit;
    }

}

?>
