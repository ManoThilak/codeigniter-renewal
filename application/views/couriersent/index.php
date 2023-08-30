<div id="page-content" class="p20 clearfix">
    <div class="panel clearfix">
        <ul id="client-tabs" data-toggle="ajax-tab" class="nav nav-tabs bg-white title" role="tablist">
            <li><a id="clients-button" class="active" role="presentation" href="javascript:;" data-target="#clients"><?php echo lang('couriersent'); ?></a></li>
            <!-- <li><a role="presentation" href="<?php echo_uri("couriersent/contacts/"); ?>" data-target="#contacts"><?php echo lang('contacts'); ?></a></li> -->
            <div class="tab-title clearfix no-border">
                <div class="title-button-group">
                     <?php echo modal_anchor(get_uri("couriersent/import_clients_modal_form"), "<i class='fa fa-upload'></i> " . lang('import_tracking_num'), array("class" => "btn btn-default", "title" => lang('import_tracking_num'))); ?>   
                   <!--  <?php echo modal_anchor(get_uri("couriersent/modal_form"), "<i class='fa fa-plus-circle'></i> " . lang('add_telemarketer'), array("class" => "btn btn-default", "title" => lang('add_telemarketer'))); ?> -->
                   <!--  <?php echo modal_anchor(get_uri("couriersent/customers_tele_fields"), "<i class='fa fa-plus-circle'></i> " . lang('assign_to_courie'), array("class" => "btn btn-default", "title" => lang('assign_to_couriersent'))); ?> --> 
                </div>
            </div>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade" id="clients">
                <div class="table-responsive">
                    <table id="client-table" class="display" cellspacing="0" width="100%">            
                    </table>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="contacts"></div>
        </div>
    </div>
</div>

<script type="text/javascript">
    loadClientsTable = function (selector, dateRange) {
        var showInvoiceInfo = true;
        if (!"<?php echo $show_invoice_info; ?>") {
            showInvoiceInfo = false;
        }

        var customDatePicker = "";
        //if (dateRange === "custom") {
        customDatePicker = [{startDate: {name: "start_date"}, endDate: {name: "end_date"}, showClearButton: true}];
        dateRange = "";

        // customDatePicker = [{startDate: {name: "start_date", value: moment().format("YYYY-MM-DD")}, endDate: {name: "end_date", value: moment().format("YYYY-MM-DD")}, showClearButton: true}];
        // dateRange = "";
        //}

        $(selector).appTable({
            source: '<?php echo_uri("couriersent/list_data") ?>',
            filterDropdown: [
                
                //{name: "status_id", class: "w200", options: <?php echo $status_dropdown; ?>},
                // {name: "to_id", class: "w200", options: <?php echo $to_dropdown; ?>},
                // {name: "from_id", class: "w200", options: <?php echo $from_dropdown; ?>},
                //{name: "telemarketer_id", class: "w200", options: <?php echo $telemarketers_dropdown; ?>},
                {name: "group_id", class: "w200", options: <?php echo $groups_dropdown; ?>}
            ],
            rangeDatepicker: customDatePicker,
            columns: [
                //<input type="checkbox" id="select_all" />
                {title: "<?php echo lang("id") ?>", "class": "text-center w50"},
                {title: "<?php echo lang("date") ?>", "class": "w10p", "iDataSort": 3},
                //{title: "<?php echo lang("next_followupdate") ?>", "class": "w10p", "iDataSort": 3},
                {title: "<?php echo lang("client_name") ?>"},
                {title: "<?php echo lang("client_phone") ?>"},
                //{title: "<?php echo lang("telemarketer_name") ?>"},
                {title: "<?php echo lang("customer_name") ?>"},
                {title: "<?php echo lang("customer_phone") ?>"},
                {title: "<?php echo lang("courier_name") ?>"},
                {title: "<?php echo lang("tracking_num") ?>"},
                

                //  {title: "<?php echo lang("birth_date") ?>", "class": "w10p", "iDataSort": 3},
                // {visible: false, searchable: false},
                // {title: "<?php echo lang("anniversary_date") ?>", "class": "w10p", "iDataSort": 5},
                // {title: "<?php echo lang("phone") ?>"},
                // {title: "<?php echo lang("city") ?>"},
                // {title: "<?php echo lang("religion") ?>"},
                // {title: "<?php echo lang("gift") ?>"},
                // {title: "<?php echo lang("gift_for") ?>"},
                //{title: "<?php echo lang("status") ?>"},

                //{title: "<?php echo lang("salesmanager") ?>"},
                // {title: "<?php echo lang("primary_contact") ?>"},
                // {title: "<?php echo lang("client_groups") ?>"},
                // {title: "<?php echo lang("projects") ?>"},
                // {visible: showInvoiceInfo, searchable: showInvoiceInfo, title: "<?php echo lang("invoice_value") ?>"},
                // {visible: showInvoiceInfo, searchable: showInvoiceInfo, title: "<?php echo lang("payment_received") ?>"},
                // {visible: showInvoiceInfo, searchable: showInvoiceInfo, title: "<?php echo lang("due") ?>"}
                // <?php echo $custom_field_headers; ?>,
                //{title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ],
            printColumns: combineCustomFieldsColumns([0, 1, 2, 3, 4, 5, 6], '<?php echo $custom_field_headers; ?>'),
            xlsColumns: combineCustomFieldsColumns([0, 1, 2, 3, 4, 5, 6], '<?php echo $custom_field_headers; ?>')
        });
    };

    $(document).ready(function () {
        loadClientsTable("#client-table");
    });
</script>