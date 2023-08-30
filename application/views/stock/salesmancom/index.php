<div id="page-content" class="clearfix p20">
    <div class="panel clearfix">
        <ul id="expenses-tabs" data-toggle="ajax-tab" class="nav nav-tabs bg-white title" role="tablist">
            <li class="title-tab"><h4 class="pl15 pt10 pr15"><?php echo lang("salesmanagerco"); ?></h4></li>
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



         var visibleDelete = false;
        if ("<?php echo $this->login_user->is_admin; ?>") {
            visibleDelete = true;
        }

        $(selector).appTable({
            source: '<?php echo_uri("salesmancom/list_data") ?>',
            dateRangeType: dateRange,
            filterDropdown: [
                // {name: "religion_id", class: "w200", options: <?php echo $religion_dropdown; ?>},
                // {name: "sub_religion_id", class: "w200", options: <?php echo $subreligion_dropdown; ?>},
                //{name: "supplier_id", class: "w200", options: <?php echo $suppliers_dropdown; ?>}
                //{name: "salesmanager_id", class: "w200", options: <?php echo $salesmanager_dropdown; ?>}


                <?php if ($this->login_user->salesmanager_id === "0") { ?>
                    {name: "salesmanager_id", class: "w200", options: <?php echo $salesmanager_dropdown; ?>}
                <?php } ?>



            ],
            order: [[0, "asc"]],
            rangeDatepicker: customDatePicker,
            columns: [
                //{visible: false, searchable: false},
                {title: '<?php echo lang("id") ?>', "iDataSort": 0},
                {title: '<?php echo lang("salesmanager") ?>',"class": "w30p"},
                {title: '<?php echo lang("courier") ?>',"class": "w10p"},
                {title: '<?php echo lang("commission_amt") ?>', "class": "text-right w30p"},
                {title: '<?php echo lang("total") ?>', "class": "text-right w30p"}
                //{title: '<?php echo lang("stockout") ?>'},
                //{title: '<?php echo lang("aqty") ?>'}
               // {title: '<?php echo lang("supplier") ?>'}
                // {title: '<?php echo lang("amount") ?>', "class": "text-right"},
                // {title: '<?php echo lang("tax") ?>', "class": "text-right"},
                // {title: '<?php echo lang("second_tax") ?>', "class": "text-right"},
                // {title: '<?php echo lang("total") ?>', "class": "text-right"}

                // {title: '<?php echo lang("date") ?>', "iDataSort": 0},
                // {title: '<?php echo lang("category") ?>'},
                // {title: '<?php echo lang("title") ?>'},
                // {title: '<?php echo lang("description") ?>'},
                // {title: '<?php echo lang("files") ?>'},
                // {title: '<?php echo lang("amount") ?>', "class": "text-right"},
                // {title: '<?php echo lang("tax") ?>', "class": "text-right"},
                // {title: '<?php echo lang("second_tax") ?>', "class": "text-right"},
                // {title: '<?php echo lang("total") ?>', "class": "text-right"}
                // <?php echo $custom_field_headers; ?>,
                // {visible: visibleDelete, title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ],
            printColumns: [1, 2, 3, 4,5],
            xlsColumns: [1, 2, 3, 4,5],
             // summation: [{column: 6, dataType: 'currency'}, {column: 7, dataType: 'currency'}, {column: 8, dataType: 'currency'}, {column: 9, dataType: 'currency'}]
              //summation: [{column: 3, dataType: 'currency'}]
        });
    };

    $(document).ready(function () {
        loadExpensesTable("#monthly-expense-table", "monthly");
    });
</script>
