    <?php
        // Clean session
    	if(isset($_SESSION['User_id']) && $_SESSION['User_id']>0){ clean_Sessions(); }
    ?>
</html>