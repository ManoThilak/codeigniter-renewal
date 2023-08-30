<input type="hidden" name="id" value="<?php echo $model_info->id; ?>" />
<input type="hidden" name="view" value="<?php echo isset($view) ? $view : ""; ?>" />
<!-- <div class="form-group">
    <label for="client_id" class="<?php echo $label_column; ?>"><?php echo lang('client_name'); ?><small class="req"> *</small></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_dropdown("client_id", $clients_dropdown, array($model_info->client_id), "class='select2 validate-hidden' id='client_id' data-rule-required='true' data-msg-required='" . lang('field_required') . "'");
                ?>
    </div>
</div> -->
<div class="form-group">
    <label for="customer_name" class="<?php echo $label_column; ?>"><?php echo lang('customer_name'); ?><small class="req"> *</small></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "customer_name",
            "name" => "customer_name",
            "value" => $model_info->customer_name,
            "class" => "form-control",
            "placeholder" => lang('customer_name'),
            "autofocus" => true,
            "data-rule-required" => true,
            "data-msg-required" => lang("field_required"),
        ));
        ?>
    </div>
</div>
<!-- <div class="form-group">
    <label for="client_name" class="<?php echo $label_column; ?>"><?php echo lang('client_name'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "client_name",
            "name" => "client_name",
            "value" => $model_info->client_name,
            "class" => "form-control",
            "placeholder" => lang('client_name'),
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
            "data-rule-required" => true,
            "data-rule-number" => true,
            "data-rule-minlength" => 10,
            "data-rule-maxlength" => 10,
            "data-msg-required" => lang("field_required"),

            
        ));
        ?>
    </div>
