<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header"><i class="fa fa-bar-chart"></i> Enquiry Operation</li>
        <!-- Optionally, you can add icons to the links -->
         <!--li <?php if($page==3.1){?>class="active"<?php } ?>><a href="welcome_bill.php" ><i class="fa fa-table"></i> <span>View Enquiry</span></a></li-->
        <li <?php if($page==3.2){?>class="active"<?php } ?> ><a href="inbox_bill.php" ><i class="fa fa-inbox"></i> <span>Inbox</span><span class="label label-primary pull-right"><?php echo $co=$db->get_enq_count($_SESSION['user_id']);?> </span></a></li>
        <li <?php if($page==3.3){?>class="active"<?php } ?> ><a href="outbox_bill.php" ><i class="fa fa-envelope"></i> <span>Sent Box</span></a></li>
        <li <?php if($page==3.5){?>class="active"<?php } ?>> <a href='forwarded_enquiry.php'><i class="fa fa-eye"></i> <span>View Your Working Enquiry</span></a>
         </li>
        <li <?php if($page==3.4){?>class="active"<?php } ?> ><a href="../../setting/views/change_password.php?page_id=<?php echo $page; ?>" ><i class="fa fa-gear"></i> <span>Change Password</span></a></li>
        
        <!--li <?php if($page==2.6){?>class="active"<?php } ?>> <a href="enquiry_form.php"><i class="fa fa-plus"></i> <span>Add New Enquiry</span></a> </li-->
        <?php if(trim($_SESSION['desig_name'])=='admin') {?>
			        <li> <a href="../../index.php"><i class="fa fa-arrow-left"></i> <span>Back</span></a> </li>
                    <li> <a href="../../login/view/logout.php"><i class="fa fa-sign-out"></i> <span>Logout</span></a> </li> 
			<?php } ?>
            <?php if(trim($_SESSION['desig_name'])=='Accountant') {?>
			        <li> <a href="../../login/view/logout.php"><i class="fa fa-sign-out"></i> <span>Logout</span></a> </li> 
			<?php } ?>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>