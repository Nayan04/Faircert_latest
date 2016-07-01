<?php include ('../../include_files/session_check.php');?>
<?php  
$page=10.3;
$tital="Staff List";
?>
<?PHP  include("../modal/get_programs_certificattion.php");
				 $db=new certificate();
				 $programss=$db->get_staff_details(); 
				 
				 $sts='';
				 $rs_sts='';
				 
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
      <h1> View Staff <small>List Of Staff</small> </h1>
      <h4><span id="msgs1"></span></h4>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Reports</a></li>
        <li class="active">Staff List</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h4 class="box-title">Staff Table <a class="btn btn-default"  id="excel"> <i class="fa fa-table" ></i> Excel export </a></h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example"  class="table table-bordered table-striped xls">
                <thead>
                  <tr >
                    <th>SNO</th>
                    <th  width="1%">Staff Name</th>
                    <th  width="10%">Address</th>
                    <th width="5%">Contact No</th>
                    <th  width="20%"> Email </th>
                    <th width="20%">Department</th>
                    <th  width="20%">Designation </th>
                    <th  width="10%">Status</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php   
				// $data=mysql_fetch_array($programss);
			 //print_r($data);die;
			 $i=1;
				  while($data=mysql_fetch_array($programss)){
					   //print_r($data);die;
                  echo "<tr>
				  <td>$i</td>
				     <td>$data[staff_name]</td>
                    <td>$data[address]</td>
                    <td>$data[contact]</td>";
					?>
                <td><?php echo $data['email'];?></td>
                <td><?php echo $data['dept_name'];?></td>
                <td><?php echo $data['desig_name'];?></td>
                  
				                 <?php if($data['isactive']==1){?>
                  <td><span class='label  bg-green'>Active</span></td>
                  <?php }else{?>
                  <td><span class='label  bg-red'>Not Active</span></td>
                  <?php } ?>
                  
                </tr>
                <?php 
				$i++;
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
<script src="../../plugins/excel/src/jquery.table2excel.js"></script>
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
									// alert(rand(0,10));
								//var filen="Client"+ rand(0,9999);	// alert()
        $(".xls").table2excel({
            exclude: ".noExl",
            name: "Excel Document Name",
            filename: "client"
        });
		//alert($('.xls').html());
    });
});
    </script>
</body>
</html>
