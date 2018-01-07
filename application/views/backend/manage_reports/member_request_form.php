<div class="row" id="members"> 
	<div class="col-xs-12">
		<div class="col-xs-12">
		<p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal;font-weight: bold'>
    <span lang=KHM style='font-size:10.0pt;font-family:"Khmer OS Battambang"'>ព្រះរាជាណាចក្រកម្ពុជា <br />
		ជាតិ សាសនា ព្រះមហាក្សត្រ<br />
		*************** <br />
		ប្រវត្តិរូបសង្ខេប</span></p><br />
			<p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:left;line-height:normal'>
    <span lang=KHM
    style='font-size:10.0pt;font-family:"Khmer OS Battambang"'>
		<span style="margin-left:3em">គោត្តនាម និង នាម </span><span style="padding: 0px 5%;"><?php echo $member_info->row()->username;?><span> 	<span style="padding: 0px 4%;">ជនជាតិ</span>		<?php echo $member_info->row()->nation;?>		<span style="padding: 0 4% 0 4%;">សញ្ជាតិ	</span>	<?php echo $member_info->row()->nationality;?> </span><br />
		ថ្ងៃ ខែ ឆ្នាំកំណើត<span style="padding: 0px 5%;">		<?php echo convertDateToKhmer($member_info->row()->date_of_birth);?></span>	<br />
		ទីកន្លែងកំណើត<span style="padding: 0 0 0 5%;">		<?php echo $member_info->row()->place_of_birth;?>។</span> <br />
		ថ្ងៃខែឆ្នាំចូលស្នាក់នៅៈ<span style="padding: 0 0 0 5%;">		<?php echo convertDateToKhmer($member_info->row()->stay_date);?>។</span> <br />
		អាសយដ្ឋានបច្ចុប្បន្ន <span style="padding: 0 0 0 5%;">		<?php echo $member_info->row()->current_address;?><span></span> <br />
		កំរិតវប្បធម៌	<span style="padding: 0px 10%;">		<?php echo $member_info->row()->education;?></span>		លេខទូរស័ព្ទ	<span style="padding: 0 0 0 10%;"><?php echo $member_info->row()->phone_number;?></span><br />
		
		<span>មុខងារបច្ចុប្បន្នៈ 	</span><span style="padding: 0 0 0 5%;"><?php echo $member_info->row()->position;?></span><br />
		<span style="margin-left:3em">ក-ជាសិស្ស ឬ និស្សិត </span><span style="padding: 0 5%;"><?php echo $member_info->row()->student_type;?></span> រៀននៅ <span style="padding: 0 5%;"><?php echo $member_info->row()->study_at;?></span> ថ្នាក់ទី ឬ ឆ្នាំទី <span style="padding: 0 5%;"><?php echo $member_info->row()->year;?></span><br />
		<span style="margin-left:3em">ជំនាន់ទី</span><span style="padding: 0 5%;"> <?php echo $member_info->row()->generation;?></span> 	ក្រុមទី <span style="padding: 0 5%;"><?php echo $member_info->row()->group;?></span>	អាសយដ្ឋានសាលារៀន<span style="padding: 0 5%;"><?php echo $member_info->row()->school_address;?></span><br />
		<span style="margin-left:3em">ខ- អ្នកធ្វើការ(មន្រ្ដីរាជការ ឬ បុគ្គលិក ) </span><span style="padding: 0 5%;"><?php echo $member_info->row()->work_type;?></span>ឈ្មោះស្ថាប័ន<span style="padding: 0 5%;"><?php echo $member_info->row()->company_name;?></span><br />
		<span style="margin-left:3em">អាសយដ្ឋានស្ថាប័នធ្វើការ.</span><span style="padding: 0 5%;"><?php echo $member_info->row()->company_address;?></span><br />

		
		<span>ស្ថានភាពគ្រូសារ នៅលីវ ឬ មានគ្រួសារៈ</span> <span style="padding: 0 0 0 5%;">		<?php echo ($member_info->row()->family_status == "single" ? "នៅលីវ":"មានគ្រួសារ");?><span></span> <br />
		<span style="margin-left:3em">ឪពុកឈ្មោះ</span>	<span style="padding: 0 5%;">		<?php echo $member_info->row()->father_name;?></span>		មុខងារ	<span style="padding:0 5%;"><?php echo $member_info->row()->father_occupation;?></span>		លេខទូរស័ព្ទ	<span style="padding: 0 0 0 5%;"><?php echo $member_info->row()->father_phone;?></span><br />
		<span style="margin-left:3em">អាសយដ្ឋានបច្ចុប្បន្ន</span>	<span style="padding: 0 0 0 5%;">	<?php echo $member_info->row()->father_address;?>	។</span><br />	
		<span style="margin-left:3em">ម្ដាយឈ្មោះ</span> 	<span style="padding: 0px 5%;">		<?php echo $member_info->row()->mother_name;?></span>		មុខងារ	<span style="padding: 0 5%;"><?php echo $member_info->row()->mother_occupation;?></span>	លេខទូរស័ព្ទ	<span style="padding: 0 0 0 5%;"><?php echo $member_info->row()->mother_phone;?></span><br />
		 <span style="margin-left:3em">អាស័យដ្ឋានបច្ចុប្បន្ន</span>	<span style="padding: 0px 5%;"> 	<?php echo $member_info->row()->mother_address;?>	។</span>	<br />
		
	
	<span>មធ្យោបាយធ្វើដំណើរ ( កម្មសិទ្ធិផ្ទាល់ខ្លួន )</span><br />	
	<span style="margin-left:3em">ក- រថយន្ដធុន....................ពណ៌...................ផ្លាកលេខ.................លេខតូ...................លេខម៉ាស៊ីន..........</span><br />
	<span style="margin-left:3em">ខ- ម៉ូតូធុន.........................ពណ៌...................ផ្លាកលេខ.................លេខតូ...................លេខម៉ាស៊ីន..........</span><br />
	<span style="margin-left:3em">គ- កង់ប្រភេទ....................ពណ៌...................។</span><br />

		
	<span style="margin-left:3em">ប្រវត្តិរូបនេះពិតជាត្រឹមត្រូវ បើប្រាកចាកពីការពិត ខ្ញុំព្រះករុណាសូមទទួលខុសត្រូវចំពោះមុខច្បាប់ជាធរមាន ។</span>
	</span></p><br />
	<p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:right;line-height:normal;'>
     <span lang=KHM
    style='font-size:10.0pt;font-family:"Khmer OS Battambang"'>ធ្វើនៅ.....................ថ្ងៃទី............ខែ...............ឆ្នាំ២០១៦<br />
<span style="padding-right: 18% !important;">ហត្ថលេខា និង ឈ្មោះ
</span></p>

<p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:left;line-height:normal;text-align: left;'>
     <span lang=KHM
    style='font-size:10.0pt;font-family:"Khmer OS Battambang"'>
	
<span style="margin-left: 3%">អ្នកទទួលខុសត្រូវ</span><br />
<span style="margin-left: 3%">មេកុដិលេខ.................</span>
</span>
</p>



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