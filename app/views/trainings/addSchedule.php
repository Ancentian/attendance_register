<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Schedule Training</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Member</a></li>
                        <li class="breadcrumb-item active">Schedule Training</li>
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
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo base_url('training/storeSchedule')?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12">
                                    <h4 >Training Details</h4>
                                </div>        
                                <div class="col-12 col-sm-6">
                                    <div class="form-group local-forms">
                                        <label>Cooperative <span class="login-danger">*</span></label>
                                        <select class="form-control select" id="cooperative_id" name="cooperative_id" required>
                                            <option value="">--Choose--</option>
                                            <?php foreach($cooperatives as $key) {?>
                                                <option value="<?php echo $key->id;?>"><?php echo $key->cooperative_name;?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group local-forms">
                                        <label>Cluster <span class="login-danger">*</span></label>
                                        <select class="form-control select" id="cluster_id" name="cluster_id" required>
                                            <option value="">--Choose--</option>     
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-12 col-sm-6">
                                    <div class="form-group local-forms">
                                        <label>Venue <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" name="venue" placeholder="Enter Venue">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group local-forms calendar-icon">
                                        <label>Date <span class="login-danger">*</span></label>
                                        <input class="form-control datetimepicker" id="training_date_edit" name="training_date" type="text"
                                        placeholder="YYYY-MM-DD">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group local-forms">
                                        <label>Facilitator <span class="login-danger">*</span></label>
                                        <select class="form-control select" name="facilitator" required>
                                            <option value="">--Select--</option>
                                            <?php foreach($trainers as $key) {?>                                           
                                                <option value="<?php echo $key['id'] ?>"><?php echo $key['first_name']." ".$key['last_name'] ?></option>     
                                            <?php }?>  
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group local-forms">
                                        <label>Training <span class="login-danger">*</span></label>
                                        <select class="form-control select" id="training_id" name="training_id" required>
                                            <option value="">--Choose--</option>
                                            <?php foreach($trainings as $key) {?>
                                                <option value="<?php echo $key->id;?>"><?php echo $key->training_name;?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12">
                                    <div class="form-group local-forms">
                                        <label>Training Topics<span class="login-danger">*</span></label>
                                        <select class="form-control select" multiple data-mdb-placeholder="Example placeholder" id="topic_id" name="training_topic[]"  multiple>
                                            
                                        </select>
                                    </div>
                                </div>                           
                            </div>   
                                                        
                            <div class="col-12 ">
                                <div class="student-submit">
                                    <button type="submit" class="btn btn-primary justify-content-center">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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
<script src="<?php echo base_url() ?>res/assets/plugins/dragula/js/dragula.min.js"></script>
<script src="<?php echo base_url() ?>res/assets/plugins/dragula/js/drag-drop.min.js"></script>

<script src="<?php echo base_url() ?>res/assets/js/script.js"></script>
<script type="text/javascript">
                // Start Add Multiple Shop Items
    var rowIdx = 1;
    $("#addBtn").on("click", function ()
    {
                    // Adding a row inside the tbody.
        $("#tableTraining tbody").append(`
            <tr id="R${++rowIdx}">
            <td class="row-index text-center"><p> ${rowIdx}</p></td>
            <td><input class="form-control" type="text" style="min-width:150px" id="description" name="training_topic[]"></td>
            
            <td><a href="javascript:void(0)" class="text-danger font-18 remove" title="Remove"><i class="feather-trash"></i></a></td>
            </tr>`);
    });
    $("#tableTraining tbody").on("click", ".remove", function ()
    {
                    // Getting all the rows next to the row
                    // containing the clicked button
        var child = $(this).closest("tr").nextAll();
                    // Iterating across all the rows
                    // obtained to change the index
        child.each(function () {
                        // Getting <tr> id.
            var id = $(this).attr("id");
            
                        // Getting the <p> inside the .row-index class.
            var idx = $(this).children(".row-index").children("p");
            
                        // Gets the row number from <tr> id.
            var dig = parseInt(id.substring(1));
            
                        // Modifying row index.
            idx.html(`${dig - 1}`);
            
                        // Modifying row id.
            $(this).attr("id", `R${dig - 1}`);
        });
        
                    // Removing the current row.
        $(this).closest("tr").remove();
        
                    // Decreasing total number of rows by 1.
        rowIdx--;
    });
    
    $(document).ready(function(){
        
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
        
        $('#training_id').change(function(){ 
            var id=$(this).val();
                        //console.log(id);
            $.ajax({
                url : "<?php echo site_url('training/get_training_topics');?>",
                method : "POST",
                data : {id: id},
                async : true,
                dataType : 'json',
                success: function(data){
                    
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].id+'>'+data[i].training_topic+'</option>';
                    }
                    $('#topic_id').html(html);
                    
                }
            });
            return false;
        }); 
        
    });
    
</script>

</script>

</body>

</html>


