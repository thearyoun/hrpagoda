<!DOCTYPE html>
<html lang="en">

	<!-- Mirrored from responsiweb.com/themes/preview/ace/1.3.2/tables.html by HTTrack Website Copier/3.x [XR&CO'2008], Mon, 17 Nov 2014 14:59:15 GMT -->
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $title; ?>
			- Loan Management System</title>

		<meta name="description" content="Chivorn Vann Loan Management System" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>font-awesome/4.2.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/jquery.gritter.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/select2.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/datepicker.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/bootstrap-editable.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
		<link rel="stylesheet" href="<?php echo base_url();?>dist/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		<link rel="stylesheet" href="<?php echo base_url();?>dist/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="<?php echo base_url(); ?>dist/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="<?php echo base_url();?>dist/js/html5shiv.min.js"></script>
		<script src="<?php echo base_url();?>dist/js/respond.min.js"></script>
		<![endif]-->
		<style>
			.required {
				color: red;
			}
		</style>
	</head>

	<body class="no-skin">

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try {
					ace.settings.check('main-container', 'fixed')
				} catch(e) {
				}
			</script>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="row">
	<div class="row">
	<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<div class="space-6"></div>

		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="widget-box transparent">
					<div class="widget-header widget-header-large">
						<h3 class="widget-title grey lighter"><i class="ace-icon fa fa-leaf green"></i> 
						<img src="<?php echo base_url();?>dist/images/<?php echo $this->config->item('logo');?>" style="width: 120px;height: 80px;" />
							&nbsp;&nbsp;&nbsp;<?php echo $this->lang->line('common_schedule_payment');?>
							
						</h3>

						<div class="widget-toolbar no-border invoice-info">
							<span class="invoice-info-label">Loan ID:</span>
							<span class="red">#<?php echo $loans -> row() -> loan_id; ?></span>

							<br />
							<span class="invoice-info-label">Date:</span>
							<span class="blue"><?php echo $loans -> row() -> released_date; ?></span>
						</div>

						
					</div>

					<div class="widget-body">
						<div class="widget-main padding-24">
							<div class="row">
								<div class="col-sm-6" style="float: left !important; margin-left:10px;">
									<div class="row">
										<div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
											<b><?php echo $this->lang->line('common_company_info');?></b>
										</div>
									</div>

									<div>
										<ul class="list-unstyled spaced">
											<li>
												<i class="ace-icon fa fa-caret-right blue"></i><?php echo $this->lang->line('common_company_name');?> : <?php echo $this -> config -> item('company_name'); ?>
											</li>

											<li>
												<i class="ace-icon fa fa-caret-right blue"></i><?php echo $this->lang->line('common_phone_number');?> : <?php echo $this -> config -> item('phone'); ?>
											</li>

											<li>
												<i class="ace-icon fa fa-caret-right blue"></i><?php echo $this->lang->line('common_address');?> : <?php echo $this -> config -> item('address'); ?>
											</li>


											<li class="divider"></li><hr />

											<li>
												<i class="ace-icon fa fa-caret-right blue"></i>
												<b><?php echo $this->lang->line('common_loan_info');?></b>
											</li>
											<li>
												<i class="ace-icon fa fa-caret-right blue"></i><?php echo $this->lang->line('common_employee_code');?> : <?php echo $loans -> row() -> employee_code; ?>
											</li>
											<li>
												<i class="ace-icon fa fa-caret-right blue"></i><?php echo $this->lang->line('common_employee');?> : <?php echo $loans -> row() -> employee_name; ?>
											</li>
											<li>
												<i class="ace-icon fa fa-caret-right blue"></i><?php echo $this->lang->line('common_employee_phone');?> : <?php echo $loans -> row() -> e_phone; ?>
											</li>
											<li>
												<i class="ace-icon fa fa-caret-right blue"></i><?php echo $this->lang->line('common_loan_amount');?> : <b class="red"><?php echo $loans -> row() -> amount; ?>$</b>
											</li>
											<li>
												<i class="ace-icon fa fa-caret-right blue"></i><?php echo $this->lang->line('common_circle');?> : <b class="red"><?php echo $loans -> row() -> revision; ?></b>
											</li>
											<li>
												<i class="ace-icon fa fa-caret-right blue"></i><?php echo $this->lang->line('common_time_payment');?> : <b class="red"><?php echo $loans -> row() -> number_time_payment; ?></b>
											</li>
											<li>
												<i class="ace-icon fa fa-caret-right blue"></i><?php echo $this->lang->line('common_release_date');?> : <b class="red"><?php echo $loans -> row() -> released_date; ?></b>
											</li>
											
											
											<li>
												<i class="ace-icon fa fa-caret-right blue"></i>
												<span style="font-size: 18px;"><?php echo $this->lang->line('common_payment_info');?></span>
											</li>
										</ul>
									</div>
								</div><!-- /.col -->

								<div class="col-sm-6" style="float: right !important;">
									<div class="row">
										<div class="col-xs-11 label label-lg label-success arrowed-in arrowed-right">
											<b><?php echo $this->lang->line('common_customer_info');?></b>
										</div>
									</div>

									<div>
										<ul class="list-unstyled  spaced">
											<li>
												<i class="ace-icon fa fa-caret-right green"></i><?php echo $this->lang->line('common_customer_number');?> : <?php echo $loans -> row() -> customer_code; ?>
											</li>

											<li>
												<i class="ace-icon fa fa-caret-right green"></i><?php echo $this->lang->line('common_customer_name');?> : <?php echo $loans -> row() -> customer_en; ?>
											</li>

											<li>
												<i class="ace-icon fa fa-caret-right green"></i><?php echo $this->lang->line('common_customer_khmer');?> : <?php echo $loans -> row() -> customer_kh; ?>
											</li>

											<li class="divider"></li><hr />

											<li>
												<i class="ace-icon fa fa-caret-right green"></i>
												<b><?php echo $this->lang->line('common_contact_info');?></b>
											</li>
											<li>
												<i class="ace-icon fa fa-caret-right green"></i><?php echo $this->lang->line('common_phone_number');?> : <?php echo $loans -> row() -> customer_phone; ?>
											</li>
											<li>
												<i class="ace-icon fa fa-caret-right green"></i><?php echo $this->lang->line('common_email');?> : <?php echo $loans -> row() -> customer_email; ?>
											</li>
											<li>
												<i class="ace-icon fa fa-caret-right green"></i><?php echo $this->lang->line('common_address');?> : <?php echo $loans -> row() -> customer_address; ?>
											</li>
											<li>
												<i class="ace-icon fa fa-caret-right green"></i><?php echo $this->lang->line('common_interest_type');?> : <b class="red"><?php echo $loans -> row() -> int_type_name; ?></b>
											</li>
											<li>
												<i class="ace-icon fa fa-caret-right green"></i><?php echo $this->lang->line('common_interest');?>  : <b class="red"><?php echo $loans -> row() -> number_interest; ?>%</b>
											</li>
											<li>
												<i class="ace-icon fa fa-caret-right green"></i><?php echo $this->lang->line('common_purpose');?> : <?php echo $loans -> row() -> purpose; ?>
											</li>
											
										</ul>
									</div>
								</div><!-- /.col -->
							</div><!-- /.row -->

							<div class="space"></div>

							<div>
								<table class="table table-striped table-bordered">
									<thead>
										<tr>
											<th class="center"><?php echo $this->lang->line('common_order');?></th>
											<th><?php echo $this->lang->line('common_payment_date');?></th>
											<th><?php echo $this->lang->line('common_principle_amount');?></th>
											<th><?php echo $this->lang->line('common_amount_payment');?></th>
											
											<th><?php echo $this->lang->line('common_total_amount_payment');?></th>
											<th><?php echo $this->lang->line('common_other');?></th>
										</tr>
									</thead>

									<tbody>
										<?php
											$holidays=array();
											
											foreach($holiday_arr->result() as $r){
												$holidays[]=$r->holiday_date;
											}
											
											$rest_day=array();
											if($this->config->item('Monday')=="YES"){
												$rest_day[]='Monday';
											}
											if($this->config->item('Tuesday')=="YES"){
												$rest_day[]='Tuesday';
											}
											if($this->config->item('Wednesday')=="YES"){
												$rest_day[]='Wednesday';
											}
											if($this->config->item('Thursday')=="YES"){
												$rest_day[]='Thursday';
											}
											if($this->config->item('Friday')=="YES"){
												$rest_day[]='Friday';
											}
											if($this->config->item('Saturday')=="YES"){
												$rest_day[]='Saturday';
											}
											if($this->config->item('Sunday')=="YES"){
												$rest_day[]='Sunday';
											}
											
										//https://www.daniweb.com/web-development/php/threads/105292/increment-date-by-week
											$number_payment=$loans->row()->number_time_payment;
											$loan_term=$loans->row()->using_loan_term_id;
											$amount=$loans->row()->amount;
											$interest=$loans->row()->number_interest;
											$using_interest_id=$loans->row()->using_interest_id;
											$week_term=0;
											if($loan_term==1){
												//TERMS (Daily)
												
											}else if($loan_term==2){
												//TERMS (Weekly)
												$week_term=1;
											}else if($loan_term==3){
												//TERMS (Two weekly)
												$week_term=2;
											}else if($loan_term==4){
												//TERMS (Three Weekly)
												$week_term=3;
											}else if($loan_term==5){
												//TERMS(Monthly)
											}
											$amount_princeple=0;
											$day_offset=array();
											if($week_term==1 || $week_term==2 || $week_term==3){
													
													$amount_process=0;
													
													$increment = 1;		//  # of weeks to increment by
													//  First day of the first week of the year
													$startdate = strtotime($loans->row()->deduction_start);
													//  $all_weeks[1] is the first partial week of the year
													//  $all_weeks[53] is the last partial week of the year
													$all_weeks = array();
													$total=0;
													
													for ($week = 0; $week < $number_payment; $week += $increment){
														$week_cycle=$week_term;
														$nw = ($week* $week_cycle) + 1;//+ 1 to be in the next range	
													  $week_data = array();
													  //$week_data['start'] = strtotime("+$nw weeks", $startdate);
													 // $week_data['end'] = strtotime("+6 days", $week_data['start']);
													  $date_t=date('Y-m-d',strtotime("+$nw weeks", $startdate));
														
														while (isExist($date_t,$day_offset,$holidays,$rest_day)) {
															$date_t = date('Y-m-d',strtotime("+1 day", strtotime($date_t)));
																	
														}
														$day_offset[$week]=$date_t;
													$week_data['start']=strtotime($date_t);
													
													  $all_weeks[$week + 1] = $week_data;
													}
													
													//echo "Week No.	Start Date	End Date\r\n";
													$i=1;
													foreach ($all_weeks as $week => $week_data){
														
														$amount_paid=$amount-$amount_process;
														if($using_interest_id==1 || $using_interest_id==2){
															$payment=((($amount_paid*($interest/100))*$number_payment)+$amount)/$number_payment;
														}else{
															if($i==$number_payment){
																$payment=(($amount_paid*$interest)/100)+$amount;
															}else{
																$payment=(($amount_paid*$interest)/100);	
															}
															
														}
														
														
													 
														$timestamp = strtotime(date("Y-m-d", $week_data['start']));
														$day = date('l', $timestamp);
													?>
			<tr>
													<td class="center"><?php echo $increment; ?></td>
													<?php $day_display="common_".$day;?>
													<td><a href="#"><?php echo $this->lang->line($day_display); ?> - <?php echo date("Y-m-d", $week_data['start']); ?></a></td>
													<td > <?php echo round($loans -> row() -> amount-$amount_princeple,2); ?>$</td>
													<td > <?php echo round($loans -> row() -> amount/$number_payment,2); ?>$</td>
													
													<td > <?php echo round($payment,2); ?>$</td>
													<td>&nbsp;</td>
												</tr>
													<?php
														$increment++;
														$total+=$payment;
														if($using_interest_id==2){
															$amount_process+=$amount/$number_payment;
														}
														$i++;
														$amount_princeple+=$loans -> row() -> amount/$number_payment;
													}
												}else if ($loan_term==1){
													
													
													$amount_process=0;
													
													$increment = 1;		//  # of weeks to increment by
													//  First day of the first week of the year
													$startdate = strtotime($loans->row()->deduction_start);
													//  $all_weeks[1] is the first partial week of the year
													//  $all_weeks[53] is the last partial week of the year
													$all_days = array();
													$total=0;
													
													for ($day = 0; $day < $number_payment; $day += $increment){
														$day_cycle=1;
														$nw = ($day* $day_cycle) + 1;//+ 1 to be in the next range	
													  $day_data = array();
													  //$day_data['start'] = strtotime("+$nw days", $startdate);
													  //$day_data['end'] = strtotime("+1 days", $day_data['start']);
													  
													  $date_t=date('Y-m-d',strtotime("+$nw days", $startdate));
														
														while (isExist($date_t,$day_offset,$holidays,$rest_day)) {
															$date_t = date('Y-m-d',strtotime("+1 day", strtotime($date_t)));
																	
														}
														$day_offset[$day]=$date_t;
													$day_data['start']=strtotime($date_t);
													  
													  $all_days[$day + 1] = $day_data;
													  
													}
													
													//echo "Week No.	Start Date	End Date\r\n";
													$i=1;
													foreach ($all_days as $day => $day_data){
														$amount_paid=$amount-$amount_process;
														if($using_interest_id==1 || $using_interest_id==2){
															$payment=((($amount_paid*($interest/100))*$number_payment)+$amount)/$number_payment;
														}else{
															if($i==$number_payment){
																$payment=(($amount_paid*$interest)/100)+$amount;
															}else{
																$payment=(($amount_paid*$interest)/100);	
															}
															
														}
														
														
														$timestamp = strtotime(date("Y-m-d", $day_data['start']));
														$day_name = date('l', $timestamp);
														
														
													?>
			<tr>
													<td class="center"><?php echo $increment; ?></td>
													<?php $day_display="common_".$day_name; ?>
													<td><a href="#"><?php echo $this->lang->line($day_display); ?> - <?php echo date("Y-m-d", $day_data['start']); ?></a></td>
													<td > <?php echo round($loans -> row() -> amount-$amount_princeple,2); ?>$</td>
													<td > <?php echo round($loans -> row() -> amount/$number_payment,2); ?>$</td>
													
													<td > <?php echo round($payment,2); ?>$</td>
													<td>&nbsp;</td>
												</tr>
													<?php
														$increment++;
														$total+=$payment;
														if($using_interest_id==2){
															$amount_process+=$amount/$number_payment;
														}
														$amount_princeple+=$loans -> row() -> amount/$number_payment;
														$i++;
													}
													
												}else if($loan_term==5){
													$amount_process=0;
													
													$increment = 1;		//  # of weeks to increment by
													//  First day of the first week of the year
													$startdate = strtotime($loans->row()->deduction_start);
													//  $all_weeks[1] is the first partial week of the year
													//  $all_weeks[53] is the last partial week of the year
													$all_days = array();
													$total=0;
													
													for ($day = 0; $day < $number_payment; $day += $increment){
														$day_cycle=1;
														$nw = ($day* $day_cycle) + 1;//+ 1 to be in the next range	
													  $day_data = array();
													 // $day_data['start'] = strtotime("+$nw month", $startdate);
													  //$day_data['end'] = strtotime("+1 month", $day_data['start']);
													  
													  $date_t=date('Y-m-d',strtotime("+$nw month", $startdate));
														
														while (isExist($date_t,$day_offset,$holidays,$rest_day)) {
															$date_t = date('Y-m-d',strtotime("+1 day", strtotime($date_t)));
																	
														}
														$day_offset[$day]=$date_t;
													$day_data['start']=strtotime($date_t);
													
													  $all_days[$day + 1] = $day_data;
													}
													
													//echo "Week No.	Start Date	End Date\r\n";
													$i=1;
													foreach ($all_days as $day => $day_data){
														$amount_paid=$amount-$amount_process;
														if($using_interest_id==1 || $using_interest_id==2){
															$payment=((($amount_paid*($interest/100))*$number_payment)+$amount)/$number_payment;
														}else{
															if($i==$number_payment){
																$payment=(($amount_paid*$interest)/100)+$amount;
															}else{
																$payment=(($amount_paid*$interest)/100);	
															}
															
														}
														
														
													
														$timestamp = strtotime(date("Y-m-d", $day_data['start']));
														$day_name = date('l', $timestamp);
													?>
			<tr>
													<td class="center"><?php echo $increment; ?></td>
													<?php $day_display="common_".$day_name; ?>
													<td><a href="#"><?php echo $this->lang->line($day_display); ?> - <?php echo date("Y-m-d", $day_data['start']); ?></a></td>
													<td > <?php echo round($loans -> row() -> amount-$amount_princeple,2); ?>$</td>
													<td > <?php echo round($loans -> row() -> amount/$number_payment,2); ?>$</td>
													
													<td > <?php echo round($payment,2); ?>$</td>
													<td>&nbsp;</td>
												</tr>
													<?php
														$increment++;
														$total+=$payment;
														if($using_interest_id==2){
															$amount_process+=$amount/$number_payment;
														}
														$i++;
														$amount_princeple+=$loans -> row() -> amount/$number_payment;  
													}
												}
												?>
											
										
									</tbody>
								</table>
							</div>

							<div class="hr hr8 hr-double hr-dotted"></div>

							<div class="row">
								<div class="col-sm-5 pull-right">
									
								</div>
								<div class="col-sm-7 pull-left">
									<?php echo $this->lang->line('common_extra_info');?>
								</div>
							</div>

							<div class="space-6"></div>
							<div class="well">
								<?php echo nl2br($this->config->item('schedule_note'));?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content -->

<?php
	/*$rest_day=array('Saturday','Sunday');
	if(in_array('Saturday', $rest_day)){
		$date = strtotime("+1 day", strtotime('2015-05-16'));
		echo date("Y-m-d", $date);
	}
	function check_date_payment($holidays,$rest_day,$date_pay){
		if(in_array($date_pay, $holidays)){
			$date = strtotime("+1 day", strtotime($date_pay));
			return date("Y-m-d", $date);
		}else{
			return $date_pay;
		}
		
	}*/
	//$timestamp = strtotime(date("Y-m-d", '2015-05-17'));
	//$day_name = date('l', $timestamp);
	
	
			/*$date_t='2015-05-17';
			
			while (isExist($date_t)) {
				$date_t = date('Y-m-d',strtotime("+1 day", strtotime($date_t)));
				
				
			}
			echo $date_t;*/
			
			
	function isExist($date_t,$day_offset,$holidays,$rest_day) {
		
		
		$timestamp = strtotime(date("Y-m-d", strtotime($date_t)));
		$day_name = date('l', $timestamp);
		
		//$day_name = date('l', $timestamp);
		if(in_array($day_name, $rest_day) || in_array($date_t, $day_offset) || in_array($date_t, $holidays)){
			return true;
		}else{
			return false;
		}
	}
	
?>
</div><!-- /.row -->
</div><!-- /.page-content -->

<?php
	/*$rest_day=array('Saturday','Sunday');
	if(in_array('Saturday', $rest_day)){
		$date = strtotime("+1 day", strtotime('2015-05-16'));
		echo date("Y-m-d", $date);
	}
	function check_date_payment($holidays,$rest_day,$date_pay){
		if(in_array($date_pay, $holidays)){
			$date = strtotime("+1 day", strtotime($date_pay));
			return date("Y-m-d", $date);
		}else{
			return $date_pay;
		}
		
	}*/
	//$timestamp = strtotime(date("Y-m-d", '2015-05-17'));
	//$day_name = date('l', $timestamp);
	
	
			/*$date_t='2015-05-17';
			
			while (isExist($date_t)) {
				$date_t = date('Y-m-d',strtotime("+1 day", strtotime($date_t)));
				
				
			}
			echo $date_t;*/
			
			
	
	
?>
</div><!-- /.row -->
</div><!-- /.page-content -->
				</div><!-- /.page-content -->
			</div><!-- /.page-content -->
		</div>
		</div><!-- /.main-content -->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse"> <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i> </a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<script>
			window.print();
		</script>
	</body>

	<!-- Mirrored from responsiweb.com/themes/preview/ace/1.3.2/tables.html by HTTrack Website Copier/3.x [XR&CO'2008], Mon, 17 Nov 2014 14:59:17 GMT -->
</html>
