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

    public function get_productUsageByID($id, $sdate, $edate)
    {
        $this->db->where('products_usage.product_id', $id);
        $this->db->select('products_usage.id as prodUsID,products_usage.product_id, products_usage.qty,products_usage.created_at, products.id as prodID, products.productName,products.productType,paddocks.id as paddockID, paddocks.paddockName');
        $this->db->from('products_usage');
        $this->db->join('products', 'products.id = products_usage.product_id');
        $this->db->join('paddocks', 'paddocks.id = products_usage.paddock_id');
        if($sdate != "" && $edate != ""){
            $edate = date('Y-m-d',strtotime($edate)+86400);
            $this->db->where('products_usage.created_at >=',$sdate);
            $this->db->where('products_usage.created_at <',$edate);
        }
        $this->db->order_by('products_usage.created_at', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetch_inventoryReport()
    {
        $this->db->select('event_requests.*,customers.id as custID, customers.customerName');
        $this->db->from('event_requests');
        $this->db->join('customers', 'customers.id = event_requests.customerID');
        //$this->db->join('events', 'events.id = event_requests.eventID');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_paddockFeedByID($id)
    {
        $this->db->where('products_usage.paddock_id', $id);
        $this->db->select('products_usage.id as prodUsID,products_usage.product_id, SUM(products_usage.qty) as usedQty,products_usage.created_at, products.id as prodID, products.productName,products.productType,paddocks.id as paddockID, paddocks.paddockName');
        $this->db->from('products_usage');
        $this->db->join('products', 'products.id = products_usage.product_id');
        $this->db->join('paddocks', 'paddocks.id = products_usage.paddock_id');
        
        $this->db->group_by('products_usage.product_id');
        $this->db->order_by('products_usage.qty', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }


    /*
        Store the record in the database
    */
    public function storeProduction($data)
    {
        $this->db->insert('productions', $data);
        return $this->db->affected_rows();
    }

    /*
        Get an specific record from the database
    */
    public function get($id)
    {
        $this->db->where('id', $id);
        $this->db->select()->from('productions');
        $query = $this->db->get();
        return $query->result_array()[0];
    }

    function totalPayment($id)
    {
        $data = $this->get_production($id);
        $prodId = $data['id'];
        var_dump($prodId);die;
        $query = $this->db->query('select *, sum(amount_paid) as totsum from payments WHERE(production_id="'.$id.'")');
        $info = $query->result_array();
        $totsold = $info[0]['totsum'];
        if(!$totsold){
                $totsold = 0;
        }
        return $totsold;
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