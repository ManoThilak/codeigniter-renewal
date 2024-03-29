<?php if (isset($page_type) && $page_type === "full") { ?>
    <div id="page-content" class="m20 clearfix">
    <?php } ?>

    <div class="panel">
        <?php if (isset($page_type) && $page_type === "full") { ?>
            <div class="page-title clearfix">
                <h1><?php echo lang('invoices'); ?></h1>
            </div>
        <?php } else { ?>
            <div class="tab-title clearfix">
                <h4><?php echo lang('invoices'); ?></h4>
                <div class="title-button-group">
                    <?php echo modal_anchor(get_uri("invoices/modal_form"), "<i class='fa fa-plus-circle'></i> " . lang('add_invoice'), array("class" => "btn btn-default mb0", "data-post-client_id" => $client_id, "title" => lang('add_invoice'))); ?>
                </div>
            </div>
        <?php } ?>

        <div class="table-responsive">
            <table id="invoice-table" class="display" width="100%">
            </table>
        </div>
    </div>
    <?php if (isset($page_type) && $page_type === "full") { ?>
    </div>
<?php } ?>
<script type="text/javascript">
    $(document).ready(function () {
        var currencySymbol = "<?php echo $client_info->currency_symbol; ?>";
        $("#invoice-table").appTable({
            source: '<?php echo_uri("invoices/invoice_list_data_of_client/" . $client_id) ?>',
            order: [[0, "desc"]],
            filterDropdown: [{name: "status", class: "w150", options: <?php $this->load->view("invoices/invoice_statuses_dropdown"); ?>}],
            columns: [
                {title: '<?php echo lang("id") ?>', "class": "w10p"},
                {targets: [1], visible: false, searchable: false},
                {title: "<?php echo lang("phone") ?>", "class": "w15p"},
                {title: "<?php echo lang("domain_name") ?>", "class": "w15p"},
                {title: "<?php echo lang("total") ?>", "class": "w10p", "iDataSort": 3},
                {title: "<?php echo lang("due_date") ?>", "class": "w10p", "iDataSort": 5},
                
                {title: "<?php echo lang("next_followupdate") ?>", "class": "w20p", "iDataSort": 5},
                {title: "F <?php echo lang("status") ?>", "class": ""},
                {title: 'D <?php echo lang("status") ?>', "class": "w10p text-center"},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center dropdown-option w100"}
                <?php echo $custom_field_headers; ?>
            ],
            printColumns: combineCustomFieldsColumns([0, 2, 4, 6, 7, 8, 9], '<?php echo $custom_field_headers; ?>'),
            xlsColumns: combineCustomFieldsColumns([0, 2, 4, 6, 7, 8, 9], '<?php echo $custom_field_headers; ?>'),
           // summation: [{column: 6, dataType: 'currency', currencySymbol: currencySymbol}, {column: 7, dataType: 'currency', currencySymbol: currencySymbol}, {column: 8, dataType: 'currency', currencySymbol: currencySymbol}]
        });
    });
</script>