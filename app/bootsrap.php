<?php // contient tout les requires

// load config
require_once 'config/config.php';
 // LOAD THE HELPERS
 require_once 'helpers/url_helper.php';
 require_once 'helpers/session_helper.php';
 require_once 'helpers/post_helper.php';

// fonction qui fait l'appel a tout les class neccessaire
spl_autoload_register(function ($classname){require_once 'libraries/'.$classname.'.php';});
?> 