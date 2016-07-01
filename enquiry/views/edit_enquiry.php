<?php include ('../../include_files/session_check.php');?>
<?php 
include("../modal/get_programs_certificattion.php");
$page=2.6;
$tital="Edit Enquiry Form";
$id=$_REQUEST['enq_id'];
$obj= new certificate();
$db= new certificate();
$enq_detail=$obj->get_all_detail_of_enquiry($id);
$row=mysql_fetch_array($enq_detail);
if(mysql_num_rows($enq_detail)>0){
?>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<?php include("../../include_files/header.php");?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <!-- Sidebar Menu -->
    

    <ul class="sidebar-menu">
      <li class="header"><i class="fa fa-bar-chart"></i> Enquiry details</li>
      <!-- Optionally, you can add icons to the links -->
      <li class="active"><a href="view_panel.php?enq_id=<?php echo $id; ?>"><i class="fa fa-table"></i> <span>Back</span></a></li>
     
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
            <div class="msgs2"></div>
          <h3 class="box-title">Edit Details of Client Id <?php echo $id; ?></h3>
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
              <input type="hidden" name="enq_id" id="enq_id" value="<?php echo $id; ?>">
              <?php $firm=$row['firm_type'];?>
                <select class="form-control select2" name="firm_type" id="firm_type" >
                 
                  <option value="company" <?php if($firm=="company"){?>selected<?php }?>>Company</option>
                  <option value="NGO"<?php if($firm=="NGO"){?>selected<?php }?>>NGO</option>
                  <option value="group" <?php if($firm=="group"){?>selected<?php }?>>Group</option>
                  <option value="farm" <?php if($firm=="farm"){?>selected<?php }?>>Farm</option>
                  <option value="other" <?php if($firm=="other"){?>selected<?php }?>>Other</option>
                </select>
              </div>
              <label for="inputEmail3" class="col-sm-1 control-label">Name</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="company_name" id="company_name" value="<?php  echo $row['company_name'];?>">
              </div>
              <label for="inputEmail3" class="col-sm-2 control-label">Posision/Title</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="designation" name="designation" value="<?php  echo $row['position'];?>">
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
                <input type="text" class="form-control " id="street" name="street" value="<?php  echo $row['street'];?>">
              </div>
              <label for="inputEmail3" class="col-sm-1 control-label">Taluka</label>
              <div class="col-xs-3">
                <input type="text" class="form-control " id="taluka" name="taluka" value="<?php  echo $row['taluka'];?>">
              </div>
              <label for="inputEmail3" class="col-sm-1 control-label">District</label>
              <div class="col-xs-3">
                <input type="text" class="form-control " id="district" name="district" value="<?php  echo $row['district'];?>">
              </div>
            </div>
            <!-- -------------------------------------------------------------------------------------------------->
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-1 control-label">State</label>
              <div class="col-xs-3">
                <input type="text" class="form-control " id="state" name="state" value="<?php  echo $row['state'];?>">
              </div>
              <label for="inputEmail3" class="col-sm-1 control-label">Country</label>
              <div class="col-xs-3">
                <input type="text" class="form-control " id="country" name="country" value="<?php  echo $row['country'];?>">
              </div>
              <label for="inputEmail3" class="col-sm-1 control-label">Pincode</label>
              <div class="col-xs-3">
                <input type="text" class="form-control " id="pincode" name="pincode" value="<?php  echo $row['pincode'];?>">
              </div>
            </div>
            <!-- -------------------------------------------------------------------------------------------------->
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-1 control-label">Mobile</label>
              <div class="col-xs-3">
                <input type="text" class="form-control" id="mobile" name="mobile"  value="<?php  echo $row['mobile'];?>" data-inputmask='"mask": "9999999999"' data-mask>
              </div>
              <label for="inputEmail3" class="col-sm-1 control-label">Phone</label>
              <div class="col-xs-3">
                <input type="text" class="form-control" id="phone" name="phone"  value="<?php  echo $row['phone'];?>" data-inputmask='"mask": "99999999999"' data-mask>
              </div>
              <label for="inputEmail3" class="col-sm-1 control-label">Email</label>
              <div class="col-xs-3">
                <input type="email" class="form-control " id="email" name="email" value="<?php  echo $row['email'];?>">
              </div>
            </div>
            <!-- -------------------------------------------------------------------------------------------------->
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-1 control-label">Project Location</label>
              <div class="col-sm-8">
                <input type="text" class="form-control " id="location" name="location" value="<?php  echo $row['project_location'];?>">
              </div>
            </div>
            <!-- -------------------------------------------------------------------------------------------------->
            <div class="box-header with-border" style="margin-bottom:15px;"> CERTIFICATION SERVICES REQUESTED (Please tick ‘X’ appropriate activity) </div>
            <!-- /.box-header -->
            <!-- -------------------------------------------------------------------------------------------------->
            <?php 
				 
				
				 $db=new certificate();
				 $program=$db->get_programs_module();
				 $colspan=3;
				  $i=0;
				 while($programs=mysql_fetch_array($program)){
					 
							echo "<b>$programs[1]</b>";
							echo " <div class=form-group>";
							
							$cert=$db->get_certificate_by_program($programs[0]);
							 $pro= $row['certification_id'];
							
			                $pro_detail=explode(",",$pro);
							//print_r($pro_detail);
			               
							while($certificate=mysql_fetch_array($cert)){
								if($programs[0]==4){
									$colspan=5;
									
									
									}else{
										$colspan=3;
										}
				 ?>
            <label for="inputEmail3" class="col-sm-<?php echo $colspan;?> control-label" style="padding-left:10px; ">
            
            
              <input   style="margin-right:10px;" type="checkbox" class="minimal-red" id="certificate<?php echo $certificate['id']; ?>" name="certificate" value="<?php echo $certificate['id']; ?>" 
              
             <?php if($pro_detail[$i]==$certificate['id']){?>checked="checked"<?php }?>>
              
              
              
              
              
              
              
              
              <?php echo $certificate['certification_name'];  ?></label>
            <?php //echo $i;
			 $i++;}?>
          </div>
          <?php }?>
          <!-- -------------------------------------------------------------------------------------------------->
          <div class="box-header with-border" style="margin-bottom:15px;"> INFORMATION REQUIRED FOR QUOTATION </div>
          <!-- /.box-header -->
          <!-- -------------------------------------------------------------------------------------------------->
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">No. of Farmers</label>
            <div class="col-xs-2">
              <input type="text" class="form-control " id="farmerNo" name="farmerNo" value="<?php  echo $row['no_of_farmer'];?>">
            </div>
            <label for="inputEmail3" class="col-sm-2 control-label">Land Offered (Ha.)</label>
            <div class="col-xs-2">
              <input type="text" class="form-control " id="landsize" name="landsize" value="<?php  echo $row['land_offered'];?>">
            </div>
            <label for="inputEmail3" class="col-sm-2 control-label">No. of Villages</label>
            <div class="col-xs-2">
              <input type="text" class="form-control " id="villaNo" name="villaNo" value="<?php  echo $row['no_of_village'];?>">
            </div>
          </div>
          <!-- -------------------------------------------------------------------------------------------------->
          <!-- -------------------------------------------------------------------------------------------------->
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-6 control-label">No. of Product / Crops Requested for Certification (Attach product list)</label>
            <div class="col-xs-6">
              <input type="text" class="form-control" id="proNo" name="proNo" value="<?php  echo $row['no_of_product'];?>">
            </div>
            <label for="inputEmail3" class="col-sm-6 control-label">If currently certified, provide the detail of certification program</label>
            <div class="col-xs-6">
              <input type="text" class="form-control " id="programdes" name="programdes"  value="<?php  echo $row['pre_certification_name'];?>">
            </div>
            <label for="inputEmail3" class="col-sm-3 control-label">Name of last Certification Body </label>
            <div class="col-xs-3">
              <input type="text" class="form-control " id="lastcerti" name="lastcerti" value="<?php  echo $row['last_certification_body'];?>">
            </div>
            <label for="inputEmail3" class="col-sm-4 control-label">How many employees at each operation sites / departments </label>
            <div class="col-xs-2">
              <input type="text" class="form-control " id="noemp" name="noemp" value="<?php  echo $row['no_of_emp'];?>">
            </div>
            <label for="inputEmail3" class="col-sm-6 control-label">Detail of Sub-contracted Unit (If any)</label>
            <div class="col-xs-6">
              <input type="text" class="form-control " id="sub" name="sub" value="<?php  echo $row['sub_contract_detail'];?>">
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
              <button type="reset" id="resets" class="btn btn-primary">Cancel</button>
            <button type="button" id="adds" class="btn btn-primary pull-center" onClick="update_new_enq()">Update</button>
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

<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<?php }?>
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
