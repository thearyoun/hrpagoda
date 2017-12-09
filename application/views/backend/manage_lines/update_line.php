<?php
	if($line_data->num_rows()==1){
		$id=$line_data->row()->id;
		$name=$line_data->row()->name;
		$description=$line_data->row()->description;
		$status=$line_data->row()->status;
		
	}else{
		redirect('manage_lines');
	}
?>
<!--<div class="page-header">
	<h1> Form line <small> <i class="ace-icon fa fa-angle-double-right"></i> Common form create </small></h1>
</div>--><!-- /.page-header -->
<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<?php
			$this->load->view('backend/notification/index.php');
		?>
		<form class="form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>manage_lines/update_line/<?php echo $id;?>">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="name"><?php echo $this->lang->line('fm_name');?> <span class="required">*</span></label>

				<div class="col-sm-9">
					<input type="text" id="name" name="name" placeholder="Name" class="col-xs-10 col-sm-5" required="required" value="<?php echo $name;?>"/>
					<?php echo form_error('name'); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="description"><?php echo $this->lang->line('fm_description');?></label>

				<div class="col-sm-9">
					<input type="text" id="description" name="description" placeholder="Description" class="col-xs-10 col-sm-5" value="<?php echo $description;?>"/>
					<?php echo form_error('description'); ?>
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