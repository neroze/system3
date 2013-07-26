<?php

class Task_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function t_insert($t_id) {
        if (($this->input->post('status'))== TRUE) {
            $status = 'completed';
        } else {
            $status = 'pending';
        }
        $this->db->insert('task', array(
            'project_id' => $t_id,
            'Task_title' => $this->input->post('task_title'),
            'working_hour' => $this->input->post('working_hour'),
            'status' => $status
            
        ));


        $id = $this->db->insert_id();
      
        $this->db->select('t_id,project.title as project_title,Task_title,working_hour,project_id,status');
        $this->db->join('project', 'task.project_id = project.id');
        $query = $this->db->get_where('task', array('t_id' => $id));
        return $query->result();
    }

    public function getdata($id) {
        $this->db->select('t_id,project.title as project_title,Task_title,working_hour,project_id,status');

        $this->db->join('project', 'task.project_id = project.id');
     
        $query = $this->db->get_where('task', array('project_id' => $id));
        
        $q = $query->result();
         $this->session->set_userdata($q);
        return $q;
    }
    

    public function deletedata($id) {
        $this->db->delete('task', array('t_id' => $id));
    }
     public function update($id) {
            if (($this->input->post('status'))== TRUE) {
            $status = 'completed';
        } else {
            $status = 'pending';
        }
        $work = $this->input->post('working_hour');
        foreach ($work as $hours)
        {
        $data = array(
            'Task_title' => $this->input->post('Task_title'),
            'working_hour' => $hours,
            'status' => $status
            
        );
        }
        $this->db->where('t_id', $id);
        $this->db->update('task', $data);
      
        $this->db->select('t_id,project.title as project_title,Task_title,working_hour,project_id,status');
        $this->db->join('project', 'task.project_id = project.id');
        $query = $this->db->get_where('task',array('t_id'=>$id)); 
        return $query->result();
    }
    
  public function get($id) {
        $this->db->select('working_hour');
        $query = $this->db->get_where('task',array('project_id'=>$id));
         return $query->result();
    }
       public function gettitle($id)
         {
       $this->db->select('title');
       
         $quer = $this->db->get_where('project', array('id' => $id));
            return  $quer->result();
         }
    
}

?>
