<form role="form" method="post" action="<?php echo base_url(); ?>manage_reports/monks">
    <div class="row">
        <div class="col-sm-12">
            <?php
            $this->load->view('backend/notification/index.php');
            ?>
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="smaller"> ព័ត៌មានស្វែងរក</h4>
                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <div class="widget-body">
                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label for="username" class="control-label">ឈ្មោះ :</label>
                                    <input type="text" class="form-control" name="username"
                                           value="<?php echo set_value('username'); ?>" id="name" placeholder="ស្វែងរកតាមឈ្មោះ...">
                                    <?php echo form_error('username'); ?>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="work_type" class="control-label">មុខរបរ :</label>
                                    <select name="work_type" id="work_type" class="form-control">
                                        <option value="">--សូមជ្រើសរើស--</option>
                                        <option value="1" <?php echo set_select('work_type', 1); ?>>បុគ្គលិក</option>
                                        <option value="2" <?php echo set_select('work_type', 2); ?>>មន្រីរាជការ</option>
                                        <option value="3" <?php echo set_select('work_type', 3); ?>>សិស្ស</option>
                                        <option value="4" <?php echo set_select('work_type', 4); ?>>និស្សិត</option>
                                    </select>
                                    <?php echo form_error('work_type'); ?>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="houses" class="control-label">កុដិ :</label>
                                    <select class="form-control" id="houses" name="houses">
                                        <option value="">--សូមជ្រើសរើស--</option>
                                        <?php
                                        foreach ($houses->result() as $row) {
                                            ?>
                                            <option value="<?php echo $row->id; ?>" <?php echo set_select('houses', $row->id); ?>><?php echo $row->name; ?> </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <?php echo form_error('houses'); ?>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="groups" class="control-label">ក្រុម :</label>
                                    <select class="form-control" id="groups" name="groups">
                                        <option value="">--សូមជ្រើសរើស--</option>
                                        <?php
                                        foreach ($groups->result() as $row) {
                                            ?>
                                            <option value="<?php echo $row->id; ?>" <?php echo set_select('groups', $row->id); ?>><?php echo $row->name; ?> </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <?php echo form_error('groups'); ?>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="member_types" class="control-label">ប្រភេទ :</label>
                                    <select class="form-control" id="member_types" name="member_types">
                                        <option value="">--សូមជ្រើសរើស--</option>
                                        <?php
                                        foreach ($member_types->result() as $row) {
                                            ?>
                                            <option value="<?php echo $row->id; ?>" <?php echo set_select('member_types', $row->id); ?>><?php echo $row->name; ?> </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <?php echo form_error('member_types'); ?>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="to_date" class="control-label">ពីថ្ងៃ :</label>
                                    <input type="date" class="form-control" name="from_date" id="to_date" value="<?php echo set_value('from_date'); ?>">
                                    <?php echo form_error('member_types'); ?>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="to_date" class="control-label">ដល់ថ្ងៃ :</label>
                                    <input type="date" class="form-control" name="to_date" id="to_date" value="<?php echo set_value('to_date'); ?>">
                                    <?php echo form_error('member_types'); ?>
                                </div>

                                <div class="col-xs-12">
                                    <div class="clearfix form-actions">
                                        <div class="col-md-offset-5 col-md-7">
                                            <button class="btn btn-info" type="submit" id="btn-search">
                                                <i class="ace-icon fa fa-search bigger-110"></i>
                                                <?php echo $this->lang->line('fm_btn_search'); ?>
                                            </button>
                                            &nbsp; &nbsp; &nbsp;
                                            <button class="btn btn-default" type="button" id="btn-print"
                                                    onclick="printDiv('members')">
                                                <i class="ace-icon fa fa-print bigger-110"></i>
                                                <?php echo $this->lang->line('fm_btn_print'); ?>
                                            </button>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<hr>

<div class="row" id="members">
    <div class="col-xs-12">
        <?php
        $this->load->view('backend/notification/index.php');
        ?>
        <table id="sample-table-0" class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th class="center">#</th>

                <th><?php echo $this->lang->line(''); ?>ភិក្ខុឈ្មោះ</th>
                <th><?php echo $this->lang->line(''); ?>កុដិលេខ</th>
                <th><?php echo $this->lang->line(''); ?>ជនជាតិ</th>
                <th><?php echo $this->lang->line(''); ?>លេខទូរស័ព្</th>
                <th><?php echo $this->lang->line(''); ?>ប្រភេទ</th>
                <th><?php echo $this->lang->line(''); ?>មកពីខេត្ត</th>
                <th><?php echo $this->lang->line('tb_dob'); ?></th>
                <th><?php echo $this->lang->line(''); ?>ស្ថានភាព</th>

                <th class="hidden-print"></th>
            </tr>
            </thead>

            <tbody>
            <?php
            $i = 0;
            $monk1=0;
            $monk2=0;
            foreach ($monks->result() as $row) {

                if ($row->status == 1) {
                    $class = "success";
                    $status = "Active";
                } else {
                    $class = "warning";
                    $status = "Inactive";
                }

                if($row->vegetarian_types==1){
                    $monk1++;
                }
                if($row->vegetarian_types==2){
                    $monk2++;
                }

                ?>
                <tr>
                    <td class="center"><?php echo ++$i; ?></td>
                    <td><?php echo $row->username; ?></td>
                    <td><?php echo $row->house_name; ?></td>
                    <td><?php echo $row->nation; ?></td>
                    <td><?php echo $row->phone_number; ?></td>
                    <td><?php echo vegetarian_type($row->vegetarian_types); ?></td>
                    <td><?php echo $row->location_name; ?></td>
                    <td><?php echo $row->date_of_birth; ?></td>
                    <td><span class="label label-sm label-<?php echo $class; ?>"><?php echo $status; ?></span></td>
                    <td class="hidden-print">
                        <div class="hidden-sm hidden-xs action-buttons">

                            <!--<a class="green" href="<?php echo base_url(); ?>manage_monks/update_monk/<?php echo $row->id; ?>" title="Edit monk"> <i class="ace-icon fa fa-pencil bigger-130"></i> </a>
									<?php
                            if ($row->name != "Admin") {
                                ?>
									<a class="red" href="<?php echo base_url(); ?>manage_monks/delete_monk/<?php echo $row->id; ?>" title="Delete monk" onclick="return confirm('Are you sure want to delete this selected monk ?')"> <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>
									<?php
                            }
                            ?>-->
                            <a href="<?php echo base_url(); ?>manage_reports/monk_request_form/<?php echo $row->id; ?>"
                               class="tooltip-success" data-rel="tooltip" title="View Form"> <span class="green"> សុំស្នាក់នៅ
                            </a> &nbsp; | &nbsp;
                            <a href="<?php echo base_url(); ?>manage_reports/monk_confirm_stay_form/<?php echo $row->id; ?>"
                               class="tooltip-success" data-rel="tooltip" title="View Form"> <span class="green"> បញ្ចាក់ការស្នាក់នៅ
                            </a>
                        </div>
                        <div class="hidden-md hidden-lg">
                            <div class="inline position-relative">
                                <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown"
                                        data-position="auto">
                                    <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                    <li>
                                        <a href="<?php echo base_url(); ?>manage_reports/monk_request_form/<?php echo $row->id; ?>"
                                           class="tooltip-success" data-rel="tooltip" title="Edit"> <span class="green"> <i
                                                        class="ace-icon fa fa-file-square-o bigger-120"></i> </span>
                                        </a>
                                    </li>


                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <td colspan="2">ចំនួនព្រះសង្ឃសរុបៈ</td>
                <td colspan="2"><?php echo $monks->num_rows(); ?> អង្គ</td>
                <td>មានភិក្ខុ៖</td>
                <td><?php echo $monk1;?> អង្គ</td>
                <td>សាមណេ៖</td>
                <td><?php echo $monk2;?> អង្គ</td>
            </tr>
            </tbody>
        </table>
    </div><!-- /.span -->
</div><!-- /.row -->
</form>
<hr/>
<div style="text-align: center;">

    <button class="btn btn-warning" type="button" id="btn-print" onclick="printDiv('members')">
        <i class="ace-icon fa fa-print bigger-110"></i>
        <?php echo $this->lang->line('fm_btn_print'); ?>
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