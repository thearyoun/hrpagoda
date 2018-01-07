<div class="row" id="members">
    <div class="col-xs-12">
        <div class="col-xs-12">
            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal;font-weight: bold'>
    <span style='font-size:10.0pt'>ព្រះរាជាណាចក្រកម្ពុជា <br/>
		ជាតិ សាសនា ព្រះមហាក្សត្រ<br/>
		*************** <br/>
		ប្រវត្តិរូបសង្ខេប</span></p><br/>
            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:left;line-height:normal'>
    <span lang=KHM
          style='font-size:10pt'>
		<span style="margin-left:5em">ខ្ញុំព្រះករុណានាម </span><span
                style="padding: 0px 3em;"><?php echo $monk_info->row()->username; ?><span> 	<span
                        style="padding: 0px 4%;">ជនជាតិ</span> <?php echo $monk_info->row()->nation; ?> <span
                        style="padding: 0 0 0 4%;">សញ្ជាតិ	</span> <?php echo $monk_info->row()->nationality; ?> </span><br/>
		ថ្ងៃ ខែ ឆ្នាំកំណើត<span
                    style="padding: 0px 14%;">		<?php echo convertDateToKhmer($monk_info->row()->date_of_birth); ?></span>		មុខងារជា <span
                    style="padding: 0 0 0 10%;"><?php echo $monk_info->row()->position_name; ?></span> <br/>
		ទីកន្លែងកំណើត<span style="padding: 0 0 0 10%;">		<?php echo $monk_info->row()->place_of_birth; ?>។</span> <br/>
		អាសយដ្ឋានបច្ចុប្បន្ន <span style="padding: 0 0 0 10%;">		<?php echo $monk_info->row()->current_address; ?>
                <span></span> <br/>
		កំរិតវប្បធម៌	<span style="padding: 0px 10%;">		<?php echo $monk_info->row()->education; ?></span>		លេខទូរស័ព្ទ	<span
                        style="padding: 0 0 0 10%;"><?php echo $monk_info->row()->phone_number; ?></span><br/>
		ថ្ងៃ ខែ ឆ្នាំបួស	<span
                        style="padding: 0px 10%;">		<?php echo convertDateToKhmer($monk_info->row()->vegetarian_date); ?></span> <?php echo $monk_info->row()->vegetarian_place; ?>
                <br/>
		ភិក្ខុ ឬ សាមណេរ<span style="padding: 0px 10%;">		<?php echo $monk_info->row()->vegetarian_name; ?></span>		បួសបាន	<span
                        style="padding: 0 5% 0 5%;">	<?php echo $monk_info->row()->vegetarian_year; ?></span>	ព្រះវស្សា ។<br/>
		ព្រះឧបជ្ឈាយ៍នាម<span style="padding: 0px 10%;">		<?php echo $monk_info->row()->monk_reference; ?></span>		មុខងារ   <span
                        style="padding: 0 5%;"><?php echo $monk_info->row()->monk_reference_position; ?></span> លេខទូរស័ព្ទ <span
                        style="padding: 0 0 0 5%;"><?php echo $monk_info->row()->monk_reference_phone; ?></span><br/>
		អាសយដ្ឋានបច្ចុប្បន្ន 	<span
                        style="padding: 0 0 0 10%;">	<?php echo $monk_info->row()->monk_current_address; ?></span><br/>
		ឪពុកឈ្មោះ	<span style="padding: 0px 10%;">		<?php echo $monk_info->row()->father_name; ?></span>		មុខងារ	<span
                        style="padding:0 5%;"><?php echo $monk_info->row()->father_occupation; ?></span>		លេខទូរស័ព្ទ	<span
                        style="padding: 0 0 0 5%;"><?php echo $monk_info->row()->father_phone; ?></span><br/>
		អាសយដ្ឋានបច្ចុប្បន្ន	<span style="padding: 0 0 0 10%;">	<?php echo $monk_info->row()->father_address; ?>
                    ។</span><br/>
		ម្ដាយឈ្មោះ 	<span style="padding: 0px 10%;">		<?php echo $monk_info->row()->mother_name; ?></span>		មុខងារ	<span
                        style="padding: 0 5%;"><?php echo $monk_info->row()->mother_occupation; ?></span>	លេខទូរស័ព្ទ	<span
                        style="padding: 0 0 0 5%;"><?php echo $monk_info->row()->mother_phone; ?></span><br/>
		 អាស័យដ្ឋានបច្ចុប្បន្ន	<span style="padding: 0px 10%;"> 	<?php echo $monk_info->row()->mother_address; ?>
                    ។</span>	<br/>
		និមន្ដមកពីវត្ត<span
                        style="padding: 0 0 0 10%;">	<?php echo $monk_info->row()->from_pagoda; ?></span>	<br/>
		
		មានបងប្អូនចំនួន <span style="padding: 0px 5%;">		<?php echo $monk_info->row()->number_of_bro_sis; ?>
                    នាក់ </span>	ប្រុសចំនួន <span
                        style="padding: 0 4%;"><?php echo $monk_info->row()->number_of_brother; ?> នាក់</span>	 ស្រីចំនួន <span
                        style="padding: 0 4%;"><?php echo $monk_info->row()->number_of_sister; ?>នាក់ </span>		ខ្ញុំព្រះករុណាជាកូនទី <span
                        style="padding: 0 2%;"><?php echo $monk_info->row()->child_level; ?>។</span><br/>
		
	<span style="margin-left:5em">ខ្ញុំព្រះករុណាសូមសន្យាថា ប្រវត្តិរូបនេះ ពិតជាត្រឹមត្រូវ ប្រសិនបើថ្ងៃក្រោយប្រែក្លាយជាមិនពិត ដូចជាការរៀបរាប់ខាងលើ ខ្ញុំព្រះករុណា សូមទទួលខុសត្រូវចំពោះមុខច្បាប់ទាំងស្រុង។</span>
	</span></p>
            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:right;line-height:normal;'>
     <span lang=KHM
           style='font-size:10.0pt'>ធ្វើនៅ.....................ថ្ងៃទី............ខែ...............ឆ្នាំ២០១៦<br/>
<span style="padding-right: 18% !important;">ហត្ថលេខា
</span></p>

            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:left;line-height:normal;text-align: left;'>
     <span lang=KHM
           style='font-size:10.0pt'>
	<span style="margin-left: 4%">បានឃើញ និងបញ្ជាក់ថា ប្រវត្តិរូប</span><br/>
ខាងលើនេះ ពិតជាត្រឹមត្រូវពិតប្រាកដមែន។<br/>
<span style="margin-left: 3%">ថ្ងៃទី.............ខែ.................ឆ្នាំ២០១៦</span><br/>
<span style="margin-left: 13%">មេកុដិ</span>
</span>
            </p>


        </div>
    </div>
</div>

<hr/>
<div style="text-align: center;">
    <button class="btn btn-warning" type="button" id="btn-print" onclick="printDiv('members')">
        <i class="ace-icon fa fa-print bigger-110"></i>
        <?php echo $this->lang->line('fm_btn_print'); ?>
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