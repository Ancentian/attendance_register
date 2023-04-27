<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                <li class="submenu active">
                    <a href="#"><i class="feather-grid"></i> <span> Dashboard</span> <span
                        class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="<?php echo base_url('home/index')?>" class="active">Admin Dashboard</a></li>

                                </ul>
                            </li>
                            <?php if ($this->session->userdata('user_aob')->role_id == 'admin' || $this->session->userdata('user_aob')->role_id == 'trainer' || $this->session->userdata('user_aob')->role_id == 'field_officer' || $this->session->userdata('user_aob')->role_id == 'field_coordinator' || $this->session->userdata('user_aob')->role_id == 'finance') { ?>
                                <li class="submenu">
                                    <a href="#"><i class="fas fa-chalkboard-teacher"></i> <span> Farmers</span> <span
                                        class="menu-arrow"></span></a>
                                        <ul>
                                            <li><a href="<?php echo base_url('members/index')?>">Farmers List</a></li>
                                            <li><a href="<?php echo base_url('members/addMember')?>">Add Farmer</a></li>
                                        </ul>
                                </li> 
                                <?php }?>
                            <?php if ($this->session->userdata('user_aob')->role_id == 'admin' || $this->session->userdata('user_aob')->role_id == 'trainer' || $this->session->userdata('user_aob')->role_id == 'field_officer' || $this->session->userdata('user_aob')->role_id == 'field_coordinator' || $this->session->userdata('user_aob')->role_id == 'finance') { ?>
                            <li class="submenu">
                                <a href="#"><i class="fas fa-graduation-cap"></i> <span> Training</span> <span
                                    class="menu-arrow"></span></a>
                                    <ul>
                                        <li hidden><a href="<?php echo base_url('training/scheduleTraining')?>">Scheduled Training</a></li>
                                        <li><a href="<?php echo base_url('training/addSchedule')?>">Schedule New Training</a></li>
                                        <li><a href="<?php echo base_url('training/trainingSchedules')?>">All Schedules</a></li>
                                        <li hidden><a href="<?php echo base_url('training/viewAttendance')?>">Attendance List</a></li>
                                        <?php //if($this->session->userdata('user_aob')->role_id == 'admin' || $this->session->userdata('user_aob')->role_id == 'field_coordinator'|| $this->session->userdata('user_aob')->role_id == 'field_officer' || $this->session->userdata('user_aob')->role_id == 'finance') { ?>
                                        <li><a href="<?php echo base_url('training/verifyAttendance')?>">Verify Attendance</a></li>
                                        <?php //}?>
                                    </ul>
                                </li>
                            <?php }?>
                                
                                <?php if ($this->session->userdata('user_aob')->role_id == 'admin' || $this->session->userdata('user_aob')->role_id == 'finance') { ?>
                                <li class="menu-title">
                                    <span>Management</span>
                                </li>
                                    <li class="submenu">
                                    <a href="#"><i class="fas fa-cog"></i> <span>Management</span> <span
                                        class="menu-arrow"></span></a>
                                        <ul>
                                            <li><a href="<?php echo base_url('training/index')?>">Add New Trainings</a></li>
                                            <li><a href="<?php echo base_url('cooperatives/index')?>">Cooperatives</a></li>
                                            <li><a href="<?php echo base_url('cooperatives/clusters')?>">Clusters</a></li>                                          
                                        </ul>
                                </li>
                                <li class="submenu">
                                    <a href="#"><i class="fas fa-users"></i> <span> Users </span> <span
                                            class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="<?php echo base_url('staff/index')?>">Users</a></li>
                                        <li hidden><a href="<?php echo base_url('management/roles')?>">Roles</a></li>
                                    </ul>
                                </li> 
                                    <li class="submenu">
                                        <a href="#"><i data-feather="bar-chart-2"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
                                        <ul>
                                            <li><a href="<?php echo base_url('reports/attendanceReports')?>">Attendance Reports</a></li>
                                            <li><a href="<?php echo base_url('reports/trainingReports')?>">Training Report</a></li>
                                        </ul>
                                    </li>                       
                                    </ul>
                                <?php }?>
                                </div>
                            </div>
                        </div>