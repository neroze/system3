<?php

class Project extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->model('project_model');
        $feed['record'] = $this->project_model->getdata();
        $this->load->module('client');
        $this->load->model('client_model');
        $feed['records'] = $this->client_model->cgetdata();
        $this->load->view('project_view', $feed);
    }

    public function pro_insert() {
        //$this->form_validation->set_rules('title', 'Title', 'required');
        //$this->form_validation->set_rules('slug', 'Slug', 'required|valid_email');
        $this->load->model('project_model');
        $this->project_model->insert();
//        $feed['record'] = $this->project_model->getdata();
//          $this->load->module('client');
//        $this->load->model('client_model');
//        $feed['records'] = $this->client_model->cgetdata();
//        $this->load->view('project_view', $feed);
    }

    public function deletedata($id) {
        $this->load->model('project_model');
        $this->project_model->delete($id);
        $feed['record'] = $this->project_model->getdata();
          $this->load->module('client');
        $this->load->model('client_model');
        $feed['records'] = $this->client_model->cgetdata();
        $this->load->view('project_view', $feed);
    }

    
    

    public function pro_updatedata($id) {
        $this->load->model('project_model');
        $this->project_model->pro_update($id);
        $feed['record'] = $this->project_model->getdata();
          $this->load->module('client');
        $this->load->model('client_model');
        $feed['records'] = $this->client_model->cgetdata();
        $this->load->view('project_view', $feed);
    }

    public function pro_search() {
        $this->load->model('project_model');
        $match = $this->input->post('search');
        $feed['record'] = $this->project_model->search($match);
        $this->load->module('client');
        $this->load->model('client_model');
        $feed['records'] = $this->client_model->cgetdata();
        if (!$this->project_model->search($match)) {
            $this->load->view('unsucess');
        } else {
            $this->load->view('project_view', $feed);
        }
    }

}

?>
