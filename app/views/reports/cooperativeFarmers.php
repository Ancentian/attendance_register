<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Farmers</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('home/index')?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Farmers</li>
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
                                    <h3 class="page-title"><?php echo $members[0]['cooperative_name']?> Farmers</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    
                                    <a href="<?php echo base_url('members/addMember') ?>" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table border-0 star-student table-hover table-center mb-0  table-striped" id="members">
                                <thead class="student-thread">
                                    <tr>
                                        <th>*</th>
                                        <th>Name</th>
                                        <th>ID</th>
                                        <th>Cooperative</th>
                                        <th>Cluster</th>
                                        <th>Gender</th>
                                        <th>Mobile No.</th>
                                        <th>Age</th>
                                        <th>Created By</th>
                                        <th>Created At</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($members as $key) { ?>
                                    <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $key['first_name']." ".$key['last_name']?></td>
                                    <td><?php echo $key['id_number']?></td>
                                    <td><?php echo ucfirst($key['cooperative_name'])?></td>
                                    <td><a href="<?php echo base_url('members/clusterMembers/'.$key['clusterID'])?>" style="color: blue;" onmouseover="this.style.color='red';" onmouseout="this.style.color='blue';"><?php echo ucfirst($key['cluster_name'])?></a></td>
                                    <td><?php echo ucfirst($key['gender'])?></td>
                                    <td><?php echo $key['phone_number']?></td>  
                                    <td><?php echo $key['age']?></td>
                                    <td><?php echo $key['fname']." ".$key['lname']?></td>
                                    <td><?php echo $key['created_at']?></td>
                                    <td class="text-end">
                                        <div class="actions">
                                            <a href="<?php echo base_url('members/memberProfile?memberID='. $key['id_number'])?>" title="View Member" class="btn btn-sm bg-success-light me-2">
                                                <i class="feather-eye"></i>
                                            </a>
                                            
                                            <a href="<?php echo base_url('members/editMember?memberID='. $key['id_number'])?>" title="Edit Member" class="btn btn-sm bg-danger-light">
                                                <i class="feather-edit"></i>
                                            </a>

                                            <a href="<?php echo base_url('members/deleteMember?memberID='. $key['id_number'])?>" title="Delete Member" class="btn btn-sm bg-danger-light">
                                                <i class="feather-trash"></i>
                                            </a>

                                        </div>
                                    </td>
                                </tr>
                                <?php $i++; } ?>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


