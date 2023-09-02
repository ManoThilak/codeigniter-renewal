<?php echo form_open(get_uri("city/save"), array("id" => "groups-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
    <input type="hidden" name="id" value="<?php echo $model_info->id; ?>" />
    <div class="form-group">
    <label for="state_id" class="col-md-3"><?php echo lang('state'); ?><small class="req"> *</small></label>
    <div class="col-md-9">
        <?php
        echo form_dropdown("state_id", $state_dropdown, array($model_info->state_id), "class='select2 validate-hidden' id='state_id' data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
                ?>
    </div>
</div>
    <div class="form-group">
        <br />
        <label for="title" class=" col-md-3"><?php echo lang('city'); ?></label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "title",
                "name" => "title",
                "value" => $model_info->title,
                "class" => "form-control",
                "placeholder" => lang('city'),
                "autofocus" => true,
                "data-rule-required" => true,
                "data-msg-required" => lang("field_required"),
            ));
            ?>
        </div>
         <br />
       <!--    <div class="form-group">
        <label for="description" class="col-md-3"><?php echo lang('description'); ?></label>
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
    </div> -->
       
    </div>
  <!--   <div class="form-group">
        <label for="ad1_file" class="col-md-2">Ad1 Web Link</label>
        <div class="col-lg-10">
            <div class="pull-left mr15">
                <img id="ad1_file-preview" src="<?php//  echo get_ad1_file_url(); ?>" alt="..." />
            </div>
            <div class="pull-left file-upload btn btn-default btn-xs">
                <span>...</span>
                <input id="ad1" class="cropbox-upload upload" name="ad1" type="file" data-height="100" data-width="300" data-preview-container="#ad1_file-preview" data-input-field="#ad1_file" />
            </div>
            <input type="" id="ad1_file" name="ad1_file" value="" />
        </div>
    </div> -->
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> <?php echo lang('close'); ?></button>
    <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle"></span> <?php echo lang('save'); ?></button>
</div>
<?php echo form_close(); ?>
<!-- 
<?php $this->load->view("includes/cropbox"); ?>

<script type="text/javascript">
    $(document).ready(function () {
      
        $("#groups-form").appForm({
            isModal: false,
            beforeAjaxSubmit: function (data) {
                $.each(data, function (index, obj) {
                    if ( obj.name === "ad1_file" ) {
                        var image = replaceAll(":", "~", data[index]["value"]);
                        data[index]["value"] = image;
                    }
                });
            },
            onSuccess: function (result) {
                appAlert.success(result.message, {duration: 10000});
                if ( $("#ad1_file").val() || result.reload_page) {
                    location.reload();
                }
            }
        });

        var uploadUrl = "<?php echo get_uri("settings/upload_file"); ?>";
        var validationUrl = "<?php echo get_uri("settings/validate_file"); ?>";

       // var dropzone = attachDropzoneWithForm("#groups-form", uploadUrl, validationUrl, {maxFiles: 1});


        $(".cropbox-upload").change(function () {
            showCropBox(this);
        });



    });
</script> -->

<script type="text/javascript">
    $(document).ready(function() {
        $("#groups-form .select2").select2();
        $("#groups-form").appForm({
            onSuccess: function(result) {
                $("#godown-table").appTable({newData: result.data, dataId: result.id});
            }
        });
        $("#title").focus();
    });
</script>