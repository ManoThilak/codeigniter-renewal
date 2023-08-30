<div id="page-content" class="p20 clearfix">

    <?php
    if (count($dashboards)) {
        $this->load->view("dashboards/dashboard_header");
    }

    announcements_alert_widget();
    ?>

    <div class="row">
        <?php
        $widget_column = "3"; //default bootstrap column class
        $total_hidden = 0;

        if (!$show_attendance) {
            $total_hidden += 1;
        }

        if (!$show_event) {
            $total_hidden += 1;
        }

        if (!$show_timeline) {
            $total_hidden += 1;
        }

        //set bootstrap class for column
        if ($total_hidden == 1) {
            $widget_column = "4";
        } else if ($total_hidden == 2) {
            $widget_column = "6";
        } else if ($total_hidden == 3) {
            $widget_column = "12";
        }
        ?>

        <!-- <?php if ($show_attendance) { ?>
            <div class="col-md-<?php echo $widget_column; ?> col-sm-6 widget-container">
                <?php
                clock_widget();
                ?>
            </div>
        <?php } ?> -->

        <!-- <div class="col-md-<?php echo $widget_column; ?> col-sm-6  widget-container">
            <?php
            my_open_tasks_widget();
            ?> 
        </div> -->

        <?php if ($show_event) { ?>
            <!-- <div class="col-md-<?php echo $widget_column; ?> col-sm-6  widget-container">
                <?php
                events_today_widget();
                ?> 
            </div> -->
        <?php } ?>

        <!-- <?php if ($show_timeline) { ?>
            <div class="col-md-<?php echo $widget_column; ?> col-sm-6  widget-container">
                <?php
                new_posts_widget();
                ?>  
            </div>
        <?php } ?> -->

    </div>

    <div class="row">
        <div class="col-md-8">         
            <div class="row">
                <div class="col-md-12 mb20 text-center">
                    <div class="bg-white project_and_clock_status_widget"> 
                        <!-- <div class="box">
                            <div class="box-content widget-container b-r" style="background-color:#60EEFF;">  
                                <div class="panel-body ">
                                    <?php if ($this->login_user->is_admin or $this->login_user->role_id == "4") { ?>
                                    <h1 class=""><?php echo $totalclient->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_clients"); ?></span>
                                <?php } else if($this->login_user->role_id == "3") { ?>
                                        <h1><?php echo $totalassigncus->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_assigncus"); ?></span>
                                <?php } else if($this->login_user->role_id == "2") { ?>
                                        <h1><?php echo $totalclients->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_clients"); ?></span>
                                <?php } else if($this->login_user->role_id == "8") { ?>
                                        <h1><?php echo $totalcompletecus->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_completecus"); ?></span>
                                <?php } else if($this->login_user->role_id == "6") { ?>
                                        <h1><?php echo $totalgiftprocessmonth->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_totalgiftprocessmonth"); ?></span>
                                <?php } else if($this->login_user->role_id == "5") { ?>
                                        <h1><?php echo to_currency($totalinvoicetoday); ?></h1>
                                        <span class="text-off uppercase"><?php echo lang("total_totalinvoicetoday"); ?></span>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="box-content widget-container " style="background-color:#52F857;">
                                <div class="panel-body ">
                                    <?php if ($this->login_user->is_admin or $this->login_user->role_id == "4") { ?>
                                    <h1><?php echo $totalcus->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_customers"); ?></span>
                                    <?php } else if($this->login_user->role_id == "3") { ?>
                                        <h1><?php echo $totalcompletecus->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_completecus"); ?></span>
                                    <?php } else if($this->login_user->role_id == "2") { ?>
                                        <h1><?php echo $totalsalescus->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_customers"); ?></span>
                                    <?php } else if($this->login_user->role_id == "8") { ?>
                                        <h1><?php echo $totalgiftprocessmonth->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_totalgiftprocessmonth"); ?></span>
                                    <?php } else if($this->login_user->role_id == "6") { ?>
                                        <h1><?php echo $totalgiftsent->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_totalgiftsent"); ?></span>
                                    <?php } else if($this->login_user->role_id == "5") { ?>
                                        <h1><?php echo to_currency($totalincometoday); ?></h1>
                                        <span class="text-off uppercase"><?php echo lang("total_totalincometoday"); ?></span>

                                        <?php } ?>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div id="clock-status-widget" class="box b-t bg-white">
                            <div class="box-content widget-container b-r"  style="background-color:#61b3d3;">
                                <div class="panel-body ">
                                    <?php if ($this->login_user->is_admin) { ?>
                                    <h1><?php echo $totalsales->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_salesmanager"); ?></span>
                                    <?php } else if ($this->login_user->role_id == "4") { ?>
                                        <h1><?php echo $totalassigncus->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_assigncus"); ?></span>
                                    <?php } else if($this->login_user->role_id == "3") { ?>
                                        <h1><?php echo $totalincompletecus->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_incompletecus"); ?></span>
                                    <?php } else if($this->login_user->role_id == "2") { ?>
                                        <h1><?php echo $totalgiftsmonths->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_gifts"); ?></span>
                                    <?php } else if($this->login_user->role_id == "6") { ?>
                                        <h1><?php echo $totalgiftunsent->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_totalgiftunsent"); ?></span>
                                    <?php } else if($this->login_user->role_id == "5") { ?>
                                        <h1><?php echo to_currency($totalexptoday); ?></h1>
                                        <span class="text-off uppercase"><?php echo lang("total_totalexptoday"); ?></span>
                                    <?php } else if($this->login_user->role_id == "8") { ?>
                                        <h1><?php echo $totalbdaygiftmonth->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_totalbdaygiftmonth"); ?></span>
                                    <?php } ?>

                                </div>
                            </div>
                            <div class="box-content widget-container" style="background-color:#61d3b9;">
                                <div class="panel-body ">
                                    <?php if ($this->login_user->is_admin) { ?>
                                    <h1 class=""><?php echo $totaltele->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_telecallers"); ?></span>
                                    <?php } else if ($this->login_user->role_id == "4") { ?>
                                    <h1><?php echo $totalunassigncus->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_unassigncus"); ?></span>  
                                    <?php } else if($this->login_user->role_id == "3") { ?>
                                        <h1><?php echo $assigntoday->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_assigntoday"); ?></span>  
                                    <?php } else if($this->login_user->role_id == "2") { ?>
                                    <?php  $total =  $totalcommmonths->count * $totalcommmonths->comm_amt; ?>
                                        <h1><?php echo $total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("totcomm_amt"); ?></span>
                                    <?php } else if($this->login_user->role_id == "5") { ?>
                                        <?php  $total =  $totalinvoicetoday - $totalincometoday; ?>
                                        <h1><?php echo to_currency($total); ?></h1>
                                        <span class="text-off uppercase"><?php echo lang("total_totalduetoday"); ?></span>
                                        <?php } else if($this->login_user->role_id == "8") { ?>
                                        <h1><?php echo $totalanngiftmonth->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_totalanngiftmonth"); ?></span>
                                    <?php } else if($this->login_user->role_id == "6") { ?>
                                        <h1><?php echo $totalgiftdeliver->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_totalgiftdeliver"); ?></span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div> -->



                        <?php  if ($this->login_user->role_id == "4") { ?>
                        <!-- <div id="clock-status-widget" class="box b-t bg-white">
                            <div class="box-content widget-container b-r" style="background-color:#9B31C750;">
                                <div class="panel-body ">
                                    <?php if ($this->login_user->is_admin) { ?>
                                    <h1><?php echo $totalsales->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_salesmanager"); ?></span>
                                    <?php } else if ($this->login_user->role_id == "4") { ?>
                                        <h1><?php echo $totalcompletecus->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_completecus"); ?></span>
                                    <?php } ?>

                                </div>
                            </div>
                            <div class="box-content widget-container" style="background-color:#F4C051;">
                                <div class="panel-body ">
                                    <?php if ($this->login_user->is_admin) { ?>
                                    <h1 class=""><?php echo $totaltele->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_telecallers"); ?></span>
                                    <?php } else if ($this->login_user->role_id == "4") { ?>
                                    <h1><?php echo $totalincompletecus->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_incompletecus"); ?></span>    
                                    <?php } ?>
                                </div>
                            </div>
                        </div> -->
                        <?php } ?>


                         <?php  if ($this->login_user->role_id == "5") { ?>
                        <div id="clock-status-widget" class="box b-t bg-white">
                            <div class="box-content widget-container b-r" style="background-color:#D0F3BC;">
                                <div class="panel-body ">
                                 <h1><?php echo to_currency($totalinvoicemonth); ?></h1>
                                        <span class="text-off uppercase"><?php echo lang("total_totalinvoicemonth"); ?></span>
                                </div>
                            </div>
                            <div class="box-content widget-container" style="background-color:#F4C051;">
                                <div class="panel-body ">
                                <h1 class=""><?php echo to_currency($totalincomemonth); ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_totalincomemonth"); ?></span>
                                </div>
                            </div>
                        </div>
                        <div id="clock-status-widget" class="box b-t bg-white">
                            <div class="box-content widget-container b-r" style="background-color:#C7316891;">
                                <div class="panel-body ">
                                 <h1><?php echo to_currency($totalexpmonth); ?></h1>
                                        <span class="text-off uppercase"><?php echo lang("total_totalexpmonth"); ?></span>
                                </div>
                            </div>
                            <div class="box-content widget-container" style="background-color:#E7F743;">
                                <div class="panel-body ">
                                <?php  $total =  $totalinvoicemonth - $totalincomemonth; ?>
                                        <h1><?php echo to_currency($total); ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_totalduemonth"); ?></span>
                                </div>
                            </div>
                        </div>
                        <div id="clock-status-widget" class="box b-t bg-white">
                            <div class="box-content widget-container b-r" style="background-color:#FFE584;">
                                <div class="panel-body ">
                                    <?php  $total =  $totalincome - $totalexp; ?>
                                        <h1><?php echo to_currency($total); ?></h1>
                                 <!-- <h1><?php echo to_currency($totalcash->total); ?></h1> -->
                                        <span class="text-off uppercase"><?php echo lang("total_totalcash"); ?></span>
                                </div>
                            </div>
                            <!-- <div class="box-content widget-container">
                                <div class="panel-body ">
                                <?php  $total =  $totalinvoicemonth->total - $totalincomemonth->total; ?>
                                        <h1><?php echo to_currency($total); ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_totalduemonth"); ?></span>
                                </div>
                            </div> -->
                        </div>
                        <?php } ?>




                        <?php  if ($this->login_user->role_id == "3") { ?>
                        <div id="clock-status-widget" class="box b-t bg-white">
                            <!-- <div class="box-content widget-container b-r" style="background-color:#C7316891;">
                                <div class="panel-body ">
                                    
                                        <h1><?php echo $completetoday->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("completetoday"); ?></span>
                                    

                                </div>
                            </div> -->
                            <!-- <div class="box-content widget-container">
                                <div class="panel-body ">
                                    <?php if ($this->login_user->is_admin) { ?>
                                    <h1 class=""><?php echo $totaltele->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_telecallers"); ?></span>
                                    <?php } else if ($this->login_user->role_id == "4") { ?>
                                    <h1><?php echo $totalincompletecus->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_incompletecus"); ?></span>    
                                    <?php } ?>
                                </div>
                            </div> -->
                        </div>
                        <?php } ?>

                        <?php  if ($this->login_user->role_id == "6") { ?>
                        <div id="clock-status-widget" class="box b-t bg-white">
                            <!-- <div class="box-content widget-container b-r" style="background-color:#F4C051;">
                                <div class="panel-body ">
                                    
                                        <h1><?php echo $totalgiftundeliver->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_totalgiftundeliver"); ?></span>
                                    

                                </div>
                            </div> -->
                            <!-- <div class="box-content widget-container">
                                <div class="panel-body ">
                                    <?php if ($this->login_user->is_admin) { ?>
                                    <h1 class=""><?php echo $totaltele->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_telecallers"); ?></span>
                                    <?php } else if ($this->login_user->role_id == "4") { ?>
                                    <h1><?php echo $totalincompletecus->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_incompletecus"); ?></span>    
                                    <?php } ?>
                                </div>
                            </div> -->
                        </div>
                        <?php } ?>

                        <?php  if ($this->login_user->role_id == "8") { ?>
                        <div id="clock-status-widget" class="box b-t bg-white">
                           <!--  <div class="box-content widget-container b-r" style="background-color:#f4c051;">
                                <div class="panel-body ">
                                    <?php  $total =  (($totalbdaygiftmonth->total + $totalanngiftmonth->total) - ($totalgiftprocessmonth->total)); ?>
                                        <h1><?php echo $total; ?></h1>
                                        
                                    <span class="text-off uppercase"><?php echo lang("total_totalpengiftprocessmonth"); ?></span>
                                    

                                </div>
                            </div> -->
                            <!-- <div class="box-content widget-container">
                                <div class="panel-body ">
                                    <?php if ($this->login_user->is_admin) { ?>
                                    <h1 class=""><?php echo $totaltele->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_telecallers"); ?></span>
                                    <?php } else if ($this->login_user->role_id == "4") { ?>
                                    <h1><?php echo $totalincompletecus->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_incompletecus"); ?></span>    
                                    <?php } ?>
                                </div>
                            </div> -->
                        </div>
                        <?php } ?>


                        <?php if ($this->login_user->is_admin) { ?>
                            <!-- <div id="clock-status-widget" class="box b-t bg-white">
                            <div class="box-content widget-container b-r" style="background-color:#9b31c750;">
                                <div class="panel-body ">
                                    <h1><?php echo $totalassigncus->total; ?></h1>                        
                                    <span class="text-off uppercase"><?php echo lang("total_assigncus"); ?></span>
                                </div>
                            </div>
                          <div class="box-content widget-container" style="background-color:#D0F3BC;">
                                <div class="panel-body ">
                                <h1 class=""><?php echo $totalunassigncus->total; ?></h1>
                                <span class="text-off uppercase"><?php echo lang("total_unassigncus"); ?></span>
                            </div>
                            </div> 
                        </div> -->
                        <!-- <div id="clock-status-widget" class="box b-t bg-white">
                            <div class="box-content widget-container b-r" style="background-color:#c7316891;">
                                <div class="panel-body ">
                                    <h1><?php echo $totalcompletecus->total; ?></h1>
                                   <span class="text-off uppercase"><?php echo lang("total_completecus"); ?></span>
                                  </div>
                            </div>
                          <div class="box-content widget-container" style="background-color:#F4C051;">
                                <div class="panel-body ">
                                  <h1 class=""><?php echo $totalincompletecus->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_incompletecus"); ?></span>
                                  </div>
                            </div> 
                        </div> -->






                       <!--  <div id="clock-status-widget" class="box b-t bg-white">
                            <div class="box-content widget-container b-r" style="background-color:#60EEFF;">
                                <div class="panel-body ">
                                    <h1><?php echo $totalbdaygiftmonth->total; ?></h1>
                                   <span class="text-off uppercase"><?php echo lang("total_totalbdaygiftmonth"); ?></span>
                                  </div>
                            </div>
                          <div class="box-content widget-container" style="background-color:#52F857;">
                                <div class="panel-body ">
                                  <h1 class=""><?php echo $totalanngiftmonth->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_totalanngiftmonth"); ?></span>
                                  </div>
                            </div> 
                        </div> -->

                          
                      <!--   <div id="clock-status-widget" class="box b-t bg-white">
                            <div class="box-content widget-container b-r" style="background-color:#61B3D3;">
                                <div class="panel-body ">
                                    <h1><?php echo $totalgiftprocessmonth->total; ?></h1>
                                   <span class="text-off uppercase"><?php echo lang("total_totalgiftprocessmonth"); ?></span>
                                  </div>
                            </div>
                          <div class="box-content widget-container" style="background-color:#61B3B9;">
                                <div class="panel-body ">
                                  <?php  $total =  (($totalbdaygiftmonth->total + $totalanngiftmonth->total) - ($totalgiftprocessmonth->total)); ?>
                                        <h1><?php echo $total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_totalpengiftprocessmonth"); ?></span>
                                  </div>
                            </div> 
                        </div> -->


                        <!-- <div id="clock-status-widget" class="box b-t bg-white">
                            <div class="box-content widget-container b-r" style="background-color:#9B31C750;">
                                <div class="panel-body ">
                                    <h1><?php echo $totalgiftsent->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_totalgiftsent"); ?></span>
                                  </div>
                            </div>
                          <div class="box-content widget-container" style="background-color:#D0F3BC;">
                                <div class="panel-body ">
                                  <h1><?php echo $totalgiftunsent->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_totalgiftunsent"); ?></span>
                                  </div>
                            </div> 
                        </div> -->

                        <!-- <div id="clock-status-widget" class="box b-t bg-white">
                            <div class="box-content widget-container b-r" style="background-color:#C7316891;">
                                <div class="panel-body ">
                                    <h1><?php echo $totalgiftdeliver->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_totalgiftdeliver"); ?></span>
                                  </div>
                            </div>
                          <div class="box-content widget-container" style="background-color:#F4C051;">
                                <div class="panel-body ">
                                  <h1><?php echo $totalgiftundeliver->total; ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_totalgiftundeliver"); ?></span>
                                  </div>
                            </div> 
                        </div> -->

<!-- 
                        <div id="clock-status-widget" class="box b-t bg-white">
                            <div class="box-content widget-container b-r" style="background-color:#60EEFF;">
                                <div class="panel-body ">
                                    <h1><?php echo to_currency($totalinvoice); ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_totalinvoice"); ?></span>
                                  </div>
                            </div>
                          <div class="box-content widget-container" style="background-color:#52F857;">
                                <div class="panel-body ">
                                  <h1><?php echo to_currency($totalincome); ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_totalincome"); ?></span>
                                  </div>
                            </div> 
                        </div> -->

                        <!-- <div id="clock-status-widget" class="box b-t bg-white">
                            <div class="box-content widget-container b-r" style="background-color:#61B3D3;">
                                <div class="panel-body ">
                                     <?php  $total =  (($totalinvoice) - ($totalincome)); ?>
                                    <h1><?php echo to_currency($total); ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_totaldue"); ?></span>
                                  </div>
                            </div>
                            <div class="box-content widget-container" style="background-color:#61B3B9;">
                                <div class="panel-body ">
                                   
                                    <h1><?php echo to_currency($totalexp); ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_totalexp"); ?></span>
                                </div>
                            </div> 


                        </div>
                        <div id="clock-status-widget" class="box b-t bg-white">
                            <div class="box-content widget-container b-r" style="background-color:#9B31C750;">
                                <div class="panel-body ">
                                 <h1><?php echo to_currency($totalinvoicemonth); ?></h1>
                                        <span class="text-off uppercase"><?php echo lang("total_totalinvoicemonth"); ?></span>
                                </div>
                            </div>
                            <div class="box-content widget-container" style="background-color:#D0F3BC;">
                                <div class="panel-body ">
                                <h1 class=""><?php echo to_currency($totalincomemonth); ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_totalincomemonth"); ?></span>
                                </div>
                            </div>
                        </div>
                        <div id="clock-status-widget" class="box b-t bg-white">
                            <div class="box-content widget-container b-r" style="background-color:#C7316891;">
                                <div class="panel-body ">
                                 <h1><?php echo to_currency($totalexpmonth); ?></h1>
                                        <span class="text-off uppercase"><?php echo lang("total_totalexpmonth"); ?></span>
                                </div>
                            </div>
                            <div class="box-content widget-container" style="background-color:#F4C051;">
                                <div class="panel-body ">
                                <?php  $total =  $totalinvoicemonth - $totalincomemonth; ?>
                                        <h1><?php echo to_currency($total); ?></h1>
                                    <span class="text-off uppercase"><?php echo lang("total_totalduemonth"); ?></span>
                                </div>
                            </div>
                        </div>
                        <div id="clock-status-widget" class="box b-t bg-white">
                            <div class="box-content widget-container b-r" style="background-color:#61B3D3;">
                                <div class="panel-body ">
                                    <?php  $total =  $totalincome - $totalexp; ?>
                                        <h1><?php echo to_currency($total); ?></h1>
                                 
                                        <span class="text-off uppercase"><?php echo lang("total_totalcash"); ?></span>
                                </div>
                            </div>
                        </div>

                        <?php } ?> -->

















                           <?php

                            // if ($show_clock_status) {
                            //     count_clock_status_widget();
                            // } else {
                            //     count_total_time_widget();
                            // }
                            ?>  
                    </div> 
                </div>
            </div>
            



            <!-- <div class="row">
                <div class="col-md-12">
                    <?php
                    if ($show_invoice_statistics) {
                        invoice_statistics_widget();
                    } else if ($show_project_timesheet) {
                        // if ($this->login_user->is_admin) {
                        //     project_timesheet_statistics_widget("all_timesheet_statistics");
                        // } else {
                        //     project_timesheet_statistics_widget("my_timesheet_statistics");
                        // }
                    }
                    ?> 
                </div>
            </div> -->


            <!-- <div class="row">
                <div class="col-md-12 mb15">
                    <?php
                    if ($show_ticket_status) {
                        ticket_status_widget();
                    } else if ($show_attendance) {
                        timecard_statistics_widget();
                    }
                    ?>                        
                </div>
            </div> -->

        </div>

        <!-- <div class="col-md-4 widget-container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-clock-o"></i>&nbsp;  <?php echo lang("project_timeline"); ?>
                </div>
                <div id="project-timeline-container">
                    <div class="panel-body"> 
                        <?php
                        activity_logs_widget(array("log_for" => "project", "limit" => 10));
                        ?>
                    </div>
                </div>
            </div>
        </div> -->


        <div class="col-md-3 widget-container">
            <?php
            if ($show_income_vs_expenses) {
               // income_vs_expenses_widget();
            } else {
               // my_task_stataus_widget();
            }
            ?>
        </div>

        <?php if ($show_event) { ?>
            <div class="col-md-3 widget-container">
                <?php // events_widget(); ?>
            </div>
        <?php } ?>

        <div class="col-md-3 widget-container">
            <?php // sticky_note_widget(); ?>
        </div>
    </div>

</div>
<script type="text/javascript">
    $(document).ready(function () {
        initScrollbar('#project-timeline-container', {
            setHeight: 955
        });

        //update dashboard link
        $(".dashboard-menu, .dashboard-image").closest("a").attr("href", window.location.href);

    });
</script>    

