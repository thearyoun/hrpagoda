<?php
	if($house_data->num_rows()==1){
		$id=$house_data->row()->id;
		$name=$house_data->row()->name;
		$description=$house_data->row()->description;
		$status=$house_data->row()->status;
		
	}else{
		redirect('manage_houses');
	}
?>
<a href="<?php echo base_url();?>manage_houses"​ class="btn btn-primary btn-sm">
    <i class="fa fa-backward"></i> បញ្ជីកុដិ
</a>
<a href="<?php echo base_url();?>manage_houses/create_house"​ class="btn btn-primary btn-sm">
    <i class="fa fa-plus"></i> បន្ថែមថ្មី
</a>
<br /><br />
<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<?php
			$this->load->view('backend/notification/index.php');
		?>
		<form class="form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>manage_houses/update_house/<?php echo $id;?>">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="name">ឈ្មោះកុដិ:<span class="required">*</span></label>

				<div class="col-sm-9">
					<input type="text" id="name" name="name" placeholder="ឈ្មោះកុដិ" class="col-xs-10 col-sm-5" required="required" value="<?php echo $name;?>"/>
					<?php echo form_error('name'); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="description">ការពណ៍នា:</label>

				<div class="col-sm-9">
					<input type="text" id="description" name="description" placeholder="ការពណ៍នា" class="col-xs-10 col-sm-5" value="<?php echo $description;?>"/>
					<?php echo form_error('description'); ?>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="status">ស្ថានភាព:</label>

				<div class="col-sm-9">
					<select name="status" class="col-xs-10 col-sm-5">
						<option value="1" <?php echo ($status==1)? 'selected':'';?>>ប្រើ</option>
						<option value="0" <?php echo ($status==0)? 'selected':'';?>>មិនប្រើ</option>
					</select>
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