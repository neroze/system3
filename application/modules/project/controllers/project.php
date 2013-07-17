<?php

class Project extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
         if ($this->ion_auth->logged_in()) {
        $this->load->model('project_model');
        $feed['record'] = $this->project_model->getdata();
        $this->load->module('client');
        $this->load->model('client_model');
        $feed['records'] = $this->client_model->cgetdata();
        $this->load->view('project_view', $feed);
         }
         else
         {
              $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect('auth/login', 'refresh');
         }
    }

    public function pro_insert() {
        $this->load->model('project_model');
      $feed= $this->project_model->insert();
      echo json_encode($feed);
    }

    public function deletedata($id) {
        $this->load->model('project_model');
        $this->project_model->delete($id);
    }

    
    public function details($id){
        $this->load->model('project_model');
       $feed= $this->project_model->pro_detail($id);
       echo json_encode($feed);
        
    }

    public function pro_updatedata($id) {
        $this->load->model('project_model');
       $feed= $this->project_model->pro_update($id);
        echo json_encode($feed);
    }
    public function pay_insert()
    {
        $this->load->model('payment/payment_model');
        $this->payment_model->pinsert();
    }

//    public function pro_search() {
//        $this->load->model('project_model');
//        $match = $this->input->post('search');
//        $feed['record'] = $this->project_model->search($match);
//        $this->load->module('client');
//        $this->load->model('client_model');
//        $feed['records'] = $this->client_model->cgetdata();
//        if (!$this->project_model->search($match)) {
//            $this->load->view('unsucess');
//        } else {
//            $this->load->view('project_view', $feed);
//        }
//    }

}

?>
