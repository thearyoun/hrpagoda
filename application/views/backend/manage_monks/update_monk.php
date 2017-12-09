<form class="form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>manage_monks/update_monk/<?php echo $this -> uri -> segment(3); ?>" enctype="multipart/form-data">
	<div class="row">
		<div class="col-sm-12">
			<?php
			$this -> load -> view('backend/notification/index.php');
			?>
			<div class="widget-box">
				<div class="widget-header">
					<h4 class="smaller"> Member Information</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main">
						<div class="widget-body">
							<div class="row">
								<div class="col-sm-6">
									<div class="widget-main no-padding">

										
										<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="username"> ភិក្ខុឈ្មោះ :<span class="required">*</span></label>

											<div class="col-sm-8">
												<input type="text" id="username" name="username" placeholder="" class="col-xs-10 col-sm-9" value="<?php echo $monk -> row() -> username; ?>"/>
												<?php echo form_error('username'); ?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="nationality"> សញ្ជាតិ  :<span class="required">*</span></label>

											<div class="col-sm-8">
												<input type="text" id="nationality" name="nationality" placeholder="" class="col-xs-10 col-sm-9" value="<?php echo $monk -> row() -> nationality; ?>"/>
												<?php echo form_error('nationality'); ?>
											</div>
									</div>										
										<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="place_of_birth"> ទីកន្លែងកំណើត :<span class="required">*</span></label>

											<div class="col-sm-8">
												<input type="text" id="place_of_birth" name="place_of_birth" placeholder="" class="col-xs-10 col-sm-9" value="<?php echo $monk -> row() -> place_of_birth; ?>"/>
												<?php echo form_error('place_of_birth'); ?>
											</div>
									</div>
										<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="current_address"> អាសយដ្ឋានបច្ចុប្បន្ន :<span class="required">*</span></label>

											<div class="col-sm-8">
												<input type="text" id="current_address" name="current_address" placeholder="" class="col-xs-10 col-sm-9" value="<?php echo $monk -> row() -> current_address; ?>"/>
												<?php echo form_error('current_address'); ?>
											</div>
									</div>
										<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="phone_number"> លេខទូរស័ព្ :<span class="required">*</span></label>

											<div class="col-sm-8">
												<input type="text" id="phone_number" name="phone_number" placeholder="" class="col-xs-10 col-sm-9" value="<?php echo $monk -> row() -> phone_number; ?>"/>
												<?php echo form_error('phone_number'); ?>
											</div>
									</div>									
										<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="vegetarian_date"> ថ្ងៃ ខែ ឆ្នាំបួស :<span class="required">*</span></label>

											<div class="col-sm-7">
												<div class="input-group">
													<input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" name="vegetarian_date" class="col-xs-10 col-sm-9" value="<?php echo date("d-m-Y", strtotime($monk -> row() -> vegetarian_date)); ?>"/>
													<span class="input-group-addon">
														<i class="fa fa-calendar bigger-110"></i>
													</span>
												</div>
												<?php echo form_error('vegetarian_date'); ?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="vegetarian_types"> ភិក្ខុ ឬ សាមណេរ  :<span class="required">*</span></label>
	
											<div class="col-sm-7">
												<select class="chosen-select form-control" id="vegetarian_types" data-placeholder="Choose a type..." name="vegetarian_types">
												
													<option value="">  </option>
													<?php
														foreach($member_types->result() as $row){
													?>
													<option value="<?php echo $row -> id; ?>" <?php echo ($monk->row()->vegetarian_types == $row->id)? 'selected':'';?>><?php echo $row -> name; ?></option>
													<?php
													}
													?>
												</select>
												<?php echo form_error('vegetarian_types'); ?>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="monk_reference"> ព្រះឧបជ្ឈាយ៍នាម :<span class="required">*</span></label>

											<div class="col-sm-8">
												<input type="text" id="monk_reference" name="monk_reference" placeholder="" class="col-xs-10 col-sm-9" value="<?php echo $monk -> row() -> monk_reference; ?>"/>
												<?php echo form_error('monk_reference'); ?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="monk_reference_phone"> លេខទូរស័ព្ទ :<span class="required">*</span></label>

											<div class="col-sm-8">
												<input type="text" id="monk_reference_phone" name="monk_reference_phone" placeholder="" class="col-xs-10 col-sm-9" value="<?php echo $monk -> row() -> monk_reference_phone; ?>"/>
												<?php echo form_error('monk_reference_phone'); ?>
											</div>
										</div>
										

									</div>
									
								</div>
								<div class="col-sm-6">

									<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="nation"> ជនជាតិ  :<span class="required">*</span></label>

											<div class="col-sm-8">
												<input type="text" id="nation" name="nation" placeholder="" class="col-xs-10 col-sm-9" value="<?php echo $monk -> row() -> nation; ?>"/>
												<?php echo form_error('nation'); ?>
											</div>
										</div>
									<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="date_of_birth"> ថ្ងៃ ខែ ឆ្នាំកំណើត  :<span class="required">*</span></label>

											<div class="col-sm-7">
												<div class="input-group">
													<input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" name="date_of_birth" class="col-xs-10 col-sm-9" value="<?php echo date("d-m-Y", strtotime($monk -> row() -> date_of_birth)); ?>"/>
													<span class="input-group-addon">
														<i class="fa fa-calendar bigger-110"></i>
													</span>
												</div>
												<?php echo form_error('date_of_birth'); ?>
											</div>
										</div>
									<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="use_position_id"> មុខងារ  :<span class="required">*</span></label>
	
											<div class="col-sm-7">
												<select class="chosen-select form-control" id="use_position_id" data-placeholder="Choose a position..." name="use_position_id">
												
													<option value="">  </option>
													<?php
														foreach($positions->result() as $row){
													?>
													<option value="<?php echo $row -> id; ?>" <?php echo ($monk->row()->use_position_id == $row->id)? 'selected':'';?>><?php echo $row -> name; ?></option>
													<?php
													}
													?>
												</select>
												<?php echo form_error('use_position_id'); ?>
											</div>
										</div>
									<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="education"> កំរិតវប្បធម៌ :<span class="required">*</span></label>

											<div class="col-sm-8">
												<input type="text" id="education" name="education" placeholder="" class="col-xs-10 col-sm-9" value="<?php echo $monk -> row() -> education; ?>"/>
												<?php echo form_error('education'); ?>
											</div>
										</div>

									
									<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="vegetarian_place"> វត្ត  :<span class="required">*</span></label>

											<div class="col-sm-8">
												<input type="text" id="vegetarian_place" name="vegetarian_place" placeholder="" class="col-xs-10 col-sm-9" value="<?php echo $monk -> row() -> vegetarian_place; ?>"/>
												<?php echo form_error('vegetarian_place'); ?>
											</div>
									</div>
									<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="vegetarian_year"> បួសបាន :<span class="required">*</span></label>

											<div class="col-sm-8">
												<input type="text" id="vegetarian_year" name="vegetarian_year" placeholder="" class="col-xs-10 col-sm-9" value="<?php echo $monk -> row() -> vegetarian_year; ?>"/>
												<?php echo form_error('vegetarian_year'); ?>
											</div>
									</div>
									<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="monk_reference_position"> មុខងារ  :<span class="required">*</span></label>

											<div class="col-sm-8">
												<input type="text" id="monk_reference_position" name="monk_reference_position" placeholder="" class="col-xs-10 col-sm-9" value="<?php echo $monk -> row() -> monk_reference_position; ?>"/>
												<?php echo form_error('monk_reference_position'); ?>
											</div>
									</div>
									<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="monk_current_address"> អាសយដ្ឋានបច្ចុប្បន្ន :<span class="required">*</span></label>

											<div class="col-sm-8">
												<input type="text" id="monk_current_address" name="monk_current_address" placeholder="" class="col-xs-10 col-sm-9" value="<?php echo $monk -> row() -> monk_current_address; ?>"/>
												<?php echo form_error('monk_current_address'); ?>
											</div>
									</div>
									<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="stay_date"> ស្នាក់នៅថ្ងៃ :<span class="required">*</span></label>

											<div class="col-sm-7">
												<div class="input-group">
													<input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" name="stay_date" class="col-xs-10 col-sm-9" value="<?php echo date("d-m-Y", strtotime($monk -> row() -> stay_date)); ?>"/>
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
		</div><!-- /.col -->

	</div><!-- /.row -->

	<hr />
	<div class="row">
		<div class="col-sm-12">
			<div class="tabbable">
				<ul class="nav nav-tabs" id="myTab">
					<li class="active">
						<a data-toggle="tab" href="#home"> <i class="green ace-icon fa fa-home bigger-120"></i> Family Information </a>
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
													<label class="col-sm-4 control-label no-padding-right" for="father_name"> ឪពុកឈ្មោះ :<span class="required">*</span></label>

													<div class="col-sm-8">
														<input type="text" id="father_name" name="father_name" placeholder="" class="col-xs-10 col-sm-9" required="required" value="<?php echo $monk -> row() -> father_name; ?>"/>
														<?php echo form_error('father_name'); ?>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="father_phone"> លេខទូរស័ព្ទ :<span class="required">*</span></label>

													<div class="col-sm-8">
														<input type="text" id="father_phone" name="father_phone" placeholder="" class="col-xs-10 col-sm-9" required="required" value="<?php echo $monk -> row() -> father_phone; ?>"/>
														<?php echo form_error('father_phone'); ?>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="mother_name"> ម្ដាយឈ្មោះ :<span class="required">*</span></label>

													<div class="col-sm-8">
														<input type="text" id="mother_name" name="mother_name" placeholder="" class="col-xs-10 col-sm-9" required="required" value="<?php echo $monk -> row() -> mother_name; ?>"/>
														<?php echo form_error('mother_name'); ?>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="mother_phone"> លេខទូរស័ព្ទ :<span class="required">*</span></label>

													<div class="col-sm-8">
														<input type="text" id="mother_phone" name="mother_phone" placeholder="" class="col-xs-10 col-sm-9" required="required" value="<?php echo $monk -> row() -> mother_phone; ?>"/>
														<?php echo form_error('mother_phone'); ?>
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="from_pagoda"> និមន្ដមកពីវត្ត :<span class="required">*</span></label>

													<div class="col-sm-8">
														<input type="text" id="from_pagoda" name="from_pagoda" placeholder="" class="col-xs-10 col-sm-9" required="required" value="<?php echo $monk -> row() -> from_pagoda; ?>"/>
														<?php echo form_error('from_pagoda'); ?>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="number_of_bro_sis"> មានបងប្អូនចំនួន :<span class="required">*</span></label>

													<div class="col-sm-8">
														<input type="text" id="number_of_bro_sis" name="number_of_bro_sis" placeholder="" class="col-xs-10 col-sm-9" required="required" value="<?php echo $monk -> row() -> number_of_bro_sis; ?>"/>
														<?php echo form_error('number_of_bro_sis'); ?>
													</div>
												</div>												
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="number_of_sister"> ស្រីចំនួន  :<span class="required">*</span></label>

													<div class="col-sm-8">
														<input type="text" id="number_of_sister" name="number_of_sister" placeholder="" class="col-xs-10 col-sm-9" required="required" value="<?php echo $monk -> row() -> number_of_sister; ?>"/>
														<?php echo form_error('number_of_sister'); ?>
													</div>
												</div>
												<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="use_house_id"> កុដិលេខ  :<span class="required">*</span></label>
	
											<div class="col-sm-7">
												<select class="chosen-select form-control" id="use_house_id" data-placeholder="Choose a house..." name="use_house_id">
												
													<option value="">  </option>
													<?php
														foreach($houses->result() as $row){
													?>
													<option value="<?php echo $row -> id; ?>" <?php echo ($monk->row()->use_house_id == $row->id)? 'selected':'';?>><?php echo $row -> name; ?></option>
													<?php
													}
													?>
												</select>
												<?php echo form_error('use_house_id'); ?>
											</div>
											
										</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="monk_number"> លេខឆាយា :</label>

													<div class="col-sm-8">
														<input type="text" id="monk_number" name="monk_number" placeholder="" class="col-xs-10 col-sm-9"  value="<?php echo $monk -> row() -> monk_number; ?>"/>
														<?php echo form_error('monk_number'); ?>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="group"> ក្រុម :<span class="required">*</span></label>
			
													<div class="col-sm-7">
														<select class="chosen-select form-control" id="group" data-placeholder="ជ្រើសរើសក្រុម..." name="group">
														
															<option value="">  </option>
															<?php
																foreach($groups->result() as $row){
															?>
															<option value="<?php echo $row -> id; ?>" <?php echo ($monk_group_info->row()->use_group_id == $row->id)? 'selected':'';?>><?php echo $row -> name; ?></option>
															<?php
															}
															?>
														</select>
														<?php echo form_error('group'); ?>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="user_account"> Account Name:<span class="required">*</span></label>

													<div class="col-sm-8">
														<input type="text" id="user_account" name="user_account" placeholder="" class="col-xs-10 col-sm-9"  value="<?php echo $monk -> row() -> user_account; ?>"/>
														<?php echo form_error('user_account'); ?>
													</div>
												</div>
											</div>
										</div>
										
										<div class="col-sm-6">

											<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="father_occupation"> មុខរបរ  :<span class="required">*</span></label>

													<div class="col-sm-8">
														<input type="text" id="father_occupation" name="father_occupation" placeholder="" class="col-xs-10 col-sm-9" required="required" value="<?php echo $monk -> row() -> father_occupation; ?>"/>
														<?php echo form_error('father_occupation'); ?>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="father_address"> អាស័យដ្ឋានបច្ចុប្បន្ :<span class="required">*</span></label>

													<div class="col-sm-8">
														<input type="text" id="father_address" name="father_address" placeholder="" class="col-xs-10 col-sm-9" required="required" value="<?php echo $monk -> row() -> father_address; ?>"/>
														<?php echo form_error('father_address'); ?>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="mother_occupation"> មុខរបរ  :<span class="required">*</span></label>

													<div class="col-sm-8">
														<input type="text" id="mother_occupation" name="mother_occupation" placeholder="" class="col-xs-10 col-sm-9" required="required" value="<?php echo $monk -> row() -> mother_occupation; ?>"/>
														<?php echo form_error('mother_occupation'); ?>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="mother_address"> អាស័យដ្ឋានបច្ចុប្បន្ :<span class="required">*</span></label>

													<div class="col-sm-8">
														<input type="text" id="mother_address" name="mother_address" placeholder="" class="col-xs-10 col-sm-9" required="required" value="<?php echo $monk -> row() -> mother_address; ?>"/>
														<?php echo form_error('mother_address'); ?>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="photo"> ជ្រើសរើសរូបភាព :</label>

													<div class="col-sm-8">
														<input type="file" id="userfile" name="userfile" placeholder="" class="col-xs-10 col-sm-9" value="<?php echo set_value('userfile'); ?>"/>
														<?php echo form_error('userfile'); ?>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="number_of_brother"> ប្រុសចំនួន :<span class="required">*</span></label>

													<div class="col-sm-8">
														<input type="text" id="number_of_brother" name="number_of_brother" placeholder="" class="col-xs-10 col-sm-9" required="required" value="<?php echo $monk -> row() -> number_of_brother; ?>"/>
														<?php echo form_error('number_of_brother'); ?>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="child_level"> ជាកូនទី :<span class="required">*</span></label>

													<div class="col-sm-8">
														<input type="text" id="child_level" name="child_level" placeholder="" class="col-xs-10 col-sm-9" required="required" value="<?php echo $monk -> row() -> child_level; ?>"/>
														<?php echo form_error('child_level'); ?>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="use_location_id"> មកពីខេត្ត :<span class="required">*</span></label>
													<div class="col-sm-7">
														<select class="chosen-select form-control" id="use_location_id" data-placeholder="Choose a location..." name="use_location_id">
														
															<option value="">  </option>
															<?php
																foreach($locations->result() as $row){
															?>
															<option value="<?php echo $row -> id; ?>" <?php echo ($monk->row()->use_location_id == $row->id)? 'selected':'';?>><?php echo $row -> name; ?></option>
															<?php
															}
															?>
														</select>
														<?php echo form_error('use_location_id'); ?>
													</div>
												</div>
												<div class="form-group">
														<label class="col-sm-4 control-label no-padding-right" for="acknow_by"> ទទួលស្គាល់ដោយ :</label>
	
														<div class="col-sm-8">
															<input type="text" id="acknow_by" name="acknow_by" placeholder="" class="col-xs-10 col-sm-9"  value="<?php echo $monk -> row() -> acknow_by; ?>"/>
															<?php echo form_error('acknow_by'); ?>
														</div>
												</div>
												<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="leave_date"> ចាកចេញថ្ងៃ :</label>

											<div class="col-sm-7">
												<div class="input-group">
													<input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" name="leave_date" class="col-xs-10 col-sm-9" value="
													<?php 
													if($monk -> row() -> leave_date!= null){
														echo date("d-m-Y", strtotime($monk -> row() -> leave_date));	
													}													
													 ?>
													 
													"/>
													<span class="input-group-addon">
														<i class="fa fa-calendar bigger-110"></i>
													</span>
												</div>
												
											</div>
										</div>
										<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="user_password"> Password :</label>

													<div class="col-sm-8">
														<input type="password" id="user_password" name="user_password" placeholder="" class="col-xs-10 col-sm-9"  value=""/>
														<?php echo form_error('user_password'); ?>
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