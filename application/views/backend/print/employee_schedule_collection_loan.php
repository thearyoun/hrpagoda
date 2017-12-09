<form class="form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>reports/employee_schedule_collection_loan">
<div class="row">
		<div class="col-sm-12">
			<?php
				$this->load->view('notification/index.php');
			?>
			<div class="widget-box">
				<div class="widget-header">
					<h4 class="smaller"> Search Information</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main">
						<div class="widget-body">
							<div class="row">
								<div class="col-sm-6">
									<div class="widget-main ">

										
										<div class="form-group">
											<label class="col-sm-3 col-sm-offset-1 control-label" for="from_date"> From Date :</label>
	
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
											<label class="col-sm-3 col-sm-offset-1 control-label" for="emp_code"> Employees :</label>
	
											<div class="col-sm-7">
												<select class="chosen-select form-control" id="emp_code" data-placeholder="Choose a Employee..." name="emp_code">
													<option value=""></option>
													<?php
														foreach($employees->result() as $row){
													?>
													<option value="<?php echo $row->employee_id;?>" <?php echo set_select('emp_code', $row -> employee_id); ?>><?php echo $row->employee_code;?> &nbsp; ( <?php echo $row->username_en;?> )</option>
													<?php
														}
													?>
												</select>
												<?php echo form_error('emp_code'); ?>
											</div>
										</div>

									</div>
								</div>
								<div class="col-sm-6">
									
									<div class="widget-main">

										
										<div class="form-group">
											<label class="col-sm-3 control-label" for="to_date"> To Date :</label>
	
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
												
										</div>
									</div>
								</div>
								
								
								
								<div class="row">
									<div class="col-xs-12">
										<div class="clearfix form-actions">
											<div class="col-md-offset-4 col-md-8">
												
												<button class="btn btn-info" type="submit" id="btn-search">
													<i class="ace-icon fa fa-search bigger-110"></i>
													Search
												</button>
							
												&nbsp; &nbsp; &nbsp;
												<button class="btn btn-primary" type="button" id="btn-export">
													<i class="menu-icon fa fa-file-o bigger-110"></i>
													Export
												</button>
												
												&nbsp; &nbsp; &nbsp;
												<button class="btn btn-default" type="button" id="btn-print">
													<i class="ace-icon fa fa-print bigger-110"></i>
													Print
												</button>
												
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
</form>
<hr />
<div class="row">
	<div class="col-xs-12">
		<?php
			$this->load->view('notification/index.php');
		?>
		<table id="sample-table-1" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Account</th>
					<th>English Name</th>
					<th>khmer Name</th>
					<th>Telephone</th>
					<th>Disb. Date</th>
					<th>Disb. Amount</th>
					<th>Due Date</th>
					<th>Repay Amount</th>
					<th>Outstanding</th>
					<th>Paid Time</th>
					<th>Date Late</th>
				</tr>
			</thead>

			<tbody>
				<?php
					$total_paid_amount_arr=array();
					$total_amount_payment_arr=array();
					$customer_loans=array();
					if($total_paid_amount->num_rows()>0){
						foreach($total_paid_amount->result() as $row_s){
							$total_paid_amount_arr[$row_s->loan_id]=$row_s->amount_en+($row_s->amount_kh/4000);
							//$total_paid_amount_arr[$row_s->loan_id]=$row_s->count_paid_time;
							
							
						}
					}
					
					
					foreach($total_amount_payment->result() as $row_M){
						$total_amount_payment_arr[$row_M->using_loan_id]=$row_M->total_outstanding;
						$customer_loans[$row_M->using_loan_id]=0;
					}
					
				?>
				<?php
					$i=1;
					foreach($loans->result() as $row){
						
						$customer_loans[$row->loan_id]+=$row->payment_amount;
						$now=date('Y-m-d');
						$payment_date=$row->payment_date;
						$diff = (strtotime($now)- strtotime($payment_date))/24/3600; 
						
						
				?>
						<tr>
							<td><?php echo $i;?></td>
							<td><a href="#"><?php echo $row->code_number;?></a></td>
							<td><a href="#"><?php echo $row->cus_en;?></a></td>
							<td><a href="#"><?php echo $row->cus_kh;?></a></td>
							<td><?php echo $row->phone;?></td>
							<td><?php echo $row->released_date;?></td>
							<td><?php echo $row->amount;?>$</td>
							<td><?php echo $row->payment_date;?></td>
							
							<td><?php echo $row->payment_amount;?>$</td>
							<td><?php echo ($total_amount_payment_arr[$row->loan_id]-$total_paid_amount_arr[$row->loan_id])-$customer_loans[$row->loan_id];?>$</td>
							
							<td><?php echo $row->number_time_payment;?></td>
							<td><?php echo $diff;?></td>
							
						</tr>
				<?php
						
						$i++;
					}
				?>
				
			</tbody>
		</table>
	</div><!-- /.span -->
</div><!-- /.row -->