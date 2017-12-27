<form class="form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>manage_reports/monk_book_forms">
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
											<label class="col-sm-3 col-sm-offset-1 control-label" for="house"> កុដិលេខ :</label>
											<div class="col-sm-7">
												<select class="chosen-select form-control" id="house" data-placeholder="Choose a house number..." name="house">
													<option value=""></option>
													<?php
														foreach($houses->result() as $row){
													?>
													<option value="<?php echo $row->id;?>" <?php echo set_select('house', $row -> id); ?>><?php echo $row->name;?> </option>
													<?php
														}
													?>
												</select>
												<?php echo form_error('house'); ?>
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
												<button class="btn btn-default" type="button" id="btn-print" onclick="printDiv('monks')">
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
<div class="row" id="monks">
	<div class="col-xs-12"​>
		<?php
			$this->load->view('backend/notification/index.php');
		?>
		<?php
			$i = 1;
			foreach($monks->result() as $row){
		?>
				<table class="table table-borderless">
					<tr>
						<th width="25%"><?php echo $this->lang->line('');?>-គោត្តនាម-នាម</th>
						<th width="5%">:</th>
						<td width="55%"><?php echo $row->username;?></td>
						<td width="15%" rowspan="4" align="center">
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
							?>

							</td>
					</tr>
					<tr>
						<th><?php echo $this->lang->line('');?>-តួនាទី</th>
						<th>:</th>
						<td><?php echo $row->position_name;?></td>
					</tr>
					<tr>
						<th><?php echo $this->lang->line('');?>-ថ្ងៃខែថ្ងៃកំណើត</th>
						<th>:</th>
						<td><?php echo convertDateToKhmer($row->date_of_birth);?></td>

					</tr>
					<tr>
						<th><?php echo $this->lang->line('');?>-ទីកន្លែងកំណើត</th>
						<th>:</th>
						<td><?php echo $row->place_of_birth;?></td>

					</tr>
					<tr>
						<th><?php echo $this->lang->line('');?>-ថ្ងៃខែឆ្នាំបួស-វត្ត</th>
						<th>:</th>
						<td><?php echo convertDateToKhmer($row->vegetarian_date);?> <b>នៅវត្ត</b> : <?php echo $row->vegetarian_place;?></td>
						<td align="center"><?php echo $i;?></td>
					</tr>
					<tr>
						<th><?php echo $this->lang->line('');?>-ភិក្ខុ-សាមណេរ</th>
						<th>:</th>
						<td><?php echo $row->vegetarian_name;?> (
							<?php
							    $vegetarian_date= $row->vegetarian_date;
							    $diff = (date('Y') - date('Y',strtotime($vegetarian_date)));
							    echo convertNumberToKhmer($diff);
							?>
 វស្សា) លេខឆាយា  : <?php echo $row->monk_number;?></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<th><?php echo $this->lang->line('');?>-ថ្ងៃខែឆ្នាំចូលស្នាក់នៅ</th>
						<th>:</th>
						<td><?php echo convertDateToKhmer($row->stay_date);?></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<th><?php echo $this->lang->line('');?>-កំរិតវប្បធម៌</th>
						<th>:</th>
						<td>
							<?php
								echo monk_knowledge_return($row->education);
								if($row->grade !=""){
									echo "(".grade_return($row->grade).")";
								}
							?>
						</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<th><?php echo $this->lang->line('');?>-លេខទូរស័ព្ទ</td>
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
	<button class="btn btn-warning" type="button" id="btn-print" onclick="printDiv('monks')">
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
