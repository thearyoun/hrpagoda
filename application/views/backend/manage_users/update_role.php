<?php
	foreach($role_data->result() as $row){
		$role_id=$row->role_id;
		$name=$row->name;
		$description=$row->description;
		$status=$row->status;
	}
	$access_permission=array();
	foreach($role_permissions->result() as $row){
		$permission_id=$row->using_permission_id;
		array_push($access_permission,$permission_id);
		
	}
?>
<form class="form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>manage_users/update_role/<?php echo $this->uri->segment(3);?>">
	<div class="row">
		<div class="col-sm-12">
			<?php
			$this -> load -> view('backend/notification/index.php');
			?>
			<div class="widget-box">
				<div class="widget-header">
					<h4 class="smaller"> Access Setup</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main">
						<div class="widget-body">
							<div class="row">
								<div class="col-sm-6">
									<div class="widget-main no-padding">

										<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="role_name"> <?php echo $this->lang->line('fm_role_name');?> :<span class="required">*</span></label>

											<div class="col-sm-8">
												<input type="text" id="role_name" name="role_name" placeholder="Role Name" class="col-xs-10 col-sm-9" value="<?php echo $name;?>"/>
												<?php echo form_error('role_name'); ?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="role_desc"> <?php echo $this->lang->line('fm_role_description');?></label>

											<div class="col-sm-8">
												<textarea name="role_desc" rows="4" class="col-xs-10 col-sm-10"><?php echo $description;?></textarea>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="status"> <?php echo $this->lang->line('fm_status');?> </label>

											<div class="col-sm-8">
												<select name="status" class="col-xs-10 col-sm-10">
														<option value="1" <?php echo ($status==1)? 'selected':'';?>>Active</option>
														<option value="0" <?php echo ($status==0)? 'selected':'';?>>Inactive</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									
									<div class="control-group">
												<label class="control-label bolder blue"><?php echo $this->lang->line('fm_permission');?></label>
												<?php
													foreach($permissions->result() as $row){
														if(in_array($row->permission_id, $access_permission)){
															$is_checked='checked';
														}else{
															$is_checked='';
														}
												?>
													<div class="checkbox">
														<label>
															<input name="permissions[]" type="checkbox" class="ace" value="<?php echo $row->permission_id;?>"<?php echo $is_checked;?>/>
															<span class="lbl"> <?php echo $this->lang->line($row->name);?></span>
														</label>
													</div>
												<?php
													}
												?>

											</div>
										

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- /.col -->

	</div><!-- /.row -->
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix form-actions">
				<div class="col-md-offset-4 col-md-8">
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
		</div>
	</div>
</form>
