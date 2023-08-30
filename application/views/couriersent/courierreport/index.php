<div id="page-content" class="clearfix p20">
    <div class="panel clearfix">
        <ul id="expenses-tabs" data-toggle="ajax-tab" class="nav nav-tabs bg-white title" role="tablist">
            <li class="title-tab"><h4 class="pl15 pt10 pr15"><?php echo lang("courier_report"); ?></h4></li>
             <li><a id="monthly-expenses-button"  role="presentation" class="active" href="javascript:;" data-target="#monthly-expenses"><?php echo lang("monthly"); ?></a></li>
            <li><a role="presentation" href="<?php echo_uri("expenses/yearly/"); ?>" data-target="#yearly-expenses"><?php echo lang('yearly'); ?></a></li> 
            <li><a role="presentation" href="<?php echo_uri("expenses/custom/"); ?>" data-target="#custom-expenses"><?php echo lang('custom'); ?></a></li>
            <!-- <li><a role="presentation" href="<?php echo_uri("expenses/yearly_chart/"); ?>" data-target="#yearly-chart"><?php echo lang('chart'); ?></a></li> -->
            <!-- <div class="tab-title clearfix no-border">
                <div class="title-button-group">
                    <?php echo modal_anchor(get_uri("stockin/modal_form"), "<i class='fa fa-plus-circle'></i> " . lang('add_stock'), array("class" => "btn btn-default mb0", "title" => lang('add_stock'))); ?>
                </div>
            </div> -->
        </ul>

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade" id="monthly-expenses">
                <div class="table-responsive">
                    <table id="monthly-expense-table" class="display" cellspacing="0" width="100%">
                    </table>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="yearly-expenses"></div>
            <div role="tabpanel" class="tab-pane fade" id="custom-expenses"></div>
            <!-- <div role="tabpanel" class="tab-pane fade" id="yearly-chart"></div> -->
        </div>
    </div>
</div>

<script type="text/javascript">
    loadExpensesTable = function (selector, dateRange) {
        var customDatePicker = "";
        if (dateRange === "custom") {
         customDatePicker = [{startDate: {name: "start_date", value: moment().format("YYYY-MM-DD")}, endDate: {name: "end_date", value: moment().format("YYYY-MM-DD")}, showClearButton: true}];
            dateRange = "";
     }



        // if (dateRange === "custom") {
            // customDatePicker = [{startDate: {name: "start_date"}, endDate: {name: "end_date", value: moment().format("YYYY-MM-DD")}, showClearButton: true}];
            // dateRange = "";
        // }
        //  customDatePicker = [{startDate: {name: "start_date"}, endDate: {name: "end_date"}, showClearButton: true}];
        // dateRange = "";



         var visibleDelete = false;
        if ("<?php echo $this->login_user->is_admin; ?>") {
            visibleDelete = true;
        }

        $(selector).appTable({
            source: '<?php echo_uri("couriersent/list_data_report") ?>',
            dateRangeType: dateRange,
            filterDropdown: [
                {name: "client_id", class: "w200", options: <?php echo $clients_dropdown; ?>},
                {name: "salesmanager_id", class: "w200", options: <?php echo $salesmanager_dropdown; ?>}
                 
                //{name: "supplier_id", class: "w200", options: <?php echo $suppliers_dropdown; ?>}
            ],
            order: [[0, "asc"]],
            rangeDatepicker: customDatePicker,
            columns: [
                {title: "<?php echo lang("id") ?>", "class": "text-center w50"},
                {title: "<?php echo lang("date") ?>", "class": "w10p", "iDataSort": 3},
                //{title: "<?php echo lang("next_followupdate") ?>", "class": "w10p", "iDataSort": 3},
                {title: "<?php echo lang("client_name") ?>"},
                {title: "<?php echo lang("client_phone") ?>"},
                //{title: "<?php echo lang("telemarketer_name") ?>"},
                {title: "<?php echo lang("customer_name") ?>"},
                {title: "<?php echo lang("customer_phone") ?>"},
                {title: "<?php echo lang("gift_for") ?>"},
                {title: "<?php echo lang("courier_name") ?>"},
                {title: "<?php echo lang("tracking_num") ?>"}
                // <?php echo $custom_field_headers; ?>,
                // {visible: visibleDelete, title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ],
            printColumns: [1, 2, 3, 4,5],
            xlsColumns: [1, 2, 3, 4,5],
            // summation: [{column: 6, dataType: 'currency'}, {column: 7, dataType: 'currency'}, {column: 8, dataType: 'currency'}, {column: 9, dataType: 'currency'}]
        });
    };

    $(document).ready(function () {
        loadExpensesTable("#monthly-expense-table", "monthly");
    });
</script>
