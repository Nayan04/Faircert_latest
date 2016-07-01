<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header"><i class="fa fa-bar-chart"></i> <?php echo $_SESSION['desig_name']; ?> Operation</li>
        <!-- Optionally, you can add icons to the links -->
         
        <li <?php if($page==5.1){?>class="active"<?php } ?> ><a href="inbox_inspector.php" ><i class="fa fa-inbox"></i> <span>Inbox</span><span  class="label label-primary pull-right"><?php echo $co=$db-> get_enq_count($_SESSION['user_id']);?> </span></a></li>
        <li <?php if($page==5.2){?>class="active"<?php } ?> ><a href="outbox_inspector.php" ><i class="fa fa-send"></i> <span>Sent Box</span></a></li>
        <li <?php if($page==5.3){?>class="active"<?php } ?> ><a href="inspection_list.php" ><i class="fa fa-list-ul"></i> <span>Inspection List</span></a></li>
        <li <?php if($page==5.5){?>class="active"<?php } ?>> <a href="forwarded_enquiry.php"><i class="fa fa-eye"></i> <span>View Your Working Enquiry</span></a>
         </li>
        <li <?php if($page==5.4){?>class="active"<?php } ?> ><a href="../../setting/views/change_password.php?page_id=<?php echo $page; ?>" ><i class="fa fa-gear"></i> <span>Change Password</span></a></li>
        <?php if($_SESSION['desig_name']=='CEO/Certification Committe' || $_SESSION['desig_name']=='admin' ) {?>
			        <li> <a href="../../index.php"><i class="fa fa-arrow-left"></i> <span>Back</span></a> </li>
                    <li> <a href="../../login/view/logout.php"><i class="fa fa-sign-out"></i> <span>Logout</span></a> </li> 
			<?php }else{ ?>
            <?php  ?>
			       <li> <a href="../../login/view/logout.php"><i class="fa fa-sign-out"></i> <span>Logout</span></a> </li> 
			<?php } ?>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>