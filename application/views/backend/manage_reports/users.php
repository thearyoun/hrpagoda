<form class="form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>manage_reports/users">
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
											<label class="col-sm-3 col-sm-offset-1 control-label" for="emp_code"> <?php echo $this->lang->line('fm_employees');?> :</label>
	
											<div class="col-sm-7">
												<select class="chosen-select form-control" id="emp_code" data-placeholder="Choose a Employee..." name="emp_code">
													<option value=""></option>
													<?php
														foreach($users->result() as $row){
													?>
													<option value="<?php echo $row->user_id;?>" <?php echo set_select('emp_code', $row -> user_id); ?>><?php echo $row->username;?> </option>
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
												<button class="btn btn-default" type="button" id="btn-print" onclick="printDiv('users')">
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
</form>
<hr /> 
<div class="row" id="users">
	<div class="col-xs-12">
		<?php
			$this->load->view('backend/notification/index.php');
		?>
		<table id="sample-table-0" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center">#</th>
					<th><?php echo $this->lang->line('tb_username');?></th>
					<th><?php echo $this->lang->line('tb_email');?></th>
					<th><?php echo $this->lang->line('tb_phone');?></th>
					<th><?php echo $this->lang->line('tb_access_level');?></th>
					<th><?php echo $this->lang->line('tb_status');?></th>
					<th><?php echo $this->lang->line('tb_created_date');?></th>
				
				</tr>
			</thead>

			<tbody>
				<?php
					$i=0;
					foreach($user_list->result() as $row){
						
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
		
							<td><a href="#"><?php echo $row->username;?></a></td>
							<td><?php echo $row->email;?></td>
							<td><?php echo $row->phone;?></td>
							<td><?php echo $row->name;?></td>
							<td><span class="label label-sm label-<?php echo $class;?>"><?php echo $status;?></span></td>
		
							<td><?php echo $row->created_at;?></span></td>
		
						</tr>
				<?php
					}
				?>
				
			</tbody>
		</table>
	</div><!-- /.span -->
</div><!-- /.row -->
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