<?php if(($this->session->userdata("user_type")=="admin") || ($this->session->userdata("manager")==1)){?>
<label>
  <a href="<?php echo base_url();?>manage_members"  class="btn btn-primary btn-sm"><i class="fa fa-backward"></i> ត្រលប់ក្រោយ</a>
  <a href="<?php echo base_url();?>manage_members/create_member" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> បន្ថែមថ្មី</a>
</label>
<?php }
if(($this->session->userdata("user_type")=="member") && ($this->session->userdata("manager")==0)){
  ?>
  <a href="<?php echo base_url();?>manage_member_account" class="btn btn-primary btn-sm"><i class="fa fa-list"></i>ត្រលប់ក្រោយ</a>
  <?php
}
?>
<form class="form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>manage_members/update_member/<?php echo $this->uri->segment(3);?>" enctype="multipart/form-data">
	<div class="row">
		<div class="col-sm-12">
			<?php
				$this->load->view('backend/notification/index.php');
				$data = $member->row();
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
												<input type="text" id="username" name="username" required
												class="col-xs-10 col-sm-9"
												value="<?php echo $data->username; ?>"/>
												<?php echo form_error('username'); ?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="nation"> ជនជាតិ :<span class="required">*</span></label>
											<div class="col-sm-8">
												<input type="text" id="nation" name="nation" required class="col-xs-10 col-sm-9"
												value="<?php echo $data->nation; ?>"/>
												<?php echo form_error('nation'); ?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="date_of_birth"> ថ្ងៃ ខែ ឆ្នាំកំណើត :<span class="required">*</span></label>
											<div class="col-sm-7">
												<div class="input-group">
													<input class="form-control date-picker" id="id-date-picker-1"
													required type="text" data-date-format="dd-mm-yyyy"
													name="date_of_birth" class="col-xs-10 col-sm-9"
													value="<?php echo date("d/m/Y",strtotime($data->date_of_birth)); ?>"/>
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
													<input class="form-control date-picker" id="id-date-picker-1" type="text"
													required ata-date-format="dd-mm-yyyy" name="stay_date"
													class="col-xs-10 col-sm-9" value="<?php echo date("d/m/Y",strtotime($data->stay_date)); ?>"/>
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
															$edu_se="";
															if($row_edu->id==$data->education){
																$edu_se="selected";
															}
															echo "<option value='".$row_edu->id."' ".$edu_se.">".$row_edu->name."</option>";
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
														<?php
															if($grade !=false){
																foreach ($grade->result() as  $grade_val) {
																	$grade_se="";
																	if($grade_val->id==$data->grade){
																		$grade_se="selected";
																	}
																	?>
																	<option value="<?php echo $grade_val->id;?>" <?php echo $grade_se;?>><?php echo $grade_val->name;?></option>
																	<?php
																}
															}
														?>
												</select>
												<!-- <input type="text" id="education" name="education" required class="col-xs-10 col-sm-9" value="<?php echo set_value('education'); ?>"/> -->
												<?php echo form_error('grade'); ?>
											</div>
										</div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label no-padding-right" for="major">
                            ជំនាញ :</label>
                        <div class="col-sm-8">
                            <input type="text" class="col-xs-10 col-sm-9" name="major" value="<?php echo $data->major;?>" id="major">
                            <?php echo form_error('major'); ?>
                        </div>
                    </div>
										<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="family_status"> ស្ថានភាពគ្រួសារ : <span class="required">*</span></label>
											<div class="col-sm-8">
											<select id="department" name="family_status"class="col-xs-10 col-sm-9">
													<option value="">--ជ្រើសរើសស្ថានភាព--</option>
													<option value="single" <?php echo ($data->family_status == 'single')? 'selected':''; ?>>នៅលីវ</option>
													<option value="married" <?php echo ($data->family_status == 'married')? 'selected':''; ?>>រៀបការរួច</option>
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
                                   value="<?php echo $data->user_account; ?>"/>
                            <?php echo form_error('user_account'); ?>
                        </div>
                    </div>
                    <div class="form-group">
  										<label class="col-sm-4 control-label no-padding-right" for="user_password">
  											លេខកូដសម្ងាត់ :</label>
  										<div class="col-sm-8">
  											<input type="password" id="user_password" name="user_password"
  												   class="col-xs-10 col-sm-9"/>
  											<input type="hidden" id="old_pass" name="old_pass" value="<?php echo $data->user_password;?>"/>
  											<?php echo form_error('user_password'); ?>
  										</div>
                    </div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="eng_name"> ឈ្មោះជាភាសាអង់គ្លេស :</label>
										<div class="col-sm-8">
											<input type="text" id="eng_name" name="eng_name"
											class="col-xs-10 col-sm-9" value="<?php echo $data->eng_name; ?>"/>
											<?php echo form_error('eng_name'); ?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="gender"> ភេទ : <span class="required">*</span></label>
										<div class="col-sm-8">
											<select id="gender" name="gender" class="col-xs-10 col-sm-9">
												<option value="">--ជ្រើសរើសភេទ--</option>
												<option value="M" <?php echo ($data->gender == 'M')? 'selected':'';?>>ប្រុស</option>
												<option value="F" <?php echo ($data->gender == 'F')? 'selected':'';?>>ស្រី</option>
											</select>
											<?php echo form_error('gender'); ?>
										</div>
									</div>
									<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="nationality"> សញ្ជាតិ :<span class="required">*</span></label>
											<div class="col-sm-8">
												<input type="text" id="nationality" name="nationality"
												class="col-xs-10 col-sm-9" value="<?php echo $data->nationality; ?>"/>
												<?php echo form_error('nationality'); ?>
											</div>
									</div>
									<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="place_of_birth"> ទីកន្លែងកំណើត :<span class="required">*</span></label>
											<div class="col-sm-8">
												<input type="text" id="place_of_birth" name="place_of_birth"
												class="col-xs-10 col-sm-9" value="<?php echo $data->place_of_birth; ?>"/>
												<?php echo form_error('place_of_birth'); ?>
											</div>
									</div>
									<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="current_address"> អាសយដ្ឋានបច្ចុប្បន្ន :<span class="required">*</span></label>
											<div class="col-sm-8">
												<input type="text" id="current_address" name="current_address"
												class="col-xs-10 col-sm-9" value="<?php echo $data->current_address; ?>"/>
												<?php echo form_error('current_address'); ?>
											</div>
									</div>
									<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="phone_number"> លេខទូរស័ព្ទ  :<span class="required">*</span></label>
											<div class="col-sm-8">
												<input type="text" id="phone_number"
												name="phone_number" placeholder="" class="col-xs-10 col-sm-9"
												value="<?php echo $data->phone_number; ?>"/>
												<?php echo form_error('phone_number'); ?>
											</div>
									</div>
									<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="identify_card"> អត្តសញ្ញាណប័ណ្ណ  :<span class="required">*</span></label>
											<div class="col-sm-8">
												<input type="text" id="identify_card" name="identify_card"
												class="col-xs-10 col-sm-9"
												value="<?php echo $data->identify_card; ?>"/>
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
												<option value="<?php echo $row->id;?>" <?php echo ($data->monk_response_id == $row->id)? 'selected':'';?>><?php echo $row->username;?></option>
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
                      <img src="<?php echo base_url().'ftemplate/images/'.$data->photo;?>"
                      title="Photo"
                      alt="Photo"
                      style="width: 130px;margin-left: 347%;margin-top: -47%;" id="image_result"/>
                    </div>
                  </div>
								</div>
							</div>
							<div class="row"><a href="javascript:void(0)" class="btn btn-primary btn-sm add_language"><i class="fa fa-plus"></i>បន្ថែមភាសាៈ</a></div>
							<div class="row data_language" style="margin-left:3%;">
								<?php
									if($member_lang !=FALSE){
									foreach ($member_lang->result() as $lang_val) {
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
											<label for="speaking" class="control-label"><strong>និយាយ:</strong><a href="javascript:void(0)" class="btn btn-danger btn-xs pull-right remove_lang" title="Remove" data-member="<?php echo $member_id;?>" data-monk="" data-lang="<?php echo $lang_val->lang_id;?>" data-id="<?php echo $lang_val->id?>" style="margin-left: 94px;margin-top: -8px;"><i class="ace-icon fa fa-trash-o bigger-130"></i></a></label>
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
											<a href="javascript:void(0)" class="btn btn-danger btn-xs pull-right remove_lang" title="Remove" data-monk="" data-member="" data-lang="" style="margin-left: 94px;margin-top: -8px;"><i class="ace-icon fa fa-trash-o bigger-130"></i></a>
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
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>
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
															<option value="1" <?php echo ($data->student_type==1?"selected":""); ?>>សិស្ស</option>
															<option value="2" <?php echo ($data->student_type==2?"selected":""); ?>>និស្សិត</option>
														</select>
													</div>
													<?php echo form_error('student_type'); ?>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="study_at"> រៀននៅ :</label>
													<div class="col-sm-8">
														<input type="text" id="study_at" name="study_at"
														class="col-xs-10 col-sm-9"  value="<?php echo $data->study_at; ?>"/>
														<?php echo form_error('study_at'); ?>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="group"> ក្រុមទី :</label>
													<div class="col-sm-8">
														<input type="text" id="group" name="group"
														class="col-xs-10 col-sm-9" value="<?php echo $data->group; ?>"/>
														<?php echo form_error('group'); ?>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="generation"> ជំនាន់ទី :</label>
													<div class="col-sm-8">
														<input type="text" id="generation" name="generation" placeholder="" class="col-xs-10 col-sm-9"  value="<?php echo $data->generation; ?>"/>
														<?php echo form_error('generation'); ?>
													</div>
												</div>
												<?php if($get_daytime_stu !=false){
														foreach ($get_daytime_stu->result() as $stu_val) {
													?>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="fromdayworking_study"> ពីថ្ងៃ:</label>
													<div class="col-sm-4">
															<select name="fromdayworking_study[]" id="fromdayworking_study" class="col-xs-10 col-sm-9">
																<option value="">--ជ្រើសរើស--</option>
																	<?php
																		foreach ($days->result() as $dayworking) {
																			$stu_fr_se="";
																			if($stu_val->fromid==$dayworking->id){
																				$stu_fr_se="selected";
																			}
																			echo "<option value='".$dayworking->id."' ".$stu_fr_se.">".$dayworking->name."</option>";
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
																			$stu_to_se="";
																			if($stu_val->todayid==$dayworking->id){
																				$stu_to_se="selected";
																			}
																			echo "<option value='".$dayworking->id."' ".$stu_to_se.">".$dayworking->name."</option>";
																		}
																	?>
															</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="from_timeworking_study">ពីម៉ោង:</label>
													<div class="col-sm-4">
														<div class="input-append bootstrap-timepicker-component">
															<input type="text" name="from_timeworking_study[]"
															class="col-xs-10 col-sm-9 timepicker-default from_timeworking_study"
															id="from_timeworking_study" value="<?php echo $stu_val->from_time;?>"/>
														</div>
													</div>
													<label class="col-sm-1 control-label no-padding-right" for="to_timeworking_study" style="margin-left: -9%;">ដល់:</label>
													<div class="col-sm-4">
														<div class="input-append bootstrap-timepicker-component">
															<input type="text" name="to_timeworking_study[]"
															class="col-xs-10 col-sm-9 timepicker-default to_timeworking_study"
															id="to_timeworking_study" value="<?php echo $stu_val->to_time;?>"/>
														</div>
													</div>
												</div>
												<?php if(count($get_daytime_stu->result())==1):?>
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
												<?php endif;?>
												<?php }
											}else{?>
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
												<?php }?>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="school_address"> អាសយដ្ឋានសាលារៀន :</label>
													<div class="col-sm-8">
														<textarea id="school_address" name="school_address" rows="2"
														class="col-xs-10 col-sm-9"><?php echo $data->school_address; ?></textarea>
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
															<?php
																$type_s="";
																$gov="";
																if($data->work_type==1){
																	$type_s="selected";
																}
																if($data->work_type==2){
																	$gov="selected";
																}
															?>
															<option value="1" <?php echo $type_s;?>>បុគ្គលិក</option>
															<option value="2" <?php echo $gov;?>>មន្ត្រីរាជការ</option>
														</select>
													</div>
													<?php echo form_error('work_type'); ?>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="company_name"> ឈ្មោះស្ថាប័ន :</label>
													<div class="col-sm-8">
														<input type="text" id="company_name" name="company_name"
														class="col-xs-10 col-sm-9" value="<?php echo $data->company_name; ?>"/>
														<?php echo form_error('company_name'); ?>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="position"> មុខងារបច្ចុប្បន្ន :<span class="required">*</span></label>
													<div class="col-sm-8">
														<input type="text" id="position" name="position"
														 class="col-xs-10 col-sm-9" value="<?php echo $data->position; ?>"/>
														<?php echo form_error('position'); ?>
													</div>
												</div>
												<?php
												if($get_daytime_working !=false){
													foreach ($get_daytime_working->result() as $working_val) {
													?>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="fromdayworking_working"> ពីថ្ងៃ:</label>
													<div class="col-sm-4">
															<select name="fromdayworking_working[]" id="fromdayworking_working" class="col-xs-10 col-sm-9">
																<option value="">--ជ្រើសរើស--</option>
																	<?php
																		foreach ($days->result() as $dayworking) {
																			if($working_val->fromid==$dayworking->id){
																				$from_se="selected";
																			}else{
																				$from_se="";
																			}
																			echo "<option value='".$dayworking->id."' ".$from_se.">".$dayworking->name."</option>";
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
																			if($working_val->todayid==$dayworking->id){
																				$to_se="selected";
																			}else{
																				$to_se="";
																			}
																			echo "<option value='".$dayworking->id."'".$to_se.">".$dayworking->name."</option>";
																		}
																	?>
															</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="from_timeworking_working">ពីម៉ោង:</label>
													<div class="col-sm-4">
														<div class="input-append bootstrap-timepicker-component">
															<input type="text" name="from_timeworking_working[]"
															class="col-xs-10 col-sm-9 timepicker-default from_timeworking_working"
															id="from_timeworking_working"  value="<?php echo $working_val->from_time;?>"/>
														</div>
													</div>
													<label class="col-sm-1 control-label no-padding-right" for="to_timeworking_working[]" style="margin-left: -9%;">ដល់:</label>
													<div class="col-sm-4">
														<div class="input-append bootstrap-timepicker-component">
															<input type="text" name="to_timeworking_working[]"
															class="col-xs-10 col-sm-9 timepicker-default to_timeworking_working"
															id="to_timeworking_working"  value="<?php echo $working_val->to_time;?>"/>
														</div>
													</div>
												</div>
												<?php if(count($get_daytime_working->result())==1){?>
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
																<input type="text" name="to_timeworking_working[]"
																class="col-xs-10 col-sm-9 timepicker-default to_timeworking_working"
																id="to_timeworking_working"/>
															</div>
														</div>
													</div>
												<?php }?>
											<?php }
													}else{
												?>
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
												<?php
											}?>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="company_address">  អាសយដ្ឋានស្ថាប័នធ្វើការ:</label>
													<div class="col-sm-8">
														<textarea id="company_address"
														name="company_address" class="col-xs-10 col-sm-9"
														rows="2"><?php echo $data->company_address?></textarea>
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
														<input type="text" id="father_name" name="father_name"
														class="col-xs-10 col-sm-9" required="required"
														value="<?php echo $data->father_name; ?>"/>
														<?php echo form_error('father_name'); ?>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="father_phone"> លេខទូរស័ព្ទ :<span class="required">*</span></label>
													<div class="col-sm-8">
														<input type="text" id="father_phone" name="father_phone"
														class="col-xs-10 col-sm-9" required="required"
														value="<?php echo $data->father_phone; ?>"/>
														<?php echo form_error('father_phone'); ?>
													</div>
												</div>
												<div class="form-group">
														<label class="col-sm-4 control-label no-padding-right" for="father_occupation"> មុខរបរ  :<span class="required">*</span></label>
														<div class="col-sm-8">
															<input type="text" id="father_occupation" name="father_occupation"
															class="col-xs-10 col-sm-9" required="required"
															value="<?php echo $data->father_occupation; ?>"/>
															<?php echo form_error('father_occupation'); ?>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-4 control-label no-padding-right" for="father_address"> អាស័យដ្ឋានបច្ចុប្បន្ន :<span class="required">*</span></label>
														<div class="col-sm-8">
															<textarea rows="2" id="father_address"
															name="father_address" class="col-xs-10 col-sm-9"
															required="required"><?php echo $data->father_address;?></textarea>
															<?php echo form_error('father_address'); ?>
														</div>
													</div>
											</div>
										</div>
										<div class="col-sm-6">
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="mother_name"> ម្ដាយឈ្មោះ :<span class="required">*</span></label>
													<div class="col-sm-8">
														<input type="text" id="mother_name" name="mother_name"
														class="col-xs-10 col-sm-9" required="required"
														value="<?php echo $data->mother_name; ?>"/>
														<?php echo form_error('mother_name'); ?>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="mother_phone"> លេខទូរស័ព្ទ :<span class="required">*</span></label>
													<div class="col-sm-8">
														<input type="text" id="mother_phone" name="mother_phone"
														class="col-xs-10 col-sm-9" required="required"
														value="<?php echo $data->mother_phone; ?>"/>
														<?php echo form_error('mother_phone'); ?>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="mother_occupation"> មុខរបរ :<span class="required">*</span></label>
													<div class="col-sm-8">
														<input type="text" id="mother_occupation" name="mother_occupation" placeholder=""
														class="col-xs-10 col-sm-9" required="required"
														value="<?php echo $data->mother_occupation; ?>"/>
														<?php echo form_error('mother_occupation'); ?>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label no-padding-right" for="mother_address"> អាស័យដ្ឋានបច្ចុប្បន្ន :<span class="required">*</span></label>
													<div class="col-sm-8">
														<textarea id="mother_address" name="mother_address"
														placeholder="" class="col-xs-10 col-sm-9" required="required" rows="2"><?php echo $data->mother_address; ?></textarea>
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
