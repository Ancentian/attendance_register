<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reports extends BASE_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('reports_model', 'reports');
        $this->load->model('training_model');
    }

    /*
       Display all records in page
    */
    public function attendanceReports()
    {
        $this->data['schedules'] = $this->training_model->get_trainingSchedules();
        $this->data['pg_title'] = "Home";
        $this->data['page_content'] = 'reports/attendanceReport';
        $this->load->view('layout/training', $this->data);   
    }

    public function attendanceList()
    {
        $schedule_id = $this->uri->segment(3);
        $cooperative_id = $this->uri->segment(4);
        $cluster_id = $this->uri->segment(5);
        $training_id = $this->uri->segment(6);
        $this->data['attendance'] = $this->training_model->get_trainingAttendanceBySchedule($schedule_id);
        $training = $this->training_model->get_trainingByName($training_id);
        $this->data['name'] = $training['training_name'];
        $this->data['pg_title'] = $training['training_name'];
        $this->data['page_content'] = 'reports/attendanceList';
        $this->load->view('layout/template', $this->data);
    }

    public function trainingReports()
    {

        $this->data['schedules'] = $this->reports->get_trainingSchedules();
        $this->data['pg_title'] = "Trainings Report";
        $this->data['page_content'] = 'reports/trainingsReport';
        $this->load->view('layout/training', $this->data);
    }

    public function clusterReports()
    {
        $this->data['clusters'] = $this->reports->get_allClusters();
        $this->data['pg_title'] = "Cluster Reports";
        $this->data['page_content'] = 'reports/clusterReport';
        $this->load->view('layout/template', $this->data); 
    }

    public function cooperativeReports()
    {
        $this->data['cooperatives'] = $this->reports->get_allCooperatives();
        $this->data['pg_title'] = "Cluster Reports";
        $this->data['page_content'] = 'reports/cooperativeReport';
        $this->load->view('layout/template', $this->data); 
    }

    public function clusterFarmers($cluster_id)
    {
        $this->data['members'] = $this->reports->get_farmersByClusters($cluster_id);
        $this->data['pg_title'] = "Cluster Reports";
        $this->data['page_content'] = 'reports/clusterFarmers';
        $this->load->view('layout/template', $this->data); 
    }

    public function cooperativeFarmers($cooperative_id)
    {
        $this->data['members'] = $this->reports->get_farmersByCooperatives($cooperative_id);
        $this->data['pg_title'] = "Cluster Reports";
        $this->data['page_content'] = 'reports/cooperativeFarmers';
        $this->load->view('layout/template', $this->data); 
    }

    public function paymentReports()
    {
        $sdate = "";$edate = "";
        $forminput = $this->input->get();
        $sdate = $forminput['sdate'];
        $edate = $forminput['edate'];
        $this->data['payments'] = $this->reports->get_allPayments($sdate,$edate);
        $this->data['pg_title'] = "Payment Report";
        $this->data['page_content'] = 'reports/paymentReport';
        $this->load->view('layout/template', $this->data);
    }

    public function sendSummary()
    {
        $todaySales = $this->summary->fetch_todaysIncome();//paid
        $todaysProduction = $this->summary->all_productions_today();
        //var_dump($todaysProduction);die;
        $paidUnpaid = $this->summary->total_incomeProductions();//Total Income(Paid&UnPaid) since Prod Started
        $totalIncome = $this->summary->total_income();//Total Income(Paid) since Production Started
        //var_dump($paidUnpaid);die;
        $totalDue = $paidUnpaid - $totalIncome;
        //$tot = $todaySales + $totalIncome;

        //var_dump($tot);die;
        $time = date("h:i:sa");
        //$tm = "06:36:02pm";

        $smsadmins = $this->employee_model->fetch_admin();
        $rec = $smsadmins['recipients'];
        
         $msg = "AUTOMATED DAILY REPORTS
Embroidery
Today's Income $todaySales

GRAND TOTALS:
Total Income $paidUnpaid
Outstanding Debts: $totalDue
Paid Debts $totalIncome";
//var_dump($msg);die;

        $this->send_message->send($msg, $rec);
    }
    
    
    /*
      Delete a record
    */
    public function deletePayment($id)
    {
        $item = $this->reports->delete($id);
        $this->session->set_flashdata('success-msg', "Deleted Successfully!");
        redirect(base_url('reports/paymentReports'));
    }


}