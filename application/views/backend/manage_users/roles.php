<div class="row">
	<div class="col-xs-12">
		<?php
				$this->load->view('backend/notification/index.php');
			?>
		<table id="sample-table-3" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center">#</th>
					<th><?php echo $this->lang->line('tb_name');?></th>
					<th><?php echo $this->lang->line('tb_description');?></th>
					
					<th><?php echo $this->lang->line('tb_status');?></th>
					<th><?php echo $this->lang->line('tb_created_date');?></th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php
					$i=0;
					foreach($roles->result() as $row){
						
						if($row->status==1){
							$class="success";
							$status="Active";
						}else{
							$class="danger";
							$status="Inactive";
						}
				?>
						<tr>
							<td class="center"><?php echo ++$i;?></td>
		
							<td><a href="#"><?php echo $row->name;?></a></td>
							<td><?php echo $row->description;?></td>
							
							<td><span class="label label-sm label-<?php echo $class;?>"><?php echo $status;?></span></td>
		
							<td><?php echo $row->created_at;?></span></td>
		
							<td>
								<div class="hidden-sm hidden-xs action-buttons">
					
									<a class="green" href="<?php echo base_url();?>manage_users/update_role/<?php echo $row->role_id;?>" title="Edit Role"> <i class="ace-icon fa fa-pencil bigger-130"></i> </a>
					
									<a class="red" href="<?php echo base_url();?>manage_users/delete_role/<?php echo $row->role_id;?>" title="Delete Role" onclick="return confirm('Are you sure want to delete this selected role ?')"> <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>
								</div>
								<div class="hidden-md hidden-lg">
									<div class="inline position-relative">
										<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
											<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
										</button>
					
										<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
											
					
											<li>
												<a href="<?php echo base_url();?>manage_uses/update_role/<?php echo $row->role_id;?>" class="tooltip-success" data-rel="tooltip" title="Edit"> <span class="green"> <i class="ace-icon fa fa-pencil-square-o bigger-120"></i> </span> </a>
											</li>
					
											<li>
												<a href="<?php echo base_url();?>manage_uses/delete_role/<?php echo $row->role_id;?>" class="tooltip-error" data-rel="tooltip" title="Delete"> <span class="red"> <i class="ace-icon fa fa-trash-o bigger-120"></i> </span> </a>
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