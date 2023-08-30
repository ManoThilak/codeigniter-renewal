
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Satisfy">

<style>
.jellysoft {
    font-family: 'Satisfy', cursive;
    font-size: 18px;
    font-weight: bold;
    color:rgb(255 7 7);
}
.jellysoft:hover {
    font-family: 'Satisfy', cursive;
    font-size: 24px;
    font-weight: bold;
    color: blue !important;
}  
</style>
<!--  <?php if (get_setting("enable_footer")) { ?>

    <div class="footer p15 hidden-xs">
        <?php
        $footer_copyright_text = get_setting("footer_copyright_text");
        if ($footer_copyright_text) {
            ?>

            <div class="pull-left">
                <?php echo $footer_copyright_text; ?>
            </div>

        <?php } ?>

        <div class="<?php echo $footer_copyright_text ? "pull-right" : ""; ?>">
            <?php
            $footer_menus = unserialize(get_setting("footer_menus"));
            if ($footer_menus && is_array($footer_menus)) {
                foreach ($footer_menus as $footer) {
                    echo anchor($footer->url, $footer->menu_name);
                }
            }
            ?>
        </div>
    </div>

<?php } ?> -->

  <footer style="
    position: fixed;
    z-index: 100000;
    bottom: 10px;
    right: 10px;
" class="main-footer">
    <div class="pull-right hidden-xs">
     </div>
    <!-- <strong>Copyright &copy; <?php echo date('Y')?> <a href="https://jellysoft.in" data-toggle="tab">Jellysoft</a>.</strong> All rights
    reserved. -->
    <strong>Copyright &copy; <?php echo date('Y')?> <span>Powered By : <a style="color: rgb(250 0 0);" onmouseover="this.style.color='rgb(250 0 0)'" onmouseout="this.style.color='rgb(250 0 0)'" class="jellysoft" href="https://jellysoft.in" target="_blank">Jellysoft</a></span></strong> All rights
    reserved.
  </footer>

  