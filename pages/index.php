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
$id = $_SESSION['id'];
$account = getadminbyid($id);

//default bulletin properties
$loc = "../uploads/";
$src = "../img/slide-1.jpg";
$title = 'Title Here';
$par = 'This bulletin board can be a purpose for announcement,
	statement or notice to the students. The "Delete Bulletin" button
	will only be activated once a bulletin posts is made as
	the input for bulletin will be disabled. In order to change the
	bulletin posts, the admin must first delete the current post.
	<br><br>
	Lorem ipsum dolor sit amet, consectetur adipiscing elit.
	Nunc placerat diam quis nisl vestibulum dignissim. In hac
	habitasse platea dictumst. Interdum et malesuada fames ac
	ante ipsum primis in faucibus. Pellentesque habitant morbi
	tristique senectus et netus et malesuada fames ac turpis egestas.';

$dis = ""; //enable bulletin registration
$dis2 = "disabled"; //disable delete bulletin when no bulletin is added

if(!empty(getbulletin())){ //bulletin control
	$results = getbulletin();
	$src = $loc.$results->imgname; //show image
	$_SESSION['src'] = $src;
	$title = $results->title; //show title
	$par = $results->post; //show paragraph
	$dis = "disabled"; //disable bulletin registration
	$dis2 = ""; //enable delete bulletin
}

