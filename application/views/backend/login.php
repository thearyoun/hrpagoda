<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from responsiweb.com/themes/preview/ace/1.3.2/login.html by HTTrack Website Copier/3.x [XR&CO'2008], Mon, 17 Nov 2014 15:00:17 GMT -->
<head>
<<<<<<< HEAD
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login Page - Langka HR</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url();?>dist/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>font-awesome/4.2.0/css/font-awesome.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url();?>dist/css/ace.min.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo base_url();?>dist/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="<?php echo base_url();?>dist/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?php echo base_url();?>dist/css/ace-ie.min.css" />
		<![endif]-->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="<?php echo base_url();?>dist/js/html5shiv.min.js"></script>
		<script src="<?php echo base_url();?>dist/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<!--<i class="ace-icon fa fa-leaf green"></i>-->
									<span class="red">Human Resource</span><br/>
									<span class="white" id="id-text2">Management System</span>
								</h1>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<?php echo validation_errors(); ?>
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												Please Enter Your Information
											</h4>

											<div class="space-6"></div>

											<form method="post" action="<?php echo base_url();?>login">
												<fieldset>
													<label class="block clearfix">
=======
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta charset="utf-8"/>
    <title>Login Page - Monitheavy Investment</title>

    <meta name="description" content="User login page"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>font-awesome/4.2.0/css/font-awesome.min.css"/>

    <!-- text fonts -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300"/>

    <!-- ace styles -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/ace.min.css"/>

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="<?php echo base_url();?>dist/css/ace-part2.min.css"/>
    <![endif]-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/ace-rtl.min.css"/>

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="<?php echo base_url();?>dist/css/ace-ie.min.css"/>
    <![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
    <script src="<?php echo base_url();?>dist/js/html5shiv.min.js"></script>
    <script src="<?php echo base_url();?>dist/js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-layout">
<div class="main-container">
    <div class="main-content">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="login-container">
                    <div class="center">
                        <h1>
                            <!--<i class="ace-icon fa fa-leaf green"></i>-->
                            <span class="red">Human Resource</span><br/>
                            <span class="white" id="id-text2">Management System</span>
                        </h1>
                    </div>

                    <div class="space-6"></div>

                    <div class="position-relative">
                        <div id="login-box" class="login-box visible widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <?php echo validation_errors(); ?>
                                    <h4 class="header blue lighter bigger">
                                        <i class="ace-icon fa fa-coffee green"></i>
                                        Please Enter Your Information
                                    </h4>

                                    <div class="space-6"></div>

                                    <form method="post" action="<?php echo base_url(); ?>login">
                                        <fieldset>
                                            <label class="block clearfix">
>>>>>>> e5ba8bd48b233dbf093f101eeef967aed9d1ebae
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control"
                                                                   placeholder="Username" name="username"/>
															<i class="ace-icon fa fa-user"></i>
														</span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control"
                                                                   placeholder="Password" name="password"/>
															<i class="ace-icon fa fa-lock"></i>
														</span>
<<<<<<< HEAD
													</label>

													<label class="block clearfix">
=======
                                            </label>

                                            <label class="block clearfix">
>>>>>>> e5ba8bd48b233dbf093f101eeef967aed9d1ebae
														<span class="block input-icon input-icon-right">
															<select name="user_type" class="form-control">
																<option value="">--Please select type--</option>
																<option value="admin">Administrator</option>
																<option value="monk">Monk</option>
																<option value="member">Member</option>
															</select>

														</span>
                                            </label>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<select name="language" class="form-control">
																<option value="en">English</option>
																<option value="kh">Khmer</option>
															</select>
														</span>
<<<<<<< HEAD
													</label>

													<div class="space"></div>

													<div class="clearfix">


														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Login</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>

											<!--<div class="social-or-login center">
												<span class="bigger-110">Or Login Using</span>
											</div>

											<div class="space-6"></div>

											<div class="social-login center">
												<a class="btn btn-primary">
													<i class="ace-icon fa fa-facebook"></i>
												</a>

												<a class="btn btn-info">
													<i class="ace-icon fa fa-twitter"></i>
												</a>

												<a class="btn btn-danger">
													<i class="ace-icon fa fa-google-plus"></i>
												</a>
											</div>-->
										</div><!-- /.widget-main -->

										<div class="toolbar clearfix">

										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->




							</div><!-- /.position-relative -->

							<!--<div class="navbar-fixed-top align-right">
								<br />
								&nbsp;
								<a id="btn-login-dark" href="#">Dark</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-blur" href="#">Blur</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-light" href="#">Light</a>
								&nbsp; &nbsp; &nbsp;
							</div>-->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="<?php echo base_url();?>ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
=======
                                            </label>

                                            <div class="space"></div>

                                            <div class="clearfix">


                                                <button type="submit"
                                                        class="width-35 pull-right btn btn-sm btn-primary">
                                                    <i class="ace-icon fa fa-key"></i>
                                                    <span class="bigger-110">Login</span>
                                                </button>
                                            </div>

                                            <div class="space-4"></div>
                                        </fieldset>
                                    </form>

                                    <!--<div class="social-or-login center">
                                        <span class="bigger-110">Or Login Using</span>
                                    </div>

                                    <div class="space-6"></div>

                                    <div class="social-login center">
                                        <a class="btn btn-primary">
                                            <i class="ace-icon fa fa-facebook"></i>
                                        </a>

                                        <a class="btn btn-info">
                                            <i class="ace-icon fa fa-twitter"></i>
                                        </a>

                                        <a class="btn btn-danger">
                                            <i class="ace-icon fa fa-google-plus"></i>
                                        </a>
                                    </div>-->
                                </div><!-- /.widget-main -->

                                <div class="toolbar clearfix">

                                </div>
                            </div><!-- /.widget-body -->
                        </div><!-- /.login-box -->


                    </div><!-- /.position-relative -->

                    <!--<div class="navbar-fixed-top align-right">
                        <br />
                        &nbsp;
                        <a id="btn-login-dark" href="#">Dark</a>
                        &nbsp;
                        <span class="blue">/</span>
                        &nbsp;
                        <a id="btn-login-blur" href="#">Blur</a>
                        &nbsp;
                        <span class="blue">/</span>
                        &nbsp;
                        <a id="btn-login-light" href="#">Light</a>
                        &nbsp; &nbsp; &nbsp;
                    </div>-->
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.main-content -->
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="<?php echo base_url(); ?>ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
>>>>>>> e5ba8bd48b233dbf093f101eeef967aed9d1ebae
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<![endif]-->

<!--[if !IE]> -->
<script type="text/javascript">
    window.jQuery || document.write("<script src='<?php echo base_url();?>dist/js/jquery.min.js'>" + "<" + "/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='<?php echo base_url();?>dist/js/jquery1x.min.js'>" + "<" + "/script>");
</script>
<![endif]-->
<<<<<<< HEAD
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url();?>dist/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});



			//you don't need this, just used for changing background
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');

				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');

				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');

				e.preventDefault();
			 });

			});
		</script>
	</body>
