<form role="form" method="post" action="<?php echo base_url(); ?>manage_reports/members">
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
                                           value="<?php echo set_value('username'); ?>" id="name"
                                           placeholder="ស្វែងរកតាមឈ្មោះ...">
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
                                    <?php echo form_error('from_date'); ?>
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
                                    <?php echo form_error('from_date'); ?>
                                </div>

                                <div class="col-xs-12">
                                    <div class="clearfix form-actions">
                                        <div class="col-md-offset-5 col-md-7">
                                            <button class="btn btn-info" type="submit" id="btn-search">
                                                <i class="ace-icon fa fa-search bigger-110"></i>
                                                ស្វែងរក
                                            </button>
                                            &nbsp; &nbsp; &nbsp;
                                            <button class="btn btn-default" type="button" id="btn-print"
                                                    onclick="printDiv('members')">
                                                <i class="ace-icon fa fa-print bigger-110"></i>
                                                បោះពុម្ព
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
                <th><?php echo $this->lang->line(''); ?>សមាជិកឈ្មោះ</th>
                <th><?php echo $this->lang->line(''); ?>មុខរបរ</th>
                <th><?php echo $this->lang->line(''); ?>កុដិលេខ</th>
                <th><?php echo $this->lang->line(''); ?>ភេទ</th>
                <th><?php echo $this->lang->line(''); ?>ជនជាតិ</th>
                <th><?php echo $this->lang->line(''); ?>លេខទូរស័ព្ទ</th>
                <th><?php echo $this->lang->line('tb_dob'); ?></th>
                <th><?php echo $this->lang->line(''); ?>ស្ថានភាព</th>
                <th class="hidden-print">បែបបទ</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 0;
            if ($member_list->num_rows() > 0) {
                foreach ($member_list->result() as $row) {
                    if ($row->status == 1) {
                        $class = "success";
                        $status = "ប្រើ";
                    } else {
                        $class = "warning";
                        $status = "មិនប្រើ";
                    }
                    ?>
                    <tr>
                        <td class="center"><?php echo ++$i; ?></td>
                        <td><?php echo $row->username; ?></td>
                        <td><?php
                            if ($row->work_type == '1') {
                                echo "បុគ្គលិក,";
                            }
                            if ($row->work_type == '2') {
                                echo "មន្រ្តីរាជការ,";
                            }
                            if ($row->student_type == '1') {
                                echo " សិស្ស";
                            }
                            if ($row->work_type == '2') {
                                echo " និសិ្សត";
                            }
                            ?> </td>
                        <td><?php echo $row->house_name; ?></td>
                        <td><?php echo ($row->gender == 'M') ? 'ប្រុស' : 'ស្រី'; ?></td>
                        <td><?php echo $row->nation; ?></td>
                        <td><?php echo $row->phone_number; ?></td>
                        <td><?php echo convertDateToKhmer($row->date_of_birth); ?></td>
                        <td><span class="label label-sm label-<?php echo $class; ?>"><?php echo $status; ?></span></td>
                        <td class="hidden-print">
                            <a href="<?php echo base_url(); ?>manage_reports/member_request_form/<?php echo $row->id; ?>"
                               class="tooltip-success" data-rel="tooltip" title="View Form"> <span class="green"> សុំស្នាក់នៅ
                            </a> &nbsp; | &nbsp;
                            <a href="<?php echo base_url(); ?>manage_reports/member_confirm_stay_form/<?php echo $row->id; ?>"
                               class="tooltip-success" data-rel="tooltip" title="View Form"> <span class="green">បញ្ចាក់ការស្នាក់នៅ
                            </a> &nbsp; | &nbsp;
                            <a href="<?php echo base_url(); ?>manage_reports/member_leave_form/<?php echo $row->id; ?>"
                               class="tooltip-success" data-rel="tooltip" title="View Form"> <span class="green">បញ្ចាក់ការឈប់</span>
                            </a>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
            <tr>
                <td colspan="5">សរុបចំនួនក្រហស :</td>
                <td colspan="5"><?php echo $member_list->num_rows() ?> នាក់</td>
            </tr>
            </tbody>
        </table>
    </div><!-- /.span -->
</div><!-- /.row -->
<hr/>
<div class="text-center">
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