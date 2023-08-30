<div class="list-group">
    <?php
    if (count($suppliers)) {
        foreach ($suppliers as $supplier) {

            $icon = "fa fa-briefcase";

            $title = "<i class='fa $icon mr10'></i> " . $client->company_name;
            echo anchor(get_uri("suppliers/view/" . $client->id), $title, array("class" => "list-group-item"));
        }
    } else {
        ?>
        <div class='list-group-item'>
            <?php echo lang("empty_starred_clients"); ?>              
        </div>
    <?php } ?>
</div>