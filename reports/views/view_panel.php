<?php include ('../../include_files/session_check.php');?>
<?php
$page = 2.5;
$tital = "View Enquiry";

$user_id = 'unknown';
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = 'unknown';
}
include("../../include_files/header.php");
include("../modal/get_programs_certificattion.php");
$db = new certificate();
$id = $_REQUEST['enq_id'];
$data = $db->get_all_detail_of_enquiry($id);
$row = mysql_fetch_array($data);
if (mysql_num_rows($data) > 0) {
    ?>
    <script type="text/javascript">

        function PrintElem(elem)
        {
            Popup($(elem).html());
        }

        function Popup(data)
        {
			 <?php if ($row['is_client'] == 0) { ?>
              var mywindow = window.open('', 'Enquiry Details', 'height=400,width=600');
			    mywindow.document.write('<html><head><title>Enquiry<?php echo date('dmYhis'); ?></title>');
            <?php } else { ?>
                var mywindow = window.open('', 'Client Details', 'height=400,width=600');
				  mywindow.document.write('<html><head><title>Client<?php echo date('dmYhis'); ?></title>');
            <?php } ?>
			
            
          
            /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
           // mywindow.document.write('<link rel=stylesheet href="../../bootstrap/css/bootstrap.min.css" />');
           // mywindow.document.write('<link rel=stylesheet href="../../font_awesome/css/font-awesome.min.css" />');

           // mywindow.document.write('<link rel=stylesheet href="../../plugins/datatables/dataTables.bootstrap.css" /> ');
            //mywindow.document.write('<link rel=stylesheet href="../../dist/css/AdminLTE.min.css" />');
           // mywindow.document.write('<link rel=stylesheet href="../../dist/css/skins/_all-skins.css" />');
          //  mywindow.document.write('<style >td{ border:1px dashed gray; }</style>');

            mywindow.document.write('</head><body >');
	    mywindow.document.write('<div style="width:100%; min-height:100px; padding:2px;"><div style="float:left;width:120px; min-height:80px;"><img src="../../dist/img/logo.png" alt="LOGO" ></div><div style="float:right;"><?php echo date('d-m-Y h:i:s a'); ?><br> User Name:<?=$_SESSION['name']; ?></div></div><hr>');
            mywindow.document.write(data);
            mywindow.document.write('<hr></body></html>');

            mywindow.document.close(); // necessary for IE >= 10
            mywindow.focus(); // necessary for IE >= 10

            mywindow.print();
            mywindow.close();

            return true;
        }

    </script>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <!-- Sidebar Menu -->


            <ul class="sidebar-menu">
                <li class="header"><i class="fa fa-bar-chart"></i> Enquiry details</li>
                <!-- Optionally, you can add icons to the links -->
                <li class=""><a href="#" onclick="history.go(-1)" ><i class="fa fa-table"></i> <span>Back</span></a></li>
                <!--li class="active"><a href="edit_enquiry.php?enq_id=<?php echo $id; ?>" ><i class="fa fa-edit"></i> <span>Edit</span></a></li-->

            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <?php if ($row['is_client'] == 0) { ?>
                <h1> Enquiry Details </h1>
            <?php } else { ?>
                <h1> Client Details </h1>
            <?php } ?>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>  <?php if ($row['is_client'] == 0) { ?>
                Enquiry Details 
            <?php } else { ?>
                Client Details            
                    <?php } ?></a></li>
                <li class="active">View Panel</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">

                <!-- /.box -->


                <!-- /.col -->
               <div class="col-md-12">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#activity" data-toggle="tab"> <?php if ($row['is_client'] == 0) { ?>
                Enquiry Details 
            <?php } else { ?>
                 Client Details 
            <?php } ?></a></li>
                <li><a href="#timeline" data-toggle="tab">History</a></li>
                <!--li><a href="#settings" data-toggle="tab">Settings</a></li-->
              </ul>
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                <div class="col-md-12">
              <div class="box box-solid">
                <div class="box-header with-border">
                  
                    <h4 class="box-title" style="margin-left:40%"><?php if ($row['is_client'] == 0) { ?>
                Enquiry Details 
            <?php } else { ?>
                 Client Details 
            <?php } ?></h4>&nbsp;&nbsp;<i style="float: right"  onclick="PrintElem(activity)" class="fa fa-print btn btn-flat no-print"></i>
                </div><!-- /.box-header -->
                                <div class="box-body" >

                 <table class="table">
                 <tr>
                 <td colspan="6"><h4 class="box-title">Contact Details</h4></td>
                 </tr>
                                                <tr>
                                                
                                                    <td>Form No:</td>
                                                    <td><?php echo $row['enquiry_id']; ?> </td>                   
                                                    <td>Name of company/Group/Farm/NGO </td>
                                                    <td><?php echo $row['company_name']; ?> </td> 
                                                    <td>Post Time:</td>
                                                    <td><?php echo $row['times']; ?> </td>
                                                </tr>               
                                                <tr>
                                                    <td>Issue Date:</td>
                                                    <td><?php $dates = $db->get_date_with_slash($row['created_date']);
        echo $dates;
            ?> 
                                                    </td>                    
                                                    <td>Company Representative (Position/Title)</td>
                                                    <td><?php echo $row['position']; ?></td>
                                                    <td>Project Location</td>
                                                    <td><?php echo $row['project_location']; ?></td>
                                                </tr>
                                                <tr>                                                    
                                                    <td colspan="6"><div class="box-title"><h4>Mailing Address</h4></div> </td>

                                                </tr>
                                                <tr>

                                                    <td>Street:</td>
                                                    <td><?php echo $row['street']; ?> </td>                    
                                                    <td>State</td>
                                                    <td><?php echo $row['state']; ?> </td>  
                                                    <td>phone</td>
                                                    <td><?php echo $row['phone']; ?></td>                 
                                                </tr>
                                                <tr>

                                                    <td>Taluka</td>
                                                    <td><?php echo $row['taluka']; ?> </td>                    
                                                    <td>Country</td>
                                                    <td><?php echo $row['country']; ?></td>
                                                    <td>Mobile</td>
                                                    <td><?php echo $row['mobile']; ?></td>
                                                </tr>
                                                <tr>

                                                    <td>District:</td>
                                                    <td><?php echo $row['district']; ?> </td>

                                                    <td>Pincode </td>
                                                    <td><?php echo $row['pincode']; ?> </td>
                                                    <td>Email</td>
                                                    <td><?php echo $row['email']; ?></td>                    

                                                </tr>                                                   
                                                <tr>

                                                    <td colspan="6"><div class="box-title"><h4 >CERTIFICATION SERVICES REQUESTED </h4></div></td>
                                                </tr>
                                                <tr>                                                    
                                                    <td  style="font-size:13px;">SNO</td>    
                                                    <td colspan="2"  style="font-size:13px;">Certification Name</td>
                                                    <td colspan="3" style="font-size:13px; font-weight:bold;">Programs Category </td>    
                                                </tr>
                                                    <?php
                                                    $c_name = $db->get_certipro_name_by_id($row['certification_id']);
													//print_r($c_name);
                                                    $key = array_keys($c_name);
                                                    $values = array_values($c_name);
                                                    for ($i = 0; $i < count($c_name); $i++) {
													
                                                        ?>
                                                          <tr>  
                                                        <td><?php echo $i + 1; ?></td>
                                                        <td colspan="2"><?php echo $key[$i]; ?></td>
                                                        <td colspan="3"><?php echo $values[$i]; ?></td>
                                                       </tr>
                                                  
    <?php } ?>                    

                                               
                                                <tr > 
                                                    <td colspan="6"><div class="box-title"><h4>INFORMATION REQUIRED FOR QUOTATION</h4></div></tr>
                                                    <?php $ics=  explode(',',$row['ics_name']); 
                                                          $nofrmr=explode(',',$row['no_of_farmer']); 
                                                          $land=explode(',',$row['land_offered']);
														   $novil=explode(',',$row['no_of_village']);
														    $nopro=explode(',',$row['no_of_product']);
															$pro_list=explode(',',$row['product_list']);
                                                    
                                                    ?>
                                                <?php for($k=0;$k<sizeof($ics);$k++){ ?>
                                                <tr><td>ICS NAME <?php echo $k+1; ?></td>
                                                    <td><?php echo $ics[$k]; ?></td>
                                                    <td>Land Size <?php echo $k+1; ?></td>
                                                    <td><?php echo $land[$k] ?></td>
                                                    <td>No of Farmers <?php echo $k+1; ?></td>
                                                    <td><?php echo $nofrmr[$k];  ?></td>
                                                </tr>
                                                <tr>
                                                <td>No. of Villages</td>
                                                <td><?php echo $novil[$k];  ?></td>
                                                              
                                                    <td>No. of Product </td>
                                                    <td><?php echo $nopro[$k]; ?> </td> 
                                                    <td> Product List </td>
                                                    <td><?php echo $pro_list[$k]; ?> </td> 
                                                </tr>
                                                <?php } ?>
                                                <tr>

                                                        
                                                    
                                                     
                                                    <td>If currently certified, provide the detail of certification program</td>
                                                    <td><?php echo $row['pre_certification_name']; ?></td>                 
                                                </tr>
                                                <tr>

                                                     <td>Detail of Sub-contracted Unit (If any) </td>
                                                    <td><?php echo $row['sub_contract_detail']; ?> </td>
                                                    <td> Sub-contracted Unit Location</td>
                                                    <td><?php echo $row['subcontract_location']; ?></td> 
                                                    <td>Name of last Certification Body </td>
                                                    <td><?php echo $row['last_certification_body']; ?></td>
                                                    
                                                    
                                                </tr>
                                                <tr>

                                                    

                                                    
                                                    
                                                    <td>How many employees at each operation sites / departments</td>
                                                    <td><?php echo $row['no_of_emp']; ?></td>
                                                    <td>Name of Operator</td>
                                                    <td><?php echo $row['created_by']; ?></td>                    

                                                </tr>
                                            </table>
                
                </div><!-- /.box-body -->
                
              </div><!-- /.box -->
            </div>
                
                  <!-- Post -->
                  <div class="post">
                    <div class="user-block"> <!--img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image"--> </div>
                    <!-- /.user-block -->
                    
                    
                    
                  </div>
                 
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="timeline">
                  <!-- The timeline -->
                  <div class="box box-solid">
                      <div class="box-header">
                          <div class="box-title">History Of <?php echo $row['enquiry_id'];  ?></div>
                      </div>
                      <div class="box-body">
                  <ul class="timeline timeline-inverse">
                  <?php $rss2=$db->get_history_date($row['enquiry_id']);
                        while ($rowd=  mysql_fetch_array($rss2)){ ?>                          
                        <li class="time-label"> <span class="bg-red"> <?php echo $dates= $db->get_date_with_slash($rowd['created_date'] );  ?> </span> </li>
                 <?php  $rss1=$db->get_history_bys($row['enquiry_id'],$rowd['created_date']);
				          while($row1=mysql_fetch_array($rss1) ){
				  ?>
                    <!-- timeline time label -->
                    
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li> <i class="fa fa-envelope bg-blue"></i>
                      <div class="timeline-item"> <span class="time"><i class="fa fa-clock-o"></i> Worked  <?php   $times=strtotime($row1['created_date']." ".$row1['created_time']); 
					 echo  $d=$db->elapsedTime($times); ?> ago </span>
                          <h3 class="timeline-header"> Status Updated By Operator <a href="#" class="label-default pad"><?php echo $db->get_user_by_id($row1['created_by']); ?> </a> </h3>
                        <div class="timeline-body ">Current Status :- <?php  echo $row1['status'] ;?><P>Remark :- <?php  echo $row1['remarks'] ;?></div>
                        <!--div class="timeline-footer"> <a class="btn btn-primary btn-xs">Read more</a> <a class="btn btn-danger btn-xs">Delete</a> </div-->
                      </div>
                    </li>
                                          <?php }}?>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                   
                    <!-- END timeline item -->
                    <!-- timeline item -->
                   
                    <!-- END timeline item -->
                    <!-- timeline time label -->
                   
                  </ul>
                      </div>
                  </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="settings">
                  <form class="form-horizontal">
                    <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Name</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputName" placeholder="Name">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" placeholder="Name">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputExperience" class="col-sm-2 control-label">Experience</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputSkills" class="col-sm-2 control-label">Skills</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox">
                            I agree to the <a href="#">terms and conditions</a> </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include("../../footer_outer.php"); ?>
   <!-- Control Sidebar -->
    
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->
    <?php
} else {
    echo "No Records Found";
}
?>
<!-- jQuery 2.1.4 -->
<script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>


</body>
</html>
<hr>
