<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Users</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('home')?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users</li>
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
                                    <h3 class="page-title">Users</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    
                                    <a href="<?php echo base_url('staff/addUser') ?>" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped" id="members">
                                <thead class="student-thread">
                                    <tr>
                                <th>#</th>
                                <th>Name </th>
                                <th>Email </th>
                                <th>Contact</th>
                                <th>Role </th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                                </thead>
                                <tbody>
                            <?php $i = 1; foreach ($users as $key) {?>
                            <tr id="<?php echo $key['id']?>">
                                <td><?php echo $i;?></td>
                                <td><?php echo $key['first_name']." ".$key['last_name']?></td>
                                <td><?php echo $key['email']?> </td>
                                <th><?php echo $key['phone_number']?></th>
                                <td><?php echo ucfirst($key['role_id'])?> </td>
                                <td><?php echo $key['created_at']?> </td>
                                <td>
                                    <a class="me-3" href="<?php echo base_url('staff/editUser/'.$key['id']) ?>">
                                        <img src="<?php echo base_url() ?>res/assets/img/icons/edit.svg" alt="img">
                                    </a>

                                    <a class="me-3 removeUser">
                                        <img src="<?php echo base_url() ?>res/assets/img/icons/delete.svg" alt="img">
                                    </a>
                                </td>
                            </tr>
                            <?php $i++; }?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