=======
<script type="text/javascript">
    if ('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url();?>dist/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function ($) {
        $(document).on('click', '.toolbar a[data-target]', function (e) {
            e.preventDefault();
            var target = $(this).data('target');
            $('.widget-box.visible').removeClass('visible');//hide others
            $(target).addClass('visible');//show target
        });
    });


    //you don't need this, just used for changing background
    jQuery(function ($) {
        $('#btn-login-dark').on('click', function (e) {
            $('body').attr('class', 'login-layout');
            $('#id-text2').attr('class', 'white');
            $('#id-company-text').attr('class', 'blue');

            e.preventDefault();
        });
        $('#btn-login-light').on('click', function (e) {
            $('body').attr('class', 'login-layout light-login');
            $('#id-text2').attr('class', 'grey');
            $('#id-company-text').attr('class', 'blue');

            e.preventDefault();
        });
        $('#btn-login-blur').on('click', function (e) {
            $('body').attr('class', 'login-layout blur-login');
            $('#id-text2').attr('class', 'white');
            $('#id-company-text').attr('class', 'light-blue');

            e.preventDefault();
        });

    });
</script>
</body>
>>>>>>> e5ba8bd48b233dbf093f101eeef967aed9d1ebae

<!-- Mirrored from responsiweb.com/themes/preview/ace/1.3.2/login.html by HTTrack Website Copier/3.x [XR&CO'2008], Mon, 17 Nov 2014 15:00:17 GMT -->
</html>
