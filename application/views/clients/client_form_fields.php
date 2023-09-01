<input type="hidden" name="id" value="<?php echo $model_info->id; ?>" />
<input type="hidden" name="view" value="<?php echo isset($view) ? $view : ""; ?>" />
<div class="form-group">
    <label for="company_name" class="<?php echo $label_column; ?>"><?php echo lang('company_name'); ?><small class="req"> *</small></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "company_name",
            "name" => "company_name",
            "value" => $model_info->company_name,
            "class" => "form-control",
            "placeholder" => lang('company_name'),
            "autofocus" => true,
            "data-rule-required" => true,
            "data-msg-required" => lang("field_required"),
        ));
        ?>
    </div>
</div>
<!-- <div class="form-group">
    <label for="client_name" class="<?php echo $label_column; ?>"><?php echo lang('client_name'); ?><small class="req"> *</small></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "client_name",
            "name" => "client_name",
            "value" => $model_info->client_name,
            "class" => "form-control",
            "placeholder" => lang('client_name'),
            "data-rule-required" => true,
            "data-msg-required" => lang("field_required"),
            ));
        ?>
    </div>
</div> -->
<div class="form-group">
    <label for="phone" class="<?php echo $label_column; ?>"><?php echo lang('phone'); ?><small class="req"> *</small></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "phone",
            "name" => "phone",
            "value" => $model_info->phone,
            "class" => "form-control",
            "placeholder" => lang('phone'),
            "data-rule-number" => true,
            "data-rule-minlength" => 10,
            "data-rule-maxlength" => 10,
            "data-rule-required" => true,
            "data-msg-required" => lang("field_required"),
            
        ));
        ?>
    </div>
</div>
   <div class="form-group">
        <label for="state_id" class="<?php echo $label_column; ?>"><?php echo lang('state'); ?><small class="req"> *</small></label>
        <div class="<?php echo $field_column; ?>">
            <?php
            echo form_dropdown("state_id", $state_dropdown, array($model_info->state_id), "class='select2 validate-hidden' id='state_id' data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
                ?>
        </div>
    </div>

     
    <div class="form-group">
        <label for="city_id" class="<?php echo $label_column; ?>"><?php echo lang('city'); ?><small class="req"> *</small></label>
        <div class="<?php echo $field_column; ?>" id="invoice-porject-dropdown-section">
            <?php
            echo form_input(array(
                "id" => "invoice_project_id",
                "name" => "city_id",
                "value" => $model_info->city_id,
                "class" => "form-control",
                "placeholder" => lang('city'),
                "data-rule-required" => true,
                "data-msg-required" => lang("field_required"),
            ));
            ?>
        </div>
    </div>
<!-- <div class="form-group">
    <label for="email" class="<?php echo $label_column; ?>"><?php echo lang('email'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "email",
            "name" => "email",
            "class" => "form-control",
            "value" => $model_info->email,
            "placeholder" => lang('email'),
            "autocomplete" => "off",
            "data-rule-email" => true,
            "data-msg-email" => lang("enter_valid_email"),
           
            ));
        ?>
    </div>
</div> -->



<!-- 
<?php if ($client_id && !$project_id) { ?>
        <input type="hidden" name="invoice_client_id" value="<?php echo $client_id; ?>" />
    <?php } else { ?>
        <div class="form-group">
            <label for="invoice_client_id" class=" col-md-3"><?php echo lang('client'); ?></label>
            <div class="col-md-9">
                <?php
                echo form_dropdown("invoice_client_id", $package_dropdown, array($model_info->client_id), "class='select2 validate-hidden' id='invoice_client_id' data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
                ?>
            </div>
        </div>
    <?php } ?> -->


<!-- 
 <div class="form-group">
    <label for="groups" class="<?php echo $label_column; ?>"><?php echo lang('client_groups'); ?></label>
    <div class="<?php echo $field_column; ?>">
            <?php
            echo form_input(array(
                "id" => "group_ids",
                "name" => "group_ids",
                "value" => $model_info->group_ids,
                "class" => "form-control",
                "placeholder" => lang('client_groups')
            ));
            ?>
    </div>
</div>  -->
<!-- <div class="form-group">
    <label for="vat_number" class="<?php echo $label_column; ?>"><?php echo lang('vat_number'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "vat_number",
            "name" => "vat_number",
            "value" => $model_info->vat_number,
            "class" => "form-control",
            "placeholder" => lang('vat_number')
        ));
        ?>
    </div>
