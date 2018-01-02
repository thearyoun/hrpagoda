<label>
	<a href="<?php echo base_url();?>manage_monks/update_monk/<?php echo $id;?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i>កែប្រែ</a>
</label>
<table class="table table-striped table-bordered table-hover">
	<tr>
		<th width="20%">ភិក្ខុឈ្មោះ </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $monks->username;?></td>
		<th width="20%">ជនជាតិ :</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $monks->nation;?></td>
	</tr>
	<tr>
		<th width="20%">សញ្ជាតិ </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $monks->nationality;?></td>
		<th width="20%">ថ្ងៃ ខែ ឆ្នាំកំណើត :</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo convertDateToKhmer($monks->date_of_birth);?></td>
	</tr>
	<tr>
		<th width="20%">ទីកន្លែងកំណើត </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $monks->place_of_birth;?></td>
		<th width="20%">មុខងារ :</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $monks->pos_name;?></td>
	</tr>
	<tr>
		<th width="20%">អាសយដ្ឋានបច្ចុប្បន្ន </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $monks->current_address;?></td>
		<th width="20%">កំរិតវប្បធម៌ :</th>
		<th width="2%">:</th>
		<td width="28%">
			<?php
			echo monk_knowledge_return($monks->education);
			if($monks->grade !=""){
				echo " (".grade_return($monks->grade).")";
			}
			?>
		</td>
	</tr>
	<tr>
		<th width="20%">លេខទូរស័ព្ទ </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $monks->phone_number;?></td>
		<th width="20%">វត្ត :</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $monks->vegetarian_place;?></td>
	</tr>
	<tr>
		<th width="20%">ថ្ងៃ ខែ ឆ្នាំបួស </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo convertDateToKhmer($monks->vegetarian_date);?></td>
		<th width="20%">បួសបាន :</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $monks->yeartime." ឆ្នាំ";?></td>
	</tr>
	<tr>
		<th width="20%">ភិក្ខុ ឬ សាមណេរ </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo ($monks->vegetarian_types == 1)? "ភិក្ខុ": "សាមណេរ ";?></td>
		<th width="20%">​ស្នាក់នៅថ្ងៃ  :</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo convertDateToKhmer($monks->stay_date);?></td>
	</tr>
	<tr>
		<th width="20%">កុដិលេខ </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $monks->house_name;?></td>
		<th width="20%">មកពីខេត្ត  :</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $monks->location_name;?></td>
	</tr>
	<tr>
		<th width="20%">លេខឆាយា </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $monks->monk_number;?></td>
		<th width="20%">​ទទួលស្គាល់ដោយ  :</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $monks->acknow_by;?></td>
	</tr>
	<tr>
		<th width="20%">ក្រុម  </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $monks->group_name;?></td>
		<th width="20%">ចាកចេញថ្ងៃ </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo ($monks->leave_date?convertDateToKhmer($monks->leave_date):"");?></td>
	</tr>
	<?php if($lanuage !=false){
			foreach ($lanuage->result() as $row) {
		?>
	<tr>
		<th>ភាសា</th>
		<th>:</th>
		<th colspan="4"><?php echo $row->langname." : និយាយ(".lavel_language_return($row->speaking).")
		ស្តាប់(".lavel_language_return($row->listening).") អាន(".lavel_language_return($row->reading).") សរសេរ(".lavel_language_return($row->writing).")";?></th>
	</tr>
<?php }}else{
	echo "<tr><th colspan='6'>គ្មានភាសា</th></tr>";
}?>
	<tr>
		<th width="20%">និមន្ដមកពីវត្ត </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $monks->from_pagoda;?></td>
		<th width="20%">រូបភាព </th>
		<th width="2%">:</th>
		<td width="28%"><img src="<?php echo base_url();?>ftemplate/images/<?php echo $monks->photo;?>" width="120"></td>
	</tr>

</table>
<table class="table table-striped table-bordered table-hover">
	<tr>
		<th width="20%">ព្រះឧបជ្ឈាយ៍នាម </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $monks->monk_reference;?></td>
		<th width="20%">អាសយដ្ឋានបច្ចុប្បន្ន  :</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $monks->monk_current_address;?></td>
	</tr>
	<tr>
		<th width="20%">លេខទូរស័ព្ទ </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $monks->monk_reference_phone;?></td>
		<th width="20%">មុខរបរ  :</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $monks->monk_reference_position;?></td>
	</tr>
</table>

<table class="table table-striped table-bordered table-hover">
	<tr>
		<th width="20%">ឪពុកឈ្មោះ </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $monks->father_name;?></td>
		<th width="20%">មុខរបរ  :</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $monks->father_occupation;?></td>
	</tr>
	<tr>
		<th width="20%">លេខទូរស័ព្ទ </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $monks->father_phone;?></td>
		<th width="20%">អាស័យដ្ឋានបច្ចុប្បន្ន</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $monks->father_address;?></td>
	</tr>
	<tr>
		<th width="20%">ម្ដាយឈ្មោះ </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $monks->mother_name;?></td>
		<th width="20%">មុខរបរ  :</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $monks->mother_occupation;?></td>
	</tr>
	<tr>
		<th width="20%">លេខទូរស័ព្ទ </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $monks->mother_phone;?></td>
		<th width="20%">អាស័យដ្ឋានបច្ចុប្បន្ន :</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $monks->mother_address;?></td>
	</tr>
	<tr>
		<th width="20%">មានបងប្អូនចំនួន </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $monks->number_of_bro_sis;?></td>
		<th width="20%">ប្រុសចំនួន :</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $monks->number_of_brother;?></td>
	</tr>
	<tr>
		<th width="20%">ស្រីចំនួន </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $monks->number_of_sister;?></td>
		<th width="20%">ជាកូនទី  :</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $monks->child_level;?></td>
	</tr>
</table>
