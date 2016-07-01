<?php session_start();
if(isset($_SESSION['user_id'])){
	
         if($_SESSION['desig_name']=='admin' || $_SESSION['desig_name']=='CEO/Certification Committe' || $_SESSION['desig_name']=='BDE' || $_SESSION['desig_name']=='Inspection Manager' || $_SESSION['desig_name']=='Certification Manager' ){
             
         }else{?>
<script>
            alert("You are not valid user!!");
            document.location='login/view/logout.php';
   </script>
<?php
    }
	}else{?>
<script>
            //alert("Please Login !!!");
            document.location='login/view/login_form.php';
        </script>
<?php }	
$page='10.1';
$tital='Reports Dashboard';
include('../modal/get_programs_certificattion.php');
$db=new certificate();
$total_client=$db->get_client_count();
$total_enq=$db->get_enq_count_for_report();
$total_re=$total_client+$total_enq;
$total_staff=$db->total_staff();
$total_insp1=$db->get_total_inspection();
                                 $total_insp2=$db->get_total_noncomplain();
                                 $total_insp=$total_insp1+$total_insp2;
								 $pro=$db->get_all_inspection(); 


?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Report Dashbord</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.5 -->
<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="../../font_awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="../../ionicons-master/ionicons-master/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="../../dist/css/skins/skin-blue.min.css">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
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
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> <span class="hidden-xs">Welcome <?php echo $_SESSION['name'] ; ?> </span> </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header"> 
              <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                <p> <?php echo $_SESSION['name'] ; ?> - Report Section </p>
              </li>
              <!-- Menu Body -->
              <!--li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li-->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left"> <a href="#" class="btn btn-default btn-flat">Profile</a> </div>
                <div class="pull-right"> <a href="login/view/logout.php" class="btn btn-default btn-flat">Sign out</a> </div>
              </li>
            </ul>
          </li>
          <!-- Navbar Right Menu -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include("report_nav.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Report <small>Dashboard</small> </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Report </a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box"> <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people"></i></span>
            <div class="info-box-content"> <span class="info-box-text">Total Client</span> <span class="info-box-number"><?php echo $total_client; ?><small> Clients </small></span> </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box"> <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>
            <div class="info-box-content"> <span class="info-box-text">Total Enquiry</span> <span class="info-box-number"><?php echo $total_enq; ?></span></div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box"> <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
            <div class="info-box-content"> <span class="info-box-text">Total Staff</span> <span class="info-box-number"><?php echo $total_staff; ?></span> </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box"> <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
            <div class="info-box-content"> <span class="info-box-text">Total Inspection</span> <span class="info-box-number"><?php echo $total_insp; ?></span> </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest 10 Inspection List</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
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
                  <?php   while($data=mysql_fetch_array($pro)){
					  
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
                   }else if($days>=4 && $days<=9){
                       $color='bg-yellow';
                   }else{
                       $color='bg-blue';
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
                   }else if($days1>=4 && $days1<=10){
                       $color1='bg-yellow';
                   }else{
					   $color1='bg-blue';
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
                <!--table class="table no-margin">
                  <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Item</th>
                      <th>Status</th>
                      <th>Popularity</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR9842</a></td>
                      <td>Call of Duty IV</td>
                      <td><span class="label label-success">Shipped</span></td>
                      <td><div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div></td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR1848</a></td>
                      <td>Samsung Smart TV</td>
                      <td><span class="label label-warning">Pending</span></td>
                      <td><div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div></td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR7429</a></td>
                      <td>iPhone 6 Plus</td>
                      <td><span class="label label-danger">Delivered</span></td>
                      <td><div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div></td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR7429</a></td>
                      <td>Samsung Smart TV</td>
                      <td><span class="label label-info">Processing</span></td>
                      <td><div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div></td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR1848</a></td>
                      <td>Samsung Smart TV</td>
                      <td><span class="label label-warning">Pending</span></td>
                      <td><div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div></td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR7429</a></td>
                      <td>iPhone 6 Plus</td>
                      <td><span class="label label-danger">Delivered</span></td>
                      <td><div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div></td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR9842</a></td>
                      <td>Call of Duty IV</td>
                      <td><span class="label label-success">Shipped</span></td>
                      <td><div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div></td>
                    </tr>
                  </tbody>
                </table-->
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
          
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <!-- /.col -->
                <div class="col-md-6" >
                  <p class="text-center"> <strong>Goal Completion</strong> </p>
                  <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['category', 'Total Number'],
          ['Enquiry',   <?php echo $total_enq; ?>],
          ['Client',  <?php echo $total_client; ?>]
        ]);

        var options = {
          title: 'Chart Report',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
    <div id="piechart_3d" style="width:100%; height: 100%;"></div>
                  <!-- /.progress-group -->
                </div>
                <!-- /.col -->
                
                <div class="col-md-6">
                  <!-- Info Boxes Style 2 -->
                  <div class="info-box bg-yellow"> <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
                    <div class="info-box-content"> <span class="info-box-text">Inventory</span> <span class="info-box-number">5,200</span>
                      <div class="progress">
                        <div class="progress-bar" style="width: 50%"></div>
                      </div>
                      <span class="progress-description"> 50% Increase in 30 Days </span> </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                  <div class="info-box bg-green"> <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
                    <div class="info-box-content"> <span class="info-box-text">Mentions</span> <span class="info-box-number">92,050</span>
                      <div class="progress">
                        <div class="progress-bar" style="width: 20%"></div>
                      </div>
                      <span class="progress-description"> 20% Increase in 30 Days </span> </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                  <div class="info-box bg-red"> <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>
                    <div class="info-box-content"> <span class="info-box-text">Downloads</span> <span class="info-box-number">114,381</span>
                      <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
                      </div>
                      <span class="progress-description"> 70% Increase in 30 Days </span> </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                  <div class="info-box bg-aqua"> <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>
                    <div class="info-box-content"> <span class="info-box-text">Direct Messages</span> <span class="info-box-number">163,921</span>
                      <div class="progress">
                        <div class="progress-bar" style="width: 40%"></div>
                      </div>
                      <span class="progress-description"> 40% Increase in 30 Days </span> </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                  <!-- /.box -->
                  <!-- PRODUCT LIST -->
                  <!-- /.box -->
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
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
<!-- Bootstrap 3.3.5 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="../../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="../../plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
</body>
</html>
