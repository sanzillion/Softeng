<?php
session_start();
include "../process/functions.php";
if(!isset($_SESSION['admin'])){
	header('Location: ../pages/login.php?error2');
}
$db = connect();

$results = getdescription();
$arraycount = count($results);
if($arraycount > 7){
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
                <a class="navbar-brand" href="index.php">SRS Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                      </i> <?php echo $_SESSION['admin']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
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
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

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
																				<div class="form-group input-group">
																					<span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
																					<input type="text" name="desc" placeholder="Event Description" required maxlength="11"
																					pattern="[a-zA-Z]{.11}" title="Format: aA" class="form-control">
																				</div>
																				<div class="form-group input-group">
																					<span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>
																					<input type="date" name="dato"  required="required" class="form-control"
																					maxlength="11" placeholder="yyyy-dd-mm">
																				</div>
																				<div class="col-md-12 text-right" style="margin-bottom: 10px;">
																					<button class="btn btn-primary" type="submit" name="addmeeting"
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
																				<th class="text-center">Date</th>
																				<th class="text-center">Options</th>
																			</tr>
																		</thead>
																		<tbody id="meetings-table">
																			<?php foreach(getmeet() as $g): ?>
																			<tr class="text-center">
																				<td><?php echo  $g->m_id; ?></td>
																				<td><?php echo  $g->description; ?></td>
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
																		<a href="" class="danger" data-toggle="tooltip" data-placement="right"
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

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

		<!-- Custom JS -->
		<script src="../js/master.js"></script>

		<!-- Activate bootstrap tooltip -->
		<script type="text/javascript">
			$(document).ready(function(){
					$('[data-toggle="tooltip"]').tooltip();
			});
		</script>

		<?php
		if(isset($_GET['success']) && $_GET['success'] == 1){
				echo '<script type="text/javascript">
					alert("Added Successfuly");
				</script>';
		}
		if(isset($_GET['success']) && $_GET['success'] == 2){
			echo '<script type="text/javascript">
				alert("Updated Successfuly");
			</script>';
		}
		if(isset($_GET['error']) && $_GET['error'] == 5){
			echo '<script type="text/javascript">
				alert("Add meetings first!");
			</script>';
		}
		?>

</body>

</html>
