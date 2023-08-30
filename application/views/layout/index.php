
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

<?php
$dir = 'ltr';
if (get_setting("rtl")) {
    $dir = 'rtl';
}
?>
<!DOCTYPE html>
<html lang="en" dir="<?php echo $dir; ?>">
    <?php $this->load->view('includes/head'); ?>
    <body>

        <?php
        if ($topbar) {
            $this->load->view($topbar);
        }

        if ($left_menu) {
            $this->load->view('messages/chat/index.php');
        }
        ?>

        <div id="content" class="box">
            <?php
            if ($left_menu) {
                echo $left_menu;
            }
            ?>
            <div id="page-container" class="box-content">
                <div id="pre-loader">
                    <div id="pre-loade" class="app-loader"><div class="loading"></div></div>
                </div>
                <div class="scrollable-page">
                    <?php
                    if (isset($content_view) && $content_view != "") {
                        $this->load->view($content_view);
                    }
                    ?>
                </div>
                <?php
                if ($topbar == "includes/public/topbar") {
                    $this->load->view("includes/footer");
                }
                ?>

            </div>
        </div>
        <?php $this->load->view('modal/index'); ?>
        <?php $this->load->view('modal/confirmation'); ?>
        <?php $this->load->view("includes/summernote"); ?>
        <div style='display: none;'>
            <script type='text/javascript'>
<?php
$error_message = $this->session->flashdata("error_message");
$success_message = $this->session->flashdata("success_message");
if (isset($error)) {
    echo 'appAlert.error("' . $error . '");';
}
if (isset($error_message)) {
    echo 'appAlert.error("' . $error_message . '");';
}
if (isset($success_message)) {
    echo 'appAlert.success("' . $success_message . '", {duration: 10000});';
}
?>
            </script>
        </div>

    </body>
     <footer class="main-footer" style="
    position: fixed;
    z-index: 100000;
    bottom: 10px;
    right: 10px;
">
    <div class="pull-right hidden-xs">
     </div>
    <!-- <strong>Copyright &copy; <?php echo date('Y')?> <a href="https://jellysoft.in" >Jellysoft</a>.</strong> All rights
    reserved. -->
    <strong>Copyright &copy; <?php echo date('Y')?> <span>Powered By : <a style="color: rgb(250 0 0);" onmouseover="this.style.color='rgb(250 0 0)'" onmouseout="this.style.color='rgb(250 0 0)'" class="jellysoft" href="https://jellysoft.in" target="_blank">Jellysoft</a>.</span></strong> All rights
    reserved.
  </footer>
</html>