</div> -->



<!-- 
<div class="form-group">
        <center><label><h4><?php echo lang('shipping_details'); ?></h4></label></center>
        
</div> 
<div class="form-group">
    <label for="scompany_name" class="<?php echo $label_column; ?>"><?php echo lang('company_name'); ?><small class="req"> *</small></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "scompany_name",
            "name" => "scompany_name",
            "value" => $model_info->scompany_name,
            "class" => "form-control",
            "placeholder" => lang('company_name'),
            "autofocus" => true,
            "data-rule-required" => true,
            "data-msg-required" => lang("field_required"),
        ));
        ?>
    </div>
</div>
 -->
<!-- <div class="form-group">
    <label for="address" class="<?php echo $label_column; ?>"><?php echo lang('address'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_textarea(array(
            "id" => "address",
            "name" => "address",
            "value" => $model_info->address ? $model_info->address : "",
            "class" => "form-control",
            "placeholder" => lang('address'),
            //  "data-rule-required" => true,
            // "data-msg-required" => lang("field_required")
        ));
        ?>

    </div>
</div> -->
<!-- <div class="form-group">
    <label for="city" class="<?php echo $label_column; ?>"><?php echo lang('city'); ?><small class="req"> *</small></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "city",
            "name" => "city",
            "value" => $model_info->city,
            "class" => "form-control",
            "placeholder" => lang('city'),
             "data-rule-required" => true,
            "data-msg-required" => lang("field_required")
        ));
        ?>
    </div>
</div>
<div class="form-group">
    <label for="state" class="<?php echo $label_column; ?>"><?php echo lang('state'); ?><small class="req"> *</small></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "state",
            "name" => "state",
            "value" => $model_info->state,
            "class" => "form-control",
            "placeholder" => lang('state'),
             "data-rule-required" => true,
            "data-msg-required" => lang("field_required")
        ));
        ?>
    </div>
</div> -->
<!-- <div class="form-group">
    <label for="zip" class="<?php echo $label_column; ?>"><?php echo lang('zip'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "zip",
            "name" => "zip",
            "value" => $model_info->zip,
            "class" => "form-control",
            "placeholder" => lang('zip'),
            //  "data-rule-required" => true,
            // "data-msg-required" => lang("field_required")
        ));
        ?>
    </div>
