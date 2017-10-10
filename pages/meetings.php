<?php
session_start();
include "../process/functions.php";
if(!isset($_SESSION['admin'])){
	header('Location: ../index.php?error=2');
}

if($_SESSION['priv'] != 'PRESIDENT' && $_SESSION['priv'] != 'DEAN'){
	header('Location: index.php?error=5');
}

$super = "";
if($_SESSION['priv'] == "DEAN"){
	$super = '<li id="superuser">
							<a href="superuser.php"><i class="fa fa-fw fa-user-secret"></i> Superuser</a>
						</li>';
}

$db = connect();

$results = getdescription();
$arraycount = count($results);
if($arraycount > 8){
	$dis = "disabled";
}
else{
	$dis = "none";
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

    <title>Meetings</title>

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
                      </i> &nbsp <?php echo $_SESSION['priv']; ?><b class="caret"></b></a>
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
                    <li>
                        <a href="students.php"><i class="fa fa-fw fa-group"></i> Students</a>
                    </li>
                    <li  class="active">
                        <a href="#"><i class="fa fa-fw fa-bar-chart-o"></i> Meetings</a>
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
                                <i class="fa fa-bar-chart-o"></i> Meetings
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

								<div class="row">
                    <div class="col-lg-5">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-calendar">
																</i>&nbsp Manage Meeting</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
																	<div class="col-md-12">
																		<!-- PROBLEM DISABLE PROPERTY -->
																		<form class="" method="POST" action="../process/registerprocess.php">
																			<h4><i class="fa fa-calendar-plus-o"></i> Register Event</h4>
																			<div class="form-group input-group" id="event">
																				<span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
																				<input type="text" name="desc" placeholder="Event Description" required maxlength="50"
																				id="eventname" title="Format: aA" class="form-control">
																			</div>
																			<div class="row">
																				<div class="col-md-5">
																					<div class="form-group input-group" id="penalty">
																						<span class="input-group-addon"><i class="fa fa-dollar"></i></span>
																						<input type="text" name="penalty" placeholder="Sanction" required maxlength="3"
																						id="penaltyfield" title="Numbers only" class="form-control">
																					</div>
																				</div>
																				<div class="col-md-7" style="padding-left: 0px;">
																					<div class="form-group input-group" id="eventdate">
																						<span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>
																						<input type="date" name="dato"  required="required" class="form-control"
																						maxlength="11" placeholder="yyyy-dd-mm" id="dateevent">
																					</div>
																				</div>
																			</div>
																				<div class="col-md-12 text-right" style="margin-bottom: 10px;">
																					<a class="danger" data-toggle="tooltip" data-placement="left"
																					title="You might need to focusout from the input field to enable the submit button. Try clicking here!">
																					<i class="fa fa-question-circle primary"	style="font-size: 1.2em; margin-right: 10px;"></i></a>
																					<button id="eventsubmit" class="btn btn-primary" type="submit" name="addmeeting"
																					<?php echo $dis;?>>	Add Event &nbsp  <i class="fa fa-send"></i></button>
																				</div>
																			</form>
																	</div>
                                </div>
                            </div>
                        </div>
                    </div>
										<!-- End of manage meeting panel -->

										<div class="col-lg-7">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-list"></i>&nbsp Meetings List</h3>
                            </div>

														<!-- meeting list table -->
                            <div class="panel-body" style="padding-top: 0px;">
															<div class="row" style="overflow: auto; height: 470px;">
																<div class="flot-chart">
																	<table class="table table-bordered table-hover table-striped">
																		<thead>
																			<tr>
																				<th class="text-center">Id</th>
																				<th class="text-center">Description</th>
																				<th class="text-center">Penalty</th>
																				<th class="text-center">Date</th>
																				<th class="text-center">Options</th>
																			</tr>
																		</thead>
																		<tbody id="meetings-table">
																			<?php foreach(getmeet() as $g): ?>
																			<tr class="text-center">
																				<td><?php echo  $g->m_id; ?></td>
																				<td><?php echo  $g->description; ?></td>
																				<td><?php echo  $g->penalty; ?></td>
																				<td class="text-center"><?php echo  $g->m_date; ?></td>
																				<td class="text-center"><a data-toggle="modal" data-id="<?php echo $g->m_id;?>" title="Add this item"
																					class="editMeeting btn btn-primary" data-target="#edit-meeting">
																				<i class="fa fa-edit"></i></a>
																				<a class="deleteMeeting btn btn-danger" data-id="<?php echo $g->m_id?>">
																				<i class="fa fa-trash"></i></a></td>
																			</tr>
																		<?php endforeach; ?>
																		</tbody>
																	</table>
                                </div>
															</div>
															<!-- delete all button -->
																<div class="row">
																	<div class="col-md-12">
																		<a href="../process/deletemeetings.php?action=deleteall"
																		onclick="return confirm('Are you sure?')"
																		class="btn btn-danger" type="button" data-toggle="tooltip"
																		title="Proceed with caution!" name="button">
																		<i class="fa fa-warning"></i>&nbsp Delete All</a>
																		<a class="danger" data-toggle="tooltip" data-placement="right"
																		title="Warning! This will delete everything in the list">
																		<i class="fa fa-exclamation-circle"
																		style="font-size: 1.5em; color: #BB1A1A; margin-left: 10px;"></i></a>
																	</div>
																</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

								<div class="modal fade" id="edit-meeting" role="dialog">
									<div class="modal-dialog modal-md">
										<div class="modal-content form-group">
											<form class="" action="../process/updatestudent.php" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<div class="text-center">
													<h3 class="modal-title font2"> <i class="fa fa-edit"></i> &nbspEvent Information</h3>
												</div>
											</div>
											<div class="modal-body" id="event_details">
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default"
												data-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-primary" name="updato">Save Changes</button>
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

		<!-- for notification modal  -->
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

		<!-- Validation JS -->
		<script src="../js/myownvalidation.js"></script>

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
					  $('#text').text("Added Successfully!");
					  $('#errormodal').modal('show');
						break;
					case '2':
						$('#text').text("Updated Successfully!");
						$('#errormodal').modal('show');
						break;
				}
				switch (error) {
				 case '2':
					 $('#text').text("DB error!");
					 $('#errormodal').modal('show');
					 break;
				 case '5':
					 $('#text').text("Add meetings first!");
					 $('#errormodal').modal('show');
					 break;
				}
			}
		</script>

</body>

</html>
