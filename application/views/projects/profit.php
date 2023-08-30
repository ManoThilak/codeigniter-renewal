<div class="panel">
    <div class="panel-body">
         <div class="col-md-6">
        <div id="task-status-pai1" class="p15" style="width: 100%; height: 220px;"></div>
        </div>
          <div class="col-md-6">
              <br>
             <p> <b>Project Amount :</b> <?php echo $project_info->currency_symbol.' '. $project_info->price ?></p> <br>
              <p> <b> Total Income Amount :</b> <?php echo $project_info->currency_symbol.' '. $payed_amount ?></p> <br>
               <p> <b>Total Expense Amount :</b> <?php echo $project_info->currency_symbol.' '.$expenses_amount ?></p> 
          </div>
    </div>
</div>

<?php


$income_data = array();

    $income_data[0] = array("label" => 'Expense', "data" => $expenses_amount, "color" =>'#ff1b41');
 $income_data[1] = array("label" => 'Income', "data" => $payed_amount, "color" => '#00B393');
?>
<script>
    $(function () {
        var taskData = <?php echo json_encode($income_data) ?>;

        if (taskData && taskData.length) {
            $.plot('#task-status-pai1', taskData, {
                series: {
                    pie: {
                        show: true,
                        innerRadius: 0.5
                    }
                },
                legend: {
                    show: true
                },
                grid: {
                    hoverable: true
                },
                tooltip: {
                    show: true,
                    content: "%s: %p.0%, %n", // show percentages, rounding to 2 decimal places
                    shifts: {
                        x: 20,
                        y: 0
                    },
                    defaultTheme: false
                }
            });
        }
    });
</script>