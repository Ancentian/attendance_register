<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Add Member</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('home') ?>">Member</a></li>
                        <li class="breadcrumb-item active">Add Member</li>
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
                        <form action="<?php echo base_url('members/storeMember')?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span>Basic Details</span></h5>
                                </div>        
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms" required>
                                        <label>First Name <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" name="first_name" value="<?php echo $member['first_name']?>" required>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Last Name <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" name="last_name" value="<?php echo $member['last_name']?>" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>ID/Passport No. <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" name="id_number" value="<?php echo $member['id_number']?>" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>County <span class="login-danger">*</span></label>
                                        <select class="form-control select" name="county" required>
                                            <option value="">--Choose--</option>
                                            <option value="meru">Meru</option>
                                            <option value="embu">Embu</option>
                                            <option value="tharaka">Tharaka</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
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
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Training Cluster <span class="login-danger">*</span></label>
                                        <select class="form-control select" id="cluster_id" name="cluster_id" required>
                                            <option value="">--Choose--</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Gender <span class="login-danger">*</span></label>
                                        <select class="form-control select" name="gender" required>
                                            <option value="">--Choose--</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="others">Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Phone Number <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" name="phone_number" placeholder="Enter Phone">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Age <span class="login-danger">*</span></label>
                                        <select class="form-control select" name="age" required>
                                            <option value="">--Choose Range--</option>
                                            <option value="18-25">18-25</option>
                                            <option value="26-35">26-35</option>
                                            <option value="36-50">36-50</option>
                                            <option value="50+">50+</option>
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

<script src="<?php echo base_url() ?>res/assets/js/script.js"></script>

<script type="text/javascript">
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
        
    });
</script>

</body>

</html>


