<?php echo form_open(get_uri("pexpenses/save"), array("id" => "expense-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
    <div id="expense-dropzone" class="post-dropzone">
        <input type="hidden" name="id" value="<?php echo $model_info->id; ?>" />
        <div class=" form-group">
            <label for="expense_date" class=" col-md-3"><?php echo lang('date_of_expense'); ?></label>
            <div class="col-md-9">
                <?php
                echo form_input(array(
                    "id" => "expense_date",
                    "name" => "expense_date",
                    "value" => $model_info->expense_date? $model_info->expense_date: get_my_local_time("Y-m-d"),
                    "class" => "form-control",
                    "data-rule-required" => true,
                    "data-msg-required" => lang("field_required"),
                ));
                ?>
            </div>
        </div>
        <div class="form-group">
            <label for="category_id" class=" col-md-3"><?php echo lang('category'); ?></label>
            <div class=" col-md-9">
                <?php
                echo form_dropdown("category_id", $categories_dropdown, $model_info->category_id, "class='select2 validate-hidden' id='category_id' data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
                ?>
            </div>
        </div>


        <?php if ($client_id && !$invoice_id) { ?>
        <input type="hidden" name="expense_client_id" value="<?php echo $client_id; ?>" />
    <?php } else { ?>
        <div class="form-group">
            <label for="expense_client_id" class=" col-md-3"><?php echo lang('supplier'); ?></label>
            <div class="col-md-9">
                <?php
                // echo form_dropdown("expense_client_id", $clients_dropdown, array($model_info->client_id), "class='select2 validate-hidden' id='expense_client_id' data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
                echo form_dropdown("expense_client_id", $clients_dropdown, $model_info->client_id, "class='select2 validate-hidden' id='expense_client_id'");

                ?>
            </div>
        </div>
    <?php } ?>
    <?php if ($invoice_id) { ?>
        <input type="hidden" name="expense_invoice_id" value="<?php echo $invoice_id; ?>" />
    <?php } else { ?>
        <div class="form-group">
            <label for="expense_invoice_id" class=" col-md-3"><?php echo lang('invoice'); ?></label>
            <div class="col-md-9" id="invoice-porject-dropdown-section">
                <?php
                echo form_input(array(
                    "id" => "expense_invoice_id",
                    "name" => "expense_invoice_id",
                    "value" => $model_info->invoice_id,
                    "class" => "form-control",
                    "placeholder" => lang('invoice')
                ));
                ?>
            </div>
        </div>
    <?php } ?>


    <div class="form-group">
        <label for="invoice_payment_method_id" class=" col-md-3"><?php echo lang('payment_method'); ?></label>
        <div class="col-md-9">
            <?php
            echo form_dropdown("invoice_payment_method_id", $payment_methods_dropdown, array($model_info->payment_method_id), "class='select2'");
            ?>
        </div>
    </div>






        <div class="form-group">
            <label for="title" class=" col-md-3"><?php echo lang('amount'); ?></label>
            <div class=" col-md-9">
                <?php
                echo form_input(array(
                    "id" => "amount",
                    "name" => "amount",
                    "value" => $model_info->amount ? to_decimal_format($model_info->amount) : "",
                    "class" => "form-control",
                    "placeholder" => lang('amount'),
                    "autofocus" => true,
                    "data-rule-required" => true,
                    "data-msg-required" => lang("field_required"),
                ));
                ?>
            </div>
        </div>
        <div class=" form-group">
            <label for="title" class=" col-md-3"><?php echo lang('title'); ?></label>
            <div class="col-md-9">
                <?php
                echo form_input(array(
                    "id" => "title",
                    "name" => "title",
                    "value" => $model_info->title,
                    "class" => "form-control",
                    "placeholder" => lang("title")
                ));
                ?>
            </div>
        </div>
        <div class="form-group">
            <label for="description" class=" col-md-3"><?php echo lang('description'); ?></label>
            <div class=" col-md-9">
                <?php
                echo form_textarea(array(
                    "id" => "description",
                    "name" => "description",
                    "value" => $model_info->description ? $model_info->description : "",
                    "class" => "form-control",
                    "placeholder" => lang('description'),
                    "data-rich-text-editor" => true
                ));
                ?>

            </div>
        </div>

        <!-- <div class="form-group">
            <label for="expense_project_id" class=" col-md-3"><?php echo lang('project'); ?></label>
            <div class=" col-md-9">
                <?php
                echo form_dropdown("expense_project_id", $projects_dropdown, $model_info->project_id, "class='select2 validate-hidden' id='expense_project_id'");
                ?>
            </div>
        </div>

        <div class="form-group">
            <label for="expense_user_id" class=" col-md-3"><?php echo lang('team_member'); ?></label>
            <div class="col-md-9">
                <?php
                echo form_dropdown("expense_user_id", $members_dropdown, $model_info->user_id, "class='select2 validate-hidden' id='expense_user_id'");
                ?>
            </div>
        </div>

        <div class="form-group">
            <label for="tax_id" class=" col-md-3"><?php echo lang('tax'); ?></label>
            <div class="col-md-9">
                <?php
                echo form_dropdown("tax_id", $taxes_dropdown, array($model_info->tax_id), "class='select2'");
                ?>
            </div>
        </div>
        
        <div class="form-group">
            <label for="tax_id" class=" col-md-3"><?php echo lang('second_tax'); ?></label>
            <div class="col-md-9">
                <?php
                echo form_dropdown("tax_id2", $taxes_dropdown, array($model_info->tax_id2), "class='select2'");
                ?>
            </div>
        </div> -->

        <div class="form-group">
            <label class=" col-md-3"></label>
            <div class="col-md-9">
                <?php
                $this->load->view("includes/file_list", array("files" => $model_info->files));
                ?>
            </div>
        </div>

        <?php $this->load->view("custom_fields/form/prepare_context_fields", array("custom_fields" => $custom_fields, "label_column" => "col-md-3", "field_column" => " col-md-9")); ?> 

        <?php $this->load->view("includes/dropzone_preview"); ?>    
        <div class="modal-footer">
            <div class="row">
                <button class="btn btn-default upload-file-button pull-left btn-sm round" type="button" style="color:#7988a2"><i class='fa fa-camera'></i> <?php echo lang("upload_file"); ?></button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> <?php echo lang('close'); ?></button>
                <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle"></span> <?php echo lang('save'); ?></button>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {


        var uploadUrl = "<?php echo get_uri("expenses/upload_file"); ?>";
        var validationUrl = "<?php echo get_uri("expenses/validate_expense_file"); ?>";

        var dropzone = attachDropzoneWithForm("#expense-dropzone", uploadUrl, validationUrl);

        $("#expense-form").appForm({
            onSuccess: function (result) {
                if (typeof $EXPENSE_TABLE !== 'undefined') {
                    $EXPENSE_TABLE.appTable({newData: result.data, dataId: result.id});
                } else {
                    location.reload();
                }
            }
        });
        
        setDatePicker("#expense_date");

        $("#expense-form .select2").select2();


        $("#expense_client_id").select2().on("change", function () {
            var client_id = $(this).val();
            if ($(this).val()) {
                $('#expense_invoice_id').select2("destroy");
                $("#expense_invoice_id").hide();
                appLoader.show({container: "#invoice-porject-dropdown-section"});
                $.ajax({
                    url: "<?php echo get_uri("expenses/get_invoice_suggestion") ?>" + "/" + client_id,
                    dataType: "json",
                    success: function (result) {
                        $("#expense_invoice_id").show().val("");
                        $('#expense_invoice_id').select2({data: result});
                        appLoader.hide();
                    }
                });
            }
        });

        $('#expense_invoice_id').select2({data: <?php echo json_encode($invoices_suggestion); ?>});

        if ("<?php echo $invoice_id; ?>") {
            $("#expense_client_id").select2("readonly", true);
        }
    });
</script>