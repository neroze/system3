<?php

class Client extends MX_Controller {

    function __construct() {
        if ($this->ion_auth->logged_in()) {
        parent::__construct();
        }
         else
         {
              $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect('auth/login', 'refresh');
         }
    }

    public function index() {
        
        $limit = 10;
        $n = 4;
        $this->load->model('client_model');
        
         $total_records = $this->client_model->totalData();
         $start = $this->uri->segment($n);

            if (!$start)
         $start = 0;
        $feed['record'] = $this->client_model->cgetdata($start, $limit);
        $feed['country']= $this->client_model->country();
         $feed['state']= $this->client_model->state();
         $feed['astate']= $this->client_model->astate();
         
            $this->load->library('pagination');
             $config['base_url'] = site_url('client/index/page');
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
//            // $config['num_links'] = 2;
            $config['cur_tag_open'] = '<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';
            $this->pagination->initialize($config);
        $this->load->view('client_view', $feed);
         
    }

    public function client_insert() {
        $this->load->model('client_model');
        $feed=$this->client_model->cinsert();
        echo json_encode($feed);
    }

    public function cdeletedata($id) {
        $this->load->model('client_model');
        $this->client_model->cdelete($id);
    }

    public function cupdatedata($id) {
        $this->load->model('client_model');
       $feed= $this->client_model->cupdate($id);
       echo json_encode($feed);
       
    }

    public function c_search() {
        
             $limit = 10;
        $n = 4;
        $this->load->model('client_model');
        
        
         $start = $this->uri->segment($n);

            if (!$start)
         $start = 0;
        $match = $this->input->post('search');
        $feed['record'] = $this->client_model->cl_search($match,$start,$limit);
         $total_records = $this->client_model->total($match);
        if (!$this->client_model->cl_search($match,$start,$limit)) {
            $this->load->view('unsucess');
        } else {
             $this->load->library('pagination');
             $config['base_url'] = site_url('client/c_search/page');
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
//            // $config['num_links'] = 2;
            $config['cur_tag_open'] = '<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';
            $this->pagination->initialize($config);
            $this->load->view('client_view', $feed);
        }
    }
    
    

}

?>
