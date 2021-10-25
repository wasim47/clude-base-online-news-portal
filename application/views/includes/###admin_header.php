<?php include('admin_tophead.php');?>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="#"><img src="<?php echo base_url();?>asset/images/front/logo.png" class="img-responsive" style="margin:10px;">
                        <span class="ttl">BPMA</span></a>
                    </div>
                    <div class="clearfix"></div>


                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="<?php echo base_url();?>asset/images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2><?php echo $this->session->userdata('userAccessName');?></h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo base_url('Bpmaadminmanage/dashboard');?>">Dashboard</a></li>
                                    </ul>
                                </li>
                                
                                <li><a><i class="fa fa-desktop"></i>Administration<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                	    <li><a href="<?php echo base_url('Bpmaadminmanage/admin_list');?>">Admin List</a></li>
                                        <li><a href="<?php echo base_url('Bpmaadminmanage/admin_registration');?>">New Admin Registration</a></li>
                                    </ul>
                                </li>
                                
                                <li><a><i class="fa fa-user"></i>Member Registration<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                    	<li><a href="<?php echo base_url('Bpmaadminmanage/member_list');?>">Member List</a></li>
                                        <li><a href="<?php echo base_url('Bpmaadminmanage/registration');?>">Member Registration</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-bars"></i>Menu Manage<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                	    <li><a href="<?php echo base_url('Bpmaadminmanage/menu_list');?>">Menu List</a></li>
                                        <li><a href="<?php echo base_url('Bpmaadminmanage/menu_registration');?>">Menu Registration</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-font"></i>Article Manage<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                	    <li><a href="<?php echo base_url('Bpmaadminmanage/article_list');?>">Article List</a></li>
                                        <li><a href="<?php echo base_url('Bpmaadminmanage/article_registration');?>">Article Registration</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-picture-o"></i>Advertisement Manage<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                	    <li><a href="<?php echo base_url('Bpmaadminmanage/advertisement_list');?>">advertisement List</a></li>
                                        <li><a href="<?php echo base_url('Bpmaadminmanage/advertisement_registration');?>">advertisement Registration</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-picture-o"></i>Banner Banage<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                	    <li><a href="<?php echo base_url('Bpmaadminmanage/banner_list');?>">Banner List</a></li>
                                        <li><a href="<?php echo base_url('Bpmaadminmanage/banner_registration');?>">Banner Registration</a></li>
                                    </ul>
                                </li>
                                
                                <li><a><i class="fa fa-picture-o"></i>Photo Gallery Manage<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                	    <li><a href="<?php echo base_url('Bpmaadminmanage/photogallery_list');?>">Photo gallery List</a></li>
                                        <li><a href="<?php echo base_url('Bpmaadminmanage/photogallery_registration');?>">Photo gallery Registration</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-picture-o"></i>E.C. Member Manage<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                	    <li><a href="<?php echo base_url('Bpmaadminmanage/ecmember_list');?>">E.C. Member List</a></li>
                                        <li><a href="<?php echo base_url('Bpmaadminmanage/ecmember_registration');?>">E.C. Member Registration</a></li>
                                    </ul>
                                </li>
                                
                                <li><a><i class="fa fa-picture-o"></i>Events Manage<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                	    <li><a href="<?php echo base_url('Bpmaadminmanage/events_list');?>">Events List</a></li>
                                        <li><a href="<?php echo base_url('Bpmaadminmanage/events_registration');?>">Events Registration</a></li>
                                    </ul>
                                </li>
                            </ul>
                      </div>
                        <div class="menu_section">
                            <h3>Live On</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-search-plus"></i>Patient Search<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="#">E-commerce</a>
                                        </li>
                                        <li><a href="#">Projects</a>
                                        </li>


                                        <li><a href="#">Project Detail</a>
                                        </li>
                                        <li><a href="#">Contacts</a>
                                        </li>
                                        <li><a href="#">Profile</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-users"></i>Total Patient<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="#">404 Error</a>
                                        </li>
                                        <li><a href="#">500 Error</a>
                                        </li>
                                        <li><a href="#">Plain Page</a>
                                        </li>
                                        <li><a href="#">Login Page</a>
                                        </li>
                                        <li><a href="#">Pricing Tables</a>
                                        </li>

                                    </ul>
                                </li>
                                
                          </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo base_url();?>asset/images/img.jpg" alt=""><?php echo $this->session->userdata('userAccessName');?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="javascript:;">  Profile</a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="badge bg-red pull-right">50%</span>
                                            <span>Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">Help</a>
                                    </li>
                                    <li><a href="<?php echo base_url('bpmaadminmanage/logout');?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>

                            

                        </ul>
                    </nav>
                </div>

            </div>