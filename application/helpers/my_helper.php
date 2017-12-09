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
			"មន្រ្តីរាជការ",
			"ស្ថាប័នឯកជន"
		];
		return $job;
	}
}
