<!DOCTYPE html>
<html lang="en">
<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $title;?> - HR Management System</title>

		<meta name="description" content="Pagoda HR Management System" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url();?>dist/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>font-awesome/4.7.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="<?php echo base_url();?>dist/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>dist/css/jquery.gritter.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>dist/css/select2.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>dist/css/datepicker.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>dist/css/bootstrap-editable.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>dist/css/chosen.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>ftemplate/css/jquery.timepicker.min.css" />
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
		<link href="<?php echo base_url();?>dist/css/bootstrap-toggle.min.css" rel="stylesheet">


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
.ui-corner-all a{
	text-align: left;
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
		<script src="<?php echo base_url();?>ftemplate/js/jquery.timepicker.min.js"></script>
		<script src="<?php echo base_url();?>dist/js/bootstrap-toggle.min.js"></script>

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
					.dataTable( {
						bAutoWidth: false,
						"aoColumns": [
						  { "bSortable": false },
						  null, null,null, null, null,null,null,null,null,null,
						  { "bSortable": false }
						],
						"aaSorting": [10],
						"iDisplayLength": 50
				    } );

					$('#member-table').dataTable( {
							bAutoWidth: false,
							"aoColumns": [
							  { "bSortable": false },
							  null, null,null, null, null,null,null,
							  { "bSortable": false }
							],
							"aaSorting": [7],
							"iDisplayLength": 50
					  } );
					$('#member-take-leave-table').dataTable( {
							bAutoWidth: false,
							"aoColumns": [
								{ "bSortable": false },
								null, null,null, null, null,null,
								{ "bSortable": false }
							],
							"aaSorting": [6],
							"iDisplayLength": 50
						} );

						$('#admin-take-leave-table').dataTable( {
								bAutoWidth: false,
								"aoColumns": [
									{ "bSortable": false },
									null, null,null, null, null,null,null,
									{ "bSortable": false }
								],
								"aaSorting": [7],
								"iDisplayLength": 50,
                                "order": [[ 0, "asc" ]]
							} );

			    $('#sample-table-8')
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

				//All attendant on click
				$(document).on('click', '.attendant_all' , function(){

					if($(this).is(":checked")){

						$(".attendant_check").prop('checked', true);

						//disabled checkbox
						$(".take_leaves_check").prop('disabled', true);
						$(".take_leaves_all").prop('disabled', true);

						//untick take_leaves
						$(".take_leaves_check").prop('checked', false);
						$(".take_leaves_all").prop('checked', false);

					}else{

						$(".attendant_check").prop('checked', false);

						$(".take_leaves_check").prop('disabled', false);
						$(".take_leaves_all").prop('disabled', false);
					}

					$(".attendant_check").prop("disabled",false);

				});

				//each attendant on clicking
				$(document).on("click",".attendant_check",function(evt){
					var id = $(this).val();

					if($(this).is(":checked")){

						$("#leaves-"+id).prop("checked",false);
						$("#leaves-"+id).prop("disabled",true);

					}else{
						$("#leaves-"+id).prop("disabled",false);
					}

				});

				//each take leaves on clicking
				$(document).on("click",".take_leaves_check",function(evt){
					var id = $(this).val();

					if($(this).is(":checked")){

						$("#attendant-"+id).prop("checked",false);
						$("#attendant-"+id).prop("disabled",true);

					}else{
						$("#attendant-"+id).prop("disabled",false);
					}

				});

				//all take leave click
				$(document).on('click', '.take_leaves_all' , function(){

					if($(this).is(":checked")){
						$(".take_leaves_check").prop('checked', true);
						//disable all checkbox
						$(".attendant_all").prop('disabled', true);
						$(".attendant_check").prop('disabled', true);
						//untick attendant
						$(".attendant_all").prop('checked', false);
						$(".attendant_check").prop('checked', false);

					}else{
						$(".take_leaves_check").prop('checked', false);

						$(".attendant_all").prop('disabled', false);
						$(".attendant_check").prop('disabled', false);
					}

                    $(".take_leaves_check").prop("disabled",false);

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
    $(document).ready(function () {

		$('.customFields').delegate("a#btnRemove", "click", function() {
			if ($("#quotation_tbl tbody.customFields tr").size() == 1) return;
			if(confirm('Are you sure remove?','Remove Item')){
				$(this).parents("tr:first").remove();

			}
		});

		//end remove
		$(document).on('click', '.delete',function(e) {
	        $(this).parent().parent().remove();
	    });

			$("body").on("change",".knowledge",function(){
				var edu = $(this).val();
				var parent_class = $("#grade_chosen").find(".chosen-drop").find(".chosen-results");
				var class_name = parent_class.attr("class");
					if(edu==1 || edu==2){
						var html='<option value="">ថ្នាក់...</option>';
						html += "<option value='1'>ថ្នាក់ទី១</option>";
						html += "<option value='2'>ថ្នាក់ទី២</option>";
						html += "<option value='3'>ថ្នាក់ទី៣</option>";
						html += "<option value='4'>បញ្ចប់ថ្នាក់</option>";
						$(".grade-data").html(html);
						$('.grade-data').trigger('chosen:updated');
					}else{
						var html='<option value="">ឆ្នាំ...</option>';
						html += "<option value='5'>ឆ្នាំទី១</option>";
						html += "<option value='6'>ឆ្នាំទី២</option>";
						html += "<option value='4'>បញ្ចប់ថ្នាក់</option>";
						$(".grade-data").html(html);
						$('.grade-data').trigger('chosen:updated');
					}
					$(".grade").removeClass("hidden");
					// $(".grade-data").attr("required",true);
					// $('.grade-data').trigger("chosen:updated");
			});

			//function for location on Change
			$("body").on("change","#use_location_id",function(){
				var location_id = $(this).val();
					$.ajax({
						type:"post",
						dataType:"json",
						url:"<?php echo base_url().'manage_monks/get_location_data';?>",
						data:{'location_id':location_id},
						success:function(response){
							//set data for district
							 var html_dis='<option value=""></option>';
							 $.each(response.district,function(district_id,val_district){
								 	html_dis +='<option value="'+val_district.id+'">'+val_district.name+'</option>';
							 });
							 $("#district_id").html(html_dis);
	 						 $('#district_id').trigger('chosen:updated');

							 //set data for communes
							 var html_com='<option value=""></option>';
							 $.each(response.commune,function(commune_id,val_commune){
								 	html_com +='<option value="'+val_commune.id+'">'+val_commune.name+'</option>';
							 });
							 $("#commune_id").html(html_com);
	 						 $('#commune_id').trigger('chosen:updated');

							 //set data for villages
							 var html_vil='<option value=""></option>';
							 $.each(response.village,function(village_id,val_village){
								 	html_vil +='<option value="'+val_village.id+'">'+val_village.name+'</option>';
							 });
							 $("#village_id").html(html_vil);
	 						 $('#village_id').trigger('chosen:updated');
						}
					});
			});

				//function for get commune and village
				$("body").on("change","#district_id",function(){
					var district_id = $(this).val();
						$.ajax({
							type:"post",
							dataType:"json",
							url:"<?php echo base_url().'manage_monks/get_commune';?>",
							data:{'dinstrict_id':district_id},
							success:function(response){
									//set data for communes
								 var html_com='<option value=""></option>';
								 $.each(response.commune,function(commune_id,val_commune){
										html_com +='<option value="'+val_commune.id+'">'+val_commune.name+'</option>';
								 });
								 $("#commune_id").html(html_com);
								 $('#commune_id').trigger('chosen:updated');

								 //set data for villages
								 var html_vil='<option value=""></option>';
								 $.each(response.village,function(village_id,val_village){
										html_vil +='<option value="'+val_village.id+'">'+val_village.name+'</option>';
								 });
								 $("#village_id").html(html_vil);
								 $('#village_id').trigger('chosen:updated');
							}
						});
				});

				//function for get data villages
				$("body").on("change","#commune_id",function(){
					var commune_id = $(this).val();
						$.ajax({
							type:"post",
							dataType:"json",
							url:"<?php echo base_url().'manage_monks/get_village';?>",
							data:{'commune_id':commune_id},
							success:function(response){
								 //set data for villages
								 var html_vil='<option value=""></option>';
								 $.each(response.village,function(village_id,val_village){
										html_vil +='<option value="'+val_village.id+'">'+val_village.name+'</option>';
								 });
								 $("#village_id").html(html_vil);
								 $('#village_id').trigger('chosen:updated');
							}
						});
				});

				//function for add more rows of langauge and level
				$("body").on("click",".add_language",function(){
					// alert("hi");
					$.ajax({
						type:"post",
						url:"<?php echo base_url().'manage_monks/get_more_language';?>",
						data:{},
						success:function(response){
							$(".data_language").append(response);
							$('#language').trigger('chosen:updated');
							$('#read').trigger('chosen:updated');
							$('#writing').trigger('chosen:updated');
							$('#listening').trigger('chosen:updated');
							$('#speaking').trigger('chosen:updated');
						}
					});
				});

				//add query for current living
				$("body").on("change","#current_provice",function(){
					var location_id = $(this).val();
						$.ajax({
							type:"post",
							dataType:"json",
							url:"<?php echo base_url().'manage_monks/get_location_data';?>",
							data:{'location_id':location_id},
							success:function(response){
								//set data for district
								 var html_dis='<option value=""></option>';
								 $.each(response.district,function(district_id,val_district){
									 	html_dis +='<option value="'+val_district.id+'">'+val_district.name+'</option>';
								 });
								 $("#current_district").html(html_dis);
		 						 $('#current_district').trigger('chosen:updated');

								 //set data for communes
								 var html_com='<option value=""></option>';
								 $.each(response.commune,function(commune_id,val_commune){
									 	html_com +='<option value="'+val_commune.id+'">'+val_commune.name+'</option>';
								 });
								 $("#current_commune").html(html_com);
		 						 $('#current_commune').trigger('chosen:updated');

								 //set data for villages
								 var html_vil='<option value=""></option>';
								 $.each(response.village,function(village_id,val_village){
									 	html_vil +='<option value="'+val_village.id+'">'+val_village.name+'</option>';
								 });
								 $("#current_village").html(html_vil);
		 						 $('#current_village').trigger('chosen:updated');
							}
						});
				});

					//function for get commune and village
					$("body").on("change","#current_district",function(){
						var district_id = $(this).val();
							$.ajax({
								type:"post",
								dataType:"json",
								url:"<?php echo base_url().'manage_monks/get_commune';?>",
								data:{'dinstrict_id':district_id},
								success:function(response){
										//set data for communes
									 var html_com='<option value=""></option>';
									 $.each(response.commune,function(commune_id,val_commune){
											html_com +='<option value="'+val_commune.id+'">'+val_commune.name+'</option>';
									 });
									 $("#current_commune").html(html_com);
									 $('#current_commune').trigger('chosen:updated');

									 //set data for villages
									 var html_vil='<option value=""></option>';
									 $.each(response.village,function(village_id,val_village){
											html_vil +='<option value="'+val_village.id+'">'+val_village.name+'</option>';
									 });
									 $("#current_village").html(html_vil);
									 $('#current_village').trigger('chosen:updated');
								}
							});
					});

					//function for get data villages
					$("body").on("change","#current_commune",function(){
						var commune_id = $(this).val();
						// alert(commune_id);
							$.ajax({
								type:"post",
								dataType:"json",
								url:"<?php echo base_url().'manage_monks/get_village';?>",
								data:{'commune_id':commune_id},
								success:function(response){
									 //set data for villages
									 var html_vil='<option value=""></option>';
									 $.each(response.village,function(village_id,val_village){
											html_vil +='<option value="'+val_village.id+'">'+val_village.name+'</option>';
									 });
									 $("#current_village").html(html_vil);
									 $('#current_village').trigger('chosen:updated');
								}
							});
					});

					//function for delete row
					$("body").on("click",".remove_lang",function(){
						 var monk_id = $(this).data("monk");
						 var member_id = $(this).data("member");
						 var lang_id = $(this).data("lang");
						 var id = $(this).data("id");
						 if(lang_id !=""){
							 	$.ajax({
									type:"post",
									url:"<?php echo base_url().'manage_monks/remove_lang'?>",
									data:{
										'monk_id':monk_id,
										'member_id':member_id,
										'lang_id':lang_id,
										'id':id,
									},
									success:function(){

									}
								});
						 }
						$(this).parents('div.parent-row').fadeOut();
					});


					function readURL(input) {
					  if (input.files && input.files[0]) {
					    var reader = new FileReader();
					    reader.onload = function(e) {
					      $('#image_result').attr('src', e.target.result);
					    }

					    reader.readAsDataURL(input.files[0]);
					  }
					}
					$("#userfile").change(function() {
					  readURL(this);
					});

					$("body").on("change",".education_human",function(){
						var value = $(this).val();
						if(value !=""){
							$.ajax({
								type:"post",
								dataType:"json",
								url:"<?php echo base_url().'manage_members/get_education'?>",
								data:{'parent_id':value},
								success:function(response){
									var html ='<option value="">--ថ្នាក់--</option>';
									$.each(response.result,function(key,value){
										html +='<option value="'+value.id+'">'+value.name+'</option>';
									});
									$("#grade").html(html);
								}
							});
						}
					});

					$('.timepicker-default').timepicker({
						hourGrid: 4,
					 minuteGrid: 10,
					 timeFormat: 'hh:mm p',
					 scrollbar:true
			    });

					$("body").on("change","#change_status_type",function(){
						var value = $(this).val();
						var id = $(this).data("id");
						$.ajax({
							type:"post",
							url:"<?php echo base_url().'manage_member_take_leaves/update_member_status'?>",
							data:{'id':id,'status':value},
							success:function(response){
								console.log("update success");
							}
						});
					});

					$("body").on("change","#change_status_type_monk",function(){
						var value = $(this).val();
						var id = $(this).data("id");
						$.ajax({
							type:"post",
							url:"<?php echo base_url().'manage_monk_take_leaves/update_member_status'?>",
							data:{'id':id,'status':value},
							success:function(response){
								console.log("update success");
							}
						});
					});

					//monk allow permission take leave
					$("body").on("click","#monk_fom .toggle-on",function(){
						var value = 0;
						$.ajax({
							type:"post",
							url:"<?php echo base_url().'manage_monk_take_leaves/update_form_monk_take_leave'?>",
							data:{'value':value,'name':'monk_allow'},
							success:function(response){
									console.log(response);
							}
						});
					});
					$("body").on("click","#monk_fom .toggle-off",function(){
						var value = 1;
						$.ajax({
							type:"post",
							url:"<?php echo base_url().'manage_monk_take_leaves/update_form_monk_take_leave'?>",
							data:{'value':value,'name':'monk_allow'},
							success:function(response){
									console.log(response);
							}
						});
					});

					//member allow permission take leave
					$("body").on("click","#member_form .toggle-on",function(){
						var value = 0;
						$.ajax({
							type:"post",
							url:"<?php echo base_url().'manage_member_take_leaves/update_form_member_take_leave'?>",
							data:{'value':value,'name':'member_allow'},
							success:function(response){
									console.log(response);
							}
						});
					});

					$("body").on("click","#member_form .toggle-off",function(){
						var value = 1;
						$.ajax({
							type:"post",
							url:"<?php echo base_url().'manage_member_take_leaves/update_form_member_take_leave'?>",
							data:{'value':value,'name':'member_allow'},
							success:function(response){
									console.log(response);
							}
						});
					});
    });

</script>
