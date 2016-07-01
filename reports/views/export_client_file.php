<?php include ('../../include_files/session_check.php');?>
<?php  
$page=10.4;
$tital="Client List";
?>
<?PHP  include("../modal/get_programs_certificattion.php");
				 $db=new certificate();
				 $programss=$db->get_register_clients_report(); 
				 $dep=$db->get_dept();
				 $sts='';
				 $rs_sts='';
				 if($_SESSION['desig_name']=='admin'){ // get all status for admin
					 $sts=$db->get_status();					 
					 }else{					 
					 $sts=$db->get_status_by($_SESSION['desig_name']);					 
					 } 
				    ?>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<?php include("../../include_files/header.php");?>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
  -->
  <!-- Left side column. contains the logo and sidebar -->
  <?php include("report_nav.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> View Client <small>List Of Clients</small> </h1>
      <h4><span id="msgs1"></span></h4>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Reports</a></li>
        <li class="active">Client List</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h4 class="box-title">Register Client Table <a class="btn btn-default"  id="excel"> <i class="fa fa-table" ></i> Excel </a></h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow:scroll;" >
              <table cellspacing="0" cellpadding="0" >
              </table>
              <table id="example1"  class="table table-bordered xls">
                <thead>
                <th width="1%">SR.NO</th>
                <th width="5%">CLENT ID</th>
                  <th width="5%">CLENT NAME</th>
                  <th width="5%">ICS NAME</th>
                  <th width="2%">State</th>
                  <th width="2%">District</th>
                  <th width="2%">Village</th>
                  <th width="5%">Project</th>
                  <th width="6%">Registration <br>
                    Date</th>
                  <th width="1%">Total<br>
                    Farmer</th>
                  <th width="2%">Total<br>
                    Area (Ha)</th>
                  <th width="6%">Date of Application Received</th>
                  <th width="6%">Date of initial    Review</th>
                  <th width="6%">Name of Initial    Reviewer </th>
                  <!--th width="">Additional    Information Letter</th>
    <th width="125">Inspection    Information Letter</td-->
                  <th width="6%">Date of    inspection</th>
                  <th width="5%">Name of    Inspector</th>
                  <th width="6%">Date of NC to be    Closed</th>
                  <th width="6%">Date of NC    Close on Tracenet</th>
                  <th width="6%">Date of    Secondary Review</th>
                  <th width="6%">Name of    Secondary Reviewer
                    </td>
                  <th width="6%">Date of    Certification Decision
                    </td>
                  <th width="6%">Date of Issue of    Scope certificate
                    </td>
                  <th width="3%">Certification    Status (Inconversion / Certified)
                    </td>
                    </thead>
                <tbody>
                  <?php   
				// $data=mysql_fetch_array($programss);
			 //print_r($data);die;
				  while($data=mysql_fetch_array($programss)){
					   //print_r($data);die;
					   $is=explode(',',$data['ics_name']);
					   $fa=explode(',',$data['no_of_farmer']);
					   $land=explode(',',$data['land_offered']);
					   $i=0;
					   for($i=0;$i<sizeof($is);$i++){
						   
					   
                  echo "<tr>
				  <td></td>
				     <td>$data[client_id]</td>";
					 
					 ?>
                      <td><?php echo $data['company_name']; ?></td>
					 <td><?php echo $is[$i]; ?></td>
					 <td><?php echo $data['state'];?></td>
					 <td><?php echo $data['district'];?></td>
					 <td><?php echo $data['taluka']; ?></td>
                    <td></td>               
                   <td><?php echo $db->get_date_with_slash($data['d_o_registration']);?></td>
                  <td><?php echo $fa[$i];?></td>
                  <td><?php echo $land[$i];?></td>
                  <td><?php echo $db->get_date_with_slash($data['d_o_application_recevied']);?></td>
                  <td><?php echo $db->get_date_with_slash($data['d_o_initial_review']);?></td>
                  <td><?php echo $data['name_of_initial_inspector'];?></td>
                  <td><?php echo $data['d_o_inspectionss'];?></td>
                  <td><?php echo $data['name_o_inspector'];?></td>
                  <td><?php echo $data['d_o_noncomss'];?></td>
                  <td><?php echo $data['d_o_noncom_tracenet'];?></td>
                  <td><?php echo $db->get_date_with_slash($data['d_o_second_review']);?></td>
                  <td><?php echo $data['name_of_2nd_reviewer'];?></td>
                  <td><?php echo $db->get_date_with_slash($data['d_o_cert_decision']);?></td>
                  <td><?php echo $db->get_date_with_slash($data['d_o_scop_cert_issue']);?></td>
                  <td><?php echo $data['certification_status'];?></td>
                </tr>
                <?php 
				}
				  }
				  ?>
                </tbody>
                
              </table>
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
<script src="../../plugins/excel/src/jquery.table2excel1.js"></script>
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
		delay(1000);
      document.location='welcome_enquiry.php';
											// alert();
  // $('#status').reset();
  });
});
$(function() {
    
});
	 
	 $(function() {
    $("#excel").on('click', function() {
									// alert()
        $(".xls").table2excel({
            exclude: ".noExl",
            name: "Excel Document Name",
            filename: "Client"
        });
		//alert($('.xls').html());
    });
});
    </script>
</body>
</html>
