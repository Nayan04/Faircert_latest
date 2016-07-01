<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Document </title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../font_awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="../ionicons-master/ionicons-master/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue fixed" data-spy="scroll" data-target="#scrollspy">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <!-- Logo -->
                <a href="../index2.html" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>F</b>IS</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Faircert</b>Doc</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li><a href="#" onclick="history.go(-1)">Back</a></li>

                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <div class="sidebar" id="scrollspy">

                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="nav sidebar-menu">
                        <li class="header">TABLE OF CONTENTS</li>
                        <li class="active"><a href="#introduction"><i class="fa fa-circle-o"></i> Introduction</a></li>
                        <li><a href="#Enquiry_form"><i class="fa fa-circle-o"></i> Enquiry Form</a></li>
                        <li><a href="#view_enq_list"><i class="fa fa-circle-o"></i> View Enquiry </a></li>
                        <li><a href="#inbox"><i class="fa fa-circle-o"></i> Inbox</a></li>
                        <li><a href="#outbox"><i class="fa fa-circle-o"></i> OutBOx</a></li>
                        <li><a href="#view_panel"><i class="fa fa-circle-o"></i> View Panel</a></li>
                        <li class="treeview" id="scrollspy-components">
                            <a href="javascript::;"><i class="fa fa-circle-o"></i>Enquiry Options</a>
                            <ul class="nav treeview-menu">
                                <li><a href="#update_status">Update Status</a></li>
                                <li><a href="#forward">Forward TO Other</a></li>
                                <li><a href="#register_client">Register New Client</a></li>
                                <li><a href="#View_panel_history">View History</a></li>
                                <li><a href="#edit_enq">Edit Enquiry</a></li>
                                
                            </ul>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <h1>
                        Faircert Document
                        <small>Current version 1.1.0</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Documentation</li>
                    </ol>
                </div>

                <!-- Main content -->
                <div class="content body">

                    <section id="introduction">
                        <h2 class="page-header"><a href="#introduction">Introduction</a></h2>
                        <p class="lead">
                            <b>FICS</b> 'FairCert Internal Communication System'  is a open source control panels.
                            It is a responsive HTML template that is based on the CSS framework Bootstrap 3.
                            It utilizes all of the Bootstrap components in its design and re-styles many
                            commonly used plugins to create a consistent design that can be used as a user
                            interface for backend applications.<P></p>
                        FICS is based on a modular design, which
                        allows it to be easily customized and built upon. This documentation will guide you through
                        exploring the various components that are bundled with the Software.
                        </p>
                    </section><!-- /#introduction -->


                    <!-- ============================================================= -->

                    <section id="Enquiry_form">
                        <h2 class="page-header"><a href="#Enquiry_form">Enquiry Form</a></h2>
                        <p class="lead">
                           By using  this option BDE can Add new Enquiry for Further Procedure.
                        </p>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Ready</h3>
                                        <span class="label label-primary pull-right"><i class="fa fa-html5"></i></span>
                                    </div><!-- /.box-header -->
                                    <div class="box-body">
                                        <p>After Successfully login in BDE can view Operation list on the Left side of the panel</p>
                                        <img src="../dist/img/screens/enquiry_menus.png" />
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <div class="box box-danger">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Source Code</h3>
                                        <span class="label label-danger pull-right"><i class="fa fa-database"></i></span>
                                    </div><!-- /.box-header -->
                                    <div class="box-body">
                                        <p>Enquiry Form</b></p>
                                        <img src="../dist/img/screens/half_enq.png" width="500" height="600" />
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->

                    </section>


                    <!-- ============================================================= -->

                    <section id="view_enq_list">
                        <h2 class="page-header"><a href="#view_enq_list">Enquiry List</a></h2>
                        <p class="lead">By using this Option User can view list of New enquiries And Working Enquiry By BDE.
                            There are multiple options for each enquiry in <b>action</b> column
                            </p>
                        <ul class="bring-up">
                            
                            <li><a href="#update_status">Update Status</a>: User can update the working status like : Working, Pending, Hold.etc</li>
                            <li><a href="#forward">Forward enquiry</a>: User can forward enquiry to next level after completing there task</li>
                            <li><a href="#edit_enq">Edit Enquiry</a>: For update enquiry info.</li>
                            <li><a href="#view_panel">View Enquiry</a>: View details of enquiry with history</li>
                        </ul>
                        <pre class="prettyprint"><code class="javascript"><img src="../dist/img/screens/Enquiry View.png" width="100%" />
 </code></pre>
                    </section>

                    <!-- ============================================================= -->

                    <section id="inbox">
                        <h2 class="page-header"><a href="#inbox">INBOX</a></h2>
                        
                        <p class="lead">By using this Option x user can view list of (Enquiry & Client) Assign by y,z User.
                            There are multiple options for each records.
                            </p>
                        <ul class="bring-up">
                            <li><a href="#register_client">Register As Client</a>: By using this option BDE can convert enquiry to client</li>
                            <li><a href="#update_status">Update Status</a>: User can update the working status like : Working, Pending, Hold.etc</li>
                            <li><a href="#forward">Forward enquiry</a>: User can forward enquiry to next level after completing there task</li>
                            <li><a href="#edit_enq">Edit Enquiry</a>: For update enquiry info.</li>
                            <li><a href="#view_panel">View Enquiry</a>: View details of enquiry with history</li>
                        
                        </ul>
                            <pre class="prettyprint"><code class="javascript"><img src="../dist/img/screens/INBOX.png" width="100%" />
 </code></pre>
                    </section>


                    <!-- ============================================================= -->

                    <section id="outbox">
                        <h2 class="page-header"><a href="#outbox">OutBOX</a></h2>
                        
                        <p class="lead">By using this Option x user can view list of (Enquiry & Client) Assign to y,z User.
                            
                            </p>
                        <ul class="bring-up">
                            
                            <li><a href="#view_panel">View Details</a></li>
                        </ul>
                            <pre class="prettyprint"><code class="javascript"><img src="../dist/img/screens/OutBOX.png" width="100%" />
 </code></pre>
                    </section>


                    <!-- ============================================================= -->

                    <section id="view_panel">
                        <h2 class="page-header"><a href="#view_panel">View Panel</a></h2>
                        
                        <p class="lead">
                            By using this option user can view details of enquiry and Client and print it.
                            
                            </p>
                        <ul class="bring-up">                            
                            <img src="../dist/img/screens/row_enquiry.png" width="100%" />
                        </ul>
                            <pre class="prettyprint"><code class="javascript"><img src="../dist/img/screens/viewpanel.png" width="100%" />
 </code></pre>
                     </section>


                    <!-- ============================================================= -->

                    <section id="components" data-spy="scroll" data-target="#scrollspy-components">
                        
                        <h3 id="update_status">Change Status</h3>
                        <p class="lead">In the welcome Enquiry & Inbox, Each Enquiry row contains View, Action button in <b>Action</b> Column. 
                            In action button, there is a option name <b>Change section</b> after click on this </p>
                        <div class="box box-solid">
                            <div class="box-body" style="position: relative;">
                                <span class="eg">Change Status</span>
                                <header class="main-header" style="position: relative;">
                                    <img src="../dist/img/screens/update header1.png" width="100%" height="80" />
                                    <!-- Logo -->
                                    
                                    <!-- Header Navbar: style can be found in header.less -->
                                    
                                </header>
                            </div>
                        </div>
                        <pre class="prettyprint"><code class="javascript"><img src="../dist/img/screens/update_status.png" width="100%" />
 </code></pre>
                   
                        

                        <!-- ===================================================================== -->
                                                         
                        <h3 id="forward">Forward To Other</h3>
                        <p class="lead">In the welcome Enquiry & Inbox of each panel, inquiry row contains View, Action button in <b>Action</b> Column. 
                            In action button, there is a option name <b>Forward To Other</b> after click on this </p>
                        <div class="box box-solid">
                            <div class="box-body" style="position: relative;">
                                <span class="eg">Forward To Other</span>
                                <header class="main-header" style="position: relative;">
                                    <img src="../dist/img/screens/fwd_head.png" width="100%" height="80" />
                                    <!-- Logo -->
                                    
                                    <!-- Header Navbar: style can be found in header.less -->
                                    
                                </header>
                            </div>
                        </div>
                        <pre class="prettyprint"><code class="javascript"><img src="../dist/img/screens/fwd.png" width="100%" />
 </code></pre>
                        <!-- ===================================================================== -->
                    

                        <h3 id="register_client">Register Client</h3>
                         <p class="lead">In the  Inbox of BDE, CEO/Certification Committe, CM, inquiry row contains View, Action button in <b>Action</b> Column. 
                            In action button, there is a option name <b>Register Client</b> after click on this </p>
                        <div class="box box-solid">
                            <div class="box-body" style="position: relative;">
                                <span class="eg">Register Client</span>
                                <header class="main-header" style="position: relative;">
                                    <img src="../dist/img/screens/register_head.png" width="100%" height="80" />
                                    <!-- Logo -->
                                    
                                    <!-- Header Navbar: style can be found in header.less -->
                                    
                                </header>
                            </div>
                        </div>
                         <pre class="prettyprint"><code class="javascript"><img src="../dist/img/screens/register_client.png" width="100%" />
 </code></pre>
                        <!-- ===================================================================== -->
                        

                        <h3 id="View_panel_history">History Details</h3>
                         <p class="lead">In the View Section X,Y,Z user can view the history 
                             after clicking of history tab in view panel, you can track history of enquiry</p>
                            
                        
                         <pre class="prettyprint">
                   <code class="javascript">
                              <img src="../dist/img/screens/history.png" width="100%" />
 </code></pre>
                        <!-- ===================================================================== -->
                        

                        <h3 id="edit_enq">Edit Enquiry</h3>
                       
                        
                        <p class="lead">In the welcome Enquiry & Inbox of each panel, inquiry row contains View, Action button in <b>Action</b> Column. 
                            In action button, there is a option name <b>Edit Enquiry</b> after click on this </p>
                        <div class="box box-solid">
                            <div class="box-body" style="position: relative;">
                                <span class="eg">Edit Enquiry</span>
                                <header class="main-header" style="position: relative;">
                                    <img src="../dist/img/screens/edit_head.png" width="100%" height="80" />
                                    <!-- Logo -->
                                    
                                    <!-- Header Navbar: style can be found in header.less -->
                                    
                                </header>
                            </div>
                        </div>
                        <pre class="prettyprint"><code class="javascript"><img src="../dist/img/screens/Edit Enquiry Form.png" width="100%" />
 </code></pre>
                        <!-- ===================================================================== -->
                        
                    </section>


                    <!-- ============================================================= -->

                   


                    <!-- ============================================================= -->

                    


                    <!-- ============================================================= -->

                   


                    <!-- ============================================================= -->

                    


                    <!-- ============================================================= -->

                  


                    <!-- ============================================================= -->

                    


                </div><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <?php include '../footer_outer.php'; ?>

            <!-- Control Sidebar -->
         <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>

        </div><!-- ./wrapper -->

        <!-- jQuery 2.1.4 -->
        <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="../plugins/fastclick/fastclick.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../dist/js/app.min.js"></script>
        <!-- SlimScroll 1.3.0 -->
        <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
        <script src="docs.js"></script>
    </body>
</html>
