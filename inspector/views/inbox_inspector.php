<?php include ('../../include_files/session_check.php');?>
<?php 
$page=5.1;
$tital="Inspector INBOX";
?>
<?PHP  include("../modal/main_database.php");
				 $db=new main_database();
                                 $d_ins=new main_database();
                                  $count_rem1=$db->get_reminder($_SESSION['user_id']); //10 din k andr wale sare inspection
                                  $count_rem2=$db->get_reminder_non($_SESSION['user_id']);
                                 $count_rem=$count_rem1+$count_rem2;
				 $program=$db->get_enquiry_for_inbox_by_user(trim($_SESSION['desig_name']),$_SESSION['user_id']); 
				 $dep=$db->get_dept();
				 $sts='';
				 $rs_sts='';
				 if($_SESSION['desig_name']=='CEO/Certification Committe'){ // get all status for admin
					 $sts=$db->get_status();					 
					 }else{					 
					 $sts=$db->get_status_by(trim($_SESSION['desig_name']));					 
					 } 
				    ?>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<?php include("../../include_files/header.php");?>
  <?php include("enquiry_nav.php");?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Inbox <small> <?php echo $tital;?> </small> </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Inspector Panel </a></li>
        <li class="active">Inbox</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Incoming Records For Inspections</h3>
            </div>
            <!-- /.box-header -->
             <div class="box-body">
              <table id="example1" class="table table-bordered table-responsive table-hover text-center">
                <thead>
                  <tr>
                  <th width="1%"></th>
                  <th width="5%">Company</th>
                  <th width="5%">ID</th>
                  <th width="5%">Position</th>
                  <th width="20%"> Certification </th>
                  <th  width="10%">Send By </th>
                  <th  width="5%">Enquiry Date </th>
                  <th  width="20%">Status</th>
                   <th width="20%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php   while($data=mysql_fetch_array($program)){
					  
                  echo "<tr><td></td>
                    <td>$data[name] ($data[type])  </td>";?>
					<?php if($data['is_client']==0){ ?>
                  <td><?php echo  $data['enq_id']; ?></td>
                  <?php }else{?>
                  <td><?php echo  $data['client_id']; ?> <span class='label  bg-aqua-active'>Client</span></td>
                  <?php }?>
                   <?php echo "<td>$data[position]</td>";
					?>
                <td><?php echo $c_name=$db->get_certification_name_by_id($data['certi_id'])?></td>
                <td><?php echo $c_name=$db->get_user_by_id($data['sent_from']).' ('. $data['sent_from2'].')'?> </td>
                  <?php echo "<td>";
					?>
                    
                    <?php
					echo $date=$db->get_date_with_slash($data['dates']);
					echo "</td>"?>
                <td><?php 
                echo $data['status'];?> <?php if($data['seen']==0){?><span class='label  bg-green'>New</span> <?php }?><?php if(trim($data['doi'])!='1970-01-01' ){?><span class='label  bg-red'><?php echo $db->get_date_with_slash($data['doi']); } ?></td>
                <td class="no-print"><div class="btn-group"> <a href="../../enquiry/views/view_panel.php?enq_id=<?php echo $data['enq_id'];?>" class="btn btn-danger" title="View Enquiry In Detail"><i class="fa fa-eye"></i> View </a> &nbsp;
                                                <button type="button" class="btn btn-info"><i class="fa fa-lightbulb-o"></i> Action </button>
                      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"> <span class="caret"></span> <span class="sr-only">Toggle Dropdown</span> </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#"></a></li>
                        
                        <li><a href="allotement.php?enq_id=<?php echo $data['enq_id']; ?>" title="This Option Used For ONLY change Records Status" name="<?php echo $data['enq_id']; ?>"><i class="fa fa-edit"></i> Inspection Status Options </a></li>
                        <li><a href="#" title="This Option Used For ONLY Forward Records To Other" data-toggle="modal" data-target="#myModal1"  class="myModals1" name="<?php echo $data['enq_id']; ?>"><i class="fa fa-mail-forward"></i>Forward Options</a></li>
                        
                      </ul>
                    </div></td>
                </tr>
                <?php 
				}
				  ?>
                </tbody>
                
              </table>
                <div id="bar1" class=""> <i id="bar_img1" class=""></i> </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Main Footer -->
  <?php include("../../footer_outer.php"); ?>
  <?php include("staus_remark.php"); ?>
  <!-- end Footer -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li> <a href="javascript::;"> <i class="menu-icon fa fa-birthday-cake bg-red"></i>
            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
              <p>Will be 23 on April 24th</p>
            </div>
            </a> </li>
        </ul>
        <!-- /.control-sidebar-menu -->
        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li> <a href="javascript::;">
            <h4 class="control-sidebar-subheading"> Custom Template Design <span class="label label-danger pull-right">70%</span> </h4>
            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
            </div>
            </a> </li>
        </ul>
        <!-- /.control-sidebar-menu -->
      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>
          <div class="form-group">
            <label class="control-sidebar-subheading"> Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>
            <p> Some information about this general settings option </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 2.1.4 -->
<script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="../plugins/validation.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!--Date Picker-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
 <script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
<script>
      $(function () {       
       var t= $('#example1').DataTable({
           "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'dasc' ]]
    } );
		 t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
		
      });
	  
	  
	 $(document).ready(function() {
  $(".modal").on("hidden.bs.modal", function() {
	$("#bar1").addClass('overlay');
    $("#bar_img1").addClass('fa fa-refresh fa-spin');									 
		delay(3000);
      window.location.reload();
  });
         });
  
    </script>
</body>
</html>
