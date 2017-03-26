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

$admin = $_SESSION['admin'];
$db = connect();
$dis = "";
$btn = "btn-default";

if(isset($_SESSION['QUE_ERROR'])){
		if($_SESSION['QUE_ERROR'] > 3){
		$dis = "";
		$btn = "btn-success";
	}
	else{
		$dis = "disabled";
	}
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

    <title>Students</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

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
                <a class="navbar-brand" href="index.php">SRS Admin</a>
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                      &nbsp <?php echo $_SESSION['priv']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="help.php"><i class="fa fa-fw fa-gear"></i> Help</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../process/logout.php">
														<i class="fa fa-fw fa-power-off"></i> Log Out</a>
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
                    <li class="active">
                        <a href="#"><i class="fa fa-fw fa-group"></i> Students</a>
                    </li>
                    <li>
                        <a href="meetings.php"><i class="fa fa-fw fa-bar-chart-o"></i> Meetings</a>
                    </li>
                    <li>
                        <a href="sanctions.php"><i class="fa fa-fw fa-table"></i> Sanctions</a>
                    </li>
										<li>
												<a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-download"></i> Downloads <i class="fa fa-fw fa-caret-down"></i></a>
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
										<li>
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
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Students
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->


                <div class="row">
									<div class="col-lg-4">
											<div class="panel panel-green">
													<div class="panel-heading">
															<h3 class="panel-title"><i class="fa fa-user"></i>&nbsp Manage Students</h3>
													</div>
													<div class="panel-body" style="overflow-x: hidden;">
															<div class="" style="margin-bottom: 10px;">
																<div class="row">
																	<div class="col-md-6" style="margin-bottom: 10px;">
																		<button type="button" data-toggle="modal" data-target="#register-student"
																		class="btn btn-success btn-block" name="button">
																		<i class="fa fa-user-plus"></i>&nbsp Register</button>
																	</div>
																</div>
																<hr>
																<!-- row end -->
 																<div class="row" style="margin-bottom: 10px;">
																	<div class="col-md-12">
																		<form class="upcsv" class="form-group" enctype="multipart/form-data"
																		action="../process/fileprocess.php"	method="POST">
																			<h4>CSV File Upload
																			<a href="" data-toggle="tooltip" data-placement="right"
																			title="Download CSV file in Help for the format">
																			<i class="fa fa-info-circle"
																			style="font-size: 15px; color: black;
																			margin-left: 10px;"></i></a></h4>
																			<input class="form-control" id="csvfile" name="csv" type="file"
																			placeholder="asdfasdf" value="Names" required>
																			<div class="text-right" style="margin-top: 10px;">
																				<img src="../img/loading.gif" alt="loading" class="gif">
																				<button class="btn btn-primary submitcsv"
																				type="submit" name="sub"> Submit File &nbsp<i class="fa fa-send">
																				</i></button>
																			</div>
																		</form>
																	</div>
																</div>
																<hr>
																<!-- row end -->
																<div class="row">
																	<div class="col-md-12">
																		<form class="form-horizontal" enctype="multipart/form-data"
																		action="../process/fileprocess.php"	method="POST"
																		<?php echo $dis; ?> style="">
																				<div class="input-group">
																					<a class="btn <?php echo $btn; ?> btn-block" href="javascript:;"
																					 data-toggle="collapse" style="border-radius: 0px;"
																					data-target="#txtupload">Txt Files Upload <i class="fa fa-caret-down fa-fw"></i></a>
																					<p class="input-group-addon"
																					style="border-radius: 0px;"	data-toggle="tooltip" data-placement="top"
																					title="This will only be activated incase of CSV file upload error!">
																					<i class="fa fa-info-circle" style="font-size: 15px; color: black;"></i></p></h4>
																				</div>

																						<div id="txtupload" class="collapse">
																							<div class="form-group" style="margin-top: 10px;">
																								<label for="names" class="col-sm-2">Sname:</label>
																								<div class="col-sm-10">
																									<input id="lnames" name="userlast" type="file"
																									class="" placeholder="Names" required <?php echo $dis; ?>>
																								</div>
																							</div>
																							<div class="form-group" style="margin-top: 10px;">
																								<label for="names" class="col-sm-2">Gname:</label>
																								<div class="col-sm-10">
																									<input id="fnames" name="userfirst" type="file"
																									class="" placeholder="Names" required <?php echo $dis; ?>>
																								</div>
																							</div>
																							<div class="form-group">
																								<label for="year" class="col-sm-2">Year:</label>
																								<div class="col-sm-10">
																									<input type="file" name="yrs" id="year"
																									placeholder="Year" required <?php echo $dis; ?>>
																								</div>
																							</div>
																							<div class="form-group">
																								<label for="cpnum" class="col-sm-2">CP:</label>
																								<div class="col-sm-10">
																									<input id="cpnum" type="file" name="cpnum" placeholder="Mobile"
																									required <?php echo $dis; ?>>
																								</div>
																							</div>
																							<div class="text-right" style="margin-bottom: 10px;">
																								<img src="../img/loading.gif" alt="loading" class="gif2">
																								<button class="btn btn-default submittxt" type="submit"
																								value="Submit File" name="submit"
																								<?php echo $dis; ?>> Submit File
																								 <i class="fa fa-send"></i> </button>
																							</div>
																						</div>
																						<!-- div collapse -->
																			</form>
																	</div>
																</div>
																<!-- row end -->

															</div>
															<!-- panel end -->
													</div>
											</div>
									</div>
									  <div class="col-lg-8">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
															<div class="row">
																<div class="col-md-6">
																	<h3 style="font-size: 1.5em;" class="panel-title">
																		<i class="fa fa-list"></i>&nbsp Students List</h3>
																</div>
																<div class="col-md-6">
																	<div class="input-group">
																			<span style="font-size: 10px;"
																			class="input-group-addon"><i class="fa fa-search"></i></span>
																			<input style="background-color: #F4F4F4; height: 25px;"
																			class="form-control" type="text" name="searchname2"
																			value="" id="searchname" placeholder="Search here by name">
																	</div>
																</div>
																<!-- end of search -->
															</div>
															<!-- End of row -->
                            </div>
														<!-- end of panel heading -->
														<div class="row">
															<div class="col-md-12">
																<table class="table block" style="margin-bottom: 0px;">
																	<thead class="text-center">
																		<tr>
																			<th width="40%" class="indent">Name</th>
																			<th width="15%" class="text-center">Year</th>
																			<th width="20%" class="text-center">Mobile No.</th>
																			<th width="20%" class="text-center">Edit | Delete</th>
																		</tr>
																	</thead>
																</table>
															</div>
														</div>
														<!-- end of row table header -->
                            <div class="panel-body" style="padding-top: 0px;">
															<div class="row"style="overflow: auto;">
																<div  id="students-table" class="flot-chart"																>
																	<table class="table table-hover table-striped">
																		<tbody>
																			<?php foreach(getstudents() as $g): ?>
																			<tr>
																				<td class="indent"><?php echo  $g->surname.', '.$g->firstname; ?></td>
																				<td><?php echo  $g->year; ?></td>
																				<td class="text-center"><?php echo  $g->cpnum; ?></td>
																				<td class="text-center"><a data-toggle="modal"
																					data-id="<?php echo $g->s_id;?>" title="Add this item"
																					class="editStudents btn btn-primary" href="#edit-students" data-target="#edit-students">
																				<i class="fa fa-edit"></i></a>
																				<a class="deleteStudent btn btn-danger" data-id="<?php echo $g->s_id?>">
																				<i class="fa fa-trash"></i></a></td>
																			</tr>
																		<?php endforeach; ?>
																		</tbody>
																	</table>
																</div>
															</div> <!-- end of row -->
																<div class="col-md-12" style="margin-top: 10px;">
																	<a type="button" href="../process/deletestudent.php?action=deleteall"
																	onclick="return confirm('Sanction Records Will be deleted too!')"
																	class="btn btn-danger" name="button" data-toggle="tooltip"
																	title="Proceed with caution!">
																	<i class="fa fa-warning"></i> &nbsp Delete All</a>
																	<a href="" data-toggle="tooltip" data-placement="right"
																	title="Warning! This will delete everything in the list">
																	<i class="fa fa-exclamation-circle"
																	style="font-size: 1.5em; color: #BB1A1A; margin-left: 10px;"></i></a>
																</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

								<div class="modal fade" id="edit-students" role="dialog">
									<div class="modal-dialog modal-md">
										<div class="modal-content form-group">
											<form class="" action="../process/updatestudent.php" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h3 class="modal-title font2">Record</h3>
											</div>
											<div class="modal-body" id="students_details">
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default"
												data-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-primary" name="update">Save Changes</button>
											</div>
											</form>
										</div>
									</div>
								</div>
								<!-- end of modal -->

								<div class="modal fade" id="register-student" role="dialog">
									<div class="modal-dialog modal-sm">
										<div class="modal-content form-group">
											<form class="form-group" action="../process/registerprocess.php" method="post">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h3 class="modal-title font2"><i class="fa fa-user-plus"></i>&nbsp Register Student</h3>
												</div>
												<div class="modal-body">
													<input class="form-control" type="text" name="fname"
													placeholder="firstname" style="margin-bottom: 10px;" required>
														<input class="form-control" type="text" name="lname"
														placeholder="lastname" style="margin-bottom: 10px;" required>
														<input class="form-control" type="text" name="cpnum"
														placeholder="cp number | ex: 63907..." style="margin-bottom: 10px;"
														required>
													<div class="row">
														<div class="col-sm-3 text-center">
															<h5>Year : </h5>
														</div>
														<div class="col-sm-9">
															<select class="form-control" id="yr"
															 name="yr" required>
																<option></option>
																<option>1st</option>
																<option>2nd</option>
																<option>3rd</option>
																<option>4th</option>
															</select>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default"
													data-dismiss="modal">Cancel</button>
													<button type="submit" class="btn btn-primary" name="submitstudent">Submit Form</button>
												</div>
											</form>
										</div>
									</div>
								</div>
								<!-- end of modal -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
		<!-- modal for notifications -->
		<div class="modal fade" role="dialog" id="errormodal">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="text-center" style="padding: 10px 20px;">
							<h4 id="text"></h4>
					</div>
				</div>
			</div>
		</div>
    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

		<!-- Custom JS -->
		<script src="../js/master.js"></script>

		<script type="text/javascript">
		//i dont know why this code wont run on master.js (external source)
		// take this problem up later PROBLEM
		$(function(){
				$('#searchname').keyup(function(event){

						var keyCode = event.which; // check which key was pressed
						var name = $(this).val(); // get the complete input
						console.log(name);
						var nothing = 'nothingLOL';
						if(name != '')
							{
									 $.ajax({
												url:"editstudents.php",
												method:"POST",
												data:{searchname:name},
												success:function(data){
														 $('#students-table').html(data);
														 console.log('success!');
												}
									 });
							}
						else{
							$.ajax({
									 url:"editstudents.php",
									 method:"POST",
									 data:{show:nothing},
									 success:function(data){
												$('#students-table').html(data);
												console.log('success!');
									 }
							});
						}
				});
		});

		$(document).on("click", ".submitcsv", function () {
		   var id = $('#csvfile').val();
		     if(id != '')
		       {
						 $('.gif').show();
		       }
		});

		$(document).on("click", ".submittxt", function () {
		   var id = $('#cpnum').val();
		     if(id != '')
		       {
						 $('.gif2').show();
		       }
		});
		</script>

		<!-- Activate bootstrap tooltip -->
		<script type="text/javascript">
			$(document).ready(function(){
					$('[data-toggle="tooltip"]').tooltip();
			});

			var error = '<?php if(isset($_GET['error'])){echo $_GET['error'];}else{ echo '';} ?>';
			var success = '<?php if(isset($_GET['success'])){echo $_GET['success'];}else{echo '';} ?>';
			var texterror = '<?php if(isset($_SESSION['error'])){echo $_SESSION['error'];}else{ echo '';} ?>';
			console.log(error);
			if(error != '' || success != ''){
				console.log('inside here');
				switch (success) {
					case '1':
					  $('#text').text("Updated Successfully!");
					  $('#errormodal').modal('show');
						break;
					case '2':
					  $('#text').text("Registered Successfully!");
					  $('#errormodal').modal('show');
						break;
				}
				switch (error) {
				 case '1':
					 $('#text').text("Delete meetings first!");
					 $('#errormodal').modal('show');
					 break;
				 case '2':
					 $('#text').text("Name already exist!");
					 $('#errormodal').modal('show');
					 break;
				 case '3':
					 $('#text').text("DB error!");
					 $('#errormodal').modal('show');
					 break;
				 case '5':
					 $('#text').text("Register a student first!");
					 $('#errormodal').modal('show');
					 break;
				}
			}

		</script>
</body>
</html>

<style>
	.gif{
		display: none;
		height: 10%;
		width: 10%;
	}
	.gif2{
		display: none;
		height: 10%;
		width: 10%;
	}
</style>
