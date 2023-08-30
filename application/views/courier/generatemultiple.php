<style type="text/css">
    *{ margin:0; padding: 0;}

    table{ font-family: 'arial'; margin:0; padding: 0;font-size: 15px; color: #000;}
    .tc-container{width: 100%;position: relative; text-align: center;margin-bottom:60px;padding-bottom: 10px;}
    .tcmybg {
        background: top center;
        background-size: contain;
        position: absolute;
        left: 0;
        bottom: 10px;
        width: 400px;
        height: 300px;
        margin-left: auto;
        margin-right: auto;
        right: 0;
        opacity: 0.10;
        text-align: center !important;
    }
    /*begin students id card*/
    .studentmain{background: #efefef;width: 100%; margin-bottom: 30px;}
    .studenttop img{width:30px;vertical-align: top;}
    .studenttop{background: #453278;padding:2px;color: #fff;overflow: hidden;
                position: relative;z-index: 1;}
    .sttext1{font-size: 24px;font-weight: bold;line-height: 30px;}
    .stgray{background: #efefef;padding-top: 5px; padding-bottom: 10px;}
    .staddress{margin-bottom: 0; padding-top: 2px;}
    .stdivider{border-bottom: 2px solid #000;margin-top: 5px; margin-bottom: 5px;}
    .stlist{padding: 0; margin:0; list-style: none;}
    .stlist li{text-align: left;display: inline-block;width: 100%;padding: 0px 5px;}
    .stlist li span{width:65%;float: right;}
    .stimg{
        /*margin-top: 5px;*/
        width: 80px;
        height: auto;
        /*margin: 0 auto;*/
    }
    .stimg img{width: 100%;height: auto;border-radius: 2px;display: block;}
    .staround{padding:3px 10px 3px 0;position: relative;overflow: hidden;}
    .staround2{position: relative; z-index: 9;}
    .stbottom{background: #453278;height: 20px;width: 100%;clear: both;margin-bottom: 5px;}
    /*.stidcard{margin-top: 0px;
        color: #fff;font-size: 16px; line-height: 16px;
        padding: 2px 0 0; position: relative; z-index: 1;
        background: #453277;
        text-transform: uppercase;}*/
    .principal{margin-top: -40px;margin-right:10px; float:right;}
    .stred{color: #000;}
    .spanlr{padding-left: 5px; padding-right: 5px;}
    .cardleft{width: 0%;float: left;}
    .cardright{width: 77%;float: right; }
    /* .pt15{padding-top: 15px;}
     .p10tb{padding-bottom: 10px; padding-top: 10px;}*/
    .width32{width: 32.75%; padding: 3px; float: left;}
    /*END students id card*/
</style>

<?php
$school = $sch_setting[0];
$i = 0;
?>

<table cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <?php
        foreach ($students as $student) {
            $i++;
            ?>
            <td valign="top" >
                <table cellpadding="0" cellspacing="0" width="100%" class="tc-container" style="background: #efefef;">
                    <tr>
                        <td valign="top">
                              <?php 
                                    $files = $student->files;
                                    if (isset($files) && $files) {
                                        $files = unserialize($files);
                                        if (count($files)) {
                                            foreach ($files as $file) {
                                                $file_name = get_array_value($file, "file_name");
                                                // echo "<div class='box saved-file-item-container'><div class='box-content w80p pt5 pb5'>" . remove_file_prefix($file_name) . "</div> <div class='box-content w20p text-right'><a href='#' class='delete-saved-file p5 dark' data-file_name='$file_name'><span class='fa fa-close'></span></a></div> </div>";
                                                $picname = remove_file_pre($file_name);
                                            }
                                        }
                                    }
                                      ?>



                                     <!-- <li><img src="<?php echo base_url('files\timeline_files\11.jpg'); ?>" width="300" height="80" /></li> -->
                            <img src="<?php echo base_url('files/timeline_files/' . $picname); ?>" class="tcmybg" /></td>
                    </tr>
                    <tr>
                        <td valign="top">
                            <div class="studenttop" style="background: <?php echo $id_card[0]->header_color ?>">

                                <!-- <div class="sttext1"><img src="<?php echo base_url('uploads/student_id_card/logo/' . $id_card[0]->logo); ?>" width="30" height="30" />
                                    <?php echo $id_card[0]->school_name ?></div> -->
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top" align="center" style="padding: 1px 0; position: relative; z-index: 1">
                            <!-- <p>  <?php echo $id_card[0]->school_address ?></p> -->

                        </td>
                    </tr>

                    <tr>
                        <!-- <td valign="top" style="color: #fff;font-size: 16px; padding: 2px 0 0; position: relative; z-index: 1;background: <?php echo $id_card[0]->header_color ?>;text-transform: uppercase;"><?php echo $id_card[0]->title ?></td> -->
                    </tr>

                    <tr>
                        <td valign="top">
                            <div class="staround">
                                <div class="cardleft">

                                    <div class="stimg">
                                        <!-- <img src="<?php echo base_url($student->image); ?>" class="img-responsive" /> -->
                                    </div>
                                </div><!--./cardleft-->
                                <div class="cardrightssss">
                                    <ul class="stlist">
                                        
                                        <h1><li><?php echo $this->lang->line('from'); ?></li></h1>
                                        <h2><li><?php echo $student->ccompany_name; ?></li>
                                        <li><?php echo $student->caddress; ?></li>
                                        <li><?php echo $student->ccity; ?></li>
                                        <li><?php echo $student->cstate; ?></li>
                                        <li><?php echo $student->czip; ?></li> 
                                        <li><?php echo "Phone: " . $student->csphone; ?></li></h2> 
                                    </ul>
                                       
                                       <!--  <ul>
                    <h1><li><?php echo $this->lang->line('to'); ?></li></h1>
                    <h2><li><?php echo $student->customer_name; ?></li>
                    <li><?php echo $student->address; ?></li>
                    <li><?php echo $student->landmark; ?></li>
                    <li><?php echo $student->city . " - " . $student->zip; ?></li>
                   
                    <li><?php echo "Phone: " . $student->phone; ?></li></h2>
                </ul> -->
                                    </ul>
                                </div><!--./cardright-->
                            </div><!--./staround-->
                        </td>
                    </tr>
                    <tr>
                        <!-- <td valign="top" align="right" class="principal"><img src="<?php echo base_url('uploads/student_id_card/signature/' . $id_card[0]->sign_image); ?>" width="66" height="40" /></td> -->
                    </tr>
                </table>
            </td>

            <td valign="top" >
                <table cellpadding="0" cellspacing="0" width="100%" class="tc-container" style="background: #efefef;">
                    <tr>
                        <td valign="top">
                              <?php 
                                    $files = $student->files;
                                    if (isset($files) && $files) {
                                        $files = unserialize($files);
                                        if (count($files)) {
                                            foreach ($files as $file) {
                                                $file_name = get_array_value($file, "file_name");
                                                // echo "<div class='box saved-file-item-container'><div class='box-content w80p pt5 pb5'>" . remove_file_prefix($file_name) . "</div> <div class='box-content w20p text-right'><a href='#' class='delete-saved-file p5 dark' data-file_name='$file_name'><span class='fa fa-close'></span></a></div> </div>";
                                                $picname = remove_file_pre($file_name);
                                            }
                                        }
                                    }
                                      ?>



                                     <!-- <li><img src="<?php echo base_url('files\timeline_files\11.jpg'); ?>" width="300" height="80" /></li> -->
                            <!-- <img src="<?php echo base_url('files/timeline_files/' . $picname); ?>" class="tcmybg" /></td> -->
                    </tr>
                    <tr>
                        <td valign="top">
                            <div class="studenttop" style="background: <?php echo $id_card[0]->header_color ?>">

                                <!-- <div class="sttext1"><img src="<?php echo base_url('uploads/student_id_card/logo/' . $id_card[0]->logo); ?>" width="30" height="30" />
                                    <?php echo $id_card[0]->school_name ?></div> -->
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top" align="center" style="padding: 1px 0; position: relative; z-index: 1">
                            <!-- <p>  <?php echo $id_card[0]->school_address ?></p> -->

                        </td>
                    </tr>

                    <tr>
                        <!-- <td valign="top" style="color: #fff;font-size: 16px; padding: 2px 0 0; position: relative; z-index: 1;background: <?php echo $id_card[0]->header_color ?>;text-transform: uppercase;"><?php echo $id_card[0]->title ?></td> -->
                    </tr>

                    <tr>
                        <td valign="top">
                            <div class="staround">
                                <div class="cardleft">

                                    <div class="stimg">
                                        <!-- <img src="<?php echo base_url($student->image); ?>" class="img-responsive" /> -->
                                    </div>
                                </div><!--./cardleft-->
                                <div class="cardrightssss">
                                    <!-- <ul class="stlist">
                                        
                                        <h1><li><?php echo $this->lang->line('from'); ?></li></h1>
                                        <h2><li><?php echo $student->ccompany_name; ?></li>
                                        <li><?php echo $student->caddress; ?></li>
                                        <li><?php echo $student->ccity; ?></li>
                                        <li><?php echo $student->cstate; ?></li>
                                        <li><?php echo $student->czip; ?></li> 
                                        <li><?php echo "Phone: " . $student->csphone; ?></li></h2> 
                                    </ul> -->
                                    
                                       
                                    <ul class="stlist" style="margin-left: 50px !important ; overflow: visible !important; ">
                    <h1><li><?php echo $this->lang->line('to'); ?></li></h1>
                    <h2><li><?php echo $student->customer_name; ?></li>
                    <li><?php echo $student->address; ?></li>
                    <li><?php echo $student->landmark; ?></li>
                    <li><?php echo $student->city . " - " . $student->zip; ?></li>
                    <!-- <li><?php echo $student->state; ?></li> -->
                    <!-- <li><?php echo $student->zip; ?></li>  -->
                    <li><?php echo "Phone: " . $student->phone; ?></li></h2>
                </ul>
                                    </ul>
                                </div><!--./cardright-->
                            </div><!--./staround-->
                        </td>
                    </tr>
                    <tr>
                        <!-- <td valign="top" align="right" class="principal"><img src="<?php echo base_url('uploads/student_id_card/signature/' . $id_card[0]->sign_image); ?>" width="66" height="40" /></td> -->
                    </tr>
                </table>
            </td>

            <?php
            if ($i == 2) {
                // three items in a row. Edit this to get more or less items on a row
                ?></tr><tr><?php
                $i = 0;
            }
        }
        ?>
    </tr>

</table>
