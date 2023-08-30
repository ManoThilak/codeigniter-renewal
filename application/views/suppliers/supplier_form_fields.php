

<input type="hidden" name="id" value="<?php echo $model_info->id; ?>" />
<input type="hidden" name="view" value="<?php echo isset($view) ? $view : ""; ?>" />
<div class="form-group">
    <label for="company_name" class="<?php echo $label_column; ?>"><?php  echo lang('suppliers'); ?> <?php  echo lang('title'); ?> </label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "company_name",
            "name" => "company_name",
            "value" => $model_info->company_name,
            "class" => "form-control",
            "placeholder" => lang('title'),
            "autofocus" => true,
            "data-rule-required" => true,
            "data-msg-required" => lang("field_required"),
        ));
        ?>
    </div>
</div>

<div class="form-group">
    <label for="category_id" class="<?php echo $label_column; ?>"><?php echo lang('category'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
            echo form_dropdown("category_id", $category_dropdown, $model_info->category_id, "class='select2 validate-hidden' id='category_id'");
        ?>
    </div>
</div>
<div class="form-group">
    <label for="sqft" class="<?php echo $label_column; ?>"><?php echo lang('sqft'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "sqft",
            "name" => "sqft",
            "value" => $model_info->sqft,
            "class" => "form-control",
            "placeholder" => lang('sqft')
        ));
        ?>
    </div>
</div>
<div class="form-group">
    <label for="city_id" class="<?php echo $label_column; ?>"><?php echo lang('city'); ?></label>
    <div class="<?php echo $field_column; ?>">
       
        <?php
                echo form_dropdown("city_id", $city_dropdown, array($model_info->city_id), "class='select2 validate-hidden' id='city_id' data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
                ?>
    </div>
</div>

<!-- <div class="form-group">
    <label for="area_id" class="<?php echo $label_column; ?>"><?php echo lang('area'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
            echo form_dropdown("area_id", $area_dropdown, $model_info->area_id, "class='select2 validate-hidden' id='area_id'");
        ?>
    </div>
</div> -->
 <div class="form-group">
            <label for="area_id" class="<?php echo $label_column; ?>"><?php echo lang('area'); ?></label>
            <div class="<?php echo $field_column; ?>" id="invoice-porject-dropdown-section">
                <?php
                echo form_input(array(
                    "id" => "area_id",
                    "name" => "area_id",
                    "value" => $model_info->area_id,
                    "class" => "form-control",
                    "placeholder" => lang('area')
                ));
                ?>
            </div>
        </div>

 <div class="form-group">
    <label for="address" class="<?php echo $label_column; ?>"><?php echo lang('address'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_textarea(array(
            "id" => "address",
            "name" => "address",
            "value" => $model_info->address ? $model_info->address : "",
            "class" => "form-control",
            "placeholder" => lang('address')
        ));
        ?>

    </div>
</div> 
<!-- <div class="form-group">
    <label for="city" class="<?php echo $label_column; ?>"><?php echo lang('city'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "city",
            "name" => "city",
            "value" => $model_info->city,
            "class" => "form-control",
            "placeholder" => lang('city')
        ));
        ?>
    </div>
</div> -->
<!-- <div class="form-group">
    <label for="state" class="<?php echo $label_column; ?>"><?php echo lang('state'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "state",
            "name" => "state",
            "value" => $model_info->state,
            "class" => "form-control",
            "placeholder" => lang('state')
        ));
        ?>
    </div>
</div>
<div class="form-group">
    <label for="zip" class="<?php echo $label_column; ?>"><?php echo lang('zip'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "zip",
            "name" => "zip",
            "value" => $model_info->zip,
            "class" => "form-control",
            "placeholder" => lang('zip')
        ));
        ?>
    </div>
</div> -->

<div class="form-group">
    <label for="partyname" class="<?php echo $label_column; ?>"><?php echo lang('partyname'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "partyname",
            "name" => "partyname",
            "value" => $model_info->partyname,
            "class" => "form-control",
            "placeholder" => lang('partyname')
        ));
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
<div class="form-group">
    <label for="phone" class="<?php echo $label_column; ?>"><?php echo lang('phone_1'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "phone",
            "name" => "phone",
            "value" => $model_info->phone,
            "class" => "form-control",
            "placeholder" => lang('phone'),
            "type" => "number",
            "data-rule-number" => true,
            "data-rule-minlength" => 10,
            "data-rule-maxlength" => 10
        ));
        ?>
    </div>
</div>

<div class="form-group">
    <label for="phone1" class="<?php echo $label_column; ?>"><?php echo lang('phone_2'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "phone1",
            "name" => "phone1",
            "value" => $model_info->phone1,
            "class" => "form-control",
            "placeholder" => lang('phone_1'),
            "type" => "number",
            "data-rule-number" => true,
            "data-rule-minlength" => 10,
            "data-rule-maxlength" => 10
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
</div>

<!-- <div class="form-group">
    <label for="latitude" class="<?php echo $label_column; ?>"><?php echo lang('latitude'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "latitude",
            "name" => "latitude",
            "value" => "",
            "class" => "form-control",
            "placeholder" => lang('latitude')
        ));
        ?>
    </div>
