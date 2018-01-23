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
				<label class="col-sm-3 control-label no-padding-right" for="company">ឈ្មោះក្រុមហ៊ុន:<span class="required">*</span></label>

				<div class="col-sm-9">
					<input type="text" id="company" name="company" placeholder="ឈ្មោះក្រុមហ៊ុន" class="col-xs-10 col-sm-5" required="required" value="<?php echo $this->config->item('company_name');?>"/>
					<?php echo form_error('company'); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="email">អ៊ីម៉ែល:</label>

				<div class="col-sm-9">
					<input type="text" id="email" name="email" placeholder="អ៊ីម៉ែល" class="col-xs-10 col-sm-5" value="<?php echo $this->config->item('email');?>"/>
					<?php echo form_error('email'); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="phone">លេខទូរស័ព្ទ:<span class="required">*</span></label>

				<div class="col-sm-9">
					<input type="text" id="phone" name="phone" placeholder="លេខទូរស័ព្ទ" class="col-xs-10 col-sm-5" required="required" value="<?php echo $this->config->item('phone');?>"/>
					
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="fax">ពន្ធដារ:</label>

				<div class="col-sm-9">
					<input type="text" id="fax" name="fax" placeholder="ពន្ធដារ" class="col-xs-10 col-sm-5" value="<?php echo $this->config->item('fax');?>"/>
					<?php echo form_error('fax'); ?>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="language">ភាសា:<span class="required">*</span></label>

				<div class="col-sm-9">
					<select name="language" class="col-xs-10 col-sm-5">
						<option value="english">English</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="address">អាស័យដ្ឋាន:</label>

				<div class="col-sm-9">
					<textarea name="address" rows="6" class="col-xs-10 col-sm-5"><?php echo $this->config->item('address');?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="website">គេហទំព័រ:</label>

				<div class="col-sm-9">
					<input type="text" id="website" name="website" class="col-xs-10 col-sm-5" value="<?php echo $this->config->item('website');?>"/>
					<?php echo form_error('website'); ?>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="website">ស្លាកឈ្មោះក្រុមហ៊ុន:</label>

				<div class="col-sm-9">
					<input type="file" id="logo" name="userfile" class="col-xs-10 col-sm-5"/>
					<?php echo form_error('logo'); ?>
				</div>
			</div>
			
			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<button class="btn btn-info" type="submit">
						<i class="ace-icon fa fa-check bigger-110"></i>
						រក្សារទុក
					</button>

					&nbsp; &nbsp; &nbsp;
					<button class="btn" type="reset">
						<i class="ace-icon fa fa-undo bigger-110"></i>
						បោះបង់ចោល
					</button>
				</div>
			</div>

		</form>

	</div><!-- /.col -->
</div><!-- /.row -->