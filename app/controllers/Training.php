<?php
if (!defined('BASEPATH'))
    exit ('No direct script access allowed');

class Training extends BASE_Controller
{
    public function __construct()
    {
        parent::__construct();  
        $this->load->model('home_model');
        $this->load->model('member_model', 'member');
        $this->load->model('training_model');
        $this->load->model('cooperative_model', 'cooperative');
        //$this->load->library('uri');
    }

    /*
     * Default method for this controller - Auth
     */
    function index()
    {
        $this->data['pg_title'] = "Training";
        $this->data['page_content'] = 'trainings/index';
        $this->load->view('layout/training', $this->data);
    }


    function scheduleTraining()
    {
        $this->data['cooperatives'] = $this->cooperative->get_cooperatives();
        $this->data['trainings'] = $this->training_model->get_trainings();
        $this->data['pg_title'] = "Training";
        $this->data['page_content'] = 'trainings/scheduleTraining';
        $this->load->view('layout/member', $this->data);
    }

    function addSchedule()
    {
        $this->data['cooperatives'] = $this->cooperative->get_cooperatives();
        $this->data['trainings'] = $this->training_model->get_trainings();
        $this->data['trainers'] = $this->training_model->get_trainers();
        $this->data['pg_title'] = "Home";
        $this->data['page_content'] = 'trainings/addSchedule';
        $this->load->view('layout/member', $this->data);
    }

    function training_data(){
        $data = $this->training_model->get_trainings();
        echo json_encode($data);
    }

    function trainingSchedules()
    {
        $this->data['schedules'] = $this->training_model->get_trainingSchedules();
        $this->data['pg_title'] = "Home";
        $this->data['page_content'] = 'trainings/trainingSchedules';
        $this->load->view('layout/training', $this->data);
    }

    function mark_trainingAttendance($training_id, $cooperative_id, $cluster_id)
    {
        $training_id = $this->uri->segment(3);
        $cooperative_id = $this->uri->segment(4);
        $cluster_id = $this->uri->segment(5);
        $schedule_id = $this->uri->segment(6);
        $this->data['members'] = $this->training_model->get_clusterMembers($training_id, $cooperative_id, $cluster_id);
        $this->data['training_id'] = $training_id;
        $this->data['schedule_id'] = $schedule_id;
        $this->data['pg_title'] = "Mark Attendance";
        $this->data['page_content'] = 'trainings/markAttendance';
        $this->load->view('layout/template', $this->data);
    }

    public function trainingAttendance()
    {
        $schedule_id = $this->uri->segment(3);
        $cooperative_id = $this->uri->segment(4);
        $cluster_id = $this->uri->segment(5);
        $training_id = $this->uri->segment(6);
        $this->data['attendance'] = $this->training_model->get_trainingAttendanceBySchedule($schedule_id);
        $training = $this->training_model->get_trainingByName($training_id);
        $this->data['name'] = $training['training_name'];
        $this->data['pg_title'] = "Mark Attendance";
        $this->data['page_content'] = 'trainings/trainingAttendance';
        $this->load->view('layout/template', $this->data);
    }

    public function attendanceList($training_id, $cooperative_id, $cluster_id)
    {
        $training_id = $this->uri->segment(3);
        $cooperative_id = $this->uri->segment(4);
        $cluster_id = $this->uri->segment(5);
        // Fetch the attendance data from your model
        $attendance = $this->training_model->get_cooperativeMembers($training_id, $cooperative_id, $cluster_id);
        // Pass the attendance data to a view file that generates the HTML content
        //var_dump($attendance);die;
        $data['attendance'] = $attendance;
        $html = $this->load->view('trainings/attendance_list', $data, true);
        // Return the HTML content
        echo $html;
    }


    function verifyAttendance()
    {
        $this->data['schedules'] = $this->training_model->get_trainingSchedules();
        $this->data['pg_title'] = "Home";
        $this->data['page_content'] = 'trainings/verifyAttendance';
        $this->load->view('layout/training', $this->data);
    }

