<?php

class HomeModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function insert() {
        $this->load->helper('file');
        $json = file_get_contents('test/user.json');
        $me = json_decode($json, true);





        foreach ($me as $key => $val) {
            $date = $key;

            foreach ($val as $user => $user_arr) {
                //echo "<pre>";
                // print_r($user_arr);
                $username = $user;
                $checkin = json_encode($user_arr['check_in_time']);
                $checkout = json_encode($user_arr['checked_out_time']);
                $checked = json_encode($user_arr{'checked_in'});
                $worked = json_encode($user_arr['worked_hours']);


                $data = array(
                    'date' => $date,
                    'username' => $username,
                    'checkin' => $checkin,
                    'checkout' => $checkout,
                    'worked' => $worked,
                    'checked' => $checked
                );

                $query = $this->db->get_where('employee', array('username' => $username, 'date' => $date));
                //return $query->result(); 
                $row = $query->row_array();
                //echo $this->db->last_query();


                if (empty($row)) {

                    $this->db->insert('employee', $data);
                    $m = $this->db->last_query();
                }
            }
        }
    }

    public function getdate() {
       $this->db->group_by('date');
       $this->db->distinct();
        $query = $this->db->get('employee');
        return $query->result();
      //  echo $this->db->last_query();
    }

    public function getData($start = -0, $limit = NULL) {
        // $this->db->select( 'id,date,username,checkin,checkout,worked');
        //$this->db->group_by('date');
        // $this->db->distinct();
        $query = $this->db->get('employee', $limit, $start);
        return $query->result();
        //echo $this->db->last_query();
        //die();
    }

    public function get($date) {



        $query = $this->db->get_where('employee', array('date' => $date));
        return $query->result();
    }

    public function totalData() {

        return $this->db->from('employee')->count_all_results();
    }

    public function get_searche($match = 'default') {
        $this->db->select('*');
        // $this->db->from('employee');
        $this->db->like('username', $match);
        // $this->db->or_like('date', $match);
        //$this->db->or_like('checkin', $match);
        // $this->db->or_like('checkout', $match);
        // $this->db->or_like('worked', $match);
        $date = $this->session->userdata('date');
        $query = $this->db->get('employee', array('date' => $date));
        return $query->result_array();
    }

    public function get_search($match = 'default') {
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->like('username', $match);
        //$this->db->or_like('date', $match);
        //$this->db->or_like('checkin', $match);
        // $this->db->or_like('checkout', $match);
        // $this->db->or_like('worked', $match);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function update($id) {
        $checkin =  json_encode($this->input->post('checkin'));
        $checkout = json_encode($this->input->post('checkout'));
        $worked = json_encode($this->input->post('worked'));
      // $id=$this->input->post('id');
        $data = array(
           //'id'=>$id,
            'checkin' => $checkin,
            'checkout' => $checkout,
            'worked' => $worked
        );
        $this->db->where('id',$id);
        $this->db->update('employee', $data);
    }

    public function get_check($date1,$date2)
    {
        $this->db->where("date BETWEEN '$date1' AND '$date2'");
        $query = $this->db->get('employee');
        //echo $this->db->last_query();
        return $query->result_array();
        //echo $this->db->last_query();
    }
    
}
?>

