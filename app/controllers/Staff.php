<?php
if (!defined('BASEPATH'))
    exit ('No direct script access allowed');

/**
 * @property CI_Session $session
 * @property CI_Input $input
 * @property CI_URI $uri
 * @property CI_Config $config
 * @property CI_DB_mysqli_driver $db
 * @property CI_Form_validation $form_validation
 * @property CI_Security $security
 *
 * This class manages all user module related functions.
 * Data is managed by sending CURL requests to the API; to the relevant endpoint
 */
class Staff extends BASE_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('user_aob')) {
            $this->session->set_flashdata('error-msg', "You must login to continue!");
            redirect('user/index');
        }
        $this->load->model('staff_model');
        $this->load->model('auth_model');
        $this->load->model('cooperative_model', 'cooperative');
        $this->load->model('users_model');
    }

    function index()
    {
        $this->data['users'] = $this->staff_model->fetch_staff();
        $this->data['pg_title'] = "Users";
        $this->data['page_content'] = 'users/index';
        $this->load->view('layout/member', $this->data);
    }

    function addUser()
    {
        $this->data['cooperatives'] = $this->cooperative->get_cooperatives();
        $this->data['pg_title'] = "Add User";
        $this->data['page_content'] = 'users/addUser';
        $this->load->view('layout/member', $this->data);
    }

    function editUser(int $id)
    {
        $this->data['user'] = $this->staff_model->fetch_userById($id);
        $this->data['cooperatives'] = $this->cooperative->get_cooperatives();
        $this->data['pg_title'] = "Edit User";
        $this->data['page_content'] = 'users/editUser';
        $this->load->view('layout/member', $this->data);
    }

    function showUser(int $id)
    {
        $this->data['user'] = $this->staff_model->fetch_userById($id);
        $this->data['cooperatives'] = $this->cooperative->get_cooperatives();
        $this->data['pg_title'] = "Edit User";
        $this->data['page_content'] = 'users/showUser';
        $this->load->view('layout/member', $this->data);
    }

    public function store()
    {
        $forminput = $this->input->post();

        $inserted = $this->staff_model->store_user($forminput);
        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'User Added successfully');
        } else {
            $this->session->set_flashdata('error-msg', 'Failed, please try again');
        }
        return redirect('staff/index');
    }

    function updateUser(int $id)
    {
        $forminput = $this->input->post();

        $inserted = $this->staff_model->update_user($id, $forminput);
        if ($inserted > 0) {
            $this->session->set_flashdata('success', 'User Updated Successfully');
        } else {
            $this->session->set_flashdata('error', 'Failed, please try again');
        }
        redirect('staff/index');
    }

    public function updatePass()
    {
        $this->data['pg_title'] = "Update Password";
        $this->data['page_content'] = 'users/updatePassword';
        $this->load->view('layout/member', $this->data);
    }

    function updatePassword()
    {
        $forminput = $this->input->post();

        //var_dump($forminput);die;

        if ($forminput['password'] != $forminput['pconfirm']) {
            $this->session->set_flashdata('error', 'Passwords do not match!');
            redirect('staff/updatePass');
        }
        $inserted = $this->users_model->updatepass($forminput['password']);
        //var_dump($inserted);die;
        if ($inserted > 0) {
            $this->session->set_flashdata('success', 'Password updated successfully');
        } else {
            $this->session->set_flashdata('error', 'Failed, please try again');
        }
        redirect('home/index');
    }

    function deleteUser($id)
    {
        $inserted = $this->staff_model->delete_staff($id);
        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Staff deleted successfully');
        } else {
            $this->session->set_flashdata('error-msg', 'Failed, please try again');
        }
        redirect('staff/index');
    }

}