<?php
session_start();
include "../process/functions.php";
if(!isset($_SESSION['admin'])){
	header('Location: ../pages/login.php?error2');
}

$admin = $_SESSION['admin'];
$account = getadmin($admin);

//default bulletin properties
$loc = "../uploads/";
$src = "../img/slide-1";
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-user">
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
                            <a href="../process/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
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

                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Like SB Admin?</strong> Try out <a href="http://startbootstrap.com/template-overviews/sb-admin-2" class="alert-link">SB Admin 2</a> for additional features!
                        </div>
                    </div>
                </div>
                <!-- /.row -->

								<div class="row">
									<div class="col-lg-5">
											<div class="panel panel-default">
													<div class="panel-heading">
														<a href="javascript:;" data-toggle="collapse" class="bggray cblack"
														data-target="#pass-form" style="text-decoration: none; color: black;">
															<h3 class="panel-title"><i class="fa fa-lock fa-fw"></i> Change Password
															<i class="fa fa-fw fa-caret-down"></i></h3>
													</a></div>
													<div id="pass-form" class="collapse panel-body">
															<div class="container-fluid">
																<form class="form-group" action="../process/adminpass.php" method="POST">
																	<h3>Admin no.<?php echo $account->id; ?> </h3>
																	<input required="Required Field" type="hidden" name="id"
																		value="<?php echo $account->id;?>">
																		<label>Old password:</label>
																		<input class="form-control" type="password" name="old" required>
																		<label>New Password:</label>
																		<input class="form-control" type="password" name="new" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
																		title="Must contain at least one number and one uppercase and lowercase letter and at least 8 or more characters">
																		<label>Confirm Password:</label>
																		<input class="form-control" type="password" name="con" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
																		title="Must contain at least one number and one uppercase and lowercase letter and at least 8 or more characters">
																		<div class="text-right" style="margin-top: 10px;">
																			<input class="btn btn-default" type="submit" name="change" value="Save Password">
																		</div>
																	</form>
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
																			<th>Date</th>
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
                                <div class="text-right">
                                    <a href="#">View All Activity <i class="fa fa-arrow-circle-right"></i></a>
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
																		<form class="form-group" action="../process/bulletin.php" method="post"
																		 enctype="multipart/form-data">
																		 <label for="image"><i class="fa fa-picture-o"></i> Image :</label>
																			<input id="image" name="image" type="file" required <?php echo $dis; ?>><br>
																			<label for=""> <i class="fa fa-user"></i> Title :</label><br>
																			<input class="form-control" id="title" type="text" name="title"
																			value="" required <?php echo $dis; ?>>
																			<label for="post"><i class="fa fa-comments"></i> Post :</label><br>
																			<textarea class="form-control" id="post" name="post" rows="5" required
																			<?php echo $dis; ?>></textarea>
																			<input class="btn btn-default" style="margin-top: 10px; width: 120px;"
																			 type="submit" name="submit" value="Submit" <?php echo $dis; ?>>
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

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
		<?php
		if(isset($_GET['error']) && $_GET['error'] == 1){
      echo '<script type="text/javascript">
				$(document).ready(function(){
        alert("There was an error uploading your file!");
				})(jQuery);
      </script>';
    }
		elseif(isset($_GET['error']) && $_GET['error'] == 2){
			echo '<script type="text/javascript">
				$(document).ready(function(){
        alert("Error uploading info in database");
				})(jQuery);
      </script>';
		}

		if(isset($_GET['success'])){
			echo '<script type="text/javascript">
				$(document).ready(function(){
        alert("Execution Successful!");
				})(jQuery);
      </script>';
		}

		 ?>

</body>

</html>
