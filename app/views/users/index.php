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
                            <table class="table border-0 star-student table-hover table-center mb-0 table-striped" id="example">
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
                                                <a href="<?php echo base_url('staff/showUser/'.$key['id']) ?>" title="View Member" class="btn btn-sm bg-success-light me-2">
                                                    <i class="feather-eye"></i>
                                                </a>
                                                <a href="<?php echo base_url('staff/editUser/'.$key['id']) ?>" title="Edit User" class="btn btn-sm bg-danger-light">
                                                    <i class="feather-edit"></i>
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
        <!-- Export Data -->
        <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
        <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

        <script src="<?php echo base_url() ?>res/assets/js/script.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){

                $('#example').DataTable( {
                    dom: 'lBfrtip',
                    buttons: [
                     'excel',  'csv', 'pdf', 'print', 'copy',
                     ],
                    "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]

                });

                $('#cooperative_id').change(function(){ 
                    var id=$(this).val();
                //console.log(id);
                    $.ajax({
                        url : "<?php echo site_url('members/get_cooperative_clusters');?>",
                        method : "POST",
                        data : {id: id},
                        async : true,
                        dataType : 'json',
                        success: function(data){

                            var html = '';
                            var i;
                            for(i=0; i<data.length; i++){
                                html += '<option value='+data[i].id+'>'+data[i].cluster_name+'</option>';
                            }
                            $('#cluster_id').html(html);

                        }
                    });
                    return false;
                }); 

            });
        </script>

    </body>

    </html>






