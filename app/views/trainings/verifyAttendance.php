<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Attendance</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('home')?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Attendance</li>
                    </ul>
                </div>
            </div>
        </div>
        <?php if ($this->session->flashdata('error')) { ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
        <?php } ?>
        <!-- Start Toastr Alert -->
        <?php $this->load->view('alert');  ?>
        <!-- End Toastr Alert -->
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-white">
                    <div class="card-header">
                        <h5 class="card-title">Attendance Verification</h5>
                        
                    </div>

                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-top nav-justified">
                            <li class="nav-item"><a class="nav-link active" href="#top-justified-tab1" data-bs-toggle="tab">Verified Attendance</a></li>
                            <li class="nav-item"><a class="nav-link" href="#top-justified-tab2" data-bs-toggle="tab">Un-Verified</a></li>
                            <!-- <li class="nav-item"><a class="nav-link" href="#top-justified-tab3" data-bs-toggle="tab">Messages</a></li> -->
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="top-justified-tab1">
                                <div class="table-responsive">
                                    <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                        <thead class="student-thread">
                                            <tr>
                                                <th>*</th>
                                                <th>Training</th>
                                                <th>Cooperative</th>
                                                <th>Cluster</th>
                                                <th>Training Date</th>
                                                <th>Created By</th>
                                                <th>Status</th>
                                                <th>Verified By</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($schedules as $key) { if($key->created_by == $this->session->userdata('user_aob')->id || $this->session->userdata('user_aob')->role_id == 'admin') {?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <!-- <td><?php //echo strtoupper($key->training_name) ?></a></td> -->
                                                    <?php if($key->verified == 0) {?>
                                                        <td><?php echo strtoupper($key->training_name) ?></td>
                                                        <?php } elseif ($key->verified == 1) { ?>
                                                        <td> <a href="<?php echo base_url('training/trainingAttendance/'.$key->id."/".$key->cooperative_id."/".$key->clusterID."/".$key->training_id) ?>" title="View Attendance" style="color: blue;" onmouseover="this.style.color='red';" onmouseout="this.style.color='blue';"><?php echo strtoupper($key->training_name) ?></a>
                                                        </td>
                                                        <?php }?>
                                                    <td><?php echo $key->cooperative_name?></td>
                                                    <td><?php echo $key->cluster_name?></td> 
                                                    <td><?php echo $key->training_date?></td>
                                                    <td><?php echo $key->first_name." ".$key->last_name?></td>
                                                    <?php if($key->verified == 0) {?>
                                                    <td><span class="badge rounded-pill bg-warning">Pending</span></td>
                                                    <?php } elseif ($key->verified == 1) { ?>
                                                    <td><span class="badge rounded-pill bg-success">Verified</span></td>
                                                    <?php }?>
                                                    <td><?php echo $key->first_name." ".$key->last_name?></td>
                                                    <td class="text-end">
                                                        <div class="actions">
                                                            <!-- Link that triggers the modal -->
                                                            <a href="<?php echo base_url('training/attendanceList/'.$key->training_id."/".$key->cooperative_id."/".$key->clusterID)?>" title="View Attendance" class="btn btn-sm bg-success-light me-2" id="attendanceLink" hidden><i class="feather-eye"></i></a>
                                                            <?php if($key->attendance_status == 1) {?>
                                                            <a href="<?php echo base_url('training/trainingAttendance/'.$key->training_id."/".$key->cooperative_id."/".$key->clusterID) ?>" title="View Attendance" class="btn btn-sm bg-danger-light">
                                                                <i class="feather-eye"></i>
                                                            </a>
                                                            <?php }?>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php $i++; } }?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="top-justified-tab2">
                                    <div class="table-responsive">
                                        <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                            <thead class="student-thread">
                                                <tr>
                                                    <th>*</th>
                                                    <th>Training</th>
                                                    <th>Cooperative</th>
                                                    <th>Cluster</th>
                                                    <th>Training Date</th>
                                                    <th>Created By</th>
                                                    <th>Status</th>
                                                    <!-- <th class="text-end" hidden>Action</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=1; foreach($schedules as $key) { if($key->created_by == $this->session->userdata('user_aob')->id || $this->session->userdata('user_aob')->role_id == 'admin') {?>
                                                    <?php if($key->verified == 0) {?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <?php if($key->attendance_status == 0) {?>
                                                        <td><?php echo strtoupper($key->training_name) ?></td>
                                                        <?php } elseif ($key->attendance_status == 1) { ?>
                                                        <td> <a href="<?php echo base_url('training/verify_trainingAttendance/'.$key->training_id."/".$key->cooperative_id."/".$key->clusterID."/".$key->id) ?>" style="color: blue;" onmouseover="this.style.color='red';" onmouseout="this.style.color='blue';"><?php echo strtoupper($key->training_name) ?></a>
                                                        </td>
                                                        <?php }?>
                                                        <td><?php echo $key->cooperative_name?></td>
                                                        <td><?php echo $key->cluster_name?></td> 
                                                        <td><?php echo $key->training_date?></td>
                                                        <td><?php echo $key->first_name." ".$key->last_name?></td>
                                                        <?php if($key->attendance_status == 0) {?>
                                                        <td><span class="badge rounded-pill bg-danger">Not Marked</span></td>
                                                        <?php } elseif ($key->attendance_status == 1) { ?>
                                                        <td><span class="badge rounded-pill bg-success">Marked</span></td>
                                                        <?php }?>
                                                    </tr>
                                                    <?php $i++; }?>
                                                    <?php } }?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- <div class="tab-pane" id="top-justified-tab3">
                                        Tab content 3
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal custom-modal fade invoices-preview" id="invoices_preview" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="card invoice-info-card">
                                        <div class="card-body pb-0">
                                            <div class="invoice-item invoice-item-one">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="invoice-logo">
                                                            <img src="<?php echo base_url() ?>res/assets/img/logo.png" alt="logo">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="invoice-info">
                                                            <div class="invoice-head">
                                                                <h2 class="text-primary">Training</h2>
                                                                <p>Cooperative : In983248782</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="invoice-item invoice-item-bg">
                                                <div class="invoice-circle-img">
                                                    <img src="assets/img/invoice-circle1.png" alt="" class="invoice-circle1">
                                                    <img src="assets/img/invoice-circle2.png" alt="" class="invoice-circle2">
                                                </div>

                                            </div>


                                            <div class="invoice-item invoice-table-wrap">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <div id="modalData"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="invoice-sign-box">
                                                <div class="row">
                                                    <div class="col-lg-8 col-md-8">
                                                        <div class="invoice-terms">
                                                            <h6>Notes:</h6>
                                                            <p class="mb-0">Enter customer notes or any other details</p>
                                                        </div>
                                                        <div class="invoice-terms mb-0">
                                                            <h6>Terms and Conditions:</h6>
                                                            <p class="mb-0">Enter customer notes or any other details</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4">
                                                        <div class="invoice-sign text-end">
                                                            <img class="img-fluid d-inline-block" src="<?php echo base_url() ?>res/assets/img/signature.png" alt="sign">
                                                            <span class="d-block">Harristemp</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <footer>
              <p>Copyright © 2023 Ancent.</p>
          </footer>
      </div>
  </div>

  <script src="<?php echo base_url() ?>res/assets/js/jquery-3.6.0.min.js"></script>
  <script src="<?php echo base_url() ?>res/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url() ?>res/assets/js/feather.min.js"></script>
  <script src="<?php echo base_url() ?>res/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
  <script src="<?php echo base_url() ?>res/assets/plugins/apexchart/apexcharts.min.js"></script>
  <script src="<?php echo base_url() ?>res/assets/plugins/apexchart/chart-data.js"></script>
  <script src="<?php echo base_url() ?>res/assets/plugins/select2/js/select2.min.js"></script>

  <script src="<?php echo base_url() ?>res/assets/plugins/moment/moment.min.js"></script>
  <script src="<?php echo base_url() ?>res/assets/js/bootstrap-datetimepicker.min.js"></script>

  <script src="<?php echo base_url() ?>res/assets/plugins/datatables/datatables.min.js"></script>

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> -->

  <script src="<?php echo base_url() ?>res/assets/js/script.js"></script>

  <script>
// Add a click event listener to the link that triggers the modal
    $('#attendanceLink').on('click', function(e) {
  e.preventDefault(); // Prevent the default link behavior
  var url = $(this).attr('href'); // Get the URL from the link
  // Make AJAX request
  $.ajax({
    url: url,
    method: 'GET',
    dataType: 'html',
    success: function(response) {
      console.log('Success callback function called.');
      console.log('Response:', response);
      if (response.trim() === '') { // Check if response data is empty
        $('#modalData').html('<p>No data available.</p>');
    } else {
        // Update the modal content with the response data
        $('#modalData').html(response);
    }
      // Show the modal
    $('#invoices_preview').modal('show');
},
error: function() {
      // Handle error
}
});
});

// Add a callback function to the hidden.bs.modal event of the modal
    $('#invoices_preview').on('hidden.bs.modal', function () {
  // Clear the data inside the modal
      $('#modalData').html('');
  });
</script>
</body>
</html>

