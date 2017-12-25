<label>
  <a href="<?php echo base_url();?>manage_monks/manage_monks"  class="btn btn-primary btn-sm"><i class="fa fa-backward"></i>ត្រលប់ក្រោយ</a>
  <a href="<?php echo base_url();?>manage_monks/create_monk" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>បន្ថែមថ្មី</a>
</label>
<form class="form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>manage_monks/update_monk/<?php echo $this -> uri -> segment(3); ?>" enctype="multipart/form-data">
	<div class="row">
			<div class="col-sm-12">
					<?php
					$this->load->view('backend/notification/index.php');
					?>
					<div class="widget-box">
							<div class="widget-header">
									<h4 class="smaller"> ព័ត៌មានផ្ទាល់ខ្លួនរបស់ព្រះសង្ឃ</h4>
							</div>
							<div class="widget-body">
									<div class="widget-main">
											<div class="widget-body">
													<div class="row">
															<div class="col-sm-6">
																	<div class="widget-main no-padding">
																			<div class="form-group">
																					<label class="col-sm-4 control-label no-padding-right" for="username"> ឈ្មោះ
																							:<span class="required">*</span></label>
																					<div class="col-sm-8">
																							<input type="text" id="username" name="username" required
																										 class="col-xs-10 col-sm-9"
																										 value="<?php echo $monk->row()->username; ?>"/>
																							<?php echo form_error('username'); ?>
																					</div>
																			</div>
																			<div class="form-group">
																					<label class="col-sm-4 control-label no-padding-right" for="eng_name">
																							ឈ្មោះជាអក្សរឡាតាំង :<span class="required">*</span></label>
																					<div class="col-sm-8">
																							<input type="text" id="eng_name" name="eng_name" required
																										 class="col-xs-10 col-sm-9"
																										 value="<?php echo $monk->row()->eng_name; ?>"/>
																							<?php echo form_error('eng_name'); ?>
																					</div>
																			</div>
																			<div class="form-group">
																					<label class="col-sm-4 control-label no-padding-right" for="nick_name">
																							នាមបញ្ញត្តិ :<span class="required">*</span></label>
																					<div class="col-sm-8">
																							<input type="text" id="nick_name" name="nick_name" required
																										 class="col-xs-10 col-sm-9"
																										 value="<?php echo $monk->row()->nick_name; ?>"/>
																							<?php echo form_error('nick_name'); ?>
																					</div>
																			</div>
																			<div class="form-group">
																					<label class="col-sm-4 control-label no-padding-right" for="nationality">
																							សញ្ជាតិ :<span class="required">*</span></label>

																					<div class="col-sm-8">
																							<input type="text" id="nationality" name="nationality" required
																										 class="col-xs-10 col-sm-9"
																										 value="<?php echo $monk->row()->nationality; ?>"/>
																							<?php echo form_error('nationality'); ?>
																					</div>
																			</div>
																			<div class="form-group">
																					<label class="col-sm-4 control-label no-padding-right" for="nation"> ជនជាតិ
																							:<span class="required">*</span></label>
																					<div class="col-sm-8">
																							<input type="text" id="nation" name="nation" required
																										 class="col-xs-10 col-sm-9"
																										 value="<?php echo $monk->row()->nation; ?>"/>
																							<?php echo form_error('nation'); ?>
																					</div>
																			</div>
																			<div class="form-group">
																					<label class="col-sm-4 control-label no-padding-right" for="date_of_birth"> ថ្ងៃ
																							ខែ ឆ្នាំកំណើត :<span class="required">*</span></label>
																					<div class="col-sm-7">
																							<div class="input-group">
																									<input class="form-control date-picker" required
																												 type="text" data-date-format="dd-mm-yyyy" name="date_of_birth"
																												 class="col-xs-10 col-sm-9"
																												 value="<?php echo date("d-m-Y", strtotime($monk->row()->date_of_birth)); ?>"/>
																									<span class="input-group-addon">
																											<i class="fa fa-calendar bigger-110"></i>
																								 </span>
																							</div>
																							<?php echo form_error('date_of_birth'); ?>
																					</div>
																			</div>
																			<div class="form-group">
																					<label class="col-sm-4 control-label no-padding-right" for="place_of_birth">
																							ទីកន្លែងកំណើត :<span class="required">*</span></label>

																					<div class="col-sm-8">
																							<input type="text" id="place_of_birth" name="place_of_birth"
																										 required class="col-xs-10 col-sm-9"
																										 value="<?php echo $monk->row()->place_of_birth; ?>"/>
																							<?php echo form_error('place_of_birth'); ?>
																					</div>
																			</div>
																			<div class="form-group">
																					<label class="col-sm-4 control-label no-padding-right"
																								 for="current_address"> អាសយដ្ឋានបច្ចុប្បន្ន :<span
																											class="required">*</span></label>
																					<div class="col-sm-8">
																							<textarea name="current_address" id="current_address" rows="2" cols="80" required class="col-xs-10 col-sm-9"><?php echo $monk->row()->current_address; ?></textarea>
																							<?php echo form_error('current_address'); ?>
																					</div>
																			</div>
																			<div class="form-group">
																					<label class="col-sm-4 control-label no-padding-right" for="phone_number">
																							លេខទូរស័ព្ទ :<span class="required">*</span></label>
																					<div class="col-sm-8">
																							<input type="text" id="phone_number" name="phone_number" required
																										 class="col-xs-10 col-sm-9"
																										 value="<?php echo $monk->row()->phone_number; ?>"/>
																							<?php echo form_error('phone_number'); ?>
																					</div>
																			</div>
																			<div class="form-group">
																					<label class="col-sm-4 control-label no-padding-right" for="education">
																							កំរិតវប្បធម៌ :</label>
																					<div class="col-sm-7">
																							<select class="col-xs-10 col-sm-9 knowledge chosen-select" name="education" id="education" data-placeholder="កំរិតវប្បធម៌...">
																									<option value=""></option>
																									<?php
																										foreach (monk_knowledge() as $key_edu => $val_edu) {
																											if($key_edu==$monk->row()->education){
																												$edu_selected ="selected";
																											}else{
																												$edu_selected="";
																											}
																											echo "<option value='".$key_edu."' ".$edu_selected.">".$val_edu."</option>";
																										}
																									?>
																							</select>
																							<?php echo form_error('education'); ?>
																					</div>
																			</div>
																			<div class="form-group grade">
																					<label class="col-sm-4 control-label no-padding-right" for="grade">
																							ថ្នាក់ :</label>
																					<div class="col-sm-7">
																							<select class="col-xs-10 col-sm-9 chosen-select grade-data" name="grade" id="grade" data-placeholder="ថ្នាក់...">
																									<option value=""></option>
																									<?php
																										foreach (grade($monk->row()->grade) as $grade_key => $grade_value) {
																											  if($monk->row()->grade==$grade_key){
																													$grade_select = "selected";
																												}else{
																													$grade_select="";
																												}
																											echo "<option value='".$grade_key."' ".$grade_select.">".$grade_value."</option>";
																										}
																									?>
																							</select>
																							<?php echo form_error('grade'); ?>
																					</div>
																			</div>
																			<div class="form-group">
																					<label class="col-sm-4 control-label no-padding-right" for="job">
																							ការងារបច្ចុប្បន្ន:<span class="required">*</span></label>
																					<div class="col-sm-7">
																							<select name="jop" id="job" class="col-xs-10 col-sm-9 chosen-select" data-placeholder="ប្រភេទការងារ" required>
																									<option value=""></option>
																									<?php
																									foreach (job_category() as $job_id =>$value) {
																										if($monk->row()->jop_type==$job_id){
																											$job_select = "selected";
																										}else{
																											$job_select="";
																										}
																											echo "<option value='" . $job_id . "' ".$job_select.">" . $value . "</option>";
																									}
																									?>
																							</select>
																							<?php echo form_error('job'); ?>
																					</div>
																			</div>
																			<div class="form-group">
																					<label class="col-sm-4 control-label no-padding-right" for="work_position">
																							មុខតំណែងក្នុងការងារ :<span class="required">*</span></label>
																					<div class="col-sm-8">
																							<input type="text" id="work_position" name="work_position"
																										 class="col-xs-10 col-sm-9" required value="<?php echo $monk->row()->job_position;?>"/>
																							<?php echo form_error('work_position'); ?>
																					</div>
																			</div>
																			<div class="form-group">
																					<label class="col-sm-4 control-label no-padding-right" for="workplace">
																							ឈ្មោះកន្លែងការងារ :<span class="required">*</span></label>
																					<div class="col-sm-8">
																							<input type="text" id="workplace" name="workplace"
																										 class="col-xs-10 col-sm-9" required value="<?php echo $monk->row()->company_name;?>"/>
																							<?php echo form_error('workplace'); ?>
																					</div>
																			</div>
																			<div class="form-group">
																					<label class="col-sm-4 control-label no-padding-right" for="work_address">
																							អាសយដ្ឋាននៃការងារ :<span class="required">*</span></label>
																					<div class="col-sm-8">
																						<textarea name="work_address" rows="3" id="work_address" class="col-xs-10 col-sm-9" required><?php echo $monk->row()->company_address;?></textarea>
																							<?php echo form_error('work_address'); ?>
																					</div>
																			</div>
																			<div class="form-group">
																					<label class="col-sm-4 control-label no-padding-right" for="user_account">
																							ឈ្មោះគណនី:<span class="required">*</span></label>
																					<div class="col-sm-8">
																							<input type="text" id="user_account" name="user_account" required
																										 class="col-xs-10 col-sm-9"
																										 value="<?php echo $monk->row()->user_account;?>"/>
																							<?php echo form_error('user_account'); ?>
																					</div>
																			</div>
																			<div class="form-group">
																					<label class="col-sm-4 control-label no-padding-right" for="user_password">
																							លេខកូដសម្ងាត់ :<span class="required">*</span></label>
																					<div class="col-sm-8">
																							<input type="password" id="user_password" name="user_password"
																										 class="col-xs-10 col-sm-9"/>
																										 <input type="hidden" name="old_password" value="<?php echo $monk->row()->user_password;?>"/>
																							<?php echo form_error('user_password'); ?>
																					</div>
																			</div>
																	</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group">
																		<label class="col-sm-4 control-label no-padding-right" for="vegetarian_place">
																				គង់នៅវត្ត :<span class="required">*</span></label>
																		<div class="col-sm-8">
																				<input type="text" id="vegetarian_place" name="vegetarian_place"
																							 required class="col-xs-10 col-sm-9"
																							 value="<?php echo $monk->row()->vegetarian_place;?>"/>
																				<?php echo form_error('vegetarian_place'); ?>
																		</div>
																</div>
																<div class="form-group">
																		<label class="col-sm-4 control-label no-padding-right" for="current_provice">
																				នៅខេត្ត :<span class="required">*</span></label>
																		<div class="col-sm-7">
																				<select class="chosen-select form-control" id="current_provice"
																								data-placeholder="ជ្រើសរើសខេត្ត..." name="current_provice" required>
																						<option value=""></option>
																						<?php
																						foreach ($locations->result() as $row) {
																							if($row->id==$monk->row()->current_province){
																								$current_pro_select = "selected";
																							}else{
																								$current_pro_select="";
																							}
																								?>
																								<option value="<?php echo $row->id; ?>" <?php echo set_select('use_location_id', $row->id); ?> <?php echo $current_pro_select;?>><?php echo $row->name; ?></option>
																								<?php
																						}
																						?>
																				</select>
																				<?php echo form_error('current_provice'); ?>
																		</div>
																</div>
																<div class="form-group">
																		<label class="col-sm-4 control-label no-padding-right" for="current_district">
																				នៅស្រុក :</label>
																		<div class="col-sm-7">
																				<select class="chosen-select form-control" id="current_district"
																								data-placeholder="ជ្រើសរើសស្រុក..." name="current_district">
																						<option value=""></option>
																						<?php
																							foreach ($current_district->result() as $row_dis) {
																								if($row_dis->id==$monk->row()->current_district){
																										$cur_dis_sel="selected";
																								}else{
																										$cur_dis_sel="";
																								}
																								echo "<option value='".$row_dis->id."' ".$cur_dis_sel.">".$row_dis->name."</option>";
																							}
																						?>
																				</select>
																				<?php echo form_error('current_district'); ?>
																		</div>
																</div>
																<div class="form-group">
																		<label class="col-sm-4 control-label no-padding-right" for="current_commune">
																				នៅឃុំ :</label>
																		<div class="col-sm-7">
																				<select class="chosen-select form-control" id="current_commune"
																								data-placeholder="ជ្រើសរើសឃុំ..." name="current_commune">
																						<option value=""></option>
																						<?php
																							foreach ($current_communes->result() as $value_com) {
																								if($value_com->id==$monk->row()->current_commune){
																										$cur_com_sel="selected";
																								}else{
																										$cur_com_sel="";
																								}
																								echo "<option value='".$value_com->id."' ".$cur_com_sel.">".$value_com->name."</option>";
																							}
																						?>
																				</select>
																				<?php echo form_error('current_commune'); ?>
																		</div>
																</div>
																<div class="form-group">
																		<label class="col-sm-4 control-label no-padding-right" for="current_village">
																				នៅភូមិ :</label>
																		<div class="col-sm-7">
																				<select class="chosen-select form-control" id="current_village"
																								data-placeholder="ជ្រើសរើសភូមិ..." name="current_village">
																						<option value=""></option>
																						<?php
																							foreach ($current_villages->result() as $value_vil) {
																								if($value_vil->id==$monk->row()->current_village){
																										$cur_vil_sel="selected";
																								}else{
																										$cur_vil_sel="";
																								}
																								echo "<option value='".$value_vil->id."' ".$cur_vil_sel.">".$value_vil->name."</option>";
																							}
																						?>
																				</select>
																				<?php echo form_error('village_id'); ?>
																		</div>
																</div>
																<div class="form-group">
																		<label class="col-sm-4 control-label no-padding-right"
																					 for="vegetarian_date"> ថ្ងៃ ខែ ឆ្នាំបួស :<span
																								class="required">*</span></label>
																		<div class="col-sm-7">
																				<div class="input-group">
																						<input class="form-control date-picker"  required
																									 type="text" data-date-format="dd-mm-yyyy"
																									 name="vegetarian_date" class="col-xs-10 col-sm-9"
																									 value="<?php echo date("m-d-Y",strtotime($monk->row()->vegetarian_date)); ?>"/>
																						<span class="input-group-addon">
																							<i class="fa fa-calendar bigger-110"></i>
																						</span>
																				</div>
																				<?php echo form_error('vegetarian_date'); ?>
																		</div>
																</div>
																<div class="form-group">
																		<label class="col-sm-4 control-label no-padding-right"
																					 for="vegetarian_year"> បួសបាន :<span
																								class="required">*</span></label>
																		<div class="col-sm-8">
																				<input type="text" id="vegetarian_year" name="vegetarian_year"
																							 required class="col-xs-10 col-sm-9"
																							 value="<?php echo $monk->row()->vegetarian_year; ?>"/>
																				<?php echo form_error('vegetarian_year'); ?>
																		</div>
																</div>
																<div class="form-group">
																		<label class="col-sm-4 control-label no-padding-right"
																					 for="vegetarian_types"> ភិក្ខុ ឬ សាមណេរ :<span
																								class="required">*</span></label>
																		<div class="col-sm-7">
																				<select class="chosen-select" id="vegetarian_types" required
																								data-placeholder="ជ្រើសរើសប្រភេទ..." name="vegetarian_types">
																						<option value=""></option>
																						<?php
																						foreach ($member_types->result() as $row) {
																							if($row->id==$monk->row()->vegetarian_types){
																									$veg_type="selected";
																							}else{
																								 $veg_type="";
																							}
																								?>
																								<option value="<?php echo $row->id; ?>" <?php echo set_select('vegetarian_types', $row->id); ?> <?php echo $veg_type;?>><?php echo $row->name; ?></option>
																								<?php
																						}
																						?>
																				</select>
																				<?php echo form_error('vegetarian_types'); ?>
																		</div>
																</div>
																<div class="form-group">
																		<label class="col-sm-4 control-label no-padding-right" for="monk_number">
																				លេខឆាយា :</label>
																		<div class="col-sm-8">
																				<input type="text" id="monk_number" name="monk_number"
																							 class="col-xs-10 col-sm-9"
																							 value="<?php echo $monk->row()->monk_number; ?>"/>
																				<?php echo form_error('monk_number'); ?>
																		</div>
																</div>
																	<div class="form-group">
																			<label class="col-sm-4 control-label no-padding-right" for="use_position_id">
																					មុខងារ :<span class="required">*</span></label>
																			<div class="col-sm-7">
																					<select class="chosen-select form-control" id="use_position_id" required
																									data-placeholder="ជ្រើសរើសមុខងារ..." name="use_position_id">
																							<option value=""></option>
																							<?php
																							foreach ($positions->result() as $row) {
																								if($row->id==$monk->row()->use_position_id){
																									$use_pos="selected";
																								}else{
																									$use_pos="";
																								}
																									?>
																									<option value="<?php echo $row->id; ?>" <?php echo set_select('use_position_id', $row->id); ?> <?php echo $use_pos;?>><?php echo $row->name; ?></option>
																									<?php
																							}
																							?>
																					</select>
																					<?php echo form_error('use_position_id'); ?>
																			</div>
																	</div>
																	<div class="form-group">
																			<label class="col-sm-4 control-label no-padding-right"
																						 for="from_pagoda"> និមន្ដមកពីវត្ត :<span
																									class="required">*</span></label>
																			<div class="col-sm-8">
																					<input type="text" id="from_pagoda" name="from_pagoda"
																								 class="col-xs-10 col-sm-9"
																								 required="required"
																								 value="<?php echo $monk->row()->from_pagoda; ?>"/>
																					<?php echo form_error('from_pagoda'); ?>
																			</div>
																	</div>
																	<div class="form-group">
																			<label class="col-sm-4 control-label no-padding-right" for="use_location_id">
																					មកពីខេត្ត :<span class="required">*</span></label>
																			<div class="col-sm-7">
																					<select class="chosen-select form-control" id="use_location_id"
																									data-placeholder="ជ្រើសរើសខេត្ត..." name="use_location_id" required>
																							<option value=""></option>
																							<?php
																							foreach ($locations->result() as $row) {
																									if($row->id==$monk->row()->use_location_id){
																										$use_lo="selected";
																									}else{
																										$use_lo="";
																									}
																									?>
																									<option value="<?php echo $row->id; ?>" <?php echo set_select('use_location_id', $row->id); ?> <?php echo $use_lo;?>><?php echo $row->name; ?></option>
																									<?php
																							}
																							?>
																					</select>
																					<?php echo form_error('use_location_id'); ?>
																			</div>
																	</div>
																	<div class="form-group">
																			<label class="col-sm-4 control-label no-padding-right" for="district_id">
																					មកពីស្រុក :</label>
																			<div class="col-sm-7">
																					<select class="chosen-select form-control" id="district_id"
																									data-placeholder="ជ្រើសរើសស្រុក..." name="district_id">
																							<option value=""></option>
																							<?php
																								foreach ($from_district->result() as $value_dis) {
																									if($value_dis->id==$monk->row()->distrinct_id){
																										$use_dis="selected";
																									}else{
																										$use_dis="";
																									}
																									echo "<option value='".$value_dis->id."' ".$use_dis.">".$value_dis->name."</option>";
																								}
																							?>
																					</select>
																					<?php echo form_error('district_id'); ?>
																			</div>
																	</div>
																	<div class="form-group">
																			<label class="col-sm-4 control-label no-padding-right" for="commune_id">
																					មកពីឃុំ :</label>
																			<div class="col-sm-7">
																					<select class="chosen-select form-control" id="commune_id"
																									data-placeholder="ជ្រើសរើសឃុំ..." name="commune_id">
																							<option value=""></option>
																							<?php
																							foreach ($from_communes->result() as $from_com) {
																								if($from_com->id==$monk->row()->commune_id){
																									$use_com="selected";
																								}else{
																									$use_com="";
																								}
																								echo "<option value='".$from_com->id."' ".$use_com.">".$from_com->name."</option>";
																							}
																							?>
																					</select>
																					<?php echo form_error('commune_id'); ?>
																			</div>
																	</div>
																	<div class="form-group">
																			<label class="col-sm-4 control-label no-padding-right" for="village_id">
																					មកពីភូមិ :</label>
																			<div class="col-sm-7">
																					<select class="chosen-select form-control" id="village_id"
																									data-placeholder="ជ្រើសរើសភូមិ..." name="village_id">
																							<option value=""></option>
																							<?php
																								foreach ($from_villages->result() as $from_vil) {
																									if($from_vil->id==$monk->row()->village_id){
																										$use_vil="selected";
																									}else{
																										$use_vil="";
																									}
																									echo "<option value='".$from_vil->id."' ".$use_vil.">".$from_vil->name."</option>";
																								}
																							?>
																					</select>
																					<?php echo form_error('village_id'); ?>
																			</div>
																	</div>
																	<div class="form-group">
																			<label class="col-sm-4 control-label no-padding-right" for="acknow_by">
																					ទទួលស្គាល់ដោយ :</label>
																			<div class="col-sm-8">
																					<input type="text" id="acknow_by" name="acknow_by" placeholder=""
																								 class="col-xs-10 col-sm-9"
																								 value="<?php echo $monk->row()->acknow_by; ?>"/>
																					<?php echo form_error('acknow_by'); ?>
																			</div>
																	</div>
																	<div class="form-group">
																			<label class="col-sm-4 control-label no-padding-right" for="use_house_id">
																					កុដិលេខ :<span class="required">*</span></label>
																			<div class="col-sm-7">
																					<select class="chosen-select form-control" id="use_house_id"
																									data-placeholder="ជ្រើសរើសកុដិ..." name="use_house_id" required>
																							<option value=""></option>
																							<?php
																							foreach ($houses->result() as $row) {
																									if($row->id==$monk->row()->use_house_id){
																											$house_se='selected';
																									}else{
																											$house_se='';
																									}
																									?>
																									<option value="<?php echo $row->id; ?>" <?php echo set_select('use_house_id', $row->id); ?> <?php echo $house_se;?>><?php echo $row->name; ?></option>
																									<?php
																							}
																							?>
																					</select>
																					<?php echo form_error('use_house_id'); ?>
																			</div>
																	</div>
																	<div class="form-group">
																			<label class="col-sm-4 control-label no-padding-right" for="group"> ក្រុម :<span
																									class="required">*</span></label>
																			<div class="col-sm-5">
																					<select class="chosen-select form-control" id="group"
																									data-placeholder="ជ្រើសរើសក្រុម..." name="group" required>
																							<option value=""></option>
																							<?php
																							foreach ($groups->result() as $row) {
																								if($monk_group_info->row()->use_group_id==$row->id){
																									$group_se ="selected";
																								}else{
																									$group_se="";
																								}
																							?>
																							<option value="<?php echo $row->id; ?>" <?php echo set_select('group', $row->id); ?> <?php echo $group_se;?>><?php echo $row->name; ?></option>
																							<?php
																							}
																							?>
																					</select>
																					<?php echo form_error('group'); ?>
																			</div>
																			<div class="col-sm-3">
																				 <?php
																				 		if($monk->row()->maser==1){
																							$checked="checked";
																						}else{
																							$checked="";
																						}
																				 ?>
																					<input type="checkbox" name="maser" id="maser" value="1" <?php echo $checked;?>>
																					<label>ប្រធានក្រុម</label>
																			</div>
																	</div>
																	<div class="form-group">
																			<label class="col-sm-4 control-label no-padding-right" for="photo">
																					ជ្រើសរើសរូបភាព :</label>
																			<div class="col-sm-7">
																					<input type="file" id="userfile" name="userfile"
																								 class="col-xs-10 col-sm-9"
																								 value="<?php echo $monk->row()->photo;?>"/>
																					<?php if (isset($errors)) {
																							foreach ($errors as $error) {
																									echo $error;
																							}
																					} ?>
																			</div>
																			<br/><br/>
																			<div class="col-sm-3">
																				<img src="<?php echo base_url().'ftemplate/images/'.$monk->row()->photo;?>"
																				title="<?php echo $monk->row()->username;?>"
																				alt="<?php echo $monk->row()->username;?>"
                                        style="width: 130px;margin-left: 347%;margin-top: -47%;" id="image_result"/>
																			</div>
																	</div>
															</div>
													</div>
													<div class="row"><a href="javascript:void(0)" class="btn btn-primary btn-sm add_language">បន្ថែមភាសាៈ</a></div>
													<div class="row data_language" style="margin-left:3%;">
														<?php
															if($monk_lang !=FALSE){
															foreach ($monk_lang->result() as $lang_val) {
														?>
														<div class="row parent-row">
															<div class="col-xs-12 col-sm-9 col-md-3">
																<div class="form-group">
																	<label for="language" class="control-label"><strong>ភាសា:</strong></label>
																	<div class="input-group col-sm-8">
																		<select name="language[]" class="form-control chosen-select" data-placeholder="ភាសា...">
																			<option value=""></option>
																			<?php
																				foreach ($langauges->result() as $lang_value) {
																					if($lang_value->id==$lang_val->lang_id){
																							$lang_se ="selected";
																					}else{
																							$lang_se="";
																					}
																					echo "<option value='".$lang_value->id."' ".$lang_se.">".$lang_value->name."</option>";
																				}
																			?>
																		</select>
																	</div>
																</div>
															</div>
															<div class="col-xs-12 col-sm-4 col-md-2 offset2">
																<div class="form-group">
																	<label for="read" class="control-label"><strong>អាន:</strong></label>
																	<div class="input-group col-sm-12">
																		<select name="read[]" class="form-control chosen-select" data-placeholder="អាន...">
																			<option value=""></option>
																			<?php
																				foreach (lavel_language() as $key_read => $value_read) {
																					if($key_read==$lang_val->reading){
																							$read_se ="selected";
																					}else{
																							$read_se="";
																					}
																					echo "<option value='".$key_read."' ".$read_se.">".$value_read."</option>";
																				}
																			?>
																		</select>
																	</div>
																</div>
															</div>
															<div class="col-xs-12 col-sm-4 col-md-2">
																<div class="form-group">
																	<label for="writing" class="control-label"><strong>សរសេរ:</strong></label>
																	<div class="input-group col-sm-12">
																		<select name="writing[]" class="form-control chosen-select" data-placeholder="សរសេរ...">
																			<option value=""></option>
																			<?php
																				foreach (lavel_language() as $key_writing => $value_writing) {
																					if($key_writing==$lang_val->writing){
																							$writing_se ="selected";
																					}else{
																							$writing_se="";
																					}
																					echo "<option value='".$key_writing."' ".$writing_se.">".$value_writing."</option>";
																				}
																			?>
																		</select>
																	</div>
																</div>
															</div>
															<div class="col-xs-12 col-sm-4 col-md-2">
																<div class="form-group">
																	<label for="listening" class="control-label"><strong>ស្តាប់:</strong></label>
																	<div class="input-group col-sm-12">
																		<select name="listening[]" class="form-control chosen-select" data-placeholder="ស្តាប់...">
																			<option value=""></option>
																			<?php
																				foreach (lavel_language() as $key_listening => $value_listening) {
																					if($key_listening==$lang_val->listening){
																							$listening_se ="selected";
																					}else{
																							$listening_se="";
																					}
																					echo "<option value='".$key_listening."' ".$listening_se.">".$value_listening."</option>";
																				}
																			?>
																		</select>
																	</div>
																</div>
															</div>
															<div class="col-xs-12 col-sm-4 col-md-2">
																<div class="form-group">
																	<label for="speaking" class="control-label"><strong>និយាយ:</strong><a href="javascript:void(0)" class="btn btn-danger btn-xs pull-right remove_lang" title="Remove" data-monk="<?php echo $monk_id;?>" data-lang="<?php echo $lang_val->lang_id;?>" data-id="<?php echo $lang_val->id?>" style="margin-left: 94px;margin-top: -8px;"><i class="ace-icon fa fa-trash-o bigger-130"></i></a></label>
																	<div class="input-group col-sm-12">
																		<select name="speaking[]" class="form-control chosen-select" data-placeholder="និយាយ...">
																			<option value=""></option>
																			<?php
																				foreach (lavel_language() as $key_speaking => $value_speaking) {
																					if($key_speaking==$lang_val->listening){
																							$speaking_se ="selected";
																					}else{
																							$speaking_se="";
																					}
																					echo "<option value='".$key_speaking."' ".$speaking_se.">".$value_speaking."</option>";
																				}
																			?>
																		</select>
																	</div>
																</div>
															</div>
														</div>
													<?php
  												}
  											}else{
												?>
												<div class="row parent-row">
													<div class="col-xs-12 col-sm-9 col-md-3">
														<div class="form-group">
															<label for="language" class="control-label"><strong>ភាសា:</strong></label>
															<div class="input-group col-sm-8">
																<select name="language[]" id="language" class="form-control chosen-select" data-placeholder="ភាសា...">
																	<option value=""></option>
																	<?php
																		foreach ($langauges->result() as $lang_value) {
																			echo "<option value='".$lang_value->id."' ".$lang_se.">".$lang_value->name."</option>";
																		}
																	?>
																</select>
															</div>
														</div>
													</div>
													<div class="col-xs-12 col-sm-4 col-md-2 offset2">
														<div class="form-group">
															<label for="read" class="control-label"><strong>អាន:</strong></label>
															<div class="input-group col-sm-12">
																<select name="read[]" id="read" class="form-control chosen-select" data-placeholder="អាន...">
																	<option value=""></option>
																	<?php
																		foreach (lavel_language() as $key_read => $value_read) {
																			echo "<option value='".$key_read."'>".$value_read."</option>";
																		}
																	?>
																</select>
															</div>
														</div>
													</div>
													<div class="col-xs-12 col-sm-4 col-md-2">
														<div class="form-group">
															<label for="writing" class="control-label"><strong>សរសេរ:</strong></label>
															<div class="input-group col-sm-12">
																<select name="writing[]" id="writing" class="form-control chosen-select" data-placeholder="សរសេរ...">
																	<option value=""></option>
																	<?php
																		foreach (lavel_language() as $key_writing => $value_writing) {
																			echo "<option value='".$key_writing."'>".$value_writing."</option>";
																		}
																	?>
																</select>
															</div>
														</div>
													</div>
													<div class="col-xs-12 col-sm-4 col-md-2">
														<div class="form-group">
															<label for="listening" class="control-label"><strong>ស្តាប់:</strong></label>
															<div class="input-group col-sm-12">
																<select name="listening[]" id="listening" class="form-control chosen-select" data-placeholder="ស្តាប់...">
																	<option value=""></option>
																	<?php
																		foreach (lavel_language() as $key_listening => $value_listening) {
																			echo "<option value='".$key_listening."'>".$value_listening."</option>";
																		}
																	?>
																</select>
															</div>
														</div>
													</div>
													<div class="col-xs-12 col-sm-4 col-md-2">
													<div class="form-group">
														<label for="speaking" class="control-label"><strong>និយាយ:</strong>
															<a href="javascript:void(0)" class="btn btn-danger btn-xs pull-right remove_lang" title="Remove" data-monk="" data-lang="" style="margin-left: 94px;margin-top: -8px;"><i class="ace-icon fa fa-trash-o bigger-130"></i></a>
														</label>
														<div class="input-group col-sm-12">
															<select name="speaking[]" class="form-control chosen-select" data-placeholder="និយាយ...">
																<option value=""></option>
																<?php
																	foreach (lavel_language() as $key_speaking => $value_speaking) {
																		echo "<option value='".$key_speaking."'>".$value_speaking."</option>";
																	}
																?>
															</select>
														</div>
													</div>
												</div>
												</div>
												<?php
						           }
													?>
													</div>
											</div>
									</div>
							</div>
					</div>
			</div><!-- /.col -->

	</div><!-- /.row -->
	<hr/>
	<div class="row">
			<div class="col-sm-12">
					<div class="tabbable">
							<ul class="nav nav-tabs" id="myTab">
									<li class="active">
											<a data-toggle="tab" href="#monk_reference"> <i
																	class="green ace-icon fa fa-home bigger-120"></i> ព័ត៌មានព្រះឧបជ្ឈាយ៍ </a>
									</li>
							</ul>
							<div class="tab-content">
									<div id="home" class="tab-pane fade in active">
											<div class="widget-body">
													<div class="widget-main">
															<div class="widget-body">
																	<div class="row">
																			<div class="col-sm-6">
																					<div class="widget-main no-padding">
																							<div class="form-group">
																									<label class="col-sm-4 control-label no-padding-right"
																												 for="monk_reference"> ព្រះឧបជ្ឈាយ៍នាម :<span
																															class="required">*</span></label>
																									<div class="col-sm-8">
																											<input type="text" id="monk_reference" name="monk_reference"
																														 required class="col-xs-10 col-sm-9"
																														 value="<?php echo $monk->row()->monk_reference; ?>"/>
																											<?php echo form_error('monk_reference'); ?>
																									</div>
																							</div>
																							<div class="form-group">
																									<label class="col-sm-4 control-label no-padding-right"
																												 for="monk_reference_position"> មុខងារ :<span
																															class="required">*</span></label>
																									<div class="col-sm-8">
																											<input type="text" id="monk_reference_position"
																														 name="monk_reference_position" required
																														 class="col-xs-10 col-sm-9"
																														 value="<?php echo $monk->row()->monk_reference_position; ?>"/>
																											<?php echo form_error('monk_reference_position'); ?>
																									</div>
																							</div>
																							<div class="form-group">
																									<label class="col-sm-4 control-label no-padding-right"
																												 for="monk_current_address"> អាសយដ្ឋានបច្ចុប្បន្ន :<span
																															class="required">*</span></label>
																									<div class="col-sm-8">
																												<textarea id="monk_current_address" name="monk_current_address" required class="col-xs-10 col-sm-9">
																													<?php echo $monk->row()->monk_current_address; ?>
																												</textarea>
																											<?php echo form_error('monk_current_address'); ?>
																									</div>
																							</div>
																					</div>
																			</div>
																			<div class="col-sm-6">
																					<div class="form-group">
																							<label class="col-sm-4 control-label no-padding-right"
																										 for="monk_reference_phone"> លេខទូរស័ព្ទ :<span
																													class="required">*</span></label>
																							<div class="col-sm-8">
																									<input type="text" id="monk_reference_phone"
																												 name="monk_reference_phone" required
																												 class="col-xs-10 col-sm-9"
																												 value="<?php echo $monk->row()->monk_reference_phone; ?>"/>
																									<?php echo form_error('monk_reference_phone'); ?>
																							</div>
																					</div>
																					<div class="form-group">
																							<label class="col-sm-4 control-label no-padding-right" for="stay_date">​ស្នាក់នៅថ្ងៃ
																									:<span class="required">*</span></label>
																							<div class="col-sm-7">
																									<div class="input-group">
																											<input class="form-control date-picker" required
																														 type="text" data-date-format="dd-mm-yyyy"
																														 name="stay_date" class="col-xs-10 col-sm-9"
																														 value="<?php echo date("d-m-Y",strtotime($monk->row()->stay_date)); ?>"/>
																											<span class="input-group-addon">
																												<i class="fa fa-calendar bigger-110"></i>
																											</span>
																									</div>
																									<?php echo form_error('stay_date'); ?>
																							</div>
																					</div>
																			</div>
																	</div>
															</div>
													</div>
											</div>
									</div>
							</div>
					</div>
			</div>
	</div>
	<hr/>

	<div class="row">
			<div class="col-sm-12">
					<div class="tabbable">
							<ul class="nav nav-tabs" id="myTab">
									<li class="active">
											<a data-toggle="tab" href="#home"> <i class="green ace-icon fa fa-home bigger-120"></i>
													ព័ត៌មានគ្រួសាររបស់ព្រះសង្ឃ </a>
									</li>
							</ul>
							<div class="tab-content">
									<div id="home" class="tab-pane fade in active">
											<div class="widget-body">
													<div class="widget-main">
															<div class="widget-body">
																	<div class="row">
																			<div class="col-sm-6">
																					<div class="widget-main no-padding">
																							<div class="form-group">
																									<label class="col-sm-4 control-label no-padding-right"
																												 for="father_name"> ឪពុកឈ្មោះ :<span class="required">*</span></label>
																									<div class="col-sm-8">
																											<input type="text" id="father_name" name="father_name"
																															class="col-xs-10 col-sm-9"
																														 required="required"
																														 value="<?php echo $monk->row()->father_name; ?>"/>
																											<?php echo form_error('father_name'); ?>
																									</div>
																							</div>
																							<div class="form-group">
																									<label class="col-sm-4 control-label no-padding-right"
																												 for="father_phone"> លេខទូរស័ព្ទ :</label>

																									<div class="col-sm-8">
																											<input type="text" id="father_phone" name="father_phone"
																														 class="col-xs-10 col-sm-9"
																														 value="<?php echo $monk->row()->father_phone; ?>"/>
																											<?php echo form_error('father_phone'); ?>
																									</div>
																							</div>
																							<div class="form-group">
																									<label class="col-sm-4 control-label no-padding-right"
																												 for="mother_name"> ម្ដាយឈ្មោះ :<span
																															class="required">*</span></label>
																									<div class="col-sm-8">
																											<input type="text" id="mother_name" name="mother_name"
																														 class="col-xs-10 col-sm-9"
																														 required="required"
																														 value="<?php echo $monk->row()->mother_name; ?>"/>
																											<?php echo form_error('mother_name'); ?>
																									</div>
																							</div>
																							<div class="form-group">
																									<label class="col-sm-4 control-label no-padding-right"
																												 for="mother_phone"> លេខទូរស័ព្ទ :</label>
																									<div class="col-sm-8">
																											<input type="text" id="mother_phone" name="mother_phone"
																														 class="col-xs-10 col-sm-9"
																														 value="<?php echo $monk->row()->mother_phone; ?>"/>
																											<?php echo form_error('mother_phone'); ?>
																									</div>
																							</div>
																							<div class="form-group">
																									<label class="col-sm-4 control-label no-padding-right"
																												 for="number_of_bro_sis"> មានបងប្អូនចំនួន :<span
																															class="required">*</span></label>
																									<div class="col-sm-8">
																											<input type="text" id="number_of_bro_sis"
																														 name="number_of_bro_sis"
																														 class="col-xs-10 col-sm-9" required="required"
																														 value="<?php echo $monk->row()->number_of_bro_sis; ?>"/>
																											<?php echo form_error('number_of_bro_sis'); ?>
																									</div>
																							</div>
																							<div class="form-group">
																									<label class="col-sm-4 control-label no-padding-right"
																												 for="number_of_sister"> ស្រីចំនួន :</label>
																									<div class="col-sm-8">
																											<input type="text" id="number_of_sister" name="number_of_sister"
																														 class="col-xs-10 col-sm-9"
																														 value="<?php echo $monk->row()->number_of_sister; ?>"/>
																											<?php echo form_error('number_of_sister'); ?>
																									</div>
																							</div>
																					</div>
																			</div>
																			<div class="col-sm-6">
																					<div class="form-group">
																							<label class="col-sm-4 control-label no-padding-right"
																										 for="father_occupation"> មុខរបរ :<span class="required">*</span></label>
																							<div class="col-sm-8">
																									<input type="text" id="father_occupation" name="father_occupation"
																												 class="col-xs-10 col-sm-9" required="required"
																												 value="<?php echo $monk->row()->father_occupation; ?>"/>
																									<?php echo form_error('father_occupation'); ?>
																							</div>
																					</div>
																					<div class="form-group">
																							<label class="col-sm-4 control-label no-padding-right"
																										 for="father_address"> អាស័យដ្ឋានបច្ចុប្បន្ន :<span
																													class="required">*</span></label>

																							<div class="col-sm-8">
																									<input type="text" id="father_address" name="father_address"
																												 class="col-xs-10 col-sm-9" required="required"
																												 value="<?php echo $monk->row()->father_address; ?>"/>
																									<?php echo form_error('father_address'); ?>
																							</div>
																					</div>
																					<div class="form-group">
																							<label class="col-sm-4 control-label no-padding-right"
																										 for="mother_occupation"> មុខរបរ :<span class="required">*</span></label>
																							<div class="col-sm-8">
																									<input type="text" id="mother_occupation" name="mother_occupation"
																												 class="col-xs-10 col-sm-9" required="required"
																												 value="<?php echo $monk->row()->mother_occupation; ?>"/>
																									<?php echo form_error('mother_occupation'); ?>
																							</div>
																					</div>
																					<div class="form-group">
																							<label class="col-sm-4 control-label no-padding-right"
																										 for="mother_address"> អាស័យដ្ឋានបច្ចុប្បន្ន :<span
																													class="required">*</span></label>
																							<div class="col-sm-8">
																									<input type="text" id="mother_address" name="mother_address"
																												 class="col-xs-10 col-sm-9" required="required"
																												 value="<?php echo $monk->row()->mother_address; ?>"/>
																									<?php echo form_error('mother_address'); ?>
																							</div>
																					</div>
																					<div class="form-group">
																							<label class="col-sm-4 control-label no-padding-right"
																										 for="number_of_brother"> ប្រុសចំនួន :</label>
																							<div class="col-sm-8">
																									<input type="text" id="number_of_brother" name="number_of_brother"
																												 class="col-xs-10 col-sm-9"
																												 value="<?php echo $monk->row()->number_of_brother; ?>"/>
																									<?php echo form_error('number_of_brother'); ?>
																							</div>
																					</div>
																					<div class="form-group">
																							<label class="col-sm-4 control-label no-padding-right"
																										 for="child_level"> ជាកូនទី :<span
																													class="required">*</span></label>
																							<div class="col-sm-8">
																									<input type="text" id="child_level" name="child_level"
																												 class="col-xs-10 col-sm-9" required="required"
																												 value="<?php echo $monk->row()->child_level; ?>"/>
																									<?php echo form_error('child_level'); ?>
																							</div>
																					</div>
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
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix form-actions">
				<div class="col-md-offset-5 col-md-7">
					<button class="btn btn-info" type="submit">
						<i class="ace-icon fa fa-check bigger-110"></i>
						កែប្រែ
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
