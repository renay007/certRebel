<!-- 
     Show the details of a
     single course. User can decide to
		 join a course from this page.
-->

<?php
	session_start();
	require_once('functions.php');
	include_once('version_number.inc');
	$course  		 = htmlentities($_GET['course']);
	$course_info = course_info();
	$title 			 = $course_info[$course][0]['course_long_title'];
	$pic 				 = $course_info[$course][0]['course_picture'];
	$id 				 = $course_info[$course][0]['course_id'];
	if (!isset($_GET['course']) || $_GET['course'] == "" || !isset($id))
		header("Location: courses");
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="keywords" content="">

	<title>CertRebel</title>

	<link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon">
	<link rel="apple-touch-icon" href="/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/images/apple-touch-icon-114x114.png">

	<link rel="stylesheet" type="text/css" href="/libraries/swal/dist/sweetalert.css?ver=<?php echo $version;?>"> 
	<link rel="stylesheet" type="text/css" href="/libraries/fonts/font-awesome-4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/stroke.css?ver=<?php echo $version;?>">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css?ver=<?php echo $version;?>">
	<link rel="stylesheet" type="text/css" href="/css/animate.css?ver=<?php echo $version;?>">
	<link rel="stylesheet" type="text/css" href="/css/carousel.css?ver=<?php echo $version;?>">
	<link rel="stylesheet" type="text/css" href="/css/prettyPhoto.css?ver=<?php echo $version;?>">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap-select.css?ver=<?php echo $version;?>">
	<link rel="stylesheet" type="text/css" href="/css/style.css?ver=<?php echo $version;?>">
	<link rel="stylesheet" type="text/css" href="/css/quote.css?ver=<?php echo $version;?>">

	<!-- COLORS -->
	<link rel="stylesheet" type="text/css" href="/css/custom.css?ver=<?php echo $version;?>">

	<!-- RS SLIDER -->
	<link rel="stylesheet" type="text/css" href="/libraries/rs-plugin/css/settings.css?ver=<?php echo $version;?>" media="screen" />

	<style>
		#keep-position-fixed {
			width: 100%;
			top: 0;
			right: 0;
			padding: 0;
			margin: 0;
			position: fixed;
			/*border-bottom: 1px solid #ececec;*/
			z-index: 9999;
			-webkit-transition: all 0.8s;
			-moz-transition: all 0.8s;
			transition: all 0.8s;
		}
		.modal-header, #myModal h4, #myModal .close {
				background-color: #df4a43 !important;
				color:white !important;
				text-align: center;
				font-size: 30px;
		}
		.modal-footer {
				background-color: #f9f9f9;
		}
	</style>

	<script src="/js/jquery.min.js"></script>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<?php include_once('js_scripts.php'); ?>

