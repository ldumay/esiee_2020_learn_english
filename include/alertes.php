<?php if( isset($_SESSION['alert_message']) && ($_SESSION['alert_message']!='') ){ ?>
    <!-- Alert -->
    <div id="alert" class="row">
        <div class="col-12">
            <div class="alert alert-<?php echo $_SESSION['alert_typecolor']; ?>" role="alert" style="display:block!important;"><?php echo $_SESSION['alert_message']; ?></div>
        </div>
    </div>
    <!-- ./Alert -->
<?php } ?>