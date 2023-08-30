<div class="page-title clearfix no-border bg-off-white">
    <h1>
        <?php echo lang('supplier_details') . " - " . $supplier_info->company_name ?>
        <span id="star-mark">
            <?php
            if ($is_starred) {
                $this->load->view('suppliers/star/starred', array("client_id" => $supplier_info->id));
            } else {
                $this->load->view('suppliers/star/not_starred', array("client_id" => $supplier_info->id));
            }
            ?>
        </span>
    </h1>
</div>

<div id="page-content" class="clearfix">

    <?php
    if ($supplier_info->lead_status_id) {
        $this->load->view("suppliers/lead_information");
    }
    ?>

    <div class="">
        <?php // $this->load->view("suppliers/info_widgets/index"); ?>
    </div>

    <ul id="client-tabs" data-toggle="ajax-tab" class="nav nav-tabs" role="tablist">
        <!-- <li><a  role="presentation" href="<?php echo_uri("suppliers/contacts/" . $supplier_info->id); ?>" data-target="#supplier-contacts"> <?php echo lang('contacts'); ?></a></li> -->
       <!--  <li><a  role="presentation" href="<?php echo_uri("suppliers/company_info_tab/" . $supplier_info->id); ?>" data-target="#supplier-info"> <?php echo lang('supplier_info'); ?></a></li> -->

        <li><a  role="presentation" href="<?php echo_uri("suppliers/map/" . $supplier_info->id); ?>" data-target="#supplier-map"> <?php echo lang('map'); ?></a></li>
        <!-- <li><a  role="presentation" href="<?php echo_uri("suppliers/projects/" . $supplier_info->id); ?>" data-target="#supplier-projects"><?php echo lang('projects'); ?></a></li> -->

        <?php if ($show_invoice_info) { ?>
            <!-- <li><a  role="presentation" href="<?php echo_uri("suppliers/invoices/" . $supplier_info->id); ?>" data-target="#supplier-invoices"> <?php echo lang('invoices'); ?></a></li>
            <li><a  role="presentation" href="<?php echo_uri("suppliers/payments/" . $supplier_info->id); ?>" data-target="#supplier-payments"> <?php echo lang('payments'); ?></a></li> -->
        <?php } ?>
        <!-- <?php if ($show_estimate_info) { ?>
            <li><a  role="presentation" href="<?php echo_uri("suppliers/estimates/" . $supplier_info->id); ?>" data-target="#supplier-estimates"> <?php echo lang('estimates'); ?></a></li>
        <?php } ?> -->
       <!--  <?php if ($show_estimate_request_info) { ?>
            <li><a  role="presentation" href="<?php echo_uri("suppliers/estimate_requests/" . $supplier_info->id); ?>" data-target="#supplier-estimate-requests"> <?php echo lang('estimate_requests'); ?></a></li>
        <?php } ?> -->
        <?php if ($show_ticket_info) { ?>
            <li><a  role="presentation" href="<?php echo_uri("suppliers/tickets/" . $supplier_info->id); ?>" data-target="#supplier-tickets"> <?php echo lang('tickets'); ?></a></li>
        <?php } ?>
        <?php if ($show_note_info) { ?>
            <li><a  role="presentation" href="<?php echo_uri("suppliers/notes/" . $supplier_info->id); ?>" data-target="#supplier-notes"> <?php echo lang('notes'); ?></a></li>
        <?php } ?>
         <li><a  role="presentation" href="<?php echo_uri("suppliers/files/" . $supplier_info->id); ?>" data-target="#supplier-files"><?php echo lang('files'); ?></a></li>

       <!--  <?php if ($show_event_info) { ?>
            <li><a  role="presentation" href="<?php echo_uri("suppliers/events/" . $supplier_info->id); ?>" data-target="#supplier-events"> <?php echo lang('events'); ?></a></li>
        <?php } ?> -->
    </ul>
    <div class="tab-content">
       <!--  <div role="tabpanel" class="tab-pane fade" id="supplier-projects"></div> -->
        <div role="tabpanel" class="tab-pane fade" id="supplier-files"></div>
        <div role="tabpanel" class="tab-pane fade" id="supplier-info"></div>
        <div role="tabpanel" class="tab-pane fade" id="supplier-map"></div>
        <!-- <div role="tabpanel" class="tab-pane fade" id="supplier-contacts"></div> -->
        <!-- <div role="tabpanel" class="tab-pane fade" id="supplier-invoices"></div>
        <div role="tabpanel" class="tab-pane fade" id="supplier-payments"></div> -->
       <!--  <div role="tabpanel" class="tab-pane fade" id="supplier-estimates"></div>
        <div role="tabpanel" class="tab-pane fade" id="supplier-estimate-requests"></div> -->
        <div role="tabpanel" class="tab-pane fade" id="supplier-tickets"></div>
        <div role="tabpanel" class="tab-pane fade" id="supplier-notes"></div>
        <div role="tabpanel" class="tab-pane" id="supplier-events" style="min-height: 300px"></div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        setTimeout(function () {
            var tab = "<?php echo $tab; ?>";
            if (tab === "info") {
                $("[data-target=#client-info]").trigger("click");
            }
        }, 210);

    });
</script>
