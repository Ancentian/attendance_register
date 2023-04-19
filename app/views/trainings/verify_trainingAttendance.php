<?php //var_dump($members->training_id[0]);die; ?>
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Attendance List</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('home/index')?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Attendance List</li>
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
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">

                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Verify Attendance for <?php echo $name;?> Training</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">

                                    <!-- <a href="<?php //echo base_url('members/addMember') ?>" class="btn btn-primary"><i class="fas fa-plus"></i></a> -->
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                          <form id="my-form">
                            <!-- <input type="number" name="verified" value="1" hidden> -->
                            <table class="table  table-striped">
                                <thead class="student-thread">
                                    <tr>
                                        <th>*</th>
                                        <th>Member</th>
                                        <th>Training</th>   
                                        <th>ID</th>
                                        <th>Cooperative</th>
                                        <th>CBT</th>
                                        <th>Attendance</th> 
                                          
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($attendance as $key) {?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $key->first_name." ".$key->last_name?></td>
                                            <td><?php echo $key->training_name?></td>                               
                                            <td><?php echo $key->id_number?></td>
                                            <td><?php echo ucfirst($key->cooperative_name)?></td>
                                            <td><?php echo ucfirst($key->cluster_name)?></td>
                                            <td hidden><input type="text" id="trainer_id" value="<?php echo $key->training_id?>" name="training_id" hidden></td>
                                            <td hidden><input type="text" value="<?php echo $key->cooperative_id?>" name="cooperative_id" hidden></td>
                                            <td hidden><input type="text" value="<?php echo $key->clusterID?>" name="cluster_id" hidden></td>
                                            <td>
                                                <?php if ($key->attendance_value == 1): ?>
                                                <input class="form-check-input check-item" type="checkbox" checked disabled>
                                                <?php else: ?>
                                                    <input class="form-check-input check-item" type="checkbox" disabled>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php $i++; }?>
                                </tbody>
                            </table>
                            <div class="col-12 " >
                                <div class="student-submit">
                                    <button type="submit" id="verify" class="btn btn-primary mt-3 justify-content-center">Verify</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<footer>
    <p>Copyright © 2023 CoWA.</p>
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
<script src="<?php echo base_url() ?>res/assets/plugins/toastr/toastr.min.js"></script>
<script src="<?php echo base_url() ?>res/assets/plugins/toastr/toastr.js"></script>

<script src="<?php echo base_url() ?>res/assets/js/script.js"></script>


<script>
    $(document).ready(function() {
    $('#verify').on('click', function(e) {
        e.preventDefault(); // prevent the default form submission behavior
        $('#confirmation-modal').modal('show'); // show the modal dialog box
    });

    $('#confirmation-modal').on('click', '#confirm-yes', function() {
        // if the user clicks "Yes", submit the form using AJAX
        var training_id = $('#training_id').val();
        console.log(training_id);
        $.ajax({
            url: '<?php echo base_url('training/update_attendanceVerification')?>',
            type: 'POST',
            data: {training_id:training_id},

            success: function(response) {
                // handle success response
                toastr.success('Verification Done Successfully','Success');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // handle error response
            }
        });
        console.log(data);
        $('#confirmation-modal').modal('hide'); // hide the modal dialog box
    });

    $('#confirmation-modal').on('click', '#confirm-no', function() {
        // if the user clicks "No", hide the modal dialog box and do not submit the form
        $('#confirmation-modal').modal('hide');
    });
});

</script>

<!-- Modal -->
<!-- <div class="modal fade" id="confirmation-modal" tabindex="-1" role="dialog" aria-labelledby="confirmation-modal-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmation-modal-label">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to submit?
            </div>
            <div class="modal-footer">
                <button type="button" id="confirm-yes" class="btn btn-primary">Yes</button>
                <button type="button" id="confirm-no" class="btn btn-secondary" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div> -->

<!-- Verify Attendance -->
    <div id="confirmation-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="standard-modalLabel">Verification</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <form>
                         <strong>Are you sure to Submit this Verification</strong>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" id="confirm-no" data-bs-dismiss="modal">No</button>
                        <button type="submit" id="confirm-yes" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>
</html>

