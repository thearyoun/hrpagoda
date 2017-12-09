<div class="col-sm-6">
									<div class="widget-main ">

										
										<div class="form-group">
											<label class="col-sm-3 col-sm-offset-1 control-label" for="from_date"> From Date :<span class="required">*</span></label>
	
											<div class="col-sm-7">
												<div class="input-group">
													<input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" name="from_date" class="col-xs-10 col-sm-9" required="required" value="<?php echo set_value('from_date'); ?>"/>
													<span class="input-group-addon">
														<i class="fa fa-calendar bigger-110"></i>
													</span>
												</div>
												<?php echo form_error('from_date'); ?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 col-sm-offset-1 control-label" for="loan_type"> Laon Types :</label>
	
											<div class="col-sm-7">
												<select id="loan_type" name="loan_type" class="col-xs-10 col-sm-10">
													<option value="">--Select Loan Type--</option>
													<?php
														foreach($loan_types->result() as $row){
													?>
													<option value="<?php echo $row -> loan_type_id; ?>" <?php echo set_select('loan_type', $row -> loan_type_id); ?>><?php echo $row -> name; ?></option>
													<?php
													}
													?>
												</select>
												<?php echo form_error('loan_type'); ?>
											</div>
										</div>

									</div>
								</div>
								<div class="col-sm-6">
									
									<div class="widget-main">

										
										<div class="form-group">
											<label class="col-sm-3 control-label" for="to_date"> To Date :<span class="required">*</span></label>
	
											<div class="col-sm-7">
												<div class="input-group">
													<input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" name="to_date" class="col-xs-10 col-sm-9" required="required" value="<?php echo set_value('to_date'); ?>"/>
													<span class="input-group-addon">
														<i class="fa fa-calendar bigger-110"></i>
													</span>
												</div>
												<?php echo form_error('to_date'); ?>
											</div>
										</div>
										<div class="form-group">
												<label class="col-sm-3 control-label " for="loan_term"> Loan Terms :</label>

												<div class="col-sm-7">
													<select id="loan_term" name="loan_term"  class="col-xs-10 col-sm-10">
														<option value="">--Select Loan Term--</option>
														<?php
															foreach($loan_terms->result() as $row){
														?>
														<option value="<?php echo $row -> loan_term_id; ?>" <?php echo set_select('loan_term', $row -> loan_term_id); ?>><?php echo $row -> name; ?></option>
														<?php
														}
														?>
													</select>
													<?php echo form_error('loan_term'); ?>
												</div>
											</div>
									</div>
								</div>