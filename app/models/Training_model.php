<?php

class Training_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }
    /*
        Get all the records from the database
    */
    public function get_trainings()
    {
        $training = $this->db->order_by('id', 'desc')->get('trainings');
        return $training->result();
    }

    public function trainings()
    {
        $this->db->select()->from('trainings');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_trainers()
    {
        $role_id = 'trainer';
        $trainers = $this->db->get_where('users', array('role_id' => $role_id));
        return $trainers->result();
    }

    public function get_trainingByName($training_id)
    {
        $this->db->where('id', $training_id);
        $this->db->select()->from('trainings');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_trainingSchedules()
    {
        $this->db->select('training_schedules.*, trainings.id as trainID, trainings.training_name, cooperatives.id as coID, cooperatives.cooperative_name, users.id as userID, users.first_name, users.last_name, training_clusters.id as clusterID, training_clusters.cluster_name');
        $this->db->from('training_schedules');
        $this->db->join('trainings', 'trainings.id = training_schedules.training_id');
        $this->db->join('cooperatives', 'cooperatives.id = training_schedules.cooperative_id');
        $this->db->join('users', 'users.id = training_schedules.created_by');
        $this->db->join('training_clusters', 'training_clusters.id = training_schedules.cluster_id');
        $this->db->order_by('training_schedules.id', 'DESC');
        $training = $this->db->get();
        return $training->result();
    }

    public function get_cooperativeMembers($training_id, $cooperative_id, $cluster_id)
    {
        $this->db->where([
            'training_schedules.training_id' => $training_id,
            'training_schedules.cooperative_id' => $cooperative_id,
            'training_schedules.cluster_id' => $cluster_id,
        ])->select('training_schedules.*, members.id as memID, members.first_name, members.last_name, members.id_number, members.cooperative_id, cooperatives.id as copID, cooperatives.cooperative_name, trainings.id as trainID, trainings.training_name, training_clusters.id as clusterID, training_clusters.cluster_name')
          ->from('training_schedules')
          ->join('members', 'members.cooperative_id = training_schedules.cooperative_id')
          ->join('cooperatives', 'cooperatives.id = training_schedules.cooperative_id')
          ->join('trainings', 'trainings.id = training_schedules.training_id')
          ->join('training_clusters', 'training_clusters.id = training_schedules.cluster_id')
          ->order_by('members.first_name', 'ASC');
        return $this->db->get()->result();
    }

    public function get_clusterMembers($training_id, $cooperative_id, $cluster_id)
    {
         $this->db->where([
             //'training_schedules.id' => $training_id,
             'members.cooperative_id' => $cooperative_id,
             'members.cluster_id' => $cluster_id,
         ])->select('members.*, cooperatives.id as copID, cooperatives.cooperative_name,  training_clusters.id as clusterID, training_clusters.cluster_name')
         ->from('members')
           ->join('cooperatives', 'cooperatives.id = members.cooperative_id')
           ->join('training_clusters', 'training_clusters.id = members.cluster_id')
           // ->join('training_schedules', 'training_schedules.cooperative_id = cooperatives.id')
           // ->join('training_schedules', 'training_schedules.cluster_id = training_clusters.id')
           ->order_by('members.first_name', 'ASC');
         return $this->db->get()->result();
    }

    public function get_trainingAttendance($training_id, $cooperative_id, $cluster_id)
    {
        
        $this->db->where([
            'trainings_attendance.training_id' => $training_id,
            'trainings_attendance.cooperative_id' => $cooperative_id,
            'training_schedules.cluster_id' => $cluster_id,
        ])->select('trainings_attendance.*, trainings.id as trainID, trainings.training_name, members.id as memID, members.first_name, members.last_name, members.id_number, members.cluster_id, members.cooperative_id, cooperatives.id as copID, cooperatives.cooperative_name, training_clusters.id as clusterID, training_clusters.cluster_name, training_schedules.id as schID, training_schedules.cooperative_id, training_schedules.cluster_id, training_schedules.training_id')
          ->from('trainings_attendance')
          ->join('trainings', 'trainings.id = trainings_attendance.training_id')
          ->join('members', 'members.id_number = trainings_attendance.member_id')
          ->join('cooperatives', 'cooperatives.id = trainings_attendance.cooperative_id')
          ->join('training_clusters', 'training_clusters.id = members.cluster_id')
          ->join('training_schedules', 'training_schedules.training_id = trainings_attendance.training_id')
          ->order_by('members.first_name', 'ASC');
        return $this->db->get()->result();
    }

    public function attendance_forMembers($schedule_id)
    {
        $this->db->where('trainings_attendance.schedule_id', $schedule_id);
        $this->db->select('trainings_attendance.*, training_schedules.id, training_schedules.cooperative_id, training_schedules.cluster_id, training_clusters.id as clusterID, training_clusters.cluster_name, trainings.id as trainID, trainings.training_name, cooperatives.id as copID, cooperatives.cooperative_name,members.first_name, members.last_name, members.id_number, members.cluster_id, members.cooperative_id');
        $this->db->from('trainings_attendance');
        $this->db->join('training_schedules', 'training_schedules.id = trainings_attendance.schedule_id');
        $this->db->join('training_clusters', 'training_clusters.id = training_schedules.cluster_id');
        $this->db->join('trainings', 'trainings.id = trainings_attendance.training_id');
        $this->db->join('cooperatives', 'cooperatives.id = trainings_attendance.cooperative_id');
        $this->db->join('members', 'members.id_number = trainings_attendance.member_id', 'left');
        $this->db->order_by('members.first_name', 'ASC');
        return $this->db->get()->result();
    }

    public function get_trainingAttendanceBySchedule($schedule_id)
    { 
        $this->db->where('trainings_attendance.schedule_id', $schedule_id);
        $this->db->select('trainings_attendance.*, training_schedules.id, training_schedules.cooperative_id, training_schedules.cluster_id, training_clusters.id as clusterID, training_clusters.cluster_name, trainings.id as trainID, trainings.training_name, cooperatives.id as copID, cooperatives.cooperative_name,members.first_name, members.last_name, members.id_number, members.cluster_id, members.cooperative_id');
        $this->db->from('trainings_attendance');
        $this->db->join('training_schedules', 'training_schedules.id = trainings_attendance.schedule_id');
        $this->db->join('training_clusters', 'training_clusters.id = training_schedules.cluster_id');
        $this->db->join('trainings', 'trainings.id = trainings_attendance.training_id');
        $this->db->join('cooperatives', 'cooperatives.id = trainings_attendance.cooperative_id');
        $this->db->join('members', 'members.id_number = trainings_attendance.member_id', 'left');
        $this->db->order_by('members.first_name', 'ASC');
        return $this->db->get()->result();
    }

    /*
        Store the record in the database
    */
    public function save_training($data)
    {
        $result = $this->db->insert('trainings',$data);
        return $result;
    }

    public function save_schedule($data)
    {
        $this->db->insert('training_schedules', $data);
        return $this->db->affected_rows();
    }

    function update_training(){
        $id = $this->input->post('id');
        $training_name = $this->input->post('training_name');
        $training_date = $this->input->post('training_date');
 
        $this->db->set('training_name', $training_name);
        $this->db->set('training_date', $training_date);
        $this->db->where('id', $id);
        $result=$this->db->update('trainings');
        return $result;
    }

    public function update_attendance($data, $training, $cooperative, $cluster)
    {
        $this->db->where('cooperative_id', $cooperative);
        $this->db->where('cluster_id', $cluster);
        $this->db->where('training_id', $training);
        $this->db->update('training_schedules', array('attendance_status' => $data));

    }

    // public function update_verificationStatus($data, $training, $cooperative, $cluster, $verified_by)
    // {
    //     $this->db->where('cooperative_id', $cooperative);
    //     $this->db->where('cluster_id', $cluster);
    //     $this->db->where('training_id', $training);
    //     $this->db->update('training_schedules', array('verified' => $data, 'verified_by' => $verified_by));
    // }
    public function update_verificationStatus($data, $schedule, $verifiedBy)
    {
        $this->db->where('id', $schedule);
        $updateData = array(
            'verified' => $data,
            'verified_by' => $verifiedBy
        );
        $this->db->update('training_schedules', $updateData);
    }


    public function count_members($id)
    {
        $this->db->where('group_id', $id);
        $query = $this->db->get('members');
        echo $query->num_rows();
    }

    /*
        Delete a record in the database
    */
    public function delete_staff($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
        return $this->db->affected_rows();
    }

    function delete_training(){
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $result=$this->db->delete('trainings');
        return $result;
    }

}
?>
