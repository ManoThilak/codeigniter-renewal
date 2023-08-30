<div id="page-content" class="p20 clearfix">
    <div class="panel clearfix">
        <ul id="client-tabs" data-toggle="ajax-tab" class="nav nav-tabs bg-white title" role="tablist">
            <li><a id="clients-button" class="active" role="presentation" href="javascript:;" data-target="#clients"><?php echo lang('customers'); ?></a></li>
            <!-- <li><a role="presentation" href="<?php echo_uri("customers/contacts/"); ?>" data-target="#contacts"><?php echo lang('contacts'); ?></a></li> -->
            <div class="tab-title clearfix no-border">
                <div class="title-button-group">
                    <?php echo modal_anchor(get_uri("customers/import_clients_modal_form"), "<i class='fa fa-upload'></i> " . lang('import_customer'), array("class" => "btn btn-default", "title" => lang('import_customer'))); ?>
                    <?php echo modal_anchor(get_uri("customers/modal_form"), "<i class='fa fa-plus-circle'></i> " . lang('add_customer'), array("class" => "btn btn-default", "title" => lang('add_customer'))); ?>
                    <?php echo modal_anchor(get_uri("customers/customers_tele_fields"), "<i class='fa fa-plus-circle'></i> " . lang('assign_to_telemarketer'), array("class" => "btn btn-default", "title" => lang('assign_to_telemarketer'))); ?>
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
    loadClientsTable = function (selector) {
        var showInvoiceInfo = true;
        if (!"<?php echo $show_invoice_info; ?>") {
            showInvoiceInfo = false;
        }

        $(selector).appTable({
            source: '<?php echo_uri("customers/list_data") ?>',
            filterDropdown: [
                
                {name: "status_id", class: "w200", options: <?php echo $status_dropdown; ?>},
                // {name: "to_id", class: "w200", options: <?php echo $to_dropdown; ?>},
                // {name: "from_id", class: "w200", options: <?php echo $from_dropdown; ?>},
                {name: "group_id", class: "w200", options: <?php echo $groups_dropdown; ?>}
            ],
            columns: [
                //<input type="checkbox" id="select_all" />
                {title: "<?php echo lang("id") ?>", "class": "text-center w50"},
                {title: "<?php echo lang("customer_name") ?>"},
                //{title: "<?php echo lang("client_name") ?>"},
                {title: "<?php echo lang("phone") ?>"},
                 {title: "<?php echo lang("birth_date") ?>", "class": "w10p", "iDataSort": 3},
                {visible: false, searchable: false},
                {title: "<?php echo lang("anniversary_date") ?>", "class": "w10p", "iDataSort": 5},
                {title: "<?php echo lang("city") ?>"},
                {title: "<?php echo lang("status") ?>"},

                //{title: "<?php echo lang("salesmanager") ?>"},
                // {title: "<?php echo lang("primary_contact") ?>"},
                // {title: "<?php echo lang("client_groups") ?>"},
                // {title: "<?php echo lang("projects") ?>"},
                // {visible: showInvoiceInfo, searchable: showInvoiceInfo, title: "<?php echo lang("invoice_value") ?>"},
                // {visible: showInvoiceInfo, searchable: showInvoiceInfo, title: "<?php echo lang("payment_received") ?>"},
                // {visible: showInvoiceInfo, searchable: showInvoiceInfo, title: "<?php echo lang("due") ?>"}
                // <?php echo $custom_field_headers; ?>,
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ],
            printColumns: combineCustomFieldsColumns([0, 1, 2, 3, 4, 5, 6], '<?php echo $custom_field_headers; ?>'),
            xlsColumns: combineCustomFieldsColumns([0, 1, 2, 3, 4, 5, 6], '<?php echo $custom_field_headers; ?>')
        });
    };

    $(document).ready(function () {
        loadClientsTable("#client-table");
    });
</script>