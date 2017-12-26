<label>
	<a href="<?php echo base_url();?>manage_monks/create_monk" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>បន្ថែមថ្មី</a>
</label>
	<div class="col-xs-12">
		<?php
			$this->load->view('backend/notification/index.php');
		?>
		<table id="sample-table-9" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center">#</th>
					<th><?php echo $this->lang->line('');?>ភិក្ខុឈ្មោះ</th>
					<th><?php echo $this->lang->line('');?>កុដិលេខ</th>
					<th><?php echo $this->lang->line('');?>ក្រុម</th>
					<th><?php echo $this->lang->line('');?>ប្រភេទ</th>
					<th><?php echo $this->lang->line('');?>ជនជាតិ </th>
					<th><?php echo $this->lang->line('');?>លេខទូរស័ព្</th>
					<th><?php echo $this->lang->line('');?>មកពីខេត្ត</th>
					<th><?php echo $this->lang->line('');?>បួសបាន</th>
					<th><?php echo $this->lang->line('tb_dob');?></th>
					<th><?php echo $this->lang->line('tb_status');?></th>
					<th>បែបបទ</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$i=0;
					foreach($monks->result() as $row){

						if($row->status==1){
							$class="success";
							$status="Active";
						}else{
							$class="warning";
							$status="Inactive";
						}
				?>
						<tr>
							<td class="center"><?php echo ++$i;?></td>
							<td><?php echo $row->username;?></td>
							<td><?php echo $row->house_name;?></td>
							<td><?php echo $row->groupname;?></td>
							<td><?php echo $row->typesname;?></td>
							<td><?php echo $row->nation;?></td>
							<td><?php echo $row->phone_number;?></td>
							<td><?php echo $row->location_name;?></td>
							<td><?php echo $row->yeartime.' (ឆ្នាំ)';?></td>
							<td><?php echo $row->date_of_birth;?></td>
							<td><span class="label label-sm label-<?php echo $class;?>"><?php echo $status;?></span></td>
							<td>
								<div class="hidden-sm hidden-xs action-buttons">
									<!--<a class="green" href="<?php echo base_url();?>manage_monks/update_monk/<?php echo $row->id;?>" title="Edit monk"> <i class="ace-icon fa fa-pencil bigger-130"></i> </a>
									<?php
										if($row->name!="Admin"){
									?>
									<a class="red" href="<?php echo base_url();?>manage_monks/delete_monk/<?php echo $row->id;?>" title="Delete monk" onclick="return confirm('Are you sure want to delete this selected monk ?')"> <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>
									<?php
										}
									?>-->
									<!-- <a href="<?php echo base_url();?>manage_monks/view_monk/<?php echo $row->id;?>" class="tooltip-success" data-rel="tooltip" title="View"> <span class="blue"> <i class="ace-icon fa fa-folder-open bigger-120"></i> </span> </a> -->
									<a href="<?php echo base_url();?>manage_monks/update_monk/<?php echo $row->id;?>" class="tooltip-success" data-rel="tooltip" title="Edit"> <span class="green"> <i class="ace-icon fa fa-pencil-square-o bigger-120"></i> </span> </a>
									<a class="red" href="<?php echo base_url();?>manage_monks/delete_monk/<?php echo $row->id;?>" class="tooltip-error" data-rel="tooltip" title="Delete monk" onclick="return confirm('Are you sure want to delete this selected monk ?')"> <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>
								</div>
								<div class="hidden-md hidden-lg">
									<div class="inline position-relative">
										<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
											<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
										</button>
										<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
											<!-- <li>
												<a href="<?php echo base_url();?>manage_monks/view_monk/<?php echo $row->id;?>" class="tooltip-success" data-rel="tooltip" title="View"> <span class="blue"> <i class="ace-icon fa fa-folder-open bigger-120"></i> </span> </a>
											</li> -->
											<li>
												<a href="<?php echo base_url();?>manage_monks/update_monk/<?php echo $row->id;?>" class="tooltip-success" data-rel="tooltip" title="Edit"> <span class="green"> <i class="ace-icon fa fa-pencil-square-o bigger-120"></i> </span> </a>
											</li>
											<li>
												<a href="<?php echo base_url();?>manage_monks/delete_monk/<?php echo $row->id;?>" class="tooltip-error" data-rel="tooltip" title="Delete"> <span class="red"> <i class="ace-icon fa fa-trash-o bigger-120"></i> </span> </a>
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
