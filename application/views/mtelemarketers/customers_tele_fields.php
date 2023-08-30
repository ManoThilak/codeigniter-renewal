<!-- <input type="hidden" name="id" value="<?php echo $model_info->id; ?>" />
<input type="hidden" name="view" value="<?php echo isset($view) ? $view : ""; ?>" /> -->
<!-- <div class="form-group">
    <label for="assign_date" class="<?php echo $label_column; ?>"><?php echo lang('assign_date'); ?></label>
    <div class="<?php echo $field_column; ?>">
        <?php
         echo form_input(array(
            "id" => "assign_date",
            "name" => "assign_date",
            "value" => $model_info->assign_date ? $model_info->assign_date : get_my_local_time("Y-m-d"),
            "class" => "form-control recurring_element",
            "placeholder" => lang('assign_date'),
            "autocomplete" => "off",
            "data-rule-required" => true,
            "data-msg-required" => lang("field_required"),
        ));
        ?>
    </div>
</div> -->

<div class="form-group">
    <label for="telemarketer_id" class="<?php echo $label_column; ?>"><?php echo lang('telemarketer'); ?><small class="req"> *</small></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_dropdown("telemarketer_id", $telemarketers_dropdown, array($model_info->telemarketer_id), "class='select2 validate-hidden' id='telemarketer_id' data-rule-required='true' data-msg-required='" . lang('field_required') . "'");
                ?>
    </div>
</div>
<div class="form-group">
    <label for="client_id" class="<?php echo $label_column; ?>"><?php echo lang('client_name'); ?><small class="req"> *</small></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_dropdown("client_id", $clients_dropdown, array($model_info->client_id), "class='select2 validate-hidden' id='client_id' data-rule-required='true' data-msg-required='" . lang('field_required') . "'");
                ?>
    </div>
</div>
<!-- <div class="form-group">
    <label for="from_id" class="<?php echo $label_column; ?>"><?php echo lang('from_id'); ?><small class="req"> *</small></label>
    <div class="<?php echo $field_column; ?>" id="invoice-porject-dropdown-section">
        <?php
        echo form_dropdown("from_id", $clients_dropdown, array($model_info->from_id), "class='select2 validate-hidden' id='from_id' data-rule-required='true' data-msg-required='" . lang('field_required') . "'");
                ?>
    </div>
</div> -->
<div class="form-group">
    <label for="from_id" class="<?php echo $label_column; ?>"><?php echo lang('from_id'); ?><small class="req"> *</small></label>
    <div class="col-md-9" id="invoice-porject-dropdown-section">
        <?php
        echo form_input(array(
            "id" => "from_id",
            "name" => "from_id",
            "value" => $model_info->from_id,
            "class" => "form-control",
            "placeholder" => lang('from_id'),
            "data-rule-required" => true,
            "data-msg-required" => lang("field_required")
        ));
        ?>
    </div>
</div>
<div class="form-group">
    <label for="to_id" class="<?php echo $label_column; ?>"><?php echo lang('to_id'); ?><small class="req"> *</small><span id="item_unit"></span></label></label>
    <div class="col-md-9" id="invoice-porject-dropdown-section">
        <?php
        echo form_input(array(
            "id" => "to_id",
            "name" => "to_id",
            "value" => $model_info->to_id,
            "class" => "form-control",
            "placeholder" => lang('to_id'),
            "data-rule-required" => true,
            "data-msg-required" => lang("field_required")
        ));
        ?>
    </div>
</div>
 <div class="form-group">
    <label for="tot_cus" class="<?php echo $label_column; ?>"><?php echo lang('total_record'); ?></label>
    <div class="<?php echo $field_column; ?> " id="total-porject-dropdown-section">
        <?php
        echo form_input(array(
            "id" => "tot_cus",
            "name" => "tot_cus",
            "value" => $model_info->tot_cus,
            "class" => "form-control",
            "readonly" => "true",
            "placeholder" => lang('total')
        ));
        ?>
    </div>
</div>
<!-- <div class="form-group">
    <label for="to_id" class="<?php echo $label_column; ?>"><?php echo lang('to_id'); ?><small class="req"> *</small></label>
    <div class="<?php echo $field_column; ?>">
        <?php
        echo form_dropdown("to_id", $clients_dropdown, array($model_info->to_id), "class='select2 validate-hidden' id='to_id' data-rule-required='true' data-msg-required='" . lang('field_required') . "'");
                ?>
    </div>
