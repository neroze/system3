<?php

class Payment extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
         if ($this->ion_auth->logged_in()) {
        $this->load->model('payment_model');
        $feed['record'] = $this->payment_model->pgetdata();
        $this->load->module('project');
        $this->load->model('project_model');
        $feed['records'] = $this->project_model->getdata();
        $this->load->view('payment_view', $feed);
         }
          else
         {
              $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect('auth/login', 'refresh');
         }
    }

    public function payment_insert() {
        $this->load->model('payment_model');
      $feed= $this->payment_model->pinsert();
      echo json_encode($feed);
    }

    public function pdeletedata($id) {
        $this->load->model('payment_model');
        $this->payment_model->pdelete($id);
    }

    public function pupdatedata($id) {
        $this->load->model('payment_model');
        $feed=$this->payment_model->pupdate($id);
        echo json_encode($feed);
        //echo $id;
    }


    public function pay_search() {
        $this->load->model('payment_model');
        $match = $this->input->post('search');
        $feed['record'] = $this->payment_model->p_search($match);
         $this->load->module('project');
        $this->load->model('project_model');
        $feed['records'] = $this->project_model->getdata();
        if (!$this->payment_model->p_search($match)) {
            $this->load->view('unsucess');
        } else {
            $this->load->view('payment_view', $feed);
        }
    }

}

?>
