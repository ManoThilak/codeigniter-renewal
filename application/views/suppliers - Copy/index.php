<div id="page-content" class="p20 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h1><?php echo lang('suppliers'); ?></h1>
            <div class="title-button-group">
                <?php // echo modal_anchor(get_uri("suppliers/import_suppliers_modal_form"), "<i class='fa fa-upload'></i> " . lang('import_suppliers'), array("class" => "btn btn-default", "title" => lang('import_suppliers'))); ?>
                <?php echo modal_anchor(get_uri("suppliers/modal_form"), "<i class='fa fa-plus-circle'></i> " . lang('add_supplier'), array("class" => "btn btn-default", "title" => lang('add_supplier'))); ?>
            </div>
        </div>
        <div class="table-responsive">
            <table id="supplier-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        
        var showInvoiceInfo = true;
        if (!"<?php echo $show_invoice_info; ?>") {
            showInvoiceInfo = false;
        }

        $("#supplier-table").appTable({
            source: '<?php echo_uri("suppliers/list_data") ?>',
            
            filterDropdown: [
                {name: "category_id", class: "w150", options: <?php echo $category_dropdown; ?>},
                {name: "city_id", class: "w150", options: <?php echo $city_dropdown; ?>},
                {name: "area_id", class: "w150", options: <?php echo $area_dropdown; ?>},
                {name: "status", class: "w150", options: <?php echo $status_dropdown; ?>},
            ],
            columns: [
                {title: "<?php echo lang("id") ?>", "class": "text-center w50"},
                {title: "<?php echo lang("title") ?>"},
                {title: "<?php echo lang("category") ?>"},
                {title: "<?php echo lang("city") ?>"},
                {title: "<?php echo lang("area") ?>"},
                {title: "<?php echo lang("sqft") ?>"},
                {title: "<?php echo lang("partyname") ?>"},
                {title: "<?php echo lang("map") ?>"},
                // {visible: showInvoiceInfo, searchable: showInvoiceInfo, title: "<?php echo lang("invoice_value") ?>"},
                // {visible: showInvoiceInfo, searchable: showInvoiceInfo, title: "<?php echo lang("payment_sent") ?>"},
                // {visible: showInvoiceInfo, searchable: showInvoiceInfo, title: "<?php echo lang("due") ?>"}
                // <?php echo $custom_field_headers; ?>,
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ],
            printColumns: combineCustomFieldsColumns([0, 1, 2, 3, 4, 5, 6], '<?php echo $custom_field_headers; ?>'),
            xlsColumns: combineCustomFieldsColumns([0, 1, 2, 3, 4, 5, 6], '<?php echo $custom_field_headers; ?>')
        });
    });
</script>