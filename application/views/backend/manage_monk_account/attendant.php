<div class="row">
	<div class="col-xs-12">
		<?php
			$this->load->view('backend/notification/index.php');
		?>
		<table id="<?php echo ($this->session->userdata("user_type")=="monk"?"member-take-leave-table":"admin-take-leave-table");?>" class="table table-striped table-bordered table-hover">
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
          <?php if($this->session->userdata("user_type")=="admin"):?>
					<th></th>
          <?php endif;?>
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
							<td><?php echo $row->member_name;?></td>
							<td><?php echo $row->house_name;?></td>
							<td><?php echo $row->pro_name;?></td>
							<td><?php echo $times;?></td>
							<td><?php echo convertDateToKhmer($row->date);?></td>
							<td><?php echo ($row->present == 1? 'មាន':'អត់');?></td>
							<td><?php echo ($row->is_take_leave == 1? 'មានច្បាប់':'អត់ច្បាប់');?></td>
              <?php if($this->session->userdata("user_type")=="admin"):?>
              <td>
								<div class="hidden-sm hidden-xs action-buttons">
									<a href="<?php echo base_url();?>manage_attendants/update_attendant/<?php echo $row->id;?>" class="tooltip-success" data-rel="tooltip" title="Edit"> <span class="green"> <i class="ace-icon fa fa-pencil-square-o bigger-120"></i> </span> </a>
									<a class="red" href="<?php echo base_url();?>manage_attendants/delete_attendant/<?php echo $row->id;?>" title="Delete member" onclick="return confirm('Are you sure want to delete this selected member ?')"> <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>
								</div>
								<div class="hidden-md hidden-lg">
									<div class="inline position-relative">
										<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
											<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
										</button>

										<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">


											<li>
												<a href="<?php echo base_url();?>manage_attendants/update_attendant/<?php echo $row->id;?>" class="tooltip-success" data-rel="tooltip" title="Edit"> <span class="green"> <i class="ace-icon fa fa-pencil-square-o bigger-120"></i> </span> </a>
											</li>

											<li>
												<a href="<?php echo base_url();?>manage_attendants/delete_attendant/<?php echo $row->id;?>" class="tooltip-error" data-rel="tooltip" title="Delete"> <span class="red"> <i class="ace-icon fa fa-trash-o bigger-120"></i> </span> </a>
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
