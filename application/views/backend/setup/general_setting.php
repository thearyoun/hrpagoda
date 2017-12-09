<!--<div class="page-header">
	<h1> Form Category <small> <i class="ace-icon fa fa-angle-double-right"></i> Common form create </small></h1>
</div>--><!-- /.page-header -->
<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<?php
			$this->load->view('backend/notification/index.php');
		?>
		<form class="form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>setup/general_setting" enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="company"> <?php echo $this->lang->line('fm_company_name');?> <span class="required">*</span></label>

				<div class="col-sm-9">
					<input type="text" id="company" name="company" placeholder="Company Name" class="col-xs-10 col-sm-5" required="required" value="<?php echo $this->config->item('company_name');?>"/>
					<?php echo form_error('company'); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="email"> <?php echo $this->lang->line('fm_email');?> </label>

				<div class="col-sm-9">
					<input type="text" id="email" name="email" placeholder="Email" class="col-xs-10 col-sm-5" value="<?php echo $this->config->item('email');?>"/>
					<?php echo form_error('email'); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="phone"> <?php echo $this->lang->line('fm_phone');?> <span class="required">*</span></label>

				<div class="col-sm-9">
					<input type="text" id="phone" name="phone" placeholder="Phone" class="col-xs-10 col-sm-5" required="required" value="<?php echo $this->config->item('phone');?>"/>
					
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="fax"> <?php echo $this->lang->line('fm_fax');?> </label>

				<div class="col-sm-9">
					<input type="text" id="fax" name="fax" placeholder="Fax" class="col-xs-10 col-sm-5" value="<?php echo $this->config->item('fax');?>"/>
					<?php echo form_error('fax'); ?>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="language"> <?php echo $this->lang->line('fm_language');?> <span class="required">*</span></label>

				<div class="col-sm-9">
					<select name="language" class="col-xs-10 col-sm-5">
						<option value="english">English</option>
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
				<label class="col-sm-3 control-label no-padding-right" for="address"> <?php echo $this->lang->line('fm_address');?></label>

				<div class="col-sm-9">
					<textarea name="address" rows="6" class="col-xs-10 col-sm-5"><?php echo $this->config->item('address');?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="website"> <?php echo $this->lang->line('fm_website');?></label>

				<div class="col-sm-9">
					<input type="text" id="website" name="website" class="col-xs-10 col-sm-5" value="<?php echo $this->config->item('website');?>"/>
					<?php echo form_error('website'); ?>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="website"> <?php echo $this->lang->line('fm_company_logo');?></label>

				<div class="col-sm-9">
					<input type="file" id="logo" name="userfile" class="col-xs-10 col-sm-5"/>
					<?php echo form_error('logo'); ?>
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