<div style="text-align: center;" class="hidden-print">
    <button class="btn btn-warning" type="button" id="btn-print" onclick="window.print()">
        <i class="ace-icon fa fa-print bigger-110"></i>
        <?php echo $this->lang->line('fm_btn_print');?>
    </button>
</div>
<hr/>
<div class="row" id="monks">
    <div class="col-xs-12"​>
        <?php
        $this->load->view('backend/notification/index.php');
        ?>
            <form role="form" method="post" action="<?php echo base_url(); ?>manage_reports/print_member_card">
                <div class="widget-box hidden-print">
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
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <?php
            $i=1;
            if($data_member->num_rows()>0){
                foreach ($data_member->result() as $row){
            ?>
                <div class="col-xs-6">
                    <img src="<?php echo base_url().'dist/images/member_card.jpg'?>" alt="Member Card" class="img-rounded member-card">
                    <div class="div-member-image">
                        <img src="<?php echo base_url().'ftemplate/images/'.$row->photo?>" alt="<?php echo $row->username;?>" class="img-circle image-member">
                        <?php
                        if($row->id < 10){
                            $number = "0".$row->id;
                        }else{
                            $number = $row->id;
                        }
                        if($row->id >99 && $row->id<999) {
                            $class_numer = "big-number";
                        }else if($row->id > 999){
                            $class_numer ='thoudsan';
                        }else{
                            $class_numer="text-number";
                        }
                        ?>
                        <h1 class="<?php echo $class_numer;?>"><?php echo $number;?></h1>
                        <h4 class="text-username">
                            Username:<?php echo $row->user_account;?>
                            <br/>
                            Password: 123456
                            <br/>
                            Userrole: <?php echo ($row->manager==1?"អ្នកគ្រប់គ្រងគ្រហស្ថ":"គ្រហស្ថ");?>
                        </h4>
                        <h1 class="text-house">
                            <?php echo $row->house_name;?>
                        </h1>
                        <h1 class="member-name">
                            <?php echo $row->username;?>
                        </h1>
                        <h5 class="member-contact">
                            <i class="fa fa-phone-square"></i>&nbsp;
                            លេខទំនាក់ទនង៖
                            <br/>
                            <?php
                            $phone = $row->phone_number;

                            if(strpos($row->phone_number,",")==true){
                                $phone = explode(",",$phone)[0];
                            }

                            if(strpos($row->phone_number,"/")==true){
                                $phone = explode("/",$row->phone_number)[0];
                            }
                            $array = [$phone,"០៩៨៤២៦១៨៧"];
                            foreach ($array as $row){
                                echo "<i class='fa fa-circle' style='font-size: 10px;'></i>&nbsp;&nbsp;".$row."<br/>";
                            }
                            ?>
                        </h5>
                    </div>
                </div>
                <?php if($i%2==0):?>
                <div class="div-break">&nbsp;</div>
                <?php endif;?>
            <?php

                    $i++;
                }
            }
            ?>
    </div>
</div>
<hr />
<div style="text-align: center;" class="hidden-print">
    <button class="btn btn-warning" type="button" id="btn-print" onclick="window.print()">
        <i class="ace-icon fa fa-print bigger-110"></i>
        <?php echo $this->lang->line('fm_btn_print');?>
    </button>
</div>
<?php
function decrypt($string){
    $url_param = rtrim($string, '=');
    $base_64 = $url_param . str_repeat('=', strlen($url_param) % 4);
    $data = base64_decode($base_64);
    return $data;
}
?>
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
<style>
    .member-card{
        width: 100%;
        height: auto;
        border: 3px solid gray;
    }
    .image-member{
        width: 18%;
        position: absolute;
        top: 10%;
        left: 5%;
        height: 35%;
    }
    .div-break{
        padding: 0.8%;
    }
    .text-number{
        position: absolute;
        top: 40%;
        left: 9%;
        color: white;
        font-size: 85px;
        font-weight: bold;
    }
    .big-number{

        position: absolute;
        top: 43%;
        left: 6%;
        color: white;
        font-size: 71px;
        font-weight: bold;
    }
    .thoudsan{
        position: absolute;
        top: 46%;
        left: 6%;
        color: white;
        font-size: 48px;
        font-weight: bold;
    }
    .text-username{
        position: absolute;
        top: 74%;
        left: 6%;
        color: white;
        font-size: 15px;
        line-height: 21px;
    }
    .text-house{
        position: absolute;
        top: 17%;
        left: 78%;
        color: white;
        font-size: 14px;
        font-weight: bold;
    }
    .member-name{
        position: absolute;
        top: 37%;
        left: 39%;
        color: #0018ff;
        font-size: 35px;
        font-weight: bold;
    }
    .member-contact{
        position: absolute;
        top: 59%;
        left: 70%;
        color: #000000;
        font-size: 15px;
        line-height: 20px;
    }
    .margin-5px{
        margin: 5px;
    }

    @media print {
        .member-card{
            width: 100%;
            height: auto;
            height: 35%;
            border: 3px solid gray;
        }
        .image-member{
            width: 18%;
            position: absolute;
            top: 10%;
            left: 5%;
        }
        .text-number{
            position: absolute;
            top: 38%;
            left: 9%;
            color: #fff !important;
            -webkit-print-color-adjust: exact;
            font-size: 70px;
            font-weight: bold;
        }
        .big-number{
            position: absolute;
            top: 42%;
            left: 7%;
            color: #fff !important;
            -webkit-print-color-adjust: exact;
            font-size: 50px;
            font-weight: bold;
        }
        .thoudsan{
            position: absolute;
            top: 44%;
            left: 6%;
            color: #fff !important;
            -webkit-print-color-adjust: exact;
            font-size: 38px;
            font-weight: bold;
        }
        .text-username{
            position: absolute;
            top: 74%;
            left: 6%;
            color: #fff !important;
            -webkit-print-color-adjust: exact;
            font-size: 12px;
            line-height: 15px;
        }
        .text-house{
            position: absolute;
            top: 15%;
            left: 78%;
            color: white !important;
            font-size: 14px;
            font-weight: bold;
            -webkit-print-color-adjust: exact;
        }
        .member-name{
            position: absolute;
            top: 34%;
            left: 42%;
            color: #0018ff !important;
            -webkit-print-color-adjust: exact;
            font-size: 30px;
            font-weight: bold;
        }
        .member-contact{
            position: absolute;
            top: 59%;
            left: 70%;
            color: #000000 !important;
            -webkit-print-color-adjust: exact;
            font-size: 12px;
            line-height: 17px;
        }

        .div-break{
            /*padding: 1.5% 1.5% !important;*/
            page-break-inside: avoid;
        }

        .margin-5px{
            /*margin: 5px !important;*/
        }
    }
</style>
