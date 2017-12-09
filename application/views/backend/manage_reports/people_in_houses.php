<div class="row" id="members">
	<div class="col-xs-12">
		<?php
			$this->load->view('backend/notification/index.php');
		?>
		<table id="sample-table-0" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center">#</th>
					<th><?php echo $this->lang->line('');?>ឈ្មោះកុដិ</th>
					<th><?php echo $this->lang->line('');?>ចំនួនភិក្ខុ</th>
					<th><?php echo $this->lang->line('');?>ចំនួនសាមណេរ</th>
					<th><?php echo $this->lang->line('');?>ចំនួនពុទ្ធបរិស័ទ្ធ</th>
					<th><?php echo $this->lang->line('');?>ចំនួនសរុប</th>
				</tr>
			</thead>

			<tbody>
				<?php
					$i = 1;
					$total_monk1 = 0;
					$total_monk2 = 0;
					$total_member = 0;
					foreach($people_in_houses->result() as $row){
										$total_monk1+=$row->total_monk_level1;
										$total_monk2 +=$row->total_monk_level2;
										$total_member +=$row->total_member;	
				?>
						<tr>
							<td class="center"><label class="position-relative"><?php echo $i;?></label></td>
							<td><?php echo $row->NAME;?></td>
							<td><a href="<?php echo base_url();?>manage_reports/people_in_houses_by_monk_level1/<?php echo $row->id;?>" target="_blank"><?php echo $row->total_monk_level1;?> នាក់</a></td>
							<td><a href="<?php echo base_url();?>manage_reports/people_in_houses_by_monk_level2/<?php echo $row->id;?>" target="_blank"><?php echo $row->total_monk_level2;?> នាក់</a></td>
							<td><a href="<?php echo base_url();?>manage_reports/people_in_houses_by_member/<?php echo $row->id;?>" target="_blank"><?php echo $row->total_member;?> នាក់</a></td>
		
							<td><a href="<?php echo base_url();?>manage_reports/people_in_houses_by_id/<?php echo $row->id;?>" target="_blank"><?php echo $row->total;?> នាក់</a></td>
		
							
						</tr>
				<?php
						$i++;
					}
				?>
				<tr>
				
				<th class="center"​​ colspan="2" align="center">សរុបរួម</th>
				<th><a href="<?php echo base_url();?>manage_reports/people_in_houses_by_monk_level1" target="_blank"><?php echo $total_monk1;?> នាក់</a></th>
				<th><a href="<?php echo base_url();?>manage_reports/people_in_houses_by_monk_level2" target="_blank"><?php echo $total_monk2;?> នាក់</a></th>
				<th><a href="<?php echo base_url();?>manage_reports/people_in_houses_by_member" target="_blank"><?php echo $total_member;?> នាក់</a></th>
				<th><a href="<?php echo base_url();?>manage_reports/people_in_houses_by_id" target="_blank"><?php echo ($total_monk1+$total_monk2+$total_member);?>​ នាក់</a></th>
			</tr>
			</tbody>
			
		</table>
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