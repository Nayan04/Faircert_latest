<?php include '../../include_files/session_check.php'; ?>
<?php
include("../../enquiry/modal/database.php");
$obj = new database();
$page = $_REQUEST['page_id'];
?>
<!DOCTYPE html>
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
        <!-- Theme style -->
        <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="../../dist/css/skins/skin-blue.min.css">
        <script>
            
            function change_password() {
                var uid = $("#uid").val();
                var pwd = $("#pwd").val();
                var np = $("#np").val();



                if (uid == "") {
                    alert("User Id is Required");
                    document.getElementById("#uid").focus();
                }
                else if (pwd == "") {
                    alert("Old Password is Required");
                    document.getElementById("#pwd").focus();
                }
                else if (np == "") {
                    alert("New Password is Required");
                    document.getElementById("#np").focus();
                }
                else {

                    var dataString = "uid=" + uid + "&pwd=" + pwd + "&np=" + np;

                    $.post("../controller/password_controller.php", dataString).done(function (data) {
                        //  document.location=history.go(-1);	
                        //  																																																																																																																																																																						                                                                
                        if (data == 1) {
                            alert("Password Change Successfuly")
                            document.location = '../../login/view/logout.php';
                        }
                        if (data == 2) {
                            alert('Old Password Not Correct')
                        }


                        

                    });

                }
            }

        </script>
    </head>
    <body class="hold-transition  skin-blue sidebar-mini">
        <div class="wrapper">
            <!-- Main Header -->
            <header class="main-header">
                <!-- Logo -->
                <a href="../../index.php" class="logo">
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

                <section class="sidebar">

                    <ul class="sidebar-menu">
                        <li><a href="#" onclick="history.go(-1)">  Home </a></li>

                    </ul>

                </section>

            </aside>

            <div class="content-wrapper">
                <section class="content-header">
                    <h1> Change Password<small>..</small> </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Setting</a></li>
                        <li class="active">Change Password</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div >
                        <div class="box box-primary" style=" width:45%; float:left;margin-right:25px;">
                            <form role="form" >
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="cer_pro_name">User Id</label>
                                        <input type="text" class="form-control" id="uid" name="uid" placeholder="User Id" value="<?php echo $_SESSION['user_id']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Old Password</label>
                                        <input type="text" class="form-control" id="pwd" name="pwd" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="contact">New Password</label>
                                        <input type="text" class="form-control" id="np" name="np" placeholder="New Password">
                                    </div>
                                    <div class="box-footer" >
                                        <button type="button" class="btn btn-primary"  onClick="change_password();"> Submit </button>
                                    </div>

                                </div>
                        </div>
                        </form>
                    </div>
            </div>
        </section>


        <?php include("../../footer_outer.php"); ?>


        <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <script src="../../bootstrap/js/bootstrap.min.js"></script>
        <script src="../../dist/js/app.min.js"></script>

</body>
</html>
