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
                    <h4> <?php echo lang('category_master'); ?></h4>
                    <div class="title-button-group">
                        <?php echo modal_anchor(get_uri("category/modal_form"), "<i class='fa fa-plus-circle'></i> " . lang('add_category'), array("class" => "btn btn-default", "title" => lang('add_category'))); ?>
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
            source: '<?php echo_uri("category/list_data") ?>',
            columns: [
                {title: '<?php echo lang("created_date"); ?>', "class": "w200"},
                {title: '<?php echo lang("title") ?>'},
                {title: '<?php echo lang("description") ?>'},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ]
        });
    });
</script>