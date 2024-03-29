<div id="page-content" class="clearfix p20">
    <div class="panel clearfix">
        <ul id="invoices-tabs" data-toggle="ajax-tab" class="nav nav-tabs bg-white title" role="tablist">
            <li class="title-tab"><h4 class="pl15 pt10 pr15"><?php echo lang($title); ?></h4></li>

            <li><a role="presentation" href="<?php echo_uri("invoices/all_invoice/"); ?>" data-target="#all-invoices">All</a></li>

            <li><a id="monthly-expenses-button"  role="presentation" class="active" href="javascript:;" data-target="#monthly-invoices"><?php echo lang("monthly"); ?></a></li>

            <li><a role="presentation" href="<?php echo_uri("invoices/yearly/"); ?>" data-target="#yearly-invoices"><?php echo lang('yearly'); ?></a></li>

            <li><a role="presentation" href="<?php echo_uri("invoices/custom/"); ?>" data-target="#custom-invoices"><?php echo lang('custom'); ?></a></li>

            <!-- <li><a role="presentation" href="<?php echo_uri("invoices/recurring/"); ?>" data-target="#recurring-invoices"><?php echo lang('recurring'); ?></a></li> -->
            <div class="tab-title clearfix no-border">
                <div class="title-button-group">
                    <?php // echo modal_anchor(get_uri("invoice_payments/payment_modal_form"), "<i class='fa fa-plus-circle'></i> " . lang('add_payment'), array("class" => "btn btn-default mb0", "title" => lang('add_payment'))); ?>
                    <?php if($title == "invoices") {
                     echo modal_anchor(get_uri("invoices/modal_form"), "<i class='fa fa-plus-circle'></i> " . lang('add_invoice'), array("class" => "btn btn-default mb0", "title" => lang('add_invoice'))); 
                    } ?>
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
    source: link,
            dateRangeType: dateRange,
            order: [[9, "desc"]], // Update THIS WHEN ADD COLUMN(ENTER LAST COLUMN)
            filterDropdown: [
            {name: "status", class: "w150", options: <?php $this->load->view("invoices/invoice_statuses_dropdown"); ?>},
            <?php if ($currencies_dropdown) { ?>
                            {name: "currency", class: "w150", options: <?php echo $currencies_dropdown; ?>}
            <?php } ?>
            ],
            rangeDatepicker: customDatePicker,
            columns: [
            {title: "ID"},
            {title: "<?php echo lang("client") ?>", "class": ""},
            {title: "<?php echo lang("phone") ?>", "class": ""},
            {title: "<?php echo lang("domain_name") ?>", "class": "w15p"},
            {title: "<?php echo lang("total") ?>", "class": "w10p text-right"},
            {title: "<?php echo lang("due_date") ?>", "class": "w10p", "iDataSort": 5},
            {title: "<?php echo lang("next_followupdate") ?>", "class": "w10p", "iDataSort": 5},
            {title: "F <?php echo lang("status") ?>", "class": "w5p text-center"},
            {title: "D <?php echo lang("status") ?>", "class": "w5p text-center"},
            {title: '<i class="fa fa-bars"></i>', "class": "text-center dropdown-option w50"}
            ],
            printColumns: combineCustomFieldsColumns([0, 1, 2, 3, 5, 7, 8, 9], '<?php echo $custom_field_headers; ?>'),
            xlsColumns: combineCustomFieldsColumns([0, 1, 2, 3, 5, 7, 8, 9], '<?php echo $custom_field_headers; ?>'),
            // summation: [{column: 6, dataType: 'number'},{column: 7, dataType: 'number'}, {column: 8, dataType: 'number'}]
            summation: [{column: 4, dataType: 'number'}]
    });
    };
    $(document).ready(function () {
        loadInvoicesTable("#monthly-invoice-table", "monthly");
    });
</script>