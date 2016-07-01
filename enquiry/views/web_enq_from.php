<?php session_start();?>
<?php 
$page=2.4;
$tital="Enquiry Form";
include("../modal/get_programs_certificattion.php");
				 $db=new certificate();
                                 $from=$_REQUEST['from'];
?>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<?php include("../../include_files/header.php");?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php //include("enquiry_nav.php"); ?>
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
            <span class="msgs2" > </span>
          <h3 class="box-title">Contact Detail</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
       
        <form class="form-horizontal" method="post" name="enq_form" id="enq_form"  >
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
                  <option value="farmer/Individual">farmer/ Individual</option>
                  <option value="other">other</option>
                </select>
              </div>
              <label for="inputEmail3" class="col-sm-1 control-label">Name</label>
              <div class="col-sm-3">
                  <input data-validation="required" type="text" class="form-control" name="company_name" id="company_name" placeholder="Name of company/farm/NGO/group">
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
              <label for="inputEmail3" class="col-sm-1 control-label">Country</label>
              <div class="col-xs-3">
                  <?php $cou=$db->get_country(); ?>
                  <select class="form-control" id="country" name="country" onchange="get_state()">
                      <option value="none">---select---</option>
                      <?php while($row_co=  mysql_fetch_array($cou)){ ?>
                      <option value="<?php echo $row_co['id']; ?>"><?php echo $row_co['name']; ?></option>
                      <?php }?>
                  </select>
               
              </div>
            </div>
            <!-- -------------------------------------------------------------------------------------------------->
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-1 control-label">State</label>
              <div class="col-xs-3">
                  <select class="form-control" id="state" name="state" onchange="get_dist()">
                      
                  </select>
              </div>
              <label for="inputEmail3" class="col-sm-1 control-label">Dist./City</label>
              <div class="col-xs-3">
                <select class="form-control" id="district" name="district">
                      
                  </select>
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
              <div class="col-sm-6">
              <textarea id="location" class="form-control " name="location" placeholder="Full Address Of Project Location"></textarea>
               
              </div>
            
              
             
              
            </div>
            <!-- -------------------------------------------------------------------------------------------------->
            <div class="box-header with-border" style="margin-bottom:15px;"> CERTIFICATION SERVICES REQUESTED (Please tick '√' appropriate activity) </div>
            <!-- /.box-header -->
            <!-- -------------------------------------------------------------------------------------------------->
            <div class="box-group" id="accordion">
                
                    <?php
                    $i = 0;
                    $j = 0;
                    $program = $db->get_programs_module();
                    $colspan = 3;
                    $href = 0;
                    while ($programs = mysql_fetch_array($program)) {

                        $i = 1;

                        $cert = $db->get_certificate_by_program($programs[0]);
                        ?>
                
                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                        <div class="panel box box-success">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $href; ?>">
                                        <?php echo $programs[1]; ?>
                                    </a>
                                </h4>
                            </div>
                       
                            <?php if ($j == 0) { ?>
                                <div id="<?php echo $href; ?>" class="panel-collapse collapse in">
                                <?php } else { ?>
                                    <div id="<?php echo $href; ?>" class="panel-collapse collapse">
                                    <?php } $j++; ?>
                                        <div class="box-body">
                                            <table class="table table-responsive">
                                                <tr>
                                        <?php while ($certificate = mysql_fetch_array($cert)) { ?>
                               
                                                    <td> <input   style="margin-right:10px;" type="checkbox" class="programs"  id="certificate<?php echo $certificate['id']; ?>" <?php if($certificate['id']==6){ ?> onchange="show_btn()" <?php } ?> name="certificate" value="<?php echo $certificate['id']; ?>">
                                         <?php echo $certificate['certification_name']; ?>
                                                    </td>
       <?php
        if ($i%4==0) {
            echo '</tr>';
        } else {
            
        }
        $i++;
        ?>


    <?php }
    ?>
                                            </table> </div>
                                </div>
                                </div>

    <?php
    $href++;
}
?>


                                    


                        </div>

            
          <!-- -------------------------------------------------------------------------------------------------->
          <div class="box-header with-border" style="margin-bottom:15px;"> INFORMATION REQUIRED FOR QUOTATION </div>
          <!-- /.box-header -->
          <!-- -------------------------------------------------------------------------------------------------->
          <div class="form-group" >
              <div class="col-xs-12 " id="AddRemove"><a id="Adds" class="btn label-primary">Add More</a>&nbsp;&nbsp;<a id="Remove" class="btn label-primary">Remove</a></div>
          </div>
          <div class="form-group" id="GG_container">
              
              <label for="inputEmail3" class="col-sm-1 control-label">ICS Name</label>
              <div class="col-sm-3">
                <input type="text" class="form-control ics" id="ics" name="ics" placeholder="ICS NAME (optional)">
                
              </div>
            <label for="inputEmail3" class="col-sm-1 control-label">No. of Farmers</label>
            <div class="col-xs-3">
              <input type="text" class="form-control farmerNo" id="farmerNo" name="farmerNo" placeholder="No. of Farmers">
            </div>
            <label for="inputEmail3" class="col-sm-1 control-label">Land Offered (Ha.)</label>
            <div class="col-xs-3">
              <input type="text" class="form-control landsize" id="landsize" name="landsize" placeholder="Size Of Land">
            </div>
            
          </div>
          <!-- -------------------------------------------------------------------------------------------------->
          <!-- -------------------------------------------------------------------------------------------------->
          <div class="form-group">
              <label for="inputEmail3" class="col-sm-1 control-label">No. of Villages</label>
            <div class="col-xs-3">
              <input type="text" class="form-control " id="villaNo" name="villaNo" placeholder="No Of Village">
            </div>
            <label for="inputEmail3" class="col-sm-1 control-label">No. of Product</label>
            <div class="col-xs-3">
              <input type="text" class="form-control" id="proNo" name="proNo" placeholder="NO Of Product">
            </div>
          </div>
          <div class="form-group">
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
              <input type="text" class="form-control " id="noemp" name="noemp" placeholder="No Of Employee">
              <span class="comment">Only for ISO Certification</span>
            </div>
            <label for="inputEmail3" class="col-sm-3 control-label">Detail of Sub-contracted Unit (If any)</label>
            <div class="col-xs-3">
              <input type="text" class="form-control " id="sub" name="sub" placeholder="Enter name of sub contract company / unit">
            </div>
            <label for="inputEmail3" class="col-sm-3 control-label">Location of Sub-contracted</label>
            <div class="col-xs-3">
              <input type="text" class="form-control" id="locsub" name="locsub" placeholder="Enter location of sub contract unit">
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
           <span class="msgs2"> </span>
           <button type="reset" id="resets" class="btn btn-primary">Cancel</button>
           <button type="button" id="adds" class="btn btn-primary pull-center" onClick="add_new_enq()">Add</button>
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
<!-- ./wrapper -->
<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 2.1.4 -->
<script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>

<script src="../../plugins/validation_plugin/form_validation.js"></script>
<script src="../plugins/validation.js"></script>
<script src="../plugins/addRemove.js"></script>
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
         $.validate(); 

       
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
