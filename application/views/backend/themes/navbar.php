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
				<?php if($this->session->userdata("user_type")=="admin"):?>
        <li class="purple dropdown-modal">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="ace-icon fa fa-bell icon-animated-bell"></i>
                        <span class="badge badge-important">
                            <?php echo (get_message()!=false?get_message()->num_rows():"")?>
                        </span>
                    </a>
                    <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close" style="">
                        <li class="dropdown-header">
                            <i class="ace-icon fa fa-envelope-o"></i>
                            <?php echo (get_message()!=false?get_message()->num_rows():"")?> Messages
                        </li>

                        <li class="dropdown-content ace-scroll" style="position: relative;"><div class="scroll-track" style="display: block; height: 281px;"><div class="scroll-bar" style="height: 224px; top: 0px;"></div></div><div class="scroll-content" style="max-height: 281px;">
                                <ul class="dropdown-menu dropdown-navbar">
                                    <?php foreach (get_message()->result() as $message) { ?>
                                    <li>
                                        <?php if ($message->type == "member") { ?>
                                        <a href="<?php echo base_url().'manage_member_take_leaves' ?>" class="clearfix">
                                            <?php } else { ?>
                                            <a href="<?php echo base_url().'manage_monk_take_leaves' ?>" class="clearfix">
                                                <?php } ?>
                                            <img src="<?php echo base_url().'ftemplate/images/'. $message->photo; ?>" class="msg-photo" alt="Alex's Avatar">
                                            <span class="msg-body">
                                                <span class="msg-title">
                                                    <span class="blue"><?php echo $message->username; ?>:</span>
                                                    <?php echo $message->reason; ?>
                                                </span>
                                                <span class="msg-time">
                                                    <i class="ace-icon fa fa-clock-o"></i>
                                                    <span><?php echo $message->created_at; ?></span>
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
				<?php endif;?>
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
