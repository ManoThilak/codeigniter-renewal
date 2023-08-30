<?php echo form_open(get_uri("package_groups/save"), array("id" => "groups-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
    <input type="hidden" name="id" value="<?php echo $model_info->id; ?>" />
    <div class="form-group">
        <br />
        <label for="package_name" class=" col-md-3"><?php echo lang('package_name'); ?></label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "package_name",
                "name" => "package_name",
                "value" => $model_info->package_name,
                "class" => "form-control",
                "placeholder" => lang('package_name'),
                "autofocus" => true,
                "data-rule-required" => true,
                "data-msg-required" => lang("field_required"),
            ));
            ?>
        </div>
        <br />
    </div>
    <div class="form-group">
        <br />
        <label for="tot_contacts" class=" col-md-3"><?php echo lang('tot_contacts'); ?></label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "tot_contacts",
                "name" => "tot_contacts",
                "value" => $model_info->tot_contacts,
                "class" => "form-control",
                "placeholder" => lang('tot_contacts'),
                "data-rule-required" => true,
                "data-msg-required" => lang("field_required"),
            ));
            ?>
        </div>
        <br />
    </div>
    <div class="form-group">
        <br />
        <label for="adv_amt" class=" col-md-3"><?php echo lang('adv_amt'); ?></label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "adv_amt",
                "name" => "adv_amt",
                "value" => $model_info->adv_amt,
                "class" => "form-control",
                "placeholder" => lang('adv_amt'),
                "data-rule-required" => true,
                "data-msg-required" => lang("field_required"),
            ));
            ?>
        </div>
        <br />
    </div>
</div>

    



<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> <?php echo lang('close'); ?></button>
    <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle"></span> <?php echo lang('save'); ?></button>
</div>
<?php echo form_close(); ?>

<script type="text/javascript">
    $(document).ready(function() {
        $("#groups-form").appForm({
            onSuccess: function(result) {
                $("#client-groups-table").appTable({newData: result.data, dataId: result.id});
            }
        });
        $("#package_name").focus();
    });
</script>