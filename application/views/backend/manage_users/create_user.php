<!--<div class="page-header">
	<h1> Form Category <small> <i class="ace-icon fa fa-angle-double-right"></i> Common form create </small></h1>
</div>--><!-- /.page-header -->
<label for="">
    <a href="<?php echo base_url().'manage_users'?>" class="btn btn-primary btn-sm"><i class="fa fa-backward"></i> ត្រលប់ក្រោយ</a>
</label>
<br/>
<br/>
<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<?php
			$this->load->view('backend/notification/index.php');
		?>
		<form class="form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>manage_users/create_user">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="username"> ឈ្មោះគណនីយប្រើប្រាស់:<span class="required">*</span></label>

				<div class="col-sm-9">
					<input type="text" id="username" name="username" placeholder="ឈ្មោះគណនីយប្រើប្រាស់" class="col-xs-10 col-sm-5" required="required" />
					<?php echo form_error('username'); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="email"> អ៊ីម៉ែល: </label>

				<div class="col-sm-9">
					<input type="text" id="email" name="email" placeholder="អ៊ីម៉ែល" class="col-xs-10 col-sm-5"/>
					<?php echo form_error('email'); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="phone"> លេខទូរស័ព្ទ: <span class="required">*</span></label>

				<div class="col-sm-9">
					<input type="text" id="phone" name="phone" placeholder="លេខទូរស័ព្ទ" class="col-xs-10 col-sm-5" required="required"/>
					
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="address">អាស័យដ្ឋាន:</label>

				<div class="col-sm-9">
					<textarea name="address" rows="6" class="col-xs-10 col-sm-5"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="password">លេខកូដសំងាត់:<span class="required">*</span></label>

				<div class="col-sm-9">
					<input type="password" id="password" name="password" class="col-xs-10 col-sm-5" required="required" placeholder="លេខកូដសំងាត់"/>
					<?php echo form_error('password'); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="conf_password">ផ្ទៀងផ្ទាតលេខកូដសំងាត់:<span class="required">*</span></label>

				<div class="col-sm-9">
					<input type="password" id="conf_password" name="conf_password" class="col-xs-10 col-sm-5" required="required" placeholder="ផ្ទៀងផ្ទាតលេខកូដសំងាត់"/>
					<?php echo form_error('conf_password'); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="role"> មុខងារ:<span class="required">*</span></label>

				<div class="col-sm-9">
					<select name="role" class="col-xs-10 col-sm-5">
						<option value="0">--ជ្រើសរើសមុខងារ--</option>
						<?php
							foreach($roles->result() as $row){
						?>
								<option value="<?php echo $row -> role_id; ?>"><?php echo $row -> name; ?></option>
						<?php
						}
						?>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="status"> ស្ថានការណ៏:</label>

				<div class="col-sm-9">
					<select name="status" class="col-xs-10 col-sm-5">
						<option value="1">ប្រើ</option>
						<option value="0">មិនប្រើ</option>
					</select>
				</div>
			</div>
			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<button class="btn btn-info" type="submit">
						<i class="ace-icon fa fa-check bigger-110"></i>រក្សារទុក
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