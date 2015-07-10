<?php

$cur_dir = explode('\\', getcwd());
$sub=$cur_dir[count($cur_dir)-1];
$sub="urologo";
$site="http://".$_SERVER['SERVER_NAME']."/".($sub ? $sub."/": "");

define("C4d28b848", "fotoseditor/"); // For example ../../userfiles/ 
define("C70d7bd0f", $site); // Absolute path for example http://www.mysite.com
?>