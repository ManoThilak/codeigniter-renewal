<div id="page-content" class="p20 clearfix">
    <div class="row">
        <div class="col-sm-3 col-lg-2">
            <?php
            $tab_view['active_tab'] = "sub_religion";
            $this->load->view("settings/tabs", $tab_view);
            ?>
        </div>

        <div class="col-sm-9 col-lg-10">
            <div class="panel panel-default">
                <div class="page-title clearfix">
                    <h4> <?php echo lang('sub_religion'); ?></h4>
                    <div class="title-button-group">
                        <?php echo modal_anchor(get_uri("sub_religion/modal_form"), "<i class='fa fa-plus-circle'></i> " . lang('add_sub_religion'), array("class" => "btn btn-default", "title" => lang('add_sub_religion'))); ?>
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
            source: '<?php echo_uri("sub_religion/list_data") ?>',
            columns: [
                {title: '<?php echo lang("religion") ?>'},
                {title: '<?php echo lang("sub_religion") ?>'},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ]
        });
    });
</script>