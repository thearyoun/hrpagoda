<form class="form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>manage_monk_take_leaves/create_monk_take_leave">
	<div class="row">
		<div class="col-sm-12">
			<?php
				$this->load->view('backend/notification/index.php');
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
											<label class="col-sm-4 control-label no-padding-right" for="use_monk_id"> ភិក្ខុឈ្មោះ :<span class="required">*</span></label>
                      <div class="col-sm-7">
                          <?php if($this->session->userdata("user_type")=="monk"):?>
                              <input type="text" class="col-sm-12" name="monk_name" readonly value="<?php echo $this->session->userdata("username");?>">
                              <input type="hidden" name="use_monk_id" value="<?php echo $this->session->userdata("monk_id");?>">
                          <?php endif;?>
                          <?php if($this->session->userdata("user_type")=="admin"):?>
                              <select class="chosen-select form-control" id="use_monk_id" data-placeholder="សូមជ្រើសរើស..." name="use_monk_id">
                                  <option value="">  </option>
                                  <?php
                                  foreach($monks->result() as $row){
                                      ?>
                                      <option value="<?php echo $row->id;?>" <?php echo set_select('use_monk_id', $row -> id); ?>><?php echo $row->username;?></option>
                                      <?php
                                  }
                                  ?>
                              </select>
                          <?php endif;?>
                          <?php echo form_error('use_monk_id'); ?>
                      </div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="use_leave_type_id"> ប្រភេទនៃការឈប់ :<span class="required">*</span></label>

											<div class="col-sm-7">
												<select class="chosen-select form-control" id="use_leave_type_id" data-placeholder="សូមជ្រើសរើស..." name="use_leave_type_id">

													<option value="">  </option>
													<?php
														foreach($leave_types->result() as $row){
													?>
													<option value="<?php echo $row->id;?>" <?php echo set_select('use_leave_type_id', $row -> id); ?>><?php echo $row->name;?></option>
													<?php
														}
													?>
												</select>
												<?php echo form_error('use_leave_type_id'); ?>
											</div>
										</div>
										<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="from_date"> ពីថ្ងៃ :<span class="required">*</span></label>
										<div class="col-sm-7">
											<div class="input-group">
												<input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" name="from_date" class="col-xs-10 col-sm-9" value="<?php echo set_value('from_date'); ?>"/>
												<span class="input-group-addon">
													<i class="fa fa-calendar bigger-110"></i>
												</span>
											</div>
											<?php echo form_error('from_date'); ?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="reason"> មូលហេតុ :</label>

										<div class="col-sm-8">
											<textarea name="reason" class="col-xs-10 col-sm-10" rows="5"><?php echo set_value('reason'); ?></textarea>
										</div>
									</div>
                  <?php if($this->session->userdata("user_type")=="admin"):?>
                      <div class="form-group">
                          <label class="col-sm-4 control-label no-padding-right" for="status_type"> ប្រភេទ :</label>
                          <div class="col-sm-7">
                              <select class="col-sm-9 chosen-select" name="status_type" data-placeholder="ជ្រើសរើសប្រភេទ" data-id="<?php echo $row->id;?>">
                                  <option value=""></option>
                                  <?php if($status_type !=false):
                                      foreach ($status_type->result() as $value) {
                                          echo "<option value='".$value->name."' ".($value->name==$row->status?"selected":"").">".$value->name."</option>";
                                          ?>
                                      <?php } endif;?>
                              </select>
                          </div>
                      </div>
                  <?php endif;?>
									</div>
								</div>
								<div class="col-sm-6">

									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="use_handle_by_id"> ទទួលស្គាល់ដោយ :<span class="required">*</span></label>

										<div class="col-sm-7">
											<select class="chosen-select form-control" id="use_handle_by_id" data-placeholder="សូមជ្រើសរើស..." name="use_handle_by_id">

												<option value="">  </option>
												<?php
													foreach($monks->result() as $row){
												?>
												<option value="<?php echo $row->id;?>" <?php echo set_select('use_handle_by_id', $row -> id); ?>><?php echo $row->username;?></option>
												<?php
													}
												?>
											</select>
											<?php echo form_error('use_handle_by_id'); ?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="request_date"> ថ្ងៃស្នើសុំ :<span class="required">*</span></label>

										<div class="col-sm-7">
											<div class="input-group">
												<input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" name="request_date" class="col-xs-10 col-sm-9" value="<?php echo set_value('request_date'); ?>"/>
												<span class="input-group-addon">
													<i class="fa fa-calendar bigger-110"></i>
												</span>
											</div>
											<?php echo form_error('request_date'); ?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="to_date"> ទៅថ្ងៃ :<span class="required">*</span></label>

										<div class="col-sm-7">
											<div class="input-group">
												<input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" name="to_date" class="col-xs-10 col-sm-9" value="<?php echo set_value('to_date'); ?>"/>
												<span class="input-group-addon">
													<i class="fa fa-calendar bigger-110"></i>
												</span>
											</div>
											<?php echo form_error('to_date'); ?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="notes"> កំណត់ចំនាំ :</label>

										<div class="col-sm-8">
											<textarea name="notes" class="col-xs-10 col-sm-10" rows="5"><?php echo set_value('notes'); ?></textarea>


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
