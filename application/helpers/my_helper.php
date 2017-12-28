<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('test_method'))
{
	function getMonthKhmer($month){
		$khMonth = array(
			'01'=>'មករា',
			'02'=>'កុម្ភះ',
			'03'=>'មិនា',
			'04'=>'មេសា',
			'05'=>'ឧសភា',
			'06'=>'មិថុនា',
			'07'=>'កក្កដា',
			'08'=>'សីហា',
			'09'=>'កញ្ញា',
			'10'=>'តុលា',
			'11'=>'វិច្ឆកា',
			'12'=>'ធ្នូ');
			return $khMonth[$month];
	}
    function ConvertNumberToKhmer($complete_char){

		//remove left zeros
		$cleanStr = ltrim($complete_char, '0');
		//split number/string to array
		$num_arr = mb_str_split($cleanStr);
		//$translated=''; $addThousand=false;

		$khnum = array('០','១','២','៣','៤','៥','៦','៧','៨','៩');
		$ennum = array('0','1','2','3','4','5','6','7','8','9');

		//loop to check each number character
		$test ="";
		foreach($num_arr as $key=>$value){
			if($value == null){
				$value = 0;
			}
			$test.= $khnum[$value];
		}
		return $test;
	}
	function mb_str_split( $string ) {
			//Split at all position not after the start: ^
			//and not before the end: $
			return preg_split('/(?<!^)(?!$)/u', $string );
	}
	function convertDateToKhmer($date){
		$exp_date = explode("-",$date );
		$string_khmer = "ថ្ងៃទី ".ConvertNumberToKhmer($exp_date[2])." ខែ ".  getMonthKhmer($exp_date[1])." ឆ្នាំ ". ConvertNumberToKhmer($exp_date[0]);
		return  $string_khmer;
	}
}

if( ! function_exists("job_category")){
	function job_category(){
		$job = [
			1=>"មន្រ្តីរាជការ",
			2=>"ស្ថាប័នឯកជន",
			3=>"សិស្សឬនិស្សិត"
		];
		return $job;
	}
}

if( ! function_exists("job_category_return")){
	function job_category_return($id){
		switch ($id) {
			case 1:
				return "មន្រ្តីរាជការ";
				break;
			case 2:
				return "ស្ថាប័នឯកជន";
				break;
			case 3:
				return "សិស្សឬនិស្សិត";
				break;
			default:
				return "";
				break;
		}
	}
}

if(! function_exists("monk_knowledge")){
	function monk_knowledge(){
		$monk_class = array(
			1 =>"បឋមភូមិ",
			2 =>"ទុតិយភូមិ",
			3 =>"បរិញ្ញាបត្ររង",
			4 =>"បរិញ្ញាបត្រ",
			5 =>"អនុបណ្ឌិត",
			6 =>"បណ្ឌិត",
		);
		return $monk_class;
	}
}

if(! function_exists("monk_knowledge_return")){
	function monk_knowledge_return($id){
		switch ($id) {
			case 1:
				return "បឋមភូមិ";
				break;
			case 2:
				return "ទុតិយភូមិ";
				break;
			case 3:
				return "បរិញ្ញាបត្ររង";
				break;
			case 4:
				return "បរិញ្ញាបត្រ";
				break;
			case 5:
				return "អនុបណ្ឌិត";
				break;
			case 6:
				return "បណ្ឌិត";
				break;
			default:
				return $id;
				break;
		}
	}
}

if(! function_exists("grade")){
	function grade($id){
		if(($id==1) || ($id==2) || ($id==3)){
			$array = array(
				1=> "ថ្នាកទី១",
				2=> "ថ្នាក់ទី២",
				3=> "ថ្នាក់ទី៣",
				4=> "បញ្ចប់ថ្នាក់",
			);
			return $array;
		}else if(($id==5) || ($id==6)){
			$array = array(
				5=> "ឆ្នាំទី១",
				6=> "ឆ្នាំទី២",
				4=> "បញ្ចប់ឆ្នាំ",
			);
			return $array;
		}
	}
}

if(! function_exists("grade_return")){
	function grade_return($id){
		switch ($id) {
			case 1:
				return "ថ្នាក់ទី១";
				break;
			case 2:
				return "ថ្នាក់ទី២";
				break;
			case 3:
				return "ថ្នាក់ទី៣";
				break;
			case 4:
				return "បញ្ចប់ថ្នាក់";
				break;
			case 5:
				return "ឆ្នាំទី១";
				break;
			case 6:
				return "ឆ្នាំទី២";
				break;
			default:
				return $id;
				break;
		}
	}
}

if(! function_exists("lavel_language")){
	function lavel_language(){
		$lavel = array(
			1=>"ខ្សោយ",
			2=>"មធ្យម",
			3=>"ល្អបង្គួរ",
			4=>"ល្អ",
			5=>"ល្អប្រសើរ",
		);
		return $lavel;
	}
}

if(! function_exists("lavel_language_return")){
	function lavel_language_return($id){
		switch ($id) {
			case 1:
				return "ខ្សោយ";
				break;
			case 2:
				return "មធ្យម";
				break;
			case 3:
				return "ល្អបង្គួរ";
				break;
			case 4:
				return "ល្អ";
				break;
			case 5:
				return "ល្អប្រសើរ";
				break;
			default:
				return $id;
				break;
		}
	}
}
