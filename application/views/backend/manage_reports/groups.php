<div class="row">
	<div class="col-xs-12">
		<?php
			$this->load->view('backend/notification/index.php');
		?>
		<table id="sample-table-0" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center">#</th>
					<th><?php echo $this->lang->line('tb_name');?></th>
					<th><?php echo $this->lang->line('tb_description');?></th>
					<th><?php echo $this->lang->line('');?>ចំនួនសមាជិក</th>
					<th><?php echo $this->lang->line('tb_created_date');?></th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php
					$i = 1;
					foreach($lines->result() as $row){
												
				?>
						<tr>
							<td class="center"><label class="position-relative"><?php echo $i;?></label></td>
							<td><a href="#"><?php echo $row->name;?></a></td>
							<td><?php echo $row->description;?></td>
							
							<td><?php echo $row->total_members;?></td>
		
							<td><?php echo $row->created_at;?></span></td>
		
							<td>
								
								<div class="hidden-sm hidden-xs action-buttons">
					
									<a class="green" href="<?php echo base_url();?>manage_reports/group_member/<?php echo $row->id;?>" title="View Group Member"> បង្ហាញបញ្ជីស្រង់វត្តមាន </a>&nbsp; | &nbsp;
									<a class="green" href="<?php echo base_url();?>manage_reports/get_att_report/<?php echo $row->id;?>" title="View Group Member"> បង្ហាញវត្តមានថ្វាយបង្គំព្រះ </a>	&nbsp; | &nbsp;
									<a class="green" href="<?php echo base_url();?>manage_reports/get_att_report_programme/<?php echo $row->id;?>" title="View Group Member"> បង្ហាញវត្តមានកម្មវិធីផ្សេងៗ </a>											
								</div>
								<div class="hidden-md hidden-lg">
									<div class="inline position-relative">
										<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
											<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
										</button>
					
										<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																
					
											<li>
												<a href="<?php echo base_url();?>manage_reports/group_member/<?php echo $row->id;?>" class="tooltip-error" data-rel="tooltip" title="View Group Member"> View Group Member </a>
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