<?php

class Payment extends MX_Controller {

    function __construct() {
        if ($this->ion_auth->logged_in()) {

            parent::__construct();
        } else {
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect('auth/login', 'refresh');
        }
    }

    public function index() {
        $limit = 10;
        $n = 4;
        $this->load->model('payment_model');
          $total_records = $this->payment_model->totalData();
         $start = $this->uri->segment($n);
          if (!$start)
                $start = 0;
        $feed['record'] = $this->payment_model->pgetdata($start, $limit);
        $this->load->module('project');
        $this->load->model('project_model');
        $feed['records'] = $this->project_model->getdata();
         $this->load->library('pagination');
             $config['base_url'] = site_url('payment/index/page');
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
        $this->load->view('payment_view', $feed);
    }

    public function payment_insert() {
        $this->load->model('payment_model');
        $feed = $this->payment_model->pinsert();
        echo json_encode($feed);
    }

    public function pdeletedata($id) {
        $this->load->model('payment_model');
        $this->payment_model->pdelete($id);
    }

    public function pupdatedata($id) {
        $this->load->model('payment_model');
        $feed = $this->payment_model->pupdate($id);
        echo json_encode($feed);
        //echo $id;
    }

    public function pay_search() {
       $limit = 10;
        $n = 4;
        $this->load->model('payment_model');
         $start = $this->uri->segment($n);
            if (!$start)
         $start = 0;
        $match = $this->input->post('search');
        $feed['record'] = $this->payment_model->p_search($match,$start,$limit);
        $total_records = $this->payment_model->total_pay($match);
        $this->load->module('project');
        $this->load->model('project_model');
        $feed['records'] = $this->project_model->getdata();
        if (!$this->payment_model->p_search($match,$start,$limit)) {
            $this->load->view('unsucess');
        } else {
               $this->load->library('pagination');
             $config['base_url'] = site_url('payment/index/page');
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
            $this->load->view('payment_view', $feed);
        }
    }

}

?>
