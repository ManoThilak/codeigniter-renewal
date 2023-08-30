<?php $this->load->view("includes/cropbox"); ?>
<div id="page-content" class="clearfix">
    <div class="row bg-dark-success p20">
        <div class="col-md-6">
            <?php $this->load->view("users/profile_image_section"); ?>
        </div>
        <div class="col-md-6">
            <p> 
                <?php
                $supplier_link = anchor(get_uri("suppliers/view/" . $supplier_info->id), $supplier_info->company_name, array("class" => "white-link"));

                if ($this->login_user->user_type === "client") {
                    $supplier_link = anchor(get_uri("suppliers/contact_profile/" . $this->login_user->id . "/company"), $supplier_info->company_name, array("class" => "white-link"));
                }

                echo lang("company_name") . ": <b>" . $supplier_link . "</b>";
                ?>

            </p>
            <?php if ($supplier_info->address) { ?>
                <p><?php echo nl2br($supplier_info->address); ?>
                    <?php if ($supplier_info->city) { ?>
                        <br /><?php echo $supplier_info->city; ?>
                    <?php } ?>
                    <?php if ($supplier_info->state) { ?>
                        <br /><?php echo $supplier_info->state; ?>
                    <?php } ?>
                    <?php if ($supplier_info->zip) { ?>
                        <br /><?php echo $supplier_info->zip; ?>
                    <?php } ?>
                    <?php if ($supplier_info->country) { ?>
                        <br /><?php echo $supplier_info->country; ?>
                    <?php } ?>
                </p>
                <p>
                    <?php
                    if ($supplier_info->website) {
                        $website = to_url($supplier_info->website);
                        echo lang("website") . ": " . "<a target='_blank' href='" . $website . "' class='white-link'>$website</a>";
                        ?>
                    <?php } ?>
                    <?php if ($supplier_info->vat_number) { ?>
                        <br /><?php echo lang("vat_number") . ": " . $supplier_info->vat_number; ?>
                    <?php } ?>  
                </p>
            <?php } ?>
        </div>
    </div>


    <ul id="supplier-contact-tabs" data-toggle="ajax-tab" class="nav nav-tabs" role="tablist">
        <li><a  role="presentation" href="<?php echo_uri("suppliers/contact_general_info_tab/" . $user_info->id); ?>" data-target="#tab-general-info"> <?php echo lang('general_info'); ?></a></li>
        <li><a  role="presentation" href="<?php echo_uri("suppliers/company_info_tab/" . $user_info->client_id); ?>" data-target="#tab-company-info"> <?php echo lang('company'); ?></a></li>
        <li><a  role="presentation" href="<?php echo_uri("suppliers/contact_social_links_tab/" . $user_info->id); ?>" data-target="#tab-social-links"> <?php echo lang('social_links'); ?></a></li>
        <li><a role="presentation" href="<?php echo_uri("suppliers/account_settings/" . $user_info->id); ?>" data-target="#tab-account-settings"> <?php echo lang('account_settings'); ?></a></li>
        <?php if ($user_info->id == $this->login_user->id) { ?>
            <li><a role="presentation" href="<?php echo_uri("suppliers/my_preferences/" . $user_info->id); ?>" data-target="#tab-my-preferences"> <?php echo lang('my_preferences'); ?></a></li>
        <?php } ?>
    </ul>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade" id="tab-general-info"></div>
        <div role="tabpanel" class="tab-pane fade" id="tab-company-info"></div>
        <div role="tabpanel" class="tab-pane fade" id="tab-social-links"></div>
        <div role="tabpanel" class="tab-pane fade" id="tab-account-settings"></div>
        <div role="tabpanel" class="tab-pane fade" id="tab-my-preferences"></div>

    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $(".upload").change(function () {
            if (typeof FileReader == 'function') {
                showCropBox(this);
            } else {
                $("#profile-image-form").submit();
            }
        });
        $("#profile_image").change(function () {
            $("#profile-image-form").submit();
        });


        $("#profile-image-form").appForm({
            isModal: false,
            beforeAjaxSubmit: function (data) {
                $.each(data, function (index, obj) {
                    if (obj.name === "profile_image") {
                        var profile_image = replaceAll(":", "~", data[index]["value"]);
                        data[index]["value"] = profile_image;
                    }
                });
            },
            onSuccess: function (result) {
                if (typeof FileReader == 'function') {
                    appAlert.success(result.message, {duration: 10000});
                } else {
                    location.reload();
                }
            }
        });

        setTimeout(function () {
            var tab = "<?php echo $tab; ?>";
            if (tab === "general") {
                $("[data-target=#tab-general-info]").trigger("click");
            } else if (tab === "company") {
                $("[data-target=#tab-company-info]").trigger("click");
            } else if (tab === "account") {
                $("[data-target=#tab-account-settings]").trigger("click");
            } else if (tab === "social") {
                $("[data-target=#tab-social-links]").trigger("click");
            } else if (tab === "my_preferences") {
                $("[data-target=#tab-my-preferences]").trigger("click");
            }
        }, 210);

    });
</script>