<div id="page-content" class="clearfix p20">
    <div class="panel clearfix">
        <ul id="invoices-tabs" data-toggle="ajax-tab" class="nav nav-tabs bg-white title" role="tablist">
            <!-- <li class="title-tab"><h4 class="pl15 pt10 pr15"><?php echo lang($title); ?> Report</h4></li> -->

            <li class="title-tab"><a role="presentation" href="<?php echo_uri("invoices/all_invoice/"); ?>" data-target="#all-invoices"><?php echo lang($title); ?> Report</a></li>

           <!--  <li><a id="monthly-expenses-button"  role="presentation" class="active" href="javascript:;" data-target="#monthly-invoices"><?php echo lang("monthly"); ?></a></li>

            <li><a role="presentation" href="<?php echo_uri("invoices/yearly/"); ?>" data-target="#yearly-invoices"><?php echo lang('yearly'); ?></a></li>

            <li><a role="presentation" href="<?php echo_uri("invoices/custom/"); ?>" data-target="#custom-invoices"><?php echo lang('custom'); ?></a></li> -->

            <!-- <li><a role="presentation" href="<?php echo_uri("invoices/recurring/"); ?>" data-target="#recurring-invoices"><?php echo lang('recurring'); ?></a></li> -->
            <div class="tab-title clearfix no-border">
                <div class="title-button-group">
                    <?php // echo modal_anchor(get_uri("invoice_payments/payment_modal_form"), "<i class='fa fa-plus-circle'></i> " . lang('add_payment'), array("class" => "btn btn-default mb0", "title" => lang('add_payment'))); ?>
                     <button type="button" id="relo" class="btn btn-default mb0" ><i class='fa fa-reset'></i> <?php echo lang('reset'); ?></button>
                </div>
            </div>
        </ul>

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade" id="all-invoices"></div>
            <div role="tabpanel" class="tab-pane fade" id="monthly-invoices">
                <div class="table-responsive">
                    <table id="monthly-invoice-table" class="display" cellspacing="0" width="100%">   
                    </table>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="yearly-invoices"></div>
            <div role="tabpanel" class="tab-pane fade" id="custom-invoices"></div>
            <div role="tabpanel" class="tab-pane fade" id="recurring-invoices"></div>
        </div>
    </div>
</div>

<script type="text/javascript">
    loadInvoicesTable = function (selector, dateRange) {
    var customDatePicker = "";
    if (dateRange === "custom") {
    customDatePicker = [{startDate: {name: "start_date", value: moment().format("YYYY-MM-DD")}, endDate: {name: "end_date", value: moment().format("YYYY-MM-DD")}, showClearButton: true}];
    dateRange = "";
    } else if (dateRange === "all") {
    dateRange = "";
    }
    var sta ="<?php echo $title; ?>";
    if( sta == "invoices" || sta == "follow_report") {
        var link = '<?php echo_uri("invoices/list_data"); ?>'
    } else if( sta == "expiry_report" ) {
        var link = '<?php echo_uri("invoices/list_data_expiry"); ?>'
    } 

    $(selector).appTable({
    source: '<?php echo_uri("invoices/list_data_portfolio"); ?>',
            dateRangeType: dateRange,
            // order: [[9, "desc"]], // Update THIS WHEN ADD COLUMN(ENTER LAST COLUMN)
            filterDropdown: [
            {name: "bcategory_id", class: "w200", options: <?php echo $bcategory_dropdown; ?>},
            
            {name: "city_id", class: "w150", options: <?php echo $city_dropdown; ?>},
            {name: "state_id", class: "w150", options: <?php echo $state_dropdown; ?>},
            {name: "status", class: "w150", options: <?php $this->load->view("invoices/invoice_statuses_dropdown"); ?>},
            <?php if ($currencies_dropdown) { ?>
                            {name: "currency", class: "w150", options: <?php echo $currencies_dropdown; ?>}
            <?php } ?>
            ],
            rangeDatepicker: customDatePicker,
            columns: [
            {title: "ID", "class": "w5p"},
            {title: "<?php echo lang("client") ?>", "class": ""},
            //{title: "<?php echo lang("project") ?>", "class": "w15p"},
            // {visible: false, searchable: false},
            // {title: "<?php echo lang("bill_date") ?>", "class": "w10p", "iDataSort": 3},
            // {visible: false, searchable: false},
            // {title: "<?php echo lang("due_date") ?>", "class": "w10p", "iDataSort": 5},
            {title: "<?php echo lang("state") ?>", "class": "w15p"},
            {title: "<?php echo lang("city") ?>", "class": "w15p"},
            // {visible: false, searchable: false},
            {title: "<?php echo lang("domain_name") ?>", "class": "w15p"},
            // {title: "<?php echo lang("total") ?>", "class": "w10p text-right"},
            // {title: "D <?php echo lang("status") ?>", "class": "w5p text-center"},
            // {title: "<?php echo lang("next_followupdate") ?>", "class": "w10p", "iDataSort": 5},
            // {visible: false, searchable: false},
            
            // {title: "<?php echo lang("invoice_value") ?>", "class": "w10p text-right"},
            // {title: "<?php echo lang("payment_received") ?>", "class": "w10p text-right"},
            // {title: "<?php echo lang("due") ?>", "class": "w10p text-right"},
            // {title: "F <?php echo lang("status") ?>", "class": "w5p text-center"},
            {title: "<?php echo lang("items") ?>", "class": ""},
            {title: "<?php echo lang("bcategory") ?>", "class": ""}
            // {title: "<?php echo lang("entry_by") ?>", "class": ""}
            <?php echo $custom_field_headers; ?>,
            // {title: '<i class="fa fa-bars"></i>', "class": "text-center dropdown-option w50"}
            ],
            printColumns: combineCustomFieldsColumns([0, 1, 2, 3, 5, 7, 8, 9], '<?php echo $custom_field_headers; ?>'),
            xlsColumns: combineCustomFieldsColumns([0, 1, 2, 3, 5, 7, 8, 9], '<?php echo $custom_field_headers; ?>'),
            // summation: [{column: 6, dataType: 'number'},{column: 7, dataType: 'number'}, {column: 8, dataType: 'number'}]
            // summation: [{column: 5, dataType: 'number'}]
    });
    };
    $(document).ready(function () {
        loadInvoicesTable("#monthly-invoice-table", "monthly");
         $("#relo").click(function () {
            window.location.reload();
        });
    });
</script>
