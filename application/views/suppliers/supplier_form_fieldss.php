<input type="hidden" name="id" value="<?php echo $model_info->id; ?>" />
<input type="hidden" name="view" value="<?php echo isset($view) ? $view : ""; ?>" />
<div class="">
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
            "readonly" => "TRUE",
        ));
        ?>
    </div>
</div>

<div class="">
    <label for="category_id" class="<?php echo $label_column; ?>"><?php echo lang('category'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
            echo form_dropdown("category_id", $category_dropdown, $model_info->category_id, "class='select2 validate-hidden' id='category_id'");
        ?>
    </div>
</div>
<div class="">
    <label for="sqft" class="<?php echo $label_column; ?>"><?php echo lang('sqft'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "sqft",
            "name" => "sqft",
            "value" => $model_info->sqft,
            "class" => "form-control",
            "placeholder" => lang('sqft'),
            "readonly" => "TRUE",
        ));
        ?>
    </div>
</div>
<div class="">
    <label for="city_id" class="<?php echo $label_column; ?>"><?php echo lang('city'); ?></label>
    <div class="<?php echo $field_column; ?>">
       
        <?php
                echo form_dropdown("city_id", $city_dropdown, array($model_info->city_id), "class='select2 validate-hidden' id='city_id' data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
                ?>
    </div>
</div>

<!-- <div class="">
    <label for="area_id" class="<?php echo $label_column; ?>"><?php echo lang('area'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
            echo form_dropdown("area_id", $area_dropdown, $model_info->area_id, "class='select2 validate-hidden' id='area_id'");
        ?>
    </div>
</div> -->
 <div class="">
            <label for="area_id" class="<?php echo $label_column; ?>"><?php echo lang('area'); ?></label>
            <div class="<?php echo $field_column; ?>" id="invoice-porject-dropdown-section">
                <?php
                echo form_input(array(
                    "id" => "area_id",
                    "name" => "area_id",
                    "value" => $model_info->area_id,
                    "class" => "form-control",
                    "placeholder" => lang('area'),
                    "readonly" => "TRUE",
                ));
                ?>
            </div>
        </div>

 <div class="">
    <label for="address" class="<?php echo $label_column; ?>"><?php echo lang('address'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_textarea(array(
            "id" => "address",
            "name" => "address",
            "value" => $model_info->address ? $model_info->address : "",
            "class" => "form-control",
            "readonly" => "TRUE",
            "placeholder" => lang('address')
        ));
        ?>

    </div>
</div> 


<div class="">
    <label for="partyname" class="<?php echo $label_column; ?>"><?php echo lang('partyname'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_input(array(
            "id" => "partyname",
            "name" => "partyname",
            "value" => $model_info->partyname,
            "class" => "form-control",
            "readonly" => "TRUE",
            "placeholder" => lang('partyname')
        ));
        ?>
    </div>
</div>

<div class="">
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
            "readonly" => "TRUE",
            "data-rule-minlength" => 10,
            "data-rule-maxlength" => 10
        ));
        ?>
    </div>
</div>

<div class="">
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
            "readonly" => "TRUE",
            "data-rule-minlength" => 10,
            "data-rule-maxlength" => 10
        ));
        ?>
    </div>
</div>
<div class="">
    <label for="comments" class="<?php echo $label_column; ?>"><?php echo lang('comments'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_textarea(array(
            "id" => "comments",
            "name" => "comments",
            "value" => $model_info->comments ? $model_info->comments : "",
            "class" => "form-control",
            "readonly" => "TRUE",
            "placeholder" => lang('comments')
        ));
        ?>

    </div>
</div>




<?php if ($model_info->latitude) { ?>
        
    <?php } else { ?>
        <div class="">
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
<div class="">
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
<div class="">
    <label for="status" class="<?php echo $label_column; ?>"><?php echo lang('status'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
            echo form_dropdown("status", $status_dropdown, $model_info->status, "class='select2 validate-hidden' id='status'");
        ?>
    </div>
</div>



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
  $("#area_id").select2("readonly", true);
  $("#city_id").select2("readonly", true);
$("#status").select2("readonly", true);
$("#category_id").select2("readonly", true);


    });

    // $("#supplier-form .select2").select2();
    // $("#company-form .select2").select2();
   
</script>
