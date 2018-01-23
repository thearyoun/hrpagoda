<label>
	<a href="<?php echo base_url();?>manage_members/create_member"
       class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> បន្ថែមថ្មី</a>
</label>
<div class="row">
	<div class="col-xs-12">
		<?php
			$this->load->view('backend/notification/index.php');
		?>
		<table id="member-table" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center">#</th>
					<th><?php echo $this->lang->line('');?>សមាជិកឈ្មោះ</th>
					<th><?php echo $this->lang->line('');?>ភេទ</th>
					<th><?php echo $this->lang->line('');?>ជនជាតិ</th>
					<th><?php echo $this->lang->line('');?>លេខទូរស័ព្ទ</th>
					<th><?php echo $this->lang->line('tb_dob');?></th>
					<th><?php echo $this->lang->line('');?>ស្ថានភាព</th>
					<th><?php echo $this->lang->line('tb_created_date');?></th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php
					$i=0;
					foreach($members->result() as $row){
						if($row->status==1){
							$class="success";
							$status="នៅប្រើ";
						}else{
							$class="warning";
							$status="មិនន្រើ";
						}
				?>
						<tr>
							<td class="center"><?php echo ++$i;?></td>
							<td><?php echo $row->username;?></td>
							<td><?php echo ($row->gender=='M')? 'ប្រុស':'ស្រី';?></td>
							<td><?php echo $row->nation;?></td>
							<td><?php echo $row->phone_number;?></td>
							<td><?php echo convertDateToKhmer($row->date_of_birth);?></td>
							<td><span class="label label-sm label-<?php echo $class;?>"><?php echo $status;?></span></td>
							<td><?php echo ($row->created_at);?></td>
							<td>
								<div class="hidden-sm hidden-xs action-buttons">
									<a href="<?php echo base_url();?>manage_members/update_member/<?php echo $row->id;?>" class="tooltip-success" data-rel="tooltip" title="កែប្រែ"> <span class="green"> <i class="ace-icon fa fa-pencil-square-o bigger-120"></i> </span> </a>
									<a class="red" href="<?php echo base_url();?>manage_members/លុប_member/<?php echo $row->id;?>" title="លុប" onclick="return confirm('Are you sure want to លុប this selected member ?')"> <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>
								</div>
								<div class="hidden-md hidden-lg">
									<div class="inline position-relative">
										<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
											<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
										</button>
										<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
											<li>
												<a href="<?php echo base_url();?>manage_members/update_member/<?php echo $row->id;?>" class="tooltip-success" data-rel="tooltip" title="កែប្រែ"> <span class="green"> <i class="ace-icon fa fa-pencil-square-o bigger-120"></i> </span> </a>
											</li>
											<li>
												<a href="<?php echo base_url();?>manage_members/លុប_member/<?php echo $row->id;?>" class="tooltip-error" data-rel="tooltip" title="លុប"> <span class="red"> <i class="ace-icon fa fa-trash-o bigger-120"></i> </span> </a>
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
