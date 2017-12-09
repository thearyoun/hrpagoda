<div class="row">
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
					<th><?php echo $this->lang->line('');?>កម្មវិធីឈ្មោះ</th>
					<th><?php echo $this->lang->line('');?>វេន</th>
					<th><?php echo $this->lang->line('');?>ថ្ងៃទី</th>
					<th><?php echo $this->lang->line('');?>រត្តមាន</th>
					<th><?php echo $this->lang->line('');?>សុំច្បាប់</th>					
					
				</tr>
			</thead>

			<tbody>
				<?php
					$i=0;
					foreach($attendants->result() as $row){
							$t = $row->times;
							if($t == "morning"){
								$times = "ពេលព្រឹក";
							}else if($t == "evening"){
								$times = "ពេលល្ងាច";
							}else{
								$times = "ពេញមួយថ្ងៃ";	
							}
				?>
						<tr>
							<td class="center"><?php echo ++$i;?></td>
		
							
							<td><?php echo $row->mon_name;?></td>
							<td><?php echo $row->house_name;?></td>
							<td><?php echo $row->pro_name;?></td>
							<td><?php echo $times;?></td>
							<td><?php echo $row->date;?></td>
							<td><?php echo ($row->present == 1? 'មាន':'អត់');?></td>																					
							<td><?php echo ($row->is_take_leave == 1? 'មានច្បាប់':'អត់ច្បាប់');?></td>
							
						</tr>
				<?php
					}
				?>
				
			</tbody>
		</table>
	</div><!-- /.span -->
</div><!-- /.row -->