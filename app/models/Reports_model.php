<?php


class Reports_model extends CI_Model{
    
    public function __construct()
    {
        
    }
    /*
    Get all the records from the database
    */
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
    
    public function get_verifiedByID($id)
    {
        $this->db->where('id', $id);
        $this->db->select('first_name')->from('users');
        $query = $this->db->get();
        $first_name = $query->row_array();
    }
    
    public function get_allClusters()
    {
        $this->db->select('training_clusters.*, cooperatives.id as copID, cooperatives.cooperative_name');
        $this->db->from('training_clusters');
        $this->db->join('cooperatives', 'cooperatives.id = training_clusters.cooperative_id');
        $this->db->order_by('training_clusters.cluster_name', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_allCooperatives()
    {
        $this->db->select()->from('cooperatives');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function count_farmers_by_cluster($cluster_id)
    {
        $this->db->where('cluster_id', $cluster_id);
        $this->db->select('cluster_id')->from('members');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_clusters_by_cooperative($cooperative_id)
    {
        $this->db->where('cooperative_id', $cooperative_id);
        $this->db->from('training_clusters');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_members_by_cooperative($cooperative_id)
    {
        $this->db->where('cooperative_id', $cooperative_id);
        $this->db->select('cooperative_id')->from('members');
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    /*
    Get an specific record from the database
    */
    public function get_farmersByCooperatives($cooperative_id)
    {
        $this->db->where('members.cooperative_id', $cooperative_id);
        $this->db->select('members.*, cooperatives.id as copID, cooperatives.cooperative_name, users.id, users.first_name as fname, users.last_name as lname, training_clusters.id as clusterID, training_clusters.cooperative_id, training_clusters.cluster_name');
        $this->db->from('members');
        $this->db->join('cooperatives', 'cooperatives.id = members.cooperative_id');
        $this->db->join('users', 'users.id = members.created_by');
        $this->db->join('training_clusters', 'training_clusters.id = members.cluster_id');
        $this->db->order_by('members.id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_farmersByClusters($cluster_id)
    {
        $this->db->where('members.cluster_id', $cluster_id);
        $this->db->select('members.*, cooperatives.id as copID, cooperatives.cooperative_name, users.id, users.first_name as fname, users.last_name as lname, training_clusters.id as clusterID, training_clusters.cooperative_id, training_clusters.cluster_name');
        $this->db->from('members');
        $this->db->join('cooperatives', 'cooperatives.id = members.cooperative_id');
        $this->db->join('users', 'users.id = members.created_by');
        $this->db->join('training_clusters', 'training_clusters.id = members.cluster_id');
        $this->db->order_by('members.id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    /*
    Destroy or Remove a record in the database
    */
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('payments');
        return $this->db->affected_rows();
    }
    
}
?>