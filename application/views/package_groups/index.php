<div id="page-content" class="p20 clearfix">
    <div class="row">
        <div class="col-sm-3 col-lg-2">
            <?php
            $tab_view['active_tab'] = "package_groups";
            $this->load->view("settings/tabs", $tab_view);
            ?>
        </div>

        <div class="col-sm-9 col-lg-10">
            <div class="panel panel-default">
                <div class="page-title clearfix">
                    <h4> <?php echo lang('package_groups'); ?></h4>
                    <div class="title-button-group">
                        <?php echo modal_anchor(get_uri("package_groups/modal_form"), "<i class='fa fa-plus-circle'></i> " . lang('add_package_group'), array("class" => "btn btn-default", "title" => lang('add_package_group'))); ?>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="client-groups-table" class="display" cellspacing="0" width="100%">            
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#client-groups-table").appTable({
            source: '<?php echo_uri("package_groups/list_data") ?>',
            columns: [
                {title: '<?php echo lang("package_name") ?>'},
                {title: '<?php echo lang("tot_contacts") ?>'},
                {title: '<?php echo lang("adv_amt") ?>'},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ]
        });
    });
</script>