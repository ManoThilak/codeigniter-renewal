<!-- <?php

$invoice_statuses_dropdown = array(
    array("id" => "", "text" => "- " . lang("status") . " -"),
    array("id" => "overdue", "text" => lang("overdue")),
    array("id" => "draft", "text" => lang("draft")),
    array("id" => "not_paid", "text" => lang("not_paid")),
    array("id" => "partially_paid", "text" => lang("partially_paid")),
    array("id" => "fully_paid", "text" => lang("fully_paid")),
    array("id" => "cancelled", "text" => lang("cancelled"))
);
echo json_encode($invoice_statuses_dropdown);
?> -->

<?php

$invoice_statuses_dropdown = array(
    array("id" => "2", "text" => "- " . lang("status") . " -"),
    array("id" => "0", "text" => 'Live'),
    array("id" => "1", "text" => 'Lost')
);
echo json_encode($invoice_statuses_dropdown);
?>