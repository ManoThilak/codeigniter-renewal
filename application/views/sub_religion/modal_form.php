<?php echo form_open(get_uri("sub_religion/save"), array("id" => "groups-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
    <input type="hidden" name="id" value="<?php echo $model_info->id; ?>" />
    <div class="form-group">
        <label for="religion_id" class="col-md-3"><?php echo lang('client_name'); ?><small class="req"> *</small></label>
        <div class="col-md-9">
        <?php
        echo form_dropdown("religion_id", $religion_dropdown, array($model_info->religion_id), "class='select2 validate-hidden' id='religion_id' data-rule-required='true' data-msg-required='" . lang('field_required') . "'");
                ?>
        </div>
    </div>
    <div class="form-group">
        <br />
        <label for="title" class=" col-md-3"><?php echo lang('sub_religion'); ?></label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "title",
                "name" => "title",
                "value" => $model_info->title,
                "class" => "form-control",
                "placeholder" => lang('sub_religion'),
                "autofocus" => true,
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

$("#religion_id").select2().on("change", function () {
            // var client_id = $(this).val();
            // if ($(this).val()) {
            //     $('#invoice_project_id').select2("destroy");
            //     $("#invoice_project_id").hide();
            //     appLoader.show({container: "#invoice-porject-dropdown-section"});
            //     $.ajax({
            //         url: "<?php echo get_uri("invoices/get_project_suggestion") ?>" + "/" + client_id,
            //         dataType: "json",
            //         success: function (result) {
            //             $("#invoice_project_id").show().val("");
            //             $('#invoice_project_id').select2({data: result});
            //             appLoader.hide();
            //         }
            //     });
            // }
        });
        $("#title").focus();
    });
</script>