    public function verify_trainingAttendance()
    {
        $training_id = $this->uri->segment(3);
        $cooperative_id = $this->uri->segment(4);
        $cluster_id = $this->uri->segment(5);
        $schedule_id = $this->uri->segment(6);
        //$this->data['attendance'] = $this->training_model->get_trainingAttendance($training_id, $cooperative_id, $cluster_id);
        $this->data['attendance'] = $this->training_model->get_trainingAttendanceBySchedule($schedule_id);
        $training = $this->training_model->get_trainingByName($training_id);
        $this->data['name'] = $training['training_name'];
        $this->data['schedule_id'] = $schedule_id;
        $this->data['pg_title'] = "Verify Attendance";
        $this->data['page_content'] = 'trainings/verify_trainingAttendance';
        $this->load->view('layout/verify', $this->data);
    }


    function store_training()
    {
        $data = array(
            'training_name'  => $this->input->post('training_name'), 
            'training_date' => $this->input->post('training_date'), 
        );
        $this->training_model->save_training($data);
        if ($data > 0) {
            $this->session->set_flashdata('success', 'Training Added Successfully');
        } else {
            $this->session->set_flashdata('error', 'Failed, please try again');
        }
        echo json_encode($data);
    }

    function storeSchedule()
    {
        $forminput = $this->input->post();

        $cooperative = $forminput['cooperative_id'];
        $cluster = $forminput['cluster_id'];
        $training = $forminput['training_id'];
        $venue = $forminput['venue'];
        $date = $forminput['training_date'];
        $facilitator = $forminput['facilitator'];
        $topic = $forminput['training_topic'];
        $created_by = $this->session->userdata('user_aob')->id;
        $attendance_status = 0;

        $data = array('cooperative_id' => $cooperative, 'cluster_id' => $cluster, 'training_id' => $training, 'venue' => $venue, 'training_date' => $date, 'facilitator' => $facilitator, 'created_by' => $created_by, 'attendance_status' => $attendance_status);

        $this->training_model->save_schedule($data);

        $schedule_id = $this->db->insert_id();

        foreach($topic as $key){
            $this->db->insert('training_topics', ['schedule_id' => $schedule_id, 'training_topic' => $key, 'created_by' => $created_by]);
        }
        $inserted = $this->db->affected_rows();
        if ($inserted > 0) {
            $this->session->set_flashdata('success', 'Training Scheduled Successfully');
        }else{
            $this->session->set_flashdata('error', 'Err! Failed Try Again');
        }
        return redirect('training/trainingSchedules'); 
    }

    function storeAttendance()
    {
        $forminput = $this->input->post();

        $training = $forminput['training_id'];
        $schedule = $forminput['schedule_id'];
        $cooperative = $forminput['cooperative_id'];
        $cluster = $forminput['cluster_id'];
        $member = $forminput['member_id'];
        $attendance = $forminput['attendance_value'];
        $trainer = $this->session->userdata('user_aob')->id;
        //var_dump($attendance);die;
         //Update Attendance Status
        $status = 1;
        $this->training_model->update_attendance($status, $training, $cooperative, $cluster);

        $i = 0;

        foreach ($member as $key) {
            $attend = $attendance[$i];
            $this->db->insert('trainings_attendance', ['training_id' => $training, 'schedule_id' => $schedule, 'cooperative_id' => $cooperative, 'member_id' => $key, 'attendance_value' => $attend, 'marked_by' => $trainer]);
            $i++;
        }

        $inserted = $this->db->affected_rows();
        if ($inserted > 0) {
            $this->session->set_flashdata('success', 'Attendance Marked Successfully');
        }else{
            $this->session->set_flashdata('error', 'Err! Failed Try Again');
        }
        return redirect('training/trainingSchedules');  
    }

    public function update_attendanceVerification()
    {
        $forminput = $this->input->post();

        $status = 1;

        $schedule = $forminput['schedule_id'];

        $verified_by = $this->session->userdata('user_aob')->id;
         //Update Attendance verification Status
        $this->training_model->update_verificationStatus($status, $schedule, $verified_by);

        $inserted = $this->db->affected_rows();
        if ($inserted > 0) {
            $this->session->set_flashdata('success', 'Attendance Verified Successfully');
        }else{
            $this->session->set_flashdata('error', 'Err! Failed Try Again');
        }
        return redirect('training/verifyAttendance');
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