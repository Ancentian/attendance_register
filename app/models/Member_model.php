<?php

class Member_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }
    /*
        Get all the records from the database
    */
    public function get_members()
    {
        $this->db->select('members.*, cooperatives.id as copID, cooperatives.cooperative_name, users.id, users.first_name as fname, users.last_name as lname, training_clusters.id as clusterID, training_clusters.cooperative_id, training_clusters.cluster_name');
        $this->db->from('members');
        $this->db->join('cooperatives', 'cooperatives.id = members.cooperative_id');
        $this->db->join('users', 'users.id = members.created_by');
        $this->db->join('training_clusters', 'training_clusters.id = members.cluster_id');
        $this->db->order_by('members.id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_cooperative_clusters($cooperative_id){
        $query = $this->db->get_where('training_clusters', array('cooperative_id' => $cooperative_id));
        return $query;
    }

    public function get_memberByID($id)
    {
        $this->db->where('members.id_number', $id);
        $this->db->select('members.*,cooperatives.id as copID, cooperatives.cooperative_name, training_clusters.id as clusterID, training_clusters.cluster_name')->from('members');
        $this->db->join('cooperatives', 'cooperatives.id = members.cooperative_id');
        $this->db->join('training_clusters', 'training_clusters.id = members.cluster_id');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_clusterMembers($cluster_id)
    {
        $this->db->where('members.cluster_id', $cluster_id);
        //$this->db->where('members.cooperative_id', $cooperative_id);
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
        Store the record in the database
    */
    public function store_member($data)
    {
        $this->db->insert('members', $data);
        return $this->db->affected_rows();
    }

    function fetch_userById($id)
    {
        $this->db->where('id', $id);
        $this->db->select()->from('users');
        $query = $this->db->get();
        return $query->result_array()[0];
    }

     function fetchprofile_byId($id)
    {
        $this->db->where('id', $id);
        $this->db->select()->from('users');
        $query = $this->db->get();
        return $query->result()[0];
    }

    function update_member($id_number, $data)
    {
        $this->db->where('id_number', $id_number);
        $this->db->update('members', $data);
        return $this->db->affected_rows();
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

}
?>