$limit = '10';
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

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
                            <a href="help.php"><i class="fa fa-fw fa-gear"></i> Help</a>
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
                    <li class="active">
                        <a href="#"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
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
                        <h1 class="page-header">
                            Dashboard <small>Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
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

								<div class="row">
									<div class="col-lg-5">
											<div class="panel panel-default">
													<div class="panel-heading">
														<a href="javascript:;" data-toggle="collapse" class="bggray cblack"
														data-target="#pass-form" style="text-decoration: none; color: black;">
															<h3 class="panel-title"><i class="fa fa-address-card fa-fw"></i> &nbsp Account Details
															<i class="fa fa-fw fa-caret-down"></i></h3>
													</a></div>
													<div id="pass-form" class="collapse panel-body">
															<div class="container-fluid">
																<div class="row">
																		<h3><i class="fa fa-universal-access fa-fw"></i> Admin no. <?php echo $_SESSION['id']; ?></h3>
																	<div class="col-lg-5">
																			<h4>Username: </h4>
																			<h4>Access Level: </h4>
																	</div>
																	<div class="col-lg-7">
																		<h4><strong> <?php echo $account->user; ?></strong>	</h4>
																		<h4><strong> <?php echo $account->privilege; ?></strong></h4>
																	</div>
																</div>
																<div class="row" style="margin-top: 10px;">
																	<div class="col-lg-6">
																		<button type="button" class="btn btn-default btn-block"
																		data-toggle="modal" data-target="#changeuser">
																		<i class="fa fa-edit"></i> Update Username</button>
																	</div>
																	<div class="col-lg-6">
																		<button type="button" class="btn btn-default btn-block"
																		data-toggle="modal" data-target="#changepass">
																		<i class="fa fa-lock"></i> Update Password</button>
																	</div>
																</div>
															</div>
													</div>
											</div>
									</div>
                    <div class="col-lg-7">
                        <div class="panel panel-default">
                            <div class="panel-heading">
															<a href="javascript:;" data-toggle="collapse" class="bggray cblack"
															data-target="#recordtable" style="text-decoration: none; color: black;">
																<h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Login Records
																<i class="fa fa-fw fa-caret-down"></i></h3>
                            </a></div>
                            <div  id="recordtable" class="collapse panel-body">
																<table class="table table-bordered table-hover table-striped">
																	<thead>
																		<tr>
																			<th>User</th>
																			<th>Date [y-m-d]</th>
																			<th>Time</th>
																			<th>Day</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php foreach(getrecord() as $g): ?>
																			<tr>
																				<td><?php echo  $g->name; ?></td>
																				<td><?php echo  $g->dates; ?></td>
																				<td><?php echo  $g->time; ?></td>
																				<td><?php echo  $g->day; ?></td>
																			</tr>
																		<?php endforeach; ?>
																	</tbody>
																</table>
                                <div class="row">
																	<div class="col-lg-6">
																		<a class="btn btn-success btn-sm" href="../process/filedownload.php?file=5">
																			<i class="fa fa-download"></i></a>
																		<a class="btn btn-warning btn-sm" value="print"
																	 	onclick="PrintDiv();"><i class="fa fa-print"></i></a>
																	</div>
																	<div class="col-lg-6 text-right">
																		<a class="btn btn-primary" data-toggle="modal" data-target="#loginrecords">View All Activity
																			<i class="fa fa-arrow-circle-right"></i></a>
																	</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Manage Bulletin</h3>
                            </div>
                            <div class="panel-body">
                                <div id="bulletin-area">
																	<div class="col-lg-4">
																		<form class="form-group" id="bulletin-form" action="../process/bulletin.php" method="post"
																		 enctype="multipart/form-data">

																		 <label for="image"><i class="fa fa-picture-o"></i> Image :
																		 <p style="display: inline; color: red;" id="imgerror"></p></label>
																	 		<input id="image" name="image" type="file" <?php echo $dis; ?> required><br>

																		<label for=""> <i class="fa fa-user"></i> Title :
																		<p style="display: inline; color: red;" id="titleerror"></p></label><br>
																			<div class="" id="errortitle">
																				<input class="form-control" id="title" type="text" name="title"
																				value="" <?php echo $dis; ?> required>
																			</div>

																		<label for="post"><i class="fa fa-comments"></i> Post :
																		<p style="display: inline; color: red;" id="posterror"></p></label><br>
																			<div class="" id="errorpost">
																				<textarea class="form-control" id="post" name="post" rows="5"
																				<?php echo $dis; ?> required></textarea>
																			</div>

																			<input class="btn btn-default" style="margin-top: 10px; width: 120px;"
																			 type="submit" name="submit" value="Submit" id="bulletin" <?php echo $dis; ?>>
																		</form>
																	</div>

																	<div class="col-lg-8">
																		<hr width="250px">
																		<h6 class="intro-text text-center">
																				<strong>BULLETIN BOARD &nbsp</strong>
																				<i class="glyphicon glyphicon-list-alt"></i>
																				 &nbsp ANNOUNCEMENT
																		</h6>
																		<hr width="250px">
																		<div class="col-lg-6">
																			<img class="img-responsive img-border img-left"
																			src="<?php echo $src; ?>" alt="">
																		</div>
																		<div class="col-lg-6 text-justify" style="margin-bottom: 20px;">
																			<hr class="visible-xs">
																			<h5 class="no-margin"><strong><?php echo $title; ?></strong></h5>
																			<p style="font-size: 9px;"><?php echo $par; ?></p>
																		</div>
																	</div>
																	<!-- end of col-8-->
																	<div class="row">
																		<div class="container-fluid">
																			<form class="text-right" action="../process/delete.php" method="post">
																				<button type="submit" class="btn btn-danger"
																				name="delete" <?php echo $dis2; ?>>Delete Bulletin</button>
																			</form>
																		</div>
																	</div>
																</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

		<div class="modal fade" id="loginrecords" role="dialog">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h3 class="modal-title font2"><i class="fa fa-clock-o fa-fw"></i>&nbsp Login Records</h3>
						</div>
						<div class="modal-body" style="height: 400px; overflow: auto;" id="divToPrint">
							<table border="1" class="table table-bordered table-hover table-striped">
								<thead>
									<tr>
										<th>User</th>
										<th>Date [y-m-d]</th>
										<th>Time</th>
										<th>Day</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach(getrecordmodal($limit) as $g): ?>
										<tr>
											<td><?php echo  $g->name; ?></td>
											<td><?php echo  $g->dates; ?></td>
											<td><?php echo  $g->time; ?></td>
											<td><?php echo  $g->day; ?></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
				</div>
			</div>
		</div>
		<!-- end of modal -->

		<!-- Password modal -->
		<div class="modal fade" role="dialog" id="changepass">
			<div class="modal-dialog modal-sm">
				<div class="modal-content" style="padding-left: 20px; padding-right: 20px;">
					<div class="row">
						<div class="col-lg-12">
							<form id="p-form" class="form-group" action="../process/adminpass.php" method="POST">
						    <h3><strong>Update Password</strong></h3>
						    <input required="Required Field" type="hidden" name="id"
						      value="<?php echo $account->id;?>" id="idadmin">
						      <input required="Required Field" type="hidden" name="name"
						        value="<?php echo $account->user;?>" id="admin">
						      <label>Old password:
						      <p style="display: inline; color: red;" id="olderror"></p></label>
						      <div class="" id="operror">
						        <input class="form-control" type="password" name="old"
						        required id="old-pass">
						      </div>
						      <label>New Password:
						      <p style="display: inline; color: red;" id="newerror"></p></label>
						      <div class="" id="nperror">
						        <input class="form-control" id="new-pass" type="password" name="new" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
						        title="Must contain at least one number and one uppercase and lowercase letter and at least 8 or more characters">
						      </div>
						      <label>Confirm Password:
						      <p style="display: inline; color: red;" id="conerror"></p></label>
						      <div class="" id="cperror">
						        <input class="form-control" id="con-pass" type="password" name="con" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
						        title="Must contain at least one number and one uppercase and lowercase letter and at least 8 or more characters">
						      </div>
						      <div class="text-right" style="margin-top: 10px;">
						        <input class="btn btn-default" type="submit" name="submit" value="Save Password" id="pbutton">
						      </div>
						    </form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- username modal -->
		<div class="modal fade" role="dialog" id="changeuser">
			<div class="modal-dialog modal-sm">
				<div class="modal-content" style="padding-left: 20px; padding-right: 20px;">
					<div class="row">
						<div class="col-lg-12">
							<form class="form-group" action="../process/updatestudent.php" method="POST">
								<h3><strong>Update Username</strong></h3>
								<input required="Required Field" type="hidden" name="id"
									value="<?php echo $account->id;?>">
									<label>Username:</label>
									<div class="">
										<input class="form-control" type="text" name="uname" required pattern="(?=.*\d)(?=.*[a-z]).{8,}"
										title="Must be alphanumeric character and not your previous username" value="<?php echo $account->user; ?>">
									</div>
									<div class="text-right" style="margin-top: 10px;">
										<input class="btn btn-default" type="submit" name="useronly" value="Update username">
									</div>
								</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- errormodal -->
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
    <script src="../js/myownvalidation.js"></script>

		<script type="text/javascript">
			 var error = '<?php if(isset($_GET['error'])){echo $_GET['error'];}else{ echo '';} ?>';
			 var texterror = '<?php if(isset($_SESSION['error'])){echo $_SESSION['error'];}else{ echo '';} ?>';
			 console.log(error);
			 if(error != ''){
				 console.log('inside here');
				 switch (error) {
				 	case '1': case '2':
				 		$('#text').text(texterror);
						$('#errormodal').modal('show');
				 		break;
					case '3':
						$('#text').text("Fill up sanction first!");
						$('#errormodal').modal('show');
						break;
					case '4':
						$('#text').text("Only the treasurer is allowed");
						$('#errormodal').modal('show');
						break;
					case '5':
						$('#text').text("Only the president is allowed");
						$('#errormodal').modal('show');
						console.log("here!");
				 		break;
					case '6':
						$('#text').text("You insolent fool! Try again!");
						$('#errormodal').modal('show');
						console.log("here!");
				 		break;
					case '7':
						$('#text').text("Username already exists!");
						$('#errormodal').modal('show');
						console.log("here!");
				 		break;
				 }
			 }

			 function PrintDiv() {
				   var divToPrint = document.getElementById('divToPrint');
				   var popupWin = window.open('', '_blank', 'width=900,height=500');
				   popupWin.document.open();
				   popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
				   popupWin.document.close();
	 		  }
		</script>

</body>
</html>
