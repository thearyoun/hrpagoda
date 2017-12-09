<?php
	if($user_data->num_rows()==1){
		$user_id=$user_data->row()->user_id;
		$username=$user_data->row()->username;
		//$username_kh=$user_data->row()->username_kh;
		$email=$user_data->row()->email;
		$phone=$user_data->row()->phone;
		//$mobile=$user_data->row()->mobile;
		$address=$user_data->row()->address;
		$status=$user_data->row()->status;
		$use_branch_id=$user_data->row()->use_branch_id;
		//$using_location_id=$user_data->row()->using_location_id;
		//$using_department_id=$user_data->row()->using_department_id;
	}else{
		redirect('manage_users');
	}
?>
<!--<div class="page-header">
	<h1> Form Category <small> <i class="ace-icon fa fa-angle-double-right"></i> Common form create </small></h1>
</div>--><!-- /.page-header -->
<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<?php
			$this->load->view('backend/notification/index.php');
		?>
		<form class="form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>manage_users/update_user/<?php echo $user_id;?>">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="username"> <?php echo $this->lang->line('fm_username');?><span class="required">*</span></label>

				<div class="col-sm-9">
					<input type="text" id="username" name="username" placeholder="Username" class="col-xs-10 col-sm-5" required="required" value="<?php echo $username;?>" />
					<?php echo form_error('username'); ?>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="email"> <?php echo $this->lang->line('fm_email');?> </label>

				<div class="col-sm-9">
					<input type="text" id="email" name="email" placeholder="Email" class="col-xs-10 col-sm-5" value="<?php echo $email;?>"/>
					<?php echo form_error('email'); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="phone"> <?php echo $this->lang->line('fm_phone');?> <span class="required">*</span></label>

				<div class="col-sm-9">
					<input type="text" id="phone" name="phone" placeholder="Phone" class="col-xs-10 col-sm-5" required="required" value="<?php echo $phone;?>"/>
					
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
				<label class="col-sm-3 control-label no-padding-right" for="address"> <?php echo $this->lang->line('fm_address');?></label>

				<div class="col-sm-9">
					<textarea name="address" rows="6" class="col-xs-10 col-sm-5"><?php echo $address;?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="password"> <?php echo $this->lang->line('fm_password');?> <span class="required">*</span></label>

				<div class="col-sm-9">
					<input type="password" id="password" name="password" class="col-xs-10 col-sm-5" required="required" />
					<?php echo form_error('password'); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="conf_password"> <?php echo $this->lang->line('fm_confirm_password');?> <span class="required">*</span></label>

				<div class="col-sm-9">
					<input type="password" id="conf_password" name="conf_password" class="col-xs-10 col-sm-5" required="required" />
					<?php echo form_error('conf_password'); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="role"> <?php echo $this->lang->line('fm_roles');?> <span class="required">*</span></label>

				<div class="col-sm-9">
					<select name="role" class="col-xs-10 col-sm-5">
						<option value="0">--Select Role--</option>
						<?php
							foreach($roles->result() as $row){
						?>
								<option value="<?php echo $row -> role_id; ?>" <?php echo ($user_role->row()->using_role_id==$row->role_id)? 'selected':'';?>><?php echo $row -> name; ?></option>
						<?php
						}
						?>
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="status"> <?php echo $this->lang->line('fm_status');?> </label>

				<div class="col-sm-9">
					<select name="status" class="col-xs-10 col-sm-5">
						<option value="1" <?php echo ($status==1)? 'selected':'';?>>Active</option>
						<option value="0" <?php echo ($status==0)? 'selected':'';?>>Inactive</option>
					</select>
				</div>
			</div>
			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<button class="btn btn-info" type="submit">
						<i class="ace-icon fa fa-check bigger-110"></i>
						<?php echo $this->lang->line('fm_btn_submit');?>
					</button>

					&nbsp; &nbsp; &nbsp;
					<button class="btn" type="reset">
						<i class="ace-icon fa fa-undo bigger-110"></i>
						<?php echo $this->lang->line('fm_btn_reset');?>
					</button>
				</div>
			</div>

		</form>

	</div><!-- /.col -->
</div><!-- /.row -->