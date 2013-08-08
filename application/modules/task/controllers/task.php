<?php

class Task extends MX_Controller {

    function __construct() {
          if ($this->ion_auth->logged_in()) {
        parent::__construct();
         } else {
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect('auth/login', 'refresh');
        }
    }

    public function index($id) {
      
            $this->load->model('task_model');
            $feed['record'] = $this->task_model->getdata($id);
            $feed['title'] = $this->task_model->gettitle($id);        
            $feed['total'] = $this->task_model->get($id);
            $feed['project_id'] = $id;
           
            $this->load->view('task_view', $feed);
       
    }

   

    public function insert($t_id) {
        $this->load->model('task_model');
        $feed = $this->task_model->t_insert($t_id);
        echo json_encode($feed);
    }

    public function delete($id) {
        $this->load->model('task_model');
        $this->task_model->deletedata($id);
    }

    public function calculate() {

        $work = $this->input->post('working_hour');
        $val = array_sum($work);
        echo $val;
    }

    public function updatedata($id) {
        $this->load->model('task_model');
        $feed = $this->task_model->update($id);
        echo json_encode($feed);
    }

}
?>

