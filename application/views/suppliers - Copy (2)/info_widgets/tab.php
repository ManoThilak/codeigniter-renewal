<?php
$panel = "";
$icon = "";
$value = "";

if ($tab == "projects") {
    $panel = "panel-sky";
    $icon = "fa-th-large";
    $value = to_decimal_format($supplier_info->total_projects);
} else 
if ($tab == "invoice_value") {
    $panel = "panel-primary";
    $icon = "fa-file-text";
    $value = to_currency($supplier_info->invoice_value, $supplier_info->currency_symbol);
} else if ($tab == "payments") {
    $panel = "panel-success";
    $icon = "fa-check-square";
    $value = to_currency($supplier_info->payment_received, $supplier_info->currency_symbol);
} else if ($tab == "due") {
    $panel = "panel-coral";
    $icon = "fa-money";
    $value = to_currency(ignor_minor_value($supplier_info->invoice_value - $supplier_info->payment_received), $supplier_info->currency_symbol);
}
?>

<div class="panel <?php echo $panel ?>">
    <div class="panel-body ">
        <div class="widget-icon">
            <i class="fa <?php echo $icon; ?>"></i>
        </div>
        <div class="widget-details">
            <h1><?php echo $value; ?></h1>
            <?php echo lang($tab); ?>
        </div>
    </div>
</div>