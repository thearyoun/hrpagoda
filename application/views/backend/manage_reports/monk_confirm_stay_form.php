<style type="text/css">
 #tbl-doc{
	 border:0px;
	 font-size:1.2em; 
	 margin-left:5em;
	 }
 #tbl-doc tr td{
	 padding:10px;
	 }	 
</style>
<div class="row" id="members"> 
	<div class="col-xs-12">
    <p id="photo" style="width:9%; height:120px; border:1px solid #685353; float:right; margin-right:30%; margin-bottom:3%;"></p>
		<div class="col-xs-12">
		<p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    2em;text-align:center;line-height:normal;font-weight: bold'>
    <span lang=KHM style='font-size:13.0pt;font-family:"Khmer OS Battambang"'>សម្តេចព្រះមហាអរិយវង្ស ព្រះចៅអធិការវត្តលង្កាព្រះកុសុមារាម<br />
		
		បញ្ជាក់ថា</span></p><br />
        
<table id="tbl-doc">
    		<tr>
				<td>-ភិក្ខុឈ្មោះ </td>
                <td style="padding:0px 20px 0px 20px;">:</td>
				<td>
                    <span><?php echo $monk_info->row()->username;?></span>
                    <span>អាយុ</span>
                    <span>
                         <?php
                            $dob= $monk_info->row()->date_of_birth;
                            $diff = (date('Y') - date('Y',strtotime($dob)));
                            echo ConvertNumberToKhmer($diff);
                        ?>
                    </span>
                    <span>ជនជាតិ</span>	
                    <span><?php echo $monk_info->row()->nation;?><span>	
                    <span>សញ្ជាតិ	</span>	
                    <span><?php echo $monk_info->row()->nationality;?> </span>
                </td>
            </tr>
            <tr>
				<td>-ថ្ងៃ ខែ ឆ្នាំកំណើត</td>	
                <td style="padding:0px 20px 0px 20px;">:</td>
				<td><?php echo convertDateToKhmer($monk_info->row()->date_of_birth);?></td>
            </tr>
            
             
            <tr>
				<td>-ទីកន្លែងកំណើត</td>
                <td style="padding:0px 20px 0px 20px;">:</td>
				<td><?php echo $monk_info->row()->place_of_birth;?>។</td> 
		    </tr>
        
			<tr>
		        <td>-ឪពុកឈ្មោះ	</td>
                <td style="padding:0px 20px 0px 20px;">:</td>
				<td>
                    <span><?php echo $monk_info->row()->father_name;?></span>
                    <span>មុខរបរ</span>
                    <span><?php echo $monk_info->row()->father_occupation;?></span>
                </td>
			</tr>
            
        	<tr>
			<td>-ម្ដាយឈ្មោះ </td>	
            <td style="padding:0px 20px 0px 20px;">:</td>
				<td>
                    <span><?php echo $monk_info->row()->mother_name;?></span>
                    <span>មុខរបរ	</span>
                    <span><?php echo $monk_info->row()->mother_occupation;?></span>
                </td>
		 	</tr>
            
         	<tr>
				<td>-មុខរបរសព្វថ្ងៃ</td>
                <td style="padding:0px 20px 0px 20px;">:</td>
				<td>
					<span><?php echo 'ព្រះសង្ឃ';?></span>
                </td>
            </tr>
            
            <tr>  
				<td>-ឆាយាលេខ</td>
                <td style="padding:0px 20px 0px 20px;">:</td>
				<td>
                    <sapn><?php echo $monk_info->row()->monk_number;?></span>
                    <span> ចេញដោយ   </span>
                    <span><?php echo $monk_info->row()->acknow_by;?></span>	
                </td>
			</tr>
            
        	<tr>
				<td>-ទីលំនៅសព្វថ្ងៃ  </td>
                <td style="padding:0px 20px 0px 20px;">:</td>
				<td>
					<span><?php echo $monk_info->row()->current_address;?></span>
                </td>
			</tr>
           
        	<tr>
            	<td></td>
                <td></td>
				<td>ភិក្ខុអង្គនេះពិតជាកំពុងស្នាក់នៅវត្តលង្កាព្រះកុសុមារាមប្រាកដមែន។</td>
    		</tr>
    </table>
    
    
	
	<p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:right;line-height:normal; margin-top:2em; margin-right:5em;'>
     <span lang=KHM
    style='font-size:12.0pt;font-family:"Khmer OS Battambang"'>វត្តលង្កា ថ្ងៃទី&nbsp;&nbsp;&nbsp;ខែ&nbsp;&nbsp;&nbsp;ឆ្នាំ ២០១៦<br />
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