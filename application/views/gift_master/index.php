<div id="page-content" class="p20 clearfix">
    <div class="row">
        <div class="col-sm-3 col-lg-2">
            <?php
            $tab_view['active_tab'] = "gift_master";
            $this->load->view("settings/tabs", $tab_view);
            ?>
        </div>

        <div class="col-sm-9 col-lg-10">
            <div class="panel panel-default">
                <div class="page-title clearfix">
                    <h4> <?php echo lang('gift_master'); ?></h4>
                    <div class="title-button-group">
                        <?php echo modal_anchor(get_uri("gift_master/modal_form"), "<i class='fa fa-plus-circle'></i> " . lang('add_gift_master'), array("class" => "btn btn-default", "title" => lang('add_gift_master'))); ?>
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
            source: '<?php echo_uri("gift_master/list_data") ?>',
            columns: [
                {title: '<?php echo lang("religion") ?>'},
                {title: '<?php echo lang("sub_religion") ?>'},
                {title: '<?php echo lang("gift") ?>'},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ]
        });
    });
</script>