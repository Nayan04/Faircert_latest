<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>AdminLTE 2 | Starter</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.5 -->
<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="../../font_awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="../../ionicons-master/ionicons-master/css/ionicons.min.css">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="../../plugins/iCheck/all.css">
<!-- select style -->
<link rel="stylesheet" href="../../plugins/select2/select2.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
<link rel="stylesheet" href="../../dist/css/skins/skin-blue.min.css">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
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
<body class="hold-transition  skin-blue sidebar-mini">
<div class="wrapper">
  <!-- Main Header -->
  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>F</b>ICS</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Fair Cert</b> ICS</span> </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <span class="sr-only">Toggle navigation</span> </a>
      <!-- Navbar Right Menu -->
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class=""><a href=""><i class="fa fa-bar-chart"></i> <span>Enquiry</span></a></li>
        <li><a href="welcome_enquiry.php"><i class="fa fa-book"></i> <span>View Enquiry</span></a></li>
        <li> <a href="#" ><i class="fa fa-plus-square "></i> <span>Add New Enquiry</span></a> </li>
        <li> <a href="#" ><i class="fa fa-angle-left "></i> <span>Add New Enquiry</span></a> </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
    <div class="row">
      <!-- full column -->
      <div class="col-md-12">
        <!-- left column -->
        <!-- general form elements -->
        <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Contact Detail</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-header " id="res"> </div>
        <form class="form-horizontal" method="post" name="enq_form" id="enq_form" autocomplete="on" >
          <div class="box-body">
            <!-- -------------------------------------------------------------------------------------------------->
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-1 control-label">Type</label>
              <div class="col-sm-2">
                <select class="form-control select2" name="firm_type" id="firm_type" >
                  <option selected="selected" value="none">--select--</option>
                  <option value="company">Company</option>
                  <option value="NGO">NGO</option>
                  <option value="group">Group</option>
                  <option value="farm">farm</option>
                  <option value="other">other</option>
                </select>
              </div>
              <label for="inputEmail3" class="col-sm-1 control-label">Name</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Name of company/farm/NGO/group">
              </div>
              <label for="inputEmail3" class="col-sm-2 control-label">Posision/Title</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="designation" name="designation" placeholder="Comapny Designation">
              </div>
            </div>
            <!-- -------------------------------------------------------------------------------------------------->
            <!--div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Mailing Address</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                      </div>
                    </div-->
            <!-- -------------------------------------------------------------------------------------------------->
            <div class="box-header with-border" style="margin-bottom:15px;">
              <h3 class="box-title">Mailing Address</h3>
            </div>
            <!-- /.box-header -->
            <!-- -------------------------------------------------------------------------------------------------->
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-1 control-label ">Street</label>
              <div class="col-xs-3">
                <input type="text" class="form-control " id="street" name="street" placeholder="street">
              </div>
              <label for="inputEmail3" class="col-sm-1 control-label">Taluka</label>
              <div class="col-xs-3">
                <input type="text" class="form-control " id="taluka" name="taluka" placeholder="Taluka">
              </div>
              <label for="inputEmail3" class="col-sm-1 control-label">District</label>
              <div class="col-xs-3">
                <input type="text" class="form-control " id="district" name="district" placeholder="District">
              </div>
            </div>
            <!-- -------------------------------------------------------------------------------------------------->
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-1 control-label">State</label>
              <div class="col-xs-3">
                <input type="text" class="form-control " id="state" name="state" placeholder="State">
              </div>
              <label for="inputEmail3" class="col-sm-1 control-label">Country</label>
              <div class="col-xs-3">
                <input type="text" class="form-control " id="country" name="country" placeholder="Country">
              </div>
              <label for="inputEmail3" class="col-sm-1 control-label">Pincode</label>
              <div class="col-xs-3">
                <input type="text" class="form-control " id="pincode" name="pincode" placeholder="Pincode">
              </div>
            </div>
            <!-- -------------------------------------------------------------------------------------------------->
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-1 control-label">Mobile</label>
              <div class="col-xs-3">
                <input type="text" class="form-control" id="mobile" name="mobile"  placeholder="Mobile" data-inputmask='"mask": "9999999999"' data-mask>
              </div>
              <label for="inputEmail3" class="col-sm-1 control-label">Phone</label>
              <div class="col-xs-3">
                <input type="text" class="form-control" id="phone" name="phone"  placeholder="Phone" data-inputmask='"mask": "99999999999"' data-mask>
              </div>
              <label for="inputEmail3" class="col-sm-1 control-label">Email</label>
              <div class="col-xs-3">
                <input type="email" class="form-control " id="email" name="email" placeholder="Email">
              </div>
            </div>
            <!-- -------------------------------------------------------------------------------------------------->
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-1 control-label">Project Location</label>
              <div class="col-sm-8">
                <input type="text" class="form-control " id="location" name="location" placeholder="Full Address Of Project Location">
              </div>
            </div>
            <!-- -------------------------------------------------------------------------------------------------->
            <div class="box-header with-border" style="margin-bottom:15px;"> CERTIFICATION SERVICES REQUESTED (Please tick ‘X’ appropriate activity) </div>
            <!-- /.box-header -->
            <!-- -------------------------------------------------------------------------------------------------->
            <?php 
				 
				 include("../modal/get_programs_certificattion.php");
				 $db=new certificate();
				 $program=$db->get_programs_module();
				 $colspan=3;
				 while($programs=mysql_fetch_array($program)){
					 
							echo "<b>$programs[1]</b>";
							echo " <div class=form-group>";
							
							$cert=$db->get_certificate_by_program($programs[0]);
							while($certificate=mysql_fetch_array($cert)){
								if($programs[0]==4){
									$colspan=5;
									
									
									}else{
										$colspan=3;
										}
				 ?>
            <label for="inputEmail3" class="col-sm-<?php echo $colspan;?> control-label" style="padding-left:10px; ">
              <input   style="margin-right:10px;" type="checkbox" class="minimal-red" id="certificate<?php echo $certificate['id']; ?>" name="certificate" value="<?php echo $certificate['id']; ?>">
              <?php echo $certificate['certification_name'];  ?></label>
            <?php }?>
          </div>
          <?php }?>
          <!-- -------------------------------------------------------------------------------------------------->
          <div class="box-header with-border" style="margin-bottom:15px;"> INFORMATION REQUIRED FOR QUOTATION </div>
          <!-- /.box-header -->
          <!-- -------------------------------------------------------------------------------------------------->
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">No. of Farmers</label>
            <div class="col-xs-2">
              <input type="text" class="form-control " id="farmerNo" name="farmerNo" placeholder="No. of Farmers">
            </div>
            <label for="inputEmail3" class="col-sm-2 control-label">Land Offered (Ha.)</label>
            <div class="col-xs-2">
              <input type="text" class="form-control " id="landsize" name="landsize" placeholder="Size Of Land">
            </div>
            <label for="inputEmail3" class="col-sm-2 control-label">No. of Villages</label>
            <div class="col-xs-2">
              <input type="text" class="form-control " id="villaNo" name="villaNo" placeholder="Pincode">
            </div>
          </div>
          <!-- -------------------------------------------------------------------------------------------------->
          <!-- -------------------------------------------------------------------------------------------------->
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-6 control-label">No. of Product / Crops Requested for Certification (Attach product list)</label>
            <div class="col-xs-6">
              <input type="text" class="form-control" id="proNo" name="proNo" placeholder="...">
            </div>
            <label for="inputEmail3" class="col-sm-6 control-label">If currently certified, provide the detail of certification program</label>
            <div class="col-xs-6">
              <input type="text" class="form-control " id="programdes" name="programdes" placeholder="Programs Details">
            </div>
            <label for="inputEmail3" class="col-sm-3 control-label">Name of last Certification Body </label>
            <div class="col-xs-3">
              <input type="text" class="form-control " id="lastcerti" name="lastcerti" placeholder="Enter Certification Body">
            </div>
            <label for="inputEmail3" class="col-sm-4 control-label">How many employees at each operation sites / departments </label>
            <div class="col-xs-2">
              <input type="text" class="form-control " id="noemp" name="noemp" placeholder="Enter Certification Body">
            </div>
            <label for="inputEmail3" class="col-sm-6 control-label">Detail of Sub-contracted Unit (If any)</label>
            <div class="col-xs-6">
              <input type="text" class="form-control " id="sub" name="sub" placeholder="Enter Certification Body">
            </div>
          </div>
          <!-- -------------------------------------------------------------------------------------------------->
          <div class="form-group">
            <div class="col-xs-1" style="text-align:right">
              <input type="checkbox" class="minimal-red" id="trueness" name="trueness" value="1">
            </div>
            <label for="inputEmail6" class="col-sm-11 control-label" style="text-align:left" >I do hereby affirm that all information’s provided in this enquiry form are true and correct. </label>
          </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="reset" class="btn btn-primary">Cancel</button>
            <button type="button" class="btn btn-primary pull-center" onClick="add_new_enq()">Add</button>
          </div>
          <!-- /.box-footer -->
        </form>
        <div id="bar" class=""> <i id="bar_img" class=""></i> </div>
      </div>
      <!-- /.box -->
      <!-- Form Element sizes -->
    </div>
    <!--/.col (left) -->
    <!-- right column -->
    <!--/.col (right) -->
  </div>
  <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Main Footer -->
<?php include("../../footer_outer.php"); ?>
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
        //Initialize Select2 Elements
        

        
        //Money Euro
        $("[data-mask]").inputmask();
		$('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
				  });
		</script>
</body>
</html>
