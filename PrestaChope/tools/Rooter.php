<?php

class Rooter {

    public static function redirectToPage($pageName) {
        ?>
        <script language="Javascript">
            <!--
                document.location.replace("index.php?page=<?php echo $pageName; ?>");
            // -->
        </script>
        <?php
    }

}
