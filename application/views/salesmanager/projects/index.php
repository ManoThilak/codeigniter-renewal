<?php if (isset($page_type) && $page_type === "full") { ?>
    <div id="page-content" class="m20 clearfix">
    <?php } ?>

    <div class="panel">
        <?php if (isset($page_type) && $page_type === "full") { ?>
            <div class="page-title clearfix">
                <h1><?php echo lang('clients'); ?></h1>
                <div class="title-button-group">
                    <?php
                    if (isset($can_create_projects) && $can_create_projects) {
                        echo modal_anchor(get_uri("clients/modal_form"), "<i class='fa fa-plus-circle'></i> " . lang('add_client'), array("class" => "btn btn-default", "data-post-client_id" => $client_id, "title" => lang('add_client')));
                    }
                    ?>
                </div>
            </div>
        <?php } else if (isset($page_type) && $page_type === "dashboard") { ?>
            <div class="page-title panel-sky clearfix">
                <h1><?php echo lang('clients'); ?></h1>
            </div>
        <?php } else { ?>
            <div class="tab-title clearfix">
                <h4><?php echo lang('clients'); ?></h4>
                <div class="title-button-group">
                    <?php
                    if (isset($can_create_projects) && $can_create_projects) {
                        echo modal_anchor(get_uri("clients/modal_form"), "<i class='fa fa-plus-circle'></i> " . lang('add_client'), array("class" => "btn btn-default", "data-post-client_id" => $client_id, "title" => lang('add_client')));
                    }
                    ?>
                </div>
            </div>
        <?php } ?>

        <div class="table-responsive" id="client-projects-list">
            <table id="project-table" class="display" width="100%">            
            </table>
        </div>
    </div>
    <?php if (isset($page_type) && $page_type === "full") { ?>
    </div>
<?php } ?>

<?php
if (!isset($project_labels_dropdown)) {
    $project_labels_dropdown = "0";
}
?>


<script type="text/javascript">
    $(document).ready(function () {
        var hideTools = "<?php
if (isset($page_type) && $page_type === 'dashboard') {
    echo 1;
}
?>" || 0;


        var filters = [{name: "project_label", class: "w200", options: <?php echo $project_labels_dropdown; ?>}];

        //don't show filters if hideTools is true or $project_labels_dropdown is empty
        if (hideTools || !<?php echo $project_labels_dropdown; ?>) {
            filters = false;
        }

        var optionVisibility = false;
        if ("<?php echo get_setting("client_can_edit_projects"); ?>") {
            optionVisibility = true;
        }
        var showInvoiceInfo = true;
        if (!"<?php echo $show_invoice_info; ?>") {
            showInvoiceInfo = false;
        }


        $("#project-table").appTable({
            // source: '<?php echo_uri("projects/projects_list_data_of_client/" . $client_id) ?>',
            source: '<?php echo_uri("clients/list_data_of_client/" . $client_id) ?>',
            
            order: [[0, "desc"]],
            hideTools: hideTools,
            
            
            columns: [
                {title: "<?php echo lang("id") ?>", "class": "text-center w50"},
                {title: "<?php echo lang("company_name") ?>"},
                {title: "<?php echo lang("client_name") ?>"},
                {title: "<?php echo lang("package_type") ?>"},
                {title: "<?php echo lang("package_groups") ?>"},
                {title: "<?php echo lang("salesmanager") ?>"},
                // {title: "<?php echo lang("primary_contact") ?>"},
                // {title: "<?php echo lang("client_groups") ?>"},
                // {title: "<?php echo lang("projects") ?>"},
                {visible: showInvoiceInfo, searchable: showInvoiceInfo, title: "<?php echo lang("invoice_value") ?>"},
                {visible: showInvoiceInfo, searchable: showInvoiceInfo, title: "<?php echo lang("payment_received") ?>"},
                {visible: showInvoiceInfo, searchable: showInvoiceInfo, title: "<?php echo lang("due") ?>"}
                <?php echo $custom_field_headers; ?>,
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ],
            printColumns: combineCustomFieldsColumns([0, 1, 2, 3, 4, 5, 6], '<?php echo $custom_field_headers; ?>'),
            xlsColumns: combineCustomFieldsColumns([0, 1, 2, 3, 4, 5, 6], '<?php echo $custom_field_headers; ?>')
        });
    });
</script>