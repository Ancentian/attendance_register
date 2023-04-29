<?php //var_dump($members->training_id[0]);die; ?>
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Attendance Report</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('home/index')?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Attendance Report</li>
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
                                    <h3 class="page-title">Attendance Report For <span><?php echo $name; ?> </span>Training</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">

                                    <!-- <a href="<?php //echo base_url('members/addMember') ?>" class="btn btn-primary"><i class="fas fa-plus"></i></a> -->
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                          <form action="<?php echo base_url('training/storeAttendance')?>" method="POST">
                            <table class="table border-0 star-student table-hover table-center mb-0  table-striped" id="example">
                                <thead class="student-thread">
                                    <tr>
                                        <th>*</th>
                                        <th>Member</th>
                                        <th>ID</th>
                                        <!-- <th>Training</th>      -->
                                        <th>Cooperative</th>
                                        <th>Cluster</th>
                                        <th>Age</th>
                                        <th>Date</th>
                                        <th>Attendance</th>                 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($attendance as $key) {?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $key->first_name." ".$key->last_name?></td>
                                            <td><?php echo $key->id_number?></td>
                                            <!-- <td><?php //echo $key->training_name?></td>                                -->
                                            
                                            <td><?php echo ucfirst($key->cooperative_name)?></td>
                                            <td><?php echo ucfirst($key->cluster_name)?></td>
                                            <td><?php echo $key->age?></td> 
                                            <td><?php echo date('d/m/Y', strtotime($key->training_date)) ?></td>
                                            <?php if ($key->attendance_value == 1): ?>
                                                <td><?php echo "Present"; ?></td>
                                            <?php else: ?>
                                                <td><?php echo "Absent"; ?></td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php $i++; }?>
                                </tbody>
                            </table>
                            <div class="col-12 " hidden>
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


