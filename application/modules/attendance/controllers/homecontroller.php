<?php

class Homecontroller extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        if ($this->ion_auth->logged_in()) {
            $limit = 10;
            $n = 4;
            $this->load->model('HomeModel');

            $this->HomeModel->insert();
            //$this->load->library('uri');
            $total_records = $this->HomeModel->totalData();
            $start = $this->uri->segment($n);
            if (!$start)
                $start = 0;
            $feed ['records'] = $this->HomeModel->getData($start, $limit);
            $feed['record'] = $this->HomeModel->getdate();
            $this->load->library('pagination');

            $config['base_url'] = site_url('Homecontroller/index/page');
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


            $this->load->view('header');
            $this->load->view('HomeView', $feed);
            $this->load->view('footer');
        }
        else {

            //if the login was un-successful
            //redirect them back to the login page
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect('auth/login', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
        }
    }

    public function in() {
        
    }

    public function manage($date = false) {
        if ($date != false) {

            $this->load->model('HomeModel');
            $this->session->set_userdata('date', $date);
            $feed ['records'] = $this->HomeModel->getdate();
            $feed ['record'] = $this->HomeModel->get($date);
            $this->load->view('home', $feed);
        }
    }

    function search() {

        $this->load->model('HomeModel');
        $match = $this->input->post('search');
        $data ['records'] = $this->HomeModel->getdate();
        $data['results'] = $this->HomeModel->get_search($match);

        if (!$this->HomeModel->get_search($match)) {
            $this->load->view('unsucess');
        } else {


            $this->load->view('search', $data);
        }
    }
public function checkdate()
        {
        $this->load->model('HomeModel');
       $date1= $this->input->post('date1');
       $date2=$this->input->post('date2');
       // $match = $this->input->post('checkdate');
        $data ['records'] = $this->HomeModel->getdate();
        $data['results'] = $this->HomeModel->get_check($date1,$date2);

        if (!$this->HomeModel->get_check($date1,$date2)) {
            $this->load->view('unsucess');
        } else {


            $this->load->view('search', $data);
        }
    }
    

        function searche() {

        $this->load->model('HomeModel');
        $match = $this->input->post('search');
        $data ['records'] = $this->HomeModel->getdate();
        $data['results'] = $this->HomeModel->get_searche($match);

        if (!$this->HomeModel->get_searche($match)) {
            $this->load->view('unsucess');
        } else {


            $this->load->view('search', $data);
        }
    }

    public function logout() {
        if ($this->input->post('logout')) {
            $this->load->model('HomeModel');
            $feed ['records'] = $this->HomeModel->getData();
            $feed['record'] = $this->HomeModel->getdate();
            $this->load->library('pagination');
            $this->session->sess_destroy();
           // $this->index();
            $this->load->view('header');
            $this->load->view('HomeView', $feed);
            $this->load->view('footer');
        }
    }

    public function calculate() {
        $this->load->library('pagination');
        $this->load->model('HomeModel');
        $data ['record'] = $this->HomeModel->getData();
        $data ['records'] = $this->HomeModel->getdate();
        $this->load->view('view', $data);
        //$datetime1 = date_create($time1);
        //$datetime2 = date_create($time2);
        //$interval = date_diff($datetime2, $datetime1);
        //return $interval->format($formate);
    }

    public function save($id = "default") {
        $this->load->library('pagination');
        $this->load->model('HomeModel');


        $this->HomeModel->update($id);
        $this->index();
    }

    public function calculate_time_lap() {
       $formate = "%h:%i";
        $in = $this->input->post('checkin');
        foreach ($in as $checkin) {
            $datetime_array1[] = date_create($checkin);
        }

        $out = $this->input->post('checkout');
        foreach ($out as $checkout) {
            $datetime_array2[] = date_create($checkout);
        }
        
        foreach ($datetime_array1 as $key => $datetime1) {
            $datetime2 = $datetime_array2[$key];
            $interva[] = date_diff($datetime2, $datetime1);
        }
        foreach ($interva as $interval) {
            $times[] = $interval->format($formate);
        }
        echo $this->add_time($times);
    }

    public function add_time($times) {

        if (is_array($times)) {

            $length = sizeof($times);
            $hou = '';
            $min = '';
            for ($x = 0; $x < $length; $x++) {
                $split = explode(":", @$times[$x]);
                $hou += @$split[0];
                $min += @$split[1];
                // $this->sec += @$split[2];
            }



//            $seconds = $this->sec % 60;
//			$minutes = $this->sec / 60;
//			$minutes = (integer)$minutes;
            //$minutes += $this->min;
            $minutes = $min;

            $hours = intval($minutes) / intval(60);

            $minutes = $minutes % 60;
            $hours = (integer) $hours;
            $hours += $hou % 24;
            $totaltime = $hours . ":" . $minutes;

            return $totaltime;
        } else {
            echo "Array Expected...";
        }
    }

  

}

?>
