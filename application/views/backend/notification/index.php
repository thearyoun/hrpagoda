<div style="clear: both;"></div>
<?php
	if($this->session->flashdata('success')){
		$mes_info=$this->session->flashdata('success');
?>
		
		<div class="alert alert-success alert-dismissable">
        	<i class="fa fa-check"></i>
             	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <b>Alert!</b> <?php echo $mes_info;?>
        </div>
<?php
	}elseif($this->session->flashdata('info')){
		$mes_info=$this->session->flashdata('info');
?>
		<br />
		<div class="alert alert-info alert-dismissable">
        	<i class="fa fa-info"></i>
             	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <b>Alert!</b> <?php echo $mes_info;?>
        </div>
<?php
	}elseif($this->session->flashdata('warning')){
		$mes_info=$this->session->flashdata('warning');
?>
		<br />
		<div class="alert alert-warning alert-dismissable">
        	<i class="fa fa-warning"></i>
             	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <b>Alert!</b> <?php echo $mes_info;?>
        </div>
<?php
	}else if($this->session->flashdata('error')){
		$mes_info=$this->session->flashdata('error');
?>
		<br />
		<div class="alert alert-danger alert-dismissable">
        	<i class="fa fa-ban"></i>
             	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <b>Alert!</b> <?php echo $mes_info;?>
        </div>
<?php
	}
?>

<?php
	if($this->session->flashdata('error_login')){
?>
		<div class="alert alert-danger alert-dismissable">
        	<i class="fa fa-ban"></i>
             	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <b>Alert!</b> Email or Password is wrong
        </div>
							
<?php
	}
?>
