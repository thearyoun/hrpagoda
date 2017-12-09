<?php
	$uri1=$this->uri->segment(1);
	$uri2=$this->uri->segment(2);
	if($uri1!=""){
		if($uri2==""){
			$uri2="List";
		}
		$title=ucfirst(str_replace('_', ' ', $uri1));
		$act=ucfirst(str_replace('_', ' ', $uri2));
	}else{
		$title="Dashboard";
		$act="Last 10 users";
	}
?>

<div class="page-header">
	<h1><?php echo $title;?><small> <i class="ace-icon fa fa-angle-double-right"></i> <?php echo $act;?></small></h1>
</div><!-- /.page-header -->