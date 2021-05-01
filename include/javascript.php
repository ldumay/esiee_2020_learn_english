<!-- Javascript -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="js/jquery/1.11.3/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- BootstrapCoreJS -->
    <!-- Latest compiled and minified JavaScript -->
    <script type="text/javascript" src="https://dev.ldumay.fr/resources/bootstrap/4.1.3/js/bootstrap.js"></script>
    <!-- ./BootstrapCoreJS -->

    <!-- Interact.JS -->
    <script type="text/javascript" src="https://cdn.interactjs.io/v1.10.11/interactjs/index.js"></script>
    <script type="module">
        import interact from 
        'https://cdn.interactjs.io/v1.10.11/interactjs/index.js'

        interact('.item').draggable({
          listeners: {
            move (event) {
              console.log(event.pageX,
                          event.pageY)
            }
          }
    })
    </script>
    <!-- ./Interact.JS -->

    <!-- JavascriptActive -->
    <script type="text/javascript">
        // - - | JS actif | - - //
        $(function(){
            $("#account").click(function() {
                $("#update_account").toggle("slow");
            });
            $("#importLecon").click(function() {
                $("#import_lecon").toggle("slow");
            });
            $("#addLecon").click(function() {
                $("#add_lecon").toggle("slow");
            });
            $("#addTheme").click(function() {
                $("#add_theme").toggle("slow");
            });
            $("#addUser").click(function() {
                $("#add_user").toggle("slow");
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