</div> -->


<?php if ($model_info->latitude) { ?>
        
    <?php } else { ?>
        <div class="form-group">
    <label for="latitude" class="<?php echo $label_column; ?>"><?php echo lang('latitude'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "latitude",
            "name" => "latitude",
            "value" => "",
            "class" => "form-control",
            "readonly" => "TRUE",
            "placeholder" => lang('latitude')
        ));
        ?>
    </div>
</div>
    <?php } ?>





<?php if ($model_info->longitude) { ?>
        
    <?php } else { ?>
<div class="form-group">
    <label for="longitude" class="<?php echo $label_column; ?>"><?php echo lang('longitude'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "longitude",
            "name" => "longitude",
            "value" => "",
            "class" => "form-control",
            "readonly" => "TRUE",
            "placeholder" => lang('longitude')
        ));
        ?>
    </div>
</div>
<?php } ?>
<div class="form-group">
    <label for="status" class="<?php echo $label_column; ?>"><?php echo lang('status'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
            echo form_dropdown("status", $status_dropdown, $model_info->status, "class='select2 validate-hidden' id='status'");
        ?>
    </div>
</div>
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

<?php if ($this->login_user->user_type === "staff") { ?>
    <!-- <div class="form-group">
        <label for="groups" class="<?php echo $label_column; ?>"><?php echo lang('supplier_groups'); ?></label>
        <div class="<?php echo $field_column; ?>">
            <?php
            echo form_input(array(
                "id" => "group_ids",
                "name" => "group_ids",
                "value" => $model_info->group_ids,
                "class" => "form-control",
                "placeholder" => lang('supplier_groups')
            ));
            ?>
        </div>
    </div> -->
<?php } ?>


<?php
if ($this->login_user->is_admin && get_setting("module_invoice")) { ?>
    <div style="display:none" class="form-group">
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
    <div style="display:none" class="form-group">
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

<?php } ?>

<?php $this->load->view("custom_fields/form/prepare_context_fields", array("custom_fields" => $custom_fields, "label_column" => $label_column, "field_column" => $field_column)); ?> 

<?php if ($this->login_user->is_admin && get_setting("module_invoice")) { ?>
   <!--  <div class="form-group">
        <label for="disable_online_payment" class="<?php echo $label_column; ?> col-xs-8 col-sm-6"><?php echo lang('disable_online_payment'); ?>
            <span class="help" data-container="body" data-toggle="tooltip" title="<?php echo lang('disable_online_payment_description') ?>"><i class="fa fa-question-circle"></i></span>
        </label>
        <div class="<?php echo $field_column; ?> col-xs-4 col-sm-6">
            <?php
            echo form_checkbox("disable_online_payment", "1", $model_info->disable_online_payment ? true : false, "id='disable_online_payment'");
            ?>                       
        </div>
    </div> -->
<?php } ?>

<script type="text/javascript">
    $(document).ready(function () {

        
        if (navigator.geolocation){
            navigator.geolocation.getCurrentPosition(showPosition,showError);
        }
   
    function showPosition(position){
        var lat =position.coords.latitude;
        var lan =position.coords.longitude;
       // alert(lan);
     
      //  alert(lat );
        // document.queryselector('.supplier-form input[name = "latitude"]').value = position.coords.latitude;
        // document.queryselector('.supplier-form input[name = "longitude"]').value = position.coords.longitude;
        // $("#supplier-form .latitude").value = position.coords.latitude;
        $("#latitude").show().val(position.coords.latitude);
        $("#longitude").show().val(position.coords.longitude);
    }
    function showError(error){
        switch(error.code){
            case error.PERMISSION_DENIED:
            alert("You Must Allow the Location");
           // location.reload();
            break;
        }
    }






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




 $("#city_id").select2().on("change", function () {
            var client_id = $(this).val();
            if ($(this).val()) {
                $('#area_id').select2("destroy");
                $("#area_id").hide();
                appLoader.show({container: "#invoice-porject-dropdown-section"});
                $.ajax({
                    url: "<?php echo get_uri("invoices/get_project_suggestions") ?>" + "/" + client_id,
                    dataType: "json",
                    success: function (result) {
                        $("#area_id").show().val("");
                        $('#area_id').select2({data: result});
                        appLoader.hide();
                    }
                });
            }
        });
 $('#area_id').select2({data: <?php echo json_encode($projects_suggestion); ?>});

 $("#status").select2().on("change", function () {
          
        });

  $("#category_id").select2().on("change", function () {
          
        });

    });

    // $("#supplier-form .select2").select2();
    // $("#company-form .select2").select2();
   
</script>
