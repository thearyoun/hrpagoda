<form class="form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>manage_reports/member_book_forms">
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
											<label class="col-sm-3 col-sm-offset-1 control-label" for="house_id"> កុដលេខ :</label>
											<div class="col-sm-7">
												<select class="chosen-select form-control" id="house_id" data-placeholder="ជ្រើសរើសកុដលេខ..." name="house_id">
													<?php
													echo "<option value=''></option>";
														if($houses->num_rows()>0){
															foreach ($houses->result() as $row) {
																$set_select="";
																if($set==$row->id){
																	$set_select="selected";
																}
																echo "<option value='".$row->id."' ".$set_select.">".$row->name."</option>";
															}
														}
													?>
												</select>
												<?php echo form_error('house_id'); ?>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="widget-main">
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
		</div><!-- /.col -->
</div><!-- /.row -->
</form>
<hr />
<div class="row" id="members">
	<div class="col-xs-12">
		<?php
			$this->load->view('backend/notification/index.php');
		?>
		<?php
			$i = 1;
			foreach($members->result() as $row){
		?>
				<table class="table table-borderless">
					<tr>
						<th width="25%"><?php echo $this->lang->line('');?>-គោត្តនាម-នាម</th>
						<th width="5%">:</th>
						<td width="55%"><?php echo $row->username;?></td>
						<td width="15%"rowspan="4" align="center">
							<?php
								if($row->photo!=""){
							?>
								<img src="<?php echo base_url();?>ftemplate/images/<?php echo $row->photo;?>" width="100px"/>
							<?php
								}else{
							?>
								<img src="<?php echo base_url();?>ftemplate/images/no-profile-img.gif" width="100px"/>
							<?php
								}
								echo "<br/>".$i;
								echo "<br/>".$row->housename;
							?>
						</td>
					</tr>
					<tr>
						<th><?php echo $this->lang->line('');?>-តួនាទី</th>
						<th>:</th>
						<td><?php echo $row->position;?></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<th><?php echo $this->lang->line('');?>-ថៃ្ងខែឆ្នាំកំណើត</th>
						<th>:</th>
						<td><?php echo convertDateToKhmer($row->date_of_birth);?></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<th><?php echo $this->lang->line('');?>-ទីកន្លែងកំណើត</th>
						<th>:</th>
						<td><?php echo $row->place_of_birth;?></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<th><?php echo $this->lang->line('');?>-ថៃ្ងខែឆ្នាំចូលស្នាក់នៅ</th>
						<th>:</th>
						<td><?php echo convertDateToKhmer($row->stay_date);?></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<th><?php echo $this->lang->line('');?>-កំរិតវប្បធម៌</th>
						<th>:</th>
						<td>
							<?php
								echo $row->edname;
								if($row->gdname !=""){
									echo "(".$row->gdname.")";
								}
							?>
						</td>
						<td>&nbsp;</td>
					</tr>
					<!-- <tr>
						<th><?php echo $this->lang->line('');?>-ភាសា</th>
						<th>:</th>
						<td><?php echo $row->lang;?></td>
						<td>&nbsp;</td>
					</tr> -->
					<!-- <tr>
						<th><?php echo $this->lang->line('');?>-ស្នាក់នៅកុដលេខ</th>
						<th>:</th>
						<td><?php echo $row->housename;?></td>
						<td>&nbsp;</td>
					</tr> -->
					<!-- <tr>
						<th><?php echo $this->lang->line('');?>-ទទួលខុសត្រូវដោយ</th>
						<th>:</th>
						<td><?php echo $row->monkname;?></td>
						<td>&nbsp;</td>
					</tr> -->
					<tr>
						<th><?php echo $this->lang->line('');?>-អត្តសញ្ញាណប័ណ្ណលេខ	</th>
						<th>:</th>
						<td><?php echo $row->identify_card;?></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<th><?php echo $this->lang->line('');?>-លេខទូរស័ព្ទ	</th>
						<th>:</th>
						<td><?php echo $row->phone_number;?></td>
						<td>&nbsp;</td>
					</tr>
			</table>
			<hr style="height:3px;border:none;color:#333;background-color:#333;"/>
		<?php
				$i++;
			}
		?>
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
