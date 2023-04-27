<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Clusters</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('home') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Clusters</li>
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
                                    <h3 class="page-title">Clusters</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCluster"><i class="fas fa-plus"></i></a>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <table class="table border-0 star-student table-hover table-center mb-0table-striped" id="clusters">
                            <thead class="student-thread">
                                <tr>
                                    <th>*</th>
                                    <th>Clusters</th>
                                    <th>Cooperative</th>
                                    <!-- <th>Trainer</th> -->
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody id="show_data">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div id="addCluster" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Add Cluster</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title"><span>Cluster Details</span></h5>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="form-group local-forms">
                                    <label>Cooperative <span class="login-danger">*</span></label>
                                    <select class="form-control " id="cooperative_id" name="cooperative_id" required>
                                        <option value="">--Choose--</option>
                                        <?php foreach ($cooperatives as $key) {?>
                                            <option value="<?php echo $key->id; ?>"><?php echo $key->cooperative_name;?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="form-group local-forms">
                                    <label>Cluster Name <span class="login-danger">*</span></label>
                                    <input type="text" name="cluster_name" id="cluster_name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="form-group local-forms">
                                    <label>Trainer <span class="login-danger">*</span></label>
                                    <select class="form-control " id="trainer_id" name="trainer_id" required>
                                        <option value="">--Choose--</option>
                                        <?php //foreach ($trainers as $key) {?>
                                            <option value="<?php //echo $key->id; ?>"><?php //echo $key->first_name." ".$key->last_name;?></option>
                                            <?php //}?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="btn_save" class="btn btn-primary">Save </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <footer>
            <p>Copyright © 2023 Anc.</p>
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
                show_product(); //call function show all product
                
                $('#mydata').dataTable();
                
                //function show all product
                function show_product(){
                    $.ajax({
                        type  : 'ajax',
                        url   : '<?php echo site_url('cooperatives/cluster_data')?>',
                        async : true,
                        dataType : 'json',
                        success : function(data){
                            var html = '';
                            var i;
                            var rowIdx = 1;
                            for(i=0; i<data.length; i++){
                                //var fullName = data[i].first_name + ' ' + data[i].last_name; // concatenate first_name with last_name
                                html += '<tr>'+
                                '<td>'+rowIdx+'</td>'+ // add rowIdx in the first column
                                '<td>'+data[i].cluster_name+'</td>'+
                                '<td>'+data[i].cooperative_name+'</td>'+
                                //'<td>'+fullName+'</td>'+ // use the fullName variable instead of data[i].first_name
                                '<td style="text-align:right;">'+
                                '<a href="javascript:void(0);" class="btn btn-success btn-sm training_edit" data-id="'+data[i].id+'" data-training_name="'+data[i].training_name+'" data-training_date="'+data[i].training_date+'"><i class="fa fa-edit"></i></a>'+' '+
                                '<a href="javascript:void(0);" class="btn btn-danger btn-sm training_delete" data-id="'+data[i].id+'"><i class="fa fa-trash"></i></a>'+
                                '</td>'+
                                '</tr>';
                                rowIdx++; // increment rowIdx
                            }
                            $('#show_data').html(html);
                        }
                        
                    });
                }            
                //Save product
                $('#btn_save').on('click',function(){
                    var cooperative_id = $('#cooperative_id').val();
                    var cluster_name = $('#cluster_name').val();
                    var trainer_id = $('#trainer_id').val();
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url('cooperatives/store_cluster')?>",
                        dataType : "JSON",
                        data : {cooperative_id:cooperative_id , cluster_name:cluster_name, trainer_id:trainer_id},
                        success: function(data){
                            $('[name="cooperative_id"]').val("");
                            $('[name="cluster_name"]').val("");
                            $('[name="trainer_id"]').val("");
                            $('#addCluster').modal('hide');
                            show_product();
                        }
                    });
                    return false;
                });
                
                //get data for update record
                $('#show_data').on('click','.training_edit',function(){
                    var id = $(this).data('id');
                    var training_name = $(this).data('training_name');
                    var training_date = $(this).data('training_date');
                    
                    $('#edit-training').modal('show');
                    $('[name="id_edit"]').val(id);
                    $('[name="training_name_edit"]').val(training_name);
                    $('[name="training_date_edit"]').val(training_date);
                });
                
                //update record to database
                $('#btn_update').on('click',function(){
                    var id = $('#id_edit').val();
                    var training_name = $('#training_name_edit').val();
                    var training_date = $('#training_date_edit').val();
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo site_url('training/update')?>",
                        dataType : "JSON",
                        data : {id:id, training_name:training_name , training_date:training_date},
                        success: function(data){
                            $('[name="id_edit"]').val("");
                            $('[name="training_name_edit"]').val("");
                            $('[name="training_date_edit"]').val("");
                            $('#edit-training').modal('hide');
                            show_product();
                        }
                    });
                    return false;
                });
                
                //get data for delete record
                $('#show_data').on('click','.training_delete',function(){
                    var id = $(this).data('id');
                    
                    $('#Training_Delete').modal('show');
                    $('[name="id_delete"]').val(id);
                });
                
                //delete record to database
                $('#btn_delete').on('click',function(){
                    var id = $('#id_delete').val();
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo site_url('training/delete')?>",
                        dataType : "JSON",
                        data : {id:id},
                        success: function(data){
                            $('[name="id_delete"]').val("");
                            $('#Training_Delete').modal('hide');
                            show_product();
                        }
                    });
                    return false;
                });

                $('#clusters').DataTable( {
                    dom: 'lBfrtip',
                    buttons: [
                        'excel',  'csv', 'pdf', 'print', 'copy',
                        ],
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
                });
                
            });

        </script>
        
    </body>
    </html>
    
    