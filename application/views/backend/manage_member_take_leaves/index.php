<?php
	if($this->session->userdata("member_allow")==1){
		$check="checked";
	}else{
		$check="";
	}
?>
<?php if(($this->session->userdata("member_allow")==1) || ($this->session->userdata("user_type")=="admin")):?>
<label>
<a href="<?php echo base_url();?>manage_member_take_leaves/create_member_take_leave" class="btn btn-primary">បង្កើតថ្មី</a>
<?php if($this->session->userdata("user_type")=="admin"):?>
&nbsp;&nbsp;<a id="member_form" style=" text-decoration: none;">ទម្រង់ការសុំច្បាប់ពុទ្ធបរិស័ទ្ធ:<input type="checkbox" class="form_monk" data-toggle="toggle" <?php echo $check;?> data-on="បង្ហាញ" data-off="មិនបង្ហាញ" data-width="100"></a>
<?php endif;?>
</label>
<?php else:?>
	<h3 for="message">
		<?php echo $message;?>
	</h3>
<?php endif;?>
<br/><br />
<div class="row">
	<div class="col-xs-12">
		<?php
			$this->load->view('backend/notification/index.php');
		?>
		<table id="<?php echo ($this->session->userdata("user_type")=="member"?"member-take-leave-table":"admin-take-leave-table");?>" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center">#</th>
					<th><?php echo $this->lang->line('');?>សមាជិកឈ្មោះ</th>
					<th><?php echo $this->lang->line('');?>ទទួលស្គាល់ដោយ</th>
					<th><?php echo $this->lang->line('');?>ប្រភេទនៃការឈប់</th>
					<th><?php echo $this->lang->line('');?>ថ្ងៃស្នើសុំ</th>
					<th><?php echo $this->lang->line('');?>ពីថ្ងៃ</th>
					<th><?php echo $this->lang->line('');?>ទៅថ្ងៃ</th>
          <th><?php echo $this->lang->line('');?>ស្ថានភាព</th>
					<?php if($this->session->userdata("user_type")=="admin"):?>
          <th></th>
				  <?php endif;?>
				</tr>
			</thead>

			<tbody>
				<?php
					$i=0;
					foreach($member_take_leaves->result() as $row){
				?>
						<tr>
							<td class="center"><?php echo ++$i;?></td>
							<td><?php echo $row->member_name;?></td>
							<td><?php echo $row->handle_name;?></td>
							<td><?php echo $row->leave_type_name;?></td>
							<td><?php echo convertDateToKhmer($row->request_date);?></td>
							<td><?php echo convertDateToKhmer($row->from_date);?></td>
							<td><?php echo convertDateToKhmer($row->to_date);?></td>
							<?php if($this->session->userdata("user_type")=="member"):?>
							<td>
									<?php echo $row->status;?>
							</td>
							<?php endif;?>
							<?php if($this->session->userdata("user_type")=="admin"):?>
							<td>
								<select class="col-sm-12 chosen-select" name="status_type" id="change_status_type" data-id="<?php echo $row->id;?>">
									<?php if($status_type !=false):
										foreach ($status_type->result() as $value) {
											echo "<option value='".$value->name."' ".($value->name==$row->status?"selected":"").">".$value->name."</option>";
										?>
								<?php } endif;?>
								</select>
							</td>
							<td>
								<div class="hidden-sm hidden-xs action-buttons">
									<a href="<?php echo base_url();?>manage_member_take_leaves/update_member_take_leave/<?php echo $row->id;?>" class="tooltip-success" data-rel="tooltip" title="Edit"> <span class="green"> <i class="ace-icon fa fa-pencil-square-o bigger-120"></i> </span> </a>
									<a class="red" href="<?php echo base_url();?>manage_member_take_leaves/delete_member_take_leave/<?php echo $row->id;?>" title="Delete member" onclick="return confirm('Are you sure want to delete this selected member ?')"> <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>
								</div>
								<div class="hidden-md hidden-lg">
									<div class="inline position-relative">
										<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
											<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
										</button>
										<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
											<li>
												<a href="<?php echo base_url();?>manage_member_take_leaves/update_member_take_leave/<?php echo $row->id;?>" class="tooltip-success" data-rel="tooltip" title="Edit"> <span class="green"> <i class="ace-icon fa fa-pencil-square-o bigger-120"></i> </span> </a>
											</li>
											<li>
												<a href="<?php echo base_url();?>manage_member_take_leaves/delete_member_take_leave/<?php echo $row->id;?>" class="tooltip-error" data-rel="tooltip" title="Delete"> <span class="red"> <i class="ace-icon fa fa-trash-o bigger-120"></i> </span> </a>
											</li>
										</ul>
									</div>
								</div>
							</td>
							<?php endif;?>
						</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div><!-- /.span -->
</div><!-- /.row -->
