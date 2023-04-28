<?php
if (!defined('BASEPATH'))
    exit ('No direct script access allowed');

class Members extends BASE_Controller
{
    public $hash_key = 'HHZASm9pZ7h!pDpDB3_X$a_4Ash+dNbVnuYy5S%-HUPdNUA2x?';
    public function __construct()
    {
        parent::__construct();  
        $this->load->model('home_model');
        $this->load->model('member_model', 'member');
        $this->load->model('cooperative_model', 'cooperative');
        $this->load->model('member_model', 'member');

    }

    public function generate_hash($password)
    {
        return md5($this->hash_key . $password);
    }

    /*
     * Default method for this controller - Auth
     */
    function index()
    {
        $this->data['members'] = $this->member->get_members();
        $this->data['pg_title'] = "Members";
        $this->data['page_content'] = 'members/index';
        $this->load->view('layout/template', $this->data);
    }

    function addMember()
    {
        $this->data['cooperatives'] = $this->cooperative->get_cooperatives();
        $this->data['clusters'] = $this->cooperative->get_clusters();
        $this->data['pg_title'] = "Home";
        $this->data['page_content'] = 'members/addMember';
        $this->load->view('layout/member', $this->data);
    }

    function get_cooperative_clusters(){
        $cooperative_id = $this->input->post('id',TRUE);
        $data = $this->member->get_cooperative_clusters($cooperative_id)->result();
        echo json_encode($data);
    }

    function myprofile()
    {
        $this->data['pg_title'] = "My Profile";
        $this->data['page_content'] = 'home/myprofile';
        $this->load->view('layout/template', $this->data);
    }

    function editMember()
    {
        $id = $this->input->get('memberID');
        $this->data['member'] = $this->member->get_memberByID($id);
        $this->data['cooperatives'] = $this->cooperative->get_cooperatives();
        $this->data['clusters'] = $this->cooperative->get_clusters();
        $this->data['pg_title'] = "Home";
        $this->data['page_content'] = 'members/editMember';
        $this->load->view('layout/member', $this->data);
    }

    function memberProfile()
    {
        $member_id = $this->input->get('memberID');
        $this->data['savings'] = $this->member->get_memberSavings($member_id);
        $this->data['member'] = $this->member->get_memberByID($member_id);
        $this->data['totsavings'] = $this->member->get_memberTotalSavings($member_id);
        $this->data['loans'] = $this->loans->get_loansByMemberID($member_id);
        $this->data['pg_title'] = "Member Savings";
        $this->data['page_content'] = 'members/memberProfile';
        $this->load->view('layout/template', $this->data);
    }

    function clusterMembers($cluster_id)
    {
        $cluster_id = $this->uri->segment(3);
        //var_dump($cluster_id);die;
        $this->data['members'] = $this->member->get_clusterMembers($cluster_id);
        $this->data['pg_title'] = "Members";
        $this->data['page_content'] = 'members/clusterMembers';
        $this->load->view('layout/template', $this->data);
    }


    function storeMember()
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');  
        $this->form_validation->set_rules('id_number', 'ID/Passport', 'required|is_unique[members.id_number]');
        $this->form_validation->set_rules('county', 'County', 'required');
        $this->form_validation->set_rules('cooperative_id', 'Cooperative', 'required'); 
        $this->form_validation->set_rules('cluster_id', 'Training Cluster', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required'); 
        $this->form_validation->set_rules('phone_number', 'Phone Number ', 'required');        
        $this->form_validation->set_rules('age', 'Age', '');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('members/addMember'));
        } else {
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'id_number' => $this->input->post('id_number'),
                'county' => $this->input->post('county'),
                'cooperative_id' => $this->input->post('cooperative_id'),        
                'cluster_id' => $this->input->post('cluster_id'),
                'gender' => $this->input->post('gender'),              
                'phone_number' => $this->input->post('phone_number'),
                'age' => $this->input->post('age'),
                'created_by' => $this->session->userdata('user_aob')->id,       
            );

            $this->member->store_member($data);
            $this->session->set_flashdata('success', 'Member Added Successfully');
            redirect(base_url('members/index'));
        }
    }

    public function updateMember($id_number)
    {
        $forminput = $this->input->post();
        //var_dump($id_number);die;
        $inserted = $this->member->update_member($id_number, $forminput);
        if ($inserted > 0) {
            $this->session->set_flashdata('success', 'Member Updated successfully');
        } else {
            $this->session->set_flashdata('error', 'Failed, please try again');
        }
        redirect(base_url('members/index'));
    }

    public function deletemember()
    {
        $id = $this->input->get('memberID');

        $inserted = $this->member->delete_member($id);
        if ($inserted > 0) {
            $this->session->set_flashdata('success', 'Member Deleted Successfully');
        } else {
            $this->session->set_flashdata('error', 'Failed, please try again');
        }
        redirect('members/index');

        
    }

}