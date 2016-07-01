<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- Sidebar Menu -->
      <?php if($_SESSION['desig_name']=='Reviewer'){ ?>
      <ul class="sidebar-menu">
        <li class="header"><i class="fa fa-bar-chart"></i> <?php echo  $_SESSION['desig_name']; ?> Operation</li>
        
        <!-- Optionally, you can add icons to the links -->
         
        <li <?php if($page==7.2){?>class="active"<?php } ?> ><a href="inbox.php" ><i class="fa fa-inbox"></i> <span>Inbox</span><span  class="label label-primary pull-right"><?php echo $co=$db-> get_enq_count($_SESSION['user_id']);?> </span></a></li>
        <li <?php if($page==7.3){?>class="active"<?php } ?> ><a href="outbox.php" ><i class="fa fa-envelope"></i> <span>Sent Box</span></a></li>
        
         <li <?php if($page==7.6){?>class="active"<?php } ?>> <a href="forwarded_enquiry.php"><i class="fa fa-eye"></i> <span>View Your Working Enquiry</span></a>
         </li>
         
         <li <?php if($page==7.4){?>class="active"<?php } ?>> <a href="client_list.php"><i class="fa fa-user"></i> <span>Client List</span></a>
         </li>
         <li <?php if($page==7.5){?>class="active"<?php } ?>> <a href="../../setting/views/change_password.php?page_id=<?php echo $page;?>"><i class="fa fa-gear"></i> <span>Change Password</span></a>
         </li>
        <?php if($_SESSION['desig_name']=='admin' ) {?>
	<li> <a href="../../index.php"><i class="fa fa-arrow-left"></i> <span>Back</span></a> </li>
        <li> <a href="../../login/view/logout.php"><i class="fa fa-sign-out"></i> <span>Logout</span></a> </li> 
			<?php } ?>
            <?php if($_SESSION['desig_name']=='Reviewer') {?>
			       <li> <a href="../../login/view/logout.php"><i class="fa fa-sign-out"></i> <span>Logout</span></a> </li> 
			<?php } ?>
      </ul>
      <?php }else if($_SESSION['desig_name']=='Certification Manager'){ ?>
      <ul class="sidebar-menu">
        <li class="header"><i class="fa fa-bar-chart"></i> <?php echo  $_SESSION['desig_name']; ?> Operation</li>
        
        <!-- Optionally, you can add icons to the links -->
         <li <?php if($page==8.1){?>class="active"<?php } ?>><a href="welcome_enquiry.php" ><i class="fa fa-table"></i> <span>View Enquiry</span><span class="label label-primary pull-right" title="Total Pending Enquiry"><?php echo $counts=$db-> get_new_enq_count();?> </span></a></li>
        <li <?php if($page==8.2){?>class="active"<?php } ?> ><a href="inbox.php" ><i class="fa fa-inbox"></i> <span>Inbox</span><span  class="label label-primary pull-right"><?php echo $co=$db-> get_enq_count($_SESSION['user_id']);?> </span></a></li>
        <li <?php if($page==8.3){?>class="active"<?php } ?> ><a href="outbox.php" ><i class="fa fa-envelope"></i> <span>Sent Box</span></a></li>
        <li <?php if($page==8.4){?>class="active"<?php } ?>> <a href="enquiry_form.php"><i class="fa fa-plus"></i> <span>Add New Enquiry</span></a>
         </li>
         <li <?php if($page==8.7){?>class="active"<?php } ?>> <a href="client_list.php"><i class="fa fa-user"></i> <span>Client List</span></a>
         </li>
         <li <?php if($page==8.5){?>class="active"<?php } ?>> <a href="../../setting/views/change_password.php?page_id=<?php echo $page;?>"><i class="fa fa-gear"></i> <span>Change Password</span></a>
         </li>
        <?php if($_SESSION['desig_name']=='admin' ) {?>
			        <li> <a href="../../index.php"><i class="fa fa-arrow-left"></i> <span>Back</span></a> </li>
                    <li> <a href="../../login/view/logout.php"><i class="fa fa-sign-out"></i> <span>Logout</span></a> </li> 
			<?php } ?>
            <?php if($_SESSION['desig_name']=='Certification Manager') {?>
			       <li> <a href="../../login/view/logout.php"><i class="fa fa-sign-out"></i> <span>Logout</span></a> </li> 
			<?php } ?>
      </ul>
      <?php }else if($_SESSION['desig_name']=='CEO/Certification Committe'){ ?>
      <ul class="sidebar-menu">
        <li class="header"><i class="fa fa-bar-chart"></i> <?php echo  $_SESSION['desig_name']; ?> Operation</li>
        
        <!-- Optionally, you can add icons to the links -->
         <li <?php if($page==2.1){?>class="active"<?php } ?>><a href="welcome_enquiry.php" ><i class="fa fa-table"></i> <span>View Enquiry</span><span class="label label-primary pull-right" title="Total Pending Enquiry"><?php echo $counts=$db-> get_new_enq_count();?> </span></a></li>
        <li <?php if($page==2.2){?>class="active"<?php } ?> ><a href="inbox.php" ><i class="fa fa-inbox"></i> <span>Inbox</span><span  class="label label-primary pull-right"><?php echo $co=$db-> get_enq_count($_SESSION['user_id']);?> </span></a></li>
        <li <?php if($page==2.3){?>class="active"<?php } ?> ><a href="outbox.php" ><i class="fa fa-envelope"></i> <span>Sent Box</span></a></li>
        <li <?php if($page==2.4){?>class="active"<?php } ?>> <a href="enquiry_form.php"><i class="fa fa-plus"></i> <span>Add New Enquiry</span></a>
         </li>
         <li <?php if($page==2.7){?>class="active"<?php } ?>> <a href="client_list.php"><i class="fa fa-user"></i> <span>Client List</span></a>
         </li>
         <li <?php if($page==2.5){?>class="active"<?php } ?>> <a href="../../setting/views/change_password.php?page_id=<?php echo $page;?>"><i class="fa fa-gear"></i> <span>Change Password</span></a>
         </li>
        <?php if($_SESSION['desig_name']=='admin' ) {?>
			        <li> <a href="../../index.php"><i class="fa fa-arrow-left"></i> <span>Back</span></a> </li>
                    <li> <a href="../../login/view/logout.php"><i class="fa fa-sign-out"></i> <span>Logout</span></a> </li> 
			<?php } ?>
            <?php if($_SESSION['desig_name']=='BDE') {?>
			       <li> <a href="../../login/view/logout.php"><i class="fa fa-sign-out"></i> <span>Logout</span></a> </li> 
			<?php } ?>
      </ul>
      <?php } ?>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>