<div class="row">&nbsp;</div>
<a href="<?php echo base_url();?>manage_attendants" class="btn btn-primary btn-sm"><i class="fa fa-backward"></i> បញ្ជីវត្តមាន</a>&nbsp;
<a href="<?php echo base_url();?>manage_attendants/create_attendant" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> បង្កើតថ្មី</a>
<br/>
<br/>
<form class="form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>manage_attendants/update_attendant/<?php echo $this->uri->segment(3);?>">
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
												<select class="chosen-select form-control" id="use_programme_id" data-placeholder="សូមជ្រើសរើស..." name="use_programme_id">
												
													<option value="">  </option>
													<?php
														foreach($programmes->result() as $row){
													?>
													<option value="<?php echo $row -> id; ?>" <?php echo ($monk->row()->use_programme_id == $row->id)? 'selected':'';?>><?php echo $row -> name; ?></option>
													<?php
													}
													?>
												</select>
												<?php echo form_error('use_programme_id'); ?>
											</div>
										</div>
										
										<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="date"> ថ្ងៃទី :<span class="required">*</span></label>

										<div class="col-sm-7">
											<div class="input-group">
												<input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" name="date" class="col-xs-10 col-sm-9" value="<?php echo date("d-m-Y", strtotime($monk->row()->date));?>"/>
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
											<select class="chosen-select form-control" id="times" data-placeholder="សូមជ្រើសរើស..." name="times">
											
												
												<option value="">  </option>
													<option value="morning" <?php echo ($monk->row()->times == 'morning')? 'selected':'';?>>ព្រឹក</option>
													<option value="evening" <?php echo ($monk->row()->times == 'evening')? 'selected':'';?>>ល្ងាច</option>
													<option value="full day" <?php echo ($monk->row()->times == 'full day')? 'selected':'';?>>ពេញមួយថ្ងៃ</option>
											</select>
											<?php echo form_error('times'); ?>
											<input type="hidden" name="monk_id" value="<?php echo $monk->row()->use_monk_id;?>"/>
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
					foreach($monk->result() as $row){
						
						if($row->status==1){
							$class="success";
							$status="Active";
						}else{
							$class="warning";
							$status="Inactive";
						}
						
						$present = $row->present;
						if($present==1){
							$checked ="checked";
						}else{
							$checked ="";
						}
						$leave = $row->is_take_leave;
						if($leave==1){
							$lchecked ="checked";
						}else{
							$lchecked ="";
						}
				?>
						<tr>

                            <td class="center">
                                <label class="attendants">
                                    <input type="checkbox" class="ace attendant_check"
                                           id="attendant-<?php echo $row->id;?>" value="1"
                                           name="attendants" <?php echo $checked;?>/>
                                    <span class="lbl"></span>
                                </label>
                            </td>
                            <td class="center">
                                <label class="take_leaves">
                                    <input type="checkbox" class="ace take_leaves_check"
                                           id="leaves-<?php echo $row->id;?>" value="1"
                                           name="take_leaves" <?php echo $lchecked;?>/>
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