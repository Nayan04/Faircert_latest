<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header"><i class="fa fa-bar-chart"></i> Enquiry Operation</li>
       <?php $url='';
			if($_SESSION['desig_name']=='Inspection Manager'){
				$url='../../inspection_manager/views/inbox_inspection.php';
				}else if($_SESSION['desig_name']=='BDE'){
					$url='../../enquiry/views/welcome_enquiry.php';
				}else if($_SESSION['desig_name']=='CEO/Certification Committe'){
					$url='../../certification_body/views/inbox.php';
					}else if($_SESSION['desig_name']=='Certification Manager'){
					$url='../../certification_body/views/inbox.php';
					}else if($_SESSION['desig_name']=='admin'){
					$url='../../index.php';
					}?>
			       <li> <a href="<?php echo $url; ?>"><i class="fa fa-home"></i> <span>Home</span></a> </li>
        <!-- Optionally, you can add icons to the links -->
         <li <?php if($page==10.1){?>class="active"<?php } ?> ><a href="index.php" ><i class="fa fa-dashboard"></i> <span>Report Dashboard</span></a></li>
        <li <?php if($page==10.2){?>class="active"<?php } ?> ><a href="client_list.php" ><i class="fa fa-users"></i> <span>Register Clients</span></a></li>
        <li <?php if($page==10.3){?>class="active"<?php } ?>> <a href="staff_report.php"><i class="fa fa-user"></i> <span>Staff Details </span></a>
         </li>
         <li <?php if($page==10.4){?>class="active"<?php } ?>> <a href="export_client_file.php"><i class="fa fa-file-excel-o"></i> <span>Export Clients List</span></a>
         </li>
        
         <li <?php if($page==10.5){?>class="active"<?php } ?>> <a href="../../setting/views/change_password.php?page_id=<?php echo $page;?>"><i class="fa fa-gear"></i> <span>Change Password</span></a>
         </li>
        
			 
                    <li> <a href="../../login/view/logout.php"><i class="fa fa-sign-out"></i> <span>Logout</span></a> </li> 
			
			
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>