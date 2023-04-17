<?php

class Cooperative_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }
    /*
        Get all the records from the database
    */
    public function get_cooperatives()
    {
        $cooperative = $this->db->get('cooperatives');
        return $cooperative->result();
    }

    public function get_clusters()
    {
        $this->db->select('training_clusters.*, cooperatives.id as copID, cooperatives.cooperative_name,users.id as uID, users.first_name, users.last_name');
        $this->db->from('training_clusters');
        $this->db->join('cooperatives', 'cooperatives.id = training_clusters.cooperative_id');
        $this->db->join('users', 'users.id = training_clusters.trainer_id');
        $this->db->order_by('training_clusters.id', 'DESC');
        $cluster = $this->db->get();
        return $cluster->result();
    }

    /*
        Store the record in the database
    */
    public function save_cooperative()
    {
        $data = array(
                'cooperative_name'  => $this->input->post('cooperative_name'), 
                'location' => $this->input->post('location'), 
            );
        $result = $this->db->insert('cooperatives',$data);
        return $result;
    }

    public function save_cluster($clusterdata)
    {
        
        $result = $this->db->insert('training_clusters',$clusterdata);
        return $result;
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
