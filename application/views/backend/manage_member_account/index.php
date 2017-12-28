<label>
	<a href="<?php echo base_url();?>manage_members/update_member/<?php echo $id;?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i>កែប្រែ</a>
</label>
<br/>
<br/>
<table class="table table-striped table-bordered table-hover">
	<tr>
		<th width="20%">ឈ្មោះពុទ្ធបរិស័ទ្ធ </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->username;?></td>
		<th width="20%">ភេទ</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo ($members->gender == "M")? "ប្រុស":"ស្រី";?></td>
	</tr>
	<tr>
		<th width="20%">ជនជាតិ </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->nation;?></td>
		<th width="20%">សញ្ជាតិ </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->nationality;?></td>
	</tr>
	<tr>
		<th width="20%">ថ្ងៃ ខែ ឆ្នាំកំណើត </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo convertDateToKhmer($members->date_of_birth);?></td>
		<th width="20%">ទីកន្លែងកំណើត  </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->place_of_birth;?></td>
	</tr>
	<tr>
		<th width="20%">ស្នាក់នៅថ្ងៃ </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo convertDateToKhmer($members->stay_date);?></td>
		<th width="20%">អាសយដ្ឋានបច្ចុប្បន្ន  </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->current_address;?></td>
	</tr>
	<tr>
		<th width="20%">កំរិតការសិក្សា </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->edname.($members->gradename?"(".$members->gradename.")":"");?></td>
		<th width="20%">លេខទូរស័ព្ទ   </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->phone_number;?></td>
	</tr>
	<tr>
		<th width="20%">ស្ថានភាពគ្រួសារ </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo ($members->family_status == "single") ? "នៅលីវ":"មានគ្រួសារ";?></td>
		<th width="20%">អត្តសញ្ញាណប័ណ្ណ   </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->identify_card;?></td>
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
		<th width="20%">ភិក្ខុទទួលខុសត្រូវ </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->monk_name;?></td>
		<th width="20%">ជ្រើសរើសរូបភាព </th>
		<th width="2%">:</th>
		<td width="28%"><img src="<?php echo base_url();?>ftemplate/images/<?php echo $members->photo;?>" width="120px;"></td>
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
</table>
<table class="table table-striped table-bordered table-hover">
	<tr>
		<th width="20%">ជាសិស្ស ឬ និស្សិត  :</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo ($members->student_type == 1)? "សិស្ស":"និស្សិត ";?></td>
		<th width="20%">មន្រ្ដីរាជការ ឬ បុគ្គលិក :</th>
		<th width="2%">:</th>
		<td width="28%"><?php echo ($members->work_type == 1)? "មន្រ្ដីរាជការ":($members->work_type==2?"បុគ្គលិក":"គ្មាន");?></td>
	</tr>
	<tr>
		<th width="20%">រៀននៅ </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->study_at;?></td>
		<th width="20%">មុខងារបច្ចុប្បន្ន </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->position;?></td>
	</tr>
	<tr>
		<th width="20%">ជំនាន់ទី </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->generation;?></td>
		<th width="20%">ឈ្មោះស្ថាប័ន </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->company_name;?></td>
	</tr>
	<tr>
		<th width="20%">អាសយដ្ឋានសាលារៀន </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->school_address;?></td>
		<th width="20%">អាសយដ្ឋានស្ថាប័នធ្វើការ </th>
		<th width="2%">:</th>
		<td width="28%"><?php echo $members->company_address;?></td>
	</tr>
</table>
