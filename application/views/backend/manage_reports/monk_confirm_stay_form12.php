<div class="row" id="members"> 
	<div class="col-xs-12">
		<div class="col-xs-12">
		<p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal;font-weight: bold'>
    <span lang=KHM style='font-size:13.0pt;font-family:"Khmer OS Battambang"'>សម្តេចព្រះមហាអរិយវង្សព្រះចៅអធិការ<br />វត្តលង្កាព្រះកុសុមារាម<br />
		
		បញ្ជាក់ថា</span></p><br />
			<p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:left;line-height:normal'>
    <span lang=KHM
    style='font-size:12.0pt;font-family:"Khmer OS Battambang"'>
    	
		-ភិក្ខុឈ្មោះ <span style="padding: 0px 8%;"><?php echo $monk_info->row()->username;?>
				<span><span style="padding: 0px 8%;">អាយុ  <?php
							    $dob= $monk_info->row()->date_of_birth;
							    $diff = (date('Y') - date('Y',strtotime($dob)));
							    echo ConvertNumberToKhmer($diff);
							?><span>	<span style="padding: 0px 4%;">ជនជាតិ</span>		<?php echo $monk_info->row()->nation;?>		<span style="padding: 0 0 0 4%;">សញ្ជាតិ	</span>	<?php echo $monk_info->row()->nationality;?> </span><br />
		-ថ្ងៃ ខែ ឆ្នាំកំណើត<span style="padding: 0px 10%;">		
			<?php 
			echo convertDateToKhmer($monk_info->row()->date_of_birth);
			?>
			
			</span>	<br />
		-ទីកន្លែងកំណើត<span style="padding: 0 0 0 10%;">		<?php echo $monk_info->row()->place_of_birth;?>។</span> <br />
		
		
		
		-ឪពុកឈ្មោះ	<span style="padding: 0px 10%;">		<?php echo $monk_info->row()->father_name;?></span>		មុខរបរ	<span style="padding:0 5%;"><?php echo $monk_info->row()->father_occupation;?></span>		លេខទូរស័ព្ទ	<span style="padding: 0 0 0 5%;"><?php echo $monk_info->row()->father_phone;?></span><br />
			
		-ម្ដាយឈ្មោះ 	<span style="padding: 0px 10%;">		<?php echo $monk_info->row()->mother_name;?></span>		មុខរបរ	<span style="padding: 0 5%;"><?php echo $monk_info->row()->mother_occupation;?></span>	លេខទូរស័ព្ទ	<span style="padding: 0 0 0 5%;"><?php echo $monk_info->row()->mother_phone;?></span><br />
		 
		-មុខរបរសព្វថ្ងៃ<span style="padding: 0 0 0 10%;">	<?php echo 'ព្រះសង្ឃ';?></span>	<br />
		-ឆាយាលេខ<span style="padding: 0 0 0 10%;">	<?php echo $monk_info->row()->monk_number;?>  ចេញដោយ   <?php echo $monk_info->row()->acknow_by;?></span>	<br />
		
		-ទីលំនៅសព្វថ្ងៃ  <span style="padding: 0 0 0 10%;">		<?php echo $monk_info->row()->current_address;?><span></span> <br />
		
		
	<span style="margin-left:5em">ភិក្ខុអង្គនេះពិតជាកំពុងស្នាក់នៅវត្តលង្កាព្រះកុសុមារាមប្រាកដមែន។</span>
	</span></p>
	<p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:right;line-height:normal;'>
     <span lang=KHM
    style='font-size:12.0pt;font-family:"Khmer OS Battambang"'>វត្តលង្កា ថ្ងៃទី        ខែ           ឆ្នាំ ២០១៦<br />
<span style="padding-right: 10% !important;">ចៅអធិការ
</span></p>

	</div>

	</div>
</div>


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