</div>
<!-- <div class=" form-group">
    <label for="next_followupdate" class="<?php echo $label_column; ?>"><?php echo lang('next_followupdate'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
            echo form_input(array(
                "id" => "next_followupdate",
                "name" => "next_followupdate",
                "value" => $model_info->next_followupdate,
                "class" => "form-control",
                "placeholder" => lang('next_followupdate')
                
            ));
        ?>
    </div>
</div>
<div class="form-group">
    <label for="comments" class="<?php echo $label_column; ?>"><?php echo lang('comments'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_textarea(array(
            "id" => "comments",
            "name" => "comments",
            "value" => $model_info->comments ? $model_info->comments : "",
            "class" => "form-control",
            "placeholder" => lang('comments')
        ));
        ?>

    </div>
</div> -->
<?php $gift_for =  $model_info->giftfor_id ;?>
<div class="form-group">
    <label for="giftfor_id" class="<?php echo $label_column; ?>"><?php echo lang('gift_for'); ?><small class="req"> *</small></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_dropdown("giftfor_id", $giftfor_dropdown, array($model_info->giftfor_id), "class='select2 validate-hidden' id='giftfor_id'  data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
                ?>
    </div>
</div>
 <div class=" form-group">
    <label for="birth_date" class="<?php echo $label_column; ?>"><?php echo lang('birth_date'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
            echo form_input(array(
                "id" => "birth_date",
                "name" => "birth_date",
                "value" => $model_info->birth_date,
                
                "class" => "form-control",
                "readonly" => "true",
                "data-rule-required" => true,
                "data-msg-required" => lang("field_required"),
                "autocomplete" => "off",
                "placeholder" => lang('birth_date')

                


            ));
        ?>
    </div>
</div> 
<div class="form-group">
    <label for="anniversary_date" class="<?php echo $label_column; ?>"><?php echo lang('anniversary_date'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
                "id" => "anniversary_date",
                "name" => "anniversary_date",
                "value" => $model_info->anniversary_date,
                "class" => "form-control",
                "readonly" => "true",
                "data-rule-required" => true,
                "data-msg-required" => lang("field_required"),
                "placeholder" => lang('anniversary_date'),
                "autocomplete" => "off"
            ));
            ?>
        </div>
    </div>

<div class="form-group">
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
</div>

  
        <div class="form-group">
            <label for="religion_id" class=" col-md-3"><?php echo lang('religion'); ?><small class="req"> *</small></label>
            <div class="col-md-9">
                <?php
                echo form_dropdown("religion_id", $religion_dropdown, array($model_info->religion_id), "class='select2 validate-hidden' id='religion_id' data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
                ?>
            </div>
        </div>
  
        <div class="form-group">
            <label for="sub_religion_id" class=" col-md-3"><?php echo lang('sub_religion'); ?><small class="req"> *</small></label>
            <div class="col-md-9" id="invoice-porject-dropdown-section">
                <?php
                echo form_input(array(
                    "id" => "sub_religion_id",
                    "name" => "sub_religion_id",
                    "value" => $model_info->sub_religion_id,
                    "class" => "form-control",
                    "placeholder" => lang('sub_religion'),
                    "data-rule-required" => true,
                    "data-msg-required" => lang("field_required")
                ));
                ?>
            </div>
        </div>

        <div class="form-group">
            <label for="gift_id" class=" col-md-3"><?php echo lang('gift'); ?><small class="req"> *</small></label>
            <div class="col-md-9" id="gift-porject-dropdown-section">
                <?php
                echo form_input(array(
                    "id" => "gift_id",
                    "name" => "gift_id",
                    "value" => $model_info->gift_id,
                    "class" => "form-control",
                    "placeholder" => lang('gift'),
                    "data-rule-required" => true,
                    "data-msg-required" => lang("field_required")
                ));
                ?>
            </div>
        </div>
   
<!-- <div class="form-group">
    <label for="package" class="<?php echo $label_column; ?>"><?php echo lang('package'); ?></label>
        <div class="<?php echo $field_column; ?>">
            <?php
            echo form_input(array(
                "id" => "package",
                "name" => "package",
                "value" => $model_info->package,
                "class" => "form-control",
                "placeholder" => lang('package')
            ));
            ?>
        </div>
</div>  -->
<!-- <div class="form-group">
    <label for="package_id" class="<?php echo $label_column; ?>"><?php echo lang('package_groups'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_dropdown("package_id", $package_dropdown, array($model_info->package_id), "class='select2 validate-hidden' id='package_id'");
                ?>
    </div>
</div>
<div class="form-group">
    <label for="package_type_id" class="<?php echo $label_column; ?>"><?php echo lang('package_type'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_dropdown("package_type_id", $packagetype_dropdown, array($model_info->package_type_id), "class='select2 validate-hidden' id='package_type_id'");
                ?>
    </div>
</div>

<div class="form-group">
    <label for="salesmanager_id" class="<?php echo $label_column; ?>"><?php echo lang('salesmanager'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_dropdown("salesmanager_id", $salesmanager_dropdown, array($model_info->salesmanager_id), "class='select2 validate-hidden' id='salesmanager_id'");
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
<div class="form-group">
    <label for="address" class="<?php echo $label_column; ?>"><?php echo lang('address'); ?><small class="req"> *</small></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_textarea(array(
            "id" => "address",
            "name" => "address",
            "value" => $model_info->address ? $model_info->address : "",
            "class" => "form-control",
            "placeholder" => lang('addr'),
             "data-rule-required" => true,
            "data-msg-required" => lang("field_required")
        ));
        ?>

    </div>
</div>
<div class="form-group">
    <label for="sphone" class="<?php echo $label_column; ?>"><?php echo lang('phone'); ?><small class="req"> *</small></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "sphone",
            "name" => "sphone",
            "value" => $model_info->sphone,
            "class" => "form-control",
            "placeholder" => lang('phone'),
             "data-rule-required" => true,
            "data-msg-required" => lang("field_required"),
            
        ));
        ?>
    </div>
</div> -->
<div class="form-group">
    <label for="address" class="<?php echo $label_column; ?>"><?php echo lang('address'); ?><small class="req"> *</small></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_textarea(array(
            "id" => "address",
            "name" => "address",
            "value" => $model_info->address ? $model_info->address : "",
            "class" => "form-control",
            "placeholder" => lang('address'),
             "data-rule-required" => true,
            "data-msg-required" => lang("field_required"),
            "data-rule-required" => true,
            "data-msg-required" => lang("field_required"),
        ));
        ?>

    </div>
</div>

 <div class="form-group">
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
            "data-msg-required" => lang("field_required"),
        ));
        ?>
    </div>
</div>
<div class="form-group">
    <label for="landmark" class="<?php echo $label_column; ?>"><?php echo lang('landmark'); ?><small class="req"> *</small></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "landmark",
            "name" => "landmark",
            "value" => $model_info->landmark,
            "class" => "form-control",
            "placeholder" => lang('landmark'),
            "data-rule-required" => true,
            "data-msg-required" => lang("field_required"),
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
            "data-msg-required" => lang("field_required"),
        ));
        ?>
    </div>
</div>
<div class="form-group">
    <label for="zip" class="<?php echo $label_column; ?>"><?php echo lang('zip'); ?><small class="req"> *</small></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "zip",
            "name" => "zip",
            "value" => $model_info->zip,
            "class" => "form-control",
            "placeholder" => lang('zip'),
            "data-rule-required" => true,
            "data-msg-required" => lang("field_required"),
        ));
        ?>
    </div>
</div>
<div class="form-group">
    <label for="complete_id" class="<?php echo $label_column; ?>"><?php echo lang('status'); ?><small class="req"> *</small></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_dropdown("complete_id", $complete_dropdown, array($model_info->complete_id), "class='select2 validate-hidden' id='complete_id'");
                ?>
    </div>
</div>
<!-- <div class="form-group">
    <label for="country" class="<?php echo $label_column; ?>"><?php echo lang('country'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "country",
            "name" => "country",
            "value" => $model_info->country,
            "class" => "form-control",
            "placeholder" => lang('country')
        ));
        ?>
    </div>
</div> -->

<!-- <div class="form-group">
    <label for="website" class="<?php echo $label_column; ?>"><?php echo lang('website'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "website",
            "name" => "website",
            "value" => $model_info->website,
            "class" => "form-control",
            "placeholder" => lang('website')
        ));
        ?>
    </div>
</div> -->



