<div class="bg-off-white p15 pt0">
    <span class="font-16"><?php echo lang("past_lead_information"); ?></span>

    <div class="mt5">
        <?php if ($supplier_info->created_date) { ?>
            <?php echo lang("lead_created_at") . ": " . format_to_date($supplier_info->created_date, false); ?>
        <?php } ?>
        <?php if ($supplier_info->supplier_migration_date && is_date_exists($supplier_info->supplier_migration_date)) { ?>
            <br /><?php echo lang("migrated_to_client_at") . ": " . format_to_date($supplier_info->supplier_migration_date, false); ?>
        <?php } ?>
        <?php if ($supplier_info->last_lead_status) { ?>
            <br /><?php echo lang("last_status") . ": " . $supplier_info->last_lead_status; ?>
        <?php } ?>
        <?php if ($supplier_info->owner_id) { ?>
            <br /><?php echo lang("owner") . ": " . get_team_member_profile_link($supplier_info->owner_id, $supplier_info->owner_name); ?>
        <?php } ?>
    </div>
</div>