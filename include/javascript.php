<!-- Javascript -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="js/jquery/1.11.3/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- BootstrapCoreJS -->
    <!-- Latest compiled and minified JavaScript -->
    <script type="text/javascript" src="https://dev.ldumay.fr/resources/bootstrap/4.1.3/js/bootstrap.js"></script>
    <!-- ./BootstrapCoreJS -->

    <!-- JavascriptActive -->
    <script type="text/javascript">
        // - - | JS actif | - - //
        $(function(){
            $("#account").click(function() {
                $("#update_account").toggle("slow");
            });
            $("#addLecon").click(function() {
                $("#add_lecon").toggle("slow");
            });
            if($('#alert').is(':visible')){
                $("#alert").delay(5000).toggle("slow");
            }
            $("#logout").click(function() {
                $(location).attr('href', './post.php?logout=true')
            });
        });
    </script>
    <!-- ./JavascriptActive -->

<!-- ./Javacsript -->