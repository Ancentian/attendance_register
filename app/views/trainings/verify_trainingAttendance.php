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
                                    <h3 class="page-title">Verify Attendance for <?php //echo $members->training_id[0]?></h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">

                                    <!-- <a href="<?php //echo base_url('members/addMember') ?>" class="btn btn-primary"><i class="fas fa-plus"></i></a> -->
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                          <form action="<?php echo base_url('training/update_attendanceVerification')?>" method="POST">
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
                                            <td hidden><input type="text" value="<?php echo $key->training_id?>" name="training_id" hidden></td>
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
                                    <button type="submit" class="btn btn-primary mt-3 justify-content-center">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


