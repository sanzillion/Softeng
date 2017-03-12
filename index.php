<?php
session_start();
session_destroy();

include "process/functions.php";

$loc = "uploads/";
$src = "img/slide-1.jpg";
$title = 'Title Here';
$par = 'The boxes used in this template are nested inbetween a
	normal Bootstrap row and the start of your column layout.
	The boxes will be full-width boxes, so if you want to make
	them smaller then you will need to customize. <br>
	Lorem ipsum dolor sit amet, consectetur adipiscing elit.
	Nunc placerat diam quis nisl vestibulum dignissim. In hac
	habitasse platea dictumst. Interdum et malesuada fames ac
	ante ipsum primis in faucibus. Pellentesque habitant morbi
	tristique senectus et netus et malesuada fames ac turpis egestas.';

if(!empty(getbulletin())){
	$results = getbulletin();
	$src = $loc.$results->imgname;
	$title = $results->title;
	$par = $results->post;
}
//convert dates
$meetdate = [];
foreach(getmeet() as $d){
	$month = date('M', strtotime($d->m_date));
	$day = date('d', strtotime($d->m_date));
	$meetdate[] = $d->description.' <i class="fa fa-calendar" data-toggle="tooltip"
	data-placement="top" title="'.$month.' '.$day.'"></i>';
}
$getdesc = getdescription2(); //2 means FETCH_ASSOC
$arraycount = count($getdesc);

