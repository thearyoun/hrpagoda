<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from responsiweb.com/themes/preview/ace/1.3.2/tables.html by HTTrack Website Copier/3.x [XR&CO'2008], Mon, 17 Nov 2014 14:59:15 GMT -->
<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $title;?> - HR Management System</title>

		<meta name="description" content="Pagoda HR Management System" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url();?>dist/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>font-awesome/4.2.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="<?php echo base_url();?>dist/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>dist/css/jquery.gritter.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>dist/css/select2.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>dist/css/datepicker.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>dist/css/bootstrap-editable.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>dist/css/chosen.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />
		<link href="https://fonts.googleapis.com/css?family=Khmer|Siemreap" rel="stylesheet">

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url();?>dist/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo base_url();?>dist/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?php echo base_url();?>dist/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="<?php echo base_url();?>dist/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="<?php echo base_url();?>dist/js/html5shiv.min.js"></script>
		<script src="<?php echo base_url();?>dist/js/respond.min.js"></script>
		<![endif]-->
		<style>
			html,body{
				font-family: 'Khmer', cursive !important; */
				font-family: 'Siemreap', cursive !important; */;
			}
			.required{
				color: red;
			}
			.error{
				color: red;
			}
			.print_size{
				font-size:9px !important;
			}
			@media print{
				a:link:after, a:visited:after {
				    content: "";
				}
			}
			/*table th,table td,form,li,button
			{
			   font-family:"Khmer OS Battambang" !important;
			}*/
.borderless td, .borderless th {
    border: none;
}
.table-borderless > tbody > tr > td,
.table-borderless > tbody > tr > th,
.table-borderless > tfoot > tr > td,
.table-borderless > tfoot > tr > th,
.table-borderless > thead > tr > td,
.table-borderless > thead > tr > th {
    border: none;
}
		</style>
	</head>

	<body class="no-skin">

		<?php include 'themes/navbar.php';?>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
			<?php include 'themes/sidebar.php'; ?>

			<div class="main-content">
				<div class="main-content-inner">

					<?php
						include 'themes/nav_search.php';
					?>

					<div class="page-content">
						<?php include 'themes/setting.php'; ?>

						<?php include 'themes/page_header.php'; ?>

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<?php
												$uri1=$this->uri->segment(1);
												$uri2=$this->uri->segment(2);
												if($uri1==""){

													 include 'themes/content.php';
												}else{

													$this -> load -> view('backend/'.$uri1 . '/' . (($uri2 == '') ? 'index' : $uri2));
												}
								?>




							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
			<?php include 'themes/footer.php'; ?>


			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->


	</body>

<!-- Mirrored from responsiweb.com/themes/preview/ace/1.3.2/tables.html by HTTrack Website Copier/3.x [XR&CO'2008], Mon, 17 Nov 2014 14:59:17 GMT -->
</html>
<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="<?php echo base_url();?>ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url();?>dist/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='<?php echo base_url();?>dist/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url();?>dist/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url();?>bootstrap/3.3.0/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="<?php echo base_url();?>dist/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url();?>dist/js/jquery.dataTables.bootstrap.min.js"></script>
		<!--[if lte IE 8]>
		  <script src="dist/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="<?php echo base_url();?>dist/js/jquery-ui.custom.min.js"></script>
		<script src="<?php echo base_url();?>dist/js/jquery.ui.touch-punch.min.js"></script>
		<script src="<?php echo base_url();?>dist/js/jquery.gritter.min.js"></script>
		<script src="<?php echo base_url();?>dist/js/bootbox.min.js"></script>

		<script src="<?php echo base_url();?>dist/js/jquery.easypiechart.min.js"></script>

		<script src="<?php echo base_url();?>dist/js/date-time/bootstrap-datepicker.min.js"></script>
		<script src="<?php echo base_url();?>dist/js/jquery.hotkeys.min.js"></script>

		<script src="<?php echo base_url();?>dist/js/bootstrap-wysiwyg.min.js"></script>

		<script src="<?php echo base_url();?>dist/js/select2.min.js"></script>
		<script src="<?php echo base_url();?>dist/js/fuelux/fuelux.spinner.min.js"></script>

		<script src="<?php echo base_url();?>dist/js/x-editable/bootstrap-editable.min.js"></script>
		<script src="<?php echo base_url();?>dist/js/x-editable/ace-editable.min.js"></script>
		<script src="<?php echo base_url();?>dist/js/jquery.maskedinput.min.js"></script>

		<script src="<?php echo base_url();?>dist/js/chosen.jquery.min.js"></script>

		<script src="<?php echo base_url();?>dist/js/date-time/bootstrap-datepicker.min.js"></script>

		<!-- ace scripts -->
		<script src="<?php echo base_url();?>dist/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url();?>dist/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				var oTable1 =
				$('#sample-table-11')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.dataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false },
					  null, null,null, null, null,null,null,null,null,
					  { "bSortable": false }
					],
					"aaSorting": [9],

					//,
					//"sScrollY": "200px",
					//"bPaginate": false,

					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element

					"iDisplayLength": 50
			    } );
			    $('#sample-table-10')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.dataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false },
					  null, null,null, null, null,null,null,null,
					  { "bSortable": false }
					],
					"aaSorting": [8],

					//,
					//"sScrollY": "200px",
					//"bPaginate": false,

					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element

					"iDisplayLength": 50
			    } );
				$('#sample-table-9')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.dataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false },
					  null, null,null, null, null,null,null,
					  { "bSortable": false }
					],
					"aaSorting": [7],

					//,
					//"sScrollY": "200px",
					//"bPaginate": false,

					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element

					"iDisplayLength": 50
			    } );
			    $('#sample-table-8')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.dataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false },
					  null, null,null, null, null,null,
					  { "bSortable": false }
					],
					"aaSorting": [6],

					//,
					//"sScrollY": "200px",
					//"bPaginate": false,

					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element

					"iDisplayLength": 50
			    } );


				$('#sample-table-2')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.dataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false },
					  null, null,null, null, null,
					  { "bSortable": false }
					],
					"aaSorting": [5],

					//,
					//"sScrollY": "200px",
					//"bPaginate": false,

					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element

					"iDisplayLength": 50
			    } );

			    $('#sample-table-3')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.dataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false },
					  null, null,null, null,
					  { "bSortable": false }
					],
					"aaSorting": [4],

					//,
					//"sScrollY": "200px",
					//"bPaginate": false,

					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element

					"iDisplayLength": 50
			    } );

			    $('#sample-table-4')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.dataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false },
					  null, null,null,
					  { "bSortable": false }
					],
					"aaSorting": [3],

					//,
					//"sScrollY": "200px",
					//"bPaginate": false,

					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element

					"iDisplayLength": 50
			    } );
				/**
				var tableTools = new $.fn.dataTable.TableTools( oTable1, {
					"sSwfPath": "../../copy_csv_xls_pdf.swf",
			        "buttons": [
			            "copy",
			            "csv",
			            "xls",
						"pdf",
			            "print"
			        ]
			    } );
			    $( tableTools.fnContainer() ).insertBefore('#sample-table-2');
				*/


				//oTable1.fnAdjustColumnSizing();


				$(document).on('click', 'th input:checkbox' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
				});


				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();

					var off2 = $source.offset();
					//var w2 = $source.width();

					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}

			})


			// *** editable avatar *** //
				try {//ie8 throws some harmless exceptions, so let's catch'em

					//first let's add a fake appendChild method for Image element for browsers that have a problem with this
					//because editable plugin calls appendChild, and it causes errors on IE at unpredicted points
					try {
						document.createElement('IMG').appendChild(document.createElement('B'));
					} catch(e) {
						Image.prototype.appendChild = function(el){}
					}

					var last_gritter
					$('#avatar').editable({
						type: 'image',
						name: 'avatar',
						value: null,
						image: {
							//specify ace file input plugin's options here
							btn_choose: 'Change Avatar',
							droppable: true,
							maxSize: 110000,//~100Kb

							//and a few extra ones here
							name: 'avatar',//put the field name here as well, will be used inside the custom plugin
							on_error : function(error_type) {//on_error function will be called when the selected file has a problem
								if(last_gritter) $.gritter.remove(last_gritter);
								if(error_type == 1) {//file format error
									last_gritter = $.gritter.add({
										title: 'File is not an image!',
										text: 'Please choose a jpg|gif|png image!',
										class_name: 'gritter-error gritter-center'
									});
								} else if(error_type == 2) {//file size rror
									last_gritter = $.gritter.add({
										title: 'File too big!',
										text: 'Image size should not exceed 100Kb!',
										class_name: 'gritter-error gritter-center'
									});
								}
								else {//other error
								}
							},
							on_success : function() {
								$.gritter.removeAll();
							}
						},
					    url: function(params) {
							// ***UPDATE AVATAR HERE*** //
							//for a working upload example you can replace the contents of this function with
							//examples/profile-avatar-update.js

							var deferred = new $.Deferred

							var value = $('#avatar').next().find('input[type=hidden]:eq(0)').val();
							if(!value || value.length == 0) {
								deferred.resolve();
								return deferred.promise();
							}


							//dummy upload
							setTimeout(function(){
								if("FileReader" in window) {
									//for browsers that have a thumbnail of selected image
									var thumb = $('#avatar').next().find('img').data('thumb');
									if(thumb) $('#avatar').get(0).src = thumb;
								}

								deferred.resolve({'status':'OK'});

								if(last_gritter) $.gritter.remove(last_gritter);
								last_gritter = $.gritter.add({
									title: 'Avatar Updated!',
									text: 'Uploading to server can be easily implemented. A working example is included with the template.',
									class_name: 'gritter-info gritter-center'
								});

							 } , parseInt(Math.random() * 800 + 800))

							return deferred.promise();

							// ***END OF UPDATE AVATAR HERE*** //
						},

						success: function(response, newValue) {
						}
					})
				}catch(e) {}

				/**
				//let's display edit mode by default?
				var blank_image = true;//somehow you determine if image is initially blank or not, or you just want to display file input at first
				if(blank_image) {
					$('#avatar').editable('show').on('hidden', function(e, reason) {
						if(reason == 'onblur') {
							$('#avatar').editable('show');
							return;
						}
						$('#avatar').off('hidden');
					})
				}
				*/

			//another option is using modals
				$('#avatar2').on('click', function(){
					var modal =
					'<div class="modal fade">\
					  <div class="modal-dialog">\
					   <div class="modal-content">\
						<div class="modal-header">\
							<button type="button" class="close" data-dismiss="modal">&times;</button>\
							<h4 class="blue">Change Avatar</h4>\
						</div>\
						\
						<form class="no-margin">\
						 <div class="modal-body">\
							<div class="space-4"></div>\
							<div style="width:75%;margin-left:12%;"><input type="file" name="file-input" /></div>\
						 </div>\
						\
						 <div class="modal-footer center">\
							<button type="submit" class="btn btn-sm btn-success"><i class="ace-icon fa fa-check"></i> Submit</button>\
							<button type="button" class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> Cancel</button>\
						 </div>\
						</form>\
					  </div>\
					 </div>\
					</div>';


					var modal = $(modal);
					modal.modal("show").on("hidden", function(){
						modal.remove();
					});

					var working = false;

					var form = modal.find('form:eq(0)');
					var file = form.find('input[type=file]').eq(0);
					file.ace_file_input({
						style:'well',
						btn_choose:'Click to choose new avatar',
						btn_change:null,
						no_icon:'ace-icon fa fa-picture-o',
						thumbnail:'small',
						before_remove: function() {
							//don't remove/reset files while being uploaded
							return !working;
						},
						allowExt: ['jpg', 'jpeg', 'png', 'gif'],
						allowMime: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']
					});

					form.on('submit', function(){
						if(!file.data('ace_input_files')) return false;

						file.ace_file_input('disable');
						form.find('button').attr('disabled', 'disabled');
						form.find('.modal-body').append("<div class='center'><i class='ace-icon fa fa-spinner fa-spin bigger-150 orange'></i></div>");

						var deferred = new $.Deferred;
						working = true;
						deferred.done(function() {
							form.find('button').removeAttr('disabled');
							form.find('input[type=file]').ace_file_input('enable');
							form.find('.modal-body > :last-child').remove();

							modal.modal("hide");

							var thumb = file.next().find('img').data('thumb');
							if(thumb) $('#avatar2').get(0).src = thumb;

							working = false;
						});


						setTimeout(function(){
							deferred.resolve();
						} , parseInt(Math.random() * 800 + 800));

						return false;
					});

				});


			//////////////////////////////
				$('#profile-feed-1').ace_scroll({
					height: '250px',
					mouseWheelLock: true,
					alwaysVisible : true
				});

				$('a[ data-original-title]').tooltip();

				$('.easy-pie-chart.percentage').each(function(){
				var barColor = $(this).data('color') || '#555';
				var trackColor = '#E2E2E2';
				var size = parseInt($(this).data('size')) || 72;
				$(this).easyPieChart({
					barColor: barColor,
					trackColor: trackColor,
					scaleColor: false,
					lineCap: 'butt',
					lineWidth: parseInt(size/10),
					animate:false,
					size: size
				}).css('color', barColor);
				});

			///////////////////////////////////////////

				//right & left position
				//show the user info on right or left depending on its position
				$('#user-profile-2 .memberdiv').on('mouseenter touchstart', function(){
					var $this = $(this);
					var $parent = $this.closest('.tab-pane');

					var off1 = $parent.offset();
					var w1 = $parent.width();

					var off2 = $this.offset();
					var w2 = $this.width();

					var place = 'left';
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) place = 'right';

					$this.find('.popover').removeClass('right left').addClass(place);
				}).on('click', function(e) {
					e.preventDefault();
				});


				///////////////////////////////////////////
				$('#user-profile-3')
				.find('input[type=file]').ace_file_input({
					style:'well',
					btn_choose:'Change avatar',
					btn_change:null,
					no_icon:'ace-icon fa fa-picture-o',
					thumbnail:'large',
					droppable:true,

					allowExt: ['jpg', 'jpeg', 'png', 'gif'],
					allowMime: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']
				})
				.end().find('button[type=reset]').on(ace.click_event, function(){
					$('#user-profile-3 input[type=file]').ace_file_input('reset_input');
				})
				.end().find('.date-picker').datepicker().next().on(ace.click_event, function(){
					$(this).prev().focus();
				})
				$('.input-mask-phone').mask('(999) 999-9999');

				$('#user-profile-3').find('input[type=file]').ace_file_input('show_file_list', [{type: 'image', name: $('#avatar').attr('src')}]);


				////////////////////
				//change profile
				$('[data-toggle="buttons"] .btn').on('click', function(e){
					var target = $(this).find('input[type=radio]');
					var which = parseInt(target.val());
					$('.user-profile').parent().addClass('hide');
					$('#user-profile-'+which).parent().removeClass('hide');
				});



				/////////////////////////////////////
				$(document).one('ajaxloadstart.page', function(e) {
					//in ajax mode, remove remaining elements before leaving page
					try {
						$('.editable').editable('destroy');
					} catch(e) {}
					$('[class*=select2]').remove();
				});

				//datepicker plugin
				//link
				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});



				if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true});
					//resize the chosen on window resize

					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});


					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}
		</script>
		<script>
			function goBack() {
			    window.history.back();
			}
		</script>
		<script type="text/javascript">
		$(document).ready(function() {
			//alert("tes");

			$('#loan_id').change(function() {

	                    // assign the value to a variable, so you can test to see if it is working
	                    var loanVal = $('#loan_id :selected').val();
	                    $.ajax({
							type: "POST",
							async: false,
							url: "<?php echo base_url() ; ?>welcome/get_payment_trans_no",
							data: {
									trans_no:loanVal,
								 },
							success: function(data){

										data=String(data).split('#');

										//alert(data);
										$('#transaction').val(data[1]);
										$('.req_date').val(data[2]);
										$('#revision').val(data[3]);



										var using_customer_id=data[5];


										var sel_customer = document.getElementById('customer');
									    var opts_customer = sel_customer.options;
									    for(var opt1, i = 0; opt1 = opts_customer[i]; i++) {
									        if(opt1.value == using_customer_id) {
									            sel_customer.selectedIndex = i;
									            break;
									        }
									    }


										var using_loan_type_id=data[4];


										var sel_loan_type = document.getElementById('loan_type');
									    var opts_loan_type = sel_loan_type.options;
									    for(var opt1, i = 0; opt1 = opts_loan_type[i]; i++) {
									        if(opt1.value == using_loan_type_id) {
									            sel_loan_type.selectedIndex = i;
									            break;
									        }
									    }


							}
						});

					});
		});

	</script>
	<script type="text/javascript">
		$(document).ready(function() {

			$("#btn-approve").on('click', function(e) {
				//alert("test");
                    e.preventDefault();
                    var checkValues = $('.checkbox_approved1:checked').map(function()
                    {
                        return $(this).val();
                    }).get();
                    console.log(checkValues);

                    $.each( checkValues, function( i, val ) {
                        $("#"+val).remove();
                        });
//                    return  false;
                    $.ajax({
                        url: '<?php echo base_url() ?>welcome/approved_loan',
                        type: 'post',
                        data: 'ids=' + checkValues
                    }).done(function(data) {
                        $("#respose").html(data);
                        $('#selectall').attr('checked', false);
                    });
                });
              $("#btn-cancel-approve").on('click', function(e) {
				//alert("test");
                    e.preventDefault();
                    var checkValues = $('.checkbox_approved1:checked').map(function()
                    {
                        return $(this).val();
                    }).get();
                    console.log(checkValues);

                    $.each( checkValues, function( i, val ) {
                        $("#"+val).remove();
                        });
//                    return  false;
                    $.ajax({
                        url: '<?php echo base_url() ?>welcome/cancel_approved_loan',
                        type: 'post',
                        data: 'ids=' + checkValues
                    }).done(function(data) {
                        $("#respose").html(data);
                        $('#selectall').attr('checked', false);
                    });
                });
             $("#btn-issue").on('click', function(e) {
				//alert("test");
                    e.preventDefault();
                    var checkValues = $('.checkbox_issued1:checked').map(function()
                    {
                        return $(this).val();
                    }).get();
                    console.log(checkValues);

                    $.each( checkValues, function( i, val ) {
                        $("#"+val).remove();
                        });
//                    return  false;
                    $.ajax({
                        url: '<?php echo base_url() ?>welcome/issued_loan',
                        type: 'post',
                        data: 'ids=' + checkValues
                    }).done(function(data) {
                        $("#respose").html(data);
                        $('#selectall').attr('checked', false);
                    });
                });
               $("#btn-cancel-issue").on('click', function(e) {
				//alert("test");
                    e.preventDefault();
                    var checkValues = $('.checkbox_issued1:checked').map(function()
                    {
                        return $(this).val();
                    }).get();
                    console.log(checkValues);

                    $.each( checkValues, function( i, val ) {
                        $("#"+val).remove();
                        });
//                    return  false;
                    $.ajax({
                        url: '<?php echo base_url() ?>welcome/cancel_issued_loan',
                        type: 'post',
                        data: 'ids=' + checkValues
                    }).done(function(data) {
                        $("#respose").html(data);
                        $('#selectall').attr('checked', false);
                    });
                });
              $("#btn-close").on('click', function(e) {
				//alert("test");
                    e.preventDefault();
                    var checkValues = $('.checkbox_closed1:checked').map(function()
                    {
                        return $(this).val();
                    }).get();
                    console.log(checkValues);

                    $.each( checkValues, function( i, val ) {
                        $("#"+val).remove();
                        });
//                    return  false;
                    $.ajax({
                        url: '<?php echo base_url() ?>welcome/closed_loan',
                        type: 'post',
                        data: 'ids=' + checkValues
                    }).done(function(data) {
                        $("#respose").html(data);
                        $('#selectall').attr('checked', false);
                    });
                });

                $("#btn-cancel-close").on('click', function(e) {
				//alert("test");
                    e.preventDefault();
                    var checkValues = $('.checkbox_closed1:checked').map(function()
                    {
                        return $(this).val();
                    }).get();
                    console.log(checkValues);

                    $.each( checkValues, function( i, val ) {
                        $("#"+val).remove();
                        });
//                    return  false;
                    $.ajax({
                        url: '<?php echo base_url() ?>welcome/cancel_closed_loan',
                        type: 'post',
                        data: 'ids=' + checkValues
                    }).done(function(data) {
                        $("#respose").html(data);
                        $('#selectall').attr('checked', false);
                    });
                });
			//alert("tes");
			$('#emp_code').change(function() {

	                    // assign the value to a variable, so you can test to see if it is working
	                    var empVal = $('#emp_code :selected').val();
	                    $.ajax({
							type: "POST",
							async: false,
							url: "<?php echo base_url() ; ?>welcome/get_employee_info",
							data: {
									employee_id:empVal,
								 },
							success: function(data){

										data=String(data).split('#');

										//alert(data);
										$('#emp_name').val(data[1]);



										var using_department_id=data[2];


										var sel_department = document.getElementById('department');
									    var opts_department = sel_department.options;
									    for(var opt1, i = 0; opt1 = opts_department[i]; i++) {
									        if(opt1.value == using_department_id) {
									            sel_department.selectedIndex = i;
									            break;
									        }
									    }
							}
						});

					});

					$('#customer').change(function() {

	                    // assign the value to a variable, so you can test to see if it is working
	                    var cusVal = $('#customer :selected').val();

	                    $.ajax({
							type: "POST",
							async: false,
							url: "<?php echo base_url() ; ?>welcome/get_customer_loan_circle",
							data: {
									customer_id:cusVal,
								 },
							success: function(data){

										$('#revision').val(data);

							}
						});

					});
		});

	</script>
	<script>
	$(document).ready(function() {
		$("#amount_en").keyup(function() {
			var amount_en=$("#amount_en").val();
			var amount_kh=$("#amount_kh").val();
			var exchange_rate=$("#exc_rate").val();
			var total_amount=$("#amount_total").val();
			var total_transf=$("#amount_trans").val();

			if(amount_kh=="" || isNaN(amount_kh) || amount_kh==0){
				$("#amount_total").val(amount_en);
				$("#amount_trans").val(0);
			}else{

				var exchange=amount_kh/exchange_rate;

				var total=parseFloat(exchange)+parseFloat(amount_en);
				var s_total=parseFloat(total.toFixed(2));
				var s_exchange=parseFloat(exchange.toFixed(2));
				$("#amount_total").val(s_total);
				$("#amount_trans").val(s_exchange);
			}
		});

		$("#amount_kh").keyup(function() {
			var amount_en=$("#amount_en").val();
			var amount_kh=$("#amount_kh").val();
			var exchange_rate=$("#exc_rate").val();
			var total_amount=$("#amount_total").val();
			var total_transf=$("#amount_trans").val();

			if(amount_en=="" || isNaN(amount_en) || amount_en==0){
				var exchange=amount_kh/exchange_rate;

				var total=parseFloat(exchange)
				var s_total=parseFloat(total.toFixed(2));
				var s_exchange=parseFloat(total.toFixed(2));
				$("#amount_total").val(s_total);
				$("#amount_trans").val(s_exchange);
			}else{

				var exchange=parseFloat(amount_kh/exchange_rate);

				var total_v=parseFloat(amount_en)+exchange;

				var s_total=parseFloat(total_v.toFixed(2));
				var s_exchange=parseFloat(exchange.toFixed(2));
				$("#amount_total").val(s_total);
				$("#amount_trans").val(s_exchange);
			}
		});
	});
	</script>
	<script type="text/javascript">
    $(document).ready(function () {

    	addProduct();
    	function addProduct(){
    		//alert("test");
    		var my_i=($("#customFields tr").size())-0+1;
    		$.ajax({
							type: "POST",
							async: false,
							url: "<?php echo base_url() ; ?>products/add_product_quotation",
							data: {
									req:1,
									inc:my_i,
								 },
							success: function(data){
								//alert(data);
								 $("#customFields").append(data);

								 if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true});
					//resize the chosen on window resize

					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});


					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}
							}
			});
    	}

    	$(document).on('keyup','.quantity_row , .price_row , .discount_row, .size_row,.quo_discount,.quo_vat',function(e) {
    		e.preventDefault();
    		var tr=$(this).parent().parent();
    		var product_code =tr.find('.product_code').val();
    		if(product_code==""){
    			alert("Product code can not be blank !");
    			return false;
    		}
			var PriceEnter =tr.find('.price_row').val()-0;
			var Quantity =tr.find('.quantity_row').val()-0;
			var discount =tr.find('.discount_row').val()-0;
			var size =tr.find('.size_row').val()-0;
			var rate=size*PriceEnter;
			/*var proBlankItem = tr.find('.product_code').val();
				if(proBlankItem == ""){
					alert("Please select item before you enter quantity or cost.");
					tr.find('.Quantity').val(0);
					tr.find('.PriceEnter').val(0);
					TotalLine = 0;
				}*/
			if(isNaN(PriceEnter)){
				PriceEnter=0;
			}
			if(isNaN(size)){
				size=0;
			}
			if(isNaN(Quantity)){
				Quantity=0;
			}
			if(isNaN(discount)){
				discount=0;
			}
			if(discount>0){
				var amount_row = Math.round(((PriceEnter*size)*Quantity)* (1-(discount/100))*10000)/10000;
			}else{
				var amount_row=Quantity*(PriceEnter*size);
			}

			tr.find('.amount_row').val(amount_row);
			tr.find('.rate_row').val(rate);
			var total_amount=0;
			$('#quotation_tbl').find('tbody').find('tr').each(function() {

					total_amount += $(this).find(".amount_row").val()-0;

			}); //END .each
			$('.total').html(total_amount);

			$('.total_label').html(total_amount+"$");
								$('.total').val(total_amount);

								var discount_per=$('.quo_discount').val();
								var total_dis = (total_amount-Math.round((total_amount)* (1-(discount_per/100))*10000)/10000);
								//alert(total_dis);
								var vat_per=$('.quo_vat').val()-0;
								if(vat_per>0){
									var vat=(total_amount-total_dis)-(Math.round((total_amount-total_dis)* (1-(vat_per/100))*10000)/10000);

								}else{
									var vat=0;
								}

								var gtotal=(total_amount-total_dis+vat);


								$('.g_total_label').html(gtotal+"$");
								$('.g_total').val(gtotal);

    	});
    	$(document).on('change', '.product_code',function(e) {

    	 	if(e.handled !== true) // This will prevent event triggering more then once
	        {
    	 	 var tr=$(this).parent().parent();
    	 	 var product_code = tr.find('.product_code :selected').val();
        	//tr.find('.quantity_row').val(5);
        	//row.find('.hiddenName').val("Set value");

        	$.ajax({
							type: "POST",
							async: false,
							dataType: 'json',
							url: "<?php echo base_url() ; ?>products/get_product_info_by_code",
							data: {
									req_code:product_code,

								 },
							success: function(data){
								var qty=tr.find('.quantity_row').val();
								var price=data.price;
								var desc=data.description;
								var amount_row=price*qty;

								tr.find('.description_row').val(desc);
								tr.find('.amount_row').val(amount_row);
								tr.find('.rate_row').val(amount_row);
								tr.find('.price_row').val(price);

								//alert(a);
								//alert("good");
				    			/*addProduct();*/

								//alert(my_i);
					            e.handled = true;
					            var total_amount=0;
					            $('#quotation_tbl').find('tbody').find('tr').each(function() {

										total_amount += $(this).find(".amount_row").val()-0;

								}); //END .each
								$('.total_label').html(total_amount+"$");
								$('.total').val(total_amount);

								var discount_per=$('.quo_discount').val();
								var total_dis = (total_amount-Math.round((total_amount)* (1-(discount_per/100))*10000)/10000);
								//alert(total_dis);
								var vat_per=$('.quo_vat').val()-0;
								if(vat_per>0){
									var vat=(total_amount-total_dis)-(Math.round((total_amount-total_dis)* (1-(vat_per/100))*10000)/10000);

								}else{
									var vat=0;
								}

								var gtotal=(total_amount-total_dis+vat);


								$('.g_total_label').html(gtotal+"$");
								$('.g_total').val(gtotal);

							}
			});





	        }

    	});
    	/*$('.product_code').change(function() {

    		 var product_code = $('.product_code :selected').val();
    		 alert(product_code);
    		 addProduct();

    	});*/
    	$('#btn_add_product').click(function() {

    		 //var product_code = $('.product_code :selected').val();
    		 //alert(product_code);
    		 addProduct();

    	});


		$('.customFields').delegate("a#btnRemove", "click", function() {
			if ($("#quotation_tbl tbody.customFields tr").size() == 1) return;
			if(confirm('Are you sure remove?','Remove Item')){
				$(this).parents("tr:first").remove();

			}
		});//end remove
		$(document).on('click', '.delete',function(e) {
	        $(this).parent().parent().remove();
	    });
		/*$(".delete").click(function(event) {
			alert("test");
			$(this).parent().parent().remove();
		});*/
			$("body").on("change",".knowledge",function(){
				var edu = $(this).val();
				var parent_class = $("#grade_chosen").find(".chosen-drop").find(".chosen-results");
				var class_name = parent_class.attr("class");
					if(edu==1 || edu==2){
						var html='<option value="">ថ្នាក់...</option>';
						html += "<option value='1'>ថ្នាក់ទី១</option>";
						html += "<option value='2'>ថ្នាក់ទី២</option>";
						html += "<option value='3'>ថ្នាក់ទី៣</option>";
						$(".grade-data").html(html);
						$('.grade-data').trigger('chosen:updated');
					}else{
						var html='<option value="">ឆ្នាំ...</option>';
						html += "<option value='1'>ឆ្នាំទី១</option>";
						html += "<option value='2'>ឆ្នាំទី២</option>";
						$(".grade-data").html(html);
						$('.grade-data').trigger('chosen:updated');
					}
					$(".grade").removeClass("hidden");
					// $(".grade-data").attr("required",true);
					// $('.grade-data').trigger("chosen:updated");
			});
    });

</script>