</head>
<body>

	<div id="loader">
		<div class="loader-container">
			<div class="wow zoomIn" data-wow-duration="1s" data-wow-offset="100">
				<div class="wow rubberBand" data-wow-delay="2000ms" data-wow-duration="1s">
					<div class="wow pulse" data-wow-delay="100ms" data-wow-iteration="infinite" data-wow-duration="1s">
						<img src="/images/small_logo.png" alt="" class="loader-site">
					</div>
				</div>
			</div>
		</div>
	</div>
    
	<div id="wrapper">
		<header id="keep-position-fixed" style="background:linear-gradient(to bottom, #fdfdfd 0%,#f7f7f7 100%) ;" class="header clearfix">
			<div class="topbar clearfix" style="">
				<div class="container">
					<div class="clearfix">
						<div class="pull-left">
							<div class="contactwrap text-left">
								<ul class="list-inline">
									<li><i class="fa fa-phone"></i> Call Us: (646) 470-7119</li>
									<li><i class="fa fa-envelope"></i><a href="mailto:info@certrebel.com"> Email Us: info@certrebel.com</a></li>
								</ul>
							</div><!-- end contactwrap -->
						</div><!-- end col -->

						<div class="pull-right">
							<ul class="social">
							</ul>
						</div><!-- end col -->
					</div><!-- end row -->
				</div><!-- end container -->
			</div><!-- end topbar -->

			<div class="container">
				<nav class="yamm navbar navbar-default">
		      <div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
										 <span class="sr-only">Toggle navigation</span>
										 <span class="icon-bar"></span>
										 <span class="icon-bar"></span>
										 <span class="icon-bar"></span>
						</button>
		        <a class="navbar-brand" href="/"><img src="/images/cert_logo.png" alt="" style="margin-top: -12px; margin-right: 0px;"></a>
		      </div>
					<div id="navbar" class="navbar-collapse collapse">
			      <ul class="nav navbar-nav navbar-right">
							<li class="dropdown megamenu"><a href="/">Home</a>
							</li>
       							<li><a href="/about">About</a></li>
							
							<li class="dropdown active megamenu"><a href="/courses">Courses</a>
							<li><a id="contactBtn" href="/#" data-toggle="modal" data-target="#myModal">Contact</a></li>
						</ul>
					</div><!--/.nav-collapse -->
				</nav><!-- end nav -->
	    </div><!-- end container -->
    </header><!-- end header -->

    <section class="section-white" style="padding-top:0px;">
			<div class="container" style="padding-top:90px;">
				<div class="row">
					<div id="content" class="col-md-12 col-sm-12" style="margin-bottom: 2%;">
						<div class="course-long-desc section-container row">
							<div class="col-md-4" style="margin-top: 9%;">
							  <div class="owl-image">
								  <a href="/course?course=<?php echo $id;?>" title=""><img src="/images/<?php echo $pic; ?>" alt="" class="img-responsive"></a>
							  </div><!-- end image -->
							</div>
							<div class="col-md-8">
								<div class="widget-title">
									<h4><?php echo $title; ?></h4>
									<hr>
								</div><!-- end widget-title -->
								<!-- Course Overview -->
								<?php
									$details = course_details();
									if (isset($details[$course]['course_details']) && isset($course)) {
										echo $details[$course]['course_details'];	
									} else {
										echo "<p>Course overview not available.</p>";
									}
								?>
								<!-- End Course Overview -->
							</div><!-- end col-md-8 -->

							<div id="sidebar" class="col-md-4 hidden" style="margin-top: -13px;">
								<div class="widget course-widget" style="line-height: 29px;">
									<div class="widget-title">
										<h4>Course Details</h4>
										<hr>
									</div><!-- end widget-title -->
									<div class="course-widget">
									<?php
										$course_info 	= course_info();
										$course 		 	= htmlentities($_GET['course']);
										$title	 			= isset($course_info[$course][0]['course_long_title']) ? $course_info[$course][0]['course_long_title']: 'N/A';
										$date 	 			= isset($course_info[$course][0]['course_meeting_date']) ? $course_info[$course][0]['course_meeting_date']: 'N/A';
										$time 	 			= isset($course_info[$course][0]['course_meeting_time']) ? $course_info[$course][0]['course_meeting_time'] : 'N/A';
										$address 			= isset($course_info[$course][0]['course_address']) ? $course_info[$course][0]['course_address'] : 'N/A';
										$cost 	 			= isset($course_info[$course][0]['course_price']) ? $course_info[$course][0]['course_price'] : '0';
										?>
										<ul>
											<li>
												<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Course: </div>
												<div style="width: 78%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $title; ?></strong></a></div>
											</li>
											<li>
												<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Date: </div>
												<div style="width: 78%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $date; ?></strong></a></div>
											</li>
											<li>
												<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Time: </div>
												<div style="width: 78%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $time; ?></strong></a></div>
											</li>
											<li>
												<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Address: </div>
												<div style="width: 78%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $address; ?></strong></a></div>
											</li>
											<li>
												<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Cost: </div>
												<div style="width: 78%; display: inline-block;"><a style="pointer-events:none" href="#"><strong>$<?php echo $cost; ?></strong></a></div>
											</li>
										</ul>
										<a style="color: white;" href="/purchase?course=<?php echo $course; ?>"><button id="joinCourse" class="btn btn-block btn-primary">Join Course</button></a>
									</div><!-- end latest-course -->
								</div><!-- end widget -->
							</div>
						</div><!-- end desc -->

					</div><!-- end content -->
					<div id="content" class="col-md-12 col-sm-12">
						<?php
							$single_details = isset(single_course_info()[$course])? single_course_info()[$course] : null;
							$count 					= count($single_details);
							if (isset($single_details)) {
						?>
								<table class="table table-striped table-bordered"style="table-layout: fixed;">
									<thead>
										<tr>
											<th>Location</th>
											<th>Date</th>
											<th>Time</th>
											<th>Price</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php
											for ($i = 0; $i < $count; ++$i) {
										?>
										<tr>
											<td><?php echo $single_details[$i]['course_location']; ?></td>
											<td><?php echo $single_details[$i]['course_meeting_date']; ?></td>
											<td><?php echo $single_details[$i]['course_meeting_time']; ?></td>
											<td>$<?php echo $single_details[$i]['course_price']; ?></td>
											<td>
												<a style="color: white;" href="/purchase/<?php echo $course; ?>/<?php echo $single_details[$i]['index']; ?>">
													<button id="joinCourse" class="btn btn-block btn-primary">Join Course</button>
												</a>
											</td>
										</tr>
										<?php
											}
										?>
									</tbody>
								</table>	
						<?php
							} else {
						?>
							<p style="font-size:28px; text-align: center;">Live course dates coming soon!</p>	
						<?php
						 }
						?>
					</div><!-- end col-md-12 -->
				</div><!-- end row -->
			</div><!-- end container -->
	  </section><!-- end section-white -->

    <!-- Footer -->
		<?php require_once("footer.php"); ?>
		<!-- End Footer -->

	</div><!-- end wrapper -->

	<!-- Modal Contact Form -->
	<div id="myModal" class=" modal fade"  tabindex="-1">
		<div class="modal-dialog form-div">
			<div class="modal-content">
				<div class="modal-header" style="background-color:#df4a43">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color:#750909 !important">&times;</button>
					<h4 style="text-align:center; font-size: 25px; color:white;"><span class="glyphicon glyphicon-envelope" style="margin-right:10px"></span> Contact Us</h4>
				</div>
				
				<div class="modal-body">
					<form role="form" action="/forms/contact/quote" method="post">
							<p class="name" style="padding-bottom:0;">
								<input style="width:50%; float:left;" name="name" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="First Name*" id="name" required/>
								<input style="width:50%; border-left-color:#A9A9AE;" name="last_name" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Last Name*" id="last_name" required/>
							</p>
							<p class="name" style="padding-bottom:0;">
								<input name="company" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Company" id="company" />
							</p>
							
							<p class="email" style="padding-bottom:0;">
								<input name="email" type="email" class="validate[required,custom[email]] feedback-input" placeholder="Email*" id="email" required/>
							</p>

							<p class="name" style="padding-bottom:0;">
								<input name="phone" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="(555)555-5555*" id="phone" required />
							</p>
							<p class="text" style="padding-bottom: 0;">
								<textarea style="max-height:90px;" name="text" class="validate[required,length[6,300]] feedback-input" id="comment" placeholder="Message*" required></textarea>
							</p>
							<div class="modal-footer">
								<button id="sendForm" name="sendForm" type="submit" class="mc-btn btn-style-4">
									<i class="fa fa-paper-plane" style="margin-right:15px;"></i>SEND
								</button>
							</div>
					</form>
				</div>

			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- End Modal Contact Form -->

	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/retina.js"></script>
	<script src="/js/wow.js"></script>
	<script src="/js/carousel.js"></script>
	<script src="/js/progress.js"></script>
	<script src="/js/parallax.js"></script>
	<script src="/js/jquery.prettyPhoto.js"></script>
	<script src="/js/custom.js?ver=<?php echo $version;?>"></script>
	<script src="/js/clear.js?ver=<?php echo $version;?>"></script>
	<script type="text/javascript" src="/libraries/swal/dist/sweetalert.min.js"></script>
	<script src="/js/maskedinput.js" type="text/javascript"></script>

	<script>
		attendee_var = 0;
		$("#contactBtn").click(function(){
			$('.header').fadeOut(0, "linear");
			$('#myModal input[name="phone"]').mask("(999) 999-9999");
		});
		$("#customButton").click(function(){
			$('.header').fadeOut(0, "linear");
			$('#myModal input[name="phone"]').mask("(999) 999-9999");
		});
		$("#myBtn").click(function(){
			$('.header').fadeOut(0, "linear");
			$('#myModal input[name="phone"]').mask("(999) 999-9999");
		});
		$("#quoteBtn").click(function(){
			$('.header').fadeOut(0, "linear");
			$('#getQuote input[name="phone"]').mask("(999) 999-9999");
		});
		$('#myModal').on('hidden.bs.modal', function () {
			$('.header').fadeIn(0, "linear");
		});
		$('#getQuote').on('hidden.bs.modal', function () {
			$('.header').fadeIn(0, "linear");
		});
	</script>

	<script>
	$(document).ready(function(){
			$('select[name="selectOption"]').on('change', function() {
				$selectOption = $('#getQuote .mc-select select');
				$selectOption.css('cssText','color: #3c3c3c !important');
			});
			<?php
			if (isset($_SESSION['success'])) {
			?>	
				swal({
					title: "Awesome!", 
					text:  "<span style=\"font-size:19px;\">Your form has been sent.</span>", 
					type:  "success",
					html: 	true,
					confirmButtonColor: "#A5DC86"
				});
			<?php
				session_destroy();
			} else if (isset($_SESSION['error'])) {
			?>
				swal({
					title: "Oops!", 
					text:  "<span style=\"font-size:19px;\">Make sure you fill out all required fields.</span>", 
					type:  "error",
					html: 	true,
					confirmButtonColor: "#F27474"
				});
			<?php
				session_destroy();
			}
			?>
	});
	</script>
  	<!-- SLIDER REV -->
	<script src="/libraries/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="/libraries/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script>
		 /* ==============================================
		SLIDER -->
		=============================================== */   
		jQuery('.tp-banner').show().revolution(
		{
		dottedOverlay:"none",
		delay:16000,
		startwidth:1170,
		startheight:665,
		hideThumbs:200,     
		thumbWidth:100,
		thumbHeight:50,
		thumbAmount:5,  
		navigationType:"none",
		navigationArrows:"solo",
		navigationStyle:"preview3",  
		touchenabled:"on",
		onHoverStop:"on",
		swipe_velocity: 0.7,
		swipe_min_touches: 1,
		swipe_max_touches: 1,
		drag_block_vertical: false,          
		parallax:"mouse",
		parallaxBgFreeze:"on",
		parallaxLevels:[7,4,3,2,5,4,3,2,1,0],            
		keyboardNavigation:"off",   
		navigationHAlign:"center",
		navigationVAlign:"bottom",
		navigationHOffset:0,
		navigationVOffset:20,
		soloArrowLeftHalign:"left",
		soloArrowLeftValign:"center",
		soloArrowLeftHOffset:20,
		soloArrowLeftVOffset:0,
		soloArrowRightHalign:"right",
		soloArrowRightValign:"center",
		soloArrowRightHOffset:20,
		soloArrowRightVOffset:0,  
		shadow:0,
		fullWidth:"on",
		fullScreen:"off",
		spinner:"spinner4",  
		stopLoop:"off",
		stopAfterLoops:-1,
		stopAtSlide:-1,
		shuffle:"off",  
		autoHeight:"off",           
		forceFullWidth:"off",                         
		hideThumbsOnMobile:"off",
		hideNavDelayOnMobile:1500,            
		hideBulletsOnMobile:"off",
		hideArrowsOnMobile:"off",
		hideThumbsUnderResolution:0,
		hideSliderAtLimit:0,
		hideCaptionAtLimit:0,
		hideAllCaptionAtLilmit:0,
		startWithSlide:0
		});   
	</script>

	<script src="/js/jquery.fitvids.js"></script>
	<script>
	  $(document).ready(function(){
	    $(".blog-media").fitVids();
	  });
	</script>

</body>
</html>