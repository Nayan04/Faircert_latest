<?php include ('../../include_files/session_check.php'); ?>
<?php
$page = 0;
if ($_SESSION['desig_name'] == 'Reviewer') {
    $page = 7.6;
} else if ($_SESSION['desig_name'] == 'Certification Manager') {
    $page = 8.7;
} else if ($_SESSION['desig_name'] == 'CEO/Certification Committe') {
    $page = 9.4;
}
$tital = "CLIENT LIST";
?>
<?PHP
include("../modal/get_programs_certificattion.php");
$db = new certificate();
$programss = $db->get_register_clients();
$dep = $db->get_dept();
$sts = '';
$rs_sts = '';
if ($_SESSION['desig_name'] == 'admin') { // get all status for admin
    $sts = $db->get_status();
} else {
    $sts = $db->get_status_by($_SESSION['desig_name']);
}
?>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<?php include("../../include_files/header.php"); ?>
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
<?php include("enquiry_nav.php"); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> View Clients <small>List Of Clients</small> </h1>
        <h4><span id="msgs1"></span></h4>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i><?php echo $panel; ?></a></li>
            <li class="active">Client</li>
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
                    <div class="box-body">
                        <table id="example1"  class="table table-bordered table-striped xls">
                            <thead>
                                <tr >
                                    <th>SNO</th>
                                    <th  width="10%">Client Id</th>
                                    <th  width="10%">Company/Type</th>
                                    <th width="5%">Position</th>
                                    <th  width="20%"> Certifiation </th>
                                    <th width="15%">Address</th>
                                    <th  width="5%">Enquiry Date </th>
                                    <th  width="10%">Status</th>
                                    <th class="no-print"  width="15%" >Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // $data=mysql_fetch_array($programss);
                                //print_r($data);die;
                                while ($data = mysql_fetch_array($programss)) {
                                    //print_r($data);die;
                                    echo "<tr>
				  <td></td>
				     <td>$data[client_id]</td>
                    <td>$data[name] ($data[type])</td>
                    <td>$data[position]</td>";
                                    ?>
                                <td><?php echo $c_name = $db->get_certification_name_by_id($data['certi_id']) ?></td>
                                <?php
                                echo "<td> $data[street], $data[taluka],  $data[dis],  $data[stat],   $data[coun] -  $data[pin] 
					$data[num], $data[ph]</td>
					<td>";
                                echo $date = $db->get_date_with_slash($data['dates']);
                                echo "</td>"
                                ?>
                                <?php if ($data['status'] == 'pending') { ?>
                                    <td><?php echo $data['status']; ?> <span class='label  bg-green'>New</span></td>
                                <?php } else { ?>
                                    <td><?php echo $data['status']; ?></td>
    <?php } ?>
                                <td class="no-print"><a href="../../enquiry/views/view_panel.php?enq_id=<?php echo $data['enq_id']; ?>" class="btn btn-primary" title="View Enquiry In Detail">View </a> &nbsp;<a class="btn btn-danger" href="edit_enquiry.php?enq_id=<?php echo $data['enq_id']; ?>">Edit</a>
                                    </li></td>
                                </tr>
                                <?php
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

        var t = $('#example1').DataTable({
            "columnDefs": [{
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                }],
            "order": [[1, 'dasc']]
        });
        t.on('order.dt search.dt', function () {
            t.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
    });

    $(document).ready(function () {
        $(".modal").on("hidden.bs.modal", function () {
            delay(1000);
            document.location = 'welcome_enquiry.php';
            // alert();
            // $('#status').reset();
        });
    });
    $(function () {

    });

    $(function () {
        $("#excel").on('click', function () {
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
