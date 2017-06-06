<?php
session_start();
include "../process/functions.php";
if(!isset($_SESSION['admin'])){
	header('Location: ../index.php?error=2');
}

$super = "";
if($_SESSION['priv'] == "DEAN"){
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
		<link href="https://fonts.googleapis.com/css?family=Play|Squada+One" rel="stylesheet">
        <link rel="icon" type="image/png" href="../img/favicon.png">
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
                <!-- <li class="dropdown">
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
                </li> -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-user">
                    </i> &nbsp <?php echo $_SESSION['priv']; ?> <b class="caret"></b></a>
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
                                <div class="col-lg-12" style="padding-left: 50px;">
                                  <h2>System Overview</h2>
																	<p>The Sanction Record System is a web application that processes, records and presents the sanctions of students in ICT department every end of semester. It does not have a student log-in, only a presentation of data in the homepage of the system. The functions and features can be accessed only by administrators through a login form, the administrator rights will be given to whomever the dean approves and it operates on any browser application.  </p>
																	<h3>System Summary</h3>
																	<p>System Summary section provides a general overview of the system. The summary outlines the uses of the system’s hardware and software requirements, system’s configuration, user access levels and system’s behaviour in case of any contingencies.</p>
																		<div class="row" style="padding-left: 100px;">
																			<h4>System Configuration</h4>
																			<p>The system operates on any browser application. It is compatible with Microsoft Edge, Mozilla Firefox, Google Chrome and etc. Although the application required internet connection, there is no need for any installation only deployment and can be used immediately without any further configuration.</p>
																			<h4>User access level</h4>
																			<p>The system provides default administrators together with respective passwords and access levels. The Dean will be given the super-user privilege which can manage the admin accounts. The administrators have full access to systems basic features with their respective access levels.</p>
																			<h4>Contingencies</h4>
																			<p>In case of power outage, the system will not be directly affected, unsaved data will be lost but the data already stored in the database is kept safe. In case there is no Internet connection available data cannot be saved in internal memory of the operating device.</p>
																		</div>
																</div>
                              </div>
                        </li>
												<li>
													<a href="javascript:;" data-toggle="collapse" data-target="#Downloads">
														<i class="fa fa-dashboard"></i>&nbsp Admin Page
														<i class="fa fa-fw fa-caret-down"></i>
													</a>
															<div class="row collapse" id="Downloads">
																<div class="col-lg-12" style="padding-left: 50px;">
																	<h3>Admin Dropdown</h3>
																	<p>The admin button dropdown has 2 elements, help and logout. The help button is not yet functional. The Logout button log outs the current admin; It destroys the active session which disables all pages in the system as it requires an active admin session and returns to homepage.</p>
																	<p>The bell icon beside the admin will be for another update. In the meantime, the administrators can ignore it.</p>
																	<h3>Downloads</h3>
																	<div class="row" style="padding-left: 70px;">
																		<p><strong>SQL File</strong> - This is a copy of the MYSQL database for phpmyadmin advance users.</p>
																		<p><strong>CSV Format</strong> - This is a sample format for CSV (Comma Separated Value) student bulk registration. Can be opened in Excel.</p>
																		<p><strong>Txt Format</strong> - This is a sample format for Txt student bulk registration. This button contains 1 .rar file with 3 .txt files.</p>
																		<p><strong>Sanction Record</strong> - This is an excel file of all the sanction records in the system.</p>
																	</div>
																</div>
															</div>
												</li>
                        <li>
                          <a href="javascript:;" data-toggle="collapse" data-target="#dashboard">
                            <i class="fa fa-dashboard"></i>&nbsp Dashboard
                            <i class="fa fa-fw fa-caret-down"></i>
                          </a>
                              <div class="row collapse" id="dashboard">
                                <div class="col-lg-12" style="padding-left: 50px;">
                                  <h3>Dashboard</h3>
																	<p>The Dashboard section has 3 divisions, 2 of which are collapsible panels, the “Change Password” panel and “Login Records” panel. </p>
																	<div class="row" style="padding-left: 70px;">
																		<h4>Change Password</h4>
																		<p>This panel has 3 input fields, the old password, new password and confirm password, its’ validation is powered by Javascript and Ajax which makes error handling efficient. When an an error has occurred when an input field is focused-out, the ajax fires an element through Jquery and creates a red text error notification and the “save password” button will be disabled.</p>
																		<h4>Login Records</h4>
																		<p>This panel is a one-way reporting of Logs made into the system by administrators. Reporting the Admin name, the date time and day of when the logged-in was made.</p>
																		<p>The panel is limited to 10 recent login records, however a button (View all activity) bellow will activate a modal with a hundred recent login records.</p>
																		<p>The 2 buttons on the lower-left corner are download and print, which basically speaks for itself, however, it is important to note that upon downloading, there might be some few errors when opening the csv file in EXCEL, becuase of SYLK format, anyhow, the user is encourage to just click ok until the record is shown in EXCEL. Also, if the date will be presented like "######", there should be no cause for worry, once the column is wide enough, the data will be shown.</p>
																		<h4>Manage Bulletin</h4>
																		<p>This panel is a multipart/form-data form which can post images and announcements on the homepage bulletin section. Once submitted, the input boxes inside the bulletin panel will be disabled allowing only one post at a time and the delete button inside the panel will be activated. When clicked, the post will be deleted and the input boxes will be reactivated. </p>
																	</div>
                                </div>
                              </div>
                        </li>
                        <li>
                          <a href="javascript:;" data-toggle="collapse" data-target="#students">
                            <i class="fa fa-group"></i>&nbsp Students
                            <i class="fa fa-fw fa-caret-down"></i>
                          </a>
                              <div class="row collapse" id="students">
                                <div class="col-lg-12" style="padding-left: 50px;">
                                  <h3>Students</h3>
																	<p>This section has 2 panels, “Manage Students” and “Students List”. The 1st panel is for student registration.</p>
																	<div class="row" style="padding-left: 70px;">
																		<h4>Student Registration</h4>
																		<p>This panel contains 3 functions, the "Register" button, "CSV uploads", and "Text uploads".</p>
																		<div class="row" style="padding-left: 90px;">
																			<p><strong>Register</strong></p>
																			<p>This button activates a modal with 4 input fields. All these inputs are required. Once submitted, the data will be stored in the Student List table.</p>
																			<p><strong>CSV file upload</strong></p>
																			<p>The CSV file will be processed through the LOAD DATA LOCAL INFILE mysql query through PDO PHP and into the database. The format is downloadable in the downloads section. It is important that the format must be strictly followed. And all other files except CSV are prohibited.</p>
																			<p><strong>Txt file uploads</strong></p>
																			<p>The Text upload collapsible section will only be activated when the CSV format returns error 3-4 times. Once it activates, the button turns green and will show 3 txt file input fields, of which format can also be downloaded in the downloads section. The txt files are processed simultaneously into the database and the txt files must have the same number of lines or it will return an error.</p>
																		</div>
																		<h4>Student List</h4>
																		<p>The Student List panel is basically a table of students registered in the system. It has search feature in the upper right corner of the table which can be used when searching a student through names and it automatically delivers the output upon key-press, a table inside the panel body with Edit and Delete options, and a “Delete All” button at the bottom of the table.</p>
																		<p>The Edit button will trigger a modal with the specifics of the particular student which then can be updated once changes are made.</p>
																	</div>
																</div>
                              </div>
                        </li>
                        <li>
                          <a href="javascript:;" data-toggle="collapse" data-target="#meetings">
                            <i class="fa fa-bar-chart-o"></i>&nbsp Meetings
                            <i class="fa fa-fw fa-caret-down"></i>
                          </a>
                              <div class="row collapse" id="meetings">
                                <div class="col-lg-12" style="padding-left: 50px;">
                                  <h3>Meetings</h3>
																	<p>The Meetings section of the navigation bar can only be accessed by the President and Dean. With 2 panels namely, “Manage Meeting”, and “Meetings List”.</p>
																	<div class="row" style="padding-left: 70px;">
																		<h4>Manage Meetings</h4>
																		<p>The former panel is a simple event registration with 2 input fields, Event description and Date of the event. Once submitted, it will be added automatically to the next panel. </p>
																		<h4>Meetings List</h4>
																		<p>Meetings List, with Edit and delete options and a Delete All button just like the the previous table for students without the search function. Since list are only limited up to 8 events. </p>
																	</div>
                                </div>
                              </div>
                        </li>
                        <li>
                          <a href="javascript:;" data-toggle="collapse" data-target="#sanction">
                            <i class="fa fa-dashboard"></i>&nbsp Sanction
                            <i class="fa fa-fw fa-caret-down"></i>
                          </a>
                              <div class="row collapse" id="sanction">
                                <div class="col-lg-12" style="padding-left: 50px;">
                                  <h3>Sanctions</h3>
																	<p>The Sanction is the core of the system. It has 4 divisions; “Add Student-Sanction”, “Edit by Year” and “Sanction List”. Note: This section cannot be accessed if there are no students and meeting data and only by the treasurer. Depending on which the admin is lacking, the page will be automatically redirected. </p>
																	<div class="row" style="padding-left: 70px;">
																		<h4>Add Student-Sanction</h4>
																		<p>This panel is for registering students into the sanction table. It is important to note that the Select dropdown field are names from the student table which are not yet registered into the sanction table. And since using CSV format and text format bulk registration automatically registers the students name into the sanction list, this panel would seem of little use. However, when there are students that has been left that has not been registered into the system yet, this panel would prove itself useful.</p>
																		<h4>Edit by year</h4>
																		<p>This panel will be for multiple editing, which is ordered by year level; when clicked, it activates a modal containing all the students in a year level. Since it would take forever to update the sanction individually through the option column in the Sanction List, thus this section is developed.</p>
																		<h4>Sanction List</h4>
																		<p>The Sanction List is a panel that contains functions on managing Sanction Record. The 2 buttons on the panel-header are “download” and “print”, the former converts the Sanction List table and reads it into an excel file and downloads it automatically, while the latter extracts the record and creates another window ready for printing. The search input is the same with the other search inputs in the system and the table with the list and options are basically the same. There is no Delete All button because once the students are deleted, so is the record in this table.</p>
																	</div>
                                </div>
                              </div>
                        </li>
                        <li>
                          <a href="javascript:;" data-toggle="collapse" data-target="#super">
                            <i class="fa fa-user-secret"></i>&nbsp Superuser
                            <i class="fa fa-fw fa-caret-down"></i>
                          </a>
                              <div class="row collapse" id="super">
                                <div class="col-lg-12" style="padding-left: 50px;">
                                  <h3>Superuser</h3>
																	<p>The Superuser tab is a hidden section. The administrators with the admin privilege will not be able to access this tab let alone see it. The user “Dean” will only have access to this section</p>
																	<p>There are 3 panels in this section, First is Register Admin, second is the Admins List and lastly the System Refresh panel.</p>
																	<div class="row" style="padding-left: 70px;">
																		<h4>Manage Admin & Admins List</h4>
																		<p>The registration and table is the same as with the other section as well as the edit button.</p>
																		<h4>System Refresh</h4>
																		<p>The system refresh are “delete everything” buttons. With a note: No recovery option. And when the enable button is clicked, the 2 buttons will be activated, the first one is to delete the login records and the second is to delete all the system records, the meetings and student records.</p>
																	</div>
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
