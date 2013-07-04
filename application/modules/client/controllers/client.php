<?php

class Client extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->model('client_model');
        $feed['record'] = $this->client_model->cgetdata();
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
        $feed['record'] = $this->client_model->cgetdata();
        $this->load->view('client_view', $feed);
    }

    public function cupdatedata($id) {
        $this->load->model('client_model');
        $this->client_model->cupdate($id);
        $feed['record'] = $this->client_model->cgetdata();
        $this->load->view('client_view', $feed);
    }

    public function c_search() {
        $this->load->model('client_model');
        $match = $this->input->post('search');
        $feed['record'] = $this->client_model->cl_search($match);
        if (!$this->client_model->cl_search($match)) {
            $this->load->view('unsucess');
        } else {
            $this->load->view('client_view', $feed);
        }
    }
    
    

}

?>
