<?php
session_start();
include "../process/functions.php";
if(!isset($_SESSION['admin'])){
	header('Location: ../index.php?error=2');
}

$super = "";
if($_SESSION['admin'] == "dean"){
	$super = '<li id="superuser">
							<a href="superuser.php"><i class="fa fa-fw fa-user-secret"></i> Superuser</a>
						</li>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Help</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../icons/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">SRS Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-user">
                    </i> &nbsp Admin <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Help</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../process/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
										<?php echo $super; ?>
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="students.php"><i class="fa fa-fw fa-group"></i> Students</a>
                    </li>
                    <li>
                        <a href="meetings.php"><i class="fa fa-fw fa-bar-chart-o"></i> Meetings</a>
                    </li>
                    <li>
                        <a href="sanctions.php"><i class="fa fa-fw fa-table"></i> Sanctions</a>
                    </li>
										<li>
												<a href="javascript:;" data-toggle="collapse" data-target="#demo">
													<i class="fa fa-fw fa-download"></i> Downloads
													<i class="fa fa-fw fa-caret-down"></i></a>
												<ul id="demo" class="collapse">
														<li>
																<a href="../process/filedownload.php?file=1">
																	<i class="fa fa-database"></i> &nbsp Sql File</a>
														</li>
														<li>
																<a href="../process/filedownload.php?file=2">
																	<i class="fa fa-file-excel-o"></i> &nbsp CSV format</a>
														</li>
														<li>
																<a href="../process/filedownload.php?file=3">
																	<i class="fa fa-file-text-o"></i> &nbsp Txt format</a>
														</li>
														<li>
																<a href="../process/filedownload.php?file=4">
																	<i class="fa fa-list-alt"></i> &nbsp Sanction Record</a>
														</li>
												</ul>
										</li>
										<li class="active">
												<a href="help.php"><i class="fa fa-fw fa-file-text"></i> User's Manual </a>
										</li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid" style="height: 600px !important; overflow: auto;">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Users Manual <small>Help</small>
                        </h1>
                        <ol class="breadcrumb">
                          <li>
                              <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                          </li>
                          <li class="active">
                              <i class="fa fa-edit"></i> Users Manual
                          </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <!-- <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Like SB Admin?</strong> Try out <a href="http://startbootstrap.com/template-overviews/sb-admin-2" class="alert-link">SB Admin 2</a> for additional features!
                        </div>
                    </div>
                </div> -->
                <!-- /.row -->

								<div class="container-fluid">
                  <div class="row">
                    <div class="col-lg-12">
                      <ul class="nav">
                        <li>
                          <a href="javascript:;" data-toggle="collapse" data-target="#adminpage">
                            <i class="fa fa-rocket"></i>&nbsp Overview
                            <i class="fa fa-fw fa-caret-down"></i>
                          </a>
                              <div class="row collapse" id="adminpage">
                                <div class="col-lg-12">
                                  <h1>Overview</h1>
                                </div>
                              </div>
                        </li>
                        <li>
                          <a href="javascript:;" data-toggle="collapse" data-target="#dashboard">
                            <i class="fa fa-dashboard"></i>&nbsp Dashboard
                            <i class="fa fa-fw fa-caret-down"></i>
                          </a>
                              <div class="row collapse" id="dashboard">
                                <div class="col-lg-12">
                                  <h1>Dashboard</h1>
                                </div>
                              </div>
                        </li>
                        <li>
                          <a href="javascript:;" data-toggle="collapse" data-target="#students">
                            <i class="fa fa-group"></i>&nbsp Students
                            <i class="fa fa-fw fa-caret-down"></i>
                          </a>
                              <div class="row collapse" id="students">
                                <div class="col-lg-12">
                                  <h1>Students</h1>
                                </div>
                              </div>
                        </li>
                        <li>
                          <a href="javascript:;" data-toggle="collapse" data-target="#meetings">
                            <i class="fa fa-bar-chart-o"></i>&nbsp Meetings
                            <i class="fa fa-fw fa-caret-down"></i>
                          </a>
                              <div class="row collapse" id="meetings">
                                <div class="col-lg-12">
                                  <h1>Meetings</h1>
                                </div>
                              </div>
                        </li>
                        <li>
                          <a href="javascript:;" data-toggle="collapse" data-target="#sanction">
                            <i class="fa fa-dashboard"></i>&nbsp Sanction
                            <i class="fa fa-fw fa-caret-down"></i>
                          </a>
                              <div class="row collapse" id="sanction">
                                <div class="col-lg-12">
                                  <h1>Sanction</h1>
                                </div>
                              </div>
                        </li>
                        <li>
                          <a href="javascript:;" data-toggle="collapse" data-target="#super">
                            <i class="fa fa-user-secret"></i>&nbsp Superuser
                            <i class="fa fa-fw fa-caret-down"></i>
                          </a>
                              <div class="row collapse" id="super">
                                <div class="col-lg-12">
                                  <h1>Super</h1>
                                </div>
                              </div>
                        </li>
                        <li>
                        <div class="">
                        	<hr>
                        </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- Custom JS -->
    <script src="../js/myownvalidation.js"></script>

</body>
</html>
