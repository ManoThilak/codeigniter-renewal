<div id="page-content" class="p20 clearfix">
    <div class="row">
        <!-- <div class="col-sm-3 col-lg-2">
            <?php
            $tab_view['active_tab'] = "godown_master";
            $this->load->view("settings/tabs", $tab_view);
            ?>
        </div> -->

        <div class="col-sm-12 col-lg-12">
            <div class="panel panel-default">
                <div class="page-title clearfix">
                    <h4> <?php echo lang('area_master'); ?></h4>
                    <div class="title-button-group">
                        <?php echo modal_anchor(get_uri("area/modal_form"), "<i class='fa fa-plus-circle'></i> " . lang('add_area'), array("class" => "btn btn-default", "title" => lang('add_area'))); ?>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="godown-table" class="display" cellspacing="0" width="100%">            
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#godown-table").appTable({
            source: '<?php echo_uri("area/list_data") ?>',
            columns: [
                {title: '<?php echo lang("created_date"); ?>', "class": "w200"},
                {title: '<?php echo lang("city") ?>'},
                {title: '<?php echo lang("area") ?>'},
                {title: '<?php echo lang("description") ?>'},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ]
        });
    });
</script>