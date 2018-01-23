<div class="row" id="members">
	<div class="col-xs-12">
		<p class=MsoNormal align=center style='margin-bottom:0;margin-bottom:
    .0001pt;text-align:center;line-height:normal;font-weight: bold'>
    <span lang=KHM style='font-size:13.0pt;font-family:"Khmer OS Battambang"'>ព្រះរាជាណាចក្រកម្ពុជា<br />ជាតិ សាសនា ព្រះមហាក្សត្រ</span></p>
    <p class=MsoNormal align=left style='margin-bottom:0;margin-bottom:
    .0001pt;text-align:left ;line-height:normal;font-weight: bold'>
    <span lang=KHM style='font-size:13.0pt;font-family:"Khmer OS Battambang"'>វត្តលង្កាព្រះកុសុមារាម </span></p>
    <p class=MsoNormal align=left style='margin-bottom:0;text-align:center;line-height:normal;font-weight: bold'><span lang=KHM style='font-size:13.0pt;font-family:"Khmer OS Battambang"'>បញ្ជីស្រង់វត្តមានព្រះសង្ឃ</span></p>
 <p class=MsoNormal align=left style='margin-bottom:0;margin-bottom:0;text-align:center;line-height:normal;font-weight: normal'><span lang=KHM style='font-size:13.0pt;font-family:"Khmer OS Battambang"'><?php echo $group->row()->name?> </span></p>
 
    <br />
		<table id="sample-table-0" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center">#</th>
					<th><?php echo $this->lang->line('');?>ឈ្មោះភិក្ខុ</th>
					<th><?php echo $this->lang->line('');?>កុដិ</th>
					<th><?php echo $this->lang->line('');?>ហត្តលេខា</th>
					<th><?php echo $this->lang->line('');?>ផ្សេងៗ</th>				
				</tr>
			</thead>

			<tbody>
				<?php
					$i = 1;
					foreach($group_members->result() as $row){
												
				?>
						<tr>
							<td class="center"><label class="position-relative"><?php echo $i;?></label></td>
							<td><a href="#"><?php echo $row->username;?></a></td>
							<td><?php echo $row->house_name;?></td>							
							<td></td>
							<td></td>									
						</tr>
				<?php
						$i++;
					}
				?>
				
			</tbody>
		</table>
        <p class=MsoNormal align=left
           style='margin-bottom:0in;margin-bottom:.0001pt;text-align:left;line-height:normal;'>
            <span lang=KHM
                  style='font-size:12.0pt;font-family:"Khmer OS Battambang"'>បញ្ជាក់៖ ប្រធានក្រុមនីមួយ ៗ ត្រូវយកវត្តមានជារៀងរាល់ថ្ងៃ។
            </span>
        </p>
        <br/>
        <p class=MsoNormal align=center
           style='margin-bottom:0in;margin-bottom:.0001pt;text-align:right;line-height:normal;'>
             <span lang=KHM
                   style='font-size:12.0pt;font-family:"Khmer OS Battambang"'>វត្តលង្កា ថ្ងៃទី...........ខែ..................ឆ្នាំ ២០<br/><br/>
            <span style="padding-right: 10% !important;">អ្នកស្រង់វត្តមាន
            </span>
        </p>
        <p class=MsoNormal align=left
           style='margin-top: -60px;margin-bottom:.0001pt;text-align:left;line-height:normal;'>
            <span style='font-size:12.0pt;margin-left:3%;font-family:"Khmer OS Battambang"'>បានឃើញ និងឯកភាព<br/><br/></span>
            <span style='font-size:12.0pt;margin-left:6%;font-family:"Khmer OS Battambang"'>ចៅអធិការ</span>
        </p>
	</div><!-- /.span -->
</div><!-- /.row -->
<hr />
<div style="text-align: center;">
	
	<button class="btn btn-warning" type="button" id="btn-print" onclick="printDiv('members')">
													<i class="ace-icon fa fa-print bigger-110"></i>
													<?php echo $this->lang->line('fm_btn_print');?>
												</button>
	
</div>
												
<script type="text/javascript">
function printDiv(divName) {
	//var divobj=document.getElementById('before_print');
	//divobj.setAttribute('class','print_size');
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
</script>