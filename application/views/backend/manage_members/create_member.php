<label>
  <?php if(($this->session->userdata("user_type")=="admin") || ($this->session->userdata("manager")==1)){ ?>
  <a href="<?php echo base_url();?>manage_members" class="btn btn-primary btn-sm"><i class="fa fa-list"></i> បញ្ជីគ្រហស្ថ</a>
  <?php }
    if(($this->session->userdata("user_type")=="member") && ($this->session->userdata("manager")==0)){
      ?>
      <a href="<?php echo base_url();?>manage_member_account" class="btn btn-primary btn-sm"><i class="fa fa-list"></i>ត្រលប់ក្រោយ</a>
      <?php
    }
  ?>
</label>
<form class="form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>manage_members/create_member" enctype="multipart/form-data">
	<div class="row">
		<div class="col-sm-12">
			<?php
				$this->load->view('backend/notification/index.php');
			?>
			<div class="widget-box">
				<div class="widget-header">
					<h4 class="smaller"> ព័ត៌មានគ្រហស្ថ</h4>
				</div>
				<div class="widget-body">
					<div class="widget-main">
						<div class="widget-body">
							<div class="row">
								<div class="col-sm-6">
									<div class="widget-main no-padding">
										<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="username"> ឈ្មោះគ្រហស្ថ :<span class="required">*</span></label>
											<div class="col-sm-8">
												<input type="text" id="username" name="username" required class="col-xs-10 col-sm-9" value="<?php echo set_value('username'); ?>"/>
												<?php echo form_error('username'); ?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="nation"> ជនជាតិ :<span class="required">*</span></label>
											<div class="col-sm-8">
												<input type="text" id="nation" name="nation" required class="col-xs-10 col-sm-9" value="<?php echo set_value('nation'); ?>"/>
												<?php echo form_error('nation'); ?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="date_of_birth"> ថ្ងៃ ខែ ឆ្នាំកំណើត :<span class="required">*</span></label>
											<div class="col-sm-7">
												<div class="input-group">
													<input class="form-control date-picker" id="id-date-picker-1" required type="text" data-date-format="dd-mm-yyyy" name="date_of_birth" class="col-xs-10 col-sm-9" value="<?php echo set_value('date_of_birth'); ?>"/>
													<span class="input-group-addon">
														<i class="fa fa-calendar bigger-110"></i>
													</span>
												</div>
												<?php echo form_error('date_of_birth'); ?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="stay_date"> ​ស្នាក់នៅថ្ងៃ :<span class="required">*</span></label>
											<div class="col-sm-7">
												<div class="input-group">
													<input class="form-control date-picker" id="id-date-picker-1" type="text" required ata-date-format="dd-mm-yyyy" name="stay_date" class="col-xs-10 col-sm-9" value="<?php echo set_value('stay_date'); ?>"/>
													<span class="input-group-addon">
														<i class="fa fa-calendar bigger-110"></i>
													</span>
												</div>
												<?php echo form_error('stay_date'); ?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="education"> កំរិតការសិក្សា :</label>
											<div class="col-sm-8">
												<select id="education" name="education" class="col-xs-10 col-sm-9 education_human">
														<option value="">--កម្រិតនៃការសិក្សា--</option>
														<?php foreach ($education->result() as $row_edu) {
															echo "<option value='".$row_edu->id."'>".$row_edu->name."</option>";
														}?>
												</select>
												<!-- <input type="text" id="education" name="education" required class="col-xs-10 col-sm-9" value="<?php echo set_value('education'); ?>"/> -->
												<?php echo form_error('education'); ?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="grade"> ថ្នាក់ :</label>
											<div class="col-sm-8">
												<select id="grade" name="grade" class="col-xs-10 col-sm-9">
														<option value="">--ថ្នាក់--</option>

												</select>
												<!-- <input type="text" id="education" name="education" required class="col-xs-10 col-sm-9" value="<?php echo set_value('education'); ?>"/> -->
												<?php echo form_error('grade'); ?>
											</div>
										</div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label no-padding-right" for="major">
                            ជំនាញ :</label>
                        <div class="col-sm-8">
                            <input type="text" class="col-xs-10 col-sm-9" name="major" value="<?php echo set_value("major");?>" id="major">
                            <?php echo form_error('major'); ?>
                        </div>
                    </div>
										<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="family_status"> ស្ថានភាពគ្រួសារ : <span class="required">*</span></label>
											<div class="col-sm-8">
											<select id="department" name="family_status"class="col-xs-10 col-sm-9">
													<option value="">--ជ្រើសរើសស្ថានភាព--</option>
													<option value="single" <?php echo set_select('family_status', 'single'); ?>>នៅលីវ</option>
													<option value="married" <?php echo set_select('family_status', 'married'); ?>>រៀបការរួច</option>
												</select>
											</div>
											<?php echo form_error('family_status'); ?>
										</div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label no-padding-right" for="user_account">
			                       ឈ្មោះគណនី:<span class="required">*</span>
	                      </label>
                        <div class="col-sm-8">
                            <input type="text" id="user_account" name="user_account" required
                                   class="col-xs-10 col-sm-9"
                                   value="<?php echo set_value('user_account'); ?>"/>
                            <?php echo form_error('user_account'); ?>
                        </div>
                    </div>
                    <div class="form-group">
  										<label class="col-sm-4 control-label no-padding-right" for="user_password">
  											លេខកូដសម្ងាត់ :<span class="required">*</span></label>
  										<div class="col-sm-8">
  											<input type="password" id="user_password" name="user_password"
  												   required class="col-xs-10 col-sm-9" value=""/>
  											<?php echo form_error('user_password'); ?>
  										</div>
                    </div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="eng_name"> ឈ្មោះជាភាសាអង់គ្លេស :</label>
										<div class="col-sm-8">
											<input type="text" id="eng_name" name="eng_name" placeholder="" class="col-xs-10 col-sm-9" value="<?php echo set_value('eng_name'); ?>"/>
											<?php echo form_error('eng_name'); ?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="gender"> ភេទ : <span class="required">*</span></label>
										<div class="col-sm-8">
											<select id="gender" name="gender" class="col-xs-10 col-sm-9">
												<option value="">--ជ្រើសរើសភេទ--</option>
												<option value="M" <?php echo set_select('gender', 'M'); ?>>ប្រុស</option>
												<option value="F" <?php echo set_select('gender', 'F'); ?>>ស្រី</option>
											</select>
											<?php echo form_error('gender'); ?>
										</div>
									</div>
									<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="nationality"> សញ្ជាតិ :<span class="required">*</span></label>
											<div class="col-sm-8">
												<input type="text" id="nationality" name="nationality" placeholder="" class="col-xs-10 col-sm-9" value="<?php echo set_value('nationality'); ?>"/>
												<?php echo form_error('nationality'); ?>
											</div>
									</div>
									<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="place_of_birth"> ទីកន្លែងកំណើត :<span class="required">*</span></label>
											<div class="col-sm-8">
												<input type="text" id="place_of_birth" name="place_of_birth" placeholder="" class="col-xs-10 col-sm-9" value="<?php echo set_value('place_of_birth'); ?>"/>
												<?php echo form_error('place_of_birth'); ?>
											</div>
									</div>
									<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="current_address"> អាសយដ្ឋានបច្ចុប្បន្ន :<span class="required">*</span></label>
											<div class="col-sm-8">
												<input type="text" id="current_address" name="current_address" placeholder="" class="col-xs-10 col-sm-9" value="<?php echo set_value('current_address'); ?>"/>
												<?php echo form_error('current_address'); ?>
											</div>
									</div>
									<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="phone_number"> លេខទូរស័ព្ទ  :<span class="required">*</span></label>
											<div class="col-sm-8">
												<input type="text" id="phone_number" name="phone_number" placeholder="" class="col-xs-10 col-sm-9" value="<?php echo set_value('phone_number'); ?>"/>
												<?php echo form_error('phone_number'); ?>
											</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="identify_card"> អត្តសញ្ញាណប័ណ្ណ  :<span class="required">*</span></label>
										<div class="col-sm-8">
											<input type="text" id="identify_card" name="identify_card" placeholder="" class="col-xs-10 col-sm-9" value="<?php echo set_value('identify_card'); ?>"/>
											<?php echo form_error('identify_card'); ?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="monk_response_id"> ភិក្ខុទទួលខុសត្រូវ :<span class="required">*</span></label>
										<div class="col-sm-7">
										  <select class="chosen-select form-control" id="monk_response_id" data-placeholder="ជ្រើសរើសព្រះសង្ឃ..." name="monk_response_id">
											<option value="">  </option>
											<?php
											  foreach($monks->result() as $row){
											?>
											<option value="<?php echo $row->id;?>" <?php echo set_select('monk_response_id', $row -> id); ?>><?php echo $row->username;?></option>
											<?php
											  }
											?>
										  </select>
										  <?php echo form_error('monk_response_id'); ?>
										</div>
									</div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="photo"> ជ្រើសរើសរូបភាព :</label>
                    <div class="col-sm-7">
                      <input type="file" id="userfile" name="userfile" placeholder="" class="col-xs-10 col-sm-9" value="<?php echo set_value('photo'); ?>"/>
                      <?php if(isset($errors)){
                         foreach($errors as $error){
                          echo $error;
                         }
                      }; ?>
                    </div>
                    <br/><br/>
                    <div class="col-sm-3">
                      <img src="#"
                      title="Photo"
                      alt="Photo"
                      style="width: 130px;margin-left: 347%;margin-top: -47%;" id="image_result"/>
                    </div>
                  </div>
								</div>
							</div>
							<div class="row"><a href="javascript:void(0)" class="btn btn-primary btn-sm add_language"><i class="fa fa-plus"></i> បន្ថែមភាសាៈ</a></div>
							<div class="row data_language" style="margin-left:3%;">
								<div class="col-xs-12 col-sm-9 col-md-3">
									<div class="form-group">
										<label for="language" class="control-label"><strong>ភាសា:</strong></label>
										<div class="input-group col-sm-8">
											<select name="language[]" id="language" class="form-control chosen-select" data-placeholder="ភាសា...">
												<option value=""></option>
												<?php
													foreach ($langauges->result() as $lang_value) {
														echo "<option value='".$lang_value->id."'>".$lang_value->name."</option>";
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
											<label for="speaking" class="control-label"><strong>និយាយ:</strong></label>
											<div class="input-group col-sm-12">
												<select name="speaking[]" id="speaking" class="form-control chosen-select" data-placeholder="និយាយ...">
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
						<a data-toggle="tab" href="#home"> <i class="green ace-icon fa fa-home bigger-120"></i> ព័ត៌មានអំពីការងារបច្ចុប្បន្ន </a>
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
													<label class="col-sm-4 control-label no-padding-right" for="student_type"> ជាសិស្ស ឬ និស្សិត:</label>
													<div class="col-sm-8">
														<select id="student_type" name="student_type"class="col-xs-10 col-sm-9">
															<option value="">--ប្រភេទនៃសិស្ស--</option>
															<option value="1" <?php echo set_select('student_type', '1'); ?>>សិស្ស</option>
															<option value="2" <?php echo set_select('student_type', '2'); ?>>និស្សិត</option>
														</select>
													</div>
													<?php echo form_error('student_type'); ?>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="study_at"> រៀននៅ :</label>
													<div class="col-sm-8">
														<input type="text" id="study_at" name="study_at" placeholder="" class="col-xs-10 col-sm-9"  value="<?php echo set_value('study_at'); ?>"/>
														<?php echo form_error('study_at'); ?>
													</div>
												</div>
												<!-- <div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="level_at"> កម្រិត :</label>
													<div class="col-sm-8">
														<input type="text" id="level_at" name="level_at" placeholder="" class="col-xs-10 col-sm-9"  value="<?php echo set_value('level_at'); ?>"/>
														<?php echo form_error('study_at'); ?>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="year"> ឆ្នាំទី :</label>
													<div class="col-sm-8">
														<input type="text" id="year" name="year" placeholder="" class="col-xs-10 col-sm-9"  value="<?php echo set_value('year'); ?>"/>
														<?php echo form_error('year'); ?>
													</div>
												</div> -->
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="group"> ក្រុមទី :</label>
													<div class="col-sm-8">
														<input type="text" id="group" name="group" placeholder="" class="col-xs-10 col-sm-9" value="<?php echo set_value('group'); ?>"/>
														<?php echo form_error('group'); ?>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="generation"> ជំនាន់ទី :</label>
													<div class="col-sm-8">
														<input type="text" id="generation" name="generation" placeholder="" class="col-xs-10 col-sm-9"  value="<?php echo set_value('generation'); ?>"/>
														<?php echo form_error('generation'); ?>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="fromdayworking_study"> ពីថ្ងៃ:</label>
													<div class="col-sm-4">
															<select name="fromdayworking_study[]" id="fromdayworking_study" class="col-xs-10 col-sm-9">
																<option value="">--ជ្រើសរើស--</option>
																	<?php
																		foreach ($days->result() as $dayworking) {
																			echo "<option value='".$dayworking->id."'>".$dayworking->name."</option>";
																		}
																	?>
															</select>
													</div>
													<label class="col-sm-2 control-label no-padding-right" for="todayworking_study" style="margin-left: -17%;"> ដល់:</label>
													<div class="col-sm-4">
															<select name="todayworking_study[]" id="todayworking_study" class="col-xs-10 col-sm-9">
																<option value="">--ជ្រើសរើស--</option>
																	<?php
																		foreach ($days->result() as $dayworking) {
																			echo "<option value='".$dayworking->id."'>".$dayworking->name."</option>";
																		}
																	?>
															</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="from_timeworking_study">ពីម៉ោង:</label>
													<div class="col-sm-4">
														<div class="input-append bootstrap-timepicker-component">
															<input type="text" name="from_timeworking_study[]" class="col-xs-10 col-sm-9 timepicker-default from_timeworking_study" id="from_timeworking_study"/>
														</div>
													</div>
													<label class="col-sm-1 control-label no-padding-right" for="to_timeworking_study" style="margin-left: -9%;">ដល់:</label>
													<div class="col-sm-4">
														<div class="input-append bootstrap-timepicker-component">
															<input type="text" name="to_timeworking_study[]" class="col-xs-10 col-sm-9 timepicker-default to_timeworking_study" id="to_timeworking_study"/>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="fromdayworking_study"> ពីថ្ងៃ:</label>
													<div class="col-sm-4">
															<select name="fromdayworking_study[]" id="fromdayworking_study" class="col-xs-10 col-sm-9">
																<option value="">--ជ្រើសរើស--</option>
																	<?php
																		foreach ($days->result() as $dayworking) {
																			echo "<option value='".$dayworking->id."'>".$dayworking->name."</option>";
																		}
																	?>
															</select>
													</div>
													<label class="col-sm-2 control-label no-padding-right" for="todayworking_study" style="margin-left: -17%;"> ដល់:</label>
													<div class="col-sm-4">
															<select name="todayworking_study[]" id="todayworking_study" class="col-xs-10 col-sm-9">
																<option value="">--ជ្រើសរើស--</option>
																	<?php
																		foreach ($days->result() as $dayworking) {
																			echo "<option value='".$dayworking->id."'>".$dayworking->name."</option>";
																		}
																	?>
															</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="from_timeworking_study">ពីម៉ោង:</label>
													<div class="col-sm-4">
														<div class="input-append bootstrap-timepicker-component">
															<input type="text" name="from_timeworking_study[]" class="col-xs-10 col-sm-9 timepicker-default from_timeworking_study" id="from_timeworking_study"/>
														</div>
													</div>
													<label class="col-sm-1 control-label no-padding-right" for="to_timeworking_study" style="margin-left: -9%;">ដល់:</label>
													<div class="col-sm-4">
														<div class="input-append bootstrap-timepicker-component">
															<input type="text" name="to_timeworking_study[]" class="col-xs-10 col-sm-9 timepicker-default to_timeworking_study" id="to_timeworking_study"/>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="school_address"> អាសយដ្ឋានសាលារៀន :</label>
													<div class="col-sm-8">
														<input type="text" id="school_address" name="school_address" placeholder="" class="col-xs-10 col-sm-9" value="<?php echo set_value('school_address'); ?>"/>
														<?php echo form_error('school_address'); ?>
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-6">
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="work_type"> មន្រ្ដីរាជការ ឬ បុគ្គលិក :</label>
													<div class="col-sm-8">
														<select id="work_type" name="work_type"class="col-xs-10 col-sm-9">
															<option value="">--ប្រភេទនៃការងារ--</option>
															<option value="1" <?php echo set_select('work_type', '1'); ?>>បុគ្គលិក</option>
															<option value="2" <?php echo set_select('work_type', '2'); ?>>មន្ត្រីរាជការ</option>
														</select>
													</div>
													<?php echo form_error('work_type'); ?>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="company_name"> ឈ្មោះស្ថាប័ន :</label>
													<div class="col-sm-8">
														<input type="text" id="company_name" name="company_name" placeholder="" class="col-xs-10 col-sm-9" value="<?php echo set_value('company_name'); ?>"/>
														<?php echo form_error('company_name'); ?>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="position"> មុខងារបច្ចុប្បន្ន :<span class="required">*</span></label>
													<div class="col-sm-8">
														<input type="text" id="position" name="position" class="col-xs-10 col-sm-9" value="<?php echo set_value('position'); ?>"/>
														<?php echo form_error('position'); ?>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="fromdayworking_working"> ពីថ្ងៃ:</label>
													<div class="col-sm-4">
															<select name="fromdayworking_working[]" id="fromdayworking_working" class="col-xs-10 col-sm-9">
																<option value="">--ជ្រើសរើស--</option>
																	<?php
																		foreach ($days->result() as $dayworking) {
																			echo "<option value='".$dayworking->id."'>".$dayworking->name."</option>";
																		}
																	?>
															</select>
													</div>
													<label class="col-sm-2 control-label no-padding-right" for="todayworking_working" style="margin-left: -17%;"> ដល់:</label>
													<div class="col-sm-4">
															<select name="todayworking_working[]" id="todayworking_working" class="col-xs-10 col-sm-9">
																<option value="">--ជ្រើសរើស--</option>
																	<?php
																		foreach ($days->result() as $dayworking) {
																			echo "<option value='".$dayworking->id."'>".$dayworking->name."</option>";
																		}
																	?>
															</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="from_timeworking_working">ពីម៉ោង:</label>
													<div class="col-sm-4">
														<div class="input-append bootstrap-timepicker-component">
															<input type="text" name="from_timeworking_working[]" class="col-xs-10 col-sm-9 timepicker-default from_timeworking_working" id="from_timeworking_working"/>
														</div>
													</div>
													<label class="col-sm-1 control-label no-padding-right" for="to_timeworking_working[]" style="margin-left: -9%;">ដល់:</label>
													<div class="col-sm-4">
														<div class="input-append bootstrap-timepicker-component">
															<input type="text" name="to_timeworking_working[]" class="col-xs-10 col-sm-9 timepicker-default to_timeworking_working" id="to_timeworking_working"/>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="fromdayworking_working"> ពីថ្ងៃ:</label>
													<div class="col-sm-4">
															<select name="fromdayworking_working[]" id="fromdayworking_working" class="col-xs-10 col-sm-9">
																<option value="">--ជ្រើសរើស--</option>
																	<?php
																		foreach ($days->result() as $dayworking) {
																			echo "<option value='".$dayworking->id."'>".$dayworking->name."</option>";
																		}
																	?>
															</select>
													</div>
													<label class="col-sm-2 control-label no-padding-right" for="todayworking_working" style="margin-left: -17%;"> ដល់:</label>
													<div class="col-sm-4">
															<select name="todayworking_working[]" id="todayworking_working" class="col-xs-10 col-sm-9">
																<option value="">--ជ្រើសរើស--</option>
																	<?php
																		foreach ($days->result() as $dayworking) {
																			echo "<option value='".$dayworking->id."'>".$dayworking->name."</option>";
																		}
																	?>
															</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="from_timeworking_working">ពីម៉ោង:</label>
													<div class="col-sm-4">
														<div class="input-append bootstrap-timepicker-component">
															<input type="text" name="from_timeworking_working[]" class="col-xs-10 col-sm-9 timepicker-default from_timeworking_working" id="from_timeworking_working"/>
														</div>
													</div>
													<label class="col-sm-1 control-label no-padding-right" for="to_timeworking_working" style="margin-left: -9%;">ដល់:</label>
													<div class="col-sm-4">
														<div class="input-append bootstrap-timepicker-component">
															<input type="text" name="to_timeworking_working[]" class="col-xs-10 col-sm-9 timepicker-default to_timeworking_working" id="to_timeworking_working"/>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="company_address">  អាសយដ្ឋានស្ថាប័នធ្វើការ:</label>
													<div class="col-sm-8">
														<input type="text" id="company_address" name="company_address" placeholder="" class="col-xs-10 col-sm-9"  value="<?php echo set_value('company_address'); ?>"/>
														<?php echo form_error('company_address'); ?>
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
	<hr/>
	<div class="row">
		<div class="col-sm-12">
			<div class="tabbable">
				<ul class="nav nav-tabs" id="myTab">
					<li class="active">
						<a data-toggle="tab" href="#home"> <i class="green ace-icon fa fa-home bigger-120"></i> ព័ត៌មានគ្រួសារ </a>
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
														<input type="text" id="father_name" name="father_name" placeholder="" class="col-xs-10 col-sm-9" required="required" value="<?php echo set_value('father_name'); ?>"/>
														<?php echo form_error('father_name'); ?>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="father_phone"> លេខទូរស័ព្ទ :<span class="required">*</span></label>
													<div class="col-sm-8">
														<input type="text" id="father_phone" name="father_phone" placeholder="" class="col-xs-10 col-sm-9" required="required" value="<?php echo set_value('father_phone'); ?>"/>
														<?php echo form_error('father_phone'); ?>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="mother_name"> ម្ដាយឈ្មោះ :<span class="required">*</span></label>
													<div class="col-sm-8">
														<input type="text" id="mother_name" name="mother_name" placeholder="" class="col-xs-10 col-sm-9" required="required" value="<?php echo set_value('mother_name'); ?>"/>
														<?php echo form_error('mother_name'); ?>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="mother_phone"> លេខទូរស័ព្ទ :<span class="required">*</span></label>
													<div class="col-sm-8">
														<input type="text" id="mother_phone" name="mother_phone" placeholder="" class="col-xs-10 col-sm-9" required="required" value="<?php echo set_value('mother_phone'); ?>"/>
														<?php echo form_error('mother_phone'); ?>
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="father_occupation"> មុខរបរ  :<span class="required">*</span></label>
													<div class="col-sm-8">
														<input type="text" id="father_occupation" name="father_occupation" placeholder="" class="col-xs-10 col-sm-9" required="required" value="<?php echo set_value('father_occupation'); ?>"/>
														<?php echo form_error('father_occupation'); ?>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="father_address"> អាស័យដ្ឋានបច្ចុប្បន្ន :<span class="required">*</span></label>
													<div class="col-sm-8">
														<input type="text" id="father_address" name="father_address" placeholder="" class="col-xs-10 col-sm-9" required="required" value="<?php echo set_value('father_address'); ?>"/>
														<?php echo form_error('father_address'); ?>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="mother_occupation"> មុខរបរ :<span class="required">*</span></label>
													<div class="col-sm-8">
														<input type="text" id="mother_occupation" name="mother_occupation" placeholder="" class="col-xs-10 col-sm-9" required="required" value="<?php echo set_value('mother_occupation'); ?>"/>
														<?php echo form_error('mother_occupation'); ?>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="mother_address"> អាស័យដ្ឋានបច្ចុប្បន្ន :<span class="required">*</span></label>
													<div class="col-sm-8">
														<input type="text" id="mother_address" name="mother_address" placeholder="" class="col-xs-10 col-sm-9" required="required" value="<?php echo set_value('mother_address'); ?>"/>
														<?php echo form_error('mother_address'); ?>
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
