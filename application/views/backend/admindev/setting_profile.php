<?php
	if($user_data->num_rows()==1){
		$user_id=$user_data->row()->user_id;
		$username_en=$user_data->row()->username_en;
		$username_kh=$user_data->row()->username_kh;
		$email=$user_data->row()->email;
		$phone=$user_data->row()->phone;
		$mobile=$user_data->row()->mobile;
		$address=$user_data->row()->address;
		$status=$user_data->row()->status;
		$using_location_id=$user_data->row()->using_location_id;
		$using_department_id=$user_data->row()->using_department_id;
	}else{
		redirect('users');
	}
?>
<!--<div class="page-header">
	<h1> Form Category <small> <i class="ace-icon fa fa-angle-double-right"></i> Common form create </small></h1>
</div>--><!-- /.page-header -->
<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<?php
			$this->load->view('notification/index.php');
		?>
		<form class="form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>welcome/setting_profile">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="username_kh"> Username (Kh) <span class="required">*</span></label>

				<div class="col-sm-9">
					<input type="text" id="username_kh" name="username_kh" placeholder="Username Khmer" class="col-xs-10 col-sm-5" required="required" value="<?php echo $username_kh;?>" />
					<?php echo form_error('username_kh'); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="username_en"> Username (En)<span class="required">*</span></label>

				<div class="col-sm-9">
					<input type="text" id="username_en" name="username_en" placeholder="Username English" class="col-xs-10 col-sm-5" required="required" value="<?php echo $username_en;?>"/>
					<?php echo form_error('username_en'); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="email"> Email </label>

				<div class="col-sm-9">
					<input type="text" id="email" name="email" placeholder="Email" class="col-xs-10 col-sm-5" value="<?php echo $email;?>"/>
					<?php echo form_error('email'); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="phone"> Phone <span class="required">*</span></label>

				<div class="col-sm-9">
					<input type="text" id="phone" name="phone" placeholder="Phone" class="col-xs-10 col-sm-5" required="required" value="<?php echo $phone;?>"/>
					
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="mobile"> Mobile </label>

				<div class="col-sm-9">
					<input type="text" id="mobile" name="mobile" placeholder="Mobile" class="col-xs-10 col-sm-5" value="<?php echo $mobile;?>"/>
					<?php echo form_error('mobile'); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="location"> Location <span class="required">*</span></label>

				<div class="col-sm-9">
					<select name="location" class="col-xs-10 col-sm-5" required="required">
						<option value="">--Select Location--</option>
						<?php
							foreach($locations->result() as $row){
						?>
								<option value="<?php echo $row -> location_id; ?>" <?php echo ($using_location_id==$row->location_id)? 'selected':'';?>><?php echo $row -> name; ?></option>
						<?php
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="department"> Departments <span class="required">*</span></label>

				<div class="col-sm-9">
					<select name="department" class="col-xs-10 col-sm-5">
						<option value="">--Select Department--</option>
						<?php
							foreach($departments->result() as $row){
						?>
								<option value="<?php echo $row -> department_id; ?>" <?php echo ($using_department_id==$row->department_id)? 'selected':'';?>><?php echo $row -> name; ?></option>
						<?php
						}
						?>
					</select>
				</div>
			</div>
			<!--<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="company_name"> Company Name </label>

				<div class="col-sm-9">
					<input type="text" id="company_name" name="company_name" placeholder="Company" class="col-xs-10 col-sm-5"/>
					
				</div>
			</div>-->
			<!--<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="website"> Website</label>

				<div class="col-sm-9">
					<input type="text" id="website" name="website" placeholder="website" class="col-xs-10 col-sm-5" />
					
				</div>
			</div>-->
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="address"> Address</label>

				<div class="col-sm-9">
					<textarea name="address" rows="6" class="col-xs-10 col-sm-5"><?php echo $address;?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="password"> Password <span class="required">*</span></label>

				<div class="col-sm-9">
					<input type="password" id="password" name="password" class="col-xs-10 col-sm-5" required="required" />
					<?php echo form_error('password'); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="conf_password"> Confirm Password <span class="required">*</span></label>

				<div class="col-sm-9">
					<input type="password" id="conf_password" name="conf_password" class="col-xs-10 col-sm-5" required="required" />
					<?php echo form_error('conf_password'); ?>
				</div>
			</div>
			
			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<button class="btn btn-info" type="submit">
						<i class="ace-icon fa fa-check bigger-110"></i>
						Submit
					</button>

					&nbsp; &nbsp; &nbsp;
					<button class="btn" type="reset">
						<i class="ace-icon fa fa-undo bigger-110"></i>
						Reset
					</button>
				</div>
			</div>

		</form>

	</div><!-- /.col -->
</div><!-- /.row -->