for ($i = 0; $i <$arraycount; $i++){
	$desc[] = implode(',', $getdesc[$i]);
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

    <title>Software Engineering</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Icons Font Awesome -->
    <link rel="stylesheet" href="icons/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <link href="https://fonts.googleapis.com/css?family=Play|Squada+One" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="fadein2s">

    <div class="brand fadein" style="background-color: white;">
      <div class="container center-block logo">
            <img class="img-responsive" src="img/srs.png" alt="logo"></a>
      </div>
    </div>
    <!-- <div class="address-bar">
      Sanction Record System</div> -->

    <!-- Navigation -->
    <nav id="na" class="navbar navbar-default bgwhite" role="navigation">
        <div id="cont" class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand navbrand" href="index.html">
                <img class="img-responsive " src="img/newlogo3.png" alt=""></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav cblack">
                    <li class="page-scroll fadein2s">
                        <a href="#home"><i class="glyphicon glyphicon-home">
                        </i>&nbsp<b>Home</b></a>
                    </li>
                    <li class="fadein3s">
                        <a href="" data-toggle="modal" data-target="#record"><i class="glyphicon glyphicon-file">
                        </i>&nbsp<b>Record</b></a>
                    </li>
                    <li class="fadein4s">
                        <a href="" data-toggle="modal" data-target="#admin"><i class="glyphicon glyphicon-log-in">
                        </i>&nbsp<b>Admin</b></a>
                    </li>
                    <li class="page-scroll fadein5s">
                        <a href="#contact"><i class="glyphicon glyphicon-cog">
                        </i>&nbsp <b>Contact</b></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container frombot-animate" id="home">
        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <div id="carousel-example-generic" class="carousel slide">
                        <!-- Indicators -->
                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="img-responsive img-full" src="img/slide-1.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/slide-2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/slide-3.jpg" alt="">
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                    <!-- <h2 class="brand-before">
                        <small>Welcome to</small>
                    </h2> -->
                    <!-- <h1 class="brand-name">SJP2CD | EYESEETEA | ICT</h1> -->
                    <!-- <hr class="tagline-divider"> -->
                    <h2>
                        <small>St. John Paul II College of Davao,
                            <strong>EYESEETEA Inc., </strong>
                            ICT Firefox
                        </small>
                    </h2>
                </div>
            </div>
        </div>

        <div class="row" id="about">
          <div class="box">
            <div class="col-lg-12 text-justify">
              <hr>
              <h2 class="intro-text text-center">
                <strong>ICT</strong> Sanction Record System
              </h2>
              <hr>
              <div class="col-lg-3">
              </div>
              <div class="col-lg-6">
                <p> A system project of Information Technology Students as a
                requirement of <strong>Software Engineering subject</strong> from
                the College of Information and Communications Technology of
                <strong>St. John Paul II College of Davao.</strong></p>
              </div>
              <div class="col-lg-3">
              </div>

            </div>
          </div>
        </div>

        <div class="row" id="bulletin">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>BULLETIN BOARD &nbsp</strong>
                        <i class="glyphicon glyphicon-list-alt"></i>
                         &nbsp ANNOUNCEMENT
                    </h2>
                    <hr style="margin-bottom: 40px !important">
                    <div class="col-lg-6">
                      <img class="img-responsive img-border" src="<?php echo $src; ?>" alt="">
                    </div>
                    <div class="col-lg-6 text-justify">
                      <hr class="visible-xs">
                      <h3 class="no-margin" style="margin-bottom: 10px;"><?php echo $title; ?></h3>
											<div class="" id="paragraph" style="overflow-y: auto; height: 280px;">
												<p><?php echo $par; ?></p>
											</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="contact">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">CONTACT &nbsp<i class="glyphicon glyphicon-cog"></i>
                        <strong>&nbspSUPPORT</strong>
                    </h2>
                    <hr>
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-6 text-justify">
                      <form class="" id="contact-form" action="form-handler-nodb.php" method="post">
                        <div class="form-group">
                          <label for="name">Name :</label>
                          <input type="text" disabled class="form-control" id="name"
                          name="name" value="" required>
                          <label for="email">Email :</label>
                          <input type="text" class="form-control" id="email"
                          name="email" value="" required disabled >
                          <label for="comment">Comment :</label>
                          <textarea class="form-control" rows="5"
                          name="comment" id="comment" required disabled >
                          </textarea>
                          <div class="text-right">
                            <button class="btn btn-default" type="submit"
                            name="submitform" disabled style="width: 100%;
                            margin-top: 10px;">Submit Form</button>
                          </div>
                            <p class="pull-right">Or you can contact us thru the links below.</p>
                        </div>
                      </form>
                    </div>
                    <div class="col-lg-3">
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <!-- FOOTER -->
    <footer class="bggray padtopbot">
        <div class="container">
            <div class="row text-center margin-bottom">
              <h1 class="text-center cwhite no-margin" style="margin-top: 10px;"> Developers </h1>
              <h4 class="text-center cwhite no-margin padbot">Software Engineers</h4>
                <div class="col-lg-3">
                  <div class=" lightborder">
                    <h4 class="cwhite">KATH</h4>
                    <p class="cwhite no-padding txt10">Project Leader/ Technical Writer</p>
                    <hr style="width:200px; margin-top: 5px; margin-bottom: 5px;">
                    <p class="cwhite no-padding txtsmall">
                      <i class="fa fa-user-circle"></i> &nbsp Katherin Potestas</p>
                    <p class="cwhite no-padding txt10">
                      <i class="fa fa-google"></i> &nbsp katherinedemirapotestas</p>
                    <div class="btn btn-group">
                      <a class="btn btn-default" href="http://www.facebook.com/jeonnochuiiee"
                      target="_blank">
                        <i class="fa fa-facebook-square fa-lg"></i>
                      </a>
                      <a class="btn btn-default" href="http://www.facebook.com/jeonnochuiiee"
                      target="_blank">
                        <i class="fa fa-twitter-square fa-lg"></i>
                      </a>
                      <a class="btn btn-default" href="http://www.facebook.com/sanzillion"
                      target="_blank">
                        <i class="fa fa-instagram fa-lg"></i>
                      </a>
                      <a class="btn btn-default" href="http://www.facebook.com/sanzillion"
                      target="_blank">
                        <i class="fa fa-google-plus fa-lg"></i>
                      </a>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3">
                  <div class="lightborder">
                    <h4 class="cwhite no-padding ">SANZ</h4>
                    <p class="cwhite no-padding txt10">Programmer/ UI designer</p>
                    <hr style="width:200px; margin-top: 5px; margin-bottom: 5px;">
                    <p class="cwhite no-padding txtsmall">
                      <i class="fa fa-user-circle"></i> &nbsp Sandru Moses Valle</p>
                    <p class="cwhite no-padding txt10">
                      <i class="fa fa-google"></i> &nbsp sanzimagery@gmail.com</p>
                    <div class="btn btn-group">
                      <a class="btn btn-default" href="http://www.facebook.com/sanzillion"
                      target="_blank">
                        <i class="fa fa-facebook-square fa-lg"></i>
                      </a>
                      <a class="btn btn-default" href="http://www.github.com/sanzillion"
                      target="_blank">
                        <i class="fa fa-github fa-lg"></i>
                      </a>
                      <a class="btn btn-default" href="http://www.codepen.io/sanzillion"
                      target="_blank">
                        <i class="fa fa-codepen fa-lg"></i>
                      </a>
                      <a class="btn btn-default" href="http://www.freecodecamp.com/sanzillion"
                      target="_blank">
                        <i class="fa fa-free-code-camp fa-lg "></i>
                      </a>
                      <a class="btn btn-default" href="http://www.sanzillion.wordpress.com"
                      target="_blank">
                        <i class="fa fa-wordpress fa-lg "></i>
                      </a>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3">
                  <div class="lightborder">
                    <h4 class="cwhite">ANGEL</h4>
                    <p class="cwhite no-padding txt10">Tester/ Technical Writer</p>
                    <hr style="width:190px; margin-top: 5px; margin-bottom: 5px;">
                    <p class="cwhite no-padding txtsmall">
                      <i class="fa fa-user-circle"></i> &nbsp Angelica Callao</p>
                    <p class="cwhite no-padding txt10">
                      <i class="fa fa-google"></i> &nbsp angelbarbie@gmail.com</p>
                    <div class="btn btn-group">
                      <a class="btn btn-default" href="http://www.facebook.com/angel.callo"
                      target="_blank">
                        <i class="fa fa-facebook-square fa-lg"></i>
                      </a>
                      <a class="btn btn-default" href="http://www.facebook.com/angel.callo"
                      target="_blank">
                        <i class="fa fa-twitter-square fa-lg"></i>
                      </a>
                      <a class="btn btn-default" href="http://www.facebook.com/sanzillion"
                      target="_blank">
                        <i class="fa fa-instagram fa-lg"></i>
                      </a>
                      <a class="btn btn-default" href="http://www.facebook.com/sanzillion"
                      target="_blank">
                        <i class="fa fa-google-plus fa-lg"></i>
                      </a>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3">
                  <div class="lightborder">
                    <h4 class="cwhite">JUN</h4>
                    <p class="cwhite no-padding txt10">Analyst/ Technical Writer</p>
                    <hr style="width:190px; margin-top: 5px; margin-bottom: 5px;">
                    <p class="cwhite no-padding txtsmall">
                      <i class="fa fa-user-circle"></i> &nbsp Charlito Turtor Jr.</p>
                    <p  class="cwhite no-padding txt10">
                      <i class="fa fa-google"></i> &nbsp  charlitogwapito@gmail.com</p>
                    <div class="btn btn-group">
                      <a class="btn btn-default" href="http://www.facebook.com/charl.turtor.1"
                      target="_blank">
                        <i class="fa fa-facebook-square fa-lg"></i>
                      </a>
                      <a class="btn btn-default" href="http://www.facebook.com/charl.turtor.1"
                      target="_blank">
                        <i class="fa fa-twitter-square fa-lg"></i>
                      </a>
                      <a class="btn btn-default" href="http://www.facebook.com/sanzillion"
                      target="_blank">
                        <i class="fa fa-instagram fa-lg"></i>
                      </a>
                      <a class="btn btn-default" href="http://www.facebook.com/sanzillion"
                      target="_blank">
                        <i class="fa fa-google-plus fa-lg"></i>
                      </a>
                    </div>
                  </div>
                </div>

            </div>
        </div>

    </footer>
    <footer class=" bgblue ">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 padtopbot">
            <label class=" cwhite">Follow us on: </label>
            <div id="btns" class="btn btn-group">
              <a href="#">
                <i class="fa fa-facebook fa-2x sidemargin cwhite"></i>
              </a>
              <a href="#">
                <i class="fa fa-twitter fa-2x sidemargin cwhite"></i>
              </a>
							<a href="#">
                <i class="fa fa-github fa-2x sidemargin cwhite"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-6 padtopbot">
            <p class="cwhite pull-right txtsmall no-padding" style="padding: 10px 10px;">Copyright &copy;
              <strong>EYESEETEA Inc.</strong> 2016</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Modal for admin -->
    <div class="modal fade margin-top" id="admin" role="dialog"
    style="margin-top: 50px;">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="modal-title font2 text-center">Admin</h3>
          </div>
          <div class="modal-body">
            <form class="padside" id="loginform"
             action="process/loginprocess.php" method="post">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input id="user" type="text" class="form-control" name="user"
                placeholder="Username" required>
              </div>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input id="password" type="password" class="form-control" name="pass"
                placeholder="Password" required>
              </div>
              <button type="submit" name="submit" class="btn btn-block btn-default"
              style="margin-top: 10px;">Submit</button>
            </form>

          </div>
          <div class="modal-footer">

          </div>
        </div>
      </div>
    </div>

    <!-- Modal for records-->
  <div class="modal fade" id="record" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-center">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title font2" style="font-size: 3em;">
						<i class="fa fa-th-list" style="font-size: 30px;"></i> SANCTION Record</h3>
        </div>
        <div class="modal-body">
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<div class="row">
										<div class="col-lg-4">
											<div class="input-group">
													<span style="font-size: 10px;"
													class="input-group-addon"><i class="fa fa-search"></i></span>
													<input style="background-color: #F4F4F4; height: 25px;"
													class="form-control" type="text" name="searchname"
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
									<div class="row">
										<div class="flot-chart" style="overflow: auto;">
											<table class="table table-responsive table-striped">
												<thead class="text-center">
													<tr class="">
														<th>Student</th>
														<?php foreach ($meetdate as $g): ?>
														<th><?php echo $g; ?></th>
														<?php endforeach;?>
														<th>Total</th>
													</tr>
												</thead>
												<tbody id="sanctions-table">
													<?php foreach (getsanction() as $k):?>
														<tr>
															<td><?php echo $k->name ?></td>
															<?php $total = 0;?>
															<?php if($arraycount >= 1){echo '<td>'.$k->$desc[0].'</td>';} ?>
															<?php if($arraycount >= 2){echo '<td>'.$k->$desc[1].'</td>';} ?>
															<?php if($arraycount >= 3){echo '<td>'.$k->$desc[2].'</td>';} ?>
															<?php if($arraycount >= 4){echo '<td>'.$k->$desc[3].'</td>';} ?>
															<?php if($arraycount >= 5){echo '<td>'.$k->$desc[4].'</td>';} ?>
															<?php if($arraycount >= 6){echo '<td>'.$k->$desc[5].'</td>';} ?>
															<?php if($arraycount >= 7){echo '<td>'.$k->$desc[6].'</td>';} ?>
															<?php if($arraycount >= 8){echo '<td>'.$k->$desc[7].'</td>';} ?>
															<td><?php if($k->total == 0){echo "CLEARED";}else{echo $k->total;}?></td>
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
      </div>
    </div>
  </div>


</div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Easing Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Validation Plugin JS-->
    <!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script> -->

    <!-- Custom JS -->
    <script src="js/master.js"></script>

    <!-- Script to Activate the Carousel -->
    <script type="text/javascript">
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
		$(function(){
				$('#searchname').keyup(function(event){
						var keyCode = event.which; // check which key was pressed
						var name = $(this).val(); // get the complete input
						var nothing = 'nothingLOL';
						if(name != '')
							{
									 $.ajax({
												url:"pages/editsanctions.php",
												method:"POST",
												data:{searchnameindex:name},
												success:function(data){
														 $('#sanctions-table').html(data);
														 console.log('success!');
												}
									 });
							}
						else{ //if he erases everythin, the table goes back to normal
							$.ajax({
									 url:"pages/editsanctions.php",
									 method:"POST",
									 data:{showindex:nothing},
									 success:function(data){
												$('#sanctions-table').html(data);
												console.log('success!');
									 }
							});
						}
				});
		});

		<!-- Activate bootstrap tooltip -->
			$(document).ready(function(){
					$('[data-toggle="tooltip"]').tooltip();
			});

    </script>

    <?php
    if(isset($_GET['error']) && $_GET['error'] == 1){
      echo '<script type="text/javascript">
        alert("Invalid user or password");
      </script>';
    }

    if(isset($_GET['error']) && $_GET['error'] == 2){
      echo '<script type="text/javascript">
        alert("You need to login first!");
      </script>';
    }

    if(isset($_GET['error']) && $_GET['error'] == 3){
      echo '<script type="text/javascript">
        alert("You need super user privileges");
      </script>';
    }
     ?>

</body>
</html>
