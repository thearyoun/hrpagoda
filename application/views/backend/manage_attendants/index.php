<div class="col-xs-12">&nbsp;</div>
<div class="col-xs-12">
	<form class="form-horizontal" action="<?php echo base_url().'manage_attendants'; ?>" method="post">
			<div class="col-sm-12">
				<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="type"> ប្រភេទ :</label>
						<div class="col-sm-6">
								<select class="col-sm-7" name="type">
									<option value="1" <?php echo ($type==1?"selected":"")?>>ព្រះសង្ឃ</option>
									<option value="2" <?php echo ($type==2?"selected":"")?>>គ្រហស្ថ</option>
								</select>
						</div>
				</div>
				<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="house_no"> កុដិលេខ :</label>
						<div class="col-sm-6">
								<select class="col-sm-7" name="house_no">
										<option value="">--សូមជ្រើសរើស--</option>
										<?php
											foreach ($house->result() as $val_house) {
												echo "<option value='".$val_house->id."' ".($house_no==$val_house->id?"selected":"").">".$val_house->name."</option>";
											}
										?>
								</select>
						</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2">&nbsp;</label>
					<div class="col-sm-2">
						<input type="submit" class="btn btn-primary btn-sm" name="search" value="ស្វែងរក">
						<?php if($house_no!=""):?>
						<a href="<?php echo base_url().'manage_attendants/clear_index_search';?>" class="btn btn-danger btn-sm">សំអាត</a>
					<?php endif;?>
					</div>
				</div>
			</div>
	</form>
</div>
<div class="row">&nbsp;</div>
<a href="<?php echo base_url();?>manage_attendants/create_attendant" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> បង្កើតថ្មី</a>
<br/>
<br/>
<div class="row">
	<div class="col-xs-12">
		<?php
			$this->load->view('backend/notification/index.php');
		?>
		<table id="admin-take-leave-table" class="table table-striped table-bordered table-hover">
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
					<th></th>
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
							<td>
								<div class="hidden-sm hidden-xs action-buttons">
									<a href="<?php echo base_url();?>manage_attendants/update_attendant/<?php echo $row->id;?>" class="tooltip-success" data-rel="tooltip" title="កែប្រែ"> <span class="green"> <i class="ace-icon fa fa-pencil-square-o bigger-120"></i> </span> </a>
									<a class="red" href="<?php echo base_url();?>manage_attendants/លុប_attendant/<?php echo $row->id;?>" title="លុប" onclick="return confirm('Are you sure want to លុប this selected member ?')"> <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>
								</div>
								<div class="hidden-md hidden-lg">
									<div class="inline position-relative">
										<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
											<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
										</button>
										<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
											<li>
												<a href="<?php echo base_url();?>manage_attendants/update_attendant/<?php echo $row->id;?>" class="tooltip-success" data-rel="tooltip" title="កែប្រែ"> <span class="green"> <i class="ace-icon fa fa-pencil-square-o bigger-120"></i> </span> </a>
											</li>
											<li>
												<a href="<?php echo base_url();?>manage_attendants/លុប_attendant/<?php echo $row->id;?>" class="tooltip-error" data-rel="tooltip" title="លុប"> <span class="red"> <i class="ace-icon fa fa-trash-o bigger-120"></i> </span> </a>
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
