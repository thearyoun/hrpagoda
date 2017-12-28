<div id="navbar" class="navbar navbar-default">
	<script type="text/javascript">
		try {
			ace.settings.check('navbar', 'fixed')
		} catch(e) {
		}
	</script>

	<div class="navbar-container" id="navbar-container">
		<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
			<span class="sr-only">Toggle sidebar</span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>
		</button>

		<div class="navbar-header pull-left">
			<a href="#" class="navbar-brand"> <small> <i class="fa fa-leaf"></i> HR Management System ( Developed by Nhem Bora, TEL : 098 426 187 )</small> </a>
		</div>

		<div class="navbar-buttons navbar-header pull-right" role="navigation">
			<ul class="nav ace-nav">
				<li class="light-blue">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle"> <span class="user-info"> <small>ស្វាគមន៍,</small> <?php echo $this->session->userdata('user_login_username');?> <?php echo $this->session->userdata('username');?> </span> <i class="ace-icon fa fa-caret-down"></i> </a>

					<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">


						<li>
							<a href="<?php echo base_url(); ?>admindev/logout"> <i class="ace-icon fa fa-power-off"></i> ចាកចេញ </a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div><!-- /.navbar-container -->
</div>
