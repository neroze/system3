<?php

class Client extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->model('client_mdl');
        $feed['record'] = $this->client_mdl->cgetdata();
        $this->load->view('header');
        $this->load->view('client_view', $feed);
    }

    public function pro_insert() {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('slug', 'Slug', 'required|valid_email');
        $this->load->model('client_mdl');
        $this->client_mdl->insert();
        $feed['record'] = $this->client_mdl->getdata();
        $feed['records'] = $this->client_mdl->cgetdata();
        $this->load->view('header');
        $this->load->view('project_view', $feed);
    }

    public function deletedata($id) {
        $this->load->model('client_mdl');
        $this->client_mdl->delete($id);
        $feed['record'] = $this->client_mdl->getdata();
        $this->load->view('header');
        $this->load->view('project_view', $feed);
    }

    public function pro_getdata() {
        $this->load->model('client_mdl');
        $feed['record'] = $this->client_mdl->getdata();
        $feed['records'] = $this->client_mdl->cgetdata();
        $this->load->view('header');
        $this->load->view('project_view', $feed);
    }

    public function client_insert() {
        $this->form_validation->set_rules('firstname', 'Firstname', 'required');
        $this->form_validation->set_rules('lastname', 'Lastname', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->load->model('client_mdl');
        $this->client_mdl->cinsert();
        $feed['record'] = $this->client_mdl->cgetdata();
        $this->load->view('header');
        $this->load->view('client_view', $feed);
    }

    public function cdeletedata($id) {
        $this->load->model('client_mdl');
        $this->client_mdl->cdelete($id);
        $feed['record'] = $this->client_mdl->cgetdata();
        $this->load->view('header');
        $this->load->view('client_view', $feed);
    }

    public function payment_getdata() {
        $this->load->model('client_mdl');
        $feed['record'] = $this->client_mdl->pgetdata();
        $feed['records'] = $this->client_mdl->getdata();
        $this->load->view('header');
        $this->load->view('payment_view', $feed);
    }

    public function payment_insert() {
        $this->load->model('client_mdl');
        $this->client_mdl->pinsert();
        $feed['record'] = $this->client_mdl->pgetdata();
        $feed['records'] = $this->client_mdl->getdata();
        $this->load->view('header');
        $this->load->view('payment_view', $feed);
    }

    public function pdeletedata($id) {
        $this->load->model('client_mdl');
        $this->client_mdl->pdelete($id);
        $feed['record'] = $this->client_mdl->pgetdata();
        $this->load->view('header');
        $this->load->view('payment_view', $feed);
    }

    public function cupdatedata($id) {
        $this->load->model('client_mdl');
        $this->client_mdl->cupdate($id);
        $feed['record'] = $this->client_mdl->cgetdata();
        $this->load->view('header');
        $this->load->view('client_view', $feed);
    }

    public function pupdatedata($id) {
        $this->load->model('client_mdl');
        $this->client_mdl->pupdate($id);
        $feed['record'] = $this->client_mdl->pgetdata();
        $feed['records'] = $this->client_mdl->getdata();
        $this->load->view('header');
        $this->load->view('payment_view', $feed);
    }

    public function pro_updatedata($id) {
        $this->load->model('client_mdl');
        $this->client_mdl->pro_update($id);
        $feed['record'] = $this->client_mdl->getdata();
        $feed['records'] = $this->client_mdl->cgetdata();
        $this->load->view('header');
        $this->load->view('project_view', $feed);
    }

    public function pro_search() {
        $this->load->model('client_mdl');
        $match = $this->input->post('search');
        $feed['record'] = $this->client_mdl->search($match);
        $feed['records'] = $this->client_mdl->cgetdata();
        if (!$this->client_mdl->search($match)) {
            $this->load->view('unsucess');
        } else {
            $this->load->view('header');
            $this->load->view('project_view', $feed);
        }
    }

    public function c_search() {
        $this->load->model('client_mdl');
        $match = $this->input->post('search');
        $feed['record'] = $this->client_mdl->cl_search($match);
        if (!$this->client_mdl->cl_search($match)) {
            $this->load->view('unsucess');
        } else {
            $this->load->view('header');
            $this->load->view('client_view', $feed);
        }
    }

    public function pay_search() {
        $this->load->model('client_mdl');
        $match = $this->input->post('search');
        $feed['record'] = $this->client_mdl->p_search($match);
        $feed['records'] = $this->client_mdl->getdata();
        if (!$this->client_mdl->p_search($match)) {
            $this->load->view('unsucess');
        } else {
            $this->load->view('header');
            $this->load->view('payment_view', $feed);
        }
    }

}

?>
