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
		$act="Last 10 loans";
	}
?>

<div class="breadcrumbs" id="breadcrumbs">
	<script type="text/javascript">
		try {
			ace.settings.check('breadcrumbs', 'fixed')
		} catch(e) {
		}
	</script>

	<ul class="breadcrumb">
		<li>
			<i class="ace-icon fa fa-home home-icon"></i>
			<a href="<?php echo base_url();?>">Home</a>
		</li>

		<li>
			<a href="<?php echo base_url();?>"><?php echo $title;?></a>
		</li>
		<li class="active">
			<?php echo $act;?>
		</li>
	</ul><!-- /.breadcrumb -->

	<!--<div class="nav-search" id="nav-search">
		<form class="form-search">
			<span class="input-icon">
				<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
				<i class="ace-icon fa fa-search nav-search-icon"></i> </span>
		</form>
	</div>--><!-- /.nav-search -->
</div>