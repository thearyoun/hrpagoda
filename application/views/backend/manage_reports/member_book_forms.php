<div class="row" id="members">
	<div class="col-xs-12">
		<?php
			$this->load->view('backend/notification/index.php');
		?>
		<?php
			$i = 1;
			foreach($monks->result() as $row){
		?>
				<table class="table table-bordered">
			
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
							?>
						</td>						
					</tr>
					<tr>					
						<th><?php echo $this->lang->line('');?>-តួនាទី</th>
						<th>:</th>
						<td><?php echo $row->position;?></td>		
														
					</tr>
					<tr>					
						<th><?php echo $this->lang->line('');?>-ថៃ្ងខែឆ្នាំកំណើត</th>
						<th>:</th>
						<td><?php echo convertDateToKhmer($row->date_of_birth);?></td>		
														
					</tr>
					<tr>					
						<th><?php echo $this->lang->line('');?>-ទីកន្លែងកំណើត</th>
						<th>:</th>
						<td><?php echo $row->place_of_birth;?></td>		
													
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
						<td><?php echo $row->education;?></td>		
						<td>&nbsp;</td>								
					</tr>
					<tr>					
						<th><?php echo $this->lang->line('');?>-មធ្យោបាយធ្វើដំណើរ</th>
						<th>:</th>
						<td><?php echo "NONE";?></td>		
						<td>&nbsp;</td>								
					</tr>
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
			
			<hr />
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