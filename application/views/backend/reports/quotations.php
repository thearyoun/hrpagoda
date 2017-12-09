<?php
	if(isset($_REQUEST['from_date'])){
		$fdate=$_REQUEST['from_date'];
	}else{
		$fdate="";
	}
	if(isset($_REQUEST['to_date'])){
		$tdate=$_REQUEST['to_date'];
	}else{
		$tdate="";
	}
	if(isset($_REQUEST['emp_code'])){
		$lcus=$_REQUEST['emp_code'];
	}else{
		$lcus="";
	}
	if(isset($_REQUEST['cus_code'])){
		$lemp=$_REQUEST['cus_code'];
	}else{
		$lemp="";
	}
?>

<form class="form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>reports/quotations">
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
													<input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" name="from_date" class="col-xs-10 col-sm-9" value="<?php echo set_value('from_date'); ?>" required/>
													<span class="input-group-addon">
														<i class="fa fa-calendar bigger-110"></i>
													</span>
												</div>
												<?php echo form_error('from_date'); ?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 col-sm-offset-1 control-label" for="project"> Projects :</label>
	
											<div class="col-sm-7">
												<select class="chosen-select form-control" id="project" data-placeholder="Choose a Project..." name="project">
													<option value=""></option>
													<?php
														foreach($projects->result() as $row){
													?>
													<option value="<?php echo $row->project_id;?>" <?php echo set_select('project', $row -> project_id); ?>><?php echo $row->name;?> </option>
													<?php
														}
													?>
												</select>
												<?php echo form_error('project'); ?>
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
													<input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" name="to_date" class="col-xs-10 col-sm-9" value="<?php echo set_value('to_date'); ?>" required/>
													<span class="input-group-addon">
														<i class="fa fa-calendar bigger-110"></i>
													</span>
												</div>
												<?php echo form_error('to_date'); ?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3  control-label" for="cus_code"> &nbsp;</label>
	
											<div class="col-sm-7">
												&nbsp;
											</div>
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
							
												<!--&nbsp; &nbsp; &nbsp;
												<a href="<?php echo base_url();?>reports/export_loan_payment/?from_date=<?php echo $fdate;?>&to_date=<?php echo $tdate;?>&lemp=<?php echo $lemp;?>&lcus=<?php echo $lcus;?>"><button class="btn btn-primary" type="button" id="btn-approve">
													<i class="ace-icon fa fa-check bigger-110"></i>
													Export
												</button></a>-->
												
												&nbsp; &nbsp; &nbsp;
												<button class="btn btn-default" type="button" id="btn-print" onclick="printDiv('collectionloan')">
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
		<table id="sample-table-3" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Quotation No</th>
					<th>Project</th>					
					<th>Date</th>
					<th>Discount %</th>
					<th>VAT %</th>
					<th>Amount</th>					
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php
					
					$i=1;
					foreach($quotations->result() as $row){
						
				?>
						<tr>
							
							<td><a href="#"><?php echo $i;?></a></td>
							<td><a href="#">QT-000<?php echo $row->quotation_id;?> </a></td>
							
							<td><?php echo $row->name;?></td>
							<td><?php echo $row->quo_date;?></td>
							<td><?php echo $row->quo_discount;?></td>
							<td><?php echo $row->quo_vat;?></td>
							<td><?php echo $row->quo_total_amount;?>$</td>
							
		
							<td  class="center">
								
								<div class="hidden-sm hidden-xs action-buttons">
									
									
									<a class="blue" href="<?php echo base_url();?>reports/quotation_form/<?php echo $row->quotation_id;?>" title="View Quotation " target="_blank"> <i class="ace-icon fa fa-eye bigger-130"> View </i> </a> | 
									<a class="blue" href="<?php echo base_url();?>reports/export_quotation/<?php echo $row->quotation_id;?>" title="Export Quotation " target="_blank"> <i class="ace-icon fa fa-file bigger-130"> Export</i> </a>
								</div>
								<div class="hidden-md hidden-lg">
									<div class="inline position-relative">
										<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
											<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
										</button>
					
										<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
											
					
											
					
											<li>
												<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete"> <span class="red"> <i class="ace-icon fa fa-trash-o bigger-120"></i> </span> </a>
											</li>
										</ul>
									</div>
								</div>
							</td>
						</tr>
				<?php
						$i++;
					}
				?>
				
			</tbody>
		</table>
	</div><!-- /.span -->
</div><!-- /.row -->

<?php
	//print_r(getDatesFromRange( '2010-10-01', '2010-10-04' ));


   /*$startDate='2010-10-01';
   $endDate='2010-10-05';
   $start = $startDate;
   $i=0;
    
   while (strtotime($start) < strtotime($endDate)){
   	$start = date('Y-m-d', strtotime($startDate.'+'.$i.' days'));
    echo $start;
	$i++;
   }*/
    
