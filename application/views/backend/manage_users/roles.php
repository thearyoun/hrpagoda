<label>
    <a href="<?php echo base_url().'manage_users/create_role'?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> បង្កើតថ្មី</a>
</label>
<br/>
<br/>
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
							$status="ប្រើ";
						}else{
							$class="danger";
							$status="មិនប្រើ";
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
					
									<a class="green" href="<?php echo base_url();?>manage_users/update_role/<?php echo $row->role_id;?>" title="កែប្រែ"> <i class="ace-icon fa fa-pencil bigger-130"></i> </a>
					
									<a class="red" href="<?php echo base_url();?>manage_users/លុប_role/<?php echo $row->role_id;?>" title="លុប" onclick="return confirm('Are you sure want to លុប this selected role ?')"> <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>
								</div>
								<div class="hidden-md hidden-lg">
									<div class="inline position-relative">
										<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
											<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
										</button>
					
										<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
											
					
											<li>
												<a href="<?php echo base_url();?>manage_uses/update_role/<?php echo $row->role_id;?>" class="tooltip-success" data-rel="tooltip" title="កែប្រែ"> <span class="green"> <i class="ace-icon fa fa-pencil-square-o bigger-120"></i> </span> </a>
											</li>
					
											<li>
												<a href="<?php echo base_url();?>manage_uses/លុប_role/<?php echo $row->role_id;?>" class="tooltip-error" data-rel="tooltip" title="លុប"> <span class="red"> <i class="ace-icon fa fa-trash-o bigger-120"></i> </span> </a>
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