</div> -->


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

setDatePicker("#assign_date");


$("#client_id").select2().on("change", function () {
    var client_id = $(this).val();
    var telemarketer_id = $('#telemarketer_id').val();
    // console.log(telemarketer_id);
    // console.log(client_id);
        if ($(this).val()) {
            $('#from_id').select2("destroy");
            $("#from_id").hide();
            $('#to_id').select2("destroy");
            $("#to_id").hide();
            appLoader.show({container: "#invoice-porject-dropdown-section"});
            $.ajax({
                url: "<?php echo get_uri("mtelemarketers/get_fromid_suggestion") ?>" + "/" + client_id + "/" + telemarketer_id,
                dataType: "json",
                success: function (result) {
                    $("#from_id").show().val("");
                    $('#from_id').select2({data: result});
                    $("#to_id").show().val("");
                    $('#to_id').select2({data: result});
                    appLoader.hide();
                    $('#tot_cus').val(0);
                }
            });
        }
    });



$("#telemarketer_id").select2().on("change", function () {
    var telemarketer_id = $(this).val();
    var client_id = $('#client_id').val();
    // console.log(telemarketer_id);
    // console.log(client_id);
        if ($(this).val()) {
            $('#from_id').select2("destroy");
            $("#from_id").hide();
            $('#to_id').select2("destroy");
            $("#to_id").hide();
            appLoader.show({container: "#invoice-porject-dropdown-section"});
            $.ajax({
                url: "<?php echo get_uri("mtelemarketers/get_fromid_suggestion") ?>" + "/" + client_id + "/" + telemarketer_id,
                dataType: "json",
                success: function (result) {
                    $("#from_id").show().val("");
                    $('#from_id').select2({data: result});
                    $("#to_id").show().val("");
                    $('#to_id').select2({data: result});
                    appLoader.hide();
                    $('#tot_cus').val(0);
                }
            });
        }
    });




// $("#to_id").select2().on("change", function () {
//     //var client_id = $(this).val();
//     var fromid = $('#from_id').val();
//     var toid = $('#to_id').val();
//         if ($('#from_id').val()) {
//             $('#tot_cus').select2("destroy");
//             $("#tot_cus").hide();
           
//             appLoader.show({container: "#total-porject-dropdown-section"});
//             $.ajax({
//                 url: "<?php echo get_uri("customers/get_totid_suggestion") ?>" + "/" + client_id,
//                 dataType: "json",
//                 success: function (result) {
//                     $("#tot_cus").show().val("");
//                     $('#tot_cus').select2({data: result});
//                     // $("#to_id").show().val("");
//                     // $('#to_id').select2({data: result});
//                      appLoader.hide();
//                 }
//             });
//         }
//     });



// $(document).on('change', '#class_id', function (e) {
//              var class_id = $(this).val();
//             //  console.log(item_category_id);
//             $.ajax({
//                 type: "GET",
//                 url: base_url + "admin/income/getByClassAmount",
//                 data: {'class_id': class_id},
//                 dataType: "json",
//                 success: function (data) {
//                     $('#item_unit').html(data.amount);
//                 }

//             });

//         });

 $(document).on('change', '#from_id,#to_id', function (e) {
    var client_id = $('#client_id').val();
    var telemarketer_id = $('#telemarketer_id').val();
              var from_id = $('#from_id').val();
                var to_id = $('#to_id').val();
              //console.log(from_id);
              //console.log(to_id);
            $.ajax({
                type: "GET",
                url:"<?php echo get_uri("customers/get_totid_suggestion") ?>",
                data: {'client_id': client_id,'telemarketer_id': telemarketer_id,'from_id': from_id,'to_id': to_id},
                dataType: "json",
                success: function (data) {
                    // $('#item_unit').html(data.result);
                    $('#tot_cus').val(data.result);
                }

            });

        });





        $('#from_id').select2({data: <?php echo json_encode($projects_suggestion); ?>});
        $('#to_id').select2({data: <?php echo json_encode($projects_suggestion); ?>});

      




    });
</script>