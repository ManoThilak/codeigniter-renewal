<?php echo form_open(get_uri("clients/save"), array("id" => "client-form", "class" => "general-form", "role" => "form")); ?>
<div id="expense-dropzone" class="post-dropzone">
<div class="modal-body clearfix">
    <input type="hidden" name="ticket_id" value="<?php echo $ticket_id; ?>" />
    <?php $this->load->view("clients/client_form_fields"); ?>
</div>
    <?php $this->load->view("includes/dropzone_preview"); ?>
<div class="modal-footer">
   <?php $file = $model_info->files;
     if (((strlen($file)) < 8) or !$model_info->files){ ?>
    <button class="btn btn-default upload-file-button pull-left btn-sm round" type="button" style="color:#7988a2"><i class='fa fa-camera'></i> <?php echo lang("upload_file"); ?></button>
<?php } ?>
    
    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> <?php echo lang('close'); ?></button>
    <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle"></span> <?php echo lang('save'); ?></button>
</div>
</div>
<?php echo form_close(); ?>

<script type="text/javascript">
    $(document).ready(function () {
        var ticket_id = "<?php echo $ticket_id; ?>";

 <?php $file = $model_info->files;
     if (((strlen($file)) < 8) or !$model_info->files){ ?>
         var uploadUrl = "<?php echo get_uri("expenses/upload_file"); ?>";
        var validationUrl = "<?php echo get_uri("expenses/validate_expense_file"); ?>";

        var dropzone = attachDropzoneWithForm("#expense-dropzone", uploadUrl, validationUrl);
        <?php } ?>




        $("#client-form").appForm({
            onSuccess: function (result) {
                if (result.view === "details" || ticket_id) {
                    appAlert.success(result.message, {duration: 10000});
                    setTimeout(function () {
                        location.reload();
                    }, 500);

                } else {
                    $("#client-table").appTable({newData: result.data, dataId: result.id});
                }
            }
        });
        $("#company_name").focus();
    });
</script>    