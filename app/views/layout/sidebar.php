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
                                <!-- <li><a href="teacher-dashboard.html">Teacher Dashboard</a></li>
                                    <li><a href="student-dashboard.html">Student Dashboard</a></li> -->
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="#"><i class="fas fa-graduation-cap"></i> <span> Training</span> <span
                                    class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="<?php echo base_url('training/index')?>">Trainings List</a></li>
                                        <li hidden><a href="<?php echo base_url('training/scheduleTraining')?>">Scheduled Training</a></li>
                                        <li><a href="<?php echo base_url('training/addSchedule')?>">Schedule New Training</a></li>
                                        <li><a href="<?php echo base_url('training/trainingSchedules')?>">All Schedules</a></li>
                                        <li hidden><a href="<?php echo base_url('training/viewAttendance')?>">Attendance List</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="#"><i class="fas fa-chalkboard-teacher"></i> <span> Members</span> <span
                                        class="menu-arrow"></span></a>
                                        <ul>
                                            <li><a href="<?php echo base_url('members/index')?>">Members List</a></li>
                                            <li><a href="<?php echo base_url('members/addMember')?>">Add Member</a></li>
                                            <li><a href="<?php echo base_url('members/memberProfile?memberID='. $this->session->userdata('user_aob')->member_id)?>">My Profile</a></li>
                                        </ul>
                                </li>
                                
                               
                                    
                                <li class="menu-title">
                                    <span>Management</span>
                                </li>
                                <li class="submenu">
                                    <a href="#"><i class="fas fa-cog"></i> <span> Settings</span> <span
                                        class="menu-arrow"></span></a>
                                        <ul>
                                            <li hidden><a href="<?php echo base_url('management/roles')?>">Roles</a></li>
                                            <li><a href="<?php echo base_url('cooperatives/index')?>">Cooperatives</a></li>
                                            <li><a href="<?php echo base_url('cooperatives/clusters')?>">Clusters</a></li>                                          
                                        </ul>
                                    </li>
                                    
                                    
                                    <li class="submenu" hidden>
                                        <a href="#"><i class="fas fa-shield-alt"></i> <span> Authentication </span> <span
                                            class="menu-arrow"></span></a>
                                        <ul>
                                            <li><a href="login.html">Login</a></li>
                                            <li><a href="register.html">Register</a></li>
                                            <li><a href="forgot-password.html">Forgot Password</a></li>
                                            <li><a href="error-404.html">Error Page</a></li>
                                        </ul>
                                    </li>                        
                                    </ul>
                                </div>
                            </div>
                        </div>