</div> -->
<div class="form-group">
    <!-- <label for="sphone" class="<?php echo $label_column; ?>"><?php echo lang('phone'); ?><small class="req"> *</small></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "sphone",
            "name" => "sphone",
            "value" => $model_info->sphone,
            "class" => "form-control",
            "placeholder" => lang('phone'),
             "data-rule-required" => true,
             "data-rule-number" => true,
            "data-rule-minlength" => 10,
            "data-rule-maxlength" => 10,
            "data-msg-required" => lang("field_required"),

            
        ));
        ?>
    </div>
    <div class="form-group">
            <label class=" col-md-3"></label>
            <div class="col-md-9">
                <?php
                $this->load->view("includes/file_list", array("files" => $model_info->files));
                ?>
            </div>
        </div> -->

        <?php $this->load->view("custom_fields/form/prepare_context_fields", array("custom_fields" => $custom_fields, "label_column" => "col-md-3", "field_column" => " col-md-9")); ?> 


    
       <!--  <div class="form-group">
            <center><label><h4><?php echo lang('login_details'); ?></h4></label></center>
        </div> -->

        

        <!-- <div class="form-group">
            <label for="email" class="<?php echo $label_column; ?>"><?php echo lang('email'); ?><small class="req"> *</small></label>
            <div class="<?php echo $field_column; ?>">
                <?php
                echo form_input(array(
                        "id" => "email",
                        "name" => "email",
                        "value" => $model_info->email,
                        "class" => "form-control",
                        "autofocus" => true,
                        "placeholder" => lang('email'),
                        "data-rule-email" => true,
                        "data-msg-email" => lang("enter_valid_email"),
                        "data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
                ));
                ?>
            </div>
        </div> -->
        <?php if (!$model_info->company_name) { ?>

        <!-- <div class="form-group">
            <label for="password" class="<?php echo $label_column; ?>"><?php echo lang('password'); ?><small class="req"> *</small></label>
            <div class="<?php echo $field_column; ?>">
                <?php
                echo form_password(array(
                    "id" => "password",
                    "name" => "password",
                    "value" => $model_infos->password,
                    "class" => "form-control",
                    "data-rule-required" => true,
                    "placeholder" => lang('password'),
                    "data-msg-required" => lang("field_required"),
                    "data-rule-minlength" => 6,
                    "data-msg-minlength" => lang("enter_minimum_6_characters"),
                    "autocomplete" => "off",
                    "style" => "z-index:auto;"
                ));
                ?>
            </div>
        </div> -->
        <!-- <div class="form-group">
            <label for="retype_password" class="<?php echo $label_column; ?>"><?php echo lang('retype_password'); ?><small class="req"> *</small></label>
                <div class="<?php echo $field_column; ?>">
                    <?php
                    echo form_password(array(
                        "id" => "retype_password",
                        "name" => "retype_password",
                        "value" => $model_infos->password,
                        "class" => "form-control",
                        "autocomplete" => "off",
                        "placeholder" => lang('retype_password'),
                        "style" => "z-index:auto;",
                        "data-rule-equalTo" => "#password",
                        "data-msg-equalTo" => lang("enter_same_value")
                    ));
                    ?>
                </div>
        </div> -->
        <!-- <div class="form-group">
                                <label for="gender" class="<?php echo $label_column; ?>"><?php echo lang('gender'); ?></label>
                                <div class="<?php echo $field_column; ?>">
                                    <?php
                                    echo form_radio(array(
                                        "id" => "gender_male",
                                        "name" => "gender",
                                            ), "male", true);
                                    ?>
                                    <label for="gender_male" class="mr15"><?php echo lang('male'); ?></label> <?php
                                    echo form_radio(array(
                                        "id" => "gender_female",
                                        "name" => "gender",
                                            ), "female", false);
                                    ?>
                                    <label for="gender_female" class=""><?php echo lang('female'); ?></label>
                                </div>
                            </div> -->
                             <?php } ?>
</div>


<!-- 
<?php $this->load->view("custom_fields/form/prepare_context_fields", array("custom_fields" => $custom_fields, "label_column" => $label_column, "field_column" => $field_column)); ?> 

<?php if ($this->login_user->is_admin && get_setting("module_invoice")) { ?>
    <div class="form-group">
        <label for="disable_online_payment" class="<?php echo $label_column; ?> col-xs-8 col-sm-6"><?php echo lang('disable_online_payment'); ?>
            <span class="help" data-container="body" data-toggle="tooltip" title="<?php echo lang('disable_online_payment_description') ?>"><i class="fa fa-question-circle"></i></span>
        </label>
        <div class="<?php echo $field_column; ?> col-xs-4 col-sm-6">
            <?php
            echo form_checkbox("disable_online_payment", "1", $model_info->disable_online_payment ? true : false, "id='disable_online_payment'");
            ?>                       
        </div>
    </div>
<?php } ?> -->

<script type="text/javascript">
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();

<?php if (isset($currency_dropdown)) { ?>
            if ($('#currency').length) {
                $('#currency').select2({data: <?php echo json_encode($currency_dropdown); ?>});
            }
<?php } ?>

<?php if (isset($groups_dropdown)) { ?>
            $("#group_ids").select2({
                multiple: true,
                data: <?php echo json_encode($groups_dropdown); ?>
            });
<?php } ?>


$('#invoice_project_id').select2({data: <?php echo json_encode($projects_suggestion); ?>});
        $("#state_id").select2().on("change", function () {
            var client_id = $(this).val();
            if ($(this).val()) {
                $('#invoice_project_id').select2("destroy");
                $("#invoice_project_id").hide();
                appLoader.show({container: "#invoice-porject-dropdown-section"});
                $.ajax({
                    url: "<?php echo get_uri("clients/get_city_suggestion") ?>" + "/" + client_id,
                    dataType: "json",
                    success: function (result) {
                        $("#invoice_project_id").show().val("");
                        $('#invoice_project_id').select2({data: result});
                        appLoader.hide();
                    }
                });
            }
        });





    });
</script>