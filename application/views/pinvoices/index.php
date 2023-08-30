<div id="page-content" class="clearfix p20">
    <div class="panel clearfix">
        <ul id="pinvoices-tabs" data-toggle="ajax-tab" class="nav nav-tabs bg-white title" role="tablist">
            <li class="title-tab"><h4 class="pl15 pt10 pr15"><?php echo lang("pinvoices"); ?></h4></li>
            <li><a id="monthly-expenses-button"  role="presentation" class="active" href="javascript:;" data-target="#monthly-pinvoices"><?php echo lang("monthly"); ?></a></li>
            <li><a role="presentation" href="<?php echo_uri("pinvoices/yearly/"); ?>" data-target="#yearly-pinvoices"><?php echo lang('yearly'); ?></a></li>
            <li><a role="presentation" href="<?php echo_uri("pinvoices/custom/"); ?>" data-target="#custom-pinvoices"><?php echo lang('custom'); ?></a></li>
            <li><a role="presentation" href="<?php echo_uri("pinvoices/recurring/"); ?>" data-target="#recurring-pinvoices"><?php echo lang('recurring'); ?></a></li>
            <div class="tab-title clearfix no-border">
                <div class="title-button-group">
                     <?php echo modal_anchor(get_uri("pinvoice_payments/payment_modal_form"), "<i class='fa fa-plus-circle'></i> " . lang('add_payment'), array("class" => "btn btn-default mb0", "title" => lang('add_payment'))); ?> 
                    <!-- <?php echo modal_anchor(get_uri("pexpenses/modal_form"), "<i class='fa fa-plus-circle'></i> " . lang('add_payment'), array("class" => "btn btn-default mb0", "title" => lang('add_payment'))); ?> -->
                    <?php echo modal_anchor(get_uri("pinvoices/modal_form"), "<i class='fa fa-plus-circle'></i> " . lang('add_invoice'), array("class" => "btn btn-default mb0", "title" => lang('add_invoice'))); ?>
                </div>
            </div>
        </ul>

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade" id="monthly-pinvoices">
                <div class="table-responsive">
                    <table id="monthly-pinvoice-table" class="display" cellspacing="0" width="100%">   
                    </table>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="yearly-pinvoices"></div>
            <div role="tabpanel" class="tab-pane fade" id="custom-pinvoices"></div>
            <div role="tabpanel" class="tab-pane fade" id="recurring-pinvoices"></div>
        </div>
    </div>
</div>

<script type="text/javascript">
    loadInvoicesTable = function (selector, dateRange) {
    var customDatePicker = "";
    if (dateRange === "custom") {
    customDatePicker = [{startDate: {name: "start_date", value: moment().format("YYYY-MM-DD")}, endDate: {name: "end_date", value: moment().format("YYYY-MM-DD")}, showClearButton: true}];
    dateRange = "";
    }

    $(selector).appTable({
    source: '<?php echo_uri("pinvoices/list_data") ?>',
            dateRangeType: dateRange,
            order: [[0, "desc"]],
            filterDropdown: [
            {name: "status", class: "w150", options: <?php $this->load->view("pinvoices/invoice_statuses_dropdown"); ?>},
<?php if ($currencies_dropdown) { ?>
                {name: "currency", class: "w150", options: <?php echo $currencies_dropdown; ?>}
<?php } ?>
            ],
            rangeDatepicker: customDatePicker,
            columns: [
            {title: "<?php echo lang("invoice_id") ?>", "class": "w10p"},
            {title: "<?php echo lang("salesmanager") ?>", "class": ""},
            // {title: "<?php echo lang("project") ?>", "class": "w15p"},
            {visible: false, searchable: false},
            {title: "<?php echo lang("bill_date") ?>", "class": "w10p", "iDataSort": 3},
            {visible: false, searchable: false},
            {title: "<?php echo lang("due_date") ?>", "class": "w10p", "iDataSort": 5},
            {title: "<?php echo lang("invoice_value") ?>", "class": "w10p text-right"},
            {title: "<?php echo lang("payment_received") ?>", "class": "w10p text-right"},
            //{title: '<?php echo lang("files") ?>'},
            {title: "<?php echo lang("status") ?>", "class": "w10p text-center"}
            <?php echo $custom_field_headers; ?>,
            {title: '<i class="fa fa-bars"></i>', "class": "text-center dropdown-option w100"}
            ],
            printColumns: combineCustomFieldsColumns([0, 1, 2, 3, 5, 7, 8, 9], '<?php echo $custom_field_headers; ?>'),
            xlsColumns: combineCustomFieldsColumns([0, 1, 2, 3, 5, 7, 8, 9], '<?php echo $custom_field_headers; ?>'),
            summation: [{column: 6, dataType: 'number'}, {column: 7, dataType: 'number'}]
    });
    };
    $(document).ready(function () {
    loadInvoicesTable("#monthly-pinvoice-table", "monthly");
    });
</script>