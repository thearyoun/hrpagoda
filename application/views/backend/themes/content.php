<div class="row">
	<div class="col-xs-12">
		<?php
			$this->load->view('notification/index.php');
		?>
		<table id="sample-table-2" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					
					<th>#</th>
					<th>Quotation No</th>
					<th>Project</th>
					
					<th>Date</th>
					<th>Discount %</th>
					<th>VAT %</th>
					<th>Amount</th>					
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php
					
					$i=1;
					foreach($quotations->result() as $row){
						
				?>
						<tr>
							
							<td><a href="#"><?php echo $i;?></a></td>
							<td><a href="<?php echo base_url();?>reports/quotation_form/<?php echo $row->quotation_id;?>">QT-000<?php echo $row->quotation_id;?> </a></td>
							
							<td><?php echo $row->name;?></td>
							<td><?php echo $row->quo_date;?></td>
							<td><?php echo $row->quo_discount;?></td>
							<td><?php echo $row->quo_vat;?></td>
							<td><?php echo $row->quo_total_amount;?>$</td>
							
		
							<td>
								
								<div class="hidden-sm hidden-xs action-buttons">
									
									
									
					
									<a class="green" href="<?php echo base_url();?>quotations/update_quotation/<?php echo $row->quotation_id;?>" title="Edit Loan"> <i class="ace-icon fa fa-pencil bigger-130"></i> </a>
					
									<a class="red" href="<?php echo base_url();?>quotations/delete_quotation/<?php echo $row->quotation_id	;?>" title="Delete Loan" onclick="return confirm('Are you sure want to delete this selected this loan ?')"> <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>
								</div>
								<div class="hidden-md hidden-lg">
									<div class="inline position-relative">
										<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
											<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
										</button>
					
										<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
											
					
											<li>
												<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit"> <span class="green"> <i class="ace-icon fa fa-pencil-square-o bigger-120"></i> </span> </a>
											</li>
					
											<li>
												<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete"> <span class="red"> <i class="ace-icon fa fa-trash-o bigger-120"></i> </span> </a>
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

<?php
	//print_r(getDatesFromRange( '2010-10-01', '2010-10-04' ));


   /*$startDate='2010-10-01';
   $endDate='2010-10-05';
   $start = $startDate;
   $i=0;
    
   while (strtotime($start) < strtotime($endDate)){
   	$start = date('Y-m-d', strtotime($startDate.'+'.$i.' days'));
    echo $start;
	$i++;
   }*/
    
