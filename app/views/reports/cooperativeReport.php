<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Cooperatives</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('home')?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Cooperatives</li>
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
                                    <h3 class="page-title">Cooperatives</h3>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table border-0 star-student table-hover table-center mb-0  table-striped" id="members">
                                <thead class="student-thread">
                                    <tr>
                                        <th>*</th>
                                        <th>Cooperative</th>
                                        <th>Clusters</th>
                                        <th>Farmers</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($cooperatives as $key) { ?>
                                    <tr>
                                    <td><?php echo $i; ?></td>
                                    <td> <a href="<?php echo base_url('reports/cooperativeFarmers/'. $key['id'])?>" style="color: blue;" onmouseover="this.style.color='red';" onmouseout="this.style.color='blue';"><?php echo ucfirst($key['cooperative_name'])?></a></td>
                                    <td><?php echo $this->reports->count_clusters_by_cooperative($key['id'])?></td>  
                                    <td><?php echo $this->reports->count_members_by_cooperative($key['id']) ?></td>

                                    <td class="text-end">
                                        <div class="actions">
                                            <a href="<?php echo base_url()?>" title="View Member" class="btn btn-sm bg-success-light me-2">
                                                <i class="feather-eye"></i>
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


