<!--<form class="form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>manage_reports/monks">
<div class="row">
		<div class="col-sm-12">
			<?php
				$this->load->view('backend/notification/index.php');
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
											<label class="col-sm-3 col-sm-offset-1 control-label" for="from_date"> <?php echo $this->lang->line('fm_from_date');?> :</label>
	
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
											<label class="col-sm-3 col-sm-offset-1 control-label" for="emp_code"> <?php echo $this->lang->line('fm_members');?> :</label>
	
											<div class="col-sm-7">
												<select class="chosen-select form-control" id="member" data-placeholder="Choose a member..." name="member">
													<option value=""></option>
													<?php
														foreach($members->result() as $row){
													?>
													<option value="<?php echo $row->id;?>" <?php echo set_select('member', $row -> id); ?>>( <?php echo $row->username;?> ) </option>
													<?php
														}
													?>
												</select>
												<?php echo form_error('member'); ?>
											</div>
										</div>

									</div>
								</div>
								<div class="col-sm-6">
									
									<div class="widget-main">

										
										<div class="form-group">
											<label class="col-sm-3 control-label" for="to_date"> <?php echo $this->lang->line('fm_to_date');?> :</label>
	
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
											&nbsp;
										</div>
									</div>
								</div>
								
								
								
								<div class="row">
									<div class="col-xs-12">
										<div class="clearfix form-actions">
											<div class="col-md-offset-5 col-md-7">
												
												<button class="btn btn-info" type="submit" id="btn-search">
													<i class="ace-icon fa fa-search bigger-110"></i>
													<?php echo $this->lang->line('fm_btn_search');?>
												</button>
							
												
												
												&nbsp; &nbsp; &nbsp;
												<button class="btn btn-default" type="button" id="btn-print" onclick="printDiv('members')">
													<i class="ace-icon fa fa-print bigger-110"></i>
													<?php echo $this->lang->line('fm_btn_print');?>
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
		</div>

</div>
<hr />-->
<div class="row" id="members">
	<div class="col-xs-12">
		<?php
			$this->load->view('backend/notification/index.php');
		?>
		<table id="sample-table-0" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center">#</th>
					
					<th><?php echo $this->lang->line('');?>ភិក្ខុឈ្មោះ</th>
					<th><?php echo $this->lang->line('');?>កុដិលេខ</th>
					<th><?php echo $this->lang->line('');?>ជនជាតិ</th>
					<th><?php echo $this->lang->line('');?>លេខទូរស័ព្</th>
					<th><?php echo $this->lang->line('');?>មកពីខេត្ត</th>
					<th><?php echo $this->lang->line('tb_dob');?></th>
					<th><?php echo $this->lang->line('');?>ស្ថានភាព</th>
					
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php
					$i=0;
					foreach($monks->result() as $row){
						
						if($row->status==1){
							$class="success";
							$status="Active";
						}else{
							$class="warning";
							$status="Inactive";
						}
				?>
						<tr>
							<td class="center"><?php echo ++$i;?></td>
		
							
							<td><?php echo $row->username;?></td>
							<td><?php echo $row->house_name;?></td>
							<td><?php echo $row->nation;?></td>
							<td><?php echo $row->phone_number;?></td>
							<td><?php echo $row->location_name;?></td>
							<td><?php echo $row->date_of_birth;?></td>
							<td><span class="label label-sm label-<?php echo $class;?>"><?php echo $status;?></span></td>
		
							
		
							<td>
								
								<div class="hidden-sm hidden-xs action-buttons">
					
									<!--<a class="green" href="<?php echo base_url();?>manage_monks/update_monk/<?php echo $row->id;?>" title="Edit monk"> <i class="ace-icon fa fa-pencil bigger-130"></i> </a>
									<?php
										if($row->name!="Admin"){
									?>
									<a class="red" href="<?php echo base_url();?>manage_monks/delete_monk/<?php echo $row->id;?>" title="Delete monk" onclick="return confirm('Are you sure want to delete this selected monk ?')"> <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>
									<?php
										}
									?>-->
									<a href="<?php echo base_url();?>manage_reports/monk_request_form/<?php echo $row->id;?>" class="tooltip-success" data-rel="tooltip" title="View Form"> <span class="green"> សុំស្នាក់នៅ </a> &nbsp; | &nbsp;
									<a href="<?php echo base_url();?>manage_reports/monk_confirm_stay_form/<?php echo $row->id;?>" class="tooltip-success" data-rel="tooltip" title="View Form"> <span class="green"> បញ្ចាក់ការស្នាក់នៅ </a>
											
									
								</div>
								<div class="hidden-md hidden-lg">
									<div class="inline position-relative">
										<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
											<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
										</button>
					
										<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
											
					
											<li>
												<a href="<?php echo base_url();?>manage_reports/monk_request_form/<?php echo $row->id;?>" class="tooltip-success" data-rel="tooltip" title="Edit"> <span class="green"> <i class="ace-icon fa fa-file-square-o bigger-120"></i> </span> </a>
											</li>
					
											
										</ul>
									</div>
								</div>
							</td>
						</tr>
				<?php
					}
				?>
				
			</tbody>
		</table>
	</div><!-- /.span -->
</div><!-- /.row -->
</form>
<hr />
<div style="text-align: center;">
	
	<button class="btn btn-warning" type="button" id="btn-print" onclick="printDiv('members')">
													<i class="ace-icon fa fa-print bigger-110"></i>
													<?php echo $this->lang->line('fm_btn_print');?>
												</button>
	
</div>
												
<script type="text/javascript">
function printDiv(divName) {
	//var divobj=document.getElementById('before_print');
	//divobj.setAttribute('class','print_size');
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
</script>