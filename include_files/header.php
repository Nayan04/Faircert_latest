
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.5 -->
<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="../../font_awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="../../ionicons-master/ionicons-master/css/ionicons.min.css">
<!-- Date -->
<link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
<!-- DataTables -->
<link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
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
<link rel="stylesheet" href="../../dist/css/skins/_all-skins.css">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<?php if(isset($tital)){?>
<title><?php echo $tital; ?></title>
<?php }else{ ?>
<title>FairCert</title>
<?php }
       if(isset($from)){
           $skin='skin-blue';
       }else{
        if($page>1 && $page<2){
	$skin='skin-blue'; //admin Section
	}else if($page>2 && $page<3){
	$skin='skin-red'; //enquiry Section
        }else if($page>3 && $page<4){
	$skin='skin-yellow';
	}else if($page>4 && $page<5){
	$skin='skin-purple';
	}else if($page>5 && $page<6){
	$skin='skin-green';
	}else if($page>6 && $page<7){
	$skin='skin-red';
	}else if($page>7 && $page<8){
	$skin='skin-green';
	}else if($page>8 && $page<9){
	$skin='skin-yellow';
	}else if($page>9 && $page<10){
	$skin='skin-purple';
	}else{
	$skin='skin-blue';
	}
        $panel='';
 if($_SESSION['desig_name']=='BDE'){
     $panel='BDE';
 }else if($_SESSION['desig_name']=='Accountant'){
     $panel='Billing';
 }else if($_SESSION['desig_name']=='Inspector'){
      $panel='Inspector';
 }else if($_SESSION['desig_name']=='Inspection Manager'){
      $panel='Inspection Manager';
 }else if($_SESSION['desig_name']=='Reviewer'){
     $panel='Reviewer';
 }else if($_SESSION['desig_name']=='Certification Manager'){
     $panel='Certification Manager';
 }else if($_SESSION['desig_name']=='CEO/Certification Committe'){
      $panel='CEO/Certification Committe';
 }else if($_SESSION['desig_name']=='Admin'){
      $panel='Supper Admin';
 }else{
     $panel='Unknown User';
 }
       }
?>
<!-- Tell the browser to be responsive to screen width -->

</head>

<!-- Main Header -->
<?php if(isset($from)){?>
    <body class="hold-transition <?php echo $skin;?> sidebar-collapse ">
<div class="wrapper">
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
   
    
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav" >
          <li><a href="http://www.faircert.com/"><i class="fa fa-home"></i> Home</a></li>  
      </ul>
    </div>
  </nav>
    </header>
        
<?php }else{ ?>
<body class="hold-transition <?php echo $skin;?> sidebar-mini ">
<div class="wrapper">
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
    
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav" >
          <li><a href="../../documentation/index.php"><i class="fa fa-book"></i>Documentation</a></li>
          <?php
          //Start Inspection for all inspector
          if(isset($total_insp)){ ?>
            <li class="dropdown messages-menu" >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-success"><?php echo $total_insp;?></span>
                </a>
                <ul class="dropdown-menu" style="min-width:500px;">
                  <li class="header">Total <?php echo $total_insp;?> Inspections In Next 10 days</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu" >
                        <?php $rem_t=$db->get_total_inspection_detail();
                              $rem3=$db->get_total_noncomplain_detail();
 while ($remem_t=  mysql_fetch_array($rem_t)){
                        ?>
                        <li ><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                              
                            <?=$remem_t['enquiry_id']; ?>
                          </div>
                            <h4 style="font-size: 11px;">
                            <?=$remem_t['status'] ?>
                            <small><i class="fa fa-clock-o"></i><?=$db->get_date_with_slash($remem_t['d_o_inspection']);?> </small>
                          </h4>
                          <p>Remark: <?=$remem_t['remarks'];?></p>
                        </a>
                      </li><!-- end message -->
 <?php }
                      while ($rem_non=  mysql_fetch_array($rem3)){
                        ?>
                        <li ><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                              
                            <?=$rem_non['enquiry_id']; ?>
                          </div>
                            <h4 style="font-size: 11px;">
                            <?=$rem_non['status'] ?>
                            <small><i class="fa fa-clock-o"></i><?=$db->get_date_with_slash($rem_non['d_o_noncom']);?> </small>
                          </h4>
                          <p>Remark: <?=$rem_non['remarks'];?></p>
                        </a>
                      </li><!-- end message -->
 <?php }?>
                      
                    </ul>
                  </li>
                  <li class="footer"><a href="inspection_list.php">See All Inspection</a></li>
                </ul>
              </li>
          <?php } 
          //close Inspection for all inspector
          ?>
          <?php 
          //Start Inspection for login inspector
          if(isset($count_rem)){ ?>
            <li class="dropdown messages-menu" >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-success"><?php echo $count_rem;?></span>
                </a>
                <ul class="dropdown-menu" style="min-width:500px;">
                  <li class="header">You have <?php echo $count_rem;?> Inspections In Next 10 days</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu" >
                        <?php $rem=$d_ins->get_details_rem($_SESSION['user_id']);
                              $rem2=$d_ins->get_details_rem_non($_SESSION['user_id']);
                          while ($remem=  mysql_fetch_array($rem)){
                        ?>
                        <li ><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                              
                            <?=$remem['enquiry_id']; ?>
                          </div>
                            <h4 style="font-size: 11px;">
                            <?=$remem['status'] ?>
                            <small><i class="fa fa-clock-o"></i><?=$d_ins->get_date_with_slash($remem['d_o_inspection']);?> </small>
                          </h4>
                          <p>Remark: <?=$remem['remarks'];?></p>
                        </a>
                      </li><!-- end message -->
 <?php }?>
                    <?php  while ($remem1=  mysql_fetch_array($rem2)){
                        ?>
                        <li ><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                              
                            <?=$remem1['enquiry_id']; ?>
                          </div>
                            <h4 style="font-size: 11px;">
                            <?=$remem1['status'] ?>
                            <small><i class="fa fa-clock-o"></i><?=$d_ins->get_date_with_slash($remem['d_o_noncom']);?> </small>
                          </h4>
                          <p>Remark: <?=$remem1['remarks'];?></p>
                        </a>
                      </li><!-- end message -->
 <?php }?>
                      
                    </ul>
                  </li>
                  <li class="footer"><a href="inspection_list.php">See All Inspection</a></li>
                </ul>
              </li>
          <?php } 
          //close Inspection for login inspector
          ?>
        <li class="dropdown user user-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> <span class="hidden-xs">Welcome <?php echo $_SESSION['name'] ; ?> </span> </a>
          <ul class="dropdown-menu">
              
            <!-- User image -->
            <li class="user-header"> <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
              <p> <?php echo $_SESSION['name'] ; ?> - <?php echo $_SESSION['desig_name'] ; ?> Section </p>
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
              <div class="pull-right"> <a href="../../login/view/logout.php" class="btn btn-default btn-flat">Sign out</a> </div>
            </li>
          </ul>
        </li>
        <!-- Navbar Right Menu -->
      </ul>
    </div>
  </nav>
</header>
<?php }?>    
