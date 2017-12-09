<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<div class="space-6"></div>

		<div class="row" id="collectionloan">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="widget-box transparent">
					<div class="widget-header widget-header-large">
						<h3 class="widget-title grey lighter">
							<!--<i class="ace-icon fa fa-leaf green"></i>--> 
							
							<span style="text-align: center;margin: 0px; font-size: 34px; text-transform: uppercase;">Quotations</span>
							<span style="font-size: 12px !important; margin-left: -200px !important;margin-top: 35px !important;position: absolute;">Date :<?php echo $quotations -> row() -> quo_date; ?></span>
							<div class="widget-toolbar hidden-480">
							<a href="#" onclick="printDiv('collectionloan')" target="_blank" title="Print Schedule Payment"> <i class="ace-icon fa fa-print"></i> </a>
						</div>
						</h3>

						<div class="widget-toolbar no-border invoice-info">
							<img src="<?php echo base_url();?>dist/images/<?php echo $this->config->item('logo');?>" style="width: auto;height: 80px;margin-top: -15px;" />
							<!--<span class="invoice-info-label">Issued ID:</span>
							<span class="red">#<?php echo $quotations -> row() -> quotation_id; ?></span>

							<br />
							<span class="invoice-info-label">Date:</span>
							<span class="blue"><?php echo $quotations -> row() -> quo_date; ?></span>-->
						</div>

						<!--<div class="widget-toolbar hidden-480">
							<a href="#" onclick="printDiv('collectionloan')" target="_blank" title="Print Schedule Payment"> <i class="ace-icon fa fa-print"></i> </a>
						</div>-->
						
					</div>

					<div class="widget-body">
						<div class="widget-main padding-24">
							<div class="row">
								<div class="col-sm-6">
									<div class="row">
										<div class="col-xs-11" style="text-align: left;">
											<b><?php echo $this->lang->line('common_company_info');?></b>
										</div>
									</div>

									<div>
										<ul class="list-unstyled spaced">
											<li>
												<i class="ace-icon fa fa-caret-right blue"></i><b><?php echo $this -> config -> item('company_name'); ?></b>
											</li>
											<li>
												<i class="ace-icon fa fa-caret-right blue"></i><?php echo $this -> config -> item('address'); ?>
											</li>
											<li>
												<i class="ace-icon fa fa-caret-right blue"></i><?php echo $this -> config -> item('phone'); ?>
											</li>

											


											<!--<li class="divider"></li><hr />

											<li>
												<i class="ace-icon fa fa-caret-right blue"></i>
												<b>Project</b>
											</li>
											
											<li>
												<i class="ace-icon fa fa-caret-right blue"></i>Name : <b class="red"> <?php echo $quotations->row()->name;?></b>
											</li>-->
											
											
											
										</ul>
									</div>
								</div><!-- /.col -->

								<div class="col-sm-6">
									<div class="row">
										<div class="col-xs-11" style="text-align: left;">
											<b>Issue To : <?php echo $quotations->row()->quo_issue_to;?></b>
										</div>
									</div>

									<div>
										<ul class="list-unstyled  spaced">
											<li>
												<i class="ace-icon fa fa-caret-right green"></i>Address : <?php echo $quotations->row()->quo_address;?>
											</li>
											<li>
												<i class="ace-icon fa fa-caret-right green"></i>H/P : <?php echo $quotations->row()->quo_hp;?>
											</li>
											<li>
												<i class="ace-icon fa fa-caret-right green"></i>Project Name:<b class="red"> <?php echo $quotations->row()->name;?></b>
											</li>

											<!--<li>
												<i class="ace-icon fa fa-caret-right green"></i><?php echo $this->lang->line('common_customer_khmer');?> : <?php echo $quotations -> row() -> name_kh; ?>
											</li>-->

											<li class="divider"></li><hr />

											
										</ul>
									</div>
								</div><!-- /.col -->
							</div><!-- /.row -->

							<div class="space"></div>

							<div>
								<table class="table table-striped table-bordered">
									<thead>
										<tr>
											<th class="center">#</th>
											<th>Name</th>
											<th>Description</th>
											
											<?php if($this->session->userdata('QTY')){?>
						                    	<th>QTY</th>
						                    <?php } ?>
						                    <?php if($this->session->userdata('UNIT')){?>
						                    	<th>Unit</th>
											<?php } ?>                    	
						                    <?php if($this->session->userdata('RATE')){?>
						                    	<th>Rate ($)</th>
						                    <?php } ?>
											<?php if($this->session->userdata('DISCOUNT')){?>
												<th>Discount (%)</th>
											<?php } ?>
											<?php if($this->session->userdata('AMOUNT')){?>
												<th>Amount ($)</th>
											<?php } ?>
											
											
										</tr>
									</thead>

									<tbody>			
											<?php
												$i=1;
												$total_amount=0;
												foreach($quotation_detail->result() as $row){
													$name=$row->name;
													$unit_price=$row->quo_detail_unit_price;
													$discount=$row->quo_detail_discount;
													$quantity=$row->quo_detail_quantity;
													$description=$row->description;
													$uom=$row->uom_name;
													$size=$row->quo_detail_size;
													
													$amount=((($unit_price*$size)*$quantity)* (1-($discount/100))*10000)/10000;
													//$amount=($unit_price*$size)*$quantity;
													$total_amount+=$amount;
													
											?>
													<tr>
														<td class="center"><?php echo $i;?></td>
														<td><?php echo $name;?></td>
														<td width="40%"><?php echo $description;?></td>
														<?php if($this->session->userdata('QTY')){?>
						                    			<td><?php echo $quantity;?></td>
									                    <?php } ?>
									                    <?php if($this->session->userdata('UNIT')){?>
									                    	<td><?php echo $uom;?></td>
														<?php } ?>                    	
									                    <?php if($this->session->userdata('RATE')){?>
									                    	<td><?php echo ($unit_price*$size);?>$</td>
									                    <?php } ?>
														<?php if($this->session->userdata('DISCOUNT')){?>
															<td><?php echo $discount;?></td>
														<?php } ?>
														<?php if($this->session->userdata('AMOUNT')){?>
															<td><?php echo $amount;?>$</td>
														<?php } ?>
																																																																		
														
													</tr>
											<?php
													$i++;
												}
											?>							
												
																														
									</tbody>
								</table>
							</div>

							<div class="hr hr8 hr-double hr-dotted"></div>

							<div class="row">
								<div class="col-sm-5 pull-right">
									<h5 class="pull-right"> <?php echo $this->lang->line('common_total_amount');?> : <span class="red"><?php echo $total_amount;?>$</span></h5>
									<div style="clear: both;"></div>
									
									<h5 class="pull-right"> Discount % : <?php echo $quotations -> row() ->quo_discount;?></h5>
									
									
									<div style="clear: both;"></div>
									<h5 class="pull-right"> VAT % : <?php echo $quotations -> row() ->quo_vat;?></h5>
									<div style="clear: both;"></div>
									<h5 class="pull-right"> Grand Total ($): <span class="red g_total_label"><?php echo $quotations -> row() ->quo_total_amount;?>$</span></h5>
									<input type="hidden" class="g_total" name="g_total" value="<?php echo $quotations -> row() ->quo_total_amount;?>"/>
								</div>
								<div class="col-sm-7 pull-left">
									<?php echo $this->lang->line('common_extra_info');?>
								</div>
							</div>

							<div class="space-6"></div>
							<div class="well">
								<?php echo nl2br($quotations -> row() -> quo_notes);?>
							</div>
							<br />
							<br />
							<br />
							<br />
							
								<div class="col-xs-12">
									<!-- PAGE CONTENT BEGINS -->
									<div class="col-xs-6" style="text-align: center;">
									______________________________________________________ <br />
										Agreed and Accepted by <br />Authorized Signatures</div>
									<div class="col-xs-6" style="text-align: center;">
									______________________________________________________ <br />
									<span style="color:red;">Kimse Lee Services Co,.Ltd </span><br />Authorized Signatures</div>
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

<script type="text/javascript">
function printDiv(divName) {
	
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
</script>