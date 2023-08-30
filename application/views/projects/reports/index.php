<div class="panel">
    <div class="tab-title clearfix">
        <h4><?php echo 'Reports'; ?></h4>
       
    </div>
    <div class="table-responsive">
        <table id="reports-table" class="display" cellspacing="0" width="100%">
        </table>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $EXPENSE_TABLE = $("#reports-table");

        $EXPENSE_TABLE.appTable({
            source: '<?php echo_uri("expenses/list_report_data?project_id=$project_id") ?>',
            filterParams: {project_id: "<?php echo $project_id; ?>"},
            order: [[0, "asc"]],
            columns: [
                {visible: false, searchable: false},
                {title: 'Date', "iDataSort": 0},
                {title: 'Type'},
                {title: 'Description'},
                {title: 'Dr', "class": "text-right"},
                {title: 'Cr', "class": "text-right"}
               
            ],
            printColumns: [1, 2, 3, 4, 5],
            xlsColumns: [1, 2, 3, 4, 5],
            summation: [{column: 4, dataType: 'currency'}, {column: 5, dataType: 'currency'}]
        });
    });
</script>