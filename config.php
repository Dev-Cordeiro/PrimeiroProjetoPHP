<?php
define("DB_RM", 'sqlsrv');
define("DB_NAME_RM", "CorporeRM_Unitins");
define("DB_USER_RM", "app_chamilo");
define("DB_HOST_RM", "192.168.2.100");
define("DB_PASS_RM", "@c3ss0r3str1t0@Pp&#@100");

function __autoload($className) {
    if (file_exists($className . ".class.php")) {
        include($className . ".class.php");
    }
}

?>
