<?php
session_start();
include "../process/functions.php";
if(!isset($_SESSION['admin'])){
	header('Location: ../index.php?error2');
}

$getdesc = getdescription2(); //CLEAN THIS!
$arraycount = count($getdesc);

if($arraycount < 1 || $arraycount == 0){
	header('Location: meetings.php?error=5');
}

$_SESSION['count']=$arraycount;

for ($i = 0; $i <$arraycount; $i++){
	$desc[] = implode(',', $getdesc[$i]);
}

	$data = disname();
	$option = "";
	foreach ($data as $row) {
        $name = $row['name'];
        $option.='<option value="'.$name.'">'.$name.'</option>';
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

    <title>Sanctions</title>

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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user">
                    </i> </i> <?php echo $_SESSION['admin']; ?> <b class="caret"></b></a>
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
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
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
                    <li>
                        <a href="meetings.php"><i class="fa fa-fw fa-bar-chart-o"></i> Meetings</a>
                    </li>
                    <li  class="active">
                        <a href="#"><i class="fa fa-fw fa-table"></i> Sanctions</a>
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
                                <i class="fa fa-table"></i> Sanctions
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                  <div class="col-lg-4">
										<div class="panel panel-yellow">
											<div class="panel-heading">
												<a href="javascript:;" data-toggle="collapse"
												data-target="#panelbody" style="text-decoration: none;
												color: black;">	<h3 class="panel-title">
												<i class="fa fa-tasks"></i>	&nbsp Manage Sanction
												&nbsp <i class="fa fa-caret-down"></i></h3></a>
											</div> <!-- End of panel heading -->
											<div class="collapse panel-body" id="panelbody">
												<div class="flot-chart">

												</div>
											</div>
										</div>
                  </div>
									<div class="col-lg-8">
										<div class="panel panel-green">
											<div class="panel-heading">
												<a href="javascript:;" data-toggle="collapse"
												data-target="#panelbody2" style="text-decoration: none;
												color: white;"> <h3 class="panel-title">
												<i class="fa fa-mortar-board"></i> &nbsp Edit by year
												&nbsp <i class="fa fa-caret-down"></i></h3>	</a>
											</div> <!-- End of panel heading -->
											<div class="collapse panel-body" id="panelbody2">
												<div class="flot-chart">

												</div>
											</div>
										</div>
									</div>
                </div>
                <!-- /.row -->
								<div class="row">
									<div class="col-lg-12">
										<div class="panel panel-primary">
											<div class="panel-heading">
												<div class="row">
													<div class="col-lg-8">
														<h1 style="font-size: 1.5em;" class="panel-title">
														<i class="fa fa-th"></i>
														&nbsp Sanction List</h1>
													</div>
													<div class="col-lg-4 text-right">
														<div class="input-group">
																<span style="font-size: 10px;"
																class="input-group-addon"><i class="fa fa-search"></i></span>
																<input style="background-color: #F4F4F4; height: 25px;"
																class="form-control" type="text" name="searchname2"
																value="" id="searchname" placeholder="Search here by name">
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">

												</div>
											</div>
											<div class="panel-body" style="padding-top: 0px;">
												<div class="row" style="overflow: auto;">
													<div class="flot-chart">
														<table class="table table-responsive table-stripped">
															<thead class="text-center">
																<tr class="">
																	<th>Student</th>
																	<?php foreach (getmeet() as $g):?>
																	<th><?php echo $g->description; ?></th>
																	<?php endforeach;?>
																	<th>Total</th>
																	<th class="text-center">Option</th>
																</tr>
															</thead>
															<tbody>
																<?php foreach (getsanction() as $k):?>
																	<tr>
																		<td><?php echo $k->s_name ?></td>
																		<?php try{ ?>
																		<?php if($arraycount >= 1){echo '<td>'.$k->$desc[0].'</td>';} ?>
																		<?php if($arraycount >= 2){echo '<td>'.$k->$desc[1].'</td>';} ?>
																		<?php if($arraycount >= 3){echo '<td>'.$k->$desc[2].'</td>';} ?>
																		<?php if($arraycount >= 4){echo '<td>'.$k->$desc[3].'</td>';} ?>
																		<?php if($arraycount >= 5){echo '<td>'.$k->$desc[4].'</td>';} ?>
																		<?php if($arraycount >= 6){echo '<td>'.$k->$desc[5].'</td>';} ?>
																		<?php if($arraycount >= 7){echo '<td>'.$k->$desc[6].'</td>';} ?>
																		<?php if($arraycount >= 8){echo '<td>'.$k->$desc[7].'</td>';} ?>
																		<?php }catch(exception $e){echo $e;}?>
																		<td></td>
																		<td class="text-center"><a data-toggle="modal" data-id="<?php echo $g->m_id;?>" title="Add this item"
																			class="editMeeting btn btn-primary" data-target="#edit-meeting">
																		<i class="fa fa-edit"></i></a>
																		<a class="deleteMeeting btn btn-danger" data-id="<?php echo $g->m_id?>">
																		<i class="fa fa-trash"></i></a></td>
																	</tr>
																	<?php endforeach;?>
															</tbody>
														</table>
													</div>
												</div>
											</div>

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

</body>

</html>
