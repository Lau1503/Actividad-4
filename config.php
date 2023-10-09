<?php
include(Functions.php)
var_dump($_SERVER);
if (!defined(ROOT)){
    <define("ROOT", "http://" . $_SERVER['HTTP_HOST'] . "/getProjectFolder");

}


?>