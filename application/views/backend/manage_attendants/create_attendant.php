<div class="col-xs-12">&nbsp;</div>
<div class="col-xs-12">
	<form class="form-horizontal" action="<?php echo base_url().'manage_attendants/create_attendant'; ?>" method="post">
			<div class="col-sm-12">
				<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="type"> ប្រភេទ :</label>
						<div class="col-sm-6">
								<select class="col-sm-7" name="type">
									<option value="1" <?php echo ($type==1?"selected":"")?>>ព្រះសង្ឃ</option>
									<option value="2" <?php echo ($type==2?"selected":"")?>>គ្រហស្ថ</option>
								</select>
						</div>
				</div>
				<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="house_no"> កុដិលេខ :</label>
						<div class="col-sm-6">
								<select class="col-sm-7" name="house_no">
										<option value="">--សូមជ្រើសរើស--</option>
										<?php
											foreach ($house->result() as $val_house) {
												echo "<option value='".$val_house->id."' ".($house_no==$val_house->id?"selected":"").">".$val_house->name."</option>";
											}
										?>
								</select>
						</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2">&nbsp;</label>
					<div class="col-sm-2">
						<input type="submit" class="btn btn-primary btn-sm" name="search" value="ស្វែងរក">
						<?php if($house_no!=""):?>
						<a href="<?php echo base_url().'manage_attendants/clear_create_search';?>" class="btn btn-danger btn-sm">សំអាត</a>
					<?php endif;?>
					</div>
				</div>
			</div>
	</form>
</div>

<div class="row">&nbsp;</div>
<a href="<?php echo base_url();?>manage_attendants" class="btn btn-primary btn-sm"><i class="fa fa-backward"></i> បញ្ជីវត្តមាន</a>
<br/>
<br/>

<form class="form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>manage_attendants/save_attendant">
	<div class="row">
		<div class="col-sm-12">
			<?php
			$this -> load -> view('backend/notification/index.php');
			?>
			<div class="widget-box">
				<div class="widget-header">
					<h4 class="smaller"> ការគ្រប់គ្រងវត្តមាន</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main">
						<div class="widget-body">
							<div class="row">
								<div class="col-sm-6">
									<div class="widget-main no-padding">
										<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="use_programme_id"> កម្មវីធី :<span class="required">*</span></label>
											<div class="col-sm-7">
												<select class="chosen-select form-control" id="use_programme_id" data-placeholder="សូមជ្រើសរើស..." name="use_programme_id" required>
													<option value="">  </option>
													<?php
														foreach($programmes->result() as $row){
													?>
													<option value="<?php echo $row -> id; ?>" <?php echo set_select('use_programme_id', $row -> id); ?>><?php echo $row -> name; ?></option>
													<?php
													}
													?>
												</select>
												<input type="hidden" name="type" value="<?php echo $type;?>">
												<?php echo form_error('use_programme_id'); ?>
											</div>
										</div>
										<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="date"> ថ្ងៃទី :<span class="required">*</span></label>
										<div class="col-sm-7">
											<div class="input-group">
												<input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" name="date" class="col-xs-10 col-sm-9" value="<?php echo set_value('date'); ?>" required/>
												<span class="input-group-addon">
													<i class="fa fa-calendar bigger-110"></i>
												</span>
											</div>
											<?php echo form_error('date'); ?>
										</div>
									</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="times"> វេន :<span class="required">*</span></label>
										<div class="col-sm-7">
											<select class="chosen-select form-control" id="times" data-placeholder="សូមជ្រើសរើស..." name="times" required>
												<option value="">  </option>
													<option value="morning" <?php echo set_select('times', "morning"); ?>>ព្រឹក</option>
													<option value="evening" <?php echo set_select('times', "evening"); ?>>ល្ងាច</option>
													<option value="full day" <?php echo set_select('times',"full day"); ?>>ពេញមួយថ្ងៃ</option>
											</select>
											<?php echo form_error('times'); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- /.col -->
	</div><!-- /.row -->
	<br />
	<div class="row">
	<div class="col-xs-12">
		<table id="sample-table-7" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center"><label class="attendants">
						<input type="checkbox" class="ace attendant_all"/>
						<span class="lbl"></span>អត់ច្បាប់</label>
					</th>
					<th class="center">
						<label class="take_leaves">
						<input type="checkbox" class="ace take_leaves_all" />
						<span class="lbl"></span>មានច្បាប់</label>
					</th>
					<th><?php echo $this -> lang -> line(''); ?>ភិក្ខុឈ្មោះ</th>
					<th><?php echo $this -> lang -> line(''); ?>កុដិលេខ</th>
					<th><?php echo $this -> lang -> line(''); ?>ជនជាតិ</th>
					<th><?php echo $this -> lang -> line(''); ?>លេខទូរស័ព្ទ</th>
					<th><?php echo $this -> lang -> line(''); ?>មកពីខេត្ត</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$i=0;
					foreach($monks->result() as $row){
						if($row->status==1){
							$class="success";
							$status="Active";
						}else{
							$class="warning";
							$status="Inactive";
						}

						if(get_monk_take_leaves($row->id,$type) !=FALSE){
							$style ="background-color:#FFFF00;color:#000000";
						}else{
							$style='';
						}
				?>
						<tr style="<?php echo $style;?>">
							<td class="center">
								<label class="attendants">
								<input type="checkbox" class="ace attendant_check" id="attendant-<?php echo $row->id;?>" value="<?php echo $row->id;?>" name="attendants[]"/>
								<span class="lbl"></span>
								</label>
							</td>
							<td class="center">
								<label class="take_leaves">
									<input type="checkbox" class="ace take_leaves_check" id="leaves-<?php echo $row->id;?>" value="<?php echo $row->id;?>" name="take_leaves[]"/>
									<span class="lbl"></span>
								</label>
							</td>
							<td><?php echo $row -> username; ?></td>
							<td><?php echo $row -> house_name; ?></td>
							<td><?php echo $row -> nation; ?></td>
							<td><?php echo $row -> phone_number; ?></td>
							<td><?php echo $row -> location_name; ?></td>
						</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div><!-- /.span -->
</div><!-- /.row -->

	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix form-actions">
				<div class="col-md-offset-5 col-md-7">
					<button class="btn btn-info" type="submit">
						<i class="ace-icon fa fa-check bigger-110"></i>
						រក្សាទុក
					</button>

					&nbsp; &nbsp; &nbsp;
					<button class="btn" type="reset">
						<i class="ace-icon fa fa-undo bigger-110"></i>
						ធ្វើសារដើម
					</button>
				</div>
			</div>
		</div>
	</div>
</form>
