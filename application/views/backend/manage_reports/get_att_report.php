<form class="form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>manage_reports/get_att_report/<?php echo $this->uri->segment(3);?>">
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
</form>
<hr />
<div class="row" id="members">
	<div class="col-xs-12">
		<?php
			$this->load->view('backend/notification/index.php');
		?>
		<p class=MsoNormal align=center style='margin-bottom:0;margin-bottom:
    .0001pt;text-align:center;line-height:normal;font-weight: bold'>
    <span lang=KHM style='font-size:13.0pt;font-family:"Khmer OS Battambang"'>ព្រះរាជាណាចក្រកម្ពុជា<br />ជាតិ សាសនា ព្រះមហាក្សត្រ</span></p>
    <p class=MsoNormal align=left style='margin-bottom:0;margin-bottom:
    .0001pt;text-align:left ;line-height:normal;font-weight: bold'>
    <span lang=KHM style='font-size:13.0pt;font-family:"Khmer OS Battambang"'>វត្តលង្កាព្រះកុសុមារាម </span></p>
    <p class=MsoNormal align=left style='margin-bottom:0;text-align:center;line-height:normal;font-weight: bold'><span lang=KHM style='font-size:13.0pt;font-family:"Khmer OS Battambang"'>បញ្ជីស្រង់វត្តមានព្រះសង្ឃនមស្សការពេលចូលព្រះវស្សា </span></p>
 <p class=MsoNormal align=left style='margin-bottom:0;margin-bottom:0;text-align:center;line-height:normal;font-weight: normal'><span lang=KHM style='font-size:13.0pt;font-family:"Khmer OS Battambang"'>ចាប់ពីថ្ងៃទី ០១ ខែសីហា ដល់ ថ្ងៃទី ៣០ ខែសីហា ត្រូវ ថ្ងៃ ២រោច ខែទុតិយាសាឍ <br />ឆ្នំា មមែ សប្តស័ក ព.ស. ២៥៥៩ គ.ស. ២០១៥ <br /><?php echo $group->row()->name?></span></p>
 
    <br />
		
		<table id="sample-table-0" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center" rowspan="2">#</th>
					<th rowspan="2"><?php echo $this->lang->line('');?>គោត្តនាម-នាម</th>
					<th rowspan="2"><?php echo $this->lang->line('');?>កុដិលេខ</th>
					<th colspan="2" class="center"><?php echo $this->lang->line('');?>វត្តមាន</th>
					<th colspan="2" class="center"><?php echo $this->lang->line('');?>ពេលល្ងាច</th>
					<th colspan="2" class="center"><?php echo $this->lang->line('');?>ពេលព្រឹក</th>
					<th colspan="2" class="center"><?php echo $this->lang->line('');?>សរុប</th>
				</tr>
				<tr>
					<th><?php echo $this->lang->line('');?>មានវត្តមាន</th>
					<th><?php echo $this->lang->line('');?>អត់វត្តមាន</th>
					<th><?php echo $this->lang->line('');?>ម.ច្បាប់</th>
					<th><?php echo $this->lang->line('');?>អ.ច្បាប់</th>
					<th><?php echo $this->lang->line('');?>ម.ច្បាប់</th>
					<th><?php echo $this->lang->line('');?>អ.ច្បាប់</th>
					<th><?php echo $this->lang->line('');?>ម.ច្បាប់</th>
					<th><?php echo $this->lang->line('');?>អ.ច្បាប់</th>
				</tr>
			</thead>

			<tbody>
				<?php
					$i = 1;
					
					foreach($attendants->result() as $row){
										
				?>
						<tr>
							<td class="center"><label class="position-relative"><?php echo $i;?></label></td>
							<td><a href="#"><?php echo $row->username;?></a></td>
							<td><?php echo $row->house_name;?> </td>
							<td><?php echo $row->total_present;?> </td>
							<td><?php echo $row->total_absent;?> </td>
							<td><?php echo $row->evening_has;?> </td>
							<td><?php echo $row->evening_no;?> </td>
							<td><?php echo $row->morning_has;?> </td>
							<td><?php echo $row->morning_no;?> </td>
							
							<td><?php echo $row->morning_has+$row->evening_has ;?></td>
							<td><?php echo $row->morning_no+$row->evening_no ;?></td>
						</tr>
				<?php
						$i++;
					}
				?>
				
			</tbody>
			
		</table>
		
		<p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;text-align:right;line-height:normal;'>
     <span lang=KHM
    style='font-size:12.0pt;font-family:"Khmer OS Battambang"'>វត្តលង្កា ថ្ងៃទី........ខែ .............ឆ្នាំ ...........<br />
<span style="padding-right: 10% !important;">អ្នកស្រង់វត្តមាន
</span></p>

<p class=MsoNormal align=left style='margin-top: -60px;margin-bottom:.0001pt;text-align:left;line-height:normal;'>
     <span lang=KHM
    style='font-size:12.0pt;font-family:"Khmer OS Battambang"'>បានឃើញ និងឯកភាព<br />
<span>          ចៅអធិការ
</span></p>
	</div><!-- /.span -->
</div><!-- /.row -->
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