<a href="<?php echo base_url();?>manage_monk_take_leaves/create_monk_take_leave"><input type="button" class="btn btn-primary" value="បង្កើតថ្មី" /><br /><br /></a>
<div class="row">
	<div class="col-xs-12">
		<?php
			$this->load->view('backend/notification/index.php');
		?>
		<table id="sample-table-9" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center">#</th>
					
					<th><?php echo $this->lang->line('');?>ភិក្ខុឈ្មោះ</th>
					<th><?php echo $this->lang->line('');?>ទទួលស្គាល់ដោយ</th>
					<th><?php echo $this->lang->line('');?>ប្រភេទនៃការឈប់</th>
					<th><?php echo $this->lang->line('');?>ថ្ងៃស្នើសុំ</th>
					<th><?php echo $this->lang->line('');?>ពីថ្ងៃ</th>
					<th><?php echo $this->lang->line('');?>ទៅថ្ងៃ</th>
					<th><?php echo $this->lang->line('');?>ស្ថានភាព</th>
					
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php
					$i=0;
					foreach($monk_take_leaves->result() as $row){
												
				?>
						<tr>
							<td class="center"><?php echo ++$i;?></td>
		
							
							<td><?php echo $row->monk_name;?></td>
							<td><?php echo $row->handle_name;?></td>
							<td><?php echo $row->leave_type_name;?></td>
							<td><?php echo $row->request_date;?></td>
							<td><?php echo $row->from_date;?></td>
							<td><?php echo $row->to_date;?></td>							
							<td><?php echo $row->status;?></td>
							
		
							<td>
								
								<div class="hidden-sm hidden-xs action-buttons">
					
									<!--<a class="green" href="<?php echo base_url();?>manage_members/update_member/<?php echo $row->id;?>" title="Edit member"> <i class="ace-icon fa fa-pencil bigger-130"></i> </a>
									<?php
										if($row->name!="Admin"){
									?>
									<a class="red" href="<?php echo base_url();?>manage_members/delete_member/<?php echo $row->id;?>" title="Delete member" onclick="return confirm('Are you sure want to delete this selected member ?')"> <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>
									<?php
										}
									?>-->
									<a href="<?php echo base_url();?>manage_monk_take_leaves/update_monk_take_leave/<?php echo $row->id;?>" class="tooltip-success" data-rel="tooltip" title="Edit"> <span class="green"> <i class="ace-icon fa fa-pencil-square-o bigger-120"></i> </span> </a>
									<a class="red" href="<?php echo base_url();?>manage_monk_take_leaves/delete_monk_take_leave/<?php echo $row->id;?>" title="Delete member" onclick="return confirm('Are you sure want to delete this selected member ?')"> <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>
								</div>
								<div class="hidden-md hidden-lg">
									<div class="inline position-relative">
										<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
											<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
										</button>
					
										<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
											
					
											<li>
												<a href="<?php echo base_url();?>manage_monk_take_leaves/update_monk_take_leave/<?php echo $row->id;?>" class="tooltip-success" data-rel="tooltip" title="Edit"> <span class="green"> <i class="ace-icon fa fa-pencil-square-o bigger-120"></i> </span> </a>
											</li>
					
											<li>
												<a href="<?php echo base_url();?>manage_monk_take_leaves/delete_monk_take_leave/<?php echo $row->id;?>" class="tooltip-error" data-rel="tooltip" title="Delete"> <span class="red"> <i class="ace-icon fa fa-trash-o bigger-120"></i> </span> </a>
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