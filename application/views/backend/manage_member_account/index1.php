<table class="table table-striped table-bordered table-hover">
	<tr>
		<th width="20%">ភិក្ខុឈ្មោះ </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->username;?></td>
		<th width="20%">ជនជាតិ :</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->nation;?></td>
	</tr>
	<tr>
		<th width="20%">សញ្ជាតិ </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->nationality;?></td>
		<th width="20%">ថ្ងៃ ខែ ឆ្នាំកំណើត :</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->date_of_birth;?></td>
	</tr>
	<tr>
		<th width="20%">ទីកន្លែងកំណើត </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->place_of_birth;?></td>
		<th width="20%">មុខងារ :</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->pos_name;?></td>
	</tr>
	<tr>
		<th width="20%">អាសយដ្ឋានបច្ចុប្បន្ន </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->current_address;?></td>
		<th width="20%">កំរិតវប្បធម៌ :</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->education;?></td>
	</tr>
	<tr>
		<th width="20%">លេខទូរស័ព្ទ </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->phone_number;?></td>
		<th width="20%">វត្ត :</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->vegetarian_place;?></td>
	</tr>
	<tr>
		<th width="20%">ថ្ងៃ ខែ ឆ្នាំបួស </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->vegetarian_date;?></td>
		<th width="20%">បួសបាន :</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->vegetarian_year;?></td>
	</tr>
	<tr>
		<th width="20%">ភិក្ខុ ឬ សាមណេរ </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo ($members->vegetarian_types == 1)? "ភិក្ខុ": "សាមណេរ ";?></td>
		<th width="20%">មុខងារ  :</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->username;?></td>
	</tr>
	<tr>
		<th width="20%">ព្រះឧបជ្ឈាយ៍នាម </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->monk_reference;?></td>
		<th width="20%">អាសយដ្ឋានបច្ចុប្បន្ន  :</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->monk_current_address;?></td>
	</tr>
	<tr>
		<th width="20%">លេខទូរស័ព្ទ </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->monk_current_address;?></td>
		<th width="20%">​ស្នាក់នៅថ្ងៃ  :</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->stay_date;?></td>
	</tr>
</table>

<table class="table table-striped table-bordered table-hover">
	<tr>
		<th width="20%">ឪពុកឈ្មោះ </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->father_name;?></td>
		<th width="20%">មុខរបរ  :</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->father_occupation;?></td>
	</tr>
	<tr>
		<th width="20%">លេខទូរស័ព្ទ </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->father_phone;?></td>
		<th width="20%">អាស័យដ្ឋានបច្ចុប្បន្ន</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->father_address;?></td>
	</tr>
	<tr>
		<th width="20%">ម្ដាយឈ្មោះ </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->mother_name;?></td>
		<th width="20%">មុខរបរ  :</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->mother_occupation;?></td>
	</tr>
	<tr>
		<th width="20%">លេខទូរស័ព្ទ </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->mother_phone;?></td>
		<th width="20%">អាស័យដ្ឋានបច្ចុប្បន្ន :</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->mother_address;?></td>
	</tr>
	<tr>
		<th width="20%">និមន្ដមកពីវត្ត </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->from_pagoda;?></td>
		<th width="20%">ជ្រើសរើសរូបភាព </th>
		<th width="2%">:</th>
		<td width="28%"><img src="<?php echo base_url();?>ftemplate/images/<?php echo $members->photo;?>"></td>
	</tr>
	<tr>
		<th width="20%">មានបងប្អូនចំនួន </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->number_of_bro_sis;?></td>
		<th width="20%">ប្រុសចំនួន :</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->number_of_brother;?></td>
	</tr>
	<tr>
		<th width="20%">ស្រីចំនួន </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->number_of_sister;?></td>
		<th width="20%">ជាកូនទី  :</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->child_level;?></td>
	</tr>
	<tr>
		<th width="20%">កុដិលេខ </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->house_name;?></td>
		<th width="20%">មកពីខេត្ត  :</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->location_name;?></td>
	</tr>
	<tr>
		<th width="20%">លេខឆាយា </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->monk_number;?></td>
		<th width="20%">​ទទួលស្គាល់ដោយ  :</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->acknow_by;?></td>
	</tr>
	<tr>
		<th width="20%">ក្រុម  </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->group_name;?></td>
		<th width="20%">ចាកចេញថ្ងៃ </th>
		<th width="2%">:</th>
		<td width="28%"></td>
	</tr>
	
</table>