<!-- 
<?php
if ($this->login_user->is_admin && get_setting("module_invoice")) { ?>
    <div class="form-group">
        <label for="currency" class="<?php echo $label_column; ?>"><?php echo lang('currency'); ?></label>
        <div class="<?php echo $field_column; ?>">
            <?php
            echo form_input(array(
                "id" => "currency",
                "name" => "currency",
                "value" => $model_info->currency,
                "class" => "form-control",
                "placeholder" => lang('keep_it_blank_to_use_default') . " (" . get_setting("default_currency") . ")"
            ));
            ?>
        </div>
    </div>    
    <div class="form-group">
        <label for="currency_symbol" class="<?php echo $label_column; ?>"><?php echo lang('currency_symbol'); ?></label>
        <div class="<?php echo $field_column; ?>">
            <?php
            echo form_input(array(
                "id" => "currency_symbol",
                "name" => "currency_symbol",
                "value" => $model_info->currency_symbol,
                "class" => "form-control",
                "placeholder" => lang('keep_it_blank_to_use_default') . " (" . get_setting("currency_symbol") . ")"
            ));
            ?>
        </div>
    </div>

<?php } ?> -->
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

//if ("<?php echo $client_id; ?>") {
            $("#client_id").select2("readonly", true);
        //}

$("#client_id,#complete_id").select2().on("change", function () {
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

setDatePicker("#next_followupdate");
// <?php if ($gift_for){ ?>
// setDatePicker("#anniversary_date,#birth_date");
// <?php } ?>


<?php if ($gift_for == "1") { ?>
    setDatePicker("#birth_date");
 <?php  } else if ($gift_for == "2") { ?>
    setDatePicker("#anniversary_date");
<?php   } else if ($gift_for == "3") { ?>
     setDatePicker("#anniversary_date,#birth_date");
<?php   } ?>

$("#giftfor_id").select2().on("change", function () {
            var giftfor_id = $(this).val();
            if ($(this).val()) {
                $("#giftfor_id").select2("readonly", true);
                if (giftfor_id == "1") {
                    setDatePicker("#birth_date");
                    $("#anniversary_date").show().val("");

                   // $("#anniversary_date").select2("readonly", true);
                } else if (giftfor_id == "2") {
                    setDatePicker("#anniversary_date");
                    $("#birth_date").show().val("");

                   // $("#birth_date").select2("readonly", true);
                } else if (giftfor_id == "3") {
                    setDatePicker("#anniversary_date,#birth_date");
                }
                
                // $('#sub_religion_id').select2("destroy");
                // $("#sub_religion_id").hide();
                // appLoader.show({container: "#invoice-porject-dropdown-section"});
                // $.ajax({
                //     url: "<?php echo get_uri("sub_religion/get_subreligion_suggestion") ?>" + "/" + client_id,
                //     dataType: "json",
                //     success: function (result) {
                //         $("#sub_religion_id").show().val("");
                //         $('#sub_religion_id').select2({data: result});
                //         appLoader.hide();
                //     }
                // });
            }
        });



$("#religion_id").select2().on("change", function () {
            var client_id = $(this).val();
            if ($(this).val()) {
                $('#sub_religion_id').select2("destroy");
                $("#sub_religion_id").hide();
                appLoader.show({container: "#invoice-porject-dropdown-section"});
                $.ajax({
                    url: "<?php echo get_uri("sub_religion/get_subreligion_suggestion") ?>" + "/" + client_id,
                    dataType: "json",
                    success: function (result) {
                        $("#sub_religion_id").show().val("");
                        $('#sub_religion_id').select2({data: result});
                        appLoader.hide();
                    }
                });
            }
        });

        $('#sub_religion_id').select2({data: <?php echo json_encode($projects_suggestion); ?>}).on("change", function () {
            var sub_religion_id = $(this).val();
            //console.log(sub_religion_id);
            if ($(this).val()) {
                $('#gift_id').select2("destroy");
                $("#gift_id").hide();
                appLoader.show({container: "#gift-porject-dropdown-section"});
                $.ajax({
                    url: "<?php echo get_uri("gift_master/get_gift_suggestion") ?>" + "/" + sub_religion_id,
                    dataType: "json",
                    success: function (result) {
                        $("#gift_id").show().val("");
                        $('#gift_id').select2({data: result});
                        appLoader.hide();
                    }
                });
            }
        });



        // $("#sub_religion_id").select2().on("change", function () {
        //     var sub_religion_id = $(this).val();
        //     console.log(sub_religion_id);
        //     if ($(this).val()) {
        //         $('#gift_id').select2("destroy");
        //         $("#gift_id").hide();
        //         appLoader.show({container: "#gift-porject-dropdown-section"});
        //         $.ajax({
        //             url: "<?php echo get_uri("gift_master/get_gift_suggestion") ?>" + "/" + sub_religion_id,
        //             dataType: "json",
        //             success: function (result) {
        //                 $("#gift_id").show().val("");
        //                 $('#gift_id').select2({data: result});
        //                 appLoader.hide();
        //             }
        //         });
        //     }
        // });

        $('#gift_id').select2({data: <?php echo json_encode($gifts_suggestion); ?>});
        





    });
</script>