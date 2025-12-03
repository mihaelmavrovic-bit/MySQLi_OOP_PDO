<?php
class Redirect{
    public static function redirectToErrorPage($msg = null){
        if(!$msg == null){
            $_SESSION["err"]= $msg;
        }
        header("Location: ErrorPage.php");
        exit;
    }
}
?>

<?php

