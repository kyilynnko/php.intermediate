<?php
require_once "../app/configs/Config.php";
require_once "../app/helpers/Helper.php";
// require_once "../app/libs/Core.php";
// require_once "../app/libs/Controller.php";
// require_once "../app/libs/Database.php";
spl_autoload_register(function($className)
{
    require_once "../app/libs/".$className.".php";
    // require_once "../app/configs/".$className.".php";

});
?>