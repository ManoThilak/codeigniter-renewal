<?php echo form_open(get_uri("stockin/save"), array("id" => "expense-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
    <div id="expense-dropzone" class="post-dropzone">
        <input type="hidden" name="id" value="<?php echo $model_info->id; ?>" />
        <div class=" form-group">
            <label for="expense_date" class=" col-md-3"><?php echo lang('date'); ?></label>
            <div class="col-md-9">
                <?php
                echo form_input(array(
                    "id" => "expense_date",
                    "name" => "expense_date",
                    "value" => $model_info->bill_date? $model_info->bill_date: get_my_local_time("Y-m-d"),
                    "class" => "form-control",
                    "data-rule-required" => true,
                    "data-msg-required" => lang("field_required"),
                ));
                ?>
            </div>
        </div>



        <!--  <div class="form-group">
            <label for="godown_id" class=" col-md-3"><?php echo lang('godown'); ?></label>
            <div class=" col-md-9">
                <?php
                echo form_dropdown("godown_id", $godowns_dropdown, $model_info->godown_id, "class='select2 validate-hidden' id='godown_id'");
                ?>
            </div>
        </div>


        <div class="form-group">
            <label for="item_id" class=" col-md-3"><?php echo lang('item'); ?></label>
            <div class=" col-md-9">
                <?php
                echo form_dropdown("item_id", $items_dropdown, $model_info->item_id, "class='select2 validate-hidden' id='item_id' data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
                ?>
            </div>
        </div> -->
        <div class="form-group">
            <label for="religion_id" class=" col-md-3"><?php echo lang('religion'); ?></label>
            <div class="col-md-9">
                <?php
                echo form_dropdown("religion_id", $religion_dropdown, array($model_info->religion_id), "class='select2 validate-hidden' id='religion_id' data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
                ?>
            </div>
        </div>
  
        <div class="form-group">
            <label for="sub_religion_id" class=" col-md-3"><?php echo lang('sub_religion'); ?></label>
            <div class="col-md-9" id="invoice-porject-dropdown-section">
                <?php
                echo form_input(array(
                    "id" => "sub_religion_id",
                    "name" => "sub_religion_id",
                    "value" => $model_info->sub_religion_id,
                    "class" => "form-control",
                    "placeholder" => lang('sub_religion')
                ));
                ?>
            </div>
        </div>

        <div class="form-group">
            <label for="gift_id" class=" col-md-3"><?php echo lang('gift'); ?></label>
            <div class="col-md-9" id="gift-porject-dropdown-section">
                <?php
                echo form_input(array(
                    "id" => "gift_id",
                    "name" => "gift_id",
                    "value" => $model_info->gift_id,
                    "class" => "form-control",
                    "placeholder" => lang('gift')
                ));
                ?>
            </div>
        </div>


         <div class="form-group">
        <label for="item_quantity" class=" col-md-3"><?php echo lang('quantity'); ?></label>
        <div class="col-md-9">
            <?php
            echo form_input(array(
                "id" => "item_quantity",
                "name" => "item_quantity",
                "value" => $model_info->quantity ? to_decimal_format($model_info->quantity) : "",
                "class" => "form-control",
                "placeholder" => lang('quantity'),
                "data-rule-required" => true,
                "data-msg-required" => lang("field_required"),
            ));
            ?>
        </div>
    </div>
     <div class="form-group">
        <label for="unit_type" class=" col-md-3"><?php echo lang('unit_type'); ?></label>
        <div class="col-md-9">
            <?php
            echo form_input(array(
                "id" => "unit_type",
                "name" => "unit_type",
                "value" => $model_info->unit_type,
                "class" => "form-control",
                "placeholder" => lang('unit_type') . ' (Ex: hours, pc, etc.)'
            ));
            ?>
        </div>
    </div>


       
        

    

       


         
        <div class="modal-footer">
            <div class="row">
              
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> <?php echo lang('close'); ?></button>
                <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle"></span> <?php echo lang('save'); ?></button>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

      
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
            console.log(sub_religion_id);
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

          $('#gift_id').select2({data: <?php echo json_encode($gifts_suggestion); ?>});


      
    });
</script>