<?php echo form_open(get_uri("suppliers/save"), array("id" => "supplier-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
    <?php $this->load->view("suppliers/supplier_form_fieldss"); ?>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> <?php echo lang('close'); ?></button>
    <!-- <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle"></span> <?php echo lang('save'); ?></button> -->
</div>
<?php echo form_close(); ?>

<script type="text/javascript">
    $(document).ready(function() {
        $("#supplier-form").appForm({
            onSuccess: function(result) {
                if (result.view === "details") {
                    appAlert.success(result.message, {duration: 10000});
                    setTimeout(function() {
                        location.reload();
                    }, 500);

                } else {
                    $("#supplier-table").appTable({newData: result.data, dataId: result.id});
                }
            }
        });
        $("#company_name").focus();
        $("#status").select2().on("change", function () {
          
        });

  $("#category_id").select2().on("change", function () {
          
        });
    });
</script>    