<?php
if (!defined('BASEPATH'))
    exit ('No direct script access allowed');

class Cooperatives extends BASE_Controller
{
    public function __construct()
    {
        parent::__construct();  
        $this->load->model('home_model');
        $this->load->model('member_model', 'member');
        $this->load->model('training_model');
        $this->load->model('cooperative_model');
    }

    function index()
    { 
        $this->data['pg_title'] = "Cooperatives";
        $this->data['page_content'] = 'cooperatives/index';
        $this->load->view('layout/training', $this->data);
    }

    function clusters()
    {
        $this->data['cooperatives'] = $this->cooperative_model->get_cooperatives();
        $this->data['pg_title'] = "Clusters";
        $this->data['page_content'] = 'cooperatives/clusters';
        $this->load->view('layout/training', $this->data);
    }

    function cooperative_data(){
        $data = $this->cooperative_model->get_cooperatives();
        echo json_encode($data);
    }

    function cluster_data(){
        $data = $this->cooperative_model->get_clusters();
        echo json_encode($data);
    }

    function store_cooperative()
    {
        $data = $this->cooperative_model->save_cooperative();
        echo json_encode($data);
    }

    function store_cluster()
    {
        $clusterdata = array(
                'cooperative_id'  => $this->input->post('cooperative_id'), 
                'cluster_name' => $this->input->post('cluster_name'),
                'created_by' => $this->session->userdata('user_aob')->id,
            );
        $data = $this->cooperative_model->save_cluster($clusterdata);
        echo json_encode($data);
    }

    function update(){
        $data = $this->training_model->update_training();
        echo json_encode($data);
    }

    function delete(){
        $data = $this->training_model->delete_training();
        if ($data > 0) {
            $this->session->set_flashdata('success', 'Loan Deleted Successfully');
        } else {
            $this->session->set_flashdata('error', 'Failed, please try again');
        }
        echo json_encode($data);
    }

}