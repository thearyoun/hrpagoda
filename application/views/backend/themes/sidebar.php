<div id="sidebar" class="sidebar  responsive">
	<script type="text/javascript">
		try {
			ace.settings.check('sidebar', 'fixed')
		} catch(e) {
		}
	</script>
	<ul class="nav nav-list">
		<?php if($this->session->userdata("user_type")=="member"){ ?>
			<li <?php echo (str_replace('-', '_', $this -> uri ->
				segment(1)) == '')? 'class="active open"' : 'class=""' ?>> <a href="<?php echo base_url(); ?>manage_member_account">
					<i class="menu-icon fa fa-user"></i>
					<span class="menu-text">
						<!-- <?php echo $this->lang->line('sidebar_dashboard');?> -->
						គណនីផ្ទាល់ខ្លួន
					</span> </a>
				<b class="arrow"></b>
			</li>
		<?php }?>
		<?php if($this->session->userdata("sidebar_users")){ ?>
		<li <?php echo (str_replace('-', '_', $this -> uri ->
			segment(1)) == '')? 'class="active open"' : 'class=""' ?>> <a href="<?php echo base_url(); ?>admindev">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text">
					<!-- <?php echo $this->lang->line('sidebar_dashboard');?> -->
					ផ្ទាំងគ្រប់គ្រង
				</span> </a>
			<b class="arrow"></b>
		</li>

		<li <?php echo (str_replace('-', '_', $this -> uri ->
			segment(1)) == 'manage_users' )? 'class="active open"' : 'class=""' ?>> <a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-users"></i> <span class="menu-text">
				<!-- <?php echo $this->lang->line('sidebar_user_account');?> -->
				គណនីយអ្នកប្រើប្រាស់
			</span> <b class="arrow fa fa-angle-down"></b> </a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-caret-right"></i>
						<!-- <?php echo $this->lang->line('sidebar_users');?> -->
						អ្នកប្រើប្រាស់
						<b class="arrow fa fa-angle-down"></b> </a>
					<b class="arrow"></b>
					<ul class="submenu">
						<li class="">
							<a href="<?php echo base_url(); ?>manage_users/create_user">
								<i class="menu-icon fa fa-caret-right"></i>
								<!-- <?php echo $this->lang->line('sidebar_add_new');?>  -->
								បង្កើតថ្មី
							</a>
							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="<?php echo base_url(); ?>manage_users">
								<i class="menu-icon fa fa-caret-right"></i>
								<!-- <?php echo $this->lang->line('sidebar_users_list');?>  -->
								បញ្ជីឈ្មោះ
							</a>
							<b class="arrow"></b>
						</li>
					</ul>
				</li>
				<li class="">
					<a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-caret-right"></i>
						<!-- <?php echo $this->lang->line('sidebar_user_roles');?>  -->
						មុខងារអ្នកប្រើប្រាស់
						<b class="arrow fa fa-angle-down"></b> </a>
					<b class="arrow"></b>
					<ul class="submenu">
						<li class="">
							<a href="<?php echo base_url(); ?>manage_users/create_role"> <i class="menu-icon fa fa-caret-right"></i>
								<!-- <?php echo $this->lang->line('sidebar_add_new');?>  -->
								បង្កើតមុខងារថ្មី
							</a>
							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="<?php echo base_url(); ?>manage_users/roles">
								<i class="menu-icon fa fa-caret-right"></i>
								<!-- <?php echo $this->lang->line('sidebar_user_role_list');?>  -->
								បញ្ជីមុខងារ
							</a>
							<b class="arrow"></b>
						</li>
					</ul>
				</li>
			</ul>
		</li>
		<?php }
		if(($this->session->userdata("user_type")=="member")){
			?>
			<li <?php echo (str_replace('-', '_', $this -> uri ->
				segment(1)) == 'manage_members' )? 'class="active open"' : 'class=""' ?>> <a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-user"></i> <span class="menu-text"> <?php echo $this->lang->line('');?>ពុទ្ធបរិស័ទ្ទ</span> <b class="arrow fa fa-angle-down"></b> </a>
				<b class="arrow"></b>
				<ul class="submenu">
					<li class="active">
						<a href="<?php echo base_url(); ?>manage_members/create_member"> <i class="menu-icon fa fa-caret-right"></i> <?php echo $this->lang->line('sidebar_add_new');?> </a>
						<b class="arrow"></b>
					</li>
				</ul>
			</li>
			<?php
		}
		?>
		<?php if($this->session->userdata("sidebar_our_members")){ ?>
		<li <?php echo (str_replace('-', '_', $this -> uri ->
			segment(1)) == 'manage_members' )? 'class="active open"' : 'class=""' ?>> <a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-user"></i> <span class="menu-text"> <?php echo $this->lang->line('');?>ពុទ្ធបរិស័ទ្ទ</span> <b class="arrow fa fa-angle-down"></b> </a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="active">
					<a href="<?php echo base_url(); ?>manage_members/create_member"> <i class="menu-icon fa fa-caret-right"></i> <?php echo $this->lang->line('sidebar_add_new');?> </a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?php echo base_url(); ?>manage_members"> <i class="menu-icon fa fa-caret-right"></i> <?php echo $this->lang->line('');?> បញ្ជីពុទ្ធបរិស័ទ្ទ</a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>
		<?php }
			if(($this->session->userdata("user_type")=="monk")){
				?>
				<li <?php echo (str_replace('-', '_', $this -> uri ->
					segment(1)) == 'manage_monks' )? 'class="active open"' : 'class=""' ?>> <a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-user"></i> <span class="menu-text"> ព្រះសង្ឃ </span> <b class="arrow fa fa-angle-down"></b> </a>
					<b class="arrow"></b>
					<ul class="submenu">
						<li class="">
							<a href="<?php echo base_url(); ?>manage_monks"> <i class="menu-icon fa fa-caret-right"></i> បញ្ជីព្រះសង្ឃ </a>
							<b class="arrow"></b>
						</li>
					</ul>
				</li>
				<?php
			}
		 ?>
		<?php if($this->session->userdata("sidebar_our_members")){ ?>
		<li <?php echo (str_replace('-', '_', $this -> uri ->
			segment(1)) == 'manage_monks' )? 'class="active open"' : 'class=""' ?>> <a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-user"></i> <span class="menu-text"> ព្រះសង្ឃ </span> <b class="arrow fa fa-angle-down"></b> </a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="active">
					<a href="<?php echo base_url(); ?>manage_monks/create_monk"> <i class="menu-icon fa fa-caret-right"></i>បន្ថែមព្រះសង្ឃថ្មី</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?php echo base_url(); ?>manage_monks"> <i class="menu-icon fa fa-caret-right"></i> បញ្ជីព្រះសង្ឃ </a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>
		<?php } ?>
		<?php if(($this->session->userdata("user_type")=="monk") || ($this->session->userdata("user_type")=="member")){?>
			<li <?php echo (str_replace('-', '_', $this -> uri ->
				segment(1)) == 'manage_member_take_leaves' ) || (str_replace('-', '_', $this -> uri ->
				segment(1)) == 'manage_monk_take_leaves' )? 'class="active open"' : 'class=""' ?>> <a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-user"></i> <span class="menu-text"> គ្រប់គ្រងការសុំច្បាប់ </span> <b class="arrow fa fa-angle-down"></b> </a>
				<b class="arrow"></b>
				<ul class="submenu">
					<?php if(($this->session->userdata("user_type")=="monk")){?>
					<li class="">
						<a href="<?php echo base_url(); ?>manage_monk_take_leaves"> <i class="menu-icon fa fa-caret-right"></i> ការសុំច្បាប់ព្រះសង្ឃ </a>
						<b class="arrow"></b>
					</li>
				<?php }
					if(($this->session->userdata("user_type")=="member")){
				?>
					<li class="">
						<a href="<?php echo base_url(); ?>manage_member_take_leaves"> <i class="menu-icon fa fa-caret-right"></i> ការសុំច្បាប់ពុទ្ធបរិស័ទ្ធ </a>
						<b class="arrow"></b>
					</li>
				<?php }?>
				</ul>
			</li>
		<?php }?>
		<?php if($this->session->userdata("sidebar_our_members")){ ?>
		<li <?php echo (str_replace('-', '_', $this -> uri ->
			segment(1)) == 'manage_member_take_leaves' ) || (str_replace('-', '_', $this -> uri ->
			segment(1)) == 'manage_monk_take_leaves' )? 'class="active open"' : 'class=""' ?>> <a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-user"></i> <span class="menu-text"> គ្រប់គ្រងការសុំច្បាប់ </span> <b class="arrow fa fa-angle-down"></b> </a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<a href="<?php echo base_url(); ?>manage_monk_take_leaves"> <i class="menu-icon fa fa-caret-right"></i> ការសុំច្បាប់ព្រះសង្ឃ </a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?php echo base_url(); ?>manage_member_take_leaves"> <i class="menu-icon fa fa-caret-right"></i> ការសុំច្បាប់ពុទ្ធបរិស័ទ្ធ </a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>
		<?php } ?>
		<?php if($this->session->userdata("sidebar_our_members")){ ?>
		<li <?php echo (str_replace('-', '_', $this -> uri ->
			segment(1)) == 'manage_attendants' ) || (str_replace('-', '_', $this -> uri ->
			segment(1)) == 'manage_attendants' )? 'class="active open"' : 'class=""' ?>> <a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-user"></i> <span class="menu-text"> ការគ្រប់គ្រងវត្តមាន </span> <b class="arrow fa fa-angle-down"></b> </a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<a href="<?php echo base_url(); ?>manage_attendants/create_attendant"> <i class="menu-icon fa fa-caret-right"></i> ចុះវត្តមាន </a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?php echo base_url(); ?>manage_attendants"> <i class="menu-icon fa fa-caret-right"></i> បញ្ជីវត្តមាន </a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>
		<?php } ?>

	<?php if($this->session->userdata("sidebar_setup")){ ?>
	<li <?php echo (str_replace('-', '_', $this -> uri ->segment(1)) == 'setup'
	|| str_replace('-', '_', $this -> uri -> segment(1)) == 'manage_departments'
	|| str_replace('-', '_', $this -> uri -> segment(1)) == 'manage_lines'
	|| str_replace('-', '_', $this -> uri -> segment(1)) == 'manage_houses'
	|| str_replace('-', '_', $this -> uri -> segment(1)) == 'manage_leave_types'
	|| str_replace('-', '_', $this -> uri -> segment(1)) == 'manage_member_types'
	|| str_replace('-', '_', $this -> uri -> segment(1)) == 'manage_positions'
	|| str_replace('-', '_', $this -> uri -> segment(1)) == 'manage_programmes'
	|| str_replace('-', '_', $this -> uri -> segment(1)) == 'manage_locations' )? 'class="active open"' : 'class=""' ?>>
		<a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-users"></i> <span class="menu-text">
			<!-- <?php echo $this->lang->line('sidebar_setup');?> -->
			ការតម្លើងទិន្នន័យធំៗ
		</span> <b class="arrow fa fa-angle-down"></b> </a>
		<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
						<a href="<?php echo base_url(); ?>setup/general_setting">
							<i class="menu-icon fa fa-caret-right"></i>
							<!-- <?php echo $this->lang->line('sidebar_general_setting');?> -->
							ការកំណត់ជាទូទៅ
						</a>
						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="<?php echo base_url(); ?>manage_departments"> <i class="menu-icon fa fa-caret-right"></i>គ្រប់គ្រងនាយកដ្ឋាន</a>
						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="<?php echo base_url(); ?>manage_lines"> <i class="menu-icon fa fa-caret-right"></i>គ្រប់គ្រងក្រុម</a>
						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="<?php echo base_url(); ?>manage_houses"> <i class="menu-icon fa fa-caret-right"></i>គ្រប់គ្រងកុដិ</a>
						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="<?php echo base_url(); ?>manage_leave_types"> <i class="menu-icon fa fa-caret-right"></i>ប្រភេទនៃការសុំច្បាប់</a>
						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="<?php echo base_url(); ?>manage_member_types"> <i class="menu-icon fa fa-caret-right"></i>គ្រប់គ្រងប្រភេទសមាជិក</a>
						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="<?php echo base_url(); ?>manage_positions"> <i class="menu-icon fa fa-caret-right"></i>គ្រប់គ្រងតួនាទី</a>
						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="<?php echo base_url(); ?>manage_programmes"> <i class="menu-icon fa fa-caret-right"></i>គ្រប់គ្រងកម្មវិធី</a>
						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="<?php echo base_url(); ?>manage_locations"> <i class="menu-icon fa fa-caret-right"></i><?php echo $this->lang->line('');?>គ្រប់គ្រងទីកន្លែង</a>
						<b class="arrow"></b>
					</li>
			</ul>
	</li>
	<?php } ?>
	<?php if($this->session->userdata("sidebar_reports")){ ?>
	<li <?php echo (str_replace('-', '_', $this -> uri ->segment(1)) == 'manage_reports' )? 'class="active open"' : 'class=""' ?>>
		 <a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-file-o"></i> <span class="menu-text">
			 <!-- <?php echo $this->lang->line('sidebar_reports');?>  -->
			 របាយការណ៍
			 <span class="badge badge-primary">5</span> </span> <b class="arrow fa fa-angle-down"></b> </a>
		<b class="arrow"></b>
		<ul class="submenu">
			<li class="">
				<a href="<?php echo base_url(); ?>manage_reports/users"> <i class="menu-icon fa fa-caret-right"></i>
					<!-- <?php echo $this->lang->line('sidebar_user_account');?>  -->
					គណនីយអ្នកប្រើប្រាស់
				</a>
				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="<?php echo base_url(); ?>manage_reports/members"> <i class="menu-icon fa fa-caret-right"></i> <?php echo $this->lang->line('');?> របាយការណ៍ពុទ្ទបរិស័ទ្ទ</a>
				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="<?php echo base_url(); ?>manage_reports/monks"> <i class="menu-icon fa fa-caret-right"></i> <?php echo $this->lang->line('');?>របាយការណ៍ព្រះសង្ឃ</a>
				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="<?php echo base_url(); ?>manage_reports/groups"> <i class="menu-icon fa fa-caret-right"></i> <?php echo $this->lang->line('');?>របាយការណ៍តាមកម្មវីធី</a>
				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="<?php echo base_url(); ?>manage_reports/people_in_houses"> <i class="menu-icon fa fa-caret-right"></i> <?php echo $this->lang->line('');?>របាយការណ៍តាមកុដិ</a>
				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="<?php echo base_url(); ?>manage_reports/monk_book_forms"> <i class="menu-icon fa fa-caret-right"></i> <?php echo $this->lang->line('');?>សៀវភៅបញ្ជីព្រះសង្ឃ</a>
				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="<?php echo base_url(); ?>manage_reports/member_book_forms"> <i class="menu-icon fa fa-caret-right"></i> <?php echo $this->lang->line('');?>សៀវភៅបញ្ជីពុទ្ធបរិស័ទ្ទ</a>
				<b class="arrow"></b>
			</li>
		</ul>
	</li>
	<?php } ?>


	<!--monk menu-->
	<?php if($this->session->userdata("monk_id")){ ?>
		<li <?php echo (str_replace('-', '_', $this -> uri ->
			segment(1)) == 'manage_monk_account' )? 'class="active open"' : 'class=""' ?>> <a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-user"></i> <span class="menu-text"> <?php echo $this->lang->line('');?>គណនីរបស់ខ្ញុំ</span> <b class="arrow fa fa-angle-down"></b> </a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="active">
					<a href="<?php echo base_url(); ?>manage_monk_account"> <i class="menu-icon fa fa-caret-right"></i>ពត័មានផ្ទាល់ខ្លួន</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="<?php echo base_url(); ?>manage_monk_account/attendant"> <i class="menu-icon fa fa-caret-right"></i> <?php echo $this->lang->line('');?> បញ្ជីវត្តមាន</a>

					<b class="arrow"></b>
				</li>
			</ul>
		</li>
		<?php } ?>
	</ul><!-- /.nav-list -->

	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>

	<script type="text/javascript">
		try {
			ace.settings.check('sidebar', 'collapsed')
		} catch(e) {
		}
	</script>
</div>
