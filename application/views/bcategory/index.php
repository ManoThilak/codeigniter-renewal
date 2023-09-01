<div id="page-content" class="p20 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h1> <?php echo lang('bcategory'); ?></h1>
            <div class="title-button-group">
                <?php echo modal_anchor(get_uri("bcategory/modal_form"), "<i class='fa fa-plus-circle'></i> " . lang('add_bcategory'), array("class" => "btn btn-default", "title" => lang('add_bcategory'), "id" => "modalLink")); ?>
            </div>
        </div>
        <div class="table-responsive">
            <table id="item-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#item-table").appTable({
            source: '<?php echo_uri("bcategory/list_data") ?>',
            order: [[0, 'desc']],
            columns: [
                {title: "<?php echo lang('title') ?> "},
                {title: "<?php echo lang('description') ?>"},
                // {title: "<?php echo lang('unit_type') ?>", "class": "w100"},
                // {title: "<?php echo lang('rate') ?>"},
                {title: "<i class='fa fa-bars'></i>", "class": "text-center option w100"}
            ],
            printColumns: [0, 1, 2, 3],
            xlsColumns: [0, 1, 2, 3]
        });
    });
    // document.addEventListener('keydown', function(event) {
    //       // Check if Alt key (key code 18) and 'P' key (key code 80) are pressed simultaneously
    //       if (event.altKey && event.keyCode === 80) {
    //         // Prevent default Alt+P browser behavior (usually opens browser Print dialog)
    //         event.preventDefault();
            
    //         // Trigger the click event on the link
    //         document.getElementById('modalLink').click();
    //       }
    //       //Disable F12 Inspect key
    //       if (event.keyCode === 123){
    //         event.preventDefault();
    //       }
    // });
    // //Disable right click on current page
    // document.addEventListener('contextmenu', function(event) {
    //     event.preventDefault(); // Prevent the default context menu from appearing
    // });
</script>