<?php include ('../../include_files/session_check.php');?>
<?php 
$page=4.4;
$tital="List Of Inspection";
?>
<?PHP  include("../modal/inspection_manager.php");
				 $db=new inspection_manager();
                                 $d_ins=new inspection_manager();
                                 $total_insp1=$db->get_total_inspection();
                                 $total_insp2=$db->get_total_noncomplain();
                                 $total_insp=$total_insp1+$total_insp2;
                                 $program='';
                                 
				 
				 $dep=$db->get_dept();
				 $sts='';
				 $rs_sts='';
				 if($_SESSION['desig_name']=='CEO/Certification Committe'){ // get all status for admin
					 $sts=$db->get_status();
                                         $program=$db->get_all_inspections(); 
					 }else if($_SESSION['desig_name']=='Inspection Manager'){					 
					 $sts=$db->get_status_by(trim($_SESSION['desig_name']));
                                         $program=$db->get_all_inspection(); 
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
      <h1>Inspection <small> <?php echo $tital;?> </small> </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Inspector Panel </a></li>
        <li class="active">Inspection List</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List Off All Inspection</h3>
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
                  <th  width="10%">Send By </th>
                   <th  width="20%">Inspector</th>
                  <th  width="5%"> Date Of Inspection </th>
                  <th  width="20%">Status</th>
                  <th  width="20%">Remark</th>
                 
                  
                  </tr>
                </thead>
                <tbody>
                  <?php   while($data=mysql_fetch_array($program)){
					  
                  echo "<tr><td></td>
                    <td>$data[company_name] ($data[firm_type])  </td>";?>
					<?php if($data['is_client']==0){ ?>
                  <td><?php echo  $data['enquiry_id']; ?></td>
                  <?php }else{?>
                  <td><?php echo  $data['client_id']; ?> <span class='label  bg-aqua-active'>Client</span></td>
                  <?php  }?>
                   <?php echo "<td>".$data['position']."</td>";
					?>
                
                <td><?php echo $c_name=$db->get_user_by_id($data['from_user']).' ('. $data['from_dept'].')'?> </td>
                  <td><?php echo $c_name=$db->get_user_by_id($data['created_by']);?> </td>
                    <?php echo "<td>";
					?>
                
                    
                    <?php
                    $status=$data['status'];
                    $date='';
                    $type='';
                    $color='';
                    $color1='bg-blue';
                    $days1=0;
                    $days=0;
                    ?>
                
		 <?php if($status=='Send Date Of Inspection, Info And Audit Plan To Client'|| $status=='Send Revised Date Of Inspection, Info And Audit Plan To Client' || $status=='Acceptance Of Date Of Inspection By Client'){			
                    $date1=date('Y-m-d');
                    $date2=  date('Y-m-d', strtotime($data['d_o_inspection']));
                    
                  $diff=abs(strtotime($date2))-  abs(strtotime($date1));
                  
                  $years = floor($diff / (365*60*60*24)); 
                  $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                   $days = floor($diff /(60*60*24));
                  
                  
                   if($days>=0 && $days<=3){
                       $color='bg-red';
                   }if($days>=4 && $days<=9){
                       $color='bg-yellow';
                   }
                   
                   //$in=     $date1->diff($date2);
                   //echo $in->days;
                //  echo $diff=  date_diff($date1, $date1);
                    // if()
                      ?>
                <span class='label  <?php echo $color; ?>'>
                       <?php  echo 'From '. $date=$db->get_date_with_slash($data['d_o_inspection']).' To '. $date=$db->get_date_with_slash($data['d_o_inspection_to']). '<br/> ' .$days. ' Days Left' ;
                    $date=$db->get_date_with_slash($data['d_o_inspection']);?>
                </span>
                    <?php
                  }else if($status=='NonCompliance Found During The Inspection'|| $status=='NonCompliance Closure Received' ){
                     $date11=date('Y-m-d');
                      $date3=  date('Y-m-d', strtotime($data['d_o_noncom']));
                      $diff1=abs(strtotime($date3))-  abs(strtotime($date11));
                      $years1 = floor($diff1 / (365*60*60*24)); 
                  $months1 = floor(($diff1 - $years1 * 365*60*60*24) / (30*60*60*24));
                  $days1 = floor(($diff1)/ (60*60*24));
                  if($days1>=0 && $days1<=3){
                       $color1='bg-red';
                   }if($days1>=4 && $days1<=10){
                       $color1='bg-yellow';
                   }
                      
                      ?>
                        <span class='label <?php echo $color1; ?>'>  <?php 
                      echo $date=$db->get_date_with_slash($data['d_o_noncom']).'<br/>'.$days1.' Days Left';
                      $db->get_date_with_slash($data['d_o_noncom']);
                      $type= $data['noncom_type'];
                      ?>
                            </span>
                      <?php
                  }?>
                            
                <?php 
					echo "</td>"?>
                <td><?php echo $data['status'];?> 
                
                    <span class='label  bg-red'><?php echo $type;?></td>
                  <td><?php echo $data['remarks']; ?></